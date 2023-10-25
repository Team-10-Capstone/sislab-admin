<?php

namespace App\Controllers;

use PHPUnit\Framework\Constraint\IsEmpty;

class FppcController extends BaseController
{
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {

        $fppcModel = new \App\Models\FppcModel();

        // Get the page number from the URL, default to 1 if not provided
        $page = $this->request->getVar('page') ?? 1;

        // search
        $keyword = $this->request->getVar('keyword') ?? '';

        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $tipe_permohonan = $this->request->getVar('tipe_permohonan');
        $order_by_raw = $this->request->getVar('order_by') ?? 'created_at-asc';

        $order_by = explode('-', $order_by_raw);

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        // find all fppc data
        $query = $fppcModel->select('*')
            ->orderBy($order_by[0], $order_by[1])
            ->limit($perPage, $offset);

        if (!empty($keyword)) {
            $query->like('no_fppc', $keyword);
            $query->orLike('no_ppk', $keyword);
        }

        $query->like('fppc.status', "pending");

        if (!empty($start_date)) {
            $query->where('created_at >=', $start_date);
        }

        if (!empty($end_date)) {
            $query->where('created_at <=', $end_date);
        }

        if (!empty($tipe_permohonan)) {
            $query->like('fppc.tipe_permohonan', $tipe_permohonan);
        }

        // Execute the query to retrieve the results
        $results = $query->findAll();

        $totalRecords = count($results);
        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        // Create a pager instance
        $pager = $this->pager;

        return view('pages/fppc', [
            'keyword' => $keyword,
            'data' => $results,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tipe_permohonan' => $tipe_permohonan,
            'title' => 'Permohonan PPK'
        ]);
    }

    public function create()
    {
        // ppk id from query params
        $ppkId = $this->request->getVar('ppk_id');

        if (empty($ppkId)) {
            return redirect()->to('/permohonan-ppk');
        }
        // Load the FppcModel
        $fppcModel = new \App\Models\FppcModel();
        $parameterUjiModel = new \App\Models\ParameterUjiModel();
        $WadahModel = new \App\Models\WadahModel();
        $BentukModel = new \App\Models\BentukModel();

        // check if id ppk exist in fppc
        $fppcData = $fppcModel->where('id_ppk', $ppkId)->first();

        if (!empty($fppcData)) {
            return redirect()->to('/permohonan-ppk');
        }

        $karimutu = db_connect('karimutu');

        // get ppk details data from tr_master_pelaporan single data
        $ppk = $karimutu->query("SELECT * FROM tr_mst_pelaporan WHERE id_ppk = ?", [$ppkId])->getRowArray();

        // get all ppk item related to ppk details from v_dtl_pelaporan
        $ppkItems = $karimutu->query("SELECT * FROM v_dtl_pelaporan WHERE id_ppk = ?", [$ppkId])->getResultArray();

        $parameters = $parameterUjiModel->findAll();

        $wadahs = $WadahModel->findAll();
        $bentuks = $BentukModel->findAll();

        return view('pages/fppc-create', [
            'ppk' => $ppk,
            'ppkItems' => $ppkItems,
            'parameters' => $parameters,
            'wadahs' => $wadahs,
            'bentuks' => $bentuks,
            'title' => 'Pengajuan Permohonan Uji Lab',
        ]);
    }

    public function store($id)
    {
        $data = [];

        helper('tipepermohonan');

        // Load the FPPCModel and FPPCDetailsModel
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();

        $adminId = session()->get('adminId');

        if ($this->request->getMethod() === 'post') {
            $forms = $this->request->getPost('ppk');

            $karimutu = db_connect('karimutu');

            // get ppk details data from tr_master_pelaporan single data
            $ppk = $karimutu->query("SELECT * FROM tr_mst_pelaporan WHERE id_ppk = ?", [$id])->getRowArray();

            // get all ppk item related to ppk details from v_dtl_pelaporan
            $ppkItems = $karimutu->query("SELECT * FROM v_dtl_pelaporan WHERE id_ppk = ?", [$id])->getResultArray();

            $tipe = convertPpkTipeToFppcTipe($ppk['kd_kegiatan'], $ppk['kd_mks_kirim']);

            $data_fppc = [
                'no_fppc' => $ppk['id_ppk'] . '-' . $ppk['id_trader'],
                'no_ppk' => $ppk['no_ppk'],
                'tgl_ppk' => $ppk['tgl_ppk'],
                'id_ppk' => $ppk['id_ppk'],
                'id_trader' => $ppk['id_trader'],
                'id_petugas' => $adminId,
                'nip_baru' => null,
                'tgl_monsur' => null,
                'petugas_monsur' => null,
                'nama_trader' => $ppk['nm_trader'],
                'alamat_trader' => $ppk['al_trader'],
                'nama_penerima' => $ppk['nm_penerima'],
                'alamat_penerima' => $ppk['al_penerima'],
                'tipe_permohonan' => $tipe,
            ];

            $fppcId = $fppcModel->insert($data_fppc);

            // loop ppkItems and get related data in $targetUji, then post to fppc_details
            foreach ($ppkItems as $ppkItem) {

                // find form that match with ppk item, compared using id_ikan
                $form = array_filter($forms, function ($form) use ($ppkItem) {
                    return $form['id_kd_ikan'] == $ppkItem['id_kd_ikan'];
                });

                // if form found, get property target_uji inside form, loop and insert to permohonan uji
                if (!empty($form)) {
                    $formObj = array_values($form)[0];

                    $data = [
                        'id_fppc' => $fppcId,
                        'id_ikan' => $ppkItem['id_kd_ikan'],
                        'nama_lokal' => $ppkItem['nm_lokal'],
                        'nama_latin' => $ppkItem['nm_latin'],
                        'nama_umum' => $ppkItem['nm_umum'],
                        'jenis_ikan' => $ppkItem['nm_kel_ikan'],
                        'asal_sampel' => $ppkItem['asal_cmdts'],
                        'jumlah_sampel' => $ppkItem['jumlah'],
                        'kode_pelanggan' => null,
                        'deskripsi_sampel' => null,
                        'kode_sampel' => $ppkItem['kd_ikan'],
                        'bentuk' => $ppkItem['ket_bentuk'],
                        'kondisi_sampel' => null,
                        'id_wadah' => $formObj['wadah'],
                        'id_bentuk' => $formObj['bentuk'],
                    ];

                    $dtlFppcId = $fppcDetailsModel->insert($data);
                    $targetUji = $formObj['target_uji'];

                    foreach ($targetUji as $target) {
                        $data = [
                            'dtl_fppc_id' => $dtlFppcId,
                            'parameter_uji_id' => $target,
                            'hasil_uji_id' => null,
                        ];

                        $permohonanUjiModel->insert($data);
                    }
                }
            }

            session()->setFlashdata('success', 'Permohonan Uji Lab Berhasil Dibuat');

            return redirect()->to('/ppk');
        }

    }

    public function verify()
    {
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $bentukModel = new \App\Models\BentukModel();
        $wadahModel = new \App\Models\WadahModel();

        $id = $this->request->getVar('fppc_id');

        $fppcData = $fppcModel->select('*')
            ->where('fppc.id', $id)
            ->first();

        $fppcDetailsData = $fppcDetailsModel->where('id_fppc', $id)->findAll();
        if (empty($fppcDetailsData)) {
            return redirect()->to('/fppc');
        }

        $permohonanUjiData = $permohonanUjiModel->where('dtl_fppc_id', $fppcDetailsData[0]['id'])->findAll();

        $mergedFppcDetailsAndPermohonanUji = [];

        foreach ($fppcDetailsData as $fppcDetails) {
            $permohonanUji = array_filter($permohonanUjiData, function ($permohonanUji) use ($fppcDetails) {
                return $permohonanUji['dtl_fppc_id'] == $fppcDetails['id'];
            });

            $permohonanUji = array_values($permohonanUji);

            $permohonanUjiQuery = $permohonanUjiModel->select('permohonan_uji.*, parameter_uji.keterangan_uji, parameter_uji.jenis_parameter, parameter_uji.no_ikm')
                ->join('parameter_uji', 'parameter_uji.id = permohonan_uji.parameter_uji_id')
                ->where('dtl_fppc_id', $fppcDetails['id'])
                ->findAll();

            $mergedFppcDetailsAndPermohonanUji[] = [
                'fppc_details' => $fppcDetails,
                'permohonan_uji' => $permohonanUjiQuery,
            ];
        }

        $bentuks = $bentukModel->findAll();
        $wadahs = $wadahModel->findAll();

        $returnData = [
            'fppc' => $fppcData,
            'fppc_details' => $mergedFppcDetailsAndPermohonanUji,
            'title' => 'Verifikasi Permohonan Uji Lab',
            'bentuks' => $bentuks,
            'wadahs' => $wadahs,
        ];

        return view('pages/fppc-verifikasi', $returnData);

    }

    public function updateStatus($id, $status)
    {
        $statusData = [
            '1' => 'menunggu-disposisi',
            '0' => 'ditolak',
        ];
        $fppcModel = new \App\Models\FppcModel();

        $fppcModel->update($id, ['status' => $statusData[$status]]);

        if ($status == 1) {
            session()->setFlashdata('success', 'Permohonan Uji Lab Berhasil Diterima');
        } else {
            session()->setFlashdata('success', 'Permohonan Uji Lab Berhasil Ditolak');
        }

        return redirect()->to('/fppc');
    }

    public function delete($ids)
    {
        // $ids will contain the captured IDs as a single string
        // You need to split the string into an array of IDs
        $idArray = explode(',', $ids);

        // Loop through the IDs and delete the corresponding records
        foreach ($idArray as $id) {
            $fppcModel = new \App\Models\FppcModel();
            $fppcModel->delete($id);
        }

        session()->setFlashdata('success', 'Permohonan Uji Lab Berhasil Dihapus');
        return redirect()->to('/fppc');
    }
}
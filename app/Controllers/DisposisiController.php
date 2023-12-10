<?php

namespace App\Controllers;

use PHPUnit\Framework\Constraint\IsEmpty;

class DisposisiController extends BaseController
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

        $query = $fppcModel->select('fppc.*, disposisi_penyelia.penyelia_id')
            ->orderBy($order_by[0], $order_by[1])
            ->limit($perPage, $offset);

        $query->like('fppc.status', "menunggu-pengujian");

        if (!empty($keyword)) {
            $query->like('fppc.no_fppc', $keyword);
            $query->orLike('fppc.no_ppk', $keyword);
        }

        if (!empty($start_date)) {
            $query->where('fppc.created_at >=', $start_date);
        }

        if (!empty($end_date)) {
            $query->where('fppc.created_at <=', $end_date);
        }

        if (!empty($tipe_permohonan)) {
            $query->like('fppc.tipe_permohonan', $tipe_permohonan);
        }

        $penyeliaId = session()->get('adminId');
        $role = session()->get('role');

        if ($role === 2) {
            $query->where('disposisi_penyelia.penyelia_id', $penyeliaId);
        }

        // Execute the query to retrieve the results
        $results = $query
            ->join('disposisi_penyelia', 'disposisi_penyelia.id_fppc = fppc.id', 'left')
        ->findAll();


        $totalRecords = count($results);
        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        // Create a pager instance
        $pager = $this->pager;

        return view('pages/disposisi-analis', [
            'keyword' => $keyword,
            'data' => $results,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tipe_permohonan' => $tipe_permohonan,
            'title' => 'Disposisi Analis',
        ]);
    }

    public function store()
    {
        $data = [];

        $DisposisiAnalis = new \App\Models\DisposisiAnalisModel();
        $FppcModel = new \App\Models\FppcModel();
        $AktivitasModel = new \App\Models\AktivitasModel();

        $disposisi = $this->request->getPost('disposisi');

        if ($this->request->getMethod() === 'post') {
            // get admin id from session
            $adminId = session()->get('adminId');

            $disposisi = $this->request->getPost('disposisi');

            //    get fppc_id from first array
            $fppc_id = $disposisi[array_key_first($disposisi)]['fppc_id'];

            foreach ($disposisi as $eachDisposisi) {

                foreach ($eachDisposisi['permohonan_uji_id'] as $permohonan_uji_id) {
                    // parse int id_analis
                    $permohonan_uji_id = (int) $permohonan_uji_id;

                    $tanggal_pengujian = $eachDisposisi['tanggal_pengujian'];
                    $waktu_pengujian = $eachDisposisi['waktu_pengujian'];

                    $mergedDateTime = $tanggal_pengujian . ' ' . $waktu_pengujian;

                    // Create a DateTime object from the merged date and time string
                    $datetime = new \DateTime($mergedDateTime);

                    // Format the DateTime object in the desired format (datetime2)
                    $formattedDateTime = $datetime->format('Y-m-d H:i:s');

                    foreach ($eachDisposisi['petugas_analis'] as $petugas_analis) {
                        // parse int id_analis
                        $petugas_analis = (int) $petugas_analis;

                        $data = [
                            'id_fppc' => $eachDisposisi['fppc_id'],
                            'id_permohonan_uji' => $permohonan_uji_id,
                            'analis_id' => $petugas_analis,
                            'penyelia_id' => $adminId,
                            'tanggal_pengujian' => $formattedDateTime,
                            'waktu_pengujian' => $waktu_pengujian,
                        ];

                        $DisposisiAnalis->insert($data);
                    }
                }
            }

            $FppcModel->update($fppc_id, ['status' => 'proses-pengujian']);

            $activityDescription = 'Penjadwalan pengujian telah dibuat, pengujian akan dilakukan pada tanggal ' . $formattedDateTime;

            $activityData = [
                'id_fppc' => $fppc_id,
                'description' => $activityDescription,
                'type' => 'penjadwalan',
                'user_id' => session()->get('adminId'),
            ];

            $AktivitasModel->insert($activityData);

            session()->setFlashdata('success', 'Berhasil membuat disposisi');

        }

        return redirect()->to('/disposisi-analis');
    }

    public function createDisposisiViews($id)
    {
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $AdminModel = new \App\Models\AdminModel();

        $fppcData = $fppcModel->where('id', $id)->first();

        $fppcDetailsData = $fppcDetailsModel
            ->where('id_fppc', $id)
            ->findAll();

        $analis = $AdminModel->where('roleId', 3)->findAll();

        $groupedPermohonanUjiWithArrOfDtlFppc = [];

        $dtlFppcIds = array_column($fppcDetailsData, 'id');

        $PermohonanUjiRelated = $permohonanUjiModel
            ->whereIn('permohonan_uji.dtl_fppc_id', $dtlFppcIds)
            ->select('permohonan_uji.*, dtl_fppc.id_fppc as fppc_id, 
            dtl_fppc.id_wadah as id_wadah, dtl_fppc.id_bentuk as id_bentuk, dtl_fppc.nama_lokal as nama_lokal, dtl_fppc.nama_latin as nama_latin, dtl_fppc.jumlah_sampel as jumlah_sampel 
            , parameter_uji.jenis_parameter as jenis_parameter, parameter_uji.standar_uji as standar_uji, parameter_uji.kode_uji,
            parameter_uji.keterangan_uji as keterangan_uji, wadah.nama_wadah as nama_wadah, bentuk.nama_bentuk as nama_bentuk, wadah.image as image_wadah, hasil_uji.keterangan as keterangan_hasil, hasil_uji.nilai as nilai_hasil, hasil_uji.hasil_uji as hasil_uji, hasil_uji.id as hasil_uji_id, hasil_uji.analis_id as analis_id')
            ->join('hasil_uji', 'hasil_uji.permohonan_uji_id = permohonan_uji.id', 'left')
            ->join('dtl_fppc', 'dtl_fppc.id = permohonan_uji.dtl_fppc_id')
            ->join('parameter_uji', 'parameter_uji.id = permohonan_uji.parameter_uji_id')
            ->join('bentuk', 'bentuk.id = dtl_fppc.id_bentuk')
            ->join('wadah', 'wadah.id = dtl_fppc.id_wadah')
            ->findAll();

        foreach ($PermohonanUjiRelated as $key => $value) {
            $parameterUji = [
                'jenis_parameter' => $value['jenis_parameter'],
                'standar_uji' => $value['standar_uji'],
                'keterangan_uji' => $value['keterangan_uji'],
                'status' => $value['status'],
                'kode_uji' => $value['kode_uji'],
            ];

            $parameterUjiKey = $value['parameter_uji_id'];
            if (!isset($groupedPermohonanUjiWithArrOfDtlFppc[$parameterUjiKey])) {
                $groupedPermohonanUjiWithArrOfDtlFppc[$parameterUjiKey] = [
                    'parameter_uji' => $parameterUji,
                    'dtl_fppc' => [],
                ];
            }

            $dtlFppcData = [
                'permohonan_uji_id' => $value['id'],
                'dtl_fppc_id' => $value['dtl_fppc_id'],
                'fppc_id' => $value['fppc_id'],
                'id_wadah' => $value['id_wadah'],
                'id_bentuk' => $value['id_bentuk'],
                'nama_lokal' => $value['nama_lokal'] . ' (' . $value['kode_sampel'] . ')',
                'nama_latin' => $value['nama_latin'],
                'jumlah_sampel' => $value['jumlah_sampel'],
                'nama_wadah' => $value['nama_wadah'],
                'nama_bentuk' => $value['nama_bentuk'],
                'image_wadah' => $value['image_wadah'],
            ];
            $dtlFppcData['keterangan_hasil'] = '';
            $dtlFppcData['nilai_hasil'] = '';
            $dtlFppcData['hasil_uji'] = '';
            $dtlFppcData['hasil_uji_id'] = '';
            $dtlFppcData['analis'] = '';

            $groupedPermohonanUjiWithArrOfDtlFppc[$parameterUjiKey]['dtl_fppc'][] = $dtlFppcData;
            $groupedPermohonanUjiWithArrOfDtlFppc[$parameterUjiKey]['permohonan_uji_id'][] = $value['id'];
        }

        $adminData = $AdminModel->where('roleId', 3)->findAll();

        return view('pages/disposisi', [
            'fppc' => $fppcData,
            'title' => 'Disposisi Analis',
            'admin' => $adminData,
            'permohonans' => $groupedPermohonanUjiWithArrOfDtlFppc,
            'analiss' => $analis,
        ]);
    }

}
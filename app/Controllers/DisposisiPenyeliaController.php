<?php

namespace App\Controllers;

class DisposisiPenyeliaController extends BaseController
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

        $query = $fppcModel->select('*')
            ->orderBy($order_by[0], $order_by[1])
            ->limit($perPage, $offset);

        $query->like('fppc.status', "menunggu-disposisi");

        if (!empty($keyword)) {
            $query->like('no_fppc', $keyword);
            $query->orLike('no_ppk', $keyword);
        }

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

        return view('pages/disposisi-penyelia', [
            'keyword' => $keyword,
            'data' => $results,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tipe_permohonan' => $tipe_permohonan,
            'title' => 'Disposisi Penyelia',
        ]);
    }

    public function store()
    {
        $data = [];

        $DisposisiPenyelia = new \App\Models\DisposisiPenyeliaModel();
        $FppcModel = new \App\Models\FppcModel();
        $AktivitasModel = new \App\Models\AktivitasModel();

        $penyelia = $this->request->getPost('penyelia');
        $fppc_id = $this->request->getPost('fppc_id');

        if ($this->request->getMethod() === 'post') {
            // get admin id from session
            $adminId = session()->get('adminId');

            $data = [];

            foreach ($penyelia as $value) {
                $data[] = [
                    'id_fppc' => $fppc_id,
                    'penyelia_id' => $value,
                    'manajer_teknis_id' => $adminId,
                ];
            }

            $DisposisiPenyelia->insertBatch($data);

            $FppcModel->update($fppc_id, ['status' => 'menunggu-pengujian']);

            $activityDescription = 'Penjadwalan pengujian telah dibuat';

            $activityData = [
                'id_fppc' => $fppc_id,
                'description' => $activityDescription,
                'type' => 'penjadwalan',
                'user_id' => session()->get('adminId'),
            ];

            $AktivitasModel->insert($activityData);

            session()->setFlashdata('success', 'Berhasil membuat disposisi');

        }

        return redirect()->to('/disposisi-penyelia');
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

        $adminData = $AdminModel->where('roleId', 2)->findAll();

        return view('pages/disposisi-penyelia-create', [
            'fppc' => $fppcData,
            'title' => 'Disposisi Penyelia',
            'admin' => $adminData,
            'permohonans' => $groupedPermohonanUjiWithArrOfDtlFppc
        ]);
    }

}
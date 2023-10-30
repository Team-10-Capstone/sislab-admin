<?php

namespace App\Controllers;

class LhusController extends BaseController
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

        $query->like('fppc.status', "selesai-pengujian");

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
            $query->where('tipe_permohonan', $tipe_permohonan);
        }

        // Execute the query to retrieve the results
        $results = $query->findAll();


        $totalRecords = count($results);
        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        // Create a pager instance
        $pager = $this->pager;

        return view('pages/lhus', [
            'keyword' => $keyword,
            'data' => $results,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tipe_permohonan' => $tipe_permohonan,
            'title' => 'Daftar LHUS',
        ]);
    }

    public function verifikasipage($id)
    {
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $DisposisiPenyelia = new \App\Models\DisposisiPenyeliaModel();
        $AdminModel = new \App\Models\AdminModel();

        $fppcData = $fppcModel->where('id', $id)->first();

        $disposisis = $DisposisiPenyelia->select('disposisi_penyelia_baru.*, admin.name as nama_admin, admin.email as email_admin, admin.mobile as mobile_admin')
            ->join('admin', 'admin.adminId = disposisi_penyelia_baru.penyelia_id')
            ->where('disposisi_penyelia_baru.id_fppc', $id)
            ->findAll();

        $manajer_id = $disposisis[0]['manajer_teknis_id'];

        $managerData = $AdminModel->where('adminId', $manajer_id)->first();

        $fppcDetailsData = $fppcDetailsModel
            ->where('id_fppc', $id)
            ->findAll();

        if (empty($fppcDetailsData)) {
            return redirect()->to('/fppc');
        }

        $analis = $AdminModel->where('roleId', 3)->findAll();

        $groupedPermohonanUjiWithArrOfDtlFppc = [];

        $dtlFppcIds = array_column($fppcDetailsData, 'id');

        $PermohonanUjiRelated = $permohonanUjiModel
            ->whereIn('permohonan_uji.dtl_fppc_id', $dtlFppcIds)
            ->select('permohonan_uji.*, dtl_fppc.id_fppc as fppc_id, 
            dtl_fppc.id_wadah as id_wadah, dtl_fppc.id_bentuk as id_bentuk, dtl_fppc.nama_lokal as nama_lokal, dtl_fppc.nama_latin as nama_latin, dtl_fppc.jumlah_sampel as jumlah_sampel 
            , parameter_uji.jenis_parameter as jenis_parameter, parameter_uji.standar_uji as standar_uji,
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
                'nama_lokal' => $value['nama_lokal'],
                'nama_latin' => $value['nama_latin'],
                'jumlah_sampel' => $value['jumlah_sampel'],
                'nama_wadah' => $value['nama_wadah'],
                'nama_bentuk' => $value['nama_bentuk'],
                'image_wadah' => $value['image_wadah'],
            ];

            if (!empty($value['hasil_uji_id'])) {
                $analis_id = $value['analis_id'];

                $analisData = $AdminModel->where('adminId', $analis_id)->first();

                $dtlFppcData['keterangan_hasil'] = $value['keterangan_hasil'];
                $dtlFppcData['nilai_hasil'] = $value['nilai_hasil'];
                $dtlFppcData['hasil_uji'] = $value['hasil_uji'];
                $dtlFppcData['hasil_uji_id'] = $value['hasil_uji_id'];
                $dtlFppcData['analis'] = $analisData['name'];
            } else {
                $dtlFppcData['keterangan_hasil'] = '';
                $dtlFppcData['nilai_hasil'] = '';
                $dtlFppcData['hasil_uji'] = '';
                $dtlFppcData['hasil_uji_id'] = '';
                $dtlFppcData['analis'] = '';
            }

            $groupedPermohonanUjiWithArrOfDtlFppc[$parameterUjiKey]['dtl_fppc'][] = $dtlFppcData;
        }

        return view('pages/lhus-verifikasi', [
            'fppc' => $fppcData,
            'title' => 'Verifikasi Hasil Uji',
            'disposisis' => $disposisis,
            'managerData' => $managerData,
            'permohonans' => $groupedPermohonanUjiWithArrOfDtlFppc,
            'analiss' => $analis,
        ]);
    }

    public function verifikasiLhus($id)
    {
        $fppcModel = new \App\Models\FppcModel();

        $fppcData = $fppcModel->where('id', $id)->first();

        $fppcModel->update($id, [
            'status' => 'lhus',
        ]);

        session()->setFlashdata('success', 'Berhasil memverifikasi LHUS');

        return redirect()->to('/lhus');
    }

}
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

        $query = $fppcModel->select('fppc.*, users.username as nama_trader, users.alamat as alamat_trader')
            ->join('users', 'users.user_id = fppc.id_trader')
            ->orderBy($order_by[0], $order_by[1])
            ->limit($perPage, $offset);

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

        $DisposisiAnalisModel = new \App\Models\DisposisiAnalisModel();

        if ($this->request->getMethod() === 'post') {
            // get admin id from session
            $adminId = session()->get('adminId');

            $disposisis = $this->request->getPost('disposisi');

            foreach ($disposisis as $disposisi) {
                foreach ($disposisi['petugas_analis'] as $petugas_analis) {
                    // parse int id_analis
                    $petugas_analis = (int) $petugas_analis;

                    $data = [
                        'id_fppc' => $disposisi['id_fppc'],
                        'id_dtl_fppc' => $disposisi['id_dtl_fppc'],
                        'penyelia_id' => $adminId,
                        'analis_id' => $petugas_analis,
                    ];

                    $DisposisiAnalisModel->insert($data);
                }
            }

            session()->setFlashdata('success', 'Berhasil membuat disposisi');

            return redirect()->to('/disposisi-penyelia');
        }
    }

    public function create()
    {
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $parameterUjiModel = new \App\Models\ParameterUjiModel();
        $adminModel = new \App\Models\AdminModel();

        $id = $this->request->getVar('fppc_id');

        $fppcData = $fppcModel->select('fppc.*, users.username as nama_trader, users.alamat as alamat_trader')
            ->join('users', 'users.user_id = fppc.id_trader')
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

        $adminData = $adminModel->where('roleId', 3)->findAll();

        $returnData = [
            'fppc' => $fppcData,
            'fppc_details' => $mergedFppcDetailsAndPermohonanUji,
            'title' => 'Disposisi Penyelia',
            'admin' => $adminData,
        ];

        // dd($returnData);

        return view('pages/disposisi-penyelia-create', $returnData);

    }
}
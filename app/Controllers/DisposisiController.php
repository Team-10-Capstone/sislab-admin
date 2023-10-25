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

        $DisposisiPenyelia = new \App\Models\DisposisiPenyeliaModel();
        $FppcModel = new \App\Models\FppcModel();

        if ($this->request->getMethod() === 'post') {
            // get admin id from session
            $adminId = session()->get('adminId');

            $disposisi = $this->request->getPost('disposisi');
            foreach ($disposisi['petugas_penyelia'] as $petugas_penyelia) {
                // parse int id_analis
                $petugas_penyelia = (int) $petugas_penyelia;

                $tanggal_pengujian = $disposisi['tanggal_pengujian'];
                $waktu_pengujian = $disposisi['waktu_pengujian'];

                $mergedDateTime = $tanggal_pengujian . ' ' . $waktu_pengujian;

                // Create a DateTime object from the merged date and time string
                $datetime = new \DateTime($mergedDateTime);

                // Format the DateTime object in the desired format (datetime2)
                $formattedDateTime = $datetime->format('Y-m-d H:i:s');

                $data = [
                    'id_fppc' => $disposisi['id_fppc'],
                    'penyelia_id' => $petugas_penyelia,
                    'manajer_teknis_id' => $adminId,
                    'tanggal_pengujian' => $formattedDateTime,
                    'waktu_pengujian' => $waktu_pengujian,
                ];

                $DisposisiPenyelia->insert($data);
            }


            $FppcModel->update($disposisi['id_fppc'], ['status' => 'menunggu-pengujian']);

            session()->setFlashdata('success', 'Berhasil membuat disposisi');

            return redirect()->to('/disposisi-penyelia');
        }
    }

    public function create()
    {
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $adminModel = new \App\Models\AdminModel();

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

        $adminData = $adminModel->where('roleId', 2)->findAll();

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
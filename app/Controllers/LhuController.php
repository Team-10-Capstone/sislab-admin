<?php

namespace App\Controllers;

class LhuController extends BaseController
{
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }

    public function print($id)
    {
        $fppcModel = new \App\Models\FppcModel();
        $dtlFppcModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $hasilUjiModel = new \App\Models\HasilUjiModel();
        $disposisiAnalisModel = new \App\Models\DisposisiAnalisModel();

        $fppcData = $fppcModel->find($id);

        $dtlFppc = $dtlFppcModel->where('id_fppc', $id)->findAll();

        $dtlFppcIds = array_map(function ($item) {
            return $item['id'];
        }, $dtlFppc);

        $relatedPermohonanUji = $permohonanUjiModel->select('permohonan_uji.dtl_fppc_id, permohonan_uji.kode_sampel, permohonan_uji.parameter_uji_id, hasil_uji.hasil_uji, parameter_uji.keterangan_uji, parameter_uji.standar_uji, parameter_uji.no_ikm')
            ->whereIn('permohonan_uji.dtl_fppc_id', $dtlFppcIds)
            ->join('hasil_uji', 'hasil_uji.permohonan_uji_id = permohonan_uji.id')
            ->join('parameter_uji', 'parameter_uji.id = permohonan_uji.parameter_uji_id')
            ->findAll();

        $disposisi = $disposisiAnalisModel->where('id_fppc', $id)->first();

        $groupedDtlFppcWithArrOfPermohonan = [];

        foreach ($dtlFppc as $dtl) {
            $related = array_filter($relatedPermohonanUji, function ($item) use ($dtl) {
                return $item['dtl_fppc_id'] == $dtl['id'];
            });

            $groupedDtlFppcWithArrOfPermohonan[] = [
                'dtl_fppc' => $dtl,
                'permohonan_uji' => $related,
            ];
        }

        return view('pages/lhu-print', [
            'sampels' => $groupedDtlFppcWithArrOfPermohonan,
            'fppc' => $fppcData,
            'tanggal_pengujian' => $disposisi['tanggal_pengujian'],
            'title' => 'Print LHU',
        ]);
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

        $query->like('fppc.status', "terbit-lhu");

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

        return view('pages/lhu', [
            'keyword' => $keyword,
            'data' => $results,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tipe_permohonan' => $tipe_permohonan,
            'title' => 'Daftar LHU',
        ]);
    }
}
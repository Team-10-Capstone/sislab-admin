<?php

namespace App\Controllers;

class PpkController extends BaseController
{
    protected $pager;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $karimutu = db_connect('karimutu');
        $fppcModel = new \App\Models\FppcModel();

        // Get the page number from the URL, default to 1 if not provided
        $page = $this->request->getVar('page') ?? 1;

        // search
        $keyword = $this->request->getVar('keyword') ?? '';

        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $kd_kegiatan = $this->request->getVar('kd_kegiatan');
        $order_by_raw = $this->request->getVar('order_by') ?? 'tgl_berangkat-asc';

        $order_by = explode('-', $order_by_raw);

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        $fppc = $fppcModel->findAll();

        $ids = array_map(function ($item) {
            return $item['id_ppk'];
        }, $fppc);

        // not in query
        $query = "SELECT * FROM tr_mst_pelaporan
          WHERE (nm_penerima LIKE ? OR nm_trader LIKE ?)";

        if (!empty($ids)) {
            $query .= " AND id_ppk NOT IN (" . implode(',', $ids) . ")";
        }

        $bindings = ['%' . $keyword . '%', '%' . $keyword . '%'];

        if (!empty($kd_kegiatan)) {
            $query .= " AND kd_kegiatan = ?";
            $bindings[] = $kd_kegiatan;
        }

        if (!empty($start_date) && !empty($end_date)) {
            $query .= " AND tgl_berangkat BETWEEN ? AND ?";
            $bindings[] = $start_date;
            $bindings[] = $end_date;
        }

        if (!empty($order_by)) {
            $query .= " ORDER BY " . $order_by[0] . " " . $order_by[1];
        }

        $totalRecords = count($karimutu->query($query, $bindings)->getResultArray());

        $query .= " OFFSET ? ROWS FETCH NEXT ? ROWS ONLY ";
        $bindings[] = $offset;
        $bindings[] = $perPage;

        $data = $karimutu->query($query, $bindings)->getResultArray();


        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        // Create a pager instance
        $pager = $this->pager;

        return view('pages/permohonan-ppk', [
            'keyword' => $keyword,
            'data' => $data,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'kd_kegiatan' => $kd_kegiatan,
            'title' => 'Permohonan PPK'
        ]);
    }
}
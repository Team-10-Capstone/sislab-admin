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

        // Get the page number from the URL, default to 1 if not provided
        $page = $this->request->getVar('page') ?? 1;

        // search
        $keyword = $this->request->getVar('keyword') ?? '';

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        // Query for the data with pagination
        $data = $karimutu->table('tr_mst_pelaporan')
            ->like('nm_penerima', $keyword)
            ->orLike('nm_trader', $keyword)
            ->limit($perPage, $offset)
            ->get()
            ->getResultArray();

        // Get the total number of records for pagination
        $totalRecords = $karimutu->table('tr_mst_pelaporan')
            ->like('nm_penerima', $keyword)
            ->orLike('nm_trader', $keyword)
            ->countAllResults();

        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        // Create a pager instance
        $pager = $this->pager;

        return view('pages/permohonan-ppk', [
            'keyword' => $keyword,
            'data' => $data,
            'pager' => $pager,
            'pager_links' => $pager_links,
            'title' => 'Permohonan PPK'
        ]);
    }
}
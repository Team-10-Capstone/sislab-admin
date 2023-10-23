<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BentukModal;

class BentukController extends BaseController
{
    protected $pager;
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $BentukModal = new BentukModal();

        $page = $this->request->getVar('page') ?? 1;

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        $bentuk = $BentukModal->findAll($perPage, $offset);

        $totalRecords = count($BentukModal->findAll());

        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        return view('pages/bentuk-list', [
            'title' => 'Daftar bentuk',
            'bentuks' => $bentuk,
            'pager_links' => $pager_links,
        ]);
    }

    public function create()
    {
        helper(['form', 'url']);

        $BentukModal = new BentukModal();

        $data = [
            'nama_bentuk' => $this->request->getPost('nama'),
        ];

        $BentukModal->insert($data);

        session()->setFlashdata('success', 'bentuk berhasil ditambahkan.');
        return redirect()->to('/bentuk');

    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $BentukModal = new BentukModal();
        $data = [
            'nama_bentuk' => $this->request->getPost('nama'),
        ];

        $BentukModal->update($id, $data);

        session()->setFlashdata('success', 'bentuk berhasil diubah.');
        return redirect()->to('/bentuk');
    }

    public function delete($id)
    {
        $BentukModal = new BentukModal();

        $BentukModal->delete($id);

        session()->setFlashdata('success', 'bentuk berhasil dihapus.');
        return redirect()->to('/bentuk');
    }
}

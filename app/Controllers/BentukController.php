<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BentukModel;

class BentukController extends BaseController
{
    protected $pager;
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $BentukModel = new BentukModel();

        $page = $this->request->getVar('page') ?? 1;

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        $bentuk = $BentukModel->findAll($perPage, $offset);

        $totalRecords = count($BentukModel->findAll());

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

        $BentukModel = new BentukModel();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama' => 'required',
            ];

            if (!$this->validate($rules)) {
                session()->setFlashdata('error', $this->validator->getErrors());
                return redirect()->to('/bentuk');
            }

            $data = [
                'nama_bentuk' => $this->request->getPost('nama'),
            ];

            $BentukModel->insert($data);

            session()->setFlashdata('success', 'bentuk berhasil ditambahkan.');
            return redirect()->to('/bentuk');
        }

        return redirect()->to('/404');
    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $BentukModel = new BentukModel();
        $data = [
            'nama_bentuk' => $this->request->getPost('nama'),
        ];

        $BentukModel->update($id, $data);

        session()->setFlashdata('success', 'bentuk berhasil diubah.');
        return redirect()->to('/bentuk');
    }

    public function delete($id)
    {
        $BentukModel = new BentukModel();

        $BentukModel->delete($id);

        session()->setFlashdata('success', 'bentuk berhasil dihapus.');
        return redirect()->to('/bentuk');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    protected $pager;
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $adminModel = new AdminModel();
        $page = $this->request->getVar('page') ?? 1;

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        $admin = $adminModel->findAll($perPage, $offset);

        $totalRecords = count($adminModel->findAll());

        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        return view('pages/admin', [
            'title' => 'Daftar Admin',
            'admins' => $admin,
            'pager_links' => $pager_links,
        ]);

    }

    public function create()
    {
        helper(['form', 'url']);

        $adminModel = new AdminModel();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'roleId' => 'required',
                'password' => 'required',
            ];

            // if (!$this->validate($rules)) {
            //     dd($this->validator->getErrors());
            //     $errors = $this->validator->getErrors();
            //     $errorString = implode("\n", $errors);
            //     session()->setFlashdata('errors', $errorString);
            //     return redirect()->to('/admin');
            // }

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'roleId' => $this->request->getPost('roleId'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $adminModel->insert($data);

            session()->setFlashdata('success', 'Berhasil menambahkan data.');

            return redirect()->to('/admin');
        }

    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $adminModel = new AdminModel();

        if ($this->request->getMethod() === 'post') {
            $rulesAdmin = [
                'name' => 'required',
                'email' => 'required',
                'roleId' => 'required',
                'password' => 'required',
            ];

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'roleId' => $this->request->getPost('roleId'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            if (!$this->validateData($data, $rulesAdmin)) {
                $errors = $this->validator->getErrors();
                $errorString = implode("\n", $errors);
                session()->setFlashdata('errors', $errorString);
                return redirect()->to('/admin');
            }

            $adminModel->update($id, $data);

            session()->setFlashdata('success', 'Berhasil mengubah data.');

            return redirect()->to('/admin');
        }
    }

    public function delete($id)
    {
        $AdminModel = new AdminModel();

        $AdminModel->delete($id);

        session()->setFlashdata('success', 'admin berhasil dihapus.');
        return redirect()->to('/admin');
    }
}
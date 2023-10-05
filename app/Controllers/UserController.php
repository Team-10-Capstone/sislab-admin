<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class UserController extends BaseController
{
    public function index()
    {
        $adminModel = new AdminModel();
        $data['admin'] = $adminModel->findAll();
        $data['title'] = 'Daftar Admin';
        return view('pages/user', $data);
    }

    public function delete($id)
    {
        $adminModel = new AdminModel();
        $adminModel->delete($id);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $adminModel = new AdminModel();
        $data['admin'] = $adminModel->find($id);
        $data['title'] = 'Edit User';
        return view('pages/edit-user-form', $data);
    }

    public function update($id)
    {
        $adminModel = new AdminModel();
        $adminModel->update($id, [
            'name' => $this->request->getVar('name'),
            'roleId' => $this->request->getVar('roleId'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'mobile' => $this->request->getVar('mobile'),
            'updatedBy' => session()->get('adminId')
        ]);
        return redirect()->to('/user');
    }

    public function add()
    {
        $data['title'] = 'Tambah User';
        return view('pages/add-user-form', $data);
    }

    public function store()
    {
        $adminModel = new AdminModel();
        $adminModel->save([
            'name' => $this->request->getVar('name'),
            'roleId' => $this->request->getVar('roleId'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'mobile' => $this->request->getVar('mobile'),
            'isDeleted' => 0,
        ]);

        return redirect()->to('/user');
    }
}
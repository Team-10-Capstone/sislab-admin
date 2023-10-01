<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        $data['title'] = 'Daftar Admin';
        return view('pages/user', $data);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        $data['title'] = 'Edit User';
        return view('pages/edit-user-form', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $userModel->update($id, [
            'name' => $this->request->getVar('name'),
            'roleId' => $this->request->getVar('roleId'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'mobile' => $this->request->getVar('mobile'),
            'updatedBy' => session()->get('userId')
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
        $userModel = new UserModel();
        $userModel->save([
            'name' => $this->request->getVar('name'),
            'roleId' => $this->request->getVar('roleId'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'mobile' => $this->request->getVar('mobile'),
            'createdBy' => session()->get('userId'),
            'isDeleted' => 0,
            'updatedBy' => session()->get('userId')
        ]);

        return redirect()->to('/user');
    }
}
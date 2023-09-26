<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DaftarLhuController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        $data['title'] = 'Daftar LHU';
        return view('pages/daftar-lhu', $data);

    }
}
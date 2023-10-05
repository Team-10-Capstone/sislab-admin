<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class DaftarLhuController extends BaseController
{
    public function index()
    {
        $adminModel = new AdminModel();
        $data['admin'] = $adminModel->findAll();
        $data['title'] = 'Daftar LHU';
        return view('pages/daftar-lhu', $data);

    }
}
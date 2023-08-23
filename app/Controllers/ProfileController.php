<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $data['title'] = "Profile";
        echo view('pages/profile', $data);
    }
}
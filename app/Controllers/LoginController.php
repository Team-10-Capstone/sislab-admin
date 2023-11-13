<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;

class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data['title'] = "Login";
        return view('pages/login', $data);
    }

    public function loginAuth()
    {
        $session = session();
        $adminModel = new AdminModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = $adminModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'adminId' => $data['adminId'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'role' => $data['roleId'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');

            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
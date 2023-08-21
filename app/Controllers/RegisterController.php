<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class RegisterController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('pages/register', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => [
                'rules'  => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Name is required',
                    'min_length' => 'Name must have at least 3 characters in length',
                    'max_length' => 'Name must have at least 20 characters in length'
                ]
            ],
            'email'         => [
                'rules'  => 'required|valid_email|is_unique[tbl_users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Email must be valid',
                    'is_unique' => 'Email already exist'
                ]
            ],
            'password'      => [
                'rules'  => 'required|min_length[6]|max_length[16]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 6 characters in length',
                    'max_length' => 'Password must have at least 16 characters in length'
                ]
            ],
            'confirm-password'  => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'matches' => 'Confirm Password must match with Password'
                ]
                ],
            'terms' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please accept the terms and conditions'
                ]
            ]
        ];
          
        if($this->validate($rules)){

            $userModel = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
        }else{
            $data['validation'] = $this->validator;
            echo view('pages/register', $data);
        }
          
    }
  
}
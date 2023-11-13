<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\LoginController;
use App\Controllers\AdminController;
use App\Models\AdminModel;
use CodeIgniter\Test\DatabaseTestTrait;

class LoginControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testLogin()
    {
        $AdminModel = new AdminModel();

        $admin = [
            'name' => 'admin1',
            'email' => 'admin1@mail.com',
            'password' => password_hash('admin1', PASSWORD_DEFAULT),
            'roleId' => 1,
        ];

        $AdminModel->insert($admin);

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'email' => 'admin1@mail.com',
                'password' => 'admin1',
            ]);

        $result = $this->withRequest($request)->controller(LoginController::class)->execute('loginAuth');

        $result->assertOK();
        $result->assertRedirectTo('/');
    }

    public function testLogintPasswordNotMatch()
    {
        $AdminModel = new AdminModel();

        $admin = [
            'name' => 'admin1',
            'email' => 'admin1@mail.com',
            'password' => password_hash('admin1', PASSWORD_DEFAULT),
            'roleId' => 1,
        ];

        $AdminModel->insert($admin);

        $requestAdmin = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'email' => 'admin1@mail.com',
                'password' => 'admin123',
            ]);

        $resultAdmin = $this->withRequest($requestAdmin)->controller(LoginController::class)
            ->execute('loginAuth');

        $resultAdmin->assertOK();
        $resultAdmin->assertRedirectTo('/login');
        $resultAdmin->assertSessionHas('msg', 'Password is incorrect.');
    }

    public function testLogintFail()
    {
        $requestAdmin = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'email' => null,
                'password' => null,
            ]);

        $resultAdmin = $this->withRequest($requestAdmin)->controller(LoginController::class)
            ->execute('loginAuth');

        $resultAdmin->assertOK();
        $resultAdmin->assertRedirectTo('/login');

    }

    public function testLogout()
    {
        $request = $this->request
            ->withMethod('post');

        $result = $this->withRequest($request)->controller(LoginController::class)->execute('logout');

        $result->assertOK();
        $result->assertRedirectTo('/login');

    }

    public function testIndex()
    {
        $request = $this->request
            ->withMethod('get');

        $result = $this->withRequest($request)->controller(LoginController::class)->execute('index');

        $result->assertOK();
        $result->assertSee('Login');
    }

}



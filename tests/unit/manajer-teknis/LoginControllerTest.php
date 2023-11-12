<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\LoginController;
use App\Controllers\AdminController;
use CodeIgniter\Test\DatabaseTestTrait;

class LoginControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testCreatePost()
    {
        $requestAdmin = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'name' => 'Admin 1',
                'email' => 'admin1@mail.com',
                'roleId' => '1',
                'password' => 'admin1',
            ]);

        $resultAdmin = $this->withRequest($requestAdmin)->controller(AdminController::class)
            ->execute('create');

        $resultAdmin->assertOK();

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

}



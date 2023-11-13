<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\AdminController;
use CodeIgniter\Test\DatabaseTestTrait;

class AdminControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->controller(AdminController::class)
            ->execute('index');

        $result->assertTrue($result->isOK());
        $result->assertStringContainsString('Daftar Admin', $result->getBody());
    }

    public function testCreatePost()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'name' => 'Admin 1',
                'email' => 'admin1@mail.com',
                'roleId' => 1,
                'password' => 'admin1',
            ]);

        $result = $this->withRequest($request)->controller(AdminController::class)
            ->execute('create');

        $result->assertOK();
        $result->assertRedirectTo('/admin');
        $result->assertTrue(session()->has('success'));
    }

    public function testCreatePostError()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'name' => null,
                'email' => null,
                'roleId' => 1,
                'password' => 'admin1',
            ]);


        $result = $this->withRequest($request)->controller(AdminController::class)
            ->execute('create');

        $result->assertOK();
        $result->assertRedirectTo('/admin');
        $result->assertTrue(session()->has('errors'));
    }

    public function testEdit()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'name' => 'Admin 1',
                'email' => 'admin1@mail.com',
                'roleId' => 1,
                'password' => 'admin1',
            ]);

        $result = $this->withRequest($request)->controller(AdminController::class)
            ->execute('edit', 1);

        $result->assertTrue($result->isOK());
        $result->assertRedirectTo('/admin');
        $result->assertTrue(session()->has('success'));
    }

    public function testEditError()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'name' => null,
                'email' => null,
                'roleId' => 1,
                'password' => 'admin1',
            ]);

        $result = $this->withRequest($request)->controller(AdminController::class)
            ->execute('edit', 1);

        $result->assertTrue($result->isOK());
        $result->assertRedirectTo('/admin');
        $result->assertTrue(session()->has('errors'));

    }

    public function testDelete()
    {
        $result = $this->controller(AdminController::class)
            ->execute('delete', 1);

        $result->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/admin');
    }
}



<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\BentukController;
use CodeIgniter\Test\DatabaseTestTrait;

class BentukControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->controller(BentukController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Daftar bentuk', $result->getBody());
    }

    public function testCreatePost()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'nama' => 'Bentuk 1',
            ]);

        $result = $this->withRequest($request)->controller(BentukController::class)
            ->execute('create');

        $requestError = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'nama' => null,
            ]);

        $resultError = $this->withRequest($requestError)->controller(BentukController::class)
            ->execute('create');

        $result->assertOK();
        $resultError->assertTrue(session()->has('error'));

        $result->assertOK();
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/bentuk');
    }

    public function testEdit()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'nama' => 'Bentuk 1',
            ]);

        $result = $this->withRequest($request)->controller(BentukController::class)
            ->execute('edit', 1);

        $this->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/bentuk');
    }

    public function testDelete()
    {
        $result = $this->controller(BentukController::class)
            ->execute('delete', 1);

        $this->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/bentuk');
    }
}



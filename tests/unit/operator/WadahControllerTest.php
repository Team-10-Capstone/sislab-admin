<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\WadahController;
use CodeIgniter\Test\DatabaseTestTrait;

class WadahControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->controller(WadahController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Daftar Wadah', $result->getBody());
    }

    public function testCreatePost()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'nama' => 'Wadah 1',
                'image' => 'http://localhost:8080/uploads/wadah2.jpg'
            ]);

        $result = $this->withRequest($request)->controller(WadahController::class)
            ->execute('create');

        // $result->assertTrue(session()->has('success'));
        $result->assertOK();
        $result->assertRedirectTo('/wadah');

    }

    public function testEdit()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'nama' => 'Wadah 1',
                'image' => 'http://localhost:8080/uploads/wadah2.jpg'
            ]);

        $result = $this->withRequest($request)->controller(WadahController::class)
            ->execute('edit', '1');

        $result->assertOK();
        $result->assertRedirectTo('/wadah');

    }

    public function testDelete()
    {
        $result = $this->controller(WadahController::class)
            ->execute('delete', 1);

        $this->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/wadah');
    }
}



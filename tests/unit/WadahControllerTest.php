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

        $result->assertOK();
        $result->assertRedirectTo('/wadah');

    }
}



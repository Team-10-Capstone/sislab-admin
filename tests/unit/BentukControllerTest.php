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

    public function testCreatePost()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'nama' => 'Bentuk 1',
            ]);

        $result = $this->withRequest($request)->controller(BentukController::class)
            ->execute('create');

        $result->assertOK();
        $result->assertRedirectTo('/bentuk');
    }
}



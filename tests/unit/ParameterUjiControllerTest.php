<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\ParameterUjiController;
use CodeIgniter\Test\DatabaseTestTrait;

class ParameterUjiControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testCreatePost()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'kode_uji' => '100',
                'jenis_parameter' => 'PARASIT',
                'keterangan_uji' => 'Uji Parasit',
                'standar_uji' => 'negatif',
                'no_ikm' => 'IKM-001',
            ]);

        $result = $this->withRequest($request)->controller(ParameterUjiController::class)
            ->execute('create');

        $result->assertOK();
        $result->assertRedirectTo('/parameter');
    }
}



<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\FppcController;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\WadahModel;
use App\Models\BentukModel;
use App\Models\ParameterUjiModel;
use CodeIgniter\Test\Fabricator;


class FppcControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testCreatePost()
    {
        $formattersWadah = [
            'nama_wadah' => 'firstName',
            'image' => 'imageUrl',
        ];

        $formattersBentuk = [
            'nama_bentuk' => 'firstName',
        ];

        $formattersParameterUji = [
            'kode_uji' => 'randomNumber',
            'jenis_parameter' => 'randomElement',
            'keterangan_uji' => 'sentence',
            'standar_uji' => 'firstName',
            'no_ikm' => 'randomNumber',
        ];

        $fabricatorWadah = new Fabricator(WadahModel::class, $formattersWadah);

        $wadah = $fabricatorWadah->create();

        $fabricatorBentuk = new Fabricator(BentukModel::class, $formattersBentuk);

        $bentuk = $fabricatorBentuk->create();

        $fabricatorParameterUji = new Fabricator(ParameterUjiModel::class, $formattersParameterUji);

        $parameter_uji = $fabricatorParameterUji->create();

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'ppk' => [
                    [
                        'id_kd_ikan' => '48418',
                        'jumlah' => '4',
                        'wadah' => $wadah['id'],
                        'bentuk' => $bentuk['id'],
                        'target_uji' => [$parameter_uji['id']]
                    ]
                ]
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('store', '711572');

        $result->assertOK();
        $result->assertRedirectTo('/ppk');
    }
}



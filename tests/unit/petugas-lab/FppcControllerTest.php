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


    public function testIndex()
    {
        $result = $this->controller(FppcController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Daftar FPPC', $result->getBody());
    }

    public function testIndexWithFilters()
    {
        $request = $this->request
            ->withMethod('get')
            ->setGlobal('request', [
                'keyword' => 'a',
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-01',
                'tipe_permohonan' => 'lalulintas'
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Daftar FPPC', $result->getBody());
    }

    public function testCreatePage()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('request', [
                'ppk_id' => '711573',
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('create');

        $result->assertTrue($result->isOK());
        $result->assertStringContainsString('Pengajuan Permohonan Uji Lab', $result->getBody());
    }

    public function testCreatePageError()
    {
        $request = $this->request
            ->withMethod('post')
            ->setGlobal('request', [
                'ppk_id' => null,
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('create');

        $result->assertTrue($result->isOK());
        $result->assertRedirectTo('/ppk');
    }

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

        session()->set('adminId', '1');

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'ppk' => [
                    [
                        'id_kd_ikan' => '48157',
                        'jumlah' => '4',
                        'wadah' => $wadah['id'],
                        'bentuk' => $bentuk['id'],
                        'target_uji' => [$parameter_uji['id']]
                    ]
                ]
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('store', '711573');

        $result->assertOK();
        $result->assertRedirectTo('/ppk');
    }

    public function testCreatePageErrorFppcAlreadyCreated()
    {
        $this->testCreatePost();

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('request', [
                'ppk_id' => '711573',
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('create');

        $result->assertTrue($result->isOK());
        $result->assertRedirectTo('/ppk');
    }

    public function testDelete()
    {
        $this->testCreatePost();

        $result = $this->controller(FppcController::class)
            ->execute('delete', '1');

        $this->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/fppc');
    }

    public function testUpdateStatus()
    {
        $this->testCreatePost();

        $result = $this->controller(FppcController::class)
            ->execute('updateStatus', '1', '1');

        $this->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/fppc');
    }
    public function testUpdateStatusNotExist()
    {
        $this->testCreatePost();

        $result = $this->controller(FppcController::class)
            ->execute('updateStatus', '1', '4');

        $this->assertTrue($result->isOK());
        $result->assertTrue(session()->has('errors'));
        $result->assertRedirectTo('/fppc');
    }

    public function testVerifyFppc()
    {
        $this->testCreatePost();

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('request', [
                'fppc_id' => '1',
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('verify');

        $result->assertTrue($result->isOK());
        $result->assertStringContainsString('Verifikasi Permohonan Uji Lab', $result->getBody());
    }
    public function testVerifyFppcNotValid()
    {
        $this->testCreatePost();

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('request', [
                'fppc_id' => '23232323',
            ]);

        $result = $this->withRequest($request)->controller(FppcController::class)
            ->execute('verify');

        $result->assertTrue($result->isOK());
        $result->assertRedirectTo('/fppc');
    }
}



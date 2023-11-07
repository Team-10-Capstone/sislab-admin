<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\FppcController;
use App\Controllers\DisposisiController;
use App\Controllers\AdminController;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\FppcModel;
use App\Models\WadahModel;
use App\Models\BentukModel;
use App\Models\ParameterUjiModel;
use App\Models\PermohonanUjiModel;
use App\Models\DtlFppcModel;
use CodeIgniter\Test\Fabricator;

class DisposisiControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testCreatePost()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();

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

        $fppcRequest = $this->request
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

        $fppcResult = $this->withRequest($fppcRequest)->controller(FppcController::class)
            ->execute('store', '711573');

        $fppcResult->assertOK();

        $requestAdmin = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'name' => 'Admin 1',
                'email' => 'admin1@mail.com',
                'roleId' => 1,
                'password' => 'admin1',
            ]);

        $resultAdmin = $this->withRequest($requestAdmin)->controller(AdminController::class)
            ->execute('create');

        $resultAdmin->assertOK();

        $fppc = $fppcModel->first();

        $fppcId = $fppc['id'];

        $dtlFppcs = $dtlFppcModel->where('id_fppc', $fppcId)->findAll();

        $dtlFppcIds = array_map(function ($dtlFppc) {
            return $dtlFppc['id'];
        }, $dtlFppcs);

        $permohonanRelated = $permohonanUjiModel->whereIn('dtl_fppc_id', $dtlFppcIds)->findAll();

        $permohonanIds = array_map(function ($permohonan) {
            return $permohonan['id'];
        }, $permohonanRelated);

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'disposisi' => [
                    [
                        'fppc_id' => $fppc['id'],
                        'permohonan_uji_id' => $permohonanIds,
                        'petugas_penyelia' => [1],
                        'tanggal_pengujian' => '2021-08-01',
                        'waktu_pengujian' => '08:00',
                    ],
                ]
            ]);

        $result = $this->withRequest($request)->controller(DisposisiController::class)
            ->execute('store');

        $result->assertRedirectTo('/disposisi-penyelia');
    }
}



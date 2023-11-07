<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\FppcController;
use App\Controllers\DisposisiController;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\FppcModel;
use App\Models\WadahModel;
use App\Models\BentukModel;
use App\Models\ParameterUjiModel;
use CodeIgniter\Test\Fabricator;

class DisposisiControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testCreatePost()
    {
        $formatterFppc = [
            'no_fppc' => 'randomNumber',
            'no_ppk' => 'randomNumber',
            'tgl_ppk' => 'date',
            'id_ppk' => 'randomNumber',
            'id_trader' => 'randomNumber',
            'id_petugas' => 'randomNumber',
            'nip_baru' => 'randomNumber',
            'tgl_monsur' => 'date',
            'petugas_monsur' => 'randomNumber',
            'status' => 'randomNumber',
            'tipe_permohonan' => 'randomNumber',
            'nama_trader' => 'firstName',
            'alamat_trader' => 'address',
            'nama_penerima' => 'firstName',
            'alamat_penerima' => 'address',
        ];

        $fabricatorFppc = new Fabricator(FppcModel::class, $formatterFppc);

        $fppc = $fabricatorFppc->create();

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'disposisi' => [
                    [
                        'fppc_id' => $fppc['id'],
                        'permohonan_uji_id' => [],
                        'petugas_penyelia' => [1],
                        'tanggal_pengujian' => '2021-08-01',
                        'waktu_pengujian' => '08:00',
                    ],
                    [
                        'fppc_id' => $fppc['id'],
                        'permohonan_uji_id' => [],
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



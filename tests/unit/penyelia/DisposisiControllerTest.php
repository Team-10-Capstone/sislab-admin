<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\DisposisiController;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\FppcModel;
use App\Models\WadahModel;
use App\Models\BentukModel;
use App\Models\ParameterUjiModel;
use App\Models\PermohonanUjiModel;
use App\Models\DtlFppcModel;
use App\Models\AdminModel;
use CodeIgniter\Test\Fabricator;

class DisposisiControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->controller(DisposisiController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Disposisi Analis', $result->getBody());
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

        $result = $this->withRequest($request)->controller(DisposisiController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Disposisi Analis', $result->getBody());
    }

    public function testStoreDisposisi() {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $permohonanUji = new PermohonanUjiModel();
        $AdminModel = new AdminModel();

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

        $data_fppc = [
            'no_fppc' => '123456789',
            'no_ppk' => '711573',
            'tgl_ppk' => '2021-08-01',
            'id_ppk' => '1',
            'id_trader' => '1',
            'id_petugas' => '1',
            'nip_baru' => null,
            'tgl_monsur' => null,
            'petugas_monsur' => null,
            'nama_trader' => 'PT. ABC',
            'alamat_trader' => 'Jl. ABC',
            'nama_penerima' => 'PT. DEF',
            'alamat_penerima' => 'Jl. DEF',
            'tipe_permohonan' => 'monsur',
        ];

        $fppcData = $fppcModel->insert($data_fppc);

        $data_dtlFppc = [
            'id_fppc' => $fppcData,
            'id_ikan' => '48157',
            'jumlah' => '4',
            'id_wadah' => $wadah['id'],
            'id_bentuk' => $bentuk['id'],
            'target_uji' => $parameter_uji['id'],
            'nama_lokal' => 'Ikan Hias',
            'nama_latin' => 'Ikan Hias Latin',
            'nama_umum' => 'Ikan Hias Umum',
            'jenis_ikan' => 'hias',
            'asal_sampel' => 'asal',
            'jumlah_sampel' => '4',
            'kode_pelanggan' => '123456789',
            'deskripsi_sampel' => 'Deskripsi Sampel',
        ];

        $dtlFppcData = $dtlFppcModel->insert($data_dtlFppc);

        $data_permohonanUji = [
            'kode_sampel' => '123456789',
            'dtl_fppc_id' => $dtlFppcData,
            'parameter_uji_id' => $parameter_uji['id'],
            'status' => 'pending',
        ];

        $permohonanData = $permohonanUjiModel->insert($data_permohonanUji);

        $admin = [
            'name' => 'admin1',
            'email' => 'admin1@mail.com',
            'password' => password_hash('admin1', PASSWORD_DEFAULT),
            'roleId' => 1,
        ];

        $penyelia = [
            'name' => 'penyelia1',
            'email' => 'penyelia1@mail.com',
            'password' => password_hash('penyelia1', PASSWORD_DEFAULT),
            'roleId' => 2,
        ];

        $ManajerTeknisData = $AdminModel->insert($admin);

        $penyeliaData = $AdminModel->insert($penyelia);

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', [
                'disposisi' => [
                    [
                        'fppc_id' => $fppcData,
                        'permohonan_uji_id' => [$permohonanData],
                        'petugas_analis' => [$penyeliaData],
                        'tanggal_pengujian' => '2021-08-01',
                        'waktu_pengujian' => '08:00',
                    ],
                ]
            ]);

        $result = $this->withRequest($request)->controller(DisposisiController::class)
            ->execute('store');

        $result->assertRedirectTo('/disposisi-analis');
    }

    public function testCreateDisposisiPage()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $permohonanUji = new PermohonanUjiModel();

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

        $data_fppc = [
            'no_fppc' => '123456789',
            'no_ppk' => '711573',
            'tgl_ppk' => '2021-08-01',
            'id_ppk' => '1',
            'id_trader' => '1',
            'id_petugas' => '1',
            'nip_baru' => null,
            'tgl_monsur' => null,
            'petugas_monsur' => null,
            'nama_trader' => 'PT. ABC',
            'alamat_trader' => 'Jl. ABC',
            'nama_penerima' => 'PT. DEF',
            'alamat_penerima' => 'Jl. DEF',
            'tipe_permohonan' => 'monsur',
        ];

        $fppcData = $fppcModel->insert($data_fppc);

        $data_dtlFppc = [
            'id_fppc' => $fppcData,
            'id_ikan' => '48157',
            'jumlah' => '4',
            'id_wadah' => $wadah['id'],
            'id_bentuk' => $bentuk['id'],
            'target_uji' => $parameter_uji['id'],
            'nama_lokal' => 'Ikan Hias',
            'nama_latin' => 'Ikan Hias Latin',
            'nama_umum' => 'Ikan Hias Umum',
            'jenis_ikan' => 'hias',
            'asal_sampel' => 'asal',
            'jumlah_sampel' => '4',
            'kode_pelanggan' => '123456789',
            'deskripsi_sampel' => 'Deskripsi Sampel',
        ];

        $dtlFppcData = $dtlFppcModel->insert($data_dtlFppc);

        $data_permohonanUji = [
            'kode_sampel' => '123456789',
            'dtl_fppc_id' => $dtlFppcData,
            'parameter_uji_id' => $parameter_uji['id'],
            'status' => 'pending',
        ];

        $permohonanUjiModel->insert($data_permohonanUji);

        $result = $this->controller(DisposisiController::class)
            ->execute('createDisposisiViews', $fppcData);

        $result->assertTrue($result->isOK());
        $result->assertStringContainsString('Disposisi Analis', $result->getBody());
    }
}



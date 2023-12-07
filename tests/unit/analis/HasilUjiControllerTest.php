<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\HasilUjiController;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\FppcModel;
use App\Models\AdminModel;
use App\Models\WadahModel;
use App\Models\BentukModel;
use App\Models\ParameterUjiModel;
use App\Models\PermohonanUjiModel;
use App\Models\DtlFppcModel;
use App\Models\DisposisiPenyeliaModel;
use App\Models\DisposisiAnalisModel;
use App\Models\HasilUjiModel;
use CodeIgniter\Test\Fabricator;

class HasilUjiControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;


    public function testInputHasilUji()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $disposisiPenyeliaModel = new DisposisiPenyeliaModel();
        $disposisiAnalisModel = new DisposisiAnalisModel();
        $AdminModel = new AdminModel();
        $ParameterUjiModel = new ParameterUjiModel();

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

        $permohonanUjiData = $permohonanUjiModel->insert($data_permohonanUji);

        $data_disposisi_analis = [
            'id_fppc' => $fppcData,
            'id_permohonan_uji' => $permohonanUjiData,
            'manajer_teknis_id' => $ManajerTeknisData,
            'analis_id' => $penyeliaData,
            'status' => 'pending',
            'tanggal_pengujian' => '2021-08-01',
            'waktu_pengujian' => '20:00',
        ];

        $disposisiAnalisModel->insert($data_disposisi_analis);

        $data_disposisi_penyelia = [
            'id_fppc' => $fppcData,
            'manajer_teknis_id' => $ManajerTeknisData,
            'penyelia_id' => $penyeliaData,
            'status' => 'pending',
        ];

        $disposisiPenyeliaModel->insert($data_disposisi_penyelia);

        $hasilUjiData = [
            'image' => '{"id":"2syxicb0e","name":"squaredwolt.png","type":"image/png","size":2880,"metadata":{},"data":"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"}',
            'sampels' => [
                [
                    'fppc_id' => $fppcData,
                    'dtl_fppc_id' => $dtlFppcData,
                    'permohonan_uji_id' => $permohonanUjiData,
                    'kode_uji' => $parameter_uji['kode_uji'],
                    'warna' => '#000000',
                    'hasil_uji' => 'positif',
                    'ct' => 4,
                    'keterangan' => 'keterangan',
                ]
                ],
                'permohonan' => [
                    $parameter_uji['kode_uji'] => 
                    [
                     'kontrol_positif_warna' => '#000000',
                     'kontrol_negatif_warna' => '#000000',
                     'kontrol_positif_ct' => 12,
                     'kontrol_negatif_ct' => 4,
                     'kontrol_negatif_hasil' => 'negatif',
                     'kontrol_positif_hasil' => 'positif',
                    ]
                ]
        ];

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', $hasilUjiData);

        $result = $this->withRequest($request)->controller(HasilUjiController::class)
            ->execute('create');

        $result->assertRedirect('/pengujian/input-hasil/' . $fppcData);
    }


    public function testInputHasilUjiParameterError()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $disposisiPenyeliaModel = new DisposisiPenyeliaModel();
        $disposisiAnalisModel = new DisposisiAnalisModel();
        $AdminModel = new AdminModel();
        $ParameterUjiModel = new ParameterUjiModel();

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

        $permohonanUjiData = $permohonanUjiModel->insert($data_permohonanUji);

        $data_disposisi_analis = [
            'id_fppc' => $fppcData,
            'id_permohonan_uji' => $permohonanUjiData,
            'manajer_teknis_id' => $ManajerTeknisData,
            'analis_id' => $penyeliaData,
            'status' => 'pending',
            'tanggal_pengujian' => '2021-08-01',
            'waktu_pengujian' => '20:00',
        ];

        $disposisiAnalisModel->insert($data_disposisi_analis);

        $data_disposisi_penyelia = [
            'id_fppc' => $fppcData,
            'manajer_teknis_id' => $ManajerTeknisData,
            'penyelia_id' => $penyeliaData,
            'status' => 'pending',
        ];

        $disposisiPenyeliaModel->insert($data_disposisi_penyelia);

        $hasilUjiDataErr = [
            'sampels' => [
                [
                    'fppc_id' => $fppcData,
                    'dtl_fppc_id' => $dtlFppcData,
                    'permohonan_uji_id' => $permohonanUjiData,
                    'kode_uji' => $parameter_uji['kode_uji'],
                    'warna' => '#000000',
                    'hasil_uji' => 'positif',
                    'ct' => 4,
                    'keterangan' => 'keterangan',
                ]
            ],
            'permohonan' => [
                $parameter_uji['kode_uji'] => 
                    [
                     'kontrol_positif_warna' => '#000000',
                     'kontrol_negatif_warna' => '#000000',
                     'kontrol_positif_ct' => 12,
                     'kontrol_negatif_ct' => 4,
                     'kontrol_negatif_hasil' => 'negatif',
                     'kontrol_positif_hasil' => 'positif',
                    ]
            ]
        ];

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', $hasilUjiDataErr);

        $result = $this->withRequest($request)->controller(HasilUjiController::class)
            ->execute('create');

        $result->assertTrue(session()->has('errors'));
        $result->assertOK();
        $result->assertRedirectTo('/pengujian/input-hasil/' . $fppcData);
    }


    public function testInputHasilUjiSampelError()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $disposisiPenyeliaModel = new DisposisiPenyeliaModel();
        $disposisiAnalisModel = new DisposisiAnalisModel();
        $AdminModel = new AdminModel();
        $ParameterUjiModel = new ParameterUjiModel();

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

        $permohonanUjiData = $permohonanUjiModel->insert($data_permohonanUji);

        $data_disposisi_analis = [
            'id_fppc' => $fppcData,
            'id_permohonan_uji' => $permohonanUjiData,
            'manajer_teknis_id' => $ManajerTeknisData,
            'analis_id' => $penyeliaData,
            'status' => 'pending',
            'tanggal_pengujian' => '2021-08-01',
            'waktu_pengujian' => '20:00',
        ];

        $disposisiAnalisModel->insert($data_disposisi_analis);

        $data_disposisi_penyelia = [
            'id_fppc' => $fppcData,
            'manajer_teknis_id' => $ManajerTeknisData,
            'penyelia_id' => $penyeliaData,
            'status' => 'pending',
        ];

        $disposisiPenyeliaModel->insert($data_disposisi_penyelia);

        $hasilUjiDataErr = [
            'image' => '{"id":"2syxicb0e","name":"squaredwolt.png","type":"image/png","size":2880,"metadata":{},"data":"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"}',
            'sampels' => [
                [
                    'fppc_id' => $fppcData,
                    'dtl_fppc_id' => $dtlFppcData,
                    'permohonan_uji_id' => $permohonanUjiData,
                    'kode_uji' => $parameter_uji['kode_uji'],
                    'warna' => null,
                    'hasil_uji' => null,
                    'ct' => null,
                    'keterangan' => null,
                ]
                ],
                'permohonan' => [
                    $parameter_uji['kode_uji'] => 
                    [
                     'kontrol_positif_warna' => null,
                     'kontrol_negatif_warna' => null,
                     'kontrol_positif_ct' => null,
                     'kontrol_negatif_ct' => null,
                     'kontrol_negatif_hasil' => null,
                     'kontrol_positif_hasil' => null,
                    ]
                ]
        ];

        $request = $this->request
            ->withMethod('post')
            ->setGlobal('post', $hasilUjiDataErr);

        $result = $this->withRequest($request)->controller(HasilUjiController::class)
            ->execute('create');

        $result->assertTrue(session()->has('errors'));
        $result->assertOK();
        $result->assertRedirectTo('/pengujian/input-hasil/' . $fppcData);

    }

}



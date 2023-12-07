<?php

namespace Tests\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\PengujianController;
use App\Controllers\AdminController;
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

class PengujianControllerTest extends CIUnitTestCase
{
    use ControllerTester;
    use DatabaseTestTrait;

    public function testIndex()
    {
        $result = $this->controller(PengujianController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Pengujian Laboratorium', $result->getBody());
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

        $result = $this->withRequest($request)->controller(PengujianController::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('Pengujian Laboratorium', $result->getBody());
    }

    public function testRenderInputUji()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $disposisiPenyeliaModel = new DisposisiPenyeliaModel();
        $disposisiAnalisModel = new DisposisiAnalisModel();
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

        $result = $this->controller(PengujianController::class)
            ->execute('input', $fppcData);

        $result->assertTrue($result->isOK());
        $result->assertStringContainsString('Input Hasil Uji', $result->getBody());
    }

    public function testVerifikasiHasilUji()
    {
        $fppcModel = new FppcModel();
        $permohonanUjiModel = new PermohonanUjiModel();
        $dtlFppcModel = new DtlFppcModel();
        $disposisiPenyeliaModel = new DisposisiPenyeliaModel();
        $disposisiAnalisModel = new DisposisiAnalisModel();
        $AdminModel = new AdminModel();
        $ParameterUjiModel = new ParameterUjiModel();
        $HasilUjiModel = new HasilUjiModel();

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
            'status' => 'selesai',
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
            'fppc_id' => $fppcData,
            'dtl_fppc_id' => $dtlFppcData,
            'analis_id' => $penyeliaData,
            'hasil_uji' => 'positif',
            'keterangan' => 'keterangan',
            'nilai' => 4,
            'permohonan_uji_id' => $permohonanUjiData,
            'ct' => 4,
            'kontrol_positif_warna' => '#000000',
            'kontrol_negatif_warna' => '#000000',
            'kontrol_positif_hasil' => 'positif',
            'kontrol_negatif_hasil' => 'negatif',
            'image' => 'https://via.placeholder.com/150',
            'kontrol_positif_ct' => 12,
            'kontrol_negatif_ct' => 4,
            'warna' => '#000000',
        ];

        $HasilUjiModel->insert($hasilUjiData);
        
        $request = $this->request
            ->withMethod('get')
            ->setGlobal('request', [
                'id' => $fppcData,
            ]);

        $result = $this->withRequest($request)->controller(PengujianController::class)
            ->execute('selesaikan', $fppcData);

        $result->assertTrue($result->isOK());
        $result->assertTrue(session()->has('success'));
        $result->assertRedirectTo('/pengujian');
    }
}



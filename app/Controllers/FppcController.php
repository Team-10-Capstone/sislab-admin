<?php

namespace App\Controllers;

use PHPUnit\Framework\Constraint\IsEmpty;

class FppcController extends BaseController
{
    public function index()
    {
        // Load the FppcModel
        $fppcModel = new \App\Models\FppcModel();
        $dtlFppcModel = new \App\Models\DtlFppcModel();

        // Get all FPPC data from the model
        $data['fppcData'] = $fppcModel->findAll();

        //find all dtl_fppc with fppc_id 1
        $data['dtlFppcData'] = $dtlFppcModel->where('id_fppc', 1)->findAll();

        dd($data['dtlFppcData']);

        // Load the view to display the FPPC data
        return view('pages/fppc', $data);
    }

    public function create()
    {
        // ppk id from query params
        $ppkId = $this->request->getVar('ppk_id');

        if (empty($ppkId)) {
            return redirect()->to('/permohonan-ppk');
        }
        // Load the FppcModel
        $fppcModel = new \App\Models\FppcModel();
        $parameterUjiModel = new \App\Models\ParameterUjiModel();

        // check if id ppk exist in fppc
        $fppcData = $fppcModel->where('id_ppk', $ppkId)->first();

        if (!empty($fppcData)) {
            return redirect()->to('/permohonan-ppk');
        }

        $karimutu = db_connect('karimutu');

        // get ppk details data from tr_master_pelaporan single data
        $ppk = $karimutu->query("SELECT * FROM tr_mst_pelaporan WHERE id_ppk = ?", [$ppkId])->getRowArray();

        // get all ppk item related to ppk details from v_dtl_pelaporan
        $ppkItems = $karimutu->query("SELECT * FROM v_dtl_pelaporan WHERE id_ppk = ?", [$ppkId])->getResultArray();

        $parameters = $parameterUjiModel->findAll();

        return view('pages/fppc-create', [
            'ppk' => $ppk,
            'ppkItems' => $ppkItems,
            'parameters' => $parameters,
            'title' => 'Pengajuan Permohonan Uji Lab',
        ]);
    }

    public function store($id)
    {
        $data = [];

        // Load the FPPCModel and FPPCDetailsModel
        $fppcModel = new \App\Models\FppcModel();
        $fppcDetailsModel = new \App\Models\DtlFppcModel();
        $permohonanUjiModel = new \App\Models\PermohonanUjiModel();

        if ($this->request->getMethod() === 'post') {
            $forms = $this->request->getPost('ppk');

            $karimutu = db_connect('karimutu');

            // get ppk details data from tr_master_pelaporan single data
            $ppk = $karimutu->query("SELECT * FROM tr_mst_pelaporan WHERE id_ppk = ?", [$id])->getRowArray();

            // get all ppk item related to ppk details from v_dtl_pelaporan
            $ppkItems = $karimutu->query("SELECT * FROM v_dtl_pelaporan WHERE id_ppk = ?", [$id])->getResultArray();

            $data_fppc = [
                'no_fppc' => $ppk['id_ppk'] . '-' . $ppk['id_trader'],
                'no_ppk' => $ppk['no_ppk'],
                'tgl_ppk' => $ppk['tgl_ppk'],
                'id_ppk' => $ppk['id_ppk'],
                'id_trader' => $ppk['id_trader'],
                'id_petugas' => null,
                'nip_baru' => null,
                'tgl_monsur' => null,
                'petugas_monsur' => null,
                'status' => '0',
                'tipe_permohonan' => '1',
            ];

            $fppcId = $fppcModel->insert($data_fppc);

            // loop ppkItems and get related data in $targetUji, then post to fppc_details
            foreach ($ppkItems as $ppkItem) {
                $data = [
                    'id_fppc' => $fppcId,
                    'id_ikan' => $ppkItem['id_kd_ikan'],
                    'nama_lokal' => $ppkItem['nm_lokal'],
                    'nama_latin' => $ppkItem['nm_latin'],
                    'nama_umum' => $ppkItem['nm_umum'],
                    'jenis_ikan' => $ppkItem['nm_kel_ikan'],
                    'asal_sampel' => $ppkItem['asal_cmdts'],
                    'jumlah_sampel' => $ppkItem['jumlah'],
                    'kode_pelanggan' => null,
                    'deskripsi_sampel' => null,
                    'kode_sampel' => $ppkItem['kd_ikan'],
                    'bentuk' => $ppkItem['ket_bentuk'],
                    'wadah' => null,
                    'kondisi_sampel' => null,
                    'status' => '0',
                ];

                $dtlFppcId = $fppcDetailsModel->insert($data);

                // find form that match with ppk item, compared using id_ikan
                $form = array_filter($forms, function ($form) use ($ppkItem) {
                    return $form['id_kd_ikan'] == $ppkItem['id_kd_ikan'];
                });

                // if form found, get property target_uji inside form, loop and insert to permohonan uji
                if (!empty($form)) {
                    $form = array_values($form)[0];

                    $targetUji = $form['target_uji'];

                    foreach ($targetUji as $target) {
                        $data = [
                            'dtl_fppc_id' => $dtlFppcId,
                            'parameter_uji_id' => $target,
                            'hasil_uji_id' => null,
                            'status'
                        ];

                        $permohonanUjiModel->insert($data);
                    }
                }
            }

            session()->setFlashdata('create-fppc-message', 'Permohonan Uji Lab Berhasil Dibuat');

            return redirect()->to('/permohonan-ppk');
        }

    }
}
<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class HasilUjiController extends Controller
{
    public function create()
    {
        $HasilUjiModel = new \App\Models\HasilUjiModel();
        $PermohonanUjiModel = new \App\Models\PermohonanUjiModel();
        $FppcModel = new \App\Models\FppcModel();

        helper(['form']);

        $sampels = $this->request->getPost('sampels');

        foreach ($sampels as $sampel) {

            $data = [
                'fppc_id' => $sampel['fppc_id'],
                'dtl_fppc_id' => $sampel['dtl_fppc_id'],
                'analis_id' => $sampel['analis_id'],
                'hasil_uji' => $sampel['hasil_uji'],
                'keterangan' => $sampel['keterangan'],
                'nilai' => $sampel['nilai'],
                'permohonan_uji_id' => $sampel['permohonan_uji_id'],
            ];

            $permohonan_uji_id = $sampel['permohonan_uji_id'];

            $validation = \Config\Services::validation();

            $validation->setRules([
                'fppc_id' => 'required',
                'dtl_fppc_id' => 'required',
                'analis_id' => 'required',
                'hasil_uji' => 'required',
                'keterangan' => 'required',
                'nilai' => 'required',
                'permohonan_uji_id' => 'required',
            ]);

            $isDataValid = $validation->run($data);

            if (!$isDataValid) {
                $errors = $validation->getErrors();

                $errorString = implode("\n", $errors);

                session()->setFlashdata('errors', $errorString);

                return redirect()->to('/pengujian/input-hasil/' . $sampel['fppc_id']);
            }

            $HasilUjiId = $HasilUjiModel->insert($data);

            if ($HasilUjiId) {
                $PermohonanUjiModel->update($permohonan_uji_id, ['status' => 'selesai']);
            }
        }

        session()->setFlashdata('success', 'Berhasil menambahkan hasil uji');

        return redirect()->to('/pengujian/input-hasil/' . $sampel['fppc_id']);
    }
}
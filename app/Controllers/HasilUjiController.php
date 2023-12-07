<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class HasilUjiController extends Controller
{
    public function create()
    {
        $HasilUjiModel = new \App\Models\HasilUjiModel();
        $PermohonanUjiModel = new \App\Models\PermohonanUjiModel();

        helper(['form', 'url']);

        $sampels = $this->request->getPost('sampels');
        $image = $this->request->getPost('image');
        $permohonan = $this->request->getPost('permohonan');

        $rules = [
            'sampels' => 'required',
            'image' => 'required',
            'permohonan' => 'required'
        ];

        $isDataValid = $this->validateData($this->request->getPost(), $rules);

        if (!$isDataValid) {
            $errors = $this->validator->getErrors();

            $errorString = implode("\n", $errors);

            session()->setFlashdata('errors', $errorString);

            $this->validator->reset();

            return redirect()->to('/pengujian/input-hasil/' . $sampels[0]['fppc_id']);
        }

        $imageData = json_decode($image);

        $fileNama = $imageData->name;

        $uploadPath = WRITEPATH . 'uploads/';

        $imageBinary = base64_decode($imageData->data);

        $fileSize = file_put_contents($uploadPath . $fileNama, $imageBinary);

        if ($fileSize === false) {
            //@codeCoverageIgnoreStart
            session()->setFlashdata('error', 'Gagal mengupload gambar');
            return redirect()->to('/pengujian/input-hasil/' . $sampels[0]['fppc_id']);
            //@codeCoverageIgnoreEnd
        }

        $imageUrl = base_url('uploads/' . $fileNama);

        foreach ($sampels as $sampel) {
            if (!isset($permohonan[$sampel['kode_uji']])) {
                // @codeCoverageIgnoreStart
                session()->setFlashdata('error', 'Permohonan uji tidak ditemukan');
                return redirect()->to('/pengujian/input-hasil/' . $sampel['fppc_id']);
                // @codeCoverageIgnoreEnd
            }

            $permohonanRelated = $permohonan[$sampel['kode_uji']];

            $data = [
                'fppc_id' => $sampel['fppc_id'],
                'dtl_fppc_id' => $sampel['dtl_fppc_id'],
                'hasil_uji' => $sampel['hasil_uji'],
                'keterangan' => $sampel['keterangan'],
                'nilai' => $sampel['ct'],
                'permohonan_uji_id' => $sampel['permohonan_uji_id'],
                'ct' => $sampel['ct'],
                'kontrol_positif_warna' => $permohonanRelated['kontrol_positif_warna'],
                'kontrol_negatif_warna' => $permohonanRelated['kontrol_negatif_warna'],
                'kontrol_positif_hasil' => $permohonanRelated['kontrol_positif_hasil'],
                'kontrol_negatif_hasil' => $permohonanRelated['kontrol_negatif_hasil'],
                'image' => $imageUrl,
                'kontrol_positif_ct' => $permohonanRelated['kontrol_positif_ct'],
                'kontrol_negatif_ct' => $permohonanRelated['kontrol_negatif_ct'],
                'warna' => $sampel['warna']
            ];

            $permohonan_uji_id = $sampel['permohonan_uji_id'];

            $validation = [
                'fppc_id' => 'required',
                'dtl_fppc_id' => 'required',
                'hasil_uji' => 'required',
                'keterangan' => 'required',
                'nilai' => 'required',
                'permohonan_uji_id' => 'required',
                'ct' => 'required',
                'kontrol_positif_warna' => 'required',
                'kontrol_negatif_warna' => 'required',
                'kontrol_positif_hasil' => 'required',
                'kontrol_negatif_hasil' => 'required',
                'image' => 'required',
                'kontrol_positif_ct' => 'required',
                'kontrol_negatif_ct' => 'required',
                'warna' => 'required'
            ];
            
            $isDataValid = $this->validateData($data, $validation);

            if (!$isDataValid) {
                $errors = $this->validator->getErrors();

                $errorString = implode("\n", $errors);

                session()->setFlashdata('errors', $errorString);
                
                $this->validator->reset();
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
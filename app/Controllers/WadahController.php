<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WadahModel;

class WadahController extends BaseController
{
    public function index()
    {
        $WadahModel = new WadahModel();

        $wadah = $WadahModel->findAll();

        return view('pages/wadah-list', [
            'title' => 'Daftar Wadah',
            'wadahs' => $wadah,
        ]);
    }

    public function create()
    {
        helper(['form', 'url']);

        $WadahModel = new WadahModel();

        if ($this->request->getMethod() === 'post') {
            $imageString = $this->request->getPost('image');

            $imageData = json_decode($imageString);

            $fileNama = $imageData->name;

            $uploadPath = WRITEPATH . 'uploads/';

            $imageBinary = base64_decode($imageData->data);

            $fileSize = file_put_contents($uploadPath . $fileNama, $imageBinary);

            if ($fileSize === false) {
                session()->setFlashdata('error', 'Gagal membuat wadah baru.');
                return redirect()->to('/wadah');
            }

            $data = [
                'nama_wadah' => $this->request->getPost('nama'),
                'image' => base_url('uploads/' . $fileNama),
            ];

            $WadahModel->insert($data);

            session()->setFlashdata('success', 'Wadah berhasil ditambahkan.');
            return redirect()->to('/wadah');

        } else {

            return view('pages/wadah', [
                'title' => 'Tambah Wadah',
            ]);
        }
    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $WadahModel = new WadahModel();

        if ($this->request->getMethod() === 'post') {
            $imageString = $this->request->getPost('image');

            $imageData = json_decode($imageString);

            // if imageData name is initial-image.jpg, ignore the image
            if ($imageData->name !== 'initial-image.jpg') {
                $fileNama = $imageData->name;

                $uploadPath = WRITEPATH . 'uploads/';

                $imageBinary = base64_decode($imageData->data);

                $fileSize = file_put_contents($uploadPath . $fileNama, $imageBinary);

                if ($fileSize === false) {
                    session()->setFlashdata('error', 'Gagal membuat wadah baru.');
                    return redirect()->to('/wadah');
                }


                $data = [
                    'nama_wadah' => $this->request->getPost('nama'),
                    'image' => base_url('uploads/' . $fileNama),
                ];

                $WadahModel->update($id, $data);

                session()->setFlashdata('success', 'Wadah berhasil diubah.');
                return redirect()->to('/wadah');
            } else {
                $data = [
                    'nama_wadah' => $this->request->getPost('nama'),
                ];

                $WadahModel->update($id, $data);

                session()->setFlashdata('success', 'Wadah berhasil diubah.');
                return redirect()->to('/wadah');
            }
        } else {

            $wadah = $WadahModel->find($id);

            return view('pages/wadah', [
                'title' => 'Ubah Wadah',
                'wadah' => $wadah,
            ]);
        }
    }

    public function delete($id)
    {
        $WadahModel = new WadahModel();

        $WadahModel->delete($id);

        session()->setFlashdata('success', 'Wadah berhasil dihapus.');
        return redirect()->to('/wadah');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WadahModel;

class WadahController extends BaseController
{
    /**
     * @codeCoverageIgnore
     */
    protected $pager;

    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $WadahModel = new WadahModel();

        $page = $this->request->getVar('page') ?? 1;

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        $wadah = $WadahModel->findAll($perPage, $offset);

        $totalRecords = count($WadahModel->findAll());

        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        return view('pages/wadah-list', [
            'title' => 'Daftar Wadah',
            'wadahs' => $wadah,
            'pager_links' => $pager_links,
        ]);
    }

    public function create()
    {
        helper(['form', 'url']);

        $WadahModel = new WadahModel();

        if ($this->request->getMethod() === 'post') {
            $imageString = $this->request->getPost('image');

            $validation = \Config\Services::validation();

            $validation->setRules([
                'nama' => 'required',
                'image' => 'required',
            ]);

            $requestData = [
                'nama' => $this->request->getPost('nama'),
                'image' => $this->request->getPost('image'),
            ];

            if (!$validation->run($requestData)) {
                $errors = $validation->getErrors();

                $errorString = implode("\n", $errors);

                session()->setFlashdata('errors', $errorString);

                return redirect()->to('/wadah');
            }

            $isImageStartsWithHttp = strpos($imageString, 'http') === 0;

            if (!$isImageStartsWithHttp) {
                // @codeCoverageIgnoreStart
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
                // @codeCoverageIgnoreEnd
            } else {
                $data = [
                    'nama_wadah' => $this->request->getPost('nama'),
                    'image' => $imageString,
                ];
            }

            $WadahModel->insert($data);

            session()->setFlashdata('success', 'Wadah berhasil ditambahkan.');
            return redirect()->to('/wadah');

        }
    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $WadahModel = new WadahModel();

        if ($this->request->getMethod() === 'post') {
            $imageString = $this->request->getPost('image');

            $isImageStartsWithHttp = strpos($imageString, 'http') === 0;

            if (!$isImageStartsWithHttp) {
                // @codeCoverageIgnoreStart
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
                // @codeCoverageIgnoreEnd
            } else {
                $data = [
                    'nama_wadah' => $this->request->getPost('nama'),
                    'image' => $imageString,
                ];

                $WadahModel->update($id, $data);

                session()->setFlashdata('success', 'Wadah berhasil diubah.');
                return redirect()->to('/wadah');
            }
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

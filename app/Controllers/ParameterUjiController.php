<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParameterUjiModel;

class ParameterUjiController extends BaseController
{
    protected $pager;
    public function __construct()
    {
        $this->pager = \Config\Services::pager();
    }
    public function index()
    {
        $ParameterModel = new ParameterUjiModel();

        $page = $this->request->getVar('page') ?? 1;

        // Define the number of items per page
        $perPage = 10; // Adjust this value according to your requirements

        // Calculate the offset based on the current page and items per page
        $offset = ($page - 1) * $perPage;

        $parameter = $ParameterModel->findAll($perPage, $offset);

        $totalRecords = count($ParameterModel->findAll());

        $pager_links = $this->pager->makeLinks($page, $perPage, $totalRecords, 'default');

        return view('pages/parameter-list', [
            'title' => 'Daftar Parameter Uji',
            'parameters' => $parameter,
            'pager_links' => $pager_links,
        ]);
    }

    public function create()
    {
        helper(['form', 'url']);

        $ParameterModel = new ParameterUjiModel();

        $data = [
            'kode_uji' => $this->request->getPost('kode_uji'),
            'jenis_parameter' => $this->request->getPost('jenis_parameter'),
            'keterangan_uji' => $this->request->getPost('keterangan_uji'),
            'standar_uji' => $this->request->getPost('standar_uji'),
            'no_ikm' => $this->request->getPost('no_ikm'),
        ];

        $rulesParam = [
            'kode_uji' => 'required',
            'jenis_parameter' => 'required',
            'keterangan_uji' => 'required',
            'standar_uji' => 'required',
            'no_ikm' => 'required',
        ];

        if (!$this->validateData($data, $rulesParam)) {
            $errors = $this->validator->getErrors();
            $errorString = implode("\n", $errors);
            session()->setFlashdata('errors', $errorString);
            $this->validator->reset();
            return redirect()->to('/parameter');
        }

        $ParameterModel->insert($data);

        session()->setFlashdata('success', 'Parameter berhasil ditambahkan.');
        return redirect()->to('/parameter');

    }

    public function edit($id)
    {
        helper(['form', 'url']);

        $ParameterModel = new ParameterUjiModel();
        $data = [
            'kode_uji' => $this->request->getPost('kode_uji'),
            'jenis_parameter' => $this->request->getPost('jenis_parameter'),
            'keterangan_uji' => $this->request->getPost('keterangan_uji'),
            'standar_uji' => $this->request->getPost('standar_uji'),
            'no_ikm' => $this->request->getPost('no_ikm'),
        ];

        $rulesParam = [
            'kode_uji' => 'required',
            'jenis_parameter' => 'required',
            'keterangan_uji' => 'required',
            'standar_uji' => 'required',
            'no_ikm' => 'required',
        ];

        if (!$this->validateData($data, $rulesParam)) {
            $errors = $this->validator->getErrors();
            $errorString = implode("\n", $errors);
            session()->setFlashdata('errors', $errorString);
            $this->validator->reset();
            return redirect()->to('/parameter');
        }

        $ParameterModel->update($id, $data);

        session()->setFlashdata('success', 'Parameter berhasil diubah.');
        return redirect()->to('/parameter');
    }

    public function delete($id)
    {
        $ParameterModel = new ParameterUjiModel();

        $ParameterModel->delete($id);

        session()->setFlashdata('success', 'Parameter berhasil dihapus.');
        return redirect()->to('/parameter');
    }
}

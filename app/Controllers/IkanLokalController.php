<?php

namespace App\Controllers;

use App\Models\IkanLokalModel;

class IkanLokal extends BaseController
{
    public function index()
    {
        // Fetch data from the database
        $model = new IkanLokalModel();
        $data['ikan_lokal'] = $model->findAll();

        // Load a view to display the data
        return view('ikan_lokal/index', $data);
    }

    public function create()
    {
        // Display a form to create a new record
        return view('ikan_lokal/create');
    }

    public function store()
    {
        // Handle the form submission to create a new record
        $model = new IkanLokalModel();
        $data = [
            // Retrieve data from the form input fields
            'nm_lokal' => $this->request->getPost('nm_lokal'),
            'nm_umum' => $this->request->getPost('nm_umum'),
            'nm_latin' => $this->request->getPost('nm_latin'),
            'kd_ikan' => $this->request->getPost('kd_ikan'),
            'id_ikan' => $this->request->getPost('id_ikan'),
            'id_kel_ikan' => $this->request->getPost('id_kel_ikan'),
            'kd_jenis_kel' => $this->request->getPost('kd_jenis_kel'),
            'kd_tarif' => $this->request->getPost('kd_tarif'),
            'kelas' => $this->request->getPost('kelas'),
            'kelompok' => $this->request->getPost('kelompok'),
            'konsumsi' => $this->request->getPost('konsumsi'),
            'tawar' => $this->request->getPost('tawar'),
            'hidup' => $this->request->getPost('hidup'),
            'bentuk' => $this->request->getPost('bentuk'),
            'hias' => $this->request->getPost('hias'),
            'pelagis' => $this->request->getPost('pelagis'),
            'status' => $this->request->getPost('status'),
            'hscode' => $this->request->getPost('hscode'),
            'no_urut_hs' => $this->request->getPost('no_urut_hs'),
            'aktif' => $this->request->getPost('aktif'),
            'kd_ikan_lokal_ol' => $this->request->getPost('kd_ikan_lokal_ol'),
            'nilai' => $this->request->getPost('nilai'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            // Add more fields as needed
        ];

        // Insert data into the database
        $model->insert($data);

        // Redirect to the index page or display a success message
        return redirect()->to('/ikan_lokal');
    }

    public function edit($id)
    {
        // Display a form to edit an existing record
        $model = new IkanLokalModel();
        $data['ikan_lokal'] = $model->find($id);

        return view('ikan_lokal/edit', $data);
    }

    public function update($id)
    {
        // Handle the form submission to update an existing record
        $model = new IkanLokalModel();
        $data = [
            // Retrieve data from the form input fields
            'nm_lokal' => $this->request->getPost('nm_lokal'),
            'nm_umum' => $this->request->getPost('nm_umum'),
            // Add more fields as needed
        ];

        // Update data in the database
        $model->update($id, $data);

        // Redirect to the index page or display a success message
        return redirect()->to('/ikan_lokal');
    }

    public function delete($id)
    {
        // Delete a record from the database
        $model = new IkanLokalModel();
        $model->delete($id);

        // Redirect to the index page or display a success message
        return redirect()->to('/ikan_lokal');
    }
}
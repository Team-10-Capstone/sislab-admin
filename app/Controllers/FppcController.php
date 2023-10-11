<?php

namespace App\Controllers;

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
}
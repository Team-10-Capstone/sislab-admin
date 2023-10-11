<?php

namespace App\Controllers;

class FppcController extends BaseController
{
    public function index()
    {
        // Load the FppcModel
        $fppcModel = new \App\Models\FppcModel();

        // Get all FPPC data from the model
        $data['fppcData'] = $fppcModel->getAllFppcWithDtlFppc();

        dd($fppcModel->getAllFppcWithDtlFppc());

        // Load the view to display the FPPC data
        return view('pages/fppc', $data);
    }
}
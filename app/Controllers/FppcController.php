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

        return view('pages/fppc-create', [
            'ppk' => $ppk,
            'ppkItems' => $ppkItems,
            'title' => 'Pengajuan Permohonan Uji Lab',
        ]);
    }
}
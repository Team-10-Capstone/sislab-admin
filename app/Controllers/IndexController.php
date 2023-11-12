<?php

namespace App\Controllers;

class IndexController extends BaseController
{

    public function index()
    {
        $fppcModel = new \App\Models\FppcModel();

        $tipeCounts = $fppcModel->getTipeCountsByMonth();

        $statusCounts = $fppcModel->getStatusCountsByMonth();

        $tipeCountsTotal = 0;

        $statusCountsTotal = 0;

        $months = range(1, 12);

        $currentDate = date('Y-m-d');

        $startDate = date('Y-m-d', strtotime('-11 months', strtotime($currentDate)));

        $endDate = date('Y-m-d', strtotime('+1 months', strtotime($currentDate)));

        $tipeCountsInDateRange = $fppcModel->select('CAST(tipe_permohonan AS VARCHAR) as tipe_permohonan, MONTH(created_at) as month, YEAR(created_at) as year, COUNT(CAST(tipe_permohonan AS VARCHAR)) as tipe_permohonan_count')
            ->where('created_at >=', $startDate)
            ->where('created_at <', $endDate)
            ->groupBy(['CAST(tipe_permohonan AS VARCHAR)', 'MONTH(created_at)', 'YEAR(created_at)'])
            ->findAll();

        $statusCountsInDateRange = $fppcModel->select('CAST(status AS VARCHAR) as status, MONTH(created_at) as month, COUNT(CAST(status AS VARCHAR)) as status_count')
            ->where('created_at >=', $startDate)
            ->where('created_at <', $endDate)
            ->groupBy(['CAST(status AS VARCHAR)', 'MONTH(created_at)'])
            ->findAll();

        $months = [];
        $currentDate = $startDate;
        while ($currentDate < $endDate) {
            $months[] = date('Y-m', strtotime($currentDate));
            $currentDate = date('Y-m-d', strtotime('+1 months', strtotime($currentDate)));
        }

        foreach ($months as $month) {
            $relatedTipeCounts = array_filter($tipeCountsInDateRange, function ($tipeCount) use ($month) {
                $curentMonth = date('Y-m', strtotime($tipeCount['year'] . '-' . $tipeCount['month'] . '-01'));

                return $curentMonth == $month;
            });

            if ($relatedTipeCounts) {
                $finalTipeCountsInDateRange[$month] = [
                    'mandiri' => [
                        'count' => 0,
                        'percentage' => 0,
                        'isPositive' => true,
                    ],
                    'monsur' => [
                        'count' => 0,
                        'percentage' => 0,
                        'isPositive' => true,
                    ],
                    'lalulintas' => [
                        'count' => 0,
                        'percentage' => 0,
                        'isPositive' => true,
                    ],
                ];

                foreach ($relatedTipeCounts as $relatedTipeCount) {

                    $previousMonth = date('Y-m', strtotime('-1 months', strtotime($month)));

                    if (isset($finalTipeCountsInDateRange[$previousMonth][$relatedTipeCount['tipe_permohonan']])) {
                        $previousMonthData = $finalTipeCountsInDateRange[$previousMonth][$relatedTipeCount['tipe_permohonan']]['count'];

                        $percentage = 0;

                        if ($previousMonthData) {
                            $percentage = ($relatedTipeCount['tipe_permohonan_count'] - $previousMonthData) / $previousMonthData * 100;
                        } else {
                            $percentage = 100;
                        }

                        $finalTipeCountsInDateRange[$month][$relatedTipeCount['tipe_permohonan']] = [
                            'count' => $relatedTipeCount['tipe_permohonan_count'],
                            'percentage' => floor($percentage),
                            'isPositive' => $percentage > 0,
                        ];
                    } else {
                        $finalTipeCountsInDateRange[$month][$relatedTipeCount['tipe_permohonan']] = [
                            'count' => $relatedTipeCount['tipe_permohonan_count'],
                            'percentage' => 100,
                            'isPositive' => true,
                        ];
                    }
                }
            } else {
                $finalTipeCountsInDateRange[$month] = [
                    'mandiri' => [
                        'count' => 0,
                        'percentage' => 0,
                        'isPositive' => true,
                    ],
                    'monsur' => [
                        'count' => 0,
                        'percentage' => 0,
                        'isPositive' => true,
                    ],
                    'lalulintas' => [
                        'count' => 0,
                        'percentage' => 0,
                        'isPositive' => true,
                    ],
                ];
            }
        }


        $byStatusTotal = [
            'pending' => 0,
            'ditolak' => 0,
            'menunggu-disposisi' => 0,
            'menunggu-pengujian' => 0,
            'proses-pengujian' => 0,
            'selesai-pengujian' => 0,
            'lhus' => 0,
            'perbaikan' => 0,
            'terbit-lhu' => 0,
            'selesai' => 0,
        ];

        $byTipeTotal = [
            'mandiri' => 0,
            'monsur' => 0,
            'lalulintas' => 0,
        ];

        $total = 0;

        foreach ($tipeCounts as $tipeCount) {
            $tipeCountsTotal += $tipeCount['tipe_permohonan_count'];

            $byTipeTotal[$tipeCount['tipe_permohonan']] += $tipeCount['tipe_permohonan_count'];

            $total += $tipeCount['tipe_permohonan_count'];
        }
        ;

        foreach ($statusCounts as $statusCount) {
            $statusCountsTotal += $statusCount['status_count'];

            $byStatusTotal[$statusCount['status']] += $statusCount['status_count'];
        }
        ;

        $currentMonth = date('Y-m');


        $currentMonthTipeCounts = array_filter($finalTipeCountsInDateRange[$currentMonth], function ($tipeCount) {
            return is_array($tipeCount);
        });

        $data = [
            'title' => 'Dashboard',
            'tipeCounts' => $tipeCounts,
            'statusCounts' => $statusCounts,
            'tipeCountsTotal' => $tipeCountsTotal,
            'statusCountsTotal' => $statusCountsTotal,
            'byStatusTotal' => $byStatusTotal,
            'byTipeTotal' => $byTipeTotal,
            'total' => $total,
            'tipeCountsWithMonth' => $finalTipeCountsInDateRange,
            'currentMonthTipeCounts' => $currentMonthTipeCounts,
        ];

        return view('pages/index', $data);
    }
}
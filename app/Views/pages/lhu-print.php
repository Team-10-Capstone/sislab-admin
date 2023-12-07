<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<style type="text/css">
    .header-print {
        /* ubah angka sesuai kebutuhan */
        margin: 0 auto;
        text-align: center;
        padding: 8px;
        border: 0px solid black;
        background-color: #fff;
        border-collapse: collapse;
    }

    td,
    th {
        border: 1px solid black;
    }
</style>

<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start::main-content -->
    <div class="main-content">

        <!-- Page Header -->
        <div class="block justify-between page-header sm:flex">
            <div>
                <h3
                    class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Print LHU</h3>
            </div>
            <ol class="flex items-center whitespace-nowrap min-w-0">
                <li class="text-sm">
                    <a class="flex items-center font-semibold text-primary hover:text-primary dark:text-primary truncate"
                        href="javascript:void(0);">
                        Sislab
                        <i
                            class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 dark:text-gray-300 rtl:rotate-180"></i>
                    </a>
                </li>
                <li class="text-sm text-gray-500 hover:text-primary dark:text-white/70 " aria-current="page">
                    Print LHU
                </li>
            </ol>
        </div>
        <!-- Page Header Close -->

        <div class="w-full justify-center pb-20">
            <button onclick="printLHU()" class="btn ti-btn ti-btn-primary"><i class="ti ti-printer"></i>Print
                Sekarang</button>

            <div class="container w-full !text-black flex justify-center">
                <div class="p-10 bg-white">
                    <div class="table-wrapper" id="myElementId"
                        style="background-color: white; display: inline-block; padding: 0px;">
                        <!-- kop surat -->
                        <table class="header-print" style="
                            margin: 0 auto;
        text-align: center;
        padding: 8px;
        border: 0px solid black;
        background-color: #fff;
        border-collapse: collapse;">
                            <tr>
                                <td rowspan="2" style="padding-left: 8px; border:none;"><img
                                        src="<?php echo base_url('assets/img/logocpib.svg'); ?>" width="120px"></td>
                                <td
                                    style="font-size:14px; color:#233A91; border:none; font-weight:bold; font-family:Arial, Helvetica, sans-serif">
                                    KEMENTERIAN KELAUTAN DAN PERIKANAN <br>
                                    BADAN KARANTINA IKAN, PENGENDALIAN MUTU <br>
                                    DAN KEAMANAN HASIL PERIKANAN <br>
                                    BALAI BESAR KARANTINA IKAN, PENGENDALIAN MUTU DAN <br>
                                    KEAMANAN HASIL PERIKANAN JAKARTA I </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; border:none; font-family:Arial, Helvetica, sans-serif;">
                                    ALAMAT GEDUNG KARANTINA PERTANIAN BANDARA SOEKARNO - HATTA 19120 <br>
                                    TELEPON: (021) 5507932, 5591 5059 FAKSIMILI: (021) 5506738
                                    EMAIL: <a href="mailto:Jakarta1@bkipm.kkp.go.id"
                                        style="color:#233A91">Jakarta1@bkipm.kkp.go.id</a>
                                </td>

                            </tr>
                        </table>

                        <!-- Pembatas Kop  -->
                        <hr style="width: 550; border: none;border-top: 1px solid black; margin-bottom: 1px;">
                        <hr style="width: 550; border: none;border-top: 3px solid black; margin-top: 0px;">

                        <div style="display:flex; justify-content:center; padding:8px">
                            <!-- NO LHU -->
                            <table
                                style="border-collapse: collapse; background-color:white; width: 600px; text-align: center;">
                                <tr>
                                    <td style="font-weight: bold; text-decoration: underline; border: none;">HASIL UJI
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-weight: bold; padding-bottom: 4px; font-style: italic; border: none;">
                                        TEST
                                        RESULT</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; font-size: 14px; border: none;">Nomor/<i>Number</i>:
                                        LHU/<?php echo $fppc['no_fppc']; ?>/<?php echo date('Y'); ?></td>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <!-- Bio -->
                            <table style="border-collapse: collapse; background-color:white; width: 450px;">
                                <tr>
                                    <td colspan="4" style="font-size: 14px; border: none; ">Menyatakan bahwa/</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="font-size: 14px; border: none; "><i>This is certify that</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; width: 3%; border: none;">1</td>
                                    <td style="font-size: 14px; width: 25%; border: none; ">Pelanggan/<i>Customer</i>
                                    </td>
                                    <td style="font-size: 14px; width: 2%; border: none;">:</td>

                                    <td style="font-size: 14px; width: 50%; border: none; ">
                                        <?php echo $fppc['nama_trader']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; border: none;">2</td>
                                    <td style="font-size: 14px; border: none;">Alamat/<i>Address</i></td>
                                    <td style="font-size: 14px; border: none;">:</td>
                                    <td style="font-size: 14px; border: none;">
                                        <?php echo $fppc['alamat_trader']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 14px; border: none;">3</td>
                                    <td style="font-size: 14px; border: none;">Tanggal Penerimaan/ <br> <i>Receipt
                                            date</i>
                                    </td>
                                    <td style="font-size: 14px; border: none;">:</td>
                                    <td style="font-size: 14px; border: none;">
                                    <?php 
                  // format to dd mmmm yyyy
                  $date = date_create($fppc['created_at']);

                  echo date_format($date, "d F Y");
                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; border: none;">5</td>
                                    <td style="font-size: 14px; border: none;">Tanggal Pengujian/ <br> <i>Testing
                                            Date</i>
                                    </td>
                                    <td style="font-size: 14px; border: none;">:</td>

                                    <td style="font-size: 14px; border: none;">
                                    <?php 
                  // format to dd mmmm yyyy
                  $date = date_create($tanggal_pengujian);

                  echo date_format($date, "d F Y");
                ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <!-- Data -->
                            <table
                                style="border-collapse: collapse; background-color:white; width: 600px; font-size: 14px; text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Kd Sampel</th>
                                        <th>Bidang Pengujian</th>
                                        <th>Parameter</th>
                                        <th>Hasil</th>
                                        <th>Persyaratan Mutu</th>
                                        <th>Metode Acuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sampels as $sampel) : ?>
                                        <?php foreach ($sampel['permohonan_uji'] as $key => $permohonan_uji) : ?>
                                            <tr>
                                                <td style="font-size: 14px;">
                                                    <?php echo $permohonan_uji['kode_sampel']; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $sampel['dtl_fppc']['nama_lokal']; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $permohonan_uji['keterangan_uji']; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $permohonan_uji['hasil_uji']; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $permohonan_uji['standar_uji']; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $permohonan_uji['no_ikm']; ?>
                                                </td>
                                            </tr>
                                    <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <!-- Catatan -->
                            <table
                                style="border-collapse: collapse; background-color:white; width: 700px; font-size: 14px; text-align: left;">
                                <thead>
                                    <tr>
                                        <th colspan="2" width="10%" style="font-size: 14px; border: none;">Catatan/</th>
                                        <td colspan="2" style="font-size: 14px; border: none;"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" width="10%" style="font-size: 14px; border: none;"><i>Note</i>
                                        </th>
                                        <td colspan="2" style="font-size: 14px; border: none;"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; font-size: 14px; border: none;" width="5%">1</td>
                                        <!-- Menampilkan nomor urut -->
                                        <td width="1%" style="border: none;">.</td> <!-- Menampilkan nomor urut -->
                                        <td colspan="2" style="border: none;">Hasil uji ini mewakili populasi yang
                                            diambil/Hasil
                                            uji ini hanya
                                            berlaku untuk contoh uji yang diuji**) <br>
                                            <i>The result of the test represent the population taken/This result of the
                                                test
                                                are
                                                only valid for the
                                                tested sample**)</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-size: 14px; border: none;" width="5%">2</td>
                                        <!-- Menampilkan nomor urut -->
                                        <td width="1%" style="border: none;">.</td> <!-- Menampilkan nomor urut -->
                                        <td colspan="2" style="border: none;">Laporan hasil uji terdiri dari 1 (Satu)
                                            lembar
                                            asli (Stempel
                                            Asli)<br>
                                            <i>This report of test consists of 1 (One) page original (Original Sign)</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-size: 14px; border: none;" width="5%">3</td>
                                        <!-- Menampilkan nomor urut -->
                                        <td width="1%" style="border: none;">.</td> <!-- Menampilkan nomor urut -->
                                        <td colspan="2" style="border: none;">Laporan hasil uji ini tidak boleh
                                            digandakan,
                                            kecuali secara lengkap
                                            dan seizin tertulis Kepala Balai Besar Ui Standar KIPM (Stempel Copy)<br>
                                            <i>This report of test shall not be reproduced (copied) except for the
                                                completed
                                                one
                                                and with the
                                                written permission of the Head of Fish Quarantine and Inspection
                                                Standard
                                                Testing Laboratory (Copy
                                                Sign)</i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:flex-end; margin-top: 48px; ">
                            <!-- TTD -->
                            <table style="border-collapse: collapse; background-color:white; width: 550px;">
                                <tr>
                                    <td style="width: 48%; border: none;"></td>
                                    <td style="font-size: 14px; width: 8%; border: none;">Jakarta, </td>
                                    <td style="font-size: 14px; border: none;">
                                    <?php
                    // format to dd mmmm yyyy
                    $date = date_create($fppc['updated_at']);

                    echo date_format($date, "d F Y");
                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;">Kepala UPT/Penanggung Jawab
                                        Laboratorium**)</td>
                                </tr>
                                <tr>
                                    <td style="border: none"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;"><i>Head of TIU/Laboratory in
                                            Charge</i>**)</td>
                                </tr>
                                <tr>
                                    <td style="border: none"> </td>
                                    <td colspan="2" style="font-size: 14px; padding-top: 64px; border: none;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;"><u>
                                            Sri Wahyuni, S.Pi, M.Si
                                        </u></td>
                                </tr>

                            </table>
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 40px; ">
                            <!-- Catatan -->
                            <table
                                style="border-collapse: collapse; background-color:white; width: 600px; font-size: 14px; text-align: left;">
                                <tbody>
                                    <tr>
                                        <td style="border: none;">*) Parameter belum akreditas/<i>Parameter not yet
                                                accredited</i></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">**) Coret yang tidak sesuai/<i>Cross out whichever
                                                does
                                                not
                                                apply</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Start::main-content -->

</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<script>
    function printLHU() {
        const printJS = window.printJS;

        printJS({
            printable: 'myElementId',
            type: 'html',
            honorColor: true,
            targetStyles: ['*'],
            style: 'table th, table td { border: 1px solid #000; padding: 0;}; @page { margin: 1cm; };'
        })
    }
</script>



<?= $this->endSection('scripts'); ?>
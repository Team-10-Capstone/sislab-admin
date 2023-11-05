<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

<style type="text/css">
    .header-print {
        /* ubah angka sesuai kebutuhan */
        margin: 0 auto;
        /* mengatur margin kiri dan kanan agar tabel berada di tengah */
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
                    Document LHUS
                </h3>
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
                    Document LHUS
                </li>
            </ol>
        </div>
        <!-- Page Header Close -->

        <div class="w-full justify-center pb-20">
            <button onclick="printLHU()" class="btn ti-btn ti-btn-primary"><i class="ti ti-printer"></i>Print
                Sekarang</button>

            <div class="container w-full !text-black flex justify-center">
                <div class="p-10 bg-white">
                    <div class="table-wrapper" id="lhu-doc"
                        style="background-color: white; display: inline-block; padding: 0px;">
                        <!-- kop surat -->
                        <table class="header-print" style="margin: 0 auto;">
                            <tr>
                                <td rowspan="2" style="padding-left: 8px; border:none;"><img
                                        src="<?php echo base_url('assets/img/logobkipm.webp'); ?>" width="80px"></td>
                                <td style="width:400px; font-size:14px; border:none; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color: #000;"
                                    class="!text-black">
                                    BALAI BESAR KARANTINA IKAN, PENGENDALIAN MUTU
                                    DAN KEAMANAN HASIL PERIKANAN JAKARTA I
                            </tr>
                            <tr>
                                <td
                                    style="width:400px; font-size: 10px; border:none; font-family:Arial, Helvetica, sans-serif;">
                                    Gedung Mina Bahari 2, 6th Floor, Jl. Medan Merdeka Timur, No. 16, Jakarta,
                                    RT.7/RW.1,
                                    Gambir, Central Jakarta City, Jakarta 10110, Telp 14022
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

                                    <td style="text-align: center; font-size: 14px; font-weight: bold; border: none;">
                                        LAPORAN HASIL PENGUJIAN SEMENTARA
                                    </td>

                                </tr>
                                <tr>

                                    <td style="font-size: 14px; font-weight: bold; border: none;">
                                        LHUS/01/2023-06-04
                                    </td>

                                </tr>
                            </table>


                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <table style="border-collapse: collapse; background-color:white; width: 500px;
                                border-color: black !important; color: black !important;
                                font-size: 12px;
                            ">
                                <tr>
                                    <td>
                                        PARAMETER (TARGET) PENGUJIAN
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?php echo $lhus['parameter_uji']['keterangan_uji']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        TANGGAL PENERIMAAN SAMPEL
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        2023-03-24
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        TANGGAL SELESAI PENGUJIAN
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        2023-03-24
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <img style="width: 300px; height: 130px; object-fit: contain;"
                                src="<?php echo $lhus['kontrol']['image']; ?>" alt="">
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <!-- Data -->
                            <table
                                style="border-collapse: collapse; background-color:white; width: 600px; font-size: 14px; text-align: center;">
                                <thead>
                                    <tr>
                                        <th style="padding: 4px">No.</th>
                                        <th style="padding: 4px">Warna</th>
                                        <th style="padding: 4px">Kode Sampel</th>
                                        <th style="padding: 4px">Jenis Sampel</th>
                                        <th style="padding: 4px">CT</th>
                                        <th style="padding: 4px">Hasil</th>
                                        <th style="padding: 4px">Analis</th>
                                        <th style="padding: 4px">Paraf</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 4px">
                                            1
                                        </td>
                                        <td style="padding: 4px">
                                            <div style="width: 20px; height: 20px; background-color:<?php echo $lhus['kontrol']['kontrol_positif_warna']; ?>;
                                                margin:0 auto;">
                                            </div>
                                        </td>
                                        <td style="padding: 4px">
                                            Kontrol Positif
                                        </td>
                                        <td style="padding: 4px">

                                        </td>
                                        <td style="padding: 4px">
                                            <?php echo $lhus['kontrol']['kontrol_positif_ct']; ?>
                                        </td>
                                        <td style="padding: 4px">
                                            <?php echo $lhus['kontrol']['kontrol_positif_hasil']; ?>
                                        </td>
                                        <td style="padding: 4px">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 4px">
                                            2
                                        </td>
                                        <td style="padding: 4px">
                                            <div style="width: 20px; height: 20px; background-color:<?php echo $lhus['kontrol']['kontrol_negatif_warna']; ?>;
                                                margin:0 auto;">
                                            </div>
                                        </td>
                                        <td style="padding: 4px">
                                            Kontrol Negatif
                                        </td>
                                        <td style="padding: 4px">

                                        </td>
                                        <td style="padding: 4px">
                                            <?php echo $lhus['kontrol']['kontrol_negatif_ct']; ?>
                                        </td>
                                        <td style="padding: 4px">
                                            <?php echo $lhus['kontrol']['kontrol_negatif_hasil']; ?>
                                        </td>
                                        <td style="padding: 4px">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php foreach ($lhus['dtl_fppc'] as $key => $hasil_uji): ?>
                                        <tr>
                                            <td style="padding: 4px">
                                                <?php echo $key + 3; ?>
                                            </td>
                                            <td style="padding: 4px">
                                                <div style="width: 20px; height: 20px; background-color:<?php echo $hasil_uji['warna']; ?>;
                                                margin:0 auto;">
                                                </div>
                                            </td>
                                            <td style="padding: 4px">
                                                <?php echo $hasil_uji['kode_sampel']; ?>
                                            </td>
                                            <td style="padding: 4px">
                                                <?php echo $hasil_uji['nama_lokal']; ?>
                                            </td>
                                            <td style="padding: 4px">
                                                <?php echo $hasil_uji['ct']; ?>
                                            </td>
                                            <td style="padding: 4px">
                                                <?php echo $hasil_uji['hasil_uji']; ?>
                                            </td>
                                            <td style="padding: 4px">
                                                <?php echo $hasil_uji['analis']; ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:center; margin-top: 20px; ">
                            <!-- Catatan -->
                            <table
                                style="border-collapse: collapse; background-color:white; width:600px; font-size: 14px; text-align: left;">
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
                                        <td colspan="2" style="border: none;">Sampel dikatakan positif apabila
                                            memberikan
                                            nilai Ct<br />
                                            Pengujian berdasarkan pada Matras M, Stachnik M, Borzym E, Maj-Paluch J,
                                            </i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-size: 14px; border: none;" width="5%">2</td>
                                        <!-- Menampilkan nomor urut -->
                                        <td width="1%" style="border: none;">.</td> <!-- Menampilkan nomor urut -->
                                        <td colspan="2" style="border: none;">Reichert M. 2019. Potential vector species
                                            of
                                            carp edema virus (CEV). J Fish Dis.
                                            42 (7): 959 – 964
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div
                            style="display:flex; justify-content:space-between ;  width:600px; margin: 0 auto;margin-top: 48px; ">
                            <!-- TTD -->
                            <table style="border-collapse: collapse; background-color:white; width: 200px;">

                                <tr>
                                    <td style="border: none"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;">
                                        Penyelia
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none"> </td>
                                    <td colspan="2" style="font-size: 14px; padding-top: 64px; border: none;"></td>
                                </tr>
                                <!-- <tr>
                                    <td style="border: none;"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;"><u>
                                            Sri Wahyuni, S.Pi, M.Si
                                        </u></td>
                                </tr> -->

                            </table>
                            <table style="border-collapse: collapse; background-color:white; width: 450px;">
                                <tr>
                                    <td style="width: 48%; border: none;"></td>
                                    <td style="font-size: 14px; width: 8%; border: none;">Jakarta, </td>
                                    <td style="font-size: 14px; border: none;">
                                        12 Desember 2020
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border: none"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;">
                                        Manajer Teknis
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none"> </td>
                                    <td colspan="2" style="font-size: 14px; padding-top: 64px; border: none;"></td>
                                </tr>
                                <!-- <tr>
                                    <td style="border: none;"></td>
                                    <td colspan="2" style="font-size: 14px; border: none;"><u>
                                            Sri Wahyuni, S.Pi, M.Si
                                        </u></td>
                                </tr> -->

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
        const doc = document.getElementById('lhu-doc');

        const newWin = window.open('', 'Print-Window');

        var htmlToPrintCss = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'border: 1px solid #000;' +
            'padding: 0.5em;' +
            '}' +
            '@page {' +
            'size: A4; /* Set the page size to A4 */' +
            'margin: 1cm;' +
            '}' +
            '</style>';

        const html = '' +
            '<html>' +
            '<head>' + htmlToPrintCss + '</head>' +
            '<body onload="window.print()">' + doc.innerHTML + '</body>' +
            '</html>';

        newWin.document.open();
        newWin.document.write(html);
        newWin.print();
    }

</script>



<?= $this->endSection('scripts'); ?>
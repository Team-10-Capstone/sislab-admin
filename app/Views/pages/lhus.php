<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

<!-- Flatpickr Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css'); ?>">

<!-- Choices Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/choices.js/public/assets/styles/choices.min.css'); ?>">

<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start::main-content -->
    <div class="main-content">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="toast-container">
                <div class="ti-toast bg-white dark:bg-bgdark dark:border-white/10" role="alert">
                    <div class="flex p-4">
                        <div class="flex-shrink-0">
                            <svg class="h-4 w-4 text-green-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm text-gray-700 dark:text-white/70">
                                <?= session()->getFlashdata('success') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="block justify-between page-header sm:flex">
            <div>
                <h3
                    class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Laporan Hasil Uji Sementara
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
                    Laporan Hasil Uji Sementara
                </li>
            </ol>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12">
                <div class="box">
                    <div class="box-header lg:flex lg:justify-between">
                        <h5 class="box-title my-auto">Daftar FPPC</h5>

                    </div>
                    <div class="box-body">
                        <form method="get" action="<?= site_url('FppcController/index') ?>" onsubmit="return false;"
                            id="search-form" class="xl:flex xl:justify-between space-y-3 xl:space-y-0">
                            <div class="sm:flex sm:space-x-3 space-y-3 sm:space-y-0 rtl:space-x-reverse">
                                <div class="relative max-w-xs">
                                    <label for="hs-table-search" class="sr-only">Pencarian</label>
                                    <input type="text" name="keyword" id="search-ppk"
                                        class="px-3 py-2 ltr:pr-10 rtl:pl-10 ti-form-input"
                                        placeholder="Cari nomor FPPC atau PPK"
                                        value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>"
                                        autocomplete="off">

                                    <div
                                        class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center pointer-events-none ltr:pr-4 rtl:pl-4">
                                        <i class="ri-search-line text-gray-500 dark:text-white/70"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:space-x-3 sm:flex space-y-3 sm:space-y-0 rtl:space-x-reverse">
                                <div class="inline-flex">
                                    <div
                                        class="px-4 py-2 inline-flex items-center min-w-fit ltr:rounded-l-sm rtl:rounded-r-sm border ltr:border-r-0 rtl:border-l-0 border-gray-200 bg-gray-50 dark:bg-black/20 dark:border-white/10">
                                        <span class="text-sm text-gray-500 dark:text-white/70"><i
                                                class="ri ri-calendar-line"></i></span>
                                    </div>

                                    <input type="hidden" name="start_date" value="">
                                    <input type="hidden" name="end_date" value="">

                                    <input type="text"
                                        class="px-3 py-2 ti-form-input ltr:rounded-l-none rtl:rounded-r-none focus:z-10 flatpickr-input"
                                        id="daterange" placeholder="Filter By Date" readonly
                                        value="<?php echo !empty($_GET['start_date']) ? $_GET['start_date'] : '' ?>  <?php echo !empty($_GET['end_date']) ? 'to ' . $_GET['end_date'] : '' ?>" />

                                </div>
                                <div class="hs-dropdown ti-dropdown">
                                    <button id="hs-dropdown-transform-style" type="button"
                                        class="px-3 py-2 hs-dropdown-toggle ti-dropdown-toggle">
                                        <?php
                                        $value = isset($_GET['tipe_permohonan']) ? $_GET['tipe_permohonan'] : '';
                                        if ($value == '1') {
                                            echo 'Eksport';
                                        } elseif ($value == '2') {
                                            echo 'Import';
                                        } elseif ($value == '3') {
                                            echo 'Domestik keluar';
                                        } elseif ($value == '4') {
                                            echo 'Domestik masuk';
                                        } elseif ($value == '5') {
                                            echo 'Surveilance/Mandiri';
                                        } else {
                                            echo 'Semua jenis';
                                        }
                                        ?>
                                        <svg class="hs-dropdown-open:rotate-180 ti-dropdown-caret" width="16"
                                            height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                    </button>

                                    <input type="hidden" name="kd_kegiatan" value="">

                                    <div id="dropdown-tipe" aria-labelledby="hs-dropdown-transform-style"
                                        data-hs-transition
                                        class="hs-dropdown-menu hidden z-10 hs-dropdown-open:ease-in hs-dropdown-open:opacity-100 hs-dropdown-open:scale-100 transition ease-out scale-95 duration-200 origin-top-left ti-dropdown-menu">
                                        <a id="" class="ti-dropdown-item" href="javascript:void(0);">
                                            Semua jenis
                                        </a>
                                        <a id="I" class="ti-dropdown-item" href="javascript:void(0);">
                                            Import
                                        </a>
                                        <a id="N" class="ti-dropdown-item" href="javascript:void(0);">
                                            Surveilance & Mandiri
                                        </a>
                                        <a id="K" class="ti-dropdown-item" href="javascript:void(0);">
                                            Domestik keluar
                                        </a>
                                        <a id="M" class="ti-dropdown-item" href="javascript:void(0);">
                                            Domestik masuk
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5 table-bordered rounded-sm ti-custom-table-head overflow-auto">
                            <table
                                class="ti-custom-table ti-custom-table-head edit-table whitespace-nowrap text-center">
                                <thead class="bg-gray-50 dark:bg-black/20">
                                    <tr class="cart-box">

                                        <th scope="col" class="dark:text-white/70">No FPPC</th>
                                        <th scope="col" class="dark:text-white/70">Trader</th>
                                        <th scope="col" class="dark:text-white/70">Tipe Permohonan</th>
                                        <th scope="col" class="dark:text-white/70">Tanggal dibuat</th>
                                        <th scope="col" class="dark:text-white/70">Status</th>
                                        <th scope="col" class="dark:text-white/70">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row): ?>
                                        <tr class="invoice-list">

                                            <td>
                                                <?php echo $row['no_ppk']; ?>
                                            </td>
                                            <td class="max-w-sm overflow-hidden">
                                                <div class="flex space-x-3 rtl:space-x-reverse text-start">
                                                    <div class="block">
                                                        <p
                                                            class="block text-sm font-semibold text-gray-800 dark:text-white my-auto">
                                                            <?php echo $row['nama_trader']; ?>
                                                        </p>
                                                        </p>
                                                        <p class="block text-xs text-gray-500 dark:text-white/70 my-auto">
                                                            <?php echo $row['alamat_trader']; ?>
                                                        </p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span
                                                    class="truncate whitespace-nowrap inline-block py-1 px-3 rounded-full text-xs font-medium bg-success/10 text-success/80">
                                                    <?php
                                                    $tipe_permohonan = $row['tipe_permohonan'];

                                                    if ($tipe_permohonan == 'mandiri') {
                                                        echo 'Mandiri';
                                                    } elseif ($tipe_permohonan == 'monsur') {
                                                        echo 'Monsur';
                                                    } elseif ($tipe_permohonan == 'lalulintas') {
                                                        echo 'Lalulintas';
                                                    } else {
                                                        echo 'Lainnya';
                                                    }
                                                    ?>
                                                </span>
                                            </td>

                                            <td>
                                                <?php
                                                $date = $row['created_at'];
                                                $prettyDate = date("d-m-Y", strtotime($date));

                                                echo $prettyDate;
                                                ?>
                                            </td>

                                            <td class="max-w-sm overflow-hidden">
                                                <span
                                                    class='truncate whitespace-nowrap inline-block py-1 px-3 rounded-full text-xs font-medium bg-info/10 text-info/80'>
                                                    <?php echo $row['status']; ?>
                                                </span>
                                            </td>

                                            <td class="font-medium space-x-2 rtl:space-x-reverse">
                                                <a href="<?= site_url('lhus/verifikasi/' . $row['id']) ?>"
                                                    class="invoice-edit m-0 relative ti-btn rounded-full p-2 transition-none focus:outline-none ti-btn-soft-secondary">
                                                    <i class="ti ti-pencil"></i>
                                                    <p>
                                                        Lihat detail
                                                    </p>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>


                        <?= $pager_links ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->

    </div>
    <!-- End::main-content -->

</div>

<!-- Start::Invoice Modal-->


<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>
<!-- Flatpickr JS -->
<script src="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.js'); ?>"></script>

<!-- Choices JS -->
<script src="<?php echo base_url('assets/libs/choices.js/public/assets/scripts/choices.min.js'); ?>"></script>

<!-- Invoice JS -->
<script src="<?php echo base_url('assets/js/permohonan-ppk.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
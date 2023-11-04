<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>
<!-- Swiper Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/swiper/swiper-bundle.min.css'); ?>">

<!-- Choices Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/choices.js/public/assets/styles/choices.min.css'); ?>">

<!-- Quill Css -->
<link id="style" href="<?php echo base_url('assets/libs/quill/quill.snow.css'); ?>" rel="stylesheet">

<!-- Flatpickr Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css'); ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/libs/@simonwep/pickr/themes/nano.min.css'); ?>">

<!-- filepond File Upload  Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/filepond/filepond.min.css'); ?>">
<link rel="stylesheet"
    href="<?php echo base_url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css'); ?>">
<link rel="stylesheet"
    href="<?php echo base_url('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css'); ?>">
<link rel="stylesheet"
    href="<?php echo base_url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css'); ?>">
<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <?php if (session()->getFlashdata('success')): ?>
                                                                    <div class="toast-container">
                                                                        <div class="ti-toast bg-white dark:bg-bgdark dark:border-white/10" role="alert">
                                                                            <div class="flex p-4">
                                                                                <div class="flex-shrink-0">
                                                                                    <svg class="h-4 w-4 text-green-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                        fill="currentColor" viewBox="0 0 16 16">
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

    <?php if (session()->getFlashdata('errors')): ?>
                                                                    <div class="toast-container">
                                                                        <div class="ti-toast bg-white dark:bg-bgdark dark:border-white/10" role="alert">
                                                                            <div class="flex p-4">
                                                                                <div class="flex-shrink-0">
                                                                                    <svg class="h-4 w-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                        fill="currentColor" viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm3.97 12.97a.75.75 0 0 1-1.06 1.06L8 9.06l-3.91 3.91a.75.75 0 0 1-1.06-1.06L6.94 8 2.03 4.09a.75.75 0 1 1 1.06-1.06L8 6.94l3.91-3.91a.75.75 0 1 1 1.06 1.06L9.06 8l3.91 3.91z" />
                                                                                    </svg>
                                                                                </div>
                                                                                <div class="ltr:ml-3 rtl:mr-3">
                                                                                    <p class="text-sm text-gray-700 dark:text-white/70">
                                                                                        <?= session()->getFlashdata('errors') ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    <?php endif; ?>

    <!-- Start::main-content -->
    <div class="main-content">

        <!-- Page Header -->
        <div class="block justify-between page-header sm:flex">
            <div>
                <h3
                    class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Input Hasil Uji</h3>
            </div>
            <div class="text-end border-t-0 px-0 flex items-center justify-end">
                <button type="button" class="sm:m-0 ti-btn ti-btn-disabled ti-btn-primary" disabled
                    style="display: none;">
                    <span
                        class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                        role="status" aria-label="loading"></span>
                    Loading
                </button>
                <a href="/pengujian" class="text-white">
                    <button class="ti-btn btn ti-btn-danger cursor-pointer cancel-button">
                        <i class="ti ti-circle-x"></i>
                        Batal
                    </button>
                </a>
                <a href="<?php echo base_url("pengujian/selesai/" . $fppc['id']); ?>"
                    class="ti-btn btn ti-btn-primary cursor-pointer approve-button"><i class="ti ti-circle-check"></i>
                    Selesaikan Pengujian
                </a>
            </div>
        </div>
        <!-- Page Header Close -->



        <!-- Start::row-1 -->
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12">
                <div class="box !bg-transparent border-0 shadow-none">
                    <div class="box-body p-0">
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="col-span-12 xl:col-span-4 md:grid grid-cols-1">
                                <div class="box h-max">
                                    <div class="box-header">
                                        <h5 class="box-title">Detail FPPC</h5>
                                    </div>
                                    <div class="box-body p-0">
                                        <div class="rounded-sm overflow-auto">
                                            <table class="ti-custom-table ti-custom-table-head">
                                                <tbody>
                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Trader
                                                        </td>
                                                        <td>
                                                            <?= $fppc['nama_trader']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Alamat Trader
                                                        </td>
                                                        <td>
                                                            <?= $fppc['alamat_trader']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Penerima
                                                        </td>
                                                        <td>
                                                            <?= $fppc['nama_penerima']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Alamat Penerima
                                                        </td>
                                                        <td>
                                                            <?= $fppc['alamat_penerima']; ?>
                                                        </td>
                                                    </tr>


                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">Tipe Permohonan</td>
                                                        <td>
                                                            <span
                                                                class="truncate whitespace-nowrap inline-block py-1 px-3 rounded-full text-xs font-medium bg-success/10 text-success/80">
                                                                <?php
                                                                $tipe_permohonan = $fppc['tipe_permohonan'];

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
                                                    </tr>
                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">Status permohonan</td>
                                                        <td>
                                                            <span
                                                                class="truncate whitespace-nowrap inline-block py-1 px-3 rounded-full text-xs font-medium bg-info/10 text-info/80">
                                                                <?php echo $fppc['status']; ?>

                                                            </span>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="box h-max">
                                    <div class="box-header">
                                        <div class="flex justify-between">
                                            <h5 class="box-title">Petugas</h5>
                                        </div>
                                    </div>
                                    <div class="box-body space-y-4 text-center">
                                        <ul class="flex flex-col">
                                            <li
                                                class="ti-list-group bg-white text-gray-800 dark:bg-bgdark dark:border-white/10 dark:text-white">
                                                <div class="flex space-y-2 xxxl:space-y-0 justify-between w-full">
                                                    <div class="flex items-center">
                                                        <img class="avatar avatar-xs rounded-sm"
                                                            src="<?php echo base_url('assets/img/users/2.jpg'); ?>"
                                                            alt="Image Description">
                                                        <div class="ltr:ml-4 rtl:mr-4">
                                                            <h5 class="text-gray-800 dark:text-white">
                                                                <?= $managerData['name']; ?>
                                                            </h5>
                                                            <p class="text-xs text-gray-500 dark:text-white/70">
                                                                <?= $managerData['email']; ?>
                                                            </p>
                                                            <p class="text-xs text-blue-500 mt-1 dark:text-white/70">
                                                                <?= $managerData['mobile']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <button type="button"
                                                            class="ti-btn p-1 m-0 text-xs font-medium bg-white border-gray-200 text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                                                            <i class="ri-user-unfollow-line"></i>
                                                            Manager Teknis
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php foreach ($disposisis as $disposisi): ?>
                                                                                                            <li
                                                                                                                class="ti-list-group bg-white text-gray-800 dark:bg-bgdark dark:border-white/10 dark:text-white">
                                                                                                                <div class="flex space-y-2 xxxl:space-y-0 justify-between w-full">
                                                                                                                    <div class="flex items-center">
                                                                                                                        <img class="avatar avatar-xs rounded-sm"
                                                                                                                            src="<?php echo base_url('assets/img/users/2.jpg'); ?>"
                                                                                                                            alt="Image Description">
                                                                                                                        <div class="ltr:ml-4 rtl:mr-4">
                                                                                                                            <h5 class="text-gray-800 dark:text-white">
                                                                                                                                <?= $disposisi['nama_admin']; ?>
                                                                                                                            </h5>
                                                                                                                            <p class="text-xs text-gray-500 dark:text-white/70">
                                                                                                                                <?= $disposisi['email_admin']; ?>
                                                                                                                            </p>
                                                                                                                            <p class="text-xs text-blue-500 mt-1 dark:text-white/70">
                                                                                                                                <?= $disposisi['mobile_admin']; ?>
                                                                                                                            </p>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="my-auto">
                                                                                                                        <button type="button"
                                                                                                                            class="ti-btn p-1 m-0 text-xs font-medium bg-white border-gray-200 text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                                                                                                                            <i class="ri-user-unfollow-line"></i> Penyelia
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box h-max">
                                    <div class="box-body space-y-5">
                                        <div class="md:grid grid-cols-2 gap-6">
                                            <div>
                                                <label for="input-label" class="ti-form-label">
                                                    Tanggal Pengujian
                                                </label>
                                                <div class="flex rounded-sm shadow-sm">
                                                    <div
                                                        class="px-4 inline-flex items-center min-w-fit ltr:rounded-l-sm rtl:rounded-r-sm border ltr:border-r-0 rtl:border-l-0 border-gray-200 bg-gray-50 dark:bg-black/20 dark:border-white/10">
                                                        <span class="text-sm text-gray-500 dark:text-white/70"><i
                                                                class="ri ri-calendar-line"></i></span>
                                                    </div>
                                                    <input type="text"
                                                        class="ti-form-input ltr:rounded-l-none rtl:rounded-r-none focus:z-10 flatpickr-input"
                                                        id="blog-date" placeholder="Choose date"
                                                        value="<?= $disposisis[0]['tanggal_pengujian']; ?>" />
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="col-span-12 lg:col-span-4">
                                                    <label for="input-label" class="ti-form-label">
                                                        Waktu Pengujian
                                                    </label>
                                                    <div class="flex rounded-sm shadow-sm">
                                                        <div
                                                            class="px-4 inline-flex items-center min-w-fit ltr:rounded-l-sm rtl:rounded-r-sm border ltr:border-r-0 rtl:border-l-0 border-gray-200 bg-gray-50 dark:bg-black/20 dark:border-white/10">
                                                            <span class="text-sm text-gray-500 dark:text-white/70"><i
                                                                    class="ri ri-time-line"></i></span>
                                                        </div>
                                                        <input type="text"
                                                            class="ti-form-input ltr:rounded-l-none rtl:rounded-r-none focus:z-10 flatpickr-input"
                                                            id="blog-time" placeholder="Choose date" value="<?php
                                                            // 04:00:00.0000000
                                                            $time = $disposisis[0]['waktu_pengujian'];

                                                            $pretty = date("H:i", strtotime($time));
                                                            echo $pretty;
                                                            ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-8 grid grid-cols-2 gap-6">
                                <?php foreach ($permohonans as $permohonan): ?>
                                                                                                <div class="box h-max">
                                                                                                    <?php
                                                                                                    $status = $permohonan['parameter_uji']['status'];
                                                                                                    if ($status == 'pending') {
                                                                                                        echo '<div class="box-header text-warning bg-warning/20">
                                                <p class="text-sm font-medium ">
                                                    Belum dilakukan pengujian
                                                </p>
                                            </div>';
                                                                                                    } elseif ($status == 'diproses') {
                                                                                                        echo '<div class="box-header text-info bg-info/20">
                                                <p class="text-sm font-medium ">
                                                    Sedang dilakukan pengujian
                                                </p>
                                            </div>';
                                                                                                    } else {
                                                                                                        echo '<div class="box-header text-success bg-success/20">
                                                <p class="text-sm font-medium ">
                                                    Telah dilakukan pengujian
                                                </p>
                                            </div>';
                                                                                                    }
                                                                                                    ?>


                                                                                                    <div class="box-body">


                                                                                                        <div class="flex relative mb-4">
                                                                                                            <div class="absolute h-full w-full inset-0"></div>
                                                                                                            <div class="ltr:pr-2 rtl:pl-2">
                                                                                                                <span class="avatar rounded-sm bg-red-500/20 text-red-500 p-2.5"><i
                                                                                                                        class="ti ti-flask-2 text-2xl leading-none"></i></span>
                                                                                                            </div>
                                                                                                            <div class="flex-1">
                                                                                                                <div class="flex justify-between items-center mb-1 text-sm">
                                                                                                                    <span class="text-base font-semibold text-gray-800 dark:text-white">
                                                                                                                        <?= $permohonan['parameter_uji']['keterangan_uji']; ?>
                                                                                                                    </span>
                                                                                                                    <span class="text-success text-end inline-flex"><i
                                                                                                                            class="ti ti-circles text-xs ltr:mr-1 rtl:ml-1"></i>
                                                                                                                        <?php
                                                                                                                        echo count($permohonan['dtl_fppc']);
                                                                                                                        ?> Kode Sampel
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                                <div class="flex justify-between items-center text-xs">
                                                                                                                    <span class="text-gray-500 dark:text-white/70">
                                                                                                                        <?= $permohonan['parameter_uji']['jenis_parameter']; ?>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="flex items-center">
                                                                                                            <button
                                                                                                                class="hs-dropdown-toggle flex-1 m-0 py-1 ti-btn ti-btn-soft-light ltr:mr-2 rtl:ml-2"
                                                                                                                data-hs-overlay="#hs-focus-management-modal<?php
                                                                                                                echo $permohonan['parameter_uji']['jenis_parameter'] . '2'
                                                                                                                    ?>">
                                                                                                                Lihat Detail
                                                                                                            </button>
                                                                                                            <button class="hs-dropdown-toggle flex-1 m-0 py-1 ti-btn ti-btn-soft-primary <?php
                                                                                                            $hasAccess = $permohonan['isPenyeliaHasAccess'];

                                                                                                            if (!$hasAccess) {
                                                                                                                echo ' hidden';
                                                                                                            }
                                                                                                            ;
                                                                                                            ?>" data-hs-overlay="#hs-focus-management-modal<?php
                                                                                                            $status = $permohonan['parameter_uji']['status'];
                                                                                                            if ($status == 'selesai') {
                                                                                                                echo $permohonan['parameter_uji']['jenis_parameter'] . '2';
                                                                                                            } else {
                                                                                                                echo $permohonan['parameter_uji']['jenis_parameter'];
                                                                                                            }
                                                                                                            ?>">
                                                                                                                <?php
                                                                                                                $status = $permohonan['parameter_uji']['status'];
                                                                                                                if ($status == 'selesai') {
                                                                                                                    echo 'Lihat Hasil Uji';
                                                                                                                } else {
                                                                                                                    echo 'Inputkan Hasil Uji';
                                                                                                                }
                                                                                                                ?>
                                                                                                            </button>

                                                                            

                                                                                                            <div id="hs-focus-management-modal<?php echo $permohonan['parameter_uji']['jenis_parameter']; ?>"
                                                                                                                class="hs-overlay hidden ti-modal text-left">
                                                                                                                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out !max-w-2xl">
                                                                                                                    <div class="ti-modal-content">
                                                                                                                        <div class="ti-modal-header">
                                                                                                                            <h3 class="ti-modal-title">
                                                                                                                                Hasil Uji
                                                                                                                            </h3>
                                                                                                                            <button type="button"
                                                                                                                                class="hs-dropdown-toggle ti-modal-close-btn"
                                                                                                                                data-hs-overlay="#hs-focus-management-modal<?php echo $permohonan['parameter_uji']['jenis_parameter']; ?>">
                                                                                                                                <span class="sr-only">Close</span>
                                                                                                                                <svg class="w-3.5 h-3.5" width="8" height="8"
                                                                                                                                    viewBox="0 0 8 8" fill="none"
                                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                                    <path
                                                                                                                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                                                                                                        fill="currentColor" />
                                                                                                                                </svg>
                                                                                                                            </button>
                                                                                                                        </div>


                                                                                                                        <form id="create-hasil-uji" method="post"
                                                                                                                            action="<?php echo base_url("hasil-uji/create"); ?>"
                                                                                                                            enctype="multipart/form-data">
                                                                                                                            <!-- upload graph -->
                                                                                                                            <div class="box">
                                                                                                                                <div class="box-header">
                                                                                                                                    <h5 class="box-title">
                                                                                                                                        Gambar
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                                <div class="box-body">

                                                                                                                                    <input type="file" class="filepond" name="image"
                                                                                                                                        data-max-file-size="3MB" id="image">
                                                                                                                                </div>
                                                                                                                            </div>


                                                                                                                            <input type="text" class="hidden"
                                                                                                                                name="permohonan[<?= $permohonan['parameter_uji']['kode_uji']; ?>][kontrol_positif_warna]"
                                                                                                                                id="warna-<?= $permohonan['parameter_uji']['kode_uji']; ?>"
                                                                                                                                >

                                                                                                                            <input type="text" class="hidden"
                                                                                                                                name="permohonan[<?= $permohonan['parameter_uji']['kode_uji']; ?>][kontrol_negatif_warna]"
                                                                                                                                id="warna-<?= $permohonan['parameter_uji']['kode_uji']; ?>2"
                                                                                                                                >
                                                                                                                            <!-- perkontrollan -->
                                                                                                                            <div class="lg:flex items-center border-t">
                                                                                                                                <div class="border-b lg:border-r">
                                                                                                                                    <div class="box-header">
                                                                                                                                        <h5 class="box-title">Kontrol Positif</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="box-body">
                                                                                                                                        <div class="flex gap-6">
                                                                                                                                            <div class="flex justify-between">
                                                                                                                                                <div>
                                                                                                                                                    <p class="mb-2">
                                                                                                                                                        Warna
                                                                                                                                                    </p>
                                                                                                                                                    <div class="theme-container2"></div>
                                                                                                                                                    <div id="<?= $permohonan['parameter_uji']['kode_uji']; ?>"
                                                                                                                                                        class="pickr-container2 text-center">
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="flex-1 space-y-4">
                                                                                                                                                <div>
                                                                                                                                                    <label
                                                                                                                                                        class="ti-form-select-label">Hasil
                                                                                                                                                        Uji</label>
                                                                                                                                                    <select
                                                                                                                                                        class="ti-form-select blog-tag2"
                                                                                                                                                        name="permohonan[<?= $permohonan['parameter_uji']['kode_uji']; ?>][kontrol_positif_hasil]">
                                                                                                                                                        >
                                                                                                                                                        <option value="negatif"
                                                                                                                                                            selected>
                                                                                                                                                            Negatif
                                                                                                                                                        </option>
                                                                                                                                                        <option value="positif">Positif
                                                                                                                                                        </option>

                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <label for="input-label1"
                                                                                                                                                        class="ti-form-label">
                                                                                                                                                        CT
                                                                                                                                                    </label>
                                                                                                                                                    <input type="text" id="input-label1"
                                                                                                                                                        class="ti-form-input"
                                                                                                                                                        placeholder="CT"
                                                                                                                                                        name="permohonan[<?= $permohonan['parameter_uji']['kode_uji']; ?>][kontrol_positif_ct]" />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="border-b">
                                                                                                                                    <div class="box-header">
                                                                                                                                        <h5 class="box-title">Kontrol Negatif</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="box-body">
                                                                                                                                        <div class="flex gap-6">
                                                                                                                                            <div class="flex justify-between">
                                                                                                                                                <div>
                                                                                                                                                    <p class="mb-2">
                                                                                                                                                        Warna
                                                                                                                                                    </p>
                                                                                                                                                    <div class="theme-container3"></div>
                                                                                                                                                    <div id="<?= $permohonan['parameter_uji']['kode_uji']; ?>2"
                                                                                                                                                        class="pickr-container3 text-center">
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="flex-1 space-y-4">
                                                                                                                                                <div>
                                                                                                                                                    <label
                                                                                                                                                        class="ti-form-select-label">Hasil
                                                                                                                                                        Uji</label>
                                                                                                                                                    <select
                                                                                                                                                        class="ti-form-select blog-tag2"
                                                                                                                                                        name="permohonan[<?= $permohonan['parameter_uji']['kode_uji']; ?>][kontrol_negatif_hasil]">
                                                                                                                                                        >
                                                                                                                                                        <option value="negatif"
                                                                                                                                                            selected>
                                                                                                                                                            Negatif
                                                                                                                                                        </option>
                                                                                                                                                        <option value="positif">Positif
                                                                                                                                                        </option>

                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <label for="input-label1"
                                                                                                                                                        class="ti-form-label">
                                                                                                                                                        CT
                                                                                                                                                    </label>
                                                                                                                                                    <input type="text" id="input-label1"
                                                                                                                                                        class="ti-form-input"
                                                                                                                                                        placeholder="CT"
                                                                                                                                                        name="permohonan[<?= $permohonan['parameter_uji']['kode_uji']; ?>][kontrol_negatif_ct]" />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="ti-modal-body pb-32 space-y-4">
                                                                                                                                <h5 class="box-title">Pengujian Sampel</h5>
                                                                                                                                <?php foreach ($permohonan['dtl_fppc'] as $key => $sampel): ?>
                                                                                                                                                                                                <div class="box shadow-lg shadow-gray-400/10">
                                                                                                                                                                                                    <input type="hidden"
                                                                                                                                                                                                        name="sampels[<?= $key; ?>][fppc_id]"
                                                                                                                                                                                                        value="<?= $sampel['fppc_id']; ?>">
                                                                                                                                                                                                    <input type="hidden"
                                                                                                                                                                                                        name="sampels[<?= $key; ?>][dtl_fppc_id]"
                                                                                                                                                                                                        value="<?= $sampel['dtl_fppc_id']; ?>">
                                                                                                                                                                                                    <input type="hidden"
                                                                                                                                                                                                        name="sampels[<?= $key; ?>][permohonan_uji_id]"
                                                                                                                                                                                                        value="<?= $sampel['permohonan_uji_id']; ?>">
                                                                                                                                                                                                    <input type="hidden"
                                                                                                                                                                                                        name="sampels[<?= $key; ?>][kode_uji]"
                                                                                                                                                                                                        value="<?= $permohonan['parameter_uji']['kode_uji']; ?>">


                                                                                                                                                                                                    <div class="box-body border-b flex justify-between">
                                                                                                                                                                                                        <div class="">
                                                                                                                                                                                                            <div class="flex relative">
                                                                                                                                                                                                                <div
                                                                                                                                                                                                                    class="absolute h-full w-full inset-0">
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class="ltr:pr-2 rtl:pl-2">
                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                        class="avatar rounded-sm bg-blue-500/20 text-blue-500 p-2.5"><i
                                                                                                                                                                                                                            class="ti ti-fish text-2xl leading-none"></i></span>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                                                                    <div
                                                                                                                                                                                                                        class="flex justify-between items-center mb-1 text-sm">
                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                            class="text-base font-semibold text-gray-800 dark:text-white">
                                                                                                                                                                                                                            <?= $sampel['nama_lokal']; ?>
                                                                                                                                                                                                                        </span>

                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                    <p
                                                                                                                                                                                                                        class="text-smtext-gray-500 dark:text-white/70">
                                                                                                                                                                                                                        <?= $sampel['jumlah_sampel']; ?>
                                                                                                                                                                                                                        Sampel
                                                                                                                                                                                                                    </p>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div class="flex flex-wrap space-x-3 mt-4">
                                                                                                                                                                                                                <button type="button"
                                                                                                                                                                                                                    class="ti-btn p-1 m-0 text-xs font-medium bg-white border-gray-200 text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                                                                                                                                                                                                                    <i class="ti ti-hexagon"></i>
                                                                                                                                                                                                                    <span class=" text-gray-500
                                                                                            dark:text-white/70">
                                                                                                                                                                                                                        <?= $sampel['nama_bentuk']; ?>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                </button>

                                                                                                                                                                                                                <button type="button"
                                                                                                                                                                                                                    class="ti-btn p-1 m-0 text-xs font-medium bg-white border-gray-200 text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                                                                                                                                                                                                                    <i class="ti ti-bucket"></i>
                                                                                                                                                                                                                    <span class=" text-gray-500
                                                                                            dark:text-white/70">
                                                                                                                                                                                                                        <?= $sampel['nama_wadah']; ?>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                </button>

                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <div class="flex flex-col items-center">
                                                                                                                                                                                                            <p class="mb-2">
                                                                                                                                                                                                                Warna
                                                                                                                                                                                                            </p>
                                                                                                                                                                                                            <div class="warna-sampel"
                                                                                                                                                                                                                id="warna<?= $key; ?>">

                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <input type="hidden"
                                                                                                                                                                                                            name="sampels[<?= $key; ?>][warna]"
                                                                                                                                                                                                            id="input-warna<?= $key; ?>" value="#000" />
                                                                                                                                                                                                    </div>

                                                                                                                                                                                                    <div class="box-body grid lg:grid-cols-2 gap-6">
                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label class="ti-form-select-label">Hasil
                                                                                                                                                                                                                Uji</label>
                                                                                                                                                                                                            <select class="ti-form-select blog-tag2"
                                                                                                                                                                                                                name="sampels[<?= $key; ?>][hasil_uji]">
                                                                                                                                                                                                                >
                                                                                                                                                                                                                <option value="negatif" selected>Negatif
                                                                                                                                                                                                                </option>
                                                                                                                                                                                                                <option value="positif">Positif
                                                                                                                                                                                                                </option>

                                                                                                                                                                                                            </select>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="input-label1"
                                                                                                                                                                                                                class="ti-form-label">
                                                                                                                                                                                                                CT
                                                                                                                                                                                                            </label>
                                                                                                                                                                                                            <input type="text" id="input-label1"
                                                                                                                                                                                                                class="ti-form-input"
                                                                                                                                                                                                                name="sampels[<?= $key; ?>][ct]"
                                                                                                                                                                                                                placeholder="CT" />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="input-label1"
                                                                                                                                                                                                                class="ti-form-label">
                                                                                                                                                                                                                Keterangan
                                                                                                                                                                                                            </label>
                                                                                                                                                                                                            <input type="textarea" id="input-label1"
                                                                                                                                                                                                                class="ti-form-input"
                                                                                                                                                                                                                name="sampels[<?= $key; ?>][keterangan]"
                                                                                                                                                                                                                placeholder="Keterangan" />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label
                                                                                                                                                                                                                class="ti-form-select-label">Analis</label>
                                                                                                                                                                                                            <select class="ti-form-select blog-tag2"
                                                                                                                                                                                                                name="sampels[<?= $key; ?>][analis_id]">
                                                                                                                                                                                                                <?php foreach ($analiss as $analis): ?>
                                                                                                                                                                                                                                                                                <option
                                                                                                                                                                                                                                                                                    value="<?= $analis['adminId']; ?>">
                                                                                                                                                                                                                                                                                    <?= $analis['name']; ?>
                                                                                                                                                                                                                                                                                </option>
                                                                                                                                                                                                                <?php endforeach; ?>
                                                                                                                                                                                                            </select>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>

                                                                                                                                                                                                </div>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </div>

                                                                                                                            <div class="ti-modal-footer">
                                                                                                                                <button
                                                                                                                                    class="ti-btn btn ti-btn-danger cursor-pointer cancel-button"
                                                                                                                                    data-hs-overlay="#hs-focus-management-modal<?php echo $permohonan['parameter_uji']['jenis_parameter']; ?>"
                                                                                                                                    type='button'>
                                                                                                                                    <i class="ti ti-circle-x"></i>
                                                                                                                                    Batal
                                                                                                                                </button>

                                                                                                                                <button type="submit"
                                                                                                                                    class="ti-btn btn ti-btn-primary cursor-pointer approve-button"><i
                                                                                                                                        class="ti ti-circle-check"></i>
                                                                                                                                    Simpan</button>
                                                                                                                            </div>
                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div id="hs-focus-management-modal<?php echo $permohonan['parameter_uji']['jenis_parameter']; ?>2"
                                                                                                                class="hs-overlay hidden ti-modal text-left">
                                                                                                                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out !max-w-2xl">
                                                                                                                    <div class="ti-modal-content">
                                                                                                                        <div class="ti-modal-header">
                                                                                                                            <h3 class="ti-modal-title">
                                                                                                                                Detail Hasil Uji
                                                                                                                            </h3>
                                                                                                                            <button type="button"
                                                                                                                                class="hs-dropdown-toggle ti-modal-close-btn"
                                                                                                                                data-hs-overlay="#hs-focus-management-modal<?php echo $permohonan['parameter_uji']['jenis_parameter']; ?>2">
                                                                                                                                <span class="sr-only">Close</span>
                                                                                                                                <svg class="w-3.5 h-3.5" width="8" height="8"
                                                                                                                                    viewBox="0 0 8 8" fill="none"
                                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                                    <path
                                                                                                                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                                                                                                        fill="currentColor" />
                                                                                                                                </svg>
                                                                                                                            </button>
                                                                                                                        </div>

                                                                                                                        <div class="ti-modal-body pb-32 space-y-4">
                                                                                                                            <div class="box">
                                                                                                                                <div class="box-header">
                                                                                                                                    <h5 class="box-title">
                                                                                                                                        Gambar
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                                <div class="box-body">

                                                                                                                                    <img src="<?php echo $permohonan['image']; ?>"
                                                                                                                                        alt="Image Description">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <!-- perkontrollan -->
                                                                                                                            <div
                                                                                                                                class="border-r border-l rounded-sm lg:flex items-center border-t">
                                                                                                                                <div class="border-b lg:border-r">
                                                                                                                                    <div class="box-header">
                                                                                                                                        <h5 class="box-title">Kontrol Positif</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="box-body">
                                                                                                                                        <div class="flex gap-6">
                                                                                                                                            <div class="flex justify-between">
                                                                                                                                                <div>
                                                                                                                                                    <p class="mb-2">
                                                                                                                                                        Warna
                                                                                                                                                    </p>
                                                                                                                                                    <div class="w-8 h-8 rounded-md"
                                                                                                                                                        style="background-color: <?= $permohonan['kontrol_positif_warna']; ?>;">
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="flex-1 space-y-4">
                                                                                                                                                <div>
                                                                                                                                                    <label
                                                                                                                                                        class="ti-form-select-label">Hasil
                                                                                                                                                        Uji</label>
                                                                                                                                                    <select
                                                                                                                                                        class="ti-form-select blog-tag2"
                                                                                                                                                        name="kontrol_negatif['hasil']"
                                                                                                                                                        disabled
                                                                                                                                                        value="<?= $permohonan['kontrol_positif_hasil']; ?>">
                                                                                                                                                        <option selected
                                                                                                                                                            value="<?= $permohonan['kontrol_positif_hasil']; ?>">
                                                                                                                                                            <?= $permohonan['kontrol_positif_hasil']; ?>
                                                                                                                                                        </option>

                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <label for="input-label1"
                                                                                                                                                        class="ti-form-label">
                                                                                                                                                        CT
                                                                                                                                                    </label>
                                                                                                                                                    <input type="text" id="input-label1"
                                                                                                                                                        class="ti-form-input"
                                                                                                                                                        placeholder="CT" disabled
                                                                                                                                                        value="<?= $permohonan['kontrol_positif_ct']; ?>"
                                                                                                                                                        name="kontrol_positif['ct']" />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="border-b">
                                                                                                                                    <div class="box-header">
                                                                                                                                        <h5 class="box-title">Kontrol Negatif</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="box-body">
                                                                                                                                        <div class="flex gap-6">
                                                                                                                                            <div class="flex justify-between">
                                                                                                                                                <div>
                                                                                                                                                    <p class="mb-2">
                                                                                                                                                        Warna
                                                                                                                                                    </p>
                                                                                                                                                    <div class="w-8 h-8 rounded-md"
                                                                                                                                                        style="background-color: <?= $permohonan['kontrol_negatif_warna']; ?>;">
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="flex-1 space-y-4">
                                                                                                                                                <div>
                                                                                                                                                    <label
                                                                                                                                                        class="ti-form-select-label">Hasil
                                                                                                                                                        Uji</label>
                                                                                                                                                    <select
                                                                                                                                                        class="ti-form-select blog-tag2"
                                                                                                                                                        name="kontrol_negatif['hasil']"
                                                                                                                                                        disabled
                                                                                                                                                        value="<?= $permohonan['kontrol_negatif_hasil']; ?>">
                                                                                                                                                        <option selected
                                                                                                                                                            value="<?= $permohonan['kontrol_negatif_hasil']; ?>">
                                                                                                                                                            <?= $permohonan['kontrol_negatif_hasil']; ?>
                                                                                                                                                        </option>

                                                                                                                                                    </select>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <label for="input-label1"
                                                                                                                                                        class="ti-form-label">
                                                                                                                                                        CT
                                                                                                                                                    </label>
                                                                                                                                                    <input type="text" id="input-label1"
                                                                                                                                                        class="ti-form-input"
                                                                                                                                                        placeholder="CT"
                                                                                                                                                        name="kontrol_negatif['ct']"
                                                                                                                                                        disabled
                                                                                                                                                        value="<?= $permohonan['kontrol_negatif_ct']; ?>" />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <h5 class="box-title">Pengujian Sampel</h5>
                                                                                                                            <?php foreach ($permohonan['dtl_fppc'] as $key => $sampel): ?>
                                                                                                                                                                                            <div class="box shadow-lg shadow-gray-400/10">
                                                                                                                                                                                                <div class="box-body border-b">
                                                                                                                                                                                                    <div class="flex justify-between items-center">
                                                                                                                                                                                                    <div class="flex relative">
                                                                                                                                                                                                        <div class="absolute h-full w-full inset-0">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="ltr:pr-2 rtl:pl-2">
                                                                                                                                                                                                            <span
                                                                                                                                                                                                                class="avatar rounded-sm bg-blue-500/20 text-blue-500 p-2.5"><i
                                                                                                                                                                                                                    class="ti ti-fish text-2xl leading-none"></i></span>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="flex-1">
                                                                                                                                                                                                            <div
                                                                                                                                                                                                                class="flex justify-between items-center mb-1 text-sm">
                                                                                                                                                                                                                <span
                                                                                                                                                                                                                    class="text-base font-semibold text-gray-800 dark:text-white">
                                                                                                                                                                                                                    <?= $sampel['nama_lokal']; ?>
                                                                                                                                                                                                                </span>

                                                                                                                                                                                                            </div>

                                                                                                                                                                                                            <p
                                                                                                                                                                                                                class="text-smtext-gray-500 dark:text-white/70">
                                                                                                                                                                                                                <?= $sampel['jumlah_sampel']; ?>
                                                                                                                                                                                                                Sampel
                                                                                                                                                                                                            </p>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="flex justify-between">
                                                                                                                                                                    <div>
                                                                                                                                                                        <p class="mb-2">
                                                                                                                                                                            Warna
                                                                                                                                                                        </p>
                                                                                                                                                                        <div class="w-8 h-8 rounded-md"
                                                                                                                                                                            style="background-color: <?= $sampel['warna']; ?>;">
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div></div>
                                                                                                                                                                                                    <div class="flex flex-wrap space-x-3 mt-4">
                                                                                                                                                                                                        <button type="button"
                                                                                                                                                                                                            class="ti-btn p-1 m-0 text-xs font-medium bg-white border-gray-200 text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                                                                                                                                                                                                            <i class="ti ti-hexagon"></i>
                                                                                                                                                                                                            <span class=" text-gray-500
                                                                                            dark:text-white/70">
                                                                                                                                                                                                                <?= $sampel['nama_bentuk']; ?>
                                                                                                                                                                                                            </span>
                                                                                                                                                                                                        </button>

                                                                                                                                                                                                        <button type="button"
                                                                                                                                                                                                            class="ti-btn p-1 m-0 text-xs font-medium bg-white border-gray-200 text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:ring-offset-white focus:ring-primary dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                                                                                                                                                                                                            <i class="ti ti-bucket"></i>
                                                                                                                                                                                                            <span class=" text-gray-500
                                                                                            dark:text-white/70">
                                                                                                                                                                                                                <?= $sampel['nama_wadah']; ?>
                                                                                                                                                                                                            </span>
                                                                                                                                                                                                        </button>

                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>

                                                                                                                                                                                                <div class="box-body p-0">
                                                                                                                                                                                                    <div class="rounded-sm overflow-auto">
                                                                                                                                                                                                        <table
                                                                                                                                                                                                            class="ti-custom-table ti-custom-table-head">
                                                                                                                                                                                                            <tbody>
                                                                                                                                                                                                                <tr
                                                                                                                                                                                                                    class="divide-x divide-gray-200 dark:divide-white/10">
                                                                                                                                                                                                                    <td class="font-medium">
                                                                                                                                                                                                                        Hasil Uji
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                    <td>
                                                                                                                                                                                                                        <?= $sampel['hasil_uji']; ?>
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                </tr>

                                                                                                                                                                                                                <tr
                                                                                                                                                                                                                    class="divide-x divide-gray-200 dark:divide-white/10">
                                                                                                                                                                                                                    <td class="font-medium">
                                                                                                                                                                                                                        CT
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                    <td>
                                                                                                                                                                                                                        <?= $sampel['ct']; ?>
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                </tr>

                                                                                                                                                                                                                <tr
                                                                                                                                                                                                                    class="divide-x divide-gray-200 dark:divide-white/10">
                                                                                                                                                                                                                    <td class="font-medium">
                                                                                                                                                                                                                        Keterangan
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                    <td>
                                                                                                                                                                                                                        <?= $sampel['keterangan_hasil']; ?>
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                </tr>

                                                                                                                                                                                                                <tr
                                                                                                                                                                                                                    class="divide-x divide-gray-200 dark:divide-white/10">
                                                                                                                                                                                                                    <td class="font-medium">
                                                                                                                                                                                                                        Analis
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                    <td>
                                                                                                                                                                                                                        <?= $sampel['analis']; ?>
                                                                                                                                                                                                                    </td>
                                                                                                                                                                                                                </tr>
                                                                                                                                                                                                            </tbody>
                                                                                                                                                                                                        </table>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>

                                                                                                                                                                                            </div>
                                                                                                                            <?php endforeach; ?>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                        <?php
                                                                                                        $isHaveAccess = $permohonan['isPenyeliaHasAccess'];
                                                                                                        if (!$isHaveAccess) {
                                                                                                            echo '<div class="bg-yellow-50 border border-yellow-200 alert mt-6" role="alert">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0">
                                                            <svg class="h-4 w-4 text-yellow-400 mt-0.5"
                                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                            </svg>
                                                        </div>
                                                        <div class="ltr:ml-2 rtl:mr-2">
                                                            <h3 class="text-sm text-yellow-800 font-semibold">
                                                                Tidak ada akses
                                                            </h3>
                                                            <div class="mt-1 text-sm text-yellow-700">
                                                               Anda tidak memiliki akses untuk melakukan input hasil uji ini
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>'
                                                                                                            ;
                                                                                                        }
                                                                                                        ?>

                                                                                                    </div>
                                                                                                </div>
                                <?php endforeach; ?>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->

    </div>

</div>
<!-- Start::main-content -->

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Choices JS -->
<script src="<?php echo base_url('assets/libs/choices.js/public/assets/scripts/choices.min.js'); ?>"></script>

<!-- Filepond File Upload JS -->
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js'); ?>"></script>
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js'); ?>"></script>
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js'); ?>"></script>
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js'); ?>"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="<?php echo base_url('assets/libs/filepond/filepond.min.js'); ?>"></script>

<!-- Quill Editor  JS -->
<script src="<?php echo base_url('assets/libs/quill/quill.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/@simonwep/pickr/pickr.es5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/input-uji.js'); ?>"></script>

<!-- Color Picker JS -->




<?= $this->endSection('scripts'); ?>
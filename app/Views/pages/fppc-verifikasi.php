<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/libs/awesome-notifications/style.css'); ?>">


<!-- Swiper Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/swiper/swiper-bundle.min.css'); ?>">

<!-- Choices Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/choices.js/public/assets/styles/choices.min.css'); ?>">

<!-- Quill Css -->
<link id="style" href="<?php echo base_url('assets/libs/quill/quill.snow.css'); ?>" rel="stylesheet">

<!-- filepond File Upload  Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/filepond/filepond.min.css'); ?>">
<link rel="stylesheet"
    href="<?php echo base_url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css'); ?>">
<link rel="stylesheet"
    href="<?php echo base_url('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css'); ?>">
<link rel="stylesheet"
    href="<?php echo base_url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css'); ?>">

<!-- Flatpickr Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.css'); ?>">



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
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="toast-container">
                <div class="ti-toast bg-white dark:bg-bgdark dark:border-white/10" role="alert">
                    <div class="flex p-4">
                        <div class="flex-shrink-0">
                            <svg class="h-4 w-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
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

        <!-- Page Header -->
        <div class="block justify-between page-header sm:flex">
            <div>
                <h3
                    class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Verifikasi Form FPPC</h3>
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
                    Verifikasi FPPC
                </li>
            </ol>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12">
                <div class="box !bg-transparent border-0 shadow-none">
                    <div class="box-body p-0">
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="col-span-12 xl:col-span-4">
                                <div class="box sticky top-24 left-0">
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
                            </div>
                            <div class="col-span-12 xl:col-span-8">
                                <?php foreach ($fppc_details as $fppcItem): ?>
                                    <div class="box">
                                        <!-- loop ppkItems -->
                                        <div class="box-body space-y-5">
                                            <div>
                                                <label for="input-label1" class="ti-form-label">
                                                    Nama Lokal
                                                </label>
                                                <input type="text" id="input-label1" class="ti-form-input"
                                                    placeholder="blogtitle" disabled
                                                    value="<?= $fppcItem['fppc_details']['nama_lokal']; ?>">
                                            </div>
                                            <div class="md:grid grid-cols-2 gap-6">
                                                <div>
                                                    <label for="input-label1" class="ti-form-label">
                                                        Nama Latin
                                                    </label>
                                                    <input type="text" id="input-label1" class="ti-form-input"
                                                        placeholder="blogtitle" disabled
                                                        value="<?= $fppcItem['fppc_details']['nama_latin']; ?>">
                                                </div>
                                                <div>
                                                    <label for="input-label1" class="ti-form-label">
                                                        Jml Sampel
                                                    </label>
                                                    <input type="text" id="input-label1" class="ti-form-input"
                                                        placeholder="blogtitle" disabled
                                                        value="<?= $fppcItem['fppc_details']['jumlah_sampel']; ?>">
                                                </div>
                                                <div>
                                                    <label class="ti-form-select-label">Wadah</label>
                                                    <select class="ti-form-select blog-tag2"
                                                        value="<?= $fppcItem['fppc_details']['id_wadah']; ?>" disabled>
                                                        <?php foreach ($wadahs as $wadah): ?>
                                                            <option value="<?= $wadah['id']; ?>">
                                                                <?= $wadah['nama_wadah']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="ti-form-select-label">Bentuk</label>
                                                    <select class="ti-form-select blog-tag2"
                                                        value="<?= $fppcItem['fppc_details']['id_bentuk']; ?>" disabled>
                                                        <?php foreach ($bentuks as $bentuk): ?>
                                                            <option value="<?= $bentuk['id']; ?>">
                                                                <?= $bentuk['nama_bentuk']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="ti-form-select-label">Target uji</label>
                                                <select class="ti-form-select blog-tag2" multiple
                                                    name="choices-multiple-default" id="choices-multiple-default" disabled>
                                                    <?php foreach ($fppcItem['permohonan_uji'] as $parameter): ?>
                                                        <option value="<?= $parameter['id']; ?>" selected>
                                                            <?= $parameter['keterangan_uji']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="box-footer text-end border-t-0 px-0 flex items-center justify-end">
                                    <button type="button" class="sm:m-0 ti-btn ti-btn-disabled ti-btn-primary" disabled
                                        style="display: none;">
                                        <span
                                            class="animate-spin inline-block w-4 h-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                                            role="status" aria-label="loading"></span>
                                        Loading
                                    </button>
                                    
                                        <button type="button" class="ti-btn btn ti-btn-danger cursor-pointer cancel-button"
                    data-hs-overlay="#hs-focus-management-modal">
                    <i class="ti ti-circle-x"></i>
                    Tolak
                </button>
                <div id="hs-focus-management-modal" class="hs-overlay hidden ti-modal">
                    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                        <div class="ti-modal-content">
                            <div class="ti-modal-header">
                                <h3 class="ti-modal-title">
                                    Alasan Ditolak
                                </h3>
                                <button type="button" class="hs-dropdown-toggle ti-modal-close-btn"
                                    data-hs-overlay="#hs-focus-management-modal">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                            fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                            <form id="create-penolakan" action="<?= base_url('fppc/reject/' .$fppc['id']); ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="ti-modal-body space-y-4">
                                    <input type="text" id="alasan" class="ti-form-input" placeholder="Alasan" autofocus
                                        name="alasan">
                                </div>

                                <div class="ti-modal-footer">


                                    <button class="ti-btn btn ti-btn-danger cursor-pointer cancel-button"
                                        data-hs-overlay="#hs-focus-management-modal" type='button'>
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
                                    <a href="<?= base_url('fppc/verify-status/' . $fppc['id']) . '/1'; ?>"
                                        class="ti-btn btn ti-btn-primary cursor-pointer approve-button"><i
                                            class="ti ti-circle-check"></i>
                                        Verifikasi</a>
                                </div>
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

<!-- Quill Editor  JS -->
<script src="<?php echo base_url('assets/libs/quill/quill.min.js'); ?>"></script>

<!-- Filepond File Upload JS -->
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js'); ?>"></script>
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js'); ?>"></script>
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js'); ?>"></script>
<script
    src="<?php echo base_url('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/filepond/filepond.min.js'); ?>"></script>

<!-- Flatpickr JS -->
<script src="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.js'); ?>"></script>

<!-- Swiper JS -->
<script src="<?php echo base_url('assets/libs/swiper/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/blog.js'); ?>"></script>

<!--Blog Edit Js-->
<script src="<?php echo base_url('assets/libs/awesome-notifications/index.var.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/fppc-verifikasi.js'); ?>"></script>



<?= $this->endSection('scripts'); ?>
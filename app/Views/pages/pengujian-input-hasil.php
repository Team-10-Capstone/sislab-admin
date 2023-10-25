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

        <!-- Page Header -->
        <div class="block justify-between page-header sm:flex">
            <div>
                <h3
                    class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Input Hasil Uji</h3>
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
                    Input Hasil Uji
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
                                <div class="box">
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
                                <div class="box">
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
                                <div class="box">
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
                                                            id="blog-time" placeholder="Choose date"
                                                            value="<?= $disposisis[0]['waktu_pengujian']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="col-span-12 xl:col-span-8" id="form-disposisi-penyelia" method="POST"
                                action="<?= base_url('disposisi-penyelia/store') ?>">
                                <?php foreach ($fppc_details as $key => $fppcItem): ?>
                                    <div class="box">
                                        <input type="hidden" name="disposisi[<?= $key + 1; ?>][id_fppc]"
                                            value="<?= $fppcItem['fppc_details']['id_fppc']; ?>">
                                        <input type="hidden" name="disposisi[<?= $key + 1; ?>][id_dtl_fppc]"
                                            value="<?= $fppcItem['fppc_details']['id']; ?>">
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
                                    <a href="/disposisi-penyelia" class="text-white">
                                        <button class="ti-btn btn ti-btn-danger cursor-pointer cancel-button">
                                            <i class="ti ti-circle-x"></i>
                                            Batal
                                        </button>
                                    </a>
                                    <button data-fppc-id="<?= $fppc['id']; ?>" type="submit"
                                        class="ti-btn btn ti-btn-primary cursor-pointer approve-button"><i
                                            class="ti ti-circle-check"></i>
                                        Simpan</button>
                                </div>
                            </form>
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
<script src="<?php echo base_url('assets/js/input-uji.js'); ?>"></script>

<!-- Flatpickr JS -->
<script src="<?php echo base_url('assets/libs/flatpickr/flatpickr.min.js'); ?>"></script>




<?= $this->endSection('scripts'); ?>
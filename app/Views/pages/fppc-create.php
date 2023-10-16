<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>

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
                    Buat Permohonan Pengujian FPPC</h3>
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
                    Buat FPPC
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
                                        <h5 class="box-title">Detail PPK</h5>
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
                                                            <?= $ppk['nm_trader']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Alamat Trader
                                                        </td>
                                                        <td>
                                                            <?= $ppk['al_trader']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Penerima
                                                        </td>
                                                        <td>
                                                            <?= $ppk['nm_penerima']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">
                                                            Alamat Penerima
                                                        </td>
                                                        <td>
                                                            <?= $ppk['al_penerima']; ?>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">Tipe Permohonan</td>
                                                        <td>
                                                            <span
                                                                class="truncate whitespace-nowrap inline-block py-1 px-3 rounded-full text-xs font-medium bg-success/10 text-success/80">
                                                                <?php
                                                                $kd_kegiatan = $ppk['kd_kegiatan'];
                                                                $kd_mks = $ppk['kd_mks_kirim'];

                                                                if ($kd_kegiatan == 'E') {
                                                                    echo 'Eksport';
                                                                } elseif ($kd_kegiatan == 'I') {
                                                                    echo 'Import';
                                                                } elseif ($kd_kegiatan == 'K') {
                                                                    echo 'Domestik keluar';
                                                                } elseif ($kd_kegiatan == 'M') {
                                                                    echo 'Domestik masuk';
                                                                } elseif ($kd_kegiatan == 'N' && $kd_mks == 16) {
                                                                    echo 'Mandiri';
                                                                } elseif ($kd_kegiatan == 'N' && $kd_mks == 21) {
                                                                    echo 'Surveilance';
                                                                } else {
                                                                    echo 'Lainnya';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    <tr class="divide-x divide-gray-200 dark:divide-white/10">
                                                        <td class="font-medium">Nilai Komoditas</td>
                                                        <td>$
                                                            <?php echo $ppk['nilai_komoditas_usd']; ?>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-8">
                                <div class="box">
                                    <div class="box-body space-y-5">
                                        <div>
                                            <label for="input-label1" class="ti-form-label">Blog Title</label>
                                            <input type="text" id="input-label1" class="ti-form-input"
                                                placeholder="blogtitle" value="Myths about Investment">
                                        </div>
                                        <div>
                                            <label class="ti-form-select-label">Categories</label>
                                            <select class="ti-form-select blog-tag2" multiple>
                                                <option value="Choice 1">Health</option>
                                                <option value="Choice 2">Lifestyle</option>
                                                <option value="Choice 3" selected>Business</option>
                                                <option value="Choice 4">Tourism</option>
                                                <option value="Choice 5">Nature</option>
                                                <option value="Choice 6">Development</option>
                                                <option value="Choice 7">Housing</option>
                                                <option value="Choice 8">Realestate</option>
                                                <option value="Choice 9">Architecture</option>
                                                <option value="Choice 9">Flowers</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="input-label" class="ti-form-label">Content</label>
                                            <div class="ql-wrapper ql-wrapper-modal ht-250">
                                                <div class="flex-1" id="blog-edit">
                                                    <h1 class="text-xl">Blog Heading</h1>
                                                    <br>
                                                    <p class="text-gray-500 dark:text-white/70 text-sm">I must explain
                                                        to you how all this mistaken idea
                                                        of denouncing pleasure and praising pain was born and I will
                                                        give you a complete account of the
                                                        system, and expound the actual teachings of the great explorer
                                                        of the truth, the master-builder of
                                                        human happiness. No one rejects, dislikes, or avoids pleasure
                                                        itself, because it is pleasure.</p>
                                                    <br>
                                                    <p class="text-gray-500 dark:text-white/70 text-sm">but because
                                                        those who do not know how to pursue
                                                        pleasure rationally encounter consequences that are extremely
                                                        painful. Nor again is there anyone
                                                        who loves or pursues or desires to obtain pain of itself,
                                                        because it is pain, but because
                                                        occasionally circumstances occur in which toil and pain can
                                                        procure him some great pleasure. To
                                                        take a trivial example.</p>
                                                    <br>
                                                    <p class="text-gray-500 dark:text-white/70 text-sm">Those who do not
                                                        know how to pursue
                                                        pleasure rationally encounter consequences that are extremely
                                                        painful. Nor again is there anyone
                                                        who loves or pursues or desires to obtain pain of itself,
                                                        because it is pain, but because
                                                        occasionally circumstances occur in which toil and pain can
                                                        procure him some great pleasure. To
                                                        take a trivial example.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="input-label" class="ti-form-label">Upload</label>
                                            <input type="file" class="filepond multiple-filepond" name="filepond"
                                                multiple data-allow-reorder="true" data-max-file-size="3MB"
                                                data-max-files="5">
                                        </div>
                                        <div class="sm:grid grid-cols-12 sm:gap-6 space-y-5 sm:space-y-0">
                                            <div class="col-span-12 lg:col-span-6">
                                                <label for="input-label2" class="ti-form-label">Blog Author</label>
                                                <input type="text" id="input-label2" class="ti-form-input"
                                                    placeholder="Enter Name">
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <label for="input-label3" class="ti-form-label">Author Email</label>
                                                <input type="email" id="input-label3" class="ti-form-input"
                                                    placeholder="Enter Email">
                                            </div>
                                            <div class="col-span-12">
                                                <label class="ti-form-select-label">Tags</label>
                                                <select class="ti-form-select blog-tag" multiple>
                                                    <option value="Choice 1">Health</option>
                                                    <option value="Choice 2">Lifestyle</option>
                                                    <option value="Choice 3" selected>Business</option>
                                                    <option value="Choice 4">Tourism</option>
                                                    <option value="Choice 5">Nature</option>
                                                    <option value="Choice 6">Development</option>
                                                    <option value="Choice 7">Housing</option>
                                                    <option value="Choice 8">Realestate</option>
                                                    <option value="Choice 9">Architecture</option>
                                                    <option value="Choice 9">Flowers</option>
                                                </select>
                                            </div>
                                            <div class="col-span-12 lg:col-span-4">
                                                <label for="input-label" class="ti-form-label">Blog Published
                                                    Date</label>
                                                <div class="flex rounded-sm shadow-sm">
                                                    <div
                                                        class="px-4 inline-flex items-center min-w-fit ltr:rounded-l-sm rtl:rounded-r-sm border ltr:border-r-0 rtl:border-l-0 border-gray-200 bg-gray-50 dark:bg-black/20 dark:border-white/10">
                                                        <span class="text-sm text-gray-500 dark:text-white/70"><i
                                                                class="ri ri-calendar-line"></i></span>
                                                    </div>
                                                    <input type="text"
                                                        class="ti-form-input ltr:rounded-l-none rtl:rounded-r-none focus:z-10 flatpickr-input"
                                                        id="blog-date" placeholder="Choose date" readonly>
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-4">
                                                <label for="input-label" class="ti-form-label">Blog Published
                                                    Time</label>
                                                <div class="flex rounded-sm shadow-sm">
                                                    <div
                                                        class="px-4 inline-flex items-center min-w-fit ltr:rounded-l-sm rtl:rounded-r-sm border ltr:border-r-0 rtl:border-l-0 border-gray-200 bg-gray-50 dark:bg-black/20 dark:border-white/10">
                                                        <span class="text-sm text-gray-500 dark:text-white/70"><i
                                                                class="ri ri-time-line"></i></span>
                                                    </div>
                                                    <input type="text"
                                                        class="ti-form-input ltr:rounded-l-none rtl:rounded-r-none focus:z-10 flatpickr-input"
                                                        id="blog-time" placeholder="Choose date" readonly>
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-4">
                                                <label class="ti-form-select-label">Publish Status</label>
                                                <select class="ti-form-select blog-tag3" data-trigger>
                                                    <option value="Choice 1">On-Hold</option>
                                                    <option value="Choice 2">Published</option>
                                                    <option value="Choice 3" selected>UnPublished</option>
                                                    <option value="Choice 4">Discarded</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-end border-t-0 px-0">
                        <a class="ti-btn ti-btn-primary"><i class="ri-add-line"></i>Add Product</a>
                        <a class="ti-btn ti-btn-secondary"><i class="ri-file-download-line"></i>Save Product</a>
                        <a class="ti-btn ti-btn-danger"><i class="ri-delete-bin-line"></i>Discard Product</a>
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
<script src="<?php echo base_url('assets/js/blog-edit.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
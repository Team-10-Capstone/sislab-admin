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
                                <div class="box sticky top-24 left-0">
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
                            <form action="<?= base_url('fppcController/store/' . $ppk['id_ppk']); ?>"
                                class="col-span-12 xl:col-span-8" method="post">
                                <?php foreach ($ppkItems as $key => $ppkItem): ?>
                                    <div class="box">
                                        <!-- loop ppkItems -->
                                        <div class="box-body space-y-5">
                                            <input type="hidden" name="ppk[<?= $key + 1; ?>][id_kd_ikan]"
                                                value="<?= $ppkItem['id_kd_ikan']; ?>">
                                            <div>
                                                <label for="input-label1" class="ti-form-label">
                                                    Nama Komoditas
                                                </label>
                                                <input type="text" id="input-label1" class="ti-form-input"
                                                    placeholder="blogtitle" disabled value="<?= $ppkItem['nm_lokal']; ?>">
                                            </div>
                                            <div class="md:grid grid-cols-2 gap-6">
                                                <div>
                                                    <label for="input-label1" class="ti-form-label">
                                                        Nama Kel.Ikan
                                                    </label>
                                                    <input type="text" id="input-label1" class="ti-form-input"
                                                        placeholder="blogtitle" disabled
                                                        value="<?= $ppkItem['nm_kel_ikan']; ?>">
                                                </div>
                                                <div>
                                                    <label for="input-label1" class="ti-form-label">
                                                        Jml Sampel
                                                    </label>
                                                    <input type="text" id="input-label1" class="ti-form-input"
                                                        placeholder="blogtitle" disabled value="<?= $ppkItem['jumlah']; ?>">
                                                </div>

                                            </div>
                                            <div>
                                                <label class="ti-form-select-label">Target uji</label>
                                                <select class="ti-form-select blog-tag2" multiple
                                                    name="ppk[<?= $key + 1; ?>][target_uji][]">
                                                    <?php foreach ($parameters as $parameter): ?>
                                                        <option value="<?= $parameter['id']; ?>">
                                                            <?= $parameter['keterangan_uji']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="box-footer text-end border-t-0 px-0 flex items-center justify-end">
                                    <a class="ti-btn btn ti-btn-danger cursor-pointer">
                                        <i class="ti ti-arrow-back"></i>
                                        Kembali</a>
                                    <button type="submit" class="ti-btn btn ti-btn-secondary cursor-pointer"><i
                                            class="ri-file-download-line"></i>
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
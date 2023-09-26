<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>


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
                    Tambah Admin</h3>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-3 -->
        <form action="<?php echo base_url(); ?>UserController/store" method="post">
            <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-12">
                    <div class="box">
                        <div class="box-body">
                            <form>
                                <div class="grid lg:grid-cols-2 gap-6 space-y-4 lg:space-y-0 mb-4">
                                    <div class="space-y-2">
                                        <label class="ti-form-label mb-0">Nama</label>
                                        <input type="text" class="my-auto ti-form-input" placeholder="Firstname"
                                            name="name">
                                    </div>
                                    <div class=" space-y-2">
                                        <label class="ti-form-label mb-0">Role</label>
                                        <select class="ti-form-select" id="select-beast" autocomplete="off"
                                            name="roleId">
                                            <option value="1">Petugas LAB</option>
                                            <option value="2">Penyelia</option>
                                            <option value="3">Analis</option>
                                            <option value="4">Manajer Teknis</option>
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="ti-form-label mb-0">No Handphone</label>
                                        <input type="number" class="my-auto ti-form-input" placeholder="+91 123-456-789"
                                            name="mobile">
                                    </div>
                                    <div class=" space-y-2">
                                        <label class="ti-form-label mb-0">Email Address</label>
                                        <input type="email" class="my-auto ti-form-input" placeholder="your@site.com"
                                            name="email">
                                    </div>
                                    <div class=" space-y-2">
                                        <label class="ti-form-label mb-0">Password</label>
                                        <input type="password" class="ti-form-input" placeholder="password"
                                            name="password">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="ti-form-label mb-0">Confirm Password</label>
                                        <input type="password" class="ti-form-input" placeholder="password"
                                            name="confirm-password">
                                    </div>
                                </div>
                                <button type="submit" class="ti-btn ti-btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End::row-3 -->

    </div>
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<?= $this->endSection('scripts'); ?>
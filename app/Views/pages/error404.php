<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" class="mx-auto">
    <canvas class="error-basic-background"></canvas>
    <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="block font-bold text-primary text-9xl dark:text-primary">404</h1>
        <p class="mt-3 text-2xl font-bold text-gray-800 dark:text-white">Oops, something went wrong.</p>
        <p class="text-gray-600 dark:text-white/70">Sorry, we couldn't find your page.</p>
        <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
            <a class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3 text-center bg-primary hover:bg-primary border border-transparent text-white text-sm font-medium rounded-sm focus:outline-none focus:ring-0 focus:ring-primary focus:ring-offset-0 focus:ring-offset-white transition py-2 px-3 dark:focus:ring-offset-white/10"
                href="<?php echo base_url(); ?>">
                <i class="ri-arrow-left-line"></i>
                Get Back to Home
            </a>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<!-- Particles JS -->
<script src="<?php echo base_url('assets/libs/particlesjs/particles.min.js'); ?>"></script>

<!-- Internal 401-Error JS -->
<script src="<?php echo base_url('assets/js/401-error.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
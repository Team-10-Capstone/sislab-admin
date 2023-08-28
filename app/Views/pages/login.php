<?= $this->extend('layouts/custom-main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" class="w-full max-w-md mx-auto p-6">

    <?php if (session()->getFlashdata('regist-success')): ?>
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
                            <?= session()->getFlashdata('regist-success') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-warning">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>


    <div class="mt-7 bg-white rounded-sm shadow-sm dark:bg-bgdark">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                <p class="mt-3 text-sm text-gray-600 dark:text-white/70">
                    Don't have an account yet?
                    <a class="text-primary decoration-2 hover:underline font-medium"
                        href="<?php echo base_url('register'); ?>">
                        Sign up here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <!-- Form -->
                <form action="<?php echo base_url(); ?>/LoginController/loginAuth" method="post">
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                    required>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                <a class="text-sm text-primary decoration-2 hover:underline font-medium"
                                    href="<?php echo base_url('forgot'); ?>">Forgot password?</a>
                            </div>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                    required>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <div class="flex items-center">
                            <div class="flex">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-primary pointer-events-none focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:checked:bg-primary dark:checked:border-primary dark:focus:ring-offset-white/10">
                            </div>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border border-transparent font-semibold bg-primary text-white hover:bg-primary focus:outline-none focus:ring-0 focus:ring-primary focus:ring-offset-0 transition-all text-sm dark:focus:ring-offset-white/10">Sign
                            in</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<?= $this->endSection('scripts'); ?>
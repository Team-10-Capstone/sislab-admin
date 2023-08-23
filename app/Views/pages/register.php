
<?= $this->extend('layouts/custom-main'); ?>

    <?= $this->section('styles'); ?>


    
    <?= $this->endSection('styles'); ?>

    <?= $this->section('content'); ?>

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content"  class="w-full max-w-md mx-auto p-6">
            <div class="mt-7 bg-white rounded-sm shadow-sm dark:bg-bgdark">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
                        <p class="mt-3 text-sm text-gray-600 dark:text-white/70">
                            Already have an account?
                            <a class="text-primary decoration-2 hover:underline font-medium"
                                href="<?php echo base_url('login'); ?>">
                                Sign in here
                            </a>
                        </p>
                    </div>

                    <div class="mt-5">
                    <?php if(isset($validation)):?>
                    <div class="bg-red-50 border border-red-200 alert mb-4" role="alert">
                          <div class="flex">
                            <div class="flex-shrink-0">
                              <svg class="h-4 w-4 text-red-400 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                              </svg>
                            </div>
                            <div class="ltr:ml-2 rtl:mr-2">
                              <h3 class="text-sm text-red-800 font-semibold">
                                A problem has been occurred while submitting your data.
                              </h3>
                              <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc space-y-1 ltr:pl-5 rtl:pr-5">
                                  
                                    <?php foreach ($validation->getErrors() as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach ?>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endif;?>
                        <!-- Form -->
                        <form action="<?php echo base_url(); ?>RegisterController/store" method="post">
                            <div class="grid gap-y-4">

                                <!-- Form Group -->
                                <div>
                                    <label class="block text-sm mb-2 dark:text-white">Full Name</label>
                                    <div class="relative">
                                        <input type="text" name="name"
                                            value="<?= set_value('name') ?>"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                            required>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div>
                                    <label class="block text-sm mb-2 dark:text-white">Email address</label>
                                    <div class="relative">
                                        <input type="email" name="email"
                                            value="<?= set_value('email') ?>"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                            required>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div>
                                    <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                            required>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div>
                                    <label for="confirm-password" class="block text-sm mb-2 dark:text-white">Confirm
                                        Password</label>
                                    <div class="relative">
                                        <input type="password" id="confirm-password" name="confirm-password"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                            required>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Checkbox -->
                                <div class="flex items-center">
                                    <label class="flex w-full bg-white border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70">
                                        <input type="checkbox" class="ti-form-checkbox mt-0.5 pointer-events-none" id="hs-checkbox-checked-in-form" id="terms" name="terms" required>
                                        <span class="text-sm text-gray-500 ltr:ml-2 rtl:mr-2 dark:text-white/70">
                                            I accept the <a class="text-primary decoration-2 hover:underline font-medium"
                                                href="#">Terms and Conditions</a>
                                        </span>
                                      </label>
                                </div>
                                <!-- End Checkbox -->

                                <button type="submit"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border border-transparent font-semibold bg-primary text-white hover:bg-primary focus:outline-none focus:ring-0 focus:ring-primary focus:ring-offset-0 transition-all text-sm dark:focus:ring-offset-white/10">Sign
                                    up</button>
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
  

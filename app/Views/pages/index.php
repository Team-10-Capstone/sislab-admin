
<?= $this->extend('layouts/main'); ?>

    <?= $this->section('styles'); ?>

        <!-- Vector Map Css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/libs/jsvectormap/css/jsvectormap.min.css'); ?>">

    <?= $this->endSection('styles'); ?>

    <?= $this->section('content'); ?>

            <div class="content">

              <!-- Start::main-content -->
              <div class="main-content">

                <!-- Page Header -->
                <div class="block justify-between page-header sm:flex">
                    <div>
                        <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium"> Dashboard</h3>
                    </div>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-sm">
                          <a class="flex items-center font-semibold text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                            Home
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 dark:text-gray-300 rtl:rotate-180"></i>
                          </a>
                        </li>
                        <li class="text-sm text-gray-500 hover:text-primary dark:text-white/70 " aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
                <!-- Page Header Close -->

                <div class="row row-sm mt-lg-4">
                  <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="card bg-primary custom-card card-box">
                      <div class="card-body p-4">
                        <span class="text-white">NOTE:</span>      
                        <p class="text-white mt-2 mb-0">Thank you for choosing our template.. if you want to create your own customised project take a refrence of our project and you can implement here.</p>              
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- Start::main-content -->

            </div>

    <?= $this->endSection('content'); ?>

    <?= $this->section('scripts'); ?>


    
    <?= $this->endSection('scripts'); ?>
  
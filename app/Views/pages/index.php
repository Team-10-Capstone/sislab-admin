
<?= $this->extend('layouts/main'); ?>

    <?= $this->section('styles'); ?>


    
    <?= $this->endSection('styles'); ?>

    <?= $this->section('content'); ?>

    <div class="content">

            <!-- Start::main-content -->
            <div class="main-content">

                <!-- Page Header -->
                <div class="block justify-between page-header sm:flex">
                    <div>
                        <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium"> Job Dashboard</h3>
                    </div>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-sm">
                        <a class="flex items-center font-semibold text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">
                            Home
                            <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 dark:text-gray-300 rtl:rotate-180"></i>
                        </a>
                        </li>
                        <li class="text-sm text-gray-500 hover:text-primary dark:text-white/70 " aria-current="page">
                            Job Dashboard
                        </li>
                    </ol>
                </div>
                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="grid grid-cols-12 gap-x-6">
                    <div class="col-span-12 xxxl:col-span-9">
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                            <span class="">
                                                <i
                                                    class="ri-group-line text-xl avatar w-10 h-10 rounded-full p-2.5 bg-primary/10 text-primary leading-none"></i>
                                            </span>
                                            <div class="w-full">
                                                <div class="flex mb-2 items-start justify-between">
                                                    <h5 class="text-xl font-semibold mb-0 leading-none">256</h5>
                                                    <div class="text-danger text-sm font-semibold"><i
                                                            class="ri-arrow-down-s-fill ltr:mr-1 rtl:ml-1 align-middle"></i>-1.05%
                                                    </div>
                                                </div>
                                                <p
                                                    class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                                    Total Applicants</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                            <span class="">
                                                <i
                                                    class="ri-user-line text-xl avatar w-10 h-10 rounded-full p-2.5 bg-secondary/10 text-secondary leading-none"></i>
                                            </span>
                                            <div class="w-full">
                                                <div class="flex mb-2 items-start justify-between">
                                                    <h5 class="text-xl font-semibold mb-0 leading-none">4,026</h5>
                                                    <div class="text-success text-sm font-semibold"><i
                                                            class="ri-arrow-up-s-fill ltr:mr-1 rtl:ml-1 align-middle"></i>+0.40%
                                                    </div>
                                                </div>
                                                <p
                                                    class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                                    Total Shortlisted</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                            <span class="">
                                                <i
                                                    class="ri-user-follow-line text-xl avatar w-10 h-10 rounded-full p-2.5 bg-warning/10 text-warning leading-none"></i>
                                            </span>
                                            <div class="w-full">
                                                <div class="flex mb-2 items-start justify-between">
                                                    <h5 class="text-xl font-semibold mb-0 leading-none">148</h5>
                                                    <div class="text-success text-sm font-semibold"><i
                                                            class="ri-arrow-up-s-fill ltr:mr-1 rtl:ml-1 align-middle"></i>+0.82%
                                                    </div>
                                                </div>
                                                <p
                                                    class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                                    Hired Candidates</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                            <span class="">
                                                <i
                                                    class="ri-user-unfollow-line text-xl avatar w-10 h-10 rounded-full p-2.5 bg-success/10 text-success leading-none"></i>
                                            </span>
                                            <div class="w-full">
                                                <div class="flex mb-2 items-start justify-between">
                                                    <h5 class="text-xl font-semibold mb-0 leading-none">1,116</h5>
                                                    <div class="text-success text-sm font-semibold"><i
                                                            class="ri-arrow-up-s-fill ltr:mr-1 rtl:ml-1 align-middle"></i>+0.21%
                                                    </div>
                                                </div>
                                                <p
                                                    class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                                    Rejected Applicants</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-9">
                                <div class="box overflow-hidden">
                                    <div class="box-header">
                                        <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                                            <h5 class="box-title my-auto">Applications Overview</h5>
                                            <div class="hs-dropdown ti-dropdown block ltr:ml-auto rtl:mr-auto my-auto">
                                                <button type="button" class="hs-dropdown-toggle ti-dropdown-toggle rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                                  This Week <i class="ti ti-chevron-down"></i></button>
                                                <div class="hs-dropdown-menu ti-dropdown-menu hidden">
                                                  <a class="ti-dropdown-item" href="javascript:void(0)">This Week</a>
                                                  <a class="ti-dropdown-item" href="javascript:void(0)">This Month</a>
                                                  <a class="ti-dropdown-item" href="javascript:void(0)">This Year</a>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="box-body p-0">
                                        <div
                                            class="grid grid-cols-12 gap-6 border-b border-dashed border-gray-200 dark:border-white/10 px-6">
                                            <div class="col-span-12 sm:col-span-4">
                                                <div class="py-4 sm:text-start text-center">
                                                    <p class="text-xl font-semibold mb-0">1,117</p>
                                                    <p class="mb-0 text-sm text-gray-500 dark:text-white/70">Total
                                                        Candidates
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <div class="p-3 sm:text-start text-center">
                                                    <p class="text-xl font-semibold mb-0"><span
                                                            class="basic-subscription">742</span></p>
                                                    <p class="mb-0 text-sm text-gray-500 dark:text-white/70">
                                                        Applications
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <div class="p-3 text-sm-start text-center">
                                                    <p class="text-xl font-semibold mb-0"><span
                                                            class="pro-subscription">259</span></p>
                                                    <p class="mb-0 text-sm text-gray-500 dark:text-white/70">Shortlisted
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="subscriptionOverview" class="px-4 sm:mt-0 mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-3">
                                <div class="box">
                                    <div class="box-header">
                                        <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                                            <h5 class="box-title my-auto">New Applicants</h5>
                                            <button type="button" class="ti-btn m-0 rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                                View All</button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <ul>
                                            <li class="p-0 mb-6 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                                <a href="javascript:void(0);" class="w-full">
                                                    <div class="flex items-center">
                                                        <img class="avatar avatar-sm rounded-full"
                                                            src="<?php echo base_url('assets/img/users/9.jpg'); ?>" alt="image">
                                                        <div class="flex-auto ltr:ml-2 rtl:mr-2">
                                                            <p
                                                                class="text-sm font-semibold mb-0 text-gray-800 dark:text-white">
                                                                Charlie Davieson</p>
                                                            <p class="text-xs mb-0 !font-normal"><span
                                                                    class="text-gray-400 dark:text-white/80 ">Applied For
                                                                </span> <span class="font-medium">Java Developer</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="p-0 mb-6 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                                <a href="javascript:void(0);" class="w-full">
                                                    <div class="flex items-center">
                                                        <img class="avatar avatar-sm rounded-full"
                                                            src="<?php echo base_url('assets/img/users/2.jpg'); ?>" alt="image">
                                                        <div class="flex-auto ltr:ml-2 rtl:mr-2">
                                                            <p
                                                                class="text-sm font-semibold mb-0 text-gray-800 dark:text-white">
                                                                Nasiha</p>
                                                            <p class="text-xs mb-0 !font-normal"><span
                                                                    class="text-gray-400 dark:text-white/80 ">Applied For
                                                                </span> <span class="font-medium">Data Analyst</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="p-0 mb-6 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                                <a href="javascript:void(0);" class="w-full">
                                                    <div class="flex items-center">
                                                        <img class="avatar avatar-sm rounded-full"
                                                            src="<?php echo base_url('assets/img/users/4.jpg'); ?>" alt="image">
                                                        <div class="flex-auto ltr:ml-2 rtl:mr-2">
                                                            <p class="text-sm font-semibold mb-0 text-gray-800 dark:text-white">Hasi Nah</p>
                                                            <p class="text-xs mb-0 !font-normal"><span
                                                                    class="text-gray-400 dark:text-white/80 ">Applied For
                                                                </span> <span class="font-medium">Executive Officer</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="p-0 mb-6 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                                <a href="javascript:void(0);" class="w-full">
                                                    <div class="flex items-center">
                                                        <img class="avatar avatar-sm rounded-full"
                                                            src="<?php echo base_url('assets/img/users/14.jpg'); ?>" alt="image">
                                                        <div class="flex-auto ltr:ml-2 rtl:mr-2">
                                                            <p class="text-sm font-semibold mb-0 text-gray-800 dark:text-white">David</p>
                                                            <p class="text-xs mb-0 !font-normal"><span
                                                                    class="text-gray-400 dark:text-white/80 ">Applied For
                                                                </span> <span class="font-medium">Developer</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="p-0 mb-0 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                                <a href="javascript:void(0);" class="w-full">
                                                    <div class="flex items-center">
                                                        <img class="avatar avatar-sm rounded-full"
                                                            src="<?php echo base_url('assets/img/users/16.jpg'); ?>" alt="image">
                                                        <div class="flex-auto ltr:ml-2 rtl:mr-2">
                                                            <p class="text-sm font-semibold mb-0 text-gray-800 dark:text-white">Jack Bruce</p>
                                                            <p class="text-xs mb-0 !font-normal"><span
                                                                    class="text-gray-400 dark:text-white/80 ">Applied For
                                                                </span> <span class="font-medium">Data Scientist</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xxxl:col-span-3">
                        <div class="box">
                            <div class="box-header">
                                <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                                    <h5 class="box-title my-auto">Acceptance Ratio</h5>
                                    <div class="hs-dropdown ti-dropdown block ltr:ml-auto rtl:mr-auto my-auto">
                                        <button type="button" class="hs-dropdown-toggle ti-dropdown-toggle rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                          This Week <i class="ti ti-chevron-down"></i></button>
                                        <div class="hs-dropdown-menu ti-dropdown-menu hidden">
                                          <a class="ti-dropdown-item" href="javascript:void(0)">This Week</a>
                                          <a class="ti-dropdown-item" href="javascript:void(0)">This Month</a>
                                          <a class="ti-dropdown-item" href="javascript:void(0)">This Year</a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="box-body p-0">
                                <div id="candidates-chart"
                                    class="p-4  border-b border-dashed border-gray-200 dark:border-white/10"></div>
                                <div class="grid grid-cols-2">
                                    <div class="p-5 ltr:border-r rtl:border-l border-gray-200 dark:border-white/10">
                                        <div class="flex items-center">
                                            <div class="ltr:mr-2 rtl:ml-2">
                                                <span
                                                    class="avatar avatar-sm rounded-full bg-primary/20 text-primary p-2.5"><i
                                                        class="ri-checkbox-circle-line text-xl leading-none"></i></span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-0 font-semibold text-gray-800 dark:text-white">Accepted</p>
                                                <span class="text-gray-500 dark:text-white/70 text-xs">565</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="ltr:mr-2 rtl:ml-2">
                                                <span
                                                    class="avatar avatar-sm rounded-full bg-secondary/20 text-secondary p-2.5"><i
                                                        class="ri-close-circle-line text-xl leading-none"></i></span>
                                            </div>
                                            <div class="flex-1">
                                                <p class="mb-0 font-semibold text-gray-800 dark:text-white">Rejected</p>
                                                <span class="text-gray-500 dark:text-white/70 text-xs">208</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box bg-gradient-to-r from-primary to-secondary">
                            <div class="box-body">
                                <div class="flex ">
                                    <div>
                                        <h2 class="text-xl text-white font-semibold">Upgrade to Pro</h2>
                                        <p class="text-sm text-white/80">For Premium benifits</p>
                                    </div>
                                    <button type="button" class="ti-btn ti-btn-light my-auto ltr:ml-auto rtl:mr-auto">Upgrade</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                                    <h5 class="box-title my-auto">Recent Recruiter Registrations</h5>
                                    <button type="button" class="ti-btn m-0 rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                        View All</button>
                                </div>
                            </div>
                            <div class="box-body p-0">
                                <div class="grid md:grid-cols-3  xxl:grid-cols-5">
                                    <div class="p-4 ltr:md:border-r rtl:md:border-l xxl:border-b-0 border-b border-gray-200 dark:border-white/10">
                                        <div class="flex items-start mb-6">
                                            <img src="<?php echo base_url('assets/img/users/4.jpg'); ?>" alt=""
                                                class="avatar avatar-sm rounded-full ltr:mr-2 rtl:ml-2 leading-none">
                                            <div class="flex-auto">
                                                <div class="recent-recruiter">
                                                    <p class="text-sm font-semibold mb-0 truncate">Hr@Spruko</p>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70 truncate">
                                                        hr.spruko@gmail.com</p>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" aria-label="button"
                                                    class="ti-btn bg-gray-100 text-gray-500 hover:text-gray-600 hover:bg-gray-200 ring-offset-white focus:ring-gray-500 dark:bg-black/20 dark:hover:bg-black/30 dark:focus:ring-gray-600 dark:text-white dark:focus:ring-offset-white/10">
                                                    <i class="ri-arrow-right-s-line rtl:rotate-180"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-2">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Vacancies
                                            </div>
                                            <div class="font-semibold text-sm">
                                                07
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-0">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Position
                                            </div>
                                            <div>
                                                <span
                                                    class="badge bg-info/10 text-info leading-none rounded-sm text-xs py-1">Aws
                                                    Engineer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 ltr:md:border-r rtl:md:border-l xxl:border-b-0 border-b border-gray-200 dark:border-white/10">
                                        <div class="flex items-start mb-6">
                                            <img src="<?php echo base_url('assets/img/users/21.jpg'); ?>" alt=""
                                                class="avatar avatar-sm rounded-full ltr:mr-2 rtl:ml-2 leading-none">
                                            <div class="flex-auto">
                                                <div class="recent-recruiter">
                                                    <p class="text-sm font-semibold mb-0 truncate">Hr@Nicero</p>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70 truncate">
                                                        nicero.help@gmail.com</p>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" aria-label="button"
                                                    class="ti-btn bg-gray-100 text-gray-500 hover:text-gray-600 hover:bg-gray-200 ring-offset-white focus:ring-gray-500 dark:bg-black/20 dark:hover:bg-black/30 dark:focus:ring-gray-600 dark:text-white/70 dark:focus:ring-offset-white/10">
                                                    <i class="ri-arrow-right-s-line rtl:rotate-180"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-2">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Vacancies
                                            </div>
                                            <div class="font-semibold text-sm">
                                                16
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-0">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Position
                                            </div>
                                            <div>
                                                <span
                                                    class="badge bg-warning/10 text-warning leading-none rounded-sm text-xs py-1">React
                                                    Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 ltr:md:border-r rtl:md:border-l xxl:border-b-0 border-b border-gray-200 dark:border-white/10">
                                        <div class="flex items-start mb-6">
                                            <img src="<?php echo base_url('assets/img/users/12.jpg'); ?>" alt=""
                                                class="avatar avatar-sm rounded-full ltr:mr-2 rtl:ml-2 leading-none">
                                            <div class="flex-auto">
                                                <div class="recent-recruiter">
                                                    <p class="text-sm font-semibold mb-0 truncate">Hr@David</p>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70 truncate">
                                                        David.525@gmail.com</p>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" aria-label="button"
                                                    class="ti-btn bg-gray-100 text-gray-500 hover:text-gray-600 hover:bg-gray-200 ring-offset-white focus:ring-gray-500 dark:bg-black/20 dark:hover:bg-black/30 dark:focus:ring-gray-600 dark:text-white/70 dark:focus:ring-offset-white/10">
                                                    <i class="ri-arrow-right-s-line rtl:rotate-180"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-2">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Vacancies
                                            </div>
                                            <div class="font-semibold text-sm">
                                                10
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-0">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Position
                                            </div>
                                            <div>
                                                <span
                                                    class="badge bg-secondary/10 text-secondary leading-none rounded-sm text-xs py-1">Full Stack
                                                    Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 ltr:md:border-r rtl:md:border-l md:border-b-0 border-b border-gray-200 dark:border-white/10">
                                        <div class="flex items-start mb-6">
                                            <img src="<?php echo base_url('assets/img/users/15.jpg'); ?>" alt=""
                                                class="avatar avatar-sm rounded-full ltr:mr-2 rtl:ml-2 leading-none">
                                            <div class="flex-auto">
                                                <div class="recent-recruiter">
                                                    <p class="text-sm font-semibold mb-0 truncate">JosephSmith</p>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70 truncate">
                                                        josephsmith@gmail.com</p>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" aria-label="button"
                                                    class="ti-btn bg-gray-100 text-gray-500 hover:text-gray-600 hover:bg-gray-200 ring-offset-white focus:ring-gray-500 dark:bg-black/20 dark:hover:bg-black/30 dark:focus:ring-gray-600 dark:text-white/70 dark:focus:ring-offset-white/10">
                                                    <i class="ri-arrow-right-s-line rtl:rotate-180"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-2">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Vacancies
                                            </div>
                                            <div class="font-semibold text-sm">
                                                32
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-0">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Position
                                            </div>
                                            <div>
                                                <span
                                                    class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">UI
                                                    Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-start mb-6">
                                            <img src="<?php echo base_url('assets/img/users/3.jpg'); ?>" alt=""
                                                class="avatar avatar-sm rounded-full ltr:mr-2 rtl:ml-2 leading-none">
                                            <div class="flex-auto">
                                                <div class="recent-recruiter">
                                                    <p class="text-sm font-semibold mb-0 truncate">Kristie Nah</p>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70 truncate">
                                                        Kristie Nah@gmail.com</p>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" aria-label="button"
                                                    class="ti-btn bg-gray-100 text-gray-500 hover:text-gray-600 hover:bg-gray-200 ring-offset-white focus:ring-gray-500 dark:bg-black/20 dark:hover:bg-black/30 dark:focus:ring-gray-600 dark:text-white/70 dark:focus:ring-offset-white/10">
                                                    <i class="ri-arrow-right-s-line rtl:rotate-180"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-2">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Vacancies
                                            </div>
                                            <div class="font-semibold text-sm">
                                                12
                                            </div>
                                        </div>
                                        <div class="flex  justify-between mb-0">
                                            <div class="text-gray-500 dark:text-white/70 text-xs">
                                                Position
                                            </div>
                                            <div>
                                                <span
                                                    class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">Angular Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-1 -->

                <!-- Start::row-2 -->
                <div class="grid grid-cols-12 gap-x-6">
                    <div class="col-span-12 xxl:col-span-4">
                        <div class="box overflow-hidden">
                            <div class="box-header">
                                <div class="flex justify-between">
                                    <h5 class="box-title my-auto">Registers By Country</h5>
                                    <div class="hs-dropdown ti-dropdown block ltr:ml-auto rtl:mr-auto my-auto">
                                        <button id="hs-dropdown-custom-icon-trigger5" type="button" aria-label="button"
                                            class="hs-dropdown-toggle ti-dropdown-toggle rounded-sm p-2 bg-white !border border-gray-200 text-gray-500 hover:bg-gray-100  focus:ring-gray-200 dark:bg-black/20 dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                            <i class="text-sm leading-none ti ti-dots-vertical"></i> </button>
                                        <div class="hs-dropdown-menu ti-dropdown-menu"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger5">
                                            <a class="ti-dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="ti-dropdown-item" href="javascript:void(0)">Another Action</a>
                                            <a class="ti-dropdown-item" href="javascript:void(0)">Something else
                                                here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body p-0 activity-table">
                                <div class="overflow-auto">
                                    <table class="text-center ti-custom-table ti-custom-table-head whitespace-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="min-w-[155px]">Country</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Total Registers</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2 leading-none">
                                                            <img src="<?php echo base_url('assets/img/flags/10.png'); ?>" alt=""
                                                                class="avatar avatar-xs rounded-full">
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-semibold">
                                                                U.S.A
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>21,Dec 2022</td>
                                                <td>782</td>
                                                <td>
                                                    <button type="button" aria-label="button"
                                                        class="ti-btn ti-btn-soft-success py-0 px-2 m-0">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2 leading-none">
                                                            <img src="<?php echo base_url('assets/img/flags/3.png'); ?>" alt=""
                                                                class="avatar avatar-xs rounded-full">
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-semibold">
                                                                France
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>29,April 2023</td>
                                                <td>53</td>
                                                <td>
                                                    <button type="button" aria-label="button"
                                                        class="ti-btn ti-btn-soft-success py-0 px-2 m-0">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2 leading-none">
                                                            <img src="<?php echo base_url('assets/img/flags/2.png'); ?>" alt=""
                                                                class="avatar avatar-xs rounded-full">
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-semibold">
                                                                Canada
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>30,Nov 2023</td>
                                                <td>15</td>
                                                <td>
                                                    <button type="button" aria-label="button"
                                                        class="ti-btn ti-btn-soft-success py-0 px-2 m-0">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2 leading-none">
                                                            <img src="<?php echo base_url('assets/img/flags/4.png'); ?>" alt=""
                                                                class="avatar avatar-xs rounded-full">
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-semibold">
                                                                Germany
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>18,Mar 2023</td>
                                                <td>19</td>
                                                <td>
                                                    <button type="button" aria-label="button"
                                                        class="ti-btn ti-btn-soft-success py-0 px-2 m-0">View</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2 leading-none">
                                                            <img src="<?php echo base_url('assets/img/flags/1.png'); ?>" alt=""
                                                                class="avatar avatar-xs rounded-full">
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-semibold">
                                                                Argentina
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>25,Apr 2023</td>
                                                <td>92</td>
                                                <td>
                                                    <button type="button" aria-label="button"
                                                        class="ti-btn ti-btn-soft-success py-0 px-2 m-0">View</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xxl:col-span-5">
                        <div class="box overflow-hidden">
                            <div class="box-header">
                                <div class="flex justify-between">
                                    <h5 class="box-title my-auto">Top Recruiters</h5>
                                    <button type="button" class="ti-btn m-0 rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                        View All</button>
                                </div>
                            </div>
                            <div class="box-body p-0 activity-table2">
                                <div class="overflow-auto">
                                    <table class="ti-custom-table ti-custom-table-head whitespace-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Subscription</th>
                                                <th scope="col">Total Employees</th>
                                                <th scope="col">Recruiter Since</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2">
                                                            <span
                                                                class="avatar avatar-sm">
                                                                <img src="<?php echo base_url('assets/img/logos/4.png'); ?>" alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="text-xs font-semibold mb-0">Obligation Pvt.Ltd</p>
                                                            <p
                                                                class="font-normal text-xs text-gray-500 dark:text-white/70 mb-0">
                                                                Remote/Onsite</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">Basic</span>
                                                </td>
                                                <td class="text-center">547</td>
                                                <td class="text-center">24,Nov 2021</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2">
                                                            <span
                                                                class="avatar avatar-sm">
                                                                <img src="<?php echo base_url('assets/img/logos/10.png'); ?>" alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="text-xs font-semibold mb-0">Voluptatem Pvt.Ltd</p>
                                                            <p
                                                                class="font-normal text-xs text-gray-500 dark:text-white/70 mb-0">
                                                                Remote/Onsite</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge bg-secondary/10 text-secondary leading-none rounded-sm text-xs py-1">Pro</span>
                                                </td>
                                                <td class="text-center">223</td>
                                                <td class="text-center">13,Jan 2020</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2">
                                                            <span
                                                                class="avatar avatar-sm">
                                                                <img src="<?php echo base_url('assets/img/logos/8.png'); ?>" alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="text-xs font-semibold mb-0">BloomTech.Inc</p>
                                                            <p
                                                                class="font-normal text-xs text-gray-500 dark:text-white/70 mb-0">
                                                                Remote/Onsite</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">Basic</span>
                                                </td>
                                                <td class="text-center">189</td>
                                                <td class="text-center">06,Sep 2020</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2">
                                                            <span
                                                                class="avatar avatar-sm">
                                                                <img src="<?php echo base_url('assets/img/logos/1.png'); ?>" alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="text-xs font-semibold mb-0">Beatae Industries</p>
                                                            <p
                                                                class="font-normal text-xs text-gray-500 dark:text-white/70 mb-0">
                                                                Remote/Onsite</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">Basic</span>
                                                </td>
                                                <td class="text-center">106</td>
                                                <td class="text-center">19,Mar 2020</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div class="ltr:mr-2 rtl:ml-2">
                                                            <span
                                                                class="avatar avatar-sm">
                                                                <img src="<?php echo base_url('assets/img/logos/6.png'); ?>" alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <p class="text-xs font-semibold mb-0">Jack Pvt.Ltd</p>
                                                            <p
                                                                class="font-normal text-xs text-gray-500 dark:text-white/70 mb-0">
                                                                Remote/Onsite</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">Basic</span>
                                                </td>
                                                <td class="text-center">106</td>
                                                <td class="text-center">19,Mar 2020</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xxl:col-span-3">
                        <div class="box">
                            <div class="box-header">
                                <div class="flex justify-between">
                                    <h5 class="box-title my-auto">Recent Jobs</h5>
                                    <button type="button" class="ti-btn m-0 rounded-sm p-1 px-3 !border border-gray-200 text-gray-400 hover:text-gray-500 hover:bg-gray-200 hover:border-gray-200 focus:ring-gray-200  dark:hover:bg-black/30 dark:border-white/10 dark:hover:border-white/20 dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                                        View All</button>
                                </div>
                            </div>
                            <div class="box-body">
                                <ul class="">
                                    <li class="p-0 mb-3 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                        <div class="flex items-center w-full">
                                            <a aria-label="anchor" href="javascript:void(0);" class="ltr:pr-3 rtl:pl-3">
                                                <span class="avatar rounded-sm bg-primary/20 text-primary p-3"><i class="ri-smartphone-line text-2xl leading-none"></i></span>
                                            </a>
                                            <div class="flex-1 flex justify-between items-center relative">
                                                <div class="flex-1">
                                                    <a href="javascript:void(0);" class="text-sm font-semibold">Sr. Mobile App Developer</a>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70"><i class="ri-map-pin-line text-xs ltr:mr-1 rtl:ml-1"></i>Georgia, XY</p>
                                                    <a href="javascript:void(0);" class="text-xs">1116 Applicants</a>
                                                </div>
                                                <div class="min-w-fit text-end">
                                                    <span class="text-xs text-gray-500 dark:text-white/70">1 day ago</span>
                                                    <p class="mb-0 text-xs">29 days left
                                                </p></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-0 mb-3 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                        <div class="flex items-center w-full">
                                            <a aria-label="anchor" href="javascript:void(0);" class="ltr:pr-3 rtl:pl-3">
                                                <span class="avatar rounded-sm bg-secondary/20 text-secondary p-3"><i class="ri-briefcase-5-line text-2xl leading-none"></i></span>
                                            </a>
                                            <div class="flex-1 flex justify-between items-center relative">
                                                <div class="flex-1">
                                                    <a href="javascript:void(0);" class="text-sm font-semibold">Data Scientist Trainee</a>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70"><i class="ri-map-pin-line text-xs ltr:mr-1 rtl:ml-1"></i>Siberia, PQ</p>
                                                    <a href="javascript:void(0);" class="text-xs">773 Applicants</a>
                                                </div>
                                                <div class="min-w-fit text-end">
                                                    <span class="text-xs text-gray-500 dark:text-white/70">3 days ago</span>
                                                    <p class="mb-0 text-xs">27 days left
                                                </p></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-0 mb-3 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                        <div class="flex items-center w-full">
                                            <a aria-label="anchor" href="javascript:void(0);" class="ltr:pr-3 rtl:pl-3">
                                                <span class="avatar rounded-sm bg-warning/20 text-warning p-3"><i class="ri-stack-line text-2xl leading-none"></i></span>
                                            </a>
                                            <div class="flex-1 flex justify-between items-center relative">
                                                <div class="flex-1">
                                                    <a href="javascript:void(0);" class="text-sm font-semibold">Sr. Backend Developer</a>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70"><i class="ri-map-pin-line text-xs ltr:mr-1 rtl:ml-1"></i>Italy, RS</p>
                                                    <a href="javascript:void(0);" class="text-xs">16 Applicants</a>
                                                </div>
                                                <div class="min-w-fit text-end">
                                                    <span class="text-xs text-gray-500 dark:text-white/70">1 week ago</span>
                                                    <p class="mb-0 text-xs">22  days left
                                                </p></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-0 mb-3 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                        <div class="flex items-center w-full">
                                            <a aria-label="anchor" href="javascript:void(0);" class="ltr:pr-3 rtl:pl-3">
                                                <span class="avatar rounded-sm bg-success/20 text-success p-3"><i class="ri-bar-chart-2-line text-2xl leading-none"></i></span>
                                            </a>
                                            <div class="flex-1 flex justify-between items-center relative">
                                                <div class="flex-1">
                                                    <a href="javascript:void(0);" class="text-sm font-semibold"> Data Visualization Engineer</a>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70"><i class="ri-map-pin-line text-xs ltr:mr-1 rtl:ml-1"></i>India, IN</p>
                                                    <a href="javascript:void(0);" class="text-xs">11 Applicants</a>
                                                </div>
                                                <div class="min-w-fit text-end">
                                                    <span class="text-xs text-gray-500 dark:text-white/70">
                                                        1 month ago</span>
                                                    <p class="mb-0 text-xs text-danger">1 day left
                                                </p></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-0 mb-0 ti-list-group border-0 text-gray-800 dark:text-white w-full">
                                        <div class="flex items-center w-full">
                                            <a aria-label="anchor" href="javascript:void(0);" class="ltr:pr-3 rtl:pl-3">
                                                <span class="avatar rounded-sm bg-danger/20 text-danger p-3"><i class="ri-bar-chart-2-line text-2xl leading-none"></i></span>
                                            </a>
                                            <div class="flex-1 flex justify-between items-center relative">
                                                <div class="flex-1">
                                                    <a href="javascript:void(0);" class="text-sm font-semibold"> Executive Officer</a>
                                                    <p class="mb-0 text-xs text-gray-500 dark:text-white/70"><i class="ri-map-pin-line text-xs ltr:mr-1 rtl:ml-1"></i>England, EN</p>
                                                    <a href="javascript:void(0);" class="text-xs">15 Applicants</a>
                                                </div>
                                                <div class="min-w-fit text-end">
                                                    <span class="text-xs text-gray-500 dark:text-white/70">
                                                        1 month ago</span>
                                                    <p class="mb-0 text-xs text-danger">closing soon
                                                </p></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-2 -->

                <!-- Start::row-3 -->
                <div class="grid grid-cols-12 gap-x-6">
                    <div class="col-span-12">
                        <div class="box orders-table">
                            <div class="box-header">
                                <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                                    <h5 class="box-title my-auto">Recent Employers</h5>
                                    <div class="hs-dropdown ti-dropdown block ltr:ml-auto rtl:mr-auto my-auto">
                                        <button id="hs-dropdown-custom-icon-trigger" type="button"
                                            class="hs-dropdown-toggle px-2 py-1 ti-btn ti-btn-primary">Sort
                                            By<i class="ri-arrow-down-s-line align-middle"></i></button>
                                        <div class="hs-dropdown-menu ti-dropdown-menu"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <a class="ti-dropdown-item" href="javascript:void(0)">New</a>
                                            <a class="ti-dropdown-item" href="javascript:void(0)">popular</a>
                                            <a class="ti-dropdown-item" href="javascript:void(0)">Relevant</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-bordered rounded-sm overflow-auto">
                                    <table class="ti-custom-table ti-custom-table-head">
                                        <thead class="">
                                            <tr>
                                                <th scope="col">Employer</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Mail</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flex align-items-center font-semibold min-w-[180px]">
                                                        <img src="<?php echo base_url('assets/img/users/4.jpg'); ?>"
                                                            class="avatar avatar-xs ltr:mr-2 rtl:ml-2 rounded-full"
                                                            alt="">
                                                        <span class="my-auto text-sm">Mayor Kelly</span>
                                                    </div>
                                                </td>
                                                <td>Manufacture</td>
                                                <td><span
                                                        class="badge bg-primary/10 text-primary leading-none rounded-sm text-xs py-1">Team
                                                        Lead</span></td>
                                                <td>mayorkelly@gmail.com</td>
                                                <td>
                                                    <div class="inline-flex items-center">
                                                        <i
                                                            class="ri-map-pin-fill text-gray-500 dark:text-white/70 text-xs"></i>
                                                        <span class="ltr:ml-1 rtl:mr-1">Germany</span>
                                                    </div>
                                                </td>
                                                <td>Sep 15 - Oct 12, 2023</td>
                                                <td>Full Time</td>
                                                <td>
                                                    <div
                                                        class="flex items-center flex-row self-stretch gap-2 text-base">
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-success py-1 px-2"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-primary py-1 px-2"><i
                                                                class="ri-edit-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex align-items-center font-semibold min-w-[180px]">
                                                        <img src="<?php echo base_url('assets/img/users/15.jpg'); ?>"
                                                            class="avatar avatar-xs ltr:mr-2 rtl:ml-2 rounded-full"
                                                            alt="">
                                                        <span class="my-auto text-sm">Andrew Garfield </span>
                                                    </div>
                                                </td>
                                                <td>Development</td>
                                                <td><span
                                                        class="badge bg-secondary/10 text-secondary leading-none rounded-sm text-xs py-1">Director</span>
                                                </td>
                                                <td>andrewgarfield@gmail.com</td>
                                                <td>
                                                    <div class="inline-flex items-center">
                                                        <i
                                                            class="ri-map-pin-fill text-gray-500 dark:text-white/70 text-xs"></i>
                                                        <span class="ltr:ml-1 rtl:mr-1">Canada</span>
                                                    </div>
                                                </td>
                                                <td>Apr 10 - Dec 12, 2023</td>
                                                <td>Full Time</td>
                                                <td>
                                                    <div
                                                        class="flex items-center flex-row self-stretch gap-2 text-base">
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-success py-1 px-2"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-primary py-1 px-2"><i
                                                                class="ri-edit-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex align-items-center font-semibold min-w-[180px]">
                                                        <img src="<?php echo base_url('assets/img/users/11.jpg'); ?>"
                                                            class="avatar avatar-xs ltr:mr-2 rtl:ml-2 rounded-full"
                                                            alt="">
                                                        <span class="my-auto text-sm">Simon Cowel</span>
                                                    </div>
                                                </td>
                                                <td>Service</td>
                                                <td><span
                                                        class="badge bg-success/10 text-success leading-none rounded-sm text-xs py-1">Manager</span>
                                                </td>
                                                <td>simoncowel234@gmail.com</td>
                                                <td>
                                                    <div class="inline-flex items-center">
                                                        <i
                                                            class="ri-map-pin-fill text-gray-500 dark:text-white/70 text-xs"></i>
                                                        <span class="ltr:ml-1 rtl:mr-1">Europe</span>
                                                    </div>
                                                </td>
                                                <td>Sep 15 - Oct 12, 2023</td>
                                                <td>Part Time</td>
                                                <td>
                                                    <div
                                                        class="flex items-center flex-row self-stretch gap-2 text-base">
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-success py-1 px-2"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-primary py-1 px-2"><i
                                                                class="ri-edit-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex align-items-center font-semibold min-w-[180px]">
                                                        <img src="<?php echo base_url('assets/img/users/8.jpg'); ?>"
                                                            class="avatar avatar-xs ltr:mr-2 rtl:ml-2 rounded-full"
                                                            alt="">
                                                        <span class="my-auto text-sm">Mirinda Hers</span>
                                                    </div>
                                                </td>
                                                <td>Marketing</td>
                                                <td><span
                                                        class="badge bg-danger/10 text-danger leading-none rounded-sm text-xs py-1">Employee</span>
                                                </td>
                                                <td>mirindahers@gmail.com</td>
                                                <td>
                                                    <div class="inline-flex items-center">
                                                        <i
                                                            class="ri-map-pin-fill text-gray-500 dark:text-white/70 text-xs"></i>
                                                        <span class="ltr:ml-1 rtl:mr-1">USA</span>
                                                    </div>
                                                </td>
                                                <td>Apr 10 - Dec 12, 2023</td>
                                                <td>Hybrid</td>
                                                <td>
                                                    <div
                                                        class="flex items-center flex-row self-stretch gap-2 text-base">
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-success py-1 px-2"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-primary py-1 px-2"><i
                                                                class="ri-edit-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex align-items-center font-semibold min-w-[180px]">
                                                        <img src="<?php echo base_url('assets/img/users/16.jpg'); ?>"
                                                            class="avatar avatar-xs ltr:mr-2 rtl:ml-2 rounded-full"
                                                            alt="">
                                                        <span class="my-auto text-sm">Andrew Garfield </span>
                                                    </div>
                                                </td>
                                                <td>Development</td>
                                                <td><span
                                                        class="badge bg-warning/10 text-warning leading-none rounded-sm text-xs py-1">Director</span>
                                                </td>
                                                <td>andrewgarfield@gmail.com</td>
                                                <td>
                                                    <div class="inline-flex items-center">
                                                        <i
                                                            class="ri-map-pin-fill text-gray-500 dark:text-white/70 text-xs"></i>
                                                        <span class="ltr:ml-1 rtl:mr-1">London</span>
                                                    </div>
                                                </td>
                                                <td>Jun 10 - Dec 12, 2022</td>
                                                <td>Freelancer</td>
                                                <td>
                                                    <div
                                                        class="flex items-center flex-row self-stretch gap-2 text-base">
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-success py-1 px-2"><i
                                                                class="ri-download-2-line"></i></a>
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="ti-btn ti-btn-soft-primary py-1 px-2"><i
                                                                class="ri-edit-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="sm:flex sm:space-y-0 space-y-2 items-center">
                                    <div class="">
                                        showing 5 Entries <i class="ri-arrow-right-line ml-2 font-semibold"></i>
                                    </div>
                                    <div class="ltr:ml-auto rtl:mr-auto">
                                        <nav class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
                                            <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center gap-2 rounded-sm"
                                                href="javascript:void(0);">
                                                <span aria-hidden="true">Prev</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="bg-primary text-white py-1 px-2 leading-none inline-flex items-center text-sm font-medium rounded-sm"
                                                href="javascript:void(0);" aria-current="page">1</a>
                                            <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center text-sm font-medium rounded-sm"
                                                href="javascript:void(0);">2</a>
                                            <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center text-sm font-medium rounded-sm"
                                                href="javascript:void(0);">3</a>
                                            <a class="text-gray-500 hover:text-primary e py-1 px-2 leading-none inline-flex items-center gap-2 rounded-sm"
                                                href="javascript:void(0);">
                                                <span class="sr-only">Next</span>
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End::row-3 -->

            </div>
            <!-- Start::main-content -->

</div>
    
    <?= $this->endSection('content'); ?>

    <?= $this->section('scripts'); ?>

        <!-- Apex Charts JS -->
        <script src="<?php echo base_url('assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>

        <!-- Index JS -->
        <script src="<?php echo base_url('assets/js/index-4.js'); ?>"></script>
        
    <?= $this->endSection('scripts'); ?>
  

<!doctype html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light" data-menu-styles="dark">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="CodeIgniter with Tailwind CSS is a lightweight and efficient way to create stylish and responsive admin panels or dashboards, with many pre-built templates available for fast development.">
        <meta name="keywords" content="admin & dashboard template, codeigniter admin panel, admin template, dashboard admin, admin panel, admin dashboard, tailwind admin panel, admin panel template, dashboard template, dashboard tailwind, tailwind admin template, tailwind dashboard, tailwind, codeigniter admin, codeigniter tailwind">
        
        <title>Synto – Codeigniter Tailwind Admin Template</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/brand-logos/favicon.ico'); ?>">
       
        <!-- styles code -->
        <?= $this->include('layouts/components/styles'); ?>
        <!-- End styles -->

    </head>    
    
    <body class="">

        <!-- Start::main-_switcher -->
        <?= $this->include('layouts/components/switcher'); ?>
        <!-- End::main-_switcher -->

		<!-- page -->
        <div class="page">

			<!-- Start::app-sidebar -->
            <?= $this->include('layouts/components/app-sidebar'); ?>
			<!-- End::app-sidebar -->

			<!-- Start::app-header -->
            <?= $this->include('layouts/components/app-header'); ?>
			<!-- End::app-header -->

                <?= $this->renderSection('content'); ?>

        </div> 
        <!-- End Page -->   

        <!-- Start::main-footer -->
        <?= $this->include('layouts/components/footer'); ?>
        <!-- End::main-footer -->

        <!-- Start::main-scripts -->
        <?= $this->include('layouts/components/scripts'); ?>
        <!-- End::main-scripts -->

    </body>

</html>
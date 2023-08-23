<!doctype html>
<html lang="en" dir="ltr" class="h-full">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="CodeIgniter with Tailwind CSS is a lightweight and efficient way to create stylish and responsive admin panels or dashboards, with many pre-built templates available for fast development.">
    <meta name="keywords"
        content="admin & dashboard template, codeigniter admin panel, admin template, dashboard admin, admin panel, admin dashboard, tailwind admin panel, admin panel template, dashboard template, dashboard tailwind, tailwind admin template, tailwind dashboard, tailwind, codeigniter admin, codeigniter tailwind">

    <title>SISLAB |
        <?= $title; ?>
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/brand-logos/favicon.ico'); ?>">

    <!-- styles code -->
    <?= $this->include('layouts/components/custom-styles'); ?>
    <!-- End styles -->

</head>

<body class="authentication-page !h-full">

    <?= $this->renderSection('content'); ?>

    <!-- Start::main-scripts -->
    <?= $this->include('layouts/components/custom-scripts'); ?>
    <!-- End::main-scripts -->

</body>

</html>
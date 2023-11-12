<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>



<?= $this->endSection('styles'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start::main-content -->
    <div class="main-content">

        <!-- <div class="<?php echo $currentMonthTipeCounts['lalulintas']['isPositive'] ? 'text-success' : 'text-danger'; ?>
                                            text-sm font-semibold"><i
                                                    class="<?php echo $currentMonthTipeCounts['lalulintas']['isPositive'] ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'; ?> ltr:mr-1 rtl:ml-1 align-middle"></i>
                                                <?php echo $currentMonthTipeCounts['lalulintas']['percentage']; ?>%
                                            </div> -->
        <!-- Page Header -->
        <div class="block justify-between page-header sm:flex">
            <div>
                <h3
                    class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Sistem Informasi Laboratorium
                </h3>
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
                    Dashboard
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
                                            <h5 class="text-xl font-semibold mb-0 leading-none">
                                                <?php echo $total; ?>
                                            </h5>
                                        </div>
                                        <p
                                            class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                            Total Permohonan
                                        </p>
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
                                            class="ti ti-ship text-xl avatar w-10 h-10 rounded-full p-2.5 bg-secondary/10 text-secondary leading-none"></i>
                                    </span>
                                    <div class="w-full">
                                        <div class="flex mb-2 items-start justify-between">
                                            <h5 class="text-xl font-semibold mb-0 leading-none">
                                                <?php echo $byTipeTotal['lalulintas']; ?>
                                            </h5>
                                        </div>
                                        <p
                                            class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                            Permohonan Lalulintas
                                        </p>
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
                                            class="ri-user-follow-line text-xl avatar w-10 h-10 rounded-full p-2.5 bg-success/10 text-success leading-none"></i>
                                    </span>
                                    <div class="w-full">
                                        <div class="flex mb-2 items-start justify-between">
                                            <h5 class="text-xl font-semibold mb-0 leading-none">
                                                <?php echo $byTipeTotal['monsur']; ?>
                                            </h5>
                                        </div>
                                        <p
                                            class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                            Permohonan Monsur
                                        </p>
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
                                            class="ti ti-man text-xl avatar w-10 h-10 rounded-full p-2.5 bg-warning/10 text-warning leading-none"></i>
                                    </span>
                                    <div class="w-full">
                                        <div class="flex mb-2 items-start justify-between">
                                            <h5 class="text-xl font-semibold mb-0 leading-none">
                                                <?php echo $byTipeTotal['mandiri']; ?>
                                            </h5>
                                        </div>
                                        <p
                                            class="mb-0 text-xs leading-none opacity-70 text-gray-500 dark:text-white/70">
                                            Permohonan Mandiri
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-9">
                        <div class="box overflow-hidden">
                            <div class="box-header">
                                <div class="sm:flex justify-between sm:space-y-0 space-y-2">
                                    <h5 class="box-title my-auto">
                                        Permohonan FPPC
                                    </h5>

                                </div>
                            </div>
                            <div class="box-body p-0">
                                <div
                                    class="grid grid-cols-12 gap-6 border-b border-dashed border-gray-200 dark:border-white/10 px-6">
                                    <div class="col-span-12 sm:col-span-3">
                                        <div class="py-4 sm:text-start text-center">
                                            <p class="text-xl font-semibold mb-0">
                                                <?php echo $total; ?>
                                            </p>
                                            <p class="mb-0 text-sm text-gray-500 dark:text-white/70">Total
                                                Permohonan
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-span-12 sm:col-span-3">
                                        <div class="p-3 text-sm-start">
                                            <p class="text-xl font-semibold mb-0"><span class="">
                                                    <?php echo $byTipeTotal['lalulintas']; ?>
                                                </span></p>
                                            <p class="mb-0 text-sm text-gray-500 dark:text-white/70">Lalu Lintas
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-span-12 sm:col-span-3">
                                        <div class="p-3 sm:text-start text-center">
                                            <p class="text-xl font-semibold mb-0"><span class="">
                                                    <?php echo $byTipeTotal['monsur']; ?>
                                                </span></p>
                                            <p class="mb-0 text-sm text-gray-500 dark:text-white/70">
                                                Monsur
                                        </div>
                                    </div>

                                    <div class="col-span-12 sm:col-span-3">
                                        <div class="p-3 text-sm-start">
                                            <p class="text-xl font-semibold mb-0"><span class="">
                                                    <?php echo $byTipeTotal['mandiri']; ?>
                                                </span></p>
                                            <p class="mb-0 text-sm text-gray-500 dark:text-white/70">Mandiri
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="subscriptionOverview" class="px-4 sm:mt-0 mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xxl:col-span-3">
                        <div class="box projects-tracking-card overflow-hidden text-center">
                            <div class="box-body text-center">
                                <img src="<?php echo base_url('assets/img/task.svg'); ?>" alt="Project-img"
                                    class="h-40 w-40 mx-auto">
                                <div>
                                    <h5 class="font-semibold text-gray-800 dark:text-white text-xl mb-1"> Welcome Back,
                                        Oddy
                                        ...!</h5>
                                    <p class="text-xs text-gray-500 dark:text-white/70 mb-4">
                                        Anda memiliki 3 permohonan baru yang belum diproses.
                                    </p>
                                    <button type="button" class="ti-btn ti-btn-primary">
                                        Lihat Permohonan
                                    </button>
                                </div>
                            </div>
                            <span class="shape-1 text-primary"><i class="ti ti-circle text-base font-bold"></i></span>
                            <span class="shape-2 text-secondary"><i
                                    class="ti ti-triangle text-base font-bold"></i></span>
                            <span class="shape-3 text-warning"><i class="ti ti-square text-base font-bold"></i></span>
                            <span class="shape-4 text-info"><i
                                    class="ti ti-square-rotated text-base font-bold"></i></span>
                            <span class="shape-5 text-success"><i class="ti ti-pentagon text-base font-bold"></i></span>
                            <span class="shape-6 text-danger"><i class="ti ti-star text-base font-bold"></i></span>
                            <span class="shape-7 text-pink-500"><i class="ti ti-hexagon text-base font-bold"></i></span>
                            <span class="shape-8 text-teal-500"><i class="ti ti-octagon text-base font-bold"></i></span>
                            <span class="shape-9 text-primary"><i class="ti ti-circle text-base font-bold"></i></span>
                            <span class="shape-10 text-secondary"><i
                                    class="ti ti-triangle text-base font-bold"></i></span>
                            <span class="shape-11 text-warning"><i class="ti ti-square text-base font-bold"></i></span>
                            <span class="shape-12 text-info"><i
                                    class="ti ti-square-rotated text-base font-bold"></i></span>
                            <span class="shape-13 text-success"><i
                                    class="ti ti-pentagon text-base font-bold"></i></span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- End::row-1 -->



    </div>
    <!-- Start::main-content -->

</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>



<!-- Apex Charts JS -->
<script src="<?php echo base_url('assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>

<!-- Index JS -->
<script src="<?php echo base_url('assets/js/index-4.js'); ?>"></script>

<script>
    const tipeCounts = <?php echo json_encode($tipeCountsWithMonth); ?>;

    var options = {
        series: [
            {
                name: "Monsur",
                type: "line",
                data: Object.keys(tipeCounts).map((key) => ({
                    x: key,
                    y: tipeCounts[key].monsur.count,
                })),
            },
            {
                name: "Lalu lintas",
                type: "line",
                data: Object.keys(tipeCounts).map((key) => ({
                    x: key,
                    y: tipeCounts[key].lalulintas.count,
                })),
            },
            {
                name: "Mandiri",
                type: "line",
                data: Object.keys(tipeCounts).map((key) => ({
                    x: key,
                    y: tipeCounts[key].mandiri.count,
                })),
            },
        ],
        chart: {
            height: 240,
            type: "line",
            stacked: false,
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        grid: {
            borderColor: "rgba(107 ,114 ,128,0.1)",
        },
        colors: ["rgb(90,102,241)", "rgb(203,213,225)", "rgb(96, 165 ,250)"],
        legend: {
            show: false,
        },
        stroke: {
            width: [2, 2, 2],
            curve: "smooth",
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "20%",
                endingShape: "rounded",
                borderRadius: 5,
            },
        },
        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: "light",
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100],
            },
        },
        markers: {
            size: 0,
        },
        yaxis: {
            title: {
                style: {
                    color: "#adb5be",
                    fontSize: "14px",
                    fontFamily: "Inter, sans-serif",
                    fontWeight: 600,
                    cssClass: "apexcharts-yaxis-label",
                },
            },
            labels: {
                style: {
                    colors: "rgb(107 ,114 ,128)",
                    fontSize: "12px",
                },
                formatter: function (y) {
                    return y.toFixed(0) + "";
                },
            },
        },
        xaxis: {
            type: "month",
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            axisBorder: {
                show: true,
                color: "rgba(119, 119, 142, 0.05)",
                offsetX: 0,
                offsetY: 0,
            },
            axisTicks: {
                show: true,
                borderType: "solid",
                color: "rgba(119, 119, 142, 0.05)",
                width: 6,
                offsetX: 0,
                offsetY: 0,
            },
            labels: {
                rotate: -90,
                style: {
                    colors: "rgb(107 ,114 ,128)",
                    fontSize: "12px",
                },
            },
        },
    };
    document.querySelector("#subscriptionOverview").innerHTML = " ";
    var chart = new ApexCharts(
        document.querySelector("#subscriptionOverview"),
        options
    );
    chart.render();

    function subOverview() {
        chart.updateOptions({
            colors: ["rgb(" + myVarVal + ")", "rgb(203,213,225)", "rgb(96, 165 ,250)"],
        });
    }
</script>

<?= $this->endSection('scripts'); ?>
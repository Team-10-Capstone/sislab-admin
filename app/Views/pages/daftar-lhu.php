<?= $this->extend('layouts/main'); ?>

<?= $this->section('styles'); ?>
<!-- Tabulator Css -->
<link rel="stylesheet" href="<?php echo base_url('assets/libs/tabulator-tables/css/tabulator.min.css'); ?>">


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
                    Daftar Laporan Hasil Uji</h3>
            </div>
        </div>
        <!-- Page Header Close -->
        <!-- Start::row-1 -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Basic DataTable</h5>
                    </div>
                    <div class="box-body">
                        <div class="overflow-auto table-bordered">
                            <div id="basic-table" class="ti-custom-table ti-striped-table ti-custom-table-hover">
                            </div>
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
<!-- Tabulator JS -->
<script src="<?php echo base_url('assets/libs/tabulator-tables/js/tabulator.min.js'); ?>"></script>
<script>
    "use strict";
    /* Start::Choices JS */
    document.addEventListener('DOMContentLoaded', function () {
        var genericExamples = document.querySelectorAll('[data-trigger]');
        for (let i = 0; i < genericExamples.length; ++i) {
            var element = genericExamples[i];
            new Choices(element, {
                allowHTML: false,
            });
        }
    });


    //define data
    var tabledata = <?= json_encode($admin); ?>;
    var table = new Tabulator("#basic-table", {
        width: 100,
        minWidth: 100,
        layout: "fitColumns",
        pagination: "local",
        paginationSize: 10,
        // responsiveLayout:true, // enable responsive layouts
        paginationSizeSelector: [5, 10, 15, 20, 25],
        paginationCounter: "rows",
        // movableColumns: true,
        data: tabledata, //load data into table
        columns: [{
            title: "ID",
            field: "name",
            sorter: "string"
        },
        {
            title: "No FPPC",
            field: "email",
            sorter: "string"
        },
        {
            title: "No LHU",
            field: "password",
            sorter: "string"
        },
        {
            title: "Trader",
            field: "mobile",
            sorter: "number"
        },
        {
            title: "Tanggal FPPC",
            field: "createdDtm",
            sorter: "string"
        },
        {
            title: "Print",
            formatter: printActionColumnFormatter,
            width: 100,
            align: "center",
            cellClick: function (e, cell) {
                // Handle the print action here
                var rowData = cell.getRow().getData();
                alert("Printing " + rowData.name);
            },
            cellClickParams: {
                print: "print"
            }
        },
        ],
    });
    document.getElementById("sort-trigger").addEventListener("click", function () {
        table1.setSort(fieldEl.options[fieldEl.selectedIndex].value, dirEl.options[dirEl.selectedIndex].value);
    });

    function printActionColumnFormatter(cell, formatterParams, onRendered) {
        return '<i class="ti ti-printer"></i>'; // Font Awesome print icon
    }
</script>

<!-- Index JS -->
<script src="<?php echo base_url('assets/js/index-4.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

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
                    Daftar Admin</h3>
            </div>
            <ol class="flex items-center whitespace-nowrap min-w-0">
                <a href="<?php echo base_url("user/add"); ?>">
                    <button type="button" class="ti-btn ti-btn-primary">
                        Tambah User
                    </button>
                </a>
            </ol>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12">
                <div class="box">
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
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('scripts'); ?>

<!-- Apex Charts JS -->
<script src="<?php echo base_url('assets/libs/apexcharts/apexcharts.min.js'); ?>"></script>
<!-- Tabulator JS -->
<script src="<?php echo base_url('assets/libs/tabulator-tables/js/tabulator.min.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    var tabledata = <?= json_encode($users); ?>;
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
            field: "userId",
            sorter: "string"
        },
        {
            title: "Nama",
            field: "name",
            sorter: "string"
        },
        {
            title: "Email",
            field: "email",
            sorter: "string"
        },
        {
            title: "No HP",
            field: "mobile",
            sorter: "number"
        },
        {
            title: "Role",
            field: "roleId",
            sorter: "string"
        },
        {
            title: "Action",
            formatter: action,
            align: "center",
            headerSort: false,
            cellClick: function (e, cell) {
                var action = cell
                    .getValue(); // Retrieve the action from the button's data-action attribute
                var rowData = cell.getRow().getData();
                console.log(action);

                if (action === "edit") {
                    // Handle edit action
                    alert("Editing " + rowData.name);
                    window.location.href = '<?php echo base_url("user/edit/"); ?>' + rowData
                        .userId;
                } else if (action === "delete") {
                    if (confirm("Are you sure you want to delete this row?")) {
                        // Send an AJAX request to delete the row
                        deleteRow(rowData.userId);
                    }
                }
            },
        },
        ],
    });
    document.getElementById("sort-trigger").addEventListener("click", function () {
        table1.setSort(fieldEl.options[fieldEl.selectedIndex].value, dirEl.options[dirEl.selectedIndex].value);
    });

    // make function for edit and delete

    function action(cell, formatterParams, onRendered) {
        // Create "Edit" and "Delete" icons
        var editIcon = '<button type="button" class="ti-btn ti-btn-primary"><i class="ti ti-edit"></i></button>';
        var deleteIcon = '<button type="button" class="ti-btn ti-btn-danger"><i class="ti ti-trash-filled"></i></button>';

        // Create a container for the icons
        var actionsContainer = document.createElement("div");

        // Add click event listeners to the icons
        var editButton = document.createElement("span");
        editButton.innerHTML = editIcon;
        editButton.addEventListener("click", function () {
            cell.setValue("edit");
        });

        var deleteButton = document.createElement("span");
        deleteButton.innerHTML = deleteIcon;
        deleteButton.addEventListener("click", function () {
            cell.setValue("delete");
        });

        // Append the icons to the container
        actionsContainer.appendChild(editButton);
        actionsContainer.appendChild(deleteButton);

        return actionsContainer;
    }

    function deleteRow(userId) {
        $.ajax({
            url: '<?php echo base_url("UserController/delete/"); ?>' + userId,
            type: 'DELETE', // Assuming you want to use the DELETE HTTP method
            success: function (response) {
                // Handle success (e.g., remove the row from the table)
                console.log(response); // Log the response from the server
                table.deleteRow(userId); // Remove the row from the table
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText); // Log the error response
            },
        });
    }

    function editRow(userId) {
        $.ajax({
            url: '<?php echo base_url("UserController/edit/"); ?>' + userId,
            type: 'GET', // Assuming you want to use the DELETE HTTP method
            success: function (response) {
                // Handle success (e.g., remove the row from the table)
                console.log(response); // Log the response from the server
                // table.deleteRow(userId); // Remove the row from the table
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText); // Log the error response
            },
        });
    }
</script>

<!-- Index JS -->
<script src="<?php echo base_url('assets/js/index-4.js'); ?>"></script>

<?= $this->endSection('scripts'); ?>
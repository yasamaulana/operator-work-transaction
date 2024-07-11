<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Work Transaction</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .filters select {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 20px;
        }

        .dataTables_wrapper .dataTables_length select {
            margin-right: 5px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .btn-edit {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Operator Work Transaction</h1>
        <div class="filters d-flex flex-wrap gap-3">
            <div class="form-group">
                <label for="mesin_id">Mesin ID</label>
                <select id="mesin_id" class="form-control">
                    <option value="">Select Mesin ID</option>
                    <option value="LYK01">LYK01</option>
                    <option value="LYK 10">LYK 10</option>
                    <option value="LYK206">LYK206</option>
                    <option value="LYK 11">LYK 11</option>
                    <option value="LYK 205">LYK 205</option>
                </select>
            </div>
            <div class="form-group">
                <label for="month">Month</label>
                <select id="month" class="form-control">
                    <option value="">Select Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="form-group">
                <label for="site">Site</label>
                <select id="site" class="form-control">
                    <option value="">Select Site</option>
                    <option value="R002">R002</option>
                    <!-- i just add this for example -->
                </select>
            </div>
            <div class="form-group">
                <label for="operator">Operator</label>
                <select id="operator" class="form-control">
                    <option value="">Select Operator</option>
                    <option value="Kelli Kunze">Ottilie Braun</option>
                    <option value="Mrs. Deja Maggio">Mrs. Deja Maggio</option>
                    <!-- i just add this for example -->
                </select>
            </div>
            <div class="form-group">
                <label for="activity">Activity</label>
                <select id="activity" class="form-control">
                    <option value="">Select Activity</option>
                    <option value="Cincang 4&quot; Tebal">Cincang 4" Tebal</option>
                    <option value="Cuci Parit Pinggir 12FT">Cuci Parit Pinggir 12FT</option>
                    <!-- i just add this for example -->
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table id="operator-transactions" class="display table table-striped table-bordered">
                <thead>
                    <tr class="text-nowrap">
                        <th>Action</th>
                        <th>Submitted By</th>
                        <th>Submitted When</th>
                        <th>Site Code</th>
                        <th>Activity</th>
                        <th>UOM</th>
                        <th>Block</th>
                        <th>Task</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Mesin ID</th>
                        <th>Fuel</th>
                        <th>Check By</th>
                        <th>When Check</th>
                        <th>Verified By</th>
                        <th>When Verified</th>
                        <th>Duty</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            function fetch_data(filter_params = {}) {
                $.ajax({
                    url: "{{ route('operator-transactions.filter') }}",
                    method: "GET",
                    data: filter_params,
                    dataType: "json",
                    success: function(data) {
                        var table = $('#operator-transactions').DataTable();
                        table.clear().draw();
                        $.each(data.data, function(index, value) {
                            table.row.add([
                                '<button class="btn btn-primary btn-edit">Edit</button>',
                                value.submitted_by,
                                value.submitted_when,
                                value.site_code,
                                value.activity,
                                value.uom,
                                value.block,
                                value.task,
                                value.start,
                                value.end,
                                value.mesin_id,
                                value.fuel,
                                value.check_by,
                                value.when_check,
                                value.verified_by,
                                value.when_verified,
                                value.duty,
                                value.reason,
                            ]).draw(false);
                        });
                    }
                });
            }

            $('#mesin_id, #month, #site, #operator, #activity').on('change', function() {
                var filter_params = {
                    mesin_id: $('#mesin_id').val(),
                    month: $('#month').val(),
                    site: $('#site').val(),
                    operator: $('#operator').val(),
                    activity: $('#activity').val()
                };
                fetch_data(filter_params);
            });

            $('#operator-transactions').DataTable();
            fetch_data();
        });
    </script>
</body>

</html>

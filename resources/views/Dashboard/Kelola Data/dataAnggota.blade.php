<x-app>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Anggota</h4>
                <div class="d-flex gap-2">
                      <button class="btn btn-secondary">
                    <span class="btn-label">
                        <i class="fa fa-plus"></i>
                    </span>
                    Tambah Buku
                </button>
                    <button class="btn btn-success btn-sm">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Anggota</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Kelas</th>
                                <th>No HP</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Anggota</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Kelas</th>
                                <th>No HP</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>A001</td>
                                <td>Ana</td>
                                <td>Perempuan</td>
                                <td>juwana</td>
                                <td>089987789000</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>A002</td>
                                <td>Bagus</td>
                                <td>Laki-laki</td>
                                <td>demak</td>
                                <td>089987789098</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>A003</td>
                                <td>Citra</td>
                                <td>Perempuan</td>
                                <td>demak</td>
                                <td>085878526048</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>A004</td>
                                <td>Didik</td>
                                <td>Laki-laki</td>
                                <td>pati</td>
                                <td>087789987654</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>A005</td>
                                <td>Edi</td>
                                <td>Laki-laki</td>
                                <td>demak</td>
                                <td>089987789098</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>A006</td>
                                <td>Rafi</td>
                                <td>Laki-laki</td>
                                <td>XII RPL 5</td>
                                <td>493294023</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app>

<script>
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-select"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on("change", function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });

        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function() {
            $("#add-row")
                .dataTable()
                .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                ]);
            $("#addRowModal").modal("hide");
        });
    });
</script>

<x-app>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Buku</h4>
                <button class="btn btn-secondary">
                    <span class="btn-label">
                        <i class="fa fa-plus"></i>
                    </span>
                    Tambah Buku
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>B001</td>
                                <td>Matematika</td>
                                <td>anastasya</td>
                                <td>armi print</td>
                                <td>2010</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>B002</td>
                                <td>RPL 2</td>
                                <td>Eko</td>
                                <td>UMK</td>
                                <td>2020</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>B003</td>
                                <td>C++</td>
                                <td>Anton</td>
                                <td>Toni Perc</td>
                                <td>2010</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>B004</td>
                                <td>CI 4</td>
                                <td>anastasya</td>
                                <td>armi print</td>
                                <td>2009</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>B005</td>
                                <td>Data Mining</td>
                                <td>Anton</td>
                                <td>Toni Perc</td>
                                <td>2020</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>B006</td>
                                <td>Tutorial Coding Laravel</td>
                                <td>Jeff Bezoz</td>
                                <td>Gramedia</td>
                                <td>2001</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

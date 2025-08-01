<x-app>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Sirkulasi</h4>
                <a href="{{ route('sirkulasi.create') }}" class="btn btn-secondary">
                    <span class="btn-label">
                        <i class="fa fa-plus"></i>
                    </span>
                    Tambah Data
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID SKL</th>
                                <th>Buku</th>
                                <th>Peminjam</th>
                                <th>Tgl Pinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Denda</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID SKL</th>
                                <th>Buku</th>
                                <th>Peminjam</th>
                                <th>Tgl Pinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Denda</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>S006</td>
                                <td>Tutorial Coding Laravel</td>
                                <td>A006 - Rafi</td>
                                <td>19/Jul/2025</td>
                                <td>26/Jul/2025</td>
                                <td>
                                    <span class="badge bg-danger">Rp. 6000</span>
                                    <br>
                                    Terlambat : 6 Hari
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-arrow-up"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-arrow-down"></i>
                                    </button>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>S002</td>
                                <td>RPL 2</td>
                                <td>A001 - Ana</td>
                                <td>27/Jun/2020</td>
                                <td>04/Jul/2020</td>
                                <td>
                                    <span class="badge bg-danger">Rp. 1854000</span>
                                    <br>
                                    Terlambat : 1854 Hari
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-arrow-up"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-arrow-down"></i>
                                    </button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>*Note
        Masa peminjaman buku adalah 7 hari dari tanggal peminjaman.
        Jika buku dikembalikan lebih dari masa peminjaman, maka akan dikenakan denda
        sebesar Rp 1.000/hari.</div>
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

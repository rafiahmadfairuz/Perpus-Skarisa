<x-app>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Laporan Sirkulasi</h4>
                <button class="btn btn-secondary">
                    <span class="btn-label">
                        <i class="fa fa-print"></i>
                    </span>
                    Print
                </button>
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
                                <th>Tgl dikembalikan</th>
                                <th>Denda</th>
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
                                <th>Tgl dikembalikan</th>
                                <th>Denda</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>S001</td>
                                <td>Matematika</td>
                                <td>Ana</td>
                                <td>23/Jun/2020</td>
                                <td>30/Jun/2020</td>
                                <td>09/Jul/2025</td>
                                <td>Rp. 1.858.000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>S003</td>
                                <td>C++</td>
                                <td>Bagus</td>
                                <td>22/Jun/2020</td>
                                <td>29/Jun/2020</td>
                                <td>23/Jul/2025</td>
                                <td>Rp. 1.859.000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>S005</td>
                                <td>Tutorial Coding Laravel</td>
                                <td>Bagus</td>
                                <td>15/Jul/2025</td>
                                <td>22/Jul/2025</td>
                                <td>19/Jul/2025</td>
                                <td>Rp. 10.000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>S004</td>
                                <td>RPL 2</td>
                                <td>Edi</td>
                                <td>23/Jun/2020</td>
                                <td>30/Jun/2020</td>
                                <td>30/Jul/2025</td>
                                <td>Rp. 1.858.000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-end fw-bold">Total Denda</td>
                                <td class="fw-bold">Rp. 5.585.000</td>
                            </tr>
                        </tfoot>
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

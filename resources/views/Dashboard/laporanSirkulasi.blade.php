<x-app>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Laporan Sirkulasi</h4>
                <a href="{{ route('print.laporan') }}" target="_blank" class="btn btn-secondary">
                    <span class="btn-label">
                        <i class="fa fa-print"></i>
                    </span>
                    Print
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

                            @php $totalDenda = 0; @endphp
                            @foreach ($sirkulasis as $index => $s)
                                @php
                                    $jatuhTempo = \Carbon\Carbon::parse($s->tgl_kembali);
                                    $tglDikembalikan = \Carbon\Carbon::parse($s->tgl_dikembalikan);
                                    $terlambat = $tglDikembalikan->gt($jatuhTempo)
                                        ? $jatuhTempo->diffInDays($tglDikembalikan)
                                        : 0;
                                    $denda = $terlambat * 1000;
                                    $totalDenda += $denda;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $s->id_sirkulasi }}</td>
                                    <td>{{ $s->buku->judul_buku ?? '-' }}</td>
                                    <td>{{ $s->anggota->nama ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($s->tgl_pinjam)->format('d/M/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($s->tgl_kembali)->format('d/M/Y') }}</td>
                                    <td>{{ $s->tgl_dikembalikan ? \Carbon\Carbon::parse($s->tgl_dikembalikan)->format('d/M/Y') : '-' }}
                                    </td>
                                    <td>Rp. {{ number_format($denda, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            @if ($sirkulasis->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data pengembalian.</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-end fw-bold">Total Denda</td>
                                <td class="fw-bold">Rp. {{ number_format($totalDenda, 0, ',', '.') }}</td>
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
            pageLength: 10,
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

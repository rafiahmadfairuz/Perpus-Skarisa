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
                            @foreach ($sirkulasis as $no => $s)
                                @php
                                    $tglKembali = \Carbon\Carbon::parse($s->tgl_kembali)->startOfDay(); // deadline pengembalian
                                    $tglDikembalikan = $s->tgl_dikembalikan
                                        ? \Carbon\Carbon::parse($s->tgl_dikembalikan)->startOfDay()
                                        : \Carbon\Carbon::now()->startOfDay(); // jika belum dikembalikan, pakai hari ini

                                    $sudahKembali = $s->tgl_dikembalikan != null;

                                    $terlambat = $tglDikembalikan->gt($tglKembali)
                                        ? $tglKembali->diffInDays($tglDikembalikan)
                                        : 0;

                                    $denda = $terlambat * 1000;
                                @endphp

                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $s->id_sirkulasi }}</td>
                                    <td>{{ $s->buku->judul_buku ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ $s->id_anggota }} - {{ $s->anggota->nama ?? 'Tidak ditemukan' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($s->tgl_pinjam)->format('d/M/Y') }}</td>
                                    <td>
                                        {{ $s->tgl_kembali ? \Carbon\Carbon::parse($s->tgl_kembali)->format('d/M/Y') : '-' }}
                                    </td>
                                    <td>
                                        @if (!$sudahKembali)
                                            <span class="badge bg-warning">Belum dikembalikan</span>
                                            @if ($terlambat > 0)
                                                <br><span class="text-danger">Terlambat: {{ $terlambat }} hari</span>
                                                <br><span class="text-danger">Denda: Rp
                                                    {{ number_format($denda, 0, ',', '.') }}</span>
                                            @endif
                                        @elseif ($terlambat > 0)
                                            <span class="badge bg-danger">Rp.
                                                {{ number_format($denda, 0, ',', '.') }}</span>
                                            <br> Terlambat: <strong>{{ $terlambat }}</strong> Hari
                                        @else
                                            <span class="badge bg-success">Masa Peminjaman</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Tombol Up (Perpanjang 7 hari) --}}
                                        <form action="{{ route('sirkulasi.up', $s->id_sirkulasi) }}" method="POST"
                                            style="display: inline-block;" onsubmit="return confirm('Yakin ingin Menambah 7 Hari?')">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success btn-sm" title="Perpanjang 7 hari">
                                                <i class="fa fa-arrow-up"></i>
                                            </button>
                                        </form>

                                        {{-- Tombol Down (Kembalikan buku) --}}
                                        <form action="{{ route('sirkulasi.kembalikan', $s->id_sirkulasi) }}" method="POST"
                                            style="display: inline-block;" onsubmit="return confirm('Yakin ingin Mengembalikan?')">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger btn-sm" title="Kembalikan buku">
                                                <i class="fa fa-arrow-down"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <div>
        *Note<br>
        Masa peminjaman buku adalah 7 hari dari tanggal peminjaman.<br>
        Jika buku dikembalikan lebih dari masa peminjaman, maka akan dikenakan denda
        sebesar Rp 1.000/hari.
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

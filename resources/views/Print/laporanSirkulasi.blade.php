<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Sirkulasi Perpustakaan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f4f8;
            padding: 30px;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 70px;
            margin-right: 20px;
        }

        .judul {
            font-size: 22px;
            font-weight: bold;
            color: #2b79c1;
        }

        .table-container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background-color: #2b79c1;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tfoot td {
            font-weight: bold;
        }

        @media print {
            body {
                background-color: white;
            }

            .table-container {
                box-shadow: none;
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .page-break {
                page-break-after: always;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="header">
        <img src="{{ asset('assets/img/Skarisa.png') }}" alt="Logo Skarisa" class="logo">
        <div class="judul">Laporan Sirkulasi Buku - Perpustakaan SMK Krian 1 Sidoarjo</div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID SKL</th>
                    <th>Buku</th>
                    <th>Peminjam</th>
                    <th>Tgl Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Tgl Dikembalikan</th>
                    <th>Denda</th>
                </tr>
            </thead>
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
                        <td>{{ \Carbon\Carbon::parse($s->tgl_pinjam)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($s->tgl_kembali)->format('d M Y') }}</td>
                        <td>{{ $s->tgl_dikembalikan ? \Carbon\Carbon::parse($s->tgl_dikembalikan)->format('d M Y') : '-' }}</td>
                        <td>Rp {{ number_format($denda, 0, ',', '.') }}</td>
                    </tr>
                @endforeach

                @if ($sirkulasis->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data sirkulasi.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" style="text-align:right">Total Denda</td>
                    <td>Rp {{ number_format($totalDenda, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

</html>

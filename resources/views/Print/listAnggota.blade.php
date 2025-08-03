<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota Perpustakaan</title>
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
            font-size: 14px;
        }

        th,
        td {
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
        <div class="judul">Daftar Anggota Perpustakaan SMK Krian 1 Sodoarjo</div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Anggota</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>No HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $index => $a)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $a->id_anggota }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->jekel }}</td>
                        <td>{{ $a->kelas }}</td>
                        <td>{{ $a->no_hp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

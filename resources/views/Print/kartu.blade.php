<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kartu Anggota Perpustakaan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f0f0f0;
        }
        .card {
            padding: 40px;
            width: 700px;
            height: 250px;
            display: flex;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            border: 2px solid #2b79c1;
            background-color: #2b79c1;
            color: white;
        }
        .card-left {
            flex: 3;
            padding: 30px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .card-left h2 {
            margin: 0;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .card-left h3 {
            margin: 10px 0 25px 0;
            font-size: 24px;
            font-weight: normal;
        }
        .info-table {
            font-size: 16px;
            line-height: 1.8;
        }
        .info-table td {
            padding-right: 12px;
        }

        .card-right {
            flex: 1.2;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-placeholder {
            width: 100px;
            height: 130px;
            border: 2px dashed #888;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555;
            font-size: 14px;
            background: #f9f9f9;
        }

        @media print {
            body {
                background: none !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="card">
        <!-- Kiri -->
        <div class="card-left">
            <h2>Perpustakaan Skarisa</h2>
            <h3>Kartu Anggota</h3>
            <table class="info-table">
                <tr>
                    <td>ID Anggota</td><td>:</td><td>{{ $anggota->id_anggota }}</td>
                </tr>
                <tr>
                    <td>Nama</td><td>:</td><td>{{ $anggota->nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td><td>:</td><td>{{ $anggota->jekel }}</td>
                </tr>
                <tr>
                    <td>Kelas</td><td>:</td><td>{{ $anggota->kelas }}</td>
                </tr>
                <tr>
                    <td>No HP</td><td>:</td><td>{{ $anggota->no_hp }}</td>
                </tr>
            </table>
        </div>

        <!-- Kanan (foto) -->
        <div class="card-right">
            <div class="photo-placeholder">Foto 3x4</div>
        </div>
    </div>
</body>
</html>

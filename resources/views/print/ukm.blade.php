<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data UKM</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { text-align: center; font-size: 18px; margin-bottom: 5px; }
        .subtitle { text-align: center; font-size: 14px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 8px; text-align: left; }
        th { background: #f0f0f0; font-weight: bold; }
        .footer { text-align: center; margin-top: 20px; font-size: 11px; }
        @media print { body { margin: 20px; } .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom:10px;">
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.close()">Tutup</button>
    </div>
    <h1>POLITEKNIK NEGERI BANJARMASIN</h1>
    <div class="subtitle">Laporan Data Unit Kegiatan Mahasiswa</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama UKM</th>
                <th>Ketua</th>
                <th>Sekretaris</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->ketua_nama }}</td>
                <td>{{ $item->sekretaris_nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nomor_telepon }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Kategori Barang</title>
</head>
<body>
    <h1>Data Kategori Barang</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->kategori_id }}</td>
            <td>{{ $d->kategori_kode }}</td>
            <td>{{ $d->kategori_nama }}</td>
            <td><a href="/kategori/ubah/{{ $d->kategori_id }}">Ubah</a> | 
                <a href="/kategori/hapus/{{ $d->kategori_id }}" onclick="return confirm('Yakin hapus data ini?')">Hapus</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
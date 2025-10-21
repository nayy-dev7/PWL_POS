<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Kategori</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->barang_id }}</td>
            <td>{{ $d->barang_kode }}</td>
            <td>{{ $d->barang_nama }}</td>
            <td>{{ $d->harga_beli }}</td>
            <td>{{ $d->harga_jual }}</td>
            <td>{{ $d->kategori_id }}</td>
            <td>{{ $d->supplier_id }}</td>
            <td><a href="/barang/ubah/{{ $d->barang_id }}">Ubah</a> | 
                <a href="/barang/hapus/{{ $d->barang_id }}" onclick="return confirm('Yakin hapus data ini?')">Hapus</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
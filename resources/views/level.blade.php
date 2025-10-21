<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Level Pengguna</title>
</head>
<body>
    <h1>Data Level Pengguna</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->level_kode }}</td>
            <td>{{ $d->level_nama }}</td>
            <td><a href="/level/ubah/{{ $d->level_id }}">Ubah</a> | 
                <a href="/level/hapus/{{ $d->level_id }}" onclick="return confirm('Yakin hapus data ini?')">Hapus</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
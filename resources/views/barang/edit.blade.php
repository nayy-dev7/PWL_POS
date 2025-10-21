@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
  </div>
  <div class="card-body">
    @empty($barang)
      <div class="alert alert-danger">Data tidak ditemukan.</div>
    @else
      <form method="POST" action="{{ url('/barang/'.$barang->barang_id) }}">
        @csrf
        {!! method_field('PUT') !!}
        <div class="form-group">
          <label>Kode Barang</label>
          <input type="text" name="barang_kode" value="{{ old('barang_kode', $barang->barang_kode) }}" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Nama Barang</label>
          <input type="text" name="barang_nama" value="{{ old('barang_nama', $barang->barang_nama) }}" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select name="kategori_id" class="form-control" required>
            <option value="">- Pilih Kategori -</option>
            @foreach($kategori as $k)
              <option value="{{ $k->kategori_id }}" @if($k->kategori_id == $barang->kategori_id) selected @endif>{{ $k->kategori_nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Supplier</label>
          <select name="supplier_id" class="form-control" required>
            <option value="">- Pilih Supplier -</option>
            @foreach($supplier as $s)
              <option value="{{ $s->supplier_id }}" @if($s->supplier_id == $barang->supplier_id) selected @endif>{{ $s->supplier_nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Harga Beli</label>
          <input type="number" name="harga_beli" value="{{ old('harga_beli', $barang->harga_beli) }}" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Harga Jual</label>
          <input type="number" name="harga_jual" value="{{ old('harga_jual', $barang->harga_jual) }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="{{ url('barang') }}" class="btn btn-default btn-sm">Kembali</a>
      </form>
    @endempty
  </div>
</div>
@endsection

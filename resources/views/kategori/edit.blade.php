@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
  </div>
  <div class="card-body">
    @empty($kategori)
      <div class="alert alert-danger">Data tidak ditemukan.</div>
      <a href="{{ url('kategori') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    @else
      <form method="POST" action="{{ url('/kategori/'.$kategori->kategori_id) }}">
        @csrf
        {!! method_field('PUT') !!}
        <div class="form-group row">
          <label class="col-2 col-form-label">Kode Kategori</label>
          <div class="col-10">
            <input type="text" name="kategori_kode" value="{{ old('kategori_kode', $kategori->kategori_kode) }}" class="form-control" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 col-form-label">Nama Kategori</label>
          <div class="col-10">
            <input type="text" name="kategori_nama" value="{{ old('kategori_nama', $kategori->kategori_nama) }}" class="form-control" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="{{ url('kategori') }}" class="btn btn-default btn-sm">Kembali</a>
      </form>
    @endempty
  </div>
</div>
@endsection

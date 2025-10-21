@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('kategori') }}">
      @csrf
      <div class="form-group row">
        <label class="col-2 col-form-label">Kode Kategori</label>
        <div class="col-10">
          <input type="text" name="kategori_kode" class="form-control" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Nama Kategori</label>
        <div class="col-10">
          <input type="text" name="kategori_nama" class="form-control" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
      <a href="{{ url('kategori') }}" class="btn btn-default btn-sm">Kembali</a>
    </form>
  </div>
</div>
@endsection

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('level') }}">
      @csrf
      <div class="form-group row">
        <label class="col-2 col-form-label">Kode Level</label>
        <div class="col-10">
          <input type="text" name="level_kode" class="form-control" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Nama Level</label>
        <div class="col-10">
          <input type="text" name="level_nama" class="form-control" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
      <a href="{{ url('level') }}" class="btn btn-default btn-sm">Kembali</a>
    </form>
  </div>
</div>
@endsection

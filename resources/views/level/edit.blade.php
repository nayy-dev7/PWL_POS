@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
  </div>
  <div class="card-body">
    @empty($level)
      <div class="alert alert-danger">Data tidak ditemukan.</div>
      <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    @else
      <form method="POST" action="{{ url('/level/'.$level->level_id) }}">
        @csrf
        {!! method_field('PUT') !!}
        <div class="form-group row">
          <label class="col-2 col-form-label">Kode Level</label>
          <div class="col-10">
            <input type="text" name="level_kode" value="{{ old('level_kode', $level->level_kode) }}" class="form-control" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 col-form-label">Nama Level</label>
          <div class="col-10">
            <input type="text" name="level_nama" value="{{ old('level_nama', $level->level_nama) }}" class="form-control" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="{{ url('level') }}" class="btn btn-default btn-sm">Kembali</a>
      </form>
    @endempty
  </div>
</div>
@endsection

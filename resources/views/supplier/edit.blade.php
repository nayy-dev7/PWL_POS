@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
  </div>
  <div class="card-body">
    @empty($supplier)
      <div class="alert alert-danger">Data tidak ditemukan.</div>
      <a href="{{ url('supplier') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    @else
      <form method="POST" action="{{ url('/supplier/'.$supplier->supplier_id) }}">
        @csrf
        {!! method_field('PUT') !!}
        <div class="form-group row">
          <label class="col-2 col-form-label">Kode Supplier</label>
          <div class="col-10">
            <input type="text" name="supplier_kode" value="{{ old('supplier_kode', $supplier->supplier_kode) }}" class="form-control" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 col-form-label">Nama Supplier</label>
          <div class="col-10">
            <input type="text" name="supplier_nama" value="{{ old('supplier_nama', $supplier->supplier_nama) }}" class="form-control" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 col-form-label">Alamat</label>
          <div class="col-10">
            <textarea name="supplier_alamat" class="form-control" required>{{ old('supplier_alamat', $supplier->supplier_alamat) }}</textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="{{ url('supplier') }}" class="btn btn-default btn-sm">Kembali</a>
      </form>
    @endempty
  </div>
</div>
@endsection

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools">
      <a class="btn btn-sm btn-primary" href="{{ url('barang/create') }}">Tambah</a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kode</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Supplier</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
  $('#table_barang').DataTable({
    serverSide: true,
    ajax: {
      url: "{{ url('barang/list') }}",
      type: "POST",
      dataType: "json",
    },
    columns: [
      { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
      { data: "barang_kode" },
      { data: "barang_nama" },
      { data: "kategori" },
      { data: "supplier" },
      { data: "harga_beli" },
      { data: "harga_jual" },
      { data: "aksi", orderable: false, searchable: false }
    ]
  });
});
</script>
@endpush

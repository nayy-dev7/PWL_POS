@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools">
      <a class="btn btn-sm btn-primary" href="{{ url('kategori/create') }}">Tambah</a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kode Kategori</th>
          <th>Nama Kategori</th>
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
  $('#table_kategori').DataTable({
    serverSide: true,
    ajax: {
      url: "{{ url('kategori/list') }}",
      type: "POST",
      dataType: "json",
    },
    columns: [
      { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
      { data: "kategori_kode" },
      { data: "kategori_nama" },
      { data: "aksi", orderable: false, searchable: false }
    ]
  });
});
</script>
@endpush

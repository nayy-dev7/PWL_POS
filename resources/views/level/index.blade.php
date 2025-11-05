@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools">
      <a class="btn btn-sm btn-primary" href="{{ url('level/create') }}">Tambah</a>
      <button onclick="modalAction('{{ url('level/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kode Level</th>
          <th>Nama Level</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div id="modal-content"></div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    // klik tombol tambah
    $('#btn-tambah').on('click', function() {
        $('#myModal').modal('show');
        $('#modal-content').load("{{ url('/level/create_ajax') }}");
    });

    // klik tombol edit
    $('#table_Level').on('click', '.btn-edit', function() {
        var id = $(this).data('id');
        $('#myModal').modal('show');
        $('#modal-content').load("{{ url('/level') }}/" + id + "/edit_ajax");
    });

    // klik tombol hapus
    $('#table_Level').on('click', '.btn-hapus', function() {
        var id = $(this).data('id');
        $('#myModal').modal('show');
        $('#modal-content').load("{{ url('/level') }}/" + id + "/delete_ajax");
    });
});
</script>

<script>
$(document).ready(function() {
  $('#table_level').DataTable({
    serverSide: true,
    ajax: {
      url: "{{ url('level/list') }}",
      type: "POST",
      dataType: "json",
    },
    columns: [
      { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
      { data: "level_kode" },
      { data: "level_nama" },
      { data: "aksi", orderable: false, searchable: false }
    ]
  });
});
</script>
@endpush

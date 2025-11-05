@empty($level)
<div class="alert alert-danger">Data tidak ditemukan</div>
@else
<form action="{{ url('/level/' . $level->level_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Level</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Level</label>
                    <input type="text" name="level_kode" value="{{ $level->level_kode }}" class="form-control" required>
                    <small id="error-level_kode" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>Nama Level</label>
                    <input type="text" name="level_nama" value="{{ $level->level_nama }}" class="form-control" required>
                    <small id="error-level_nama" class="text-danger error-text"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>

@push('js')
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $("#form-edit").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res){
                if(res.status){
                    $('#myModal').modal('hide');
                    Swal.fire('Berhasil!', res.message, 'success');
                    dataLevel.ajax.reload();
                } else {
                    $('.error-text').text('');
                    $.each(res.msgField, function(prefix, val){
                        $('#error-' + prefix).text(val[0]);
                    });
                    Swal.fire('Gagal!', res.message, 'error');
                }
            },
            error: function(xhr){
                Swal.fire('Error ' + xhr.status, xhr.responseText, 'error');
            }
        });
    });
});
</script>
@endpush
@endempty

@empty($level)
<div class="alert alert-danger">Data tidak ditemukan</div>
@else
<form action="{{ url('/level/' . $level->level_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Hapus Data Level</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data <b>{{ $level->level_nama }}</b>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
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

    $("#form-delete").on('submit', function(e){
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

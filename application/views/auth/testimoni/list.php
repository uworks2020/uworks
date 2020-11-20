<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="" id="tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Testimoni </a></div>
            <div class="card-body" id="tabel-testimoni">
                Failed
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#tabel-testimoni').load(base_url + 'auth/testimoni/tabel');
});

$('a#tambah').on('click',function(e){
    e.preventDefault();

    $('#isi-modal').load(base_url + 'auth/testimoni/h_tambah');
    $('#modal').modal('show');
});
</script>
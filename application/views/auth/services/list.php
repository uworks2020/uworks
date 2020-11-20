<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="" id="tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Services</a>
            </div>
            <div class="card-body" id="isi-tabel">
                Failed
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('div#isi-tabel').load(base_url + 'auth/services/tabel');
    })

$('a#tambah').on('click',function(e){
    e.preventDefault();

    $('#isi-modal').load(base_url + 'auth/services/h_tambah');
    $('#modal').modal('show');
})

</script>
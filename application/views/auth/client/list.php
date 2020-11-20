<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-primary btn-sm" id="tambah-client"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
            </div>
            <div class="card-body" id="isi-table">
                Failed
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#isi-table').load(base_url + 'auth/client/tabel');
    });
    $('a#tambah-client').on('click', function(e) {
        e.preventDefault();
        $('div#isi-modal').load(base_url + 'auth/client/h_tambah');
        $('#modal').modal('show');
    });
   
</script>
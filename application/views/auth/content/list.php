<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <a href="#" id="tambahContent" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
            </div>
            <div class="card-body" id="tabel-content">
                Failed
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabel-content').load(base_url + 'auth/content/tabel_content');
    });

    $('#tambahContent').on('click', function(e) {
        e.preventDefault();


        $('#isi-modal').load(base_url + 'auth/content/h_tambah');
        $('#modal').modal('show')
    });
</script>
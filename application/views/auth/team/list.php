<div class="row">
    <!-- Basic Button -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <a href="#" id="tambahTeam" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah <?= $title ?></a>
            </div>
            <div class="card-body" id="tabel-team">
                Failed
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabel-team').load(base_url + 'auth/team/tabel_team');
       
    });

    $('#tambahTeam').on('click', function(e) {
        e.preventDefault();


        $('#isi-modal').load(base_url + 'auth/team/h_tambah');
        $('#modal').modal('show')
    });
</script>
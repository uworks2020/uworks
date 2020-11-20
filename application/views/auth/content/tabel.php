<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th width="15%">Nama</th>
                <th>Isi</th>
                <th width="5%">Icon</th>
                <th width="10%">Gambar</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($content as $content) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td> <?= $content->nama ?></td>
                    <td><?= $content->isi ?></td>
                    <td><i class="fa fa-<?= $content->icon ?>"></i> <?= $content->icon ?></td>
                    <td><img src="<?= base_url('assets/img/upload/content/thumbs/cropped/' . $content->gambar) ?>" value="<?= $content->id ?>" id="gambar" class=" img-fluid img-thumbnail" width="150px" alt=""></td>
                    <td>
                        <div class="btn-group">
                            <a href="#" id="edit" value="<?= $content->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                            <a href="#" id="hapus" value="<?= $content->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php
                $no++;
            } ?>
        </tbody>
    </table>
    <div class="alert alert-warning text-center mt-2"><small><i>Klik gambar untuk memperbarui gambar</i></small></div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    $('a#edit').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/content/h_edit/' + id);
        $('#modal').modal('show');
    });

    $('img#gambar').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/content/gambar/' + id)
        $('#modal').modal('show');
    });

    $('a#hapus').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url + 'auth/content/hapus/' + id,
                    type: 'post',
                    dataType: 'json',
                    success: function(data) {
                        if (data.respond == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                html: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#tabel-content').load(base_url + 'auth/content/tabel_content')
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                html: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            }
        })


    });
</script>
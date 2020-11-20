<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="1%">No.</th>
                <th width="10%">Nama</th>
                <th width="10%">Nama Lembaga</th>
                <th>Deskripsi</th>
                <th width="10%">Logo Lembaga</th>
                <th width="10%">Gambar</th>
                <th width="1%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($client as $client) { ?>
                <tr>
                    <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $client->nama ?>
                    </td>
                    <td>
                        <?= $client->lembaga ?>
                    </td>
                    <td>
                        <?= $client->deskripsi ?>
                    </td>
                    <td class="text-center">
                        <img id="logo" value="<?= $client->id ?>" src="<?= base_url('assets/img/upload/client/thumbs/cropped/' . $client->logo) ?>" alt="<?= $client->logo ?>" width="150px" class="img-thumbnail">
                    </td>
                    <td>
                        <img id="gambar" value="<?= $client->id ?>" src="<?= base_url('assets/img/upload/client/thumbs/cropped/' . $client->gambar) ?>" alt="<?= $client->gambar ?>" width="150px" class="img-thumbnail">
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="" value="<?= $client->id ?>" id="edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                            <a href="" value="<?= $client->id ?>" id="hapus" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
    $('table#dataTable').DataTable();

    $('a#hapus').on('click', function(e) {
        e.preventDefault();

        let id = $(this).attr('value');

        Swal.fire({
            title: 'Are you sure?',
            text: "Menghapus data client ini juga akan menghapus seluruh data testimoni dari client ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: base_url + 'auth/client/hapus',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);

                        Swal.fire({
                            icon: data.respond,
                            title: data.title,
                            html: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        if (data.respond == 'success') {
                            $('#isi-table').load(base_url + 'auth/client/tabel');
                        }
                    }
                });
            }
        });
    });

    $('a#edit').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/client/h_edit/' + id)
        $('#modal').modal('show');
    });

    $('img#logo').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/client/logo/' + id);
        $('#modal').modal('show');
    });

    $('img#gambar').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal-lg').load(base_url + 'auth/client/gambar/' + id);
        $('#modal-lg').modal('show');
    });
</script>
<div class="table-responsive">

    <table class="table table-bordered" id="table-testimoni" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Asal</th>
                <th>Testimoni</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($testimoni as $testimoni) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $testimoni->nama ?></td>
                    <td><?= $testimoni->lembaga ?></td>
                    <td><?= $testimoni->isi ?></td>
                    <td><img src="<?= base_url('assets/img/upload/testimoni/thumbs/cropped/' . $testimoni->foto) ?>" value="<?= $testimoni->id ?>" id="foto" class="img-fluid img-thumbnail" width="150px" alt=""></td>
                    <td>
                        <div class="btn-group">
                            <a href="" value="<?= $testimoni->id ?>" id="edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i> Edit</a>
                            <a href="" value="<?= $testimoni->id ?>" id="hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
    <div class="alert alert-warning text-center mt-2"><small><i>Klik gambar untuk memperbarui gambar</i></small></div>

</div>


<script>
    $('#table-testimoni').DataTable();

    $('img#foto').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/testimoni/foto/' + id)
        $('#modal').modal('show');
    })

    $('a#edit').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/testimoni/h_edit/' + id);
        $('#modal').modal('show');
    });

    $('a#hapus').on('click', function(e) {
        e.preventDefault()
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
                    url: base_url + 'auth/testimoni/hapus/' + id,
                    type: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data.respond == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                html: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#tabel-testimoni').load(base_url + 'auth/testimoni/tabel');
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




    })
</script>
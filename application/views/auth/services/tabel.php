<div class="table-responsive">
    <table class="table table-bordered" id="tabel-services" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Icon</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($services as $services) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><i class="fa fa-<?= $services->icon ?>"></i> <?= $services->icon ?></td>
                    <td><?= $services->judul ?></td>
                    <td><?= $services->deskripsi ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="" id="edit" value="<?= $services->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i> Edit</a>
                            <a href="" id="hapus" value="<?= $services->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tabel-services').DataTable();
    });

    $('a#edit').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');

        $('#isi-modal').load(base_url + 'auth/services/h_edit/' + id);
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
                    url: base_url + 'auth/services/hapus/' + id,
                    type: 'post',
                    dataType: 'json',
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
                            $('div#isi-tabel').load(base_url + 'auth/services/tabel');
                        }
                    }
                });
            }
        })




    })
</script>
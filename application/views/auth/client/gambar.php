<form action="" id="gambar-client">
    <div class="modal-body">
        <div class="row">
            <?php foreach ($gambar as $gambar) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                    <div class="card">

                        <img class="card-img-top" src="<?= base_url('assets/img/upload/client/thumbs/cropped/' . $gambar->file) ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <div class="btn-group">
                                <?php if ($gambar->file == $client->gambar) { ?>
                                    <a href="" class="btn btn-sm btn-secondary disabled"><i class="set fa fa-paper-plane"></i></a>
                                    <a href="" class="btn btn-sm btn-secondary disabled"><i class="fa fa-trash-alt"></i></a>
                                <?php } else { ?>
                                    <a href="" id="set" value="<?= $gambar->id ?>" class="btn btn-sm btn-primary"><i class="set fa fa-paper-plane"></i></a>
                                    <a href="" id="hapus" value="<?= $gambar->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <?= input_file('gambarclient') ?>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('a#set').on('click', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');
        let id_client = '<?= $client->id ?>';

        $.ajax({
            url: base_url + 'auth/gambar/set',
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
                id_client: id_client
            },
            success: function(data) {
                console.log(data);
                if (data.respond == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        html: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        html: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#isi-table').load(base_url + 'auth/client/tabel');
                    $('#isi-modal-lg').load(base_url + 'auth/client/gambar/' + id_client);
                }
            }
        })
    })

    $('a#hapus').on('click', function(e) {

        e.preventDefault();
        let id = $(this).attr('value');
        let id_client = '<?= $client->id ?>';


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
                    url: base_url + 'auth/gambar/hapus/' + id,
                    type: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data.respond == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                html: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                html: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#isi-modal-lg').load(base_url + 'auth/client/gambar/' + id_client);
                        }
                    }
                });
            }
        });



    })

    $('form#gambar-client').on('submit', function(e) {
        e.preventDefault();

        let id = '<?= $client->id ?>';
        let id_client = '<?= $client->id ?>';

        Swal.fire({
            title: 'Please Wait !',
            html: 'Data Uploading',
            showConfirmButton: false,
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        });
        $.ajax({
            url: base_url + 'auth/upload/gambarclient/' + id,
            type: 'post',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.respond == 'success') {
                    Swal.fire(
                        'Berhasil!',
                        data.message,
                        'success'
                    );
                    $('#isi-table').load(base_url + 'auth/client/tabel');
                    $('#isi-modal-lg').load(base_url + 'auth/client/gambar/' + id_client);
                } else if (data.respond == 'error') {
                    Swal.fire(
                        'Gagal!',
                        data.message,
                        'error'
                    )
                }
                console.log(data);

            }
        })
    })
</script>
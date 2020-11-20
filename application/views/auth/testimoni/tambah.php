<form action="" id="tambah">

    <div class="modal-body">

        <div class="form-group">
            <label for="client">
                <ion-icon name="business"></ion-icon> Client
            </label>
            <select name="client" class="form-control" id="client">

                <?php
                foreach ($client as $client) { ?>

                    <option class="form-control" value="<?= $client->id ?>"><?= $client->lembaga ?></option>

                <?php } ?>

            </select>
        </div>



        <?php
        echo input_text('nama', '', 'Nama Testimoni', 'person-circle-outline');
        echo input_textarea('isi', '', 'Isi Testimoni', 'chatbubble-ellipses-outline');
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Submit</button></div>

</form>

<script>
    $('textarea#isi').summernote();


    $('form#tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'auth/testimoni/p_tambah',
            type: 'post',
            dataType: 'json',
            data: {
                id_client: $('select#client').val(),
                nama: $('input#nama').val(),
                isi: $('textarea#isi').val(),
                foto: 'default.png'
            },
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
                    $('#modal').modal('hide');
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
        })

    })
</script>
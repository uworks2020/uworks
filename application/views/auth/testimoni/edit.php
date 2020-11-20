<form action="" id="edit">

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
        echo input_text('nama', $testimoni->nama, 'Nama Testimoni', 'person-circle-outline');
        echo input_textarea('isi', $testimoni->isi, 'Isi Testimoni', 'chatbubble-ellipses-outline');
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Submit</button></div>

</form>

<script>
    $(document).ready(function() {
        $('textarea#isi').summernote();
        $('select#client').val('<?= $testimoni->id_client ?>');
    })


    $('form#edit').on('submit', function(e) {
        e.preventDefault();
        let id = '<?= $testimoni->id ?>';
        $.ajax({
            url: base_url + 'auth/testimoni/p_edit/' + id,
            type: 'post',
            dataType: 'json',
            data: {
                id_client: $('select#client').val(),
                nama: $('input#nama').val(),
                isi: $('textarea#isi').val()
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
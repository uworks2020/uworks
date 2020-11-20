<form action="" id="edit">
    <div class="modal-body">
        <?php
        echo input_text('nama', $client->nama, 'Nama Web', 'card');
        echo input_text('lembaga', $client->lembaga, 'Lembaga', 'business');
        echo input_textarea('deskripsi', $client->deskripsi, 'Deskripsi', 'bookmarks');
        ?>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $('textarea#deskripsi').summernote();

    $('form#edit').on('submit', function(e) {
        e.preventDefault();
        let id = '<?= $client->id ?>'
        $.ajax({
            url: base_url + 'auth/client/p_edit/' + id,
            type: 'post',
            dataType: 'json',
            data: {
                nama: $('input#nama').val(),
                lembaga: $('input#lembaga').val(),
                deskripsi: $('textarea#deskripsi').val()
            },
            success: function(data) {
                console.log(data);
                if (data.respond == 'error') {
                    Swal.fire({
                        title: 'Gagal!',
                        icon: 'error',
                        html: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        html: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#isi-table').load(base_url + 'auth/client/tabel');
                    $('#modal').modal('hide');
                }
            }
        })
    });
</script>
<form action="" id="tambah">
    <div class="modal-body">
        <?php
        echo input_text('nama', '', 'Nama Web', 'card');
        echo input_text('lembaga', '', 'Lembaga', 'business');
        echo input_textarea('deskripsi', '', 'Deskripsi', 'bookmarks');
        ?>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('textarea#deskripsi').summernote();
    });

    $('form#tambah').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + 'auth/client/p_tambah',
            type: 'post',
            dataType: 'json',
            data: {
                nama: $('input#nama').val(),
                lembaga: $('input#lembaga').val(),
                deskripsi: $('textarea#deskripsi').val(),
                logo: 'default.png',
                gambar: 'default.png'
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
                    $('#modal').modal('hide');
                }
            }
        })
    });
</script>
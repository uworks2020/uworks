<form action="" id="edit">

    <div class="modal-body">
    <?= input_text('nama',$konten->nama,'Nama Content','trail-sign') ?>
        <?= input_text('icon',$konten->icon,'Icon Content','ellipse') ?>
        <?= input_text('isi',$konten->isi,'Isi Content','chatbubble-ellipses') ?>
    </div>
    <div class="modal-footer">
        <a href="#" id="close" class="btn btn-secondary"><i class="fa fa-times"></i> Close</a>
        <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $('#isi').summernote();

    $('a#close').on('click', function(e) {
        e.preventDefault();
        $('#modal').modal('hide');
    })

    $('form#edit').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + 'auth/content/p_edit',
            type: 'post',
            dataType: 'json',
            data: {
                id: '<?= $konten->id ?>',
                icon: $('input#icon').val(),
                nama: $('input#nama').val(),
                isi: $('textarea#isi').val(),
                gambar: 'default.png'
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
        })
    });
</script>
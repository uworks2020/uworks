<form action="" id="tambah">
    <div class="modal-body">
        <?php
        echo input_text('icon', '', 'Icon Services', 'leaf');
        echo input_text('judul', '', 'Judul Services', 'filter');
        echo input_textarea('deskripsi', '', 'Deskripsi Services', 'document-text');
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('textarea#deskripsi').summernote();
    })

    $('form#tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'auth/services/p_tambah',
            type: 'post',
            dataType: 'json',
            data: {
                icon: $('input#icon').val(),
                judul: $('input#judul').val(),
                deskripsi: $('textarea#deskripsi').val()
            },
            success: function(data) {
                console.log(data);
                if (data.respond == 'success') {
                    Swal.fire({
                        icon: data.respond,
                        title: data.title,
                        html: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('div#isi-tabel').load(base_url + 'auth/services/tabel');
                    $('#modal').modal('hide');

                } else {
                    Swal.fire({
                        icon: data.respond,
                        title: data.title,
                        html: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }

            }
        })
    })
</script>
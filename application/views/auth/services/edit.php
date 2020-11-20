<form action="" id="edit">
    <div class="modal-body">
        <?php
        echo input_text('icon', $services->icon, 'Icon Services', 'leaf');
        echo input_text('judul', $services->judul, 'Judul Services', 'filter');
        echo input_textarea('deskripsi', $services->deskripsi, 'Deskripsi Services', 'document-text');
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('textarea#deskripsi').summernote();
    });

    $('form#edit').on('submit', function(e) {
        e.preventDefault();
        let id = '<?= $services->id ?>';
        $.ajax({
            url: base_url + 'auth/services/p_edit/' + id,
            type: 'post',
            dataType: 'json',
            data: {
                icon: $('input#icon').val(),
                judul: $('input#judul').val(),
                deskripsi: $('textarea#deskripsi').val()
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
                    $('div#isi-tabel').load(base_url + 'auth/services/tabel');
                    $('#modal').modal('hide');

                }

            }
        })
    })
</script>
<form action="" id="formfoto">

    <div class="modal-body">
        <div class="form-group">
            <img src="<?= base_url('assets/img/upload/testimoni/thumbs/cropped/' . $testimoni->foto) ?>" alt="" class="img-fluid img-thumbnail" width="100%">
        </div>
        <?= input_file('foto') ?>
    </div>

    <div class="modal-footer">

        <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>

</form>

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('form#formfoto').on('submit', function(e) {
        e.preventDefault();
        let id = '<?= $testimoni->id ?>';

        if ($('input#foto').val() == '') {
            Swal.fire(
                'Gagal!',
                'Pilih file terlebih dahulu',
                'error'
            );
        } else {
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
                url: base_url + 'auth/upload/testimoni/' + id,
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
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
                        $('#modal').modal('hide');
                        $('#tabel-testimoni').load(base_url + 'auth/testimoni/tabel');
                    }

                }
            })
        }

    })
</script>
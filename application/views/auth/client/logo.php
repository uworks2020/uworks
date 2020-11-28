<form action="" id="logo-client">
    <div class="modal-body">
        <div class="form-group">
            <img src="<?= base_url('assets/img/upload/client/thumbs/cropped/' . $client->logo) ?>" alt="" class="img-fluid img-thumbnail" width="100%">
        </div>
        <?= input_file('logoclient') ?>
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

    $('form#logo-client').on('submit', function(e) {
        e.preventDefault();

        let id = '<?= $client->id ?>';

        Swal.fire({
            title: 'Please Wait !',
            html: 'Data ploading',
            showConfirmButton: false,
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        });
        $.ajax({
            url: base_url + 'auth/upload/logoclient/' + id,
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
                    $('#modal').modal('hide');
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
<form action="" id="upload">


    <div class="modal-body">
        <div class="form-group">
            <img src="<?= base_url('assets/img/upload/content/thumbs/cropped/' . $konten->gambar) ?>" alt="" class="img-fluid img-thumbnail" width="100%">
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="gambar" name="gambar">
            <label class="custom-file-label" for="gambar">Choose file</label>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" id="close" class="btn btn-secondary"><i class="fa fa-times"></i> Close</a>
        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</a>
    </div>
</form>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('a#close').on('click', function(e) {
        e.preventDefault();
        $('#modal').modal('hide');
    });

    $('form#upload').on('submit', function(e) {
        e.preventDefault();
        let id = '<?= $konten->id ?>';

        if ($('input#gambar').val() == '') {
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
                url: base_url + 'auth/upload/content/' + id,
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
                        $('#modal').modal('hide')
                        $('#tabel-content').load(base_url + 'auth/content/tabel_content');
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
        }
    });
</script>
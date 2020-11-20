<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <?= form_open('formkonfigurasi'); ?>
            <div class="card-header">
                <ion-icon name="globe-outline"></ion-icon> Konfigurasi Website
            </div>
            <div class="card-body">
                <?php
                echo input_text('namaweb', $site->namaweb, 'Nama WEB', 'globe');
                echo input_text('tagline', $site->tagline, 'Tagline', 'information-circle');
                echo input_text('email', $site->email, 'Email', 'mail');
                echo input_text('telp', $site->telp, 'Telepon', 'call');
                echo input_text('wa', $site->wa, 'Whatsapp', 'logo-whatsapp');
                echo input_text('ig', $site->ig, 'Instagram', 'logo-instagram');
                echo input_text('fb', $site->fb, 'Whatsapp', 'logo-facebook');
                ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Perbarui</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4">
            <?= form_open('formlogo'); ?>
            <div class="card-header">
                <ion-icon name="image-outline"></ion-icon> Logo Website
            </div>
            <div class="card-body">
                <div class="form-group text-center">
                    <img src="<?= base_url('assets/img/upload/config/' . $site->logo) ?>" alt="" class="img-thumbnail img-fluid logo">
                </div>
                <?php
                echo input_file('logo');
                ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Perbarui</button>
            </div>
            <?= form_close(); ?>
        </div>
        <div class="card mb-4">
            <?= form_open('formicon'); ?>
            <div class="card-header">
                <ion-icon name="globe-outline"></ion-icon> Icon Website
            </div>
            <div class="card-body">
                <div class="form-group text-center">
                    <img src="<?= base_url('assets/img/upload/config/' . $site->icon) ?>" alt="" class="img-thumbnail img-fluid icon">
                </div>
                <?php
                echo input_file('icon');
                ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Perbarui</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('form#formkonfigurasi').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: base_url + 'auth/site/update_config',
            type: 'post',
            dataType: 'json',
            data: {
                namaweb: $('input#namaweb').val(),
                tagline: $('input#tagline').val(),
                email: $('input#email').val(),
                telp: $('input#telp').val(),
                wa: $('input#wa').val(),
                ig: $('input#ig').val(),
                fb: $('input#fb').val()
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

    $('form#formlogo').on('submit', function(e) {
        e.preventDefault();

        if ($('input#logo').val() == '') {
            Swal.fire(
                'Gagal!',
                'Pilih file terlebih dahulu',
                'error'
            );
        } else {
            $.ajax({
                url: base_url + 'auth/upload/logo',
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
                        $("img.logo").attr("src", base_url + 'assets/img/upload/config/' + data.file);
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

    $('form#formicon').on('submit', function(e) {
        e.preventDefault();

        if ($('input#iconW').val() == '') {
            Swal.fire(
                'Gagal!',
                'Pilih file terlebih dahulu',
                'error'
            );
        } else {
            $.ajax({
                url: base_url + 'auth/upload/icon',
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
                        $("img.icon").attr("src", base_url + 'assets/img/upload/config/' + data.file);
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
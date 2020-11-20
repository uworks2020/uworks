<form action="" id="tambah">
    <div class="modal-body">
    <?php
        echo input_text('nama', '', 'Nama', 'person-circle');
        echo input_text('tugas', '', 'Tugas', 'briefcase');
        echo input_text('email', '', 'Email', 'mail');
        echo input_text('telp', '', 'Nomor Telepon', 'call');
        echo input_text('ig', '', 'Instagram', 'logo-instagram');
        echo input_text('wa', '', 'Whatsapp', 'logo-whatsapp');
        ?>
    </div>
    <div class="modal-footer">
        <a href="#" id="close" class="btn btn-secondary"><i class="fa fa-times"></i> Close</a>
        <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
    </div>
</form>

<script>
    $('a#close').on('click', function(e) {
        e.preventDefault();
        $('#modal').modal('hide');
    });

    $('form#tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'auth/team/p_tambah',
            type: 'post',
            dataType: 'json',
            data: {
                nama: $('input#nama').val(),
                tugas: $('input#tugas').val(),
                email: $('input#email').val(),
                telp: $('input#telp').val(),
                ig: $('input#ig').val(),
                wa: $('input#wa').val(),
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
                    $('#tabel-team').load(base_url + 'auth/team/tabel_team')
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
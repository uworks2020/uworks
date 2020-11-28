<?php

function content_open($title)
{
    return '
    <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
    ';
}

function content_close()
{
    return '
    </div>
    </div>
    </div>
    ';
}


function form_open($nama)
{
    return '
    <form action="" method="post" id="'.$nama.'" name="'.$nama.'" accept-charset="utf-8">
    ';
}

function input_text($nama = '', $value = '', $label = '', $icon = '')
{
    return '
    <div class="form-group">
    <label for="' . $nama . '"><ion-icon name="' . $icon . '"></ion-icon> ' . $label . '</label>
    <input type="text" class="form-control" id="' . $nama . '" name="' . $nama . '" autocomplete="off" value="' . $value . '">
    </div>
    ';
}

function input_textarea($nama = '', $value = '', $label = '', $icon = '')
{
    return '
    <div class="form-group">
    <label for="' . $nama . '"><ion-icon name="' . $icon . '"></ion-icon> ' . $label . '</label>
    <textarea name="' . $nama . '" id="' . $nama . '" cols="30" rows="10">' . $value . '</textarea>
    </div>
    ';
}

function input_file($nama = '')
{
    return '
    <div class="form-group">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="' . $nama . '" name="' . $nama . '">
    <label class="custom-file-label" for="' . $nama . '">Choose file</label>
    </div>
    </div>
    ';
}

function input_file_script()
{
    return '
    <script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
    ';
}


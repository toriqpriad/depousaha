<script>
    var url = '<?php echo ADMIN_WEBAPP_URL; ?>';
    function setpassword() {
        var pass = $('#password').val();
        $('#new_password').val(pass);
    }

    function Add() {

        var judul = $('#judul').val();        
        var isi = CKEDITOR.instances.isi.getData();        
        //        GAMBAR        
        var thumb = $('#thumb').prop('files')[0];

        var input = new FormData();
        input.append('judul', judul);        
        input.append('isi', isi);
        input.append('thumb', thumb);

        $.ajax({
            url: url + 'artikel/add_submit',
            method: 'POST',
            data: input,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.response == 'OK') {
                    $.notify({
                        message: '<i class="mdi mdi-check-all"></i> ' + response.message,
                    }, {type: 'success'})
                    setTimeout(function ()
                    {
                        window.location.href = response.data.link;
                    }, 1000);
                } else {
                    $.notify({
                        message: '<i class="mdi mdi-close"></i> ' + response.message,
                    }, {type: 'danger'})
                }
            }
        });
    }


    function Put() {
        var id = $('#artikel_id').val();
        var key = $('#key').val();
        var judul = $('#judul').val();
        var isi = CKEDITOR.instances.isi.getData();
        //        GAMBAR
        var old_thumb = $('#old_gambar').val();
        var old_thumb2 = $('#old_gambar2').val();
        if (old_thumb == "") {
            var thumb = $('#thumb').prop('files')[0];
        } else {
            var thumb = "";
        }

        var input = new FormData();
        input.append('id', id);
        input.append('key', key);
        input.append('judul', judul);
        input.append('isi', isi);
        input.append('thumb', thumb);
        input.append('old_thumb', old_thumb2);        

        //        GAMBAR        
//        var gambar_old =


        $.ajax({
            url: url + 'artikel/update_submit',
            method: 'POST',
            data: input,
            dataType: 'json',
//            contentType: 'application/json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.response == 'OK') {
                    console.log(response);
                    $.notify({
                        message: '<i class="mdi mdi-check-all"></i> ' + response.message,
                    }, {type: 'success'})
                    setTimeout(function ()
                    {
                        window.location.href = response.data.link;
                    }, 1000);
                } else {
                    $.notify({
                        message: '<i class="mdi mdi-close"></i> ' + response.message,
                    }, {type: 'danger'})
                }
            }
        });
    }

    function Delete(id) {
        $('#deleteModal').modal('show');
        $('#id').val(id);


    }

    function DeleteProcess() {
        var id = $('#id').val();
        $.ajax({
            url: url + 'artikel/delete/' + id,
            method: 'GET',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.response == 'OK') {
                    $('#deleteModal').modal('hide');
                    $.notify({
                        message: '<i class="mdi mdi-check-all"></i> ' + response.message,
                    }, {type: 'success'})
                    setTimeout(function ()
                    {
                        location.reload();
                    }, 1000);
                } else {
                    $.notify({
                        message: '<i class="mdi mdi-close"></i> ' + response.message,
                    }, {type: 'danger'})
                }
            }
        });
    }

</script>
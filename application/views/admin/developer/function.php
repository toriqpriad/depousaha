<script>
    var url = '<?php echo ADMIN_WEBAPP_URL; ?>';

    
    
    function Add() {

        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var deskripsi = $('#deskripsi').val();
        //        GAMBAR        
        var image = $('#image').prop('files')[0];

        var input = new FormData();
        input.append('nama', nama);
        input.append('alamat', alamat);
        input.append('deskripsi', deskripsi);
        input.append('image', image);        
        $.ajax({
            url: url + 'developer/add_submit',
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
        var id = $('#dev_id').val();
        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var deskripsi = $('#deskripsi').val();
        //        GAMBAR
        var old_thumb = $('#old_gambar').val();
        var old_thumb2 = $('#old_gambar2').val();
        if (old_thumb == "") {
            if ($('#image').prop('files')[0] != "") {
                var image = $('#image').prop('files')[0];
            } else {
                var image = "";
            }

        } else {
            var image = "";
        }

        var input = new FormData();
        input.append('id', id);
        input.append('nama', nama);
        input.append('alamat', alamat);
        input.append('deskripsi', deskripsi);
        input.append('image', image);
        input.append('old_image', old_thumb2);

        //        GAMBAR        
//        var gambar_old =


        $.ajax({
            url: url + 'developer/update_submit',
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

    function Delete(id) {
        $('#deleteModal').modal('show');
        $('#id').val(id);


    }

    function DeleteProcess() {
        var id = $('#id').val();
        $.ajax({
            url: url + 'developer/delete/' + id,
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
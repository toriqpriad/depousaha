<script>
    var url = '<?php echo ADMIN_WEBAPP_URL; ?>';

    function changePasswordModal() {
        $('#changePasswordModal').modal('show');
    }

    function ChangePasswordProcess() {
        var last_password = $.md5($('#last_password').val());
        var new_password = $.md5($('#new_password').val());
        var input = {"last_password": last_password, "new_password": new_password};
        $.ajax({
            url: url + 'setting/update_account_password',
            method: 'POST',
            data: JSON.stringify(input),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.response == 'OK') {
                    $('#changePasswordModal').modal('hide');
                    $.notify({
                        message: '<i class="mdi mdi-check-all"></i> ' + response.message,
                    }, {type: 'success'})
                    setTimeout(function ()
                    {
                        window.location.href = response.data.link;
                    }, 1000);
                } else {
                    $('#last_password').val("");
                    $('#new_password').val("")
                    alert(response.message);
                }
            }
        });
    }

    function PutAccount() {

        var input = {"email": $('#email').val()};

        $.ajax({
            url: url + 'setting/update_account_email',
            method: 'POST',
            data: JSON.stringify(input),
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


    function Put() {
        var id = $("#web_id").val();
        var name = $("#name").val();
        var address = $("#address").val();
        var contact = $("#contact").val();
        var city = $("#city").val();
        var moto = $("#moto").val();
        var description = $("#description").val();
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
        input.append('name', name);
        input.append('address', address);
        input.append('contact', contact);
        input.append('description', description);
        input.append('city', city);
        input.append('moto', moto);
        input.append('logo', image);
        input.append('old_logo', old_thumb2);

        //        GAMBAR        
//        var gambar_old =

//        console.log(JSON.stringify(input));
        $.ajax({
            url: url + 'setting/update_website',
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

</script>
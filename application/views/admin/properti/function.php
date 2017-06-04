<script>
    var url = '<?php echo ADMIN_WEBAPP_URL; ?>';
    function setpassword() {
        var pass = $('#password').val();
        $('#new_password').val(pass);
    }

    function Add() {

        var judul = $('#judul').val();
        var deskripsi = CKEDITOR.instances.deskripsi.getData();
        var alamat = $('#alamat').val();
        var kat_properti = $('#kat_properti').val();
        var jenis_properti = $('#jenis_properti').val();
        var sertifikat = $('#sertifikat').val();
        var luas_tanah = $('#luas_tanah').val();
        var luas_bangunan = $('#luas_bangunan').val();
        var kamar_tidur = $('#kamar_tidur').val();
        var kamar_mandi = $('#kamar_mandi').val();
        var video_url = $('#video_url').val();
        var harga = $('#harga').val();

        //        GAMBAR
        var gambar1 = $('#gambar1').prop('files')[0];
        var gambar2 = $('#gambar2').prop('files')[0];
        var gambar3 = $('#gambar3').prop('files')[0];
        var gambar4 = $('#gambar4').prop('files')[0];


        var input = new FormData();
        input.append('judul', judul);
        input.append('deskripsi', deskripsi);
        input.append('alamat', alamat);
        input.append('kat_properti', kat_properti);
        input.append('jenis_properti', jenis_properti);
        input.append('sertifikat', sertifikat);
        input.append('luas_tanah', luas_tanah);
        input.append('luas_bangunan', luas_bangunan);
        input.append('kamar_tidur', kamar_tidur);
        input.append('kamar_mandi', kamar_mandi);
        input.append('video_url', video_url);
        input.append('harga', harga);
        input.append('gambar1', gambar1);
        input.append('gambar2', gambar2);
        input.append('gambar3', gambar3);
        input.append('gambar4', gambar4);
//        input.append('old_to_delete', old_delete);


        $.ajax({
            url: url + 'properti/add_submit',
            method: 'POST',
            data: input,
            dataType: 'json',
//            contentType: 'application/json',
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

    function removeDuplicate(list) {

        var result = [];
        $.each(list, function (i, e) {
            if ($.inArray(e, result) == -1)
                result.push(e);
        });
        return result;
    }
    function Put() {
        var id = $('#properti_id').val();
        var judul = $('#judul').val();
        var key = $('#key').val();        
        var deskripsi = CKEDITOR.instances.deskripsi.getData();
//        console.log();
        var alamat = $('#alamat').val();
        var kat_properti = $('#kat_properti').val();
        var jenis_properti = $('#jenis_properti').val();
        var sertifikat = $('#sertifikat').val();
        var luas_tanah = $('#luas_tanah').val();
        var luas_bangunan = $('#luas_bangunan').val();
        var kamar_tidur = $('#kamar_tidur').val();
        var kamar_mandi = $('#kamar_mandi').val();
        var video_url = $('#video_url').val();
        var harga = $('#harga').val();

        var old_gambar_1 = $('#old_gambar_1').val();
        var old_gambar_2 = $('#old_gambar_2').val();
        var old_gambar_3 = $('#old_gambar_3').val();
        var old_gambar_4 = $('#old_gambar_4').val();

        var old_gambar_back_1 = $('#old_gambar_back_1').val();
        var old_gambar_back_2 = $('#old_gambar_back_2').val();
        var old_gambar_back_3 = $('#old_gambar_back_3').val();
        var old_gambar_back_4 = $('#old_gambar_back_4').val();
        var old_delete = [];
        if (old_gambar_1 == "") {
            if ($('#gambar1').prop('files')[0] != "") {
                var gambar1 = $('#gambar1').prop('files')[0];
                old_delete.push(old_gambar_back_1);
            } else {
                var gambar1 = "";
            }

        } else {
            var gambar1 = old_gambar_1;
        }

        if (old_gambar_2 == "") {
            if ($('#gambar2').prop('files')[0] != "") {
                var gambar2 = $('#gambar2').prop('files')[0];
                old_delete.push(old_gambar_back_2);
            } else {
                var gambar2 = "";
            }

        } else {
            var gambar2 = old_gambar_2;
        }

        if (old_gambar_3 == "") {
            if ($('#gambar3').prop('files')[0] != "") {
                var gambar3 = $('#gambar3').prop('files')[0];
                old_delete.push(old_gambar_back_3);
            } else {
                var gambar3 = "";
            }

        } else {
            var gambar3 = old_gambar_3;
        }

        if (old_gambar_4 == "") {
            if ($('#gambar4').prop('files')[0] != "") {
                var gambar4 = $('#gambar4').prop('files')[0];
                old_delete.push(old_gambar_back_4);
            } else {
                var gambar4 = "";
            }
        } else {
            var gambar4 = old_gambar_4;
        }

        $('.old').each(function () {
            old_delete.push($(this).val());
        })

        var old_delete = removeDuplicate(old_delete);
        
        var input = new FormData();
        input.append('id', id);
        input.append('key', key);
        input.append('judul', judul);
        input.append('deskripsi', deskripsi);
        input.append('alamat', alamat);
        input.append('kat_properti', kat_properti);
        input.append('jenis_properti', jenis_properti);
        input.append('sertifikat', sertifikat);
        input.append('luas_tanah', luas_tanah);
        input.append('luas_bangunan', luas_bangunan);
        input.append('kamar_tidur', kamar_tidur);
        input.append('kamar_mandi', kamar_mandi);
        input.append('video_url', video_url);
        input.append('harga', harga);
        input.append('gambar1', gambar1);
        input.append('gambar2', gambar2);
        input.append('gambar3', gambar3);
        input.append('gambar4', gambar4);
        input.append('old_to_delete', JSON.stringify(old_delete));


        $.ajax({
            url: url + 'properti/update_submit',
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
//                        window.location.href = response.data.link;
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
            url: url + 'properti/delete/' + id,
            method: 'GET',
            dataType: 'json',
//            contentType: 'application/json',
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
<script>
    var url = '<?= site_url(); ?>';
    function login() {
        var person = {
            username: $("#username").val(),
            password: $.md5($("#password").val()),
        }
        $.ajax({
            url: url + 'admin_submit_login',
            method: 'post',
            data: JSON.stringify(person),
            dataType: 'json',
            success: function (response) {
                if (response.response == 'OK') {
                    if (response.data == 'A') {
                        $.notify({
                            message: '<i class="mdi mdi-check-all"></i> ' + response.message,
                        }, {type: 'success'})
                        setTimeout(function ()
                        {
                            window.location.href = "<?= site_url(); ?>admin";
                        }, 1000);
                    }
                } else {
                    $.notify({
                        message: '<i class="mdi mdi-close"></i> ' + response.message,
                    }, {type: 'warning'})
                }
            }
        });
    }
 
 
</script>


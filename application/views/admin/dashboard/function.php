<script>
    var url = '<?= ADMIN_WEBAPP_URL; ?>';

    function logoutModal() {
        $('#logoutModal').modal('show');
    }

    function logoutProcess() {
        $.ajax({
            url: url + 'logout',
            method: 'GET',
            success: function (response) {
                setTimeout(function ()
                {
                    window.location.href = "<?= site_url(); ?>admin/login";
                }, 1000);
            }
        });
    }   
   
</script>


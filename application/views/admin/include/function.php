<script>
    var url = '<?= ADMIN_WEBAPP_URL; ?>';

    function logoutModal() {
        $('#logoutModal').modal('show');
    }

    function logoutProcess() {
      var post_url = 'logout';
      $('#logoutModal').modal('hide');
      ServerPost(post_url,'',true);
    }

</script>

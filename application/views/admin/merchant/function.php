<script>
    var url = '<?= ADMIN_WEBAPP_URL; ?>';

    function Add() {
            var name = $('#name').val();
            var owner = $('#owner').val();
            var contact = $('#contact').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var logo = $('#logo').prop('files')[0];
            var cover = $('#cover').prop('files')[0];
            var input = new FormData();
            input.append('name', name);
            input.append('owner', owner);
            input.append('contact', contact);
            input.append('email', email);
            input.append('address', address);
            input.append('logo', logo);
            input.append('cover', cover);
            var post_url = url + 'merchant/post';
            ServerPost(post_url,input);
          }

</script>

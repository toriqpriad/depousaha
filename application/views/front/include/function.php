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
        window.location.href = response.data.link;
      }, 1000);
    }
  });
}

function register() {
  var name = $('#name').val();
  var owner = $('#owner').val();
  var contact = $('#contact').val();
  var email = $('#email').val();
  var captcha = $('#captcha').val();
  var captcha_word = $('#captcha_word').val();
  if(captcha != captcha_word){
    $.notify(
      {
        message: '<i class="fa fa-genderless"></i> Karakter captcha tidak sesuai'},
        {
          type: 'danger',
          placement: { from: "bottom", align: "right"},
        })
        $('#captcha').val('');
      } else {
        var input = new FormData();
        input.append('name', name);
        input.append('owner', owner);
        input.append('contact', contact);
        input.append('email', email);
        input.append('captcha', captcha);
        input.append('captcha_word', captcha_word);
        var post_url = "merchant/register_submit";
        ServerPost(post_url,input,true);
      }
    }

    </script>

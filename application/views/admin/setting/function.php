<script>

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var username = $('#username').val();
  var moto = $('#moto').val();
  var desc = $('#desc').val();
  var addr = $('#addr').val();
  var contact = $('#contact').val();
  var email = $('#email').val();
  var logo_old = $('#logo_old').val();
  var logo_new = $('#logo').prop('files')[0];
  var input = new FormData();
  var socmed_data = [];
  $(".social-media").each(function() {
    var socmed_value = {"sc_id":  $(this).attr('id'), "sc_value" : $(this).val()};
    socmed_data.push(socmed_value);
  });

  input.append('id', id);
  input.append('name', name);
  input.append('username', username);
  input.append('moto', moto);
  input.append('desc', desc);
  input.append('addr', addr);
  input.append('contact', contact);
  input.append('email', email);
  input.append('socmed_data', JSON.stringify(socmed_data));
  input.append('logo_new', logo_new);
  input.append('logo_old', logo_old);
  var post_url = 'setting/update';
  ServerPost(post_url,input,true);
}

function showPassword(link){
  $('#PasswordModal').modal(
    { backdrop: false}
  );
}

function ChangePass(){
  var input = new FormData();
  var old_pass = $.md5($('#old_pass').val());
  var new_pass = $.md5($('#new_pass').val());
  var input = new FormData();
  input.append('old_pass', old_pass);
  input.append('new_pass', new_pass);
  var post_url = 'setting/change_password';
  ServerPost(post_url,input);

}

</script>

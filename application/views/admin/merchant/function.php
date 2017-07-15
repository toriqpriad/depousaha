<script>


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
  var post_url = 'merchant/post';
  ServerPost(post_url,input,true);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var owner = $('#owner').val();
  var contact = $('#contact').val();
  var email = $('#email').val();
  var address = $('#address').val();
  var desc = $('#desc').val();
  var status = $('#set_active').val();
  var old_logo = $('#logo_old').val();
  var new_logo = $('#logo_new').val();
  var new_cover = $('#cover_new').val();
  var old_cover = $('#cover_old').val();

  if (new_logo != undefined) {
    var logo = $('#logo').prop('files')[0];
  } else {
    var logo = 'old';
  }

  if (new_cover != undefined) {
    var cover = $('#cover').prop('files')[0];
  } else {
    var cover = 'old';
  }

  var socmed_data = [];
  $(".social-media").each(function() {
    var socmed_value = {"sc_id":  $(this).attr('id'), "sc_value" : $(this).val()};
    socmed_data.push(socmed_value);
  });

  var input = new FormData();
  input.append('id', id);
  input.append('name', name);
  input.append('owner', owner);
  input.append('contact', contact);
  input.append('email', email);
  input.append('address', address);
  input.append('desc', desc);
  input.append('status', status);
  input.append('logo', logo);
  input.append('cover', cover);
  input.append('old_logo', old_logo);
  input.append('old_cover', old_cover);
  input.append('socmed_data', JSON.stringify(socmed_data));
  var post_url = 'merchant/update';
  ServerPost(post_url,input,true);
}

function DeleteModal(link){
  $('#deleteModal').modal(
    { backdrop: false}
  );
  $('#del_id').val(link);
}

function Delete(){
  var input = new FormData();
  input.append('link', $('#del_id').val());
  var delete_url = 'merchant/delete';
  var do_delete = ServerPost(delete_url,input);
  if(do_delete){
    table.ajax.reload();
  }

}

</script>

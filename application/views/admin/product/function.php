<script>


function Add() {
  var name = $('#name').val();
  var merchant = $('#merchant_option').val();
  var pc = $('#pc_option').val();
  var dimension = $('#dimension').val();
  var price = $('#price').val();
  var desc = $('#desc').val();
  var utama = $('#utama').prop('files')[0];
  var image_1 = $('#image_1').prop('files')[0];
  var image_2 = $('#image_2').prop('files')[0];
  var image_3 = $('#image_3').prop('files')[0];
  var image_4 = $('#image_4').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('merchant', merchant);
  input.append('pc', pc);
  input.append('desc', desc);
  input.append('dim', dimension);
  input.append('price', price);
  input.append('utama', utama);
  input.append('image_1', image_1);
  input.append('image_2', image_2);
  input.append('image_3', image_3);
  input.append('image_4', image_4);
  var post_url = 'product/post';
  ServerPost(post_url,input);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var owner = $('#owner').val();
  var contact = $('#contact').val();
  var email = $('#email').val();
  var address = $('#address').val();
  var desc = $('#desc').val();
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
  var input = new FormData();
  input.append('id', id);
  input.append('name', name);
  input.append('owner', owner);
  input.append('contact', contact);
  input.append('email', email);
  input.append('address', address);
  input.append('desc', desc);
  input.append('logo', logo);
  input.append('cover', cover);
  input.append('old_logo', old_logo);
  input.append('old_cover', old_cover);
  var post_url = 'merchant/update';
  ServerPost(post_url,input);
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
  ServerPost(delete_url,input);
  setInterval( function () {
    table.ajax.reload();
}, 2000 );
}

</script>

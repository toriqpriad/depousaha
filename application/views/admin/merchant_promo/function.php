<script>


function Add() {
  var name = $('#name').val();
  var desc = $('#desc').val();
  var merchant_id = $('#merchant_option').val();
  var url = $('#url').val();
  var img = $('#img').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('merchant_id', merchant_id);
  input.append('desc', desc);
  input.append('url', url);
  input.append('img', img);
  var post_url = 'merchant_promo/post';
  ServerPost(post_url,input,true);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var desc = $('#desc').val();
  var merchant_id = $('#merchant_option').val();
  var merchant_last_id = $('#merchant_old_id').val();
  var url = $('#url').val();
  var image_old = $('#image_old').val();
  var image_new = $('#img').prop('files')[0];
  var input = new FormData();
  input.append('id', id);
  input.append('name', name);
  input.append('merchant_id', merchant_id);
  input.append('merchant_last_id', merchant_last_id);
  input.append('desc', desc);
  input.append('url', url);
  input.append('image_new', image_new);
  input.append('image_old', image_old);
  var post_url = 'merchant_promo/update';
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
  input.append('id', $('#del_id').val());
  var delete_url = 'product_category/delete';
  ServerPost(delete_url,input);
  table.ajax.reload();

}

</script>

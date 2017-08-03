<script>


function Add() {
  var name = $('#name').val();
  var comment = $('#comment').val();
  var image = $('#image').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('comment', comment);
  input.append('image', image);
  var post_url = 'testimoni/post';
  ServerPost(post_url,input,true);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var comment = $('#comment').val();
  var img_old = $('#image_old').val();
  var img_new = $('#image').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('comment', comment);
  input.append('id', id);
  input.append('img_new', img_new);
  input.append('img_old', img_old);
  var post_url = 'testimoni/update';
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
  var delete_url = 'testimoni/delete';
  ServerPost(delete_url,input);
  table.ajax.reload();

}

</script>

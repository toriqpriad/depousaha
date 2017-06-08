<script>


function Add() {
  var name = $('#name').val();
  var desc = $('#desc').val();
  var input = new FormData();
  input.append('name', name);
  input.append('desc', desc);
  var post_url = 'product_category/post';
  ServerPost(post_url,input,true);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var desc = $('#desc').val();
  var input = new FormData();
  input.append('name', name);
  input.append('desc', desc);
  input.append('id', id);
  var post_url = 'product_category/update';
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

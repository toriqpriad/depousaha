<script>


function Add() {
  var name = $('#name').val();
  var icon = $('#icon').val();
  var logo = $('#logo').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('icon', icon);
  input.append('logo', logo);
  var post_url = 'socmed/post';
  ServerPost(post_url,input,true);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var icon = $('#icon').val();
  var logo_old = $('#logo_old').val();
  var logo_new = $('#logo').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('id', id);
  input.append('icon', icon);
  input.append('logo_new', logo_new);
  input.append('logo_old', logo_old);
  var post_url = 'socmed/update';
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
  var delete_url = 'socmed/delete';
  ServerPost(delete_url,input);
  table.ajax.reload();

}

</script>

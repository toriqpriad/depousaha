<script>


function Add() {
  var name = $('#name').val();
  var desc = $('#desc').val();

  var image_1 = $('#image_1').prop('files')[0];
  var image_2 = $('#image_2').prop('files')[0];
  var image_3 = $('#image_3').prop('files')[0];
  var image_4 = $('#image_4').prop('files')[0];
  var input = new FormData();
  input.append('name', name);
  input.append('desc', desc);
  input.append('image_1', image_1);
  input.append('image_2', image_2);
  input.append('image_3', image_3);
  input.append('image_4', image_4);
  var post_url = 'gallery/post';
  ServerPost(post_url,input,true);
}

function Put() {
  var id = $('#edit_id').val();
  var name = $('#name').val();
  var desc = $('#desc').val();

  var img_1_old = $('#img_1_old').val();
  var img_2_old = $('#img_2_old').val();
  var img_3_old = $('#img_3_old').val();
  var img_4_old = $('#img_4_old').val();

  var img_1_new = $('#img_1').prop('files')[0];
  var img_2_new = $('#img_2').prop('files')[0];
  var img_3_new = $('#img_3').prop('files')[0];
  var img_4_new = $('#img_4').prop('files')[0];
  var to_delete = [];
  $(".to_delete").each(function() {
    to_delete.push($(this).val());
  });
  var input = new FormData();
  input.append('id', id);
  input.append('name', name);
  input.append('desc', desc);

  input.append('img_1_old', img_1_old);
  input.append('img_2_old', img_2_old);
  input.append('img_3_old', img_3_old);
  input.append('img_4_old', img_4_old);
  input.append('img_1_new', img_1_new);
  input.append('img_2_new', img_2_new);
  input.append('img_3_new', img_3_new);
  input.append('img_4_new', img_4_new);
  input.append('to_delete', JSON.stringify(to_delete));
  var post_url = 'gallery/update';
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
  var delete_url = 'gallery/delete';
  ServerPost(delete_url,input);
  table.ajax.reload();
}

</script>

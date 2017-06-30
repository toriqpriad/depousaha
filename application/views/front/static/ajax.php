<script>
var post_url = '<?= base_url(); ?>';

function ServerPost(next_url,input,reload_action) {
  $.notify({
    message: '<i class="fa fa-cog fa-spin"></i> Sedang memproses ... .',
  }, {type: 'warning', placement: { from: "bottom", align: "right"},});
  setTimeout(function ()
  {
    $.ajax({
      url: post_url+next_url,
      method: 'POST',
      data: input,
      dataType: 'json',
      contentType: 'application/json',
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
          if (response.response == 'OK') {
            $.notify({
              message: '<i class="fa fa-check"></i> ' + response.message,
            }, {type: 'success', placement: { from: "bottom", align: "right"},})
          } else {
            $.notify({
              message: '<i class="fa fa-genderless"></i> ' + response.message,
            }, {type: 'danger'})
            $.each(response.data['error'], function(index, item) {
              $.notify({
                message: '<i class="fa fa-genderless"></i> ' + item,
              }, {type: 'warning', placement: { from: "bottom", align: "right"},})
            })
          }
          if(reload_action){
            setTimeout(function ()
            {
              window.location.href = response.data.link;
            }, 1000);
          }
      }
    });
  });
}
</script>

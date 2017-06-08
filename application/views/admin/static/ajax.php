<script>
var url = '<?= ADMIN_WEBAPP_URL; ?>';

function ServerPost(next_url,input) {
  $.ajax({
    url: url+next_url,
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
          message: '<i class="mdi mdi-check-all"></i> ' + response.message,
        }, {type: 'success'})
        if(response.data != undefined){
        setTimeout(function ()
        {
          // window.location.href = response.data.link;
        }, 1000);
      }
      } else {
        $.notify({
          message: '<i class="mdi mdi-close"></i> ' + response.message,
        }, {type: 'danger'})
        $.each(response.data, function(index, item) {
          $.notify({
            message: '<i class="mdi mdi-close"></i> ' + item,
          }, {type: 'danger'})
        })
      }
    }
  });

}

</script>

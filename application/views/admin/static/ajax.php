<script>
function ServerPost(url,input) {
  $.ajax({
    url: url,
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
        setTimeout(function ()
        {
          window.location.href = response.data.link;
        }, 1000);
      } else {
        $.notify({
          message: '<i class="mdi mdi-close"></i> ' + response.message,
        }, {type: 'danger'})
      }
    }
  });
  
}

</script>

<!-- REQUEST FOR BLOOD SAMPLE -- RECEIVER -->
<script>
$(document).ready(function () {
  $("body").on("submit", "#req_sample", function(e) {
    
    $.ajax({
      type: "post",
      url: "req_sample",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (response) {
        if(!response){
          $(location).attr('href', '<?= base_url() ?>login_receiver');
        }else{
          $("#success").text(response).show().delay(5000).fadeOut();
        }
      }
    });
    
    e.preventDefault();
  })
});
</script>
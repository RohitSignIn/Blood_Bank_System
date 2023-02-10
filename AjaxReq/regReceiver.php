<!-- Receiver Signup -->
<script>
$(document).ready(function () {
$(document).on("submit", "#register_receiver", function(e) {

    const pass = $("#password").next().val();
    const conf_pass = $("#confirm_password").next().val();

    if(pass==conf_pass){
      $.ajax({
        type: "post",
        url: "registerReceiver",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
          if(!response){
              $("#error").text("Error occured try after some time").show().delay(5000).fadeOut();
          }else{
              $(location).attr('href', "<?= base_url(); ?>login_receiver");
          }
        }
      });
    }else{
      $("#error").text("Confirm password failed").show().delay(5000).fadeOut();
    }

    e.preventDefault();
    })
});
</script>
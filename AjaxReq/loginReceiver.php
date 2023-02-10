<!-- Login Receiver -->
<script>
  $(document).ready(function () {
      $(document).on("submit", "#login_receiver", function(e) {

        const pass = $("#password").next().val();
        const conf_pass = $("#confirm_password").next().val();
  
          $.ajax({
            type: "post",
            url: "loginReceiver",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
              if(!response){
                  $("#error").text("Invalid Credentials").show().delay(5000).fadeOut();
              }else{
                  $(location).attr('href', "<?= base_url(); ?>");
              }
            }
          });
  
        e.preventDefault();
        })
  });
</script>
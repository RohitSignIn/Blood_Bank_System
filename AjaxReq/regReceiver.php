<!-- Receiver Signup -->
<script>
$(document).ready(function () {
$(document).on("submit", "#register_receiver", function(e) {

    const pass = $("#password").next().val();
    const conf_pass = $("#confirm_password").next().val();
    
    const contact = $("#contact").next().val();
    const regex = /^(0|91)?[6-9][0-9]{9}$/;
    

    if(pass==conf_pass && regex.test(contact)){
      $.ajax({
        type: "post",
        url: "registerReceiver",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
          if(!response){
              $("#error").text("Account already exists, Try login").show().delay(5000).fadeOut();
          }else{
              $(location).attr('href', "<?= base_url(); ?>login_receiver");
          }
        }
      });
    }else if(!regex.test(contact)){
      $("#error").text("Enter valid mobile number").show().delay(5000).fadeOut();
    }else{
      $("#error").text("Confirm password failed").show().delay(5000).fadeOut();
    }

    e.preventDefault();
    })
});
</script>
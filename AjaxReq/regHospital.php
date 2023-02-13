<!-- Hospital Signup -->
<script>
$(document).ready(function () {
$(document).on("submit", "#register_hospital", function(e) {

    const pass = $("#password").next().val();
    const conf_pass = $("#confirm_password").next().val();
    
    if(pass==conf_pass){
      $.ajax({
        type: "post",
        url: "registerHospital",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
          if(!response){
            $("#error").text("Account already exists, Try login").show().delay(5000).fadeOut();
          }else{
            $(location).attr('href', "<?= base_url(); ?>login_hospital");
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
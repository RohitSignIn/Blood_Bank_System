<!-- UPDATE OR ADD BLOOD UNIT AVAILABLE IN HOSPITAL -->
<script>
$(document).ready(function () {
$(document).on("submit", "#bloodInfo_form", function(e) {
  
  $.ajax({
    type: "post",
    url: "submitbloodInfo",
    data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (response) {
        if(!response){
          $("#error").text("Oops! Error Occured! Retry").show().delay(5000).fadeOut();
        }else{
          $("#success").text("Updated Successfully").show().delay(5000).fadeOut();
        }
      }
    });
    
    e.preventDefault();
  })
});
  </script>
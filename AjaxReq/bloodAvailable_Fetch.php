<!-- FETCHING AVAILABLE BLOOD TO REQUEST -->
<script>
  $(document).ready(function () {
  $(document).on("submit", "#blood_avlbl_receiver", function(e) {
    const login_type = $(this).attr("login");
    
    $("#blooddtl_con").text("");
    
    const state = $("#select_state").val();
    const city = $("#select_state").val();
    const blood_group = $("#select_blood_group").val();
    
    if(state != "" && city !="" && blood_group != ""){
      $.ajax({
        type: "post",
        url: "blood_avlbl_receiver",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (res) {
          if(!res){
            $("#error").text("Some Error Occured").show().delay(5000).fadeOut();
          }else{
            res = $.parseJSON(res);
            if(res.length > 0){
              $.each(res, function(idx, val){
                if(login_type != 'hospital'){
                  $("#blooddtl_con").append(`
                    <div class="card mt-4">
                    <h5 class="card-header text-danger">${blood_group}</h5>
                    <div class="card-body">
                    <h5 class="card-title">${val[blood_group]} Units Available of ${blood_group} Blood Group</h5>
                    <p class="card-text">${val.name}</p>
                    <p class="card-text">${val.local_address} ${val.city} ${val.state}</p>
                    <form id="req_sample">
                    <input type="number" value=${val.id} name="hospital_id" style="display:none">
                    <input type="text" value="${blood_group}" name="req_sample" style="display:none">
                    <button type="submit" class="btn btn-danger">Request Sample</button>
                    </form>
                    </div>
                    </div>`);

                }else{

                  $("#blooddtl_con").append(`
                    <div class="card mt-4">
                    <h5 class="card-header text-danger">${blood_group}</h5>
                    <div class="card-body">
                    <h5 class="card-title">${val[blood_group]} Units Available of ${blood_group} Blood Group</h5>
                    <p class="card-text">${val.name}</p>
                    <p class="card-text">${val.local_address} ${val.city} ${val.state}</p>
                    </div>
                    </div>`);
                      
                  }
                      })
                    }else{
                      $("#error").text("No Data Found").show().delay(5000).fadeOut();
            }
            
          }
        }
      });
    }else{
      $("#error").text("Invalid Search, Fill all the fields first").show().delay(5000).fadeOut();
    }
    
    e.preventDefault();
  })
});
  </script>
  
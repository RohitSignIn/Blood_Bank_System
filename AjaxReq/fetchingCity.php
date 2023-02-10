<!-- FETCHING CITY ACCORDING TO STATE  -->
<script>
  $(document).ready(function () {
    $("body").on("change", "#select_state", function(){
      $("#select_city").text("").append(`<option selected="" value="">Select City</option>`);
      const state = $(this).children('option:selected').attr('stateid');
      $.ajax({
        type: "post",
        url: "cities",
        data: {state},
        success: function (res) {
          res = $.parseJSON(res);
          $.each(res, function(idx, val){
            $("#select_city").append(`
            <option value="${val.city}">${val.city}</option>
            `);
          });
        }
      });
    })
  });
  </script>
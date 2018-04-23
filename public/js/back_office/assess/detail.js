$(function(){
  $.datepicker.setDefaults({
    language: 'ja',
    dateFormat: 'yy-mm-dd',
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    todayHightlight: true,
    beforeShowDay: function(date) {
      var result;
      var dd = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();
      var hName = ktHolidayName(dd);
      if(hName != "") {
        result = [true, "date-holiday", hName];
      } else {
        switch (date.getDay()) {
        case 0:
          result = [true, "date-holiday"];
          break;
        case 6:
          result = [true, "date-saturday"];
          break;
        default:
          result = [true];
          break;
        }
      }
      return result;
    }
  });
  $('#expirationdate').datepicker({
  });
  $('#contractdate').datepicker({
  });
  
  $('#photographerEditForm').disableOnSubmit();
});
$(document).ready(function () {
    $("#photographerAddForm").on("click", ".ajax_zip3", function(event) {
        var zip_code=$('#zip_code').val();
        if (zip_code=='')
        {
            alert('You must enter zip code!');
        }
        else {
            $.ajax({
                url: '/trader/check_Zipcode/' + zip_code,
                dataType: 'json',
                type: 'post',
                data: $('#photographerAddForm').serialize(),
                success: function (data, textStatus, jQxhr) {
                    if (data['status']==0)
                    {
                        alert('The zip code is incorrect!');
                    }
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
});

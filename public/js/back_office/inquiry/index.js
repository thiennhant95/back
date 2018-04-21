$(function(){

  $(document).on('click', '.deleteInquiry', function(){
    var btn = $(this);
    var id = $(this).attr("data");
    var current_token = '{{csrf_token()}}';
    var r = confirm("削除してよろしいですか？");
    if (r == true) {
        $.ajax({
      type: 'POST',
      url: '/inquiries/deleteInquiry',
      datatype: 'text',
      contentType: 'application/x-www-form-urlencoded',
      data: {
        id : id
      },
      headers:
      {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
      .done(function(data){
        if (data == "true") {
          alert("Delete success!");
          location.reload();
        }else{
          alert("Delete fail!");
        }
        
      })
      .fail(function(jqXHR, textStatus) {
      });
    }
    
  });
});
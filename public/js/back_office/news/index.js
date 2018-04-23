 $(document).ready(function() { 
  $("#TraderEditForm").validate({
            rules : {
              'data[category]':{
                required:true,
              },
              'data[title]':{
                required:true,
                maxlength:100,
              },
              'data[content]':{
                maxlength:255,
              },
            }, tooltip_options: {
            }
    });
})
$(function(){

  $(document).on('click', '.updateShow', function(){
    var btn = $(this);
    var id = $(this).attr("data");
    var data_show = $(this).attr("data-show");
    var current_token = '{{csrf_token()}}';
    $.ajax({
      type: 'POST',
      url: '/news/updateShow',
      datatype: 'text',
      contentType: 'application/x-www-form-urlencoded',
      data: {
        id : id,
        show : data_show
      },
      headers:
      {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
      .done(function(data){
        if (data == 'true') {
          if (data_show == '1') {
            btn.html('非表示');
            btn.attr('data-show','0');
          }else{
            btn.html('表示中');
            btn.attr('data-show','1');
          }
          
        }else{
          alert("Update status fail!");
        }
      })
      .fail(function(jqXHR, textStatus) {
      });
  });

  $(document).on('click', '.deleteNew', function(){
    var btn = $(this);
    var id = $(this).attr("data");
    var current_token = '{{csrf_token()}}';
    var r = confirm("Are you sure?");
    if (r == true) {
        $.ajax({
      type: 'POST',
      url: '/news/deleteNew',
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
$(document).ready(function() {
    $("#question_form").validate({
            rules : {
                question_input:{
                    requỉed:true,
                },
            }, tooltip_options: {
            }
    });
    $("#add_question").click(function(){
        if(!$('#question_form').valid() || !$('#question_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-question',
            data: getQuestionData(),
            method:"POST",
            success:function(result){
                if(result != null && result['status'] == true){
                    var html = '<tr>';
                    html += '<th>'+result['data']['name']+'</th>';
                    html += '<td>'+result['data']['question']+'</td>';
                    html += '<td>'+result['data']['date']+'</td>';
                    html += '</tr>';
                    $("#question_content").append(html);
                }else{
                    alert("fail");
                }
            },
            error:function(result){

            }
        })
        return false;
    })
    function getQuestionData(){
        var data = {};
        data.seller_car_id =  $("#seller_car_id").val();
        data.question = $("#question_input").val();
        data._token = token;
        return data;
        
    }
})
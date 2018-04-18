$(document).ready(function() {
	$("#history_form").validate({
            rules : {
            	history_input:{
            		required:true,
            	}
            }, tooltip_options: {
            }
    });
	$("#add_history").click(function(){
		if(!$('#history_form').valid() || !$('#history_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/add-history',
        	data: getHistoryData(),
        	method:"POST",
        	success:function(result){
        		if(result != null && result['status'] == true){
        			var html = "<tr>";
        			html += '<td class="active" style="vertical-align: middle; width: 90px;">'+result['data']['date']+'</td>';
                    html += '<td class="active" style="vertical-align: middle; width: 90px;">'+result['data']['name']+'</td>';
                    html += '<td class="active" style="vertical-align: middle; width: 80px;">'+result['data']['type']+'</td>';
                    html += '<td>'+result['data']['content']+'</td>';
        			html += "</html>";
        			$("#history_content").append(html);
        		}else{
        			alert("fail");
        		}
        	},
        	error:function(result){

        	}
        })
        return false;
	})
	function getHistoryData(){
		var data = {};
		data.type = $("input[name=history_type]:checked").val();
		data.content = $("#history_input").val();
		data.seller_car_id = $("#seller_car_id").val();
		data._token = token;
		return data;
		
	}
})
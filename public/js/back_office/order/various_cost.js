$(document).ready(function() {
	$("#various_cost_form").validate({
            rules : {
            	seller_seller_name:{
            		required:true,
            	}
            }, tooltip_options: {
            }
    });
	$("#add_various_cost").click(function(){
		if(!$('#various_cost_form').valid() || !$('#various_cost_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/add-various-cost',
        	data: getVariousCost(),
        	method:"POST",
        	success:function(result){
        		if(result != null && result['status'] == true){
                    var html = '<tr style="height: 41px;">';
        			html += '<td><div class="col col-md-12 required" style="padding-left: 0px; padding-right: 0px;">';
                    html += result['data']['date'];
                    html += '</div></td>';
                    html += '<td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">';
                    html += '<select  class="form-control input-sm" disabled="">';
                    html += '<option '+(result['data']['classification'] == 1?'checked':'')+' value="1">AA出品料</option>';  
                    html += '<option '+(result['data']['classification'] == 2?'checked':'')+' value="2">AA成約料</option>';   
                    html += '<option '+(result['data']['classification'] == 3?'checked':'')+' value="3">AAペナルティ</option>';    
                    html += '<option '+(result['data']['classification'] == 4?'checked':'')+' value="4">陸送費</option>';    
                    html += '<option '+(result['data']['classification'] == 5?'checked':'')+' value="5">その他</option>';    
                    html += '</select>';    
                    html += '</div></td>';  
                    html += '<td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">';
                    html += result['data']['remark'];
                    html += '</div></td>';
                    html += '<td><div class="col col-md-11 required" style="padding-left: 0px;">';
                    html += result['data']['commission'];
                    html += '</div>';
                    html += '<div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>';
                    html += '</tr>';
                    $("#various_cost_content").append(html);
                
        		}else{
        			alert("fail");
        		}
                if(result['new_id'] != null && result["new_id"].length != 0){
                    renewId(result['new_id']);
                }
        	},
        	error:function(result){

        	}
        })
        return false;
	})
	function getVariousCost(){
		var data = {};
		data.seller_car_id = $("#seller_car_id").val();
		data.date = $("#various_cost_date").val();
		data.classification = $("#various_cost_classification").val();
		data.remark = $("#various_cost_remark").val();
		data.commission = $("#various_cost_commission").val();
		data._token = token;
		return data;
		
	}
})
$(document).ready(function() {
	$("#order_form").validate({
            rules : {
            	order_asking_price:{
            		number:true,
                    maxlength:8,
                    min:0
            	},
                order_deadline_date:{
                    date:true
                }
            }, tooltip_options: {
            }
    });
	$("#edit_order").click(function(){
		if(!$('#order_form').valid() || !$('#order_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-order',
        	data: getOrderData(),
        	method:"POST",
        	success:function(result){
        		if(result != null && result['status'] == true){
        			alert("success");
        		}else{
        			alert("fail");
        		}
        	},
        	error:function(result){

        	}
        })
        return false;
	})
    $("#add_order").click(function(){
        if(!$('#order_form').valid() || !$('#order_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-order',
            data: getOrderData(),
            method:"POST",
            success:function(result){
                if(result != null && result['status'] == true){
                    alert("success");
                    if(result['new_id'] != null && result["new_id"].length != 0){
                        renewId(result['new_id']);
                    }
                }else{
                    alert("fail");
                }
            },
            error:function(result){

            }
        })
        return false;
    })
	function getOrderData(){
		var data = {};
		data.id = $("#order_id").val();
		data.status = $("#order_status").val();
		data.asking_price = $("#order_asking_price").val();
        data.deadline = $("#order_deadline_date").val() +" "+ $("#order_deadline_hour").val() +":"+ $("#order_deadline_minute").val();
        if($("#order_deadline_date").val() == "")
            data.deadline = "";
        data.remark = $("#order_remark").val();
		data._token = token;
		return data;
		
	}

    $("#bid_price_form").validate({
            rules : {
                order_trader_name:{
                    required:true,
                },
                 order_trader_bid:{
                    required:true,
                    number:true,
                },
            }, tooltip_options: {
            }
    });

    $("#order_bid_price").click(function(){
        if(!$('#bid_price_form').valid() || !$('#bid_price_form').data("validator")){
            return false;
        }
        var data = {};
        data.seller_car_id = $("#seller_car_id").val();
        data.name = $("#order_trader_name").val();
        data.price = $("#order_trader_bid").val();
        data._token = token;
        $.ajax({
            url: base_url+'/seller-car/add-bid',
            data: data,
            method:"POST",
            success:function(result){
                if(result != null && result['status'] == true){
                    html = '<div class="col col-md-12 PA0 trader_row">';
                    html += '<div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">';
                    html += '<div class="col col-md-10" style="padding:4px 0px 2px;"> ○  '+result['data']['name']+' </div>';
                    html += '<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; '+result['data']['price']+'</div>';
                    html += '</div>';
                    html += '<div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> ';  
                    html += '<a href="#" class="btn btn-warning btn-xs cancel_bid" data-id="'+result['data']['id']+'">取消</a> </div>'
                    html += '</div>';  
                    $("#order_content").append(html);
                    if(result['new_id'] != null && result["new_id"].length != 0){
                        renewId(result['new_id']);
                    }
                }else{
                    alert("fail");
                }
            },
            error:function(result){

            }
        })
        return false;
    })

    $(document).on('click','.cancel_bid',function(){
        var id = $(this).data('id');
        var parent = $(this).parent().parent();
        $.ajax({
            url: base_url+'/seller-car/remove-bid',
            data: {id:id,_token:token},
            method:"POST",
            success:function(result){
                if(result != null && result['status'] == true){
                   parent.remove();
                    
                }else{
                    alert("fail");
                }
            },
            error:function(result){

            }
        })
        return false;
    })
})
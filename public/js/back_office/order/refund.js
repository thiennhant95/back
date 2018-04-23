$(document).ready(function() {
	$("#refund_form").validate({
            rules : {
            	refund_return_responsitory:{
            		number:true,
                    min:0
            	},
                refund_weight_tax_refund:{
                    number:true,
                    min:0
                },
                refund_tax_date:{
                    date:true,
                },
                refund_payment:{
                    number:true,
                    min:0
                },
                refund_automobile_refund:{
                    number:true,
                    min:0
                },

            }, tooltip_options: {
            }
    });
	$("#edit_refund").click(function(){
		if(!$('#refund_form').valid() || !$('#refund_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-refund',
        	data: getRefundData(),
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
    $("#add_refund").click(function(){
        if(!$('#refund_form').valid() || !$('#refund_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-refund',
            data: getRefundData(),
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
	function getRefundData(){
		var data = {};
		data.id = $("#refund_id").val();
		data.return_responsitory = $("#refund_return_responsitory").val();
		data.weight_tax_refund = $("#refund_weight_tax_refund").val();
		data.tax_date = $("#refund_tax_date").val();
		data.payment = $("#refund_payment").val();
		data.automobile_refund = $("#refund_automobile_refund").val();
		data._token = token;
		return data;
		
	}

	
})
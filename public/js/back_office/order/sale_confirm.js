$(document).ready(function() {
	$("#sale_confirm_form").validate({
            rules : {
            	sale_confirm_body_price:{
            		number:true,
                    maxlength:10,
                    min:0
            	},
                sale_confirm_established_amount:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_confirm_payment_deadline:{
                    date:true
                },
                sale_confirm_last_account_date:{
                    date:true
                },
                sale_confirm_billing_date:{
                    date:true
                },
                sale_confirm_clothing_date:{
                    date:true
                },
                sale_confirm_remark2:{
                    maxlength:50
                }
            }, tooltip_options: {
            }
    });
	$("#edit_sale_confirm").click(function(){
		if(!$('#sale_confirm_form').valid() || !$('#sale_confirm_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-sale-confirm',
        	data: getSaleConfirmData(),
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
    $("#add_sale_confirm").click(function(){
        if(!$('#sale_confirm_form').valid() || !$('#sale_confirm_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-sale-confirm',
            data: getSaleConfirmData(),
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
	function getSaleConfirmData(){
		var data = {};
		data.id = $("#sale_id").val();
		data.body_price = $("#sale_confirm_body_price").val();
		data.established_amount = $("#sale_confirm_established_amount").val();
		data.payment_deadline = $("#sale_confirm_payment_deadline").val();
		data.last_account_date = $("#sale_confirm_last_account_date").val();
		data.billing_date = $("#sale_confirm_billing_date").val();
		data.clothing_date = $("#sale_confirm_clothing_date").val();
		data.remark2 = $("#sale_confirm_remark2").val();
		data._token = token;
		return data;
		
	}

    $(document).on("change","#sale_confirm_body_price,#sale_confirm_established_amount",function(){
        var sale_final_charge_amount = parseFloat($("#sale_final_charge_amount").text());
        var sale_confirm_body_price = parseFloat($("#sale_confirm_body_price").val());
        var sale_confirm_established_amount = parseFloat($("#sale_confirm_established_amount").val());
        if(isNaN(sale_final_charge_amount))
            sale_final_charge_amount = 0;
        if(isNaN(sale_confirm_established_amount))
            sale_confirm_body_price = 0;
        if(isNaN(sale_confirm_established_amount))
            sale_confirm_established_amount = 0;
        $("#sale_confirm_difference").text((sale_final_charge_amount-sale_confirm_body_price).toFixed(0));
        $("#sale_confirm_deduction").text((sale_final_charge_amount-sale_confirm_established_amount).toFixed(0));
    })
})
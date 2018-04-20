$(document).ready(function() {
	$("#sale_form").validate({
            rules : {
            	sale_sale_date:{
            		date:true,
            	},
                sale_amount:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_body_price:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_recycling_fee:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_refund_fee:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_delete_agent_cost:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_distributor_name:{
                    maxlength:100
                },
                sale_deducion_amount:{
                    number:true,
                    maxlength:10,
                    min:0
                },
                sale_deposite_due_date:{
                    date:true
                },
                sale_receivable_date:{
                    date:true
                },
                sale_billing_date:{
                    date:true
                },
                sale_golden_date:{
                    date:true
                },
            }, tooltip_options: {
            }
    });
	$("#edit_sale").click(function(){
		if(!$('#sale_form').valid() || !$('#sale_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-sale',
        	data: getSaleData(),
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
	function getSaleData(){
		var data = {};
		data.id = $("#sale_id").val();
		data.sale_date = $("#sale_sale_date").val();
		if($("#sale_accounting_method1").is(":checked")){
            data.accounting_method = 1;
        }else if($("#sale_accounting_method2").is(":checked")){
            data.accounting_method = 2;
        }
		data.amount = $("#sale_amount").val();
		data.body_price = $("#sale_body_price").val();
		data.recycling_fee = $("#sale_recycling_fee").val();
		data.bid_fee = $("#sale_bid_fee").val();
		data.refund_fee = $("#sale_refund_fee").val();
		data.delete_agent_cost = $("#sale_delete_agent_cost").val();
		data.destination = $("#sale_destination").val();
		data.distributor_name = $("#sale_distributor_name").val();
		data.remark1 = $("#sale_remark1").val();
		data.deducion_amount = $("#sale_deducion_amount").val();
		data.deposite_due_date = $("#sale_deposite_due_date").val();
		data.receivable_date = $("#sale_receivable_date").val();
		data.billing_date = $("#sale_billing_date").val();
		data.golden_date = $("#sale_golden_date").val();
		data._token = token;
		return data;
		
	}
})
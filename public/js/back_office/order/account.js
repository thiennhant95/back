$(document).ready(function() {
	$("#account_form").validate({
            rules : {
            	account_bank_name:{
            		maxlength:30,
            	},
            	account_bank_code:{
            		digits:true,
            		maxlength:4,
            	},
            	account_branch_name:{
            		maxlength:30,
            	},
            	account_branch_code:{
            		digits:true,
            		maxlength:3,
            	},
            	account_number:{
            		digits:true,
            		maxlength:7,
            	},
            	account_holder:{
            		maxlength:50,
            	},
            }, tooltip_options: {
            }
    });
	$("#edit_account").click(function(){
		if(!$('#account_form').valid() || !$('#account_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller/edit-account',
        	data: getAccountData(),
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
	function getAccountData(){
		var data = {};
		data.id = $("#seller_seller_id").val();
		data.bank_name = $("#account_bank_name").val();
		data.bank_code = $("#account_bank_code").val();
		data.branch_name = $("#account_branch_name").val();
		data.branch_code = $("#account_branch_code").val();
		if($("#account_account_type1").is(":checked")){
			data.account_type = 1;
		}else if($("#account_account_type2").is(":checked")){
			data.account_type = 2;
		}else if($("#account_account_type3").is(":checked")){
			data.account_type = 3;
		}
		data.account_number = $("#account_account_number").val();
		data.account_holder = $("#account_account_holder").val();
		if($("#account_transfer_status1").is(":checked")){
			data.transfer_status = 1;
		}else if($("#account_transfer_status2").is(":checked")){
			data.transfer_status = 2;
		}else if($("#account_transfer_status3").is(":checked")){
			data.transfer_status = 3;
		}
		data._token = token;
		return data;
		
	}
})
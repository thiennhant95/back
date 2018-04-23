$(document).ready(function() {
	$("#transfer_form").validate({
            rules : {
            	transfer_determine_amount:{
            		number:true,
                    maxlength:10,
                    min:0
            	},
                transfer_remark3:{
                    maxlength:50
                }
            }, tooltip_options: {
            }
    });
	$("#edit_transfer").click(function(){
		if(!$('#transfer_form').valid() || !$('#transfer_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-transfer',
        	data: getTransferData(),
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
    $("#add_transfer").click(function(){
        if(!$('#transfer_form').valid() || !$('#transfer_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-transfer',
            data: getTransferData(),
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
	function getTransferData(){
		var data = {};
		data.id = $("#sale_id").val();
		data.determine_amount = $("#transfer_determine_amount").val();
		data.remark3 = $("#transfer_remark3").val();
		data._token = token;
		return data;
		
	}
})
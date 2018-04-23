$(document).ready(function() {
	$("#recycling_form").validate({
            rules : {
            	recycling_deposite_situation:{
            		maxlength:100,
            	},
                recycling_recycling_fee:{
                    number:true,
                    min:0
                },
            }, tooltip_options: {
            }
    });
	$("#edit_recycling").click(function(){
		if(!$('#recycling_form').valid() || !$('#recycling_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-recycling',
        	data: getRecycling(),
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
    $("#add_recycling").click(function(){
        if(!$('#recycling_form').valid() || !$('#recycling_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-recycling',
            data: getRecycling(),
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
	function getRecycling(){
		var data = {};
		data.id = $("#sale_id").val();
		data.deposite_situation = $("#recycling_deposite_situation").val();
		data.recycling_fee = $("#recycling_recycling_fee").val();
		data._token = token;
		return data;
		
	}
})
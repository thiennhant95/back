$(document).ready(function() {
	$("#retrieval_form").validate({
            rules : {
            	retrieval_first_date:{
            		date:true,
            	},
                retrieval_second_date:{
                    date:true,
                },
                retrieval_third_date:{
                    date:true,
                },
                retrieval_takeover_place:{
                    maxlength:100,
                },
                retrieval_company_code:{
                    digits:true,
                    maxlength:10,
                },
                retrieval_end_recognition_day:{
                    date:true,
                },
                retrieval_end_quotation:{
                    date:true,
                }
            }, tooltip_options: {
            }
    });
	$("#edit_retrieval").click(function(){
		if(!$('#retrieval_form').valid() || !$('#retrieval_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-retrieval',
        	data: getRetrievalData(),
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
    $("#add_retrieval").click(function(){
        if(!$('#retrieval_form').valid() || !$('#retrieval_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-retrieval',
            data: getRetrievalData(),
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
	function getRetrievalData(){
		var data = {};
        data.id =  $("#retrieval_id").val();
		data.first_date = $("#retrieval_first_date").val();
		data.second_date = $("#retrieval_second_date").val();
        data.third_date = $("#retrieval_third_date").val();
        if($("#retrieval_first_date_check1").is(":checked")){
            data.first_date_check = 1;
        }else if($("#retrieval_first_date_check2").is(":checked")){
            data.first_date_check = 2;
        }else if($("#retrieval_first_date_check3").is(":checked")){
            data.first_date_check = 3;
        }else if($("#retrieval_first_date_check4").is(":checked")){
            data.first_date_check = 4;
        }
        if($("#retrieval_second_date_check1").is(":checked")){
            data.second_date_check = 1;
        }else if($("#retrieval_second_date_check2").is(":checked")){
            data.second_date_check = 2;
        }else if($("#retrieval_second_date_check3").is(":checked")){
            data.second_date_check = 3;
        }else if($("#retrieval_second_date_check4").is(":checked")){
            data.second_date_check = 4;
        }
        if($("#retrieval_third_date_check1").is(":checked")){
            data.third_date_check = 1;
        }else if($("#retrieval_third_date_check2").is(":checked")){
            data.third_date_check = 2;
        }else if($("#retrieval_third_date_check3").is(":checked")){
            data.third_date_check = 3;
        }else if($("#retrieval_third_date_check4").is(":checked")){
            data.third_date_check = 4;
        }
        data.pending_schedule = $("#retrieval_pending_schedule").is(":checked")?1:0;
        data.takeover_place = $("#retrieval_takeover_place").val();
        if($("#retrieval_availability1").is(":checked")){
            data.availability = 1;
        }else if($("#retrieval_availability2").is(":checked")){
            data.availability = 2;
        }
        data.company_code = $("#retrieval_company_code").val();
        data.remark = $("#retrieval_remark").val();
        if($("#retrieval_number_cut1").is(":checked")){
            data.number_cut = 1;
        }else if($("#retrieval_number_cut2").is(":checked")){
            data.number_cut = 2;
        }
        data.end_recognition_day = $("#retrieval_end_recognition_day").val();
        data.end_quotation = $("#retrieval_end_quotation").val();
		data._token = token;
		return data;
		
	}
})
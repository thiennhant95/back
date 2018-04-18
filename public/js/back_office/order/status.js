$(document).ready(function() {
	$("#status_form").validate({
            rules : {
            	status_re_tel_date:{
            		date:true,
            	}
            }, tooltip_options: {
            }
    });
	$("#edit_status").click(function(){
		if(!$('#status_form').valid() || !$('#status_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-status',
        	data: getStatusData(),
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
	function getStatusData(){
		var data = {};
		data.id = $("#status_id").val();
		data.status = $("#status_status").val();
		if($("#status_listing_accuracy1").is(":checked") == true){
			data.listing_accuracy = 1;
		}else if($("#status_listing_accuracy2").is(":checked") == true){
			data.listing_accuracy = 2;
		}else if($("#status_listing_accuracy3").is(":checked") == true){
			data.listing_accuracy = 3;
		}else if($("#status_listing_accuracy4").is(":checked") == true){
			data.listing_accuracy = 4;
		}else if($("#status_listing_accuracy5").is(":checked") == true){
			data.listing_accuracy = 5;
		}else if($("#status_listing_accuracy6").is(":checked") == true){
			data.listing_accuracy = 6;
		}
		data.re_tel_date = $("#status_re_tel_date").val();
		data.tel_number_again = $("#status_tel_number_again").val();
		data.pursuit = [];
		if($("#status_pursuit1").is(":checked") == true){
			data.pursuit.push(1);
		}else{
			data.pursuit.push(0);
		}

		if($("#status_pursuit2").is(":checked") == true){
			data.pursuit.push(1);
		}else{
			data.pursuit.push(0);
		}
		if($("#status_pursuit3").is(":checked") == true){
			data.pursuit.push(1);
		}else{
			data.pursuit.push(0);
		}
		if($("#status_offer_presentation1").is(":checked") == true){
			data.offer_presentation = 1;
		}else if($("#status_offer_presentation2").is(":checked") == true){
			data.offer_presentation = 2;
		}else if($("#status_offer_presentation3").is(":checked") == true){
			data.offer_presentation = 3;
		}
		if($("#status_campaign1").is(":checked") == true){
			data.campaign = 1;
		}else if($("#status_campaign2").is(":checked") == true){
			data.campaign = 2;
		}else if($("#status_campaign3").is(":checked") == true){
			data.campaign = 3;
		}else if($("#status_campaign4").is(":checked") == true){
			data.campaign = 4;
		}else if($("#status_campaign5").is(":checked") == true){
			data.campaign = 5;
		}else if($("#status_campaign6").is(":checked") == true){
			data.campaign = 6;
		}else if($("#status_campaign7").is(":checked") == true){
			data.campaign = 7;
		}
		data.word_preparation = $("#status_word_preparation").val();
		data._token = token;
		return data;
		
	}
})
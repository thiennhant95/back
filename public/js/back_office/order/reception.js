$(document).ready(function() {
	$("#reception_form").validate({
            rules : {
            	reception_term_consent:{
            		date:true,
            	},
                reception_confirm_method:{
                    maxlength:50,
                },
                reception_producer_urged:{
                    maxlength:50,
                },
                reception_remark1:{
                    maxlength:50,
                },
                minimum_recommend_price:{
                    number:true,
                    min:1
                },
                reception_end_desired_date:{
                    date:true,
                },
                reception_notify_certified_copy:{
                    maxlength:50,
                },
            }, tooltip_options: {
            }
    });
	$("#edit_reception").click(function(){
		if(!$('#reception_form').valid() || !$('#reception_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-reception',
        	data: getRepceptionData(),
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
	function getRepceptionData(){
		var data = {};
        data.id =  $("#reception_id").val();
		data.term_consent = $("#reception_term_consent").val();
		data.confirm_method = $("#reception_confirm_method").val();
        data.producer_urged = $("#reception_producer_urged").val();
        data.remark1 = $("#reception_remark1").val();
        data.minimum_recommend_price = $("#reception_minimum_recommend_price").val();
        data.end_desired_date = $("#reception_end_desired_date").val();
        if($("#reception_claim1").is(":checked")){
            data.claim = 1;
        }else if($("#reception_claim2").is(":checked")){
            data.claim = 2;
        }
        data.notify_certified_copy = $("#reception_notify_certified_copy").val();
        if($("#reception_deletion_work1").is(":checked")){
            data.deletion_work = 1;
        }else if($("#reception_deletion_work2").is(":checked")){
            data.deletion_work = 2;
        }else if($("#reception_deletion_work3").is(":checked")){
            data.deletion_work = 3;
        }
        data.remark2 = $("#reception_remark2").val();
		data._token = token;
		return data;
		
	}
})
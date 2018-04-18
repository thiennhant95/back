$(document).ready(function() {
	$("#document_form").validate({
            rules : {
            	status_re_tel_date:{
            		date:true,
            	}
            }, tooltip_options: {
            }
    });
	$("#edit_document").click(function(){
		if(!$('#document_form').valid() || !$('#document_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-document',
        	data: getDocumentData(),
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
	function getDocumentData(){
		var data = {};
		data.id = $("#document_id").val();
		data.cancel_type = $("#document_cancel_type").val();
		if($("#document_document_arrival1").is(":checked") == true){
			data.document_arrival = 1;
		}else if($("#document_document_arrival2").is(":checked") == true){
			data.document_arrival = 2;
		}else if($("#document_document_arrival3").is(":checked") == true){
			data.document_arrival = 3;
		}
		data.vehicle_license = $("#document_vehicle_license").is(":checked")?1:0;
		data.insurance_card = $("#document_insurance_card").is(":checked")?1:0;
		data.recycling_ticket = $("#document_recycling_ticket").is(":checked")?1:0;
		data.seal_certificate = $("#document_seal_certificate").is(":checked")?1:0;
		data.transfer_certificate = $("#document_transfer_certificate").is(":checked")?1:0;
		data.power_attorney = $("#document_power_attorney").is(":checked")?1:0;
		data.resident_card = $("#document_resident_card").is(":checked")?1:0;
		data.inheritance = $("#document_inheritance").is(":checked")?1:0;
		data.license_plate = $("#document_license_plate").val();
		data.remark = $("#document_remark").val();
		data._token = token;
		return data;
		
	}
})
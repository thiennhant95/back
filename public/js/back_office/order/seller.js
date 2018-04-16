$(document).ready(function() {
	$("#seller_form").validate({
            rules : {
            	seller_seller_name:{
            		required:true,
            	}
            }, tooltip_options: {
            }
    });
	$("#edit_seller").click(function(){
		if(!$('#seller_form').valid() || !$('#seller_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller/edit',
        	data: getSellerData(),
        	method:"POST",
        	success:function(result){
        		
        	}
        })
        return false;
	})
	function getSellerData(){
		var data = {};
		data.id = $("#seller_id").val();
		data.name = $("#seller_seller_name").val();
		data.kana_name = $("#seller_seller_kana_name").val();
		data.participant = $("#seller_seller_participant").val();
		data.phone1 = $("#seller_seller_phone1").val();
		data.phone2 = $("#seller_seller_phone2").val();
		data.phone3 = $("#seller_seller_phone3").val();
		data.phone4 = $("#seller_seller_phone4").val();
		data.home_phone1 = $("#seller_seller_home_phone1").val();
		data.home_phone2 = $("#seller_seller_home_phone2").val();
		data.home_phone3 = $("#seller_seller_home_phone3").val();
		data.home_phone4 = $("#seller_seller_home_phone4").val();
		data.phone_check1 = $("#seller_seller_phone_check1").val();
		data.phone_check2 = $("#seller_seller_phone_check2").val();
		data.phone_check3 = $("#seller_seller_phone_check3").val();
		data.phone_check4 = $("#seller_seller_phone_check4").val();
		data.fax = $("#seller_seller_fax").val();
		data.zip_code = $("#seller_seller_zip_code").val();
		data.erea = $("#seller_seller_erea").val();
		data.address = $("#seller_seller_address").val();
		data.building_number = $("#seller_seller_building_number").val();
		data.age = $("#seller_seller_age").val();
		data.career = $("#seller_seller_career").val();
		data.email1 = $("#seller_seller_email1").val();
		data.email2 = $("#seller_seller_email2").val();
		data.gender = $("#seller_seller_gender1").is(":checked")?1:0;
		data.license = $("#seller_seller_license").val();
		data.license_img = $("#seller_seller_license_img").val();
		data.register_date = $("#seller_seller_register_date").val();
		data._token = token;
		return data;
		
	}
})
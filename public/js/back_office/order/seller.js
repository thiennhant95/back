$(document).ready(function() {
	$("#seller_form").validate({
            rules : {
            	seller_seller_name:{
            		required:true,
                    maxlength:50
            	},
                seller_seller_kana_name:{
                    maxlength:50
                },
                seller_seller_participant:{
                    maxlength:50
                },
                seller_seller_phone1:{
                    required:true,
                    digits: true,
                    maxlength:13
                },
                seller_seller_phone2:{
                    digits: true,
                    maxlength:13
                },
                seller_seller_phone3:{
                    digits: true,
                    maxlength:13
                },
                seller_seller_phone4:{
                    digits: true,
                    maxlength:13
                },
                seller_seller_fax:{
                    digits: true,
                    maxlength:13
                },
                seller_seller_zip_code:{
                    digits: true,
                    maxlength:8
                },
                seller_seller_address:{
                    maxlength:100
                },
                seller_seller_building_number:{
                    maxlength:50
                },
                seller_seller_age:{
                    number:true,
                    maxlength:3
                },
                seller_seller_email1:{
                    email:true,
                    maxlength:100
                },
                seller_seller_email2:{
                    email:true,
                    maxlength:100
                },
                seller_seller_license:{
                    maxlength:10
                },
                seller_seller_register_date:{
                    date:true
                },
            }, tooltip_options: {
            }
    });
	$("#edit_seller").click(function(){
		if(!$('#seller_form').valid() || !$('#seller_form').data("validator")){
            return false;
        }
		$.ajax({
		    url:  base_url+'/seller/edit',
		    data: getSellerData(),
		    type: 'POST',
		    contentType: false, 
		    processData: false, 
		    success:function(result){
        		if(result != null && result['status'] == true){
        			alert("success");
                    
        		}else{
        			alert("fail");
        		}
        	},
        	error:function(result){

        	}
		});
        return false;
	})
    $("#add_seller").click(function(){
        if(!$('#seller_form').valid() || !$('#seller_form').data("validator")){
            return false;
        }
        $.ajax({
            url:  base_url+'/seller/add',
            data: getSellerData(),
            type: 'POST',
            contentType: false, 
            processData: false, 
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
        });
        return false;
    })
	function getSellerData(){
		var data = {};
		data.id = $("#seller_seller_id").val();
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
		data.phone_check1 = $("#seller_seller_phone_check1").is(":checked")?1:0;
		data.phone_check2 = $("#seller_seller_phone_check2").is(":checked")?1:0;
		data.phone_check3 = $("#seller_seller_phone_check3").is(":checked")?1:0;
		data.phone_check4 = $("#seller_seller_phone_check4").is(":checked")?1:0;
		data.fax = $("#seller_seller_fax").val();
		data.zip_code = $("#seller_seller_zip_code").val();
		data.erea_id = $("#seller_seller_erea").val();
		data.address = $("#seller_seller_address").val();
		data.building_number = $("#seller_seller_building_number").val();
		data.age = $("#seller_seller_age").val();
		data.career = $("#seller_seller_career").val();
		data.email1 = $("#seller_seller_email1").val();
		data.email2 = $("#seller_seller_email2").val();
		data.gender = $("#seller_seller_gender1").is(":checked")?1:0;
		data.license = $("#seller_seller_license").val();
        data.license_img = "";
        if($("#seller_seller_license_img")[0].files[0] != null)
		  data.license_img = $("#seller_seller_license_img")[0].files[0];
		data.register_date = $("#seller_seller_register_date").val();
		data._token = token;

		var formData = new FormData();
        formData.append('id', data.id);
        formData.append('name', data.name);
        formData.append('kana_name', data.kana_name);
        formData.append('participant', data.participant);
        formData.append('phone1', data.phone1);
        formData.append('phone2', data.phone2);
        formData.append('phone3', data.phone3);
        formData.append('phone4', data.phone4);
        formData.append('home_phone1', data.home_phone1);
        formData.append('home_phone2', data.home_phone2);
        formData.append('home_phone3', data.home_phone3);
        formData.append('home_phone4', data.home_phone4);
        formData.append('phone_check1', data.phone_check1);
        formData.append('phone_check2', data.phone_check2);
        formData.append('phone_check3', data.phone_check3);
        formData.append('phone_check4', data.phone_check4);
        formData.append('fax', data.fax);
        formData.append('zip_code', data.zip_code);
        formData.append('erea_id', data.erea_id);
        formData.append('address', data.address);
        formData.append('building_number', data.building_number);
        formData.append('age', data.age);
        formData.append('career', data.career);
        formData.append('email1', data.email1);
        formData.append('email2', data.email2);
        formData.append('gender', data.gender);
        formData.append('license', data.license);
        formData.append('license_img', data.license_img);
        formData.append('register_date', data.register_date);
        formData.append('_token', data._token);
		return formData;
		
	}

	
})
$(document).ready(function() {
	$("#infor_form").validate({
            rules : {
            	infor_car_year:{
            		digits:true,
            		maxlength:2,
            	},
            	infor_car_month:{
            		digits:true,
            		maxlength:2,
            	},
            	infor_mileage:{
            		number:true,
            		min:0,
            		maxlength:10
            	},
            	infor_inspection_year:{
            		digits:true,
            		maxlength:2,
            	},
            	infor_inspection_month:{
            		digits:true,
            		maxlength:2,
            	},
            	infor_inspection_day:{
            		digits:true,
            		maxlength:2,
            	},
            	infor_body_color:{
            		maxlength:20
            	},
            	infor_displacement:{
            		number:true,
            		maxlength:5,
            		min:0
            	},
            	infor_engine_model:{
            		maxlength:10
            	},
            	infor_type:{
            		maxlength:30
            	},
            	infor_model_number:{
            		digits:true,
            		maxlength:6
            	},
            	infor_category_number:{
            		digits:true,
            		maxlength:4
            	},
            	infor_grade:{
            		maxlength:50
            	},
            	infor_owner:{
            		maxlength:50
            	},
            	infor_residence:{
            		maxlength:100
            	},
            	infor_number_stamp:{
            		number:true,
            		min:0,
            		maxlength:1
            	},
            	infor_balance_status:{
            		maxlength:50
            	},
            	infor_written_guarantee:{
            		maxlength:50
            	},
            	infor_record_book:{
            		maxlength:50
            	},
            	infor_remark:{
            		maxlength:50
            	},
            	infor_vehicle_number:{
            		maxlength:20
            	},
            	infor_chassis_number:{
            		maxlength:30
            	},
            }, tooltip_options: {
            }
    });
	$("#edit_infor").click(function(){
		if(!$('#infor_form').valid() || !$('#infor_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-information',
        	data: getInforData(),
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
	function getInforData(){
		var data = {};
		data.id = $("#infor_id").val();
		data.car_name = $("#infor_car_name").val();
		data.maker_id = $("#infor_maker_id").val();
		data.car_id = $("#infor_car_id").val();
		if($("#infor_classification1").is(":checked") == true){
			data.classification = 1;
		}else if($("#infor_classification2").is(":checked") == true){
			data.classification = 2;
		}
		data.car_year = $("#infor_car_year_type").val()+','+$("#infor_car_year").val()+','+$("#infor_car_month").val();
		data.about_check = $("#infor_about_check").is(":checked")?1:0;
		if($("#infor_purchase1").is(":checked") == true){
			data.purchase = 1;
		}else if($("#infor_purchase2").is(":checked") == true){
			data.purchase = 2;
		}
		data.mileage = $("#infor_mileage").val();
		data.inspection_date = $("#infor_car_year_type").val()+','+$("#infor_inspection_year").val()+','+$("#infor_inspection_year").val()+','+$("#infor_inspection_day").val();
		if($("#info_self_propelled11").is(":checked") == true){
			data.self_propelled1 = 1;
		}else if($("#info_self_propelled12").is(":checked") == true){
			data.self_propelled1 = 2;
		}
		data.self_propelled2 = [];
		if($("#info_self_propelled21").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		}
		if($("#info_self_propelled22").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		} 
		if($("#info_self_propelled23").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		} 
		if($("#info_self_propelled24").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		} 
		if($("#info_self_propelled25").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		}
		if($("#info_self_propelled26").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		}
		if($("#info_self_propelled27").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		}
		if($("#info_self_propelled28").is(":checked") == true){
			data.self_propelled2.push(1);
		}else{
			data.self_propelled2.push(0);
		}
		if($("#infor_4t_unic1").is(":checked") == true){
			data.t4_unic = 1;
		}else if($("#infor_4t_unic2").is(":checked") == true){
			data.t4_unic = 2;
		}else if($("#infor_4t_unic3").is(":checked") == true){
			data.t4_unic = 3;
		}else if($("#infor_4t_unic4").is(":checked") == true){
			data.t4_unic = 4;
		}
		data.running_condition = $("#infor_running_condition").val();
		data.body_color = $("#infor_body_color").val();
		data.displacement = $("#infor_displacement").val();
		data.about_check = $("#infor_about_check").is(":checked")?1:0;
		data.engine_model = $("#infor_engine_model").val();
		if($("#infor_turbo1").is(":checked") == true){
			data.turbo = 1;
		}else if($("#infor_turbo2").is(":checked") == true){
			data.turbo = 2;
		}
		data.type = $("#infor_type").val();
		data.ambiguous_check = $("#infor_ambiguous_check").is(":checked")?1:0;
		data.model_number = $("#infor_model_number").val();
		data.category_number = $("#infor_category_number").val();
		data.grade = $("#infor_grade").val();
		if($("#infor_drive_system1").is(":checked") == true){
			data.drive_system = 1;
		}else if($("#infor_drive_system2").is(":checked") == true){
			data.drive_system = 2;
		}else if($("#infor_drive_system3").is(":checked") == true){
			data.drive_system = 3;
		}
		if($("#infor_transmission1").is(":checked") == true){
			data.transmission = 1;
		}else if($("#infor_transmission1").is(":checked") == true){
			data.transmission = 2;
		}
		data.speed = $("#infor_speed").val();
		if($("#infor_fuel1").is(":checked") == true){
			data.fuel = 1;
		}else if($("#infor_fuel2").is(":checked") == true){
			data.fuel = 2;
		}else if($("#infor_fuel3").is(":checked") == true){
			data.fuel = 3;
		}else if($("#infor_fuel4").is(":checked") == true){
			data.fuel = 4;
		}
		data.owner = $("#infor_owner").val();
		data.personal_check = $("#infor_personal_check").is(":checked")?1:0;
		data.residence = $("#infor_residence").val();
		data.number_stamp = $("#infor_number_stamp").val();
		data.balance_status = $("#infor_balance_status").val();
		if($("#infor_delete_temp1").is(":checked") == true){
			data.delete_temp = 1;
		}else if($("#infor_delete_temp2").is(":checked") == true){
			data.delete_temp = 2;
		}
		if($("#infor_accident_repair1").is(":checked") == true){
			data.accident_repair = 1;
		}else if($("#infor_accident_repair2").is(":checked") == true){
			data.accident_repair = 2;
		}else if($("#infor_accident_repair3").is(":checked") == true){
			data.accident_repair = 3;
		}
		data.written_guarantee = $("#infor_written_guarantee").val();
		data.record_book = $("#infor_record_book").val();
		if($("#infor_history1").is(":checked") == true){
			data.history = 1;
		}else if($("#infor_history2").is(":checked") == true){
			data.history = 2;
		}else if($("#infor_history3").is(":checked") == true){
			data.history = 3;
		}else if($("#infor_history4").is(":checked") == true){
			data.history = 4;
		}
		if($("#info_smoking_status1").is(":checked") == true){
			data.smoking_status = 1;
		}else if($("#info_smoking_status2").is(":checked") == true){
			data.smoking_status = 2;
		}else if($("#info_smoking_status3").is(":checked") == true){
			data.smoking_status = 3;
		}
		data.equipment = [];
		$("input[name=infor_equipment]:checked").each(function(){
			data.equipment.push($(this).data('id'));
		});
		if($("#infor_air_condition1").is(":checked") == true){
			data.air_condition = 1;
		}else if($("#infor_air_condition2").is(":checked") == true){
			data.air_condition = 2;
		}else if($("#infor_air_condition3").is(":checked") == true){
			data.air_condition = 3;
		}else if($("#infor_air_condition4").is(":checked") == true){
			data.air_condition = 4;
		}else if($("#infor_air_condition5").is(":checked") == true){
			data.air_condition = 5;
		}
		data.remark = $("#infor_remark").val();
		data.number_door = $("#infor_number_door").val();
		data.number_passenger = $("#infor_number_passenger").val();
		data.condition = $("#infor_condition").val();
		data.state_interior = $("#infor_state_interior").val();
		data.state_other = $("#infor_state_other").val();
		data.pr_points = $("#infor_pr_points").val();
		data.vehicle_number = $("#infor_vehicle_number").val();
		data.chassis_number = $("#infor_chassis_number").val();
		data.remove_part = [];
		if($("#infor_remove_part1").is(":checked")){
			data.remove_part.push(1);
		}else{
			data.remove_part.push(0);
		}
		if($("#infor_remove_part2").is(":checked")){
			data.remove_part.push(1);
		}else{
			data.remove_part.push(0);
		}
		if($("#infor_remove_part3").is(":checked")){
			data.remove_part.push(1);
		}else{
			data.remove_part.push(0);
		}
		if($("#infor_remove_part4").is(":checked")){
			data.remove_part.push(1);
		}else{
			data.remove_part.push(0);
		}
		data.seller_car_id = $("#seller_car_id").val();
		data._token = token;
		return data;
		
	}

	$("#infor_maker_id").change(function(){
		var maker_id = $(this).val();
		$.ajax({
			url: base_url+"/car/get-by-maker",
			data:{maker_id:maker_id},
			method:'GET',
			dataType:'json',
			success:function(data){
				var html = '<option value="">----------</option>';
				if(data != null && data.length > 0){
					for(var i=0;i<data.length;i++){
						html += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
					}
				}
				$("#infor_car_id").html(html);
				var car_name = $("#infor_maker_id").find(":selected").text();
				if($("#infor_maker_id").val() == "")
					car_name = "";
				$("#infor_car_name").val(car_name);
			}
		})
	})

	$("#infor_car_id").change(function(){
		var car_name = $("#infor_maker_id").find(":selected").text();
		if($("#infor_maker_id").val() == "")
			car_name = "";
		car_name += $(this).val() == ""?"":" "+$(this).find(":selected").text();
		$("#infor_car_name").val(car_name);
	})

	$("#infor_car_id").trigger("change");
})
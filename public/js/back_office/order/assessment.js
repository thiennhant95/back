$(document).ready(function() {
	$("#assessment_form").validate({
            rules : {
            	assessment_place:{
            		maxlength:50,
            	},
                assessment_place_map:{
                    maxlength:50,
                },
                assessment_situation:{
                    date:true,
                },
                assessment_advance_date1:{
                    date:true,
                },
                assessment_advance_date2:{
                    date:true,
                },
                assessment_advance_date3:{
                    maxlength:50,
                },
                assessment_remark1:{
                    maxlength:50,
                },
                assessment_assessor1:{
                    maxlength:50,
                },
                assessment_request_date:{
                    date:true,
                },
                assessment_assessor2:{
                    maxlength:50,
                },
                assessment_arrival_date:{
                    date:true,
                },
                assessment_complete_confirmation:{
                    maxlength:50,
                },
                assessment_synthetic:{
                    number:true,
                    min:0
                },
                assessment_exterior:{
                    number:true,
                    min:0
                },
                assessment_interior:{
                    number:true,
                    min:0
                },
                assessment_rater:{
                    maxlength:50,
                },
                assessment_remark2:{
                    maxlength:50,
                },
            }, tooltip_options: {
            }
    });
	$("#edit_assessment").click(function(){
		if(!$('#assessment_form').valid() || !$('#assessment_form').data("validator")){
            return false;
        }
        $.ajax({
        	url: base_url+'/seller-car/edit-assessment',
        	data: getAssessmentData(),
        	method:"POST",
            contentType: false, 
            processData: false, 
        	success:function(result){
        		if(result != null && result['status'] == true){
        			alert("success");
                    if(result['data']['table_img'] != null){
                        $("#assessment_show_table").attr("src",base_url+"/"+result['data']['table_img']);
                        $("#assessment_show_table_a").attr("href",base_url+"/"+result['data']['table_img']);
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

    $("#add_assessment").click(function(){
        if(!$('#assessment_form').valid() || !$('#assessment_form').data("validator")){
            return false;
        }
        $.ajax({
            url: base_url+'/seller-car/add-assessment',
            data: getAssessmentData(),
            method:"POST",
            contentType: false, 
            processData: false, 
            success:function(result){
                if(result != null && result['status'] == true){
                    alert("success");
                    if(result['data']['table_img'] != null){
                        $("#assessment_show_table").attr("src",base_url+"/"+result['data']['table_img']);
                        $("#assessment_show_table_a").attr("href",base_url+"/"+result['data']['table_img']);
                    }
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
	function getAssessmentData(){
		var data = {};
		data.id = $("#assessment_id").val();
        data.advance = "";
		if($("#assessment_advance1").is(":checked")){
            data.advance = 1;
        }else if($("#assessment_advance2").is(":checked")){
            data.advance = 2;
        }
        data.advance_method = "";
        if($("#assessment_advance_method1").is(":checked")){
            data.advance_method = 1;
        }else if($("#assessment_advance_method2").is(":checked")){
            data.advance_method = 2;
        }
		data.place = $("#assessment_place").val();
		data.place_map = $("#assessment_place_map").val();
		data.situation = $("#assessment_situation").val();
		data.advance_date1 = $("#assessment_advance_date1").val();
		data.advance_date2 = $("#assessment_advance_date2").val();
		data.advance_date3 = $("#assessment_advance_date3").val();
		data.remark1 = $("#assessment_remark1").val();
		data.candidate_list = $("#assessment_candidate_list").val();
		data.assessor1 = $("#assessment_assessor1").val();
		data.assessor_id = $("#assessment_assessor_id").val();
		data.request_date = $("#assessment_request_date").val();
		data.assessor2 = $("#assessment_assessor2").val();
		data.arrival_date = $("#assessment_arrival_date").val();
		data.complete_confirmation = $("#assessment_complete_confirmation").val();
        data.synthetic = $("#assessment_synthetic").val();
        data.exterior = $("#assessment_exterior").val();
        data.interior = $("#assessment_interior").val();
        data.comment = $("#assessment_comment").val();
        data.rater = $("#assessment_rater").val();
        data.remark2 = $("#assessment_remark2").val();
        data.table_img = "";
        if($("#assessment_table_img")[0].files[0] != null)
            data.table_img = $("#assessment_table_img")[0].files[0];
		data._token = token;

        var formData = new FormData();
        formData.append('id', data.id);
        formData.append('advance', data.advance);
        formData.append('advance_method', data.advance_method);
        formData.append('place', data.place);
        formData.append('place_map', data.place_map);
        formData.append('situation', data.situation);
        formData.append('advance_date1', data.advance_date1);
        formData.append('advance_date2', data.advance_date2);
        formData.append('advance_date3', data.advance_date3);
        formData.append('remark1', data.remark1);
        formData.append('candidate_list', data.candidate_list);
        formData.append('assessor1', data.assessor1);
        formData.append('assessor_id', data.assessor_id);
        formData.append('request_date', data.request_date);
        formData.append('assessor2', data.assessor2);
        formData.append('arrival_date', data.arrival_date);
        formData.append('complete_confirmation', data.complete_confirmation);
        formData.append('synthetic', data.synthetic);
        formData.append('exterior', data.exterior);
        formData.append('interior', data.interior);
        formData.append('comment', data.comment);
        formData.append('rater', data.rater);
        formData.append('remark2', data.remark2);
        formData.append('table_img', data.table_img);
        formData.append('_token', data._token);
		return formData;
		
	}
})
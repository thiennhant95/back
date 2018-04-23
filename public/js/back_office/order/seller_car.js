$(document).ready(function() {
    $(".seller_car_edit_photo").click(function(){
        var formData = new FormData();
        if($("#seller_car_inspection_photo")[0].files[0] != null)
            formData.append('inspection_photo', $("#seller_car_inspection_photo")[0].files[0]);
        if($("#seller_car_document_photo")[0].files[0] != null)
            formData.append('document_photo', $("#seller_car_document_photo")[0].files[0]);
        formData.append('seller_car_id', $("#seller_car_id").val());
        formData.append('_token', token);
        $.ajax({
            url: base_url+'/seller-car/edit-photo',
            data: formData,
            method:"POST",
            contentType: false, 
            processData: false, 
            success:function(result){
                if(result != null && result['status'] == true){
                    alert("success");
                    if(result['data']['document_photo'] != null){
                        $("#seller_car_document_show").attr("src",base_url+"/"+result['data']['document_photo']);
                        $("#seller_car_document_show_a").attr("href",base_url+"/"+result['data']['document_photo']);
                    }
                    if(result['data']['inspection_photo'] != null){
                        $("#seller_car_inspection_show").attr("src",base_url+"/"+result['data']['inspection_photo']);
                        $("#seller_car_inspection_show_a").attr("href",base_url+"/"+result['data']['inspection_photo']);
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
	$(".seller_car_add_photo").click(function(){
        var formData = new FormData();
        if($("#seller_car_inspection_photo")[0].files[0] != null)
            formData.append('inspection_photo', $("#seller_car_inspection_photo")[0].files[0]);
        if($("#seller_car_document_photo")[0].files[0] != null)
            formData.append('document_photo', $("#seller_car_document_photo")[0].files[0]);
        formData.append('seller_car_id', $("#seller_car_id").val());
        formData.append('_token', token);
        $.ajax({
            url: base_url+'/seller-car/add-photo',
            data: formData,
            method:"POST",
            contentType: false, 
            processData: false, 
            success:function(result){
                if(result != null && result['status'] == true){
                    alert("success");
                    if(result['data']['document_photo'] != null){
                        $("#seller_car_document_show").attr("src",base_url+"/"+result['data']['document_photo']);
                        $("#seller_car_document_show_a").attr("href",base_url+"/"+result['data']['document_photo']);
                    }
                    if(result['data']['inspection_photo'] != null){
                        $("#seller_car_inspection_show").attr("src",base_url+"/"+result['data']['inspection_photo']);
                        $("#seller_car_inspection_show_a").attr("href",base_url+"/"+result['data']['inspection_photo']);
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
})
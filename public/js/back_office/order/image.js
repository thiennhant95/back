$(document).ready(function() {
    $(document).on("click",".image_edit_ajax",function(){
        var id = $(this).data('id');
        var formData = new FormData();
        formData.append('url', $("#image_url"+id)[0].files[0]);
        formData.append('index', $("#image_index_edit"+id).val());
        formData.append('name', $("#image_name_edit"+id).val());
        formData.append('id', id);
        formData.append('seller_car_id', $("#seller_car_id").val());
        formData.append('_token', token);
        $.ajax({
            url: base_url+'/seller-car/edit-image',
            data: formData,
            method:"POST",
            contentType: false, 
            processData: false, 
            success:function(result){
                if(result != null && result['status'] == true){
                    alert("success");
                    if(result['data'] != null){
                        $("#image_name_show_left"+id).val(result['data']['name']);
                        $("#image_name_show_right"+id).val(result['data']['name']);
                        if(result['data'].hasOwnProperty('url') && result['data']['url'] != null){
                            $("#image_url_show_a"+id).attr("href",base_url+"/"+result['data']['url']);
                            $("#image_url_show"+id).attr("src",base_url+"/"+result['data']['url']);
                        }
                        
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

    $("#image_add_ajax").click(function(){
        var formData = new FormData();
        formData.append('url', $("#image_add")[0].files[0]);
        formData.append('index', $("#image_index_add").val());
        formData.append('name', $("#image_name_add").val());
        formData.append('seller_car_id', $("#seller_car_id").val());
        formData.append('_token', token);
        $.ajax({
            url: base_url+'/seller-car/add-image',
            data: formData,
            method:"POST",
            contentType: false, 
            processData: false, 
            success:function(result){
                if(result != null && result['status'] == true){
                    alert("success");
                    imageInsertRow(result['data']);
                }else{
                    alert("fail");
                }
            },
            error:function(result){

            }
        })
        return false;
    })

    function imageInsertRow(data){
        var html = '<tr id="row_img_'+data['id']+'">';
        html += '<td class="text-center">';
        html += '<div style="margin-bottom:5px;">';
        html += '<a href="'+base_url+'/'+data['url']+'" id="image_url_show_a" rel="lightbox" class="lightbox_photo">';
        html += '<img src="'+base_url+'/'+data['url']+'" alt="車検証写真" width="120" id="image_url_show'+data['id']+'"></a>';
        html += '</div>';
        html += '<div>';
        html += '<input class="form-control input-sm notfocus" id="image_name_show_left'+data['id']+'" maxlength="20" type="text" value="'+data['name']+'" disabled="disabled"/>';
        html += '</div>';
        html += '</td>';
        html += '<td class="text-center">';
        html += '<div class="col col-md-12 PR0 PL0">';
        html += '<p class="iconclose"><button type="button" data-id="'+data['id']+'" class="close delete_image" aria-label="Close">';
        html += '<span aria-hidden="true">&times;</span>';
        html += '</button></p>';
        html += '</div>';
        html += '<div>';
        html += '<input class="form-control input-sm notfocus" id="image_name_show_right'+data['id']+'" maxlength="20" type="text" value="'+data['name']+'" disabled="disabled"/>';
        html += '</div><br> ';
        html += '<div class="text-center">';
        html += '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_edit_image'+data['id']+'">ファイル参照</button>';
        html += '<div class="modal fade" id="Modal_edit_image'+data['id']+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
        html += '<div class="modal-dialog modal-dialog-centered" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>';
        html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        html += '</div>';
        html += '<div class="modal-body">';   
        html += '<label for="image_url'+data['id']+'" class="custom-file-upload"></label>';                         
        html += '<input type="file" id="image_url'+data['id']+'">';                 
        html += '<select name="image_index_edit'+data['id']+'" class="form-control input-sm" id="image_index_edit'+data['id']+'">';                              
        html += '<option '+(data['index'] == 1?'selected':'')+' value="1">1</option>';                                   
        html += '<option '+(data['index'] == 2?'selected':'')+' value="2">2</option>';                                    
        html += '<option '+(data['index'] == 3?'selected':'')+' value="3">3</option>';                                      
        html += '<option '+(data['index'] == 4?'selected':'')+' value="4">4</option>';
        html += '<option '+(data['index'] == 5?'selected':'')+' value="5">5</option>';                                   
        html += '<option '+(data['index'] == 6?'selected':'')+' value="6">6</option>';                                    
        html += '<option '+(data['index'] == 7?'selected':'')+' value="7">7</option>';                                      
        html += '<option '+(data['index'] == 8?'selected':'')+' value="8">8</option>'; 
        html += '<option '+(data['index'] == 9?'selected':'')+' value="9">9</option>';                                   
        html += '<option '+(data['index'] == 10?'selected':'')+' value="10">10</option>';                                    
        html += '<option '+(data['index'] == 11?'selected':'')+' value="11">11</option>';                                      
        html += '<option '+(data['index'] == 12?'selected':'')+' value="12">12</option>';
        html += '<option '+(data['index'] == 13?'selected':'')+' value="13">13</option>';                                    
        html += '<option '+(data['index'] == 14?'selected':'')+' value="14">14</option>';                                      
        html += '<option '+(data['index'] == 15?'selected':'')+' value="15">15</option>';
        html += '<option '+(data['index'] == 16?'selected':'')+' value="16">16</option>';                                               
        html += '</select>';
        html += '<input type="text" id="image_name_edit'+data['id']+'" value="'+data['name']+'" >'; 
        html += '</div>'; 
        html += '<div class="modal-footer">';                                                
        html += '<button type="button" id="image_edit_ajax" data-id="'+data['id']+'" class="btn btn-secondary image_edit_ajax">Submit</button>'; 
        html += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'; 
        html += '</div>'; 
        html += '</div>'; 
        html += '</div>'; 
        html += '</div>'; 
        html += '</div>';
        html += '</td>';
        html += '</tr>';
        $("#image_content").append(html);        
    }

    $(document).on("click",".delete_image",function(){
        var id = $(this).data('id');
        $.ajax({
            url:base_url+'/seller-car/remove-image',
            data:{id:id,_token:token},
            method:"POST",
            dataType:'json',
            success:function(){
                $("#row_img_"+id).remove();
            }
        })
    })
})
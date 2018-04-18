$(".sort").click(function(e)
{
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(!$(this).hasClass('asc'))
    {
        $(this).addClass("asc");
        $(this).removeClass("desc");
    }
    else
    {
        $(this).removeClass("asc");
        $(this).addClass("desc");
    }
    if($(this).hasClass('asc'))
    {
        //Sort ASC
        var current_token = '{{csrf_token()}}';
        var column = $(this).attr('id');
        $.ajax({
            url: '/trader-sort',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {column: column, sort: 'asc', fuel_csrf_token: current_token},
            success: function( data, textStatus, jQxhr ){
                var result = JSON.parse(data);
                $('.pagination').html(result['pagination']);
                $('.ajax-sort tbody').html('');
                for(var i=0; i < result['count_list_assess']; i++)
                {
                    $('.ajax-sort tbody').append(
                        '<tr><td><a href="/crm/Photographers/edit/1">'+result["id"][i]+'</a></td><td>'+result["name"][i]+'</td><td><div class="col col-md-10 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">'+result["phonetic"][i]+'</div><div class="col col-md-2 text-center" style="border-bottom: 1px dashed rgb(192, 192, 192);"> <a href="/crm/Photographers" class="call_phone" incoming_number="'+result["phonetic"][i]+'" dial_number="0676706005" speaker_cd="'+result["id"][i]+'"><span class="glyphicon glyphicon-phone-alt"></span></a> <br></div></td><td><div class="col col-md-12 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">'+result["email1"][i]+'<br></div><div class="col col-md-12 text-left" style="padding-left: 0px;"></div></td><td>'+result["assessment_frequency"][i]+'</td><td>'+result["report_delivery_method"][i]+'</td><td class="text-right" style="vertical-align: middle;">'+result["number_complain"][i]+'回</td><td class="text-center" style="vertical-align: middle;"><form action="/crm/Photographers/delete/1" name="post_5a793d5ccfac9381289341" id="post_5a793d5ccfac9381289341" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"/></form><a href="#" class="btn btn-danger btn-xs" onclick="if (confirm(&#039;削除してよろしいですか？ # I0000?&#039;)) { document.post_5a793d5ccfac9381289341.submit(); } event.returnValue = false; return false;">削除</a></td></tr>'
                    );
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    }
    if($(this).hasClass('desc'))
    {
        //Sort DESC
        var current_token = '{{csrf_token()}}';
        var column = $(this).attr('id');
        $.ajax({
            url: '/trader-sort',
            dataType: 'text',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {column: column, sort: 'desc', fuel_csrf_token: current_token},
            success: function( data, textStatus, jQxhr ){
                var result = JSON.parse(data);
                $('.pagination').html(result['pagination']);
                $('.ajax-sort tbody').html('');
                for(var i=0; i < result['count_list_assess']; i++)
                {
                    $('.ajax-sort tbody').append(
                        '<tr><td><a href="/crm/Photographers/edit/1">'+result["id"][i]+'</a></td><td>'+result["name"][i]+'</td><td><div class="col col-md-10 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">'+result["phonetic"][i]+'</div><div class="col col-md-2 text-center" style="border-bottom: 1px dashed rgb(192, 192, 192);"> <a href="/crm/Photographers" class="call_phone" incoming_number="'+result["phonetic"][i]+'" dial_number="0676706005" speaker_cd="'+result["id"][i]+'"><span class="glyphicon glyphicon-phone-alt"></span></a> <br></div></td><td><div class="col col-md-12 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">'+result["email1"][i]+'<br></div><div class="col col-md-12 text-left" style="padding-left: 0px;"></div></td><td>'+result["assessment_frequency"][i]+'</td><td>'+result["report_delivery_method"][i]+'</td><td class="text-right" style="vertical-align: middle;">'+result["number_complain"][i]+'回</td><td class="text-center" style="vertical-align: middle;"><form action="/crm/Photographers/delete/1" name="post_5a793d5ccfac9381289341" id="post_5a793d5ccfac9381289341" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"/></form><a href="#" class="btn btn-danger btn-xs" onclick="if (confirm(&#039;削除してよろしいですか？ # I0000?&#039;)) { document.post_5a793d5ccfac9381289341.submit(); } event.returnValue = false; return false;">削除</a></td></tr>'
                    );
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    }
})

$(function(){
// 都道府県選択
    $(document).on('click', '.prefSelectExtension_link', function(){
        var pref_href = $(this).attr('href');
        var pref_id = pref_href.slice(47, -3);
        $.ajax({
            type: 'POST',
            url: '/crm/Areas/output_areas',
            datatype: 'json',
            data: {
                'pref_id' : pref_id
            }
        })
            .done(function(data){
                if (data != '') {
                    var json = $.parseJSON(data);

                    $('select.area_code').children().remove();
                    $('select.area_code').append('<option value="">----------</option>');
                    for (var i in json) {
                        $('select.area_code').append('<option value="' + json[i].area_code + '">' + json[i].area_name + '</option>');
                    }
                }
            })
            .fail(function(jqXHR, textStatus) {
            });
    });
});
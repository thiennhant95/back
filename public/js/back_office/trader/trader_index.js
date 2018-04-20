// $(".sort").click(function(e)
// {
//     alert('Function has not been updated!');
//     e.preventdefault();
// });

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
                $('.paginate_trader').html(result['pagination']);
                $('.ajax-sort tbody').html('');
                for(var i=0; i < result['count_list_trader']; i++)
                {
                    var string = result["name"][i];

                    var family_name = string.split("|")[0];
                    var first_name = string.split("|")[1];
                    if(first_name == undefined)
                    {
                        first_name = "";
                    }
                    $('.ajax-sort tbody').append(
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
                $('.paginate_trader').html(result['pagination']);
                $('.ajax-sort tbody').html('');
                for(var i=0; i < result['count_list_trader']; i++)
                {
                    var string = result["name"][i];
                    var family_name = string.split("|")[0];
                    var first_name = string.split("|")[1];
                    if(first_name == undefined)
                    {
                        first_name = "";
                    }
                    $('.ajax-sort tbody').append(

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


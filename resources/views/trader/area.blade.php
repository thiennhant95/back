@extends('layouts.master')
@section('title')
    社内システム: 業者対応地域
@endsection
@section('script')
    <script>
        $(function() {
            $('#trader_name').autocomplete({
                source: '/crm/traders/autoCompleteTraderName',
                disabled: false,
                autoFocus: true,
                select: function(event, ui) {
                    $('#trader_name').val(ui.item.trader_name);
                    $('.select_pref_div').removeAttr('style');
                    $('.choose_pref_div').html('<a class="btn btn-default btn-xs choose_pref2" trader_cd="' + ui.item.trader_cd + '">選択</a>');
                    $('.choose_pref_div').removeAttr('style');
                    $('.count_area_div').html('<label class="col col-md-4 control-label">対応地域</label><div class="col col-md-8 form-control-static count_area">' + ui.item.count_area + ' 市町村</div>');
                    $('.check_all_area_div').empty();
                    $('.uncheck_all_area_div').empty();
                    $('.choose_area_label').empty();
                    $('.trader_area').empty();
                    return false;
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li>")
                    .append("<a>" + item.trader_name + "</a>")
                    .appendTo(ul);
            };
            $(document).on('click', '.choose_pref2', function() {
                var choose_link = $(this);
                var div = $(this).parent();
                var pref_select = $('#TraderAreaPrefId');
                var pref_id = pref_select.val();
                if (pref_id == '') {
                    alert('都道府県が選択されていません。');
                    return false;
                }
                var prev_html = div.html();
                pref_select.attr('readonly', true);
                $('#trader_name').attr('readonly', true);
                $(this).hide();
                div.html('<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');
                $.ajax({
                    type: 'POST',
                    url: '/crm/TraderAreas/get_area_list',
                    datatype: 'html',
                    data: {
                        'trader_cd': choose_link.attr('trader_cd'),
                        'pref_id': pref_id
                    }
                })
                    .done(function(data) {
                        if (data != '') {
                            $('.trader_area').empty();
                            $('.trader_area').append(data);
                            div.html(prev_html);
                            pref_select.attr('readonly', false);
                            $('#trader_name').attr('readonly', false);
                            $('.trader_area').show();
                            $('.choose_area_label').html('地域選択');
                            $('.check_all_area_div').html('<a class="btn btn-primary btn-sm check_all_area" trader_cd="' + choose_link.attr('trader_cd') + '" pref_id="' + pref_id + '">全て登録</a>');
                            $('.uncheck_all_area_div').html('<a class="btn btn-danger btn-sm uncheck_all_area" trader_cd="' + choose_link.attr('trader_cd') + '" pref_id="' + pref_id + '">全て解除</a>');
                        } else {
                            alert('対応地域の取得に失敗しました。');
                            div.html(prev_html);
                            pref_select.attr('readonly', false);
                            $('#trader_name').attr('readonly', false);
                        }
                    })
                    .fail(function(jqXHR, textStatus) {
                        alert('対応地域が取得できませんでした。');
                        div.html(prev_html);
                        pref_select.attr('readonly', false);
                        $('#trader_name').attr('readonly', false);
                    });
                return false;
            });
            $(document).on('click', '.check_area', function() {
                var check_link = $(this);
                var div = $(this).parent();
                var pref_select = $('#TraderAreaPrefId');
                var pref_id = pref_select.val();
                var old_pref_id = check_link.attr('pref_id');
                if (pref_id != old_pref_id) {
                    alert('都道府県が変更されています。');
                    return false;
                }
                var prev_html = div.html();
                $(this).hide();
                div.html('<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');
                $.ajax({
                    type: 'POST',
                    url: '/crm/TraderAreas/support_area',
                    data: {
                        'trader_cd': check_link.attr('trader_cd'),
                        'pref_id': old_pref_id,
                        'area_code': check_link.attr('area_code')
                    }
                })
                    .done(function(data) {
                        if (data == '') {
                            var count_str = $('.count_area').html();
                            var count = count_str.match(/\d+/);
                            $('.count_area').html(addFigure(Number(count) + 1) + ' 市町村');
                            div.html('<a class="btn btn-danger btn-xs uncheck_area" id="TraderArea' + check_link.attr('area_code') + '" trader_cd="' + check_link.attr('trader_cd') + '" pref_id="' + old_pref_id + '" area_code="' + check_link.attr('area_code') + '">解除</a>');
                        } else {
                            alert(data);
                            div.html(prev_html);
                        }
                    })
                    .fail(function(jqXHR, textStatus) {
                        alert('対応地域の登録ができませんでした。');
                        div.html(prev_html);
                    });
                return false;
            });
            $(document).on('click', '.uncheck_area', function() {
                var uncheck_link = $(this);
                var div = $(this).parent();
                var pref_select = $('#TraderAreaPrefId');
                var pref_id = pref_select.val();
                var old_pref_id = uncheck_link.attr('pref_id');
                if (pref_id != old_pref_id) {
                    alert('都道府県が変更されています。');
                    return false;
                }
                var prev_html = div.html();
                $(this).hide();
                div.html('<img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');
                $.ajax({
                    type: 'POST',
                    url: '/crm/TraderAreas/unsupport_area',
                    data: {
                        'trader_cd': uncheck_link.attr('trader_cd'),
                        'pref_id': old_pref_id,
                        'area_code': uncheck_link.attr('area_code')
                    }
                })
                    .done(function(data) {
                        if (data == '') {
                            var count_str = $('.count_area').html();
                            var count = count_str.match(/\d+/);
                            $('.count_area').html(addFigure(Number(count) - 1) + ' 市町村');
                            div.html('<a class="btn btn-primary btn-xs check_area" id="TraderArea' + uncheck_link.attr('area_code') + '" trader_cd="' + uncheck_link.attr('trader_cd') + '" pref_id="' + old_pref_id + '" area_code="' + uncheck_link.attr('area_code') + '">登録</a>');
                        } else {
                            alert(data);
                            div.html(prev_html);
                        }
                    })
                    .fail(function(jqXHR, textStatus) {
                        alert('対応地域の解除ができませんでした。');
                        div.html(prev_html);
                    });
                return false;
            });
            $(document).on('click', '.check_all_area', function() {
                var check_link = $(this);
                var div = $(this).parent();
                var pref_select = $('#TraderAreaPrefId');
                var pref_id = pref_select.val();
                var old_pref_id = check_link.attr('pref_id');
                if (pref_id != old_pref_id) {
                    alert('都道府県が変更されています。');
                    return false;
                }
                if (confirm('一括登録してもよいですか？')) {
                    var prev_html = div.html();
                    $(this).hide();
                    div.html('<img src="/crm/img/load-30px.gif" id="loading" alt="loading" />');
                    $.ajax({
                        type: 'POST',
                        url: '/crm/TraderAreas/support_all_area',
                        data: {
                            'trader_cd': check_link.attr('trader_cd'),
                            'pref_id': old_pref_id
                        }
                    })
                        .done(function(data) {
                            if (data != '') {
                                var json = $.parseJSON(data);
                                $('.trader_area').empty();
                                $('.trader_area').append(json.trader_area_list);
                                $('.trader_area').show();
                                $('.count_area').html(json.trader_area_count + ' 市町村');
                                div.html('<a class="btn btn-success btn-sm check_all_area" trader_cd="' + check_link.attr('trader_cd') + '" pref_id="' + old_pref_id + '">登録済</a>');
                                $('.uncheck_all_area_div').html('<a class="btn btn-danger btn-sm uncheck_all_area" trader_cd="' + check_link.attr('trader_cd') + '" pref_id="' + old_pref_id + '">全て解除</a>');
                            } else {
                                alert('対応地域の登録に失敗しました');
                                div.html(prev_html);
                            }
                        })
                        .fail(function(jqXHR, textStatus) {
                            alert('対応地域の登録ができませんでした。');
                            div.html(prev_html);
                        });
                    return false;
                } else {
                    return false;
                }
            });
            $(document).on('click', '.uncheck_all_area', function() {
                var uncheck_link = $(this);
                var div = $(this).parent();
                var pref_select = $('#TraderAreaPrefId');
                var pref_id = pref_select.val();
                var old_pref_id = uncheck_link.attr('pref_id');
                if (pref_id != old_pref_id) {
                    alert('都道府県が変更されています。');
                    return false;
                }
                if (confirm('一括解除してもよいですか？')) {
                    var prev_html = div.html();
                    $(this).hide();
                    div.html('<img src="/crm/img/load-30px.gif" id="loading" alt="loading" />');
                    $.ajax({
                        type: 'POST',
                        url: '/crm/TraderAreas/unsupport_all_area',
                        data: {
                            'trader_cd': uncheck_link.attr('trader_cd'),
                            'pref_id': old_pref_id
                        }
                    })
                        .done(function(data) {
                            if (data != '') {
                                var json = $.parseJSON(data);
                                $('.trader_area').empty();
                                $('.trader_area').append(json.trader_area_list);
                                $('.trader_area').show();
                                $('.count_area').html(json.trader_area_count + ' 市町村');
                                div.html('<a class="btn btn-success btn-sm uncheck_all_area" trader_cd="' + uncheck_link.attr('trader_cd') + '" pref_id="' + old_pref_id + '">解除済</a>');
                                $('.check_all_area_div').html('<a class="btn btn-primary btn-sm check_all_area" trader_cd="' + uncheck_link.attr('trader_cd') + '" pref_id="' + old_pref_id + '">全て登録</a>');
                            } else {
                                alert('対応地域の解除に失敗しました');
                                div.html(prev_html);
                            }
                        })
                        .fail(function(jqXHR, textStatus) {
                            alert('対応地域の解除ができませんでした。');
                            div.html(prev_html);
                        });
                    return false;
                } else {
                    return false;
                }
            });
        });
    </script>
@endsection
@section('content')
    <div id="container">
        {{--{{session()->get('save_erea')}}--}}
        {{--{{session()->get('save')}}--}}
        <div id="header"></div>
        <div id="content">
            <!-- app/View/Traders/area.ctp -->
            <div class="col col-md-12">
                <blockquote>業者対応地域設定</blockquote>
            </div>
            <div class="col-md-9">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="col col-md-12 well form-horizontal">
                    <fieldset>
                        <div class="row">
                            <div class="form-group col col-md-4"><label for="trader_name" class="col col-md-4 control-label">業者名</label>
                                <div class="col col-md-8"><input name="data[TraderArea][name]" maxlength="100" id="trader_name" class="form-control input-sm" value="{{ session()->get('trader_first_name') }}" placeholder="部分一致" type="text" disabled="disabled" /></div>
                            </div>
                            <div class="form-group ool col-md-4"></div>
                            <div class="form-group col col-md-4 count_area_div"><label class="col col-md-4 control-label">対応地域</label>
                                <div class="col col-md-8 form-control-static count_area">  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col-md-4 select_pref_div" style="visibility: visible;"><label for="TraderAreaPrefId" class="col col-md-4 control-label">都道府県</label>
                                <div class="col col-md-8">
                                    <select name="data[TraderArea][pref_id]" class="form-control input-sm select-zone" >
                                        <option value="">----------</option>
                                        @foreach($list_zone as $key_zone => $zone)
                                            @if(session()->has('zone'))
                                                @if(session()->get('zone') == $zone->name)
                                                    <option value="{{ $zone->id }}" selected="selected">{{ $zone->name }}</option>
                                                @else
                                                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col col-md-4 form-control-static choose_pref_div">
                                <a href="/crm/traders/area/3" class="btn btn-default btn-xs choose_pref2" trader_cd="T00120025">選択</a></div>
                            <div class="form-group col col-md-4">
                                <label class="col col-md-4 control-label choose_area_label">地域選択</label>
                                <div class="col col-md-3 form-control-static text-center check_all_area_div">
                                    <a class="btn btn-primary btn-sm check_all_area" trader_cd="" pref_id="">全て登録</a>
                                </div>
                                <div class="col col-md-3 col-md-offset-2 form-control-static text-center uncheck_all_area_div">
                                    <a class="btn btn-danger btn-sm uncheck_all_area" trader_cd="" pref_id="">全て解除</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col col-md-12">
                <input type="hidden" id="select_erea" name="result_select_erea" value="@if(session()->has('corresponding_erea')){{ session()->get('corresponding_erea') }}@endif">
                <table id="buttonWrapper" class="table table-striped table-bordered table-condensed trader_area_list" style="table-layout: fixed;">
                    <tbody class="trader_area">
                    <tr id="assess_erea">

                    </tr>
                    </tbody>
                </table>
            </div>
            <?php
            Session::put('status_erea', '0');
            ?>
            <div class="col col-md-offset-5 col-md-2">
                <input type="hidden" id="status_erea" value="<?php Session::get('status_erea'); ?>">
                <button type="button" class="btn btn-primary btn-sm " id="save">Save</button>
            </div>
        </div>
        <script>
            setTimeout(window.location.reload, 3000);
            $(document).ready(function(){
                $(function() {
                    $(window).on("load", function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var current_token = '{{csrf_token()}}';
                        var select_erea = $("#select_erea").val();
                        var split_erea = select_erea.split(",");
                        for(var a=0; a<=split_erea.length-1; a++)
                        {
                            var erea = split_erea[a];
                        }
                        $.ajax({
                            url: '/trader/loadzone',
                            dataType: 'text',
                            type: 'post',
                            contentType: 'application/x-www-form-urlencoded',
                            data: {erea: erea,fuel_csrf_token: current_token},
                            success: function( data, textStatus, jQxhr ){
                                if(!window.location.hash) {
                                    window.location = window.location + '#loaded';
                                    window.location.reload();
                                }
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                                console.log( errorThrown );
                            }
                        });
                    });
                    $(".select-zone").mouseover(function()
                    {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var current_token = '{{csrf_token()}}';
                        var select_erea = $(this).val();
                        var select_erea_load = $("#select_erea").val();
                        var split_erea = select_erea_load.split(",");
                        $.ajax({
                            url: 'ajaxerea',
                            dataType: 'text',
                            type: 'post',
                            contentType: 'application/x-www-form-urlencoded',
                            data: {select_erea: select_erea,fuel_csrf_token: current_token},
                            success: function( data, textStatus, jQxhr ){
                                var result = JSON.parse(data);
                                $("#assess_erea").html('');
                                for(var i=0; i < result['count_erea']; i++)
                                {
                                    $("#assess_erea").append('<td>'+result[i]["name"]+' <a id="a" class="btn btn-default btn-xs choose_pref">選択</a></td>');
                                    $(".choose_pref").each(function(index,number)
                                    {
                                        for(var d=0; d<=split_erea.length-1; d++)
                                        {
                                            var erea = split_erea[d];
                                            var item = $(number).parent().text();
                                            var erea_name = item.split(" ");
                                            if(erea_name[0] == erea)
                                            {
                                                $(this).addClass("unchoise");
                                            }
                                        }
                                    })
                                }
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                                console.log( errorThrown );
                            }
                        });
                    });
                });

                $("#buttonWrapper").on('click','.choose_pref',function(e){
                    $(this).toggleClass('unchoise');
                    var count_select_erea = $(".unchoise").length+" 市町村";
                    $(".count_area").html(count_select_erea);
                    var erea_name = '';
                    $(".unchoise").each(function(index,number)
                    {
                        var item = $(number).parent().text();
                        if (index === ($(".unchoise").length - 1))
                        {
                            erea_name += item.split(" ")[0]
                        }
                        else
                        {
                            erea_name += item.split(" ")[0]+",";
                        }
                        $("#select_erea").val(erea_name);
                    })
                });
            });
            $(document).ready(function(){
                $(".check_all_area").on("click", function() {
                    $("#buttonWrapper a").removeClass("choise");
                    $(this).closest("#content").find("#buttonWrapper a").addClass("unchoise");
                    $(this).closest(".form-group").find(".uncheck_all_area_div a").removeClass("choiseactive");
                    $('.check_all_area').prop( "disabled", true ).addClass("choiseactive");
                    $(this).removeClass("unchoiseactive");
                    var count_select_erea = $(".unchoise").length+" 市町村";
                    $(".count_area").html(count_select_erea);
                    $("#select_erea").val('');
                    var erea_name = '';
                    $(".unchoise").each(function(index,number)
                    {
                        var item = $(number).parent().text();
                        if (index === ($(".unchoise").length - 1))
                        {
                            erea_name += item.split(" ")[0];
                        }
                        else
                        {
                            erea_name += item.split(" ")[0]+",";
                        }
                        $("#select_erea").val(erea_name);
                    })
                });
                $(".uncheck_all_area").on("click", function() {
                    $("#buttonWrapper a").removeClass("unchoise");
                    $(this).closest(".form-group").find(".check_all_area_div a").removeClass("choiseactive");
                    $('.uncheck_all_area').prop( "disabled", true ).addClass("choiseactive");
                    $(this).removeClass("unchoiseactive");
                    var count_select_erea = $(".unchoise").length+" 市町村";
                    $(".count_area").html(count_select_erea);
                    $("#select_erea").val('');
                    var erea_name = '';
                    $(".unchoise").each(function(index,number)
                    {
                        var item = $(number).parent().text();
                        if (index === ($(".unchoise").length - 1))
                        {
                            erea_name += item.split(" ")[0];
                        }
                        else
                        {
                            erea_name += item.split(" ")[0]+",";
                        }
                        $("#select_erea").val(erea_name);
                    })
                });
            });
            $(function() {
                $(".select-zone").change(function()
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var current_token = '{{csrf_token()}}';
                    var select_erea = $(this).val();
                    $.ajax({
                        url: 'ajaxerea',
                        dataType: 'text',
                        type: 'post',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {select_erea: select_erea,fuel_csrf_token: current_token},
                        success: function( data, textStatus, jQxhr ){
                            var result = JSON.parse(data);
                            $("#assess_erea").html('');
                            for(var i=0; i < result['count_erea']; i++)
                            {
                                $("#assess_erea").append('<td>'+result[i]["name"]+' <a id="a" class="btn btn-default btn-xs choose_pref">選択</a></td>');
                            }
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );
                        }
                    });
                });
                $("#save").click(function()
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var current_token = '{{csrf_token()}}';
                    var save_erea = $("#select_erea").val();
                    $.ajax({
                        url: 'saveerea',
                        dataType: 'text',
                        type: 'post',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {save_erea: save_erea,fuel_csrf_token: current_token},
                        success: function( data, textStatus, jQxhr ){
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );
                        }
                    });
                });
            });
        </script>
@endsection

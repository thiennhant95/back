@extends('layouts.master')
@section('title')
(10)社内システム:査定員一覧
@endsection
@section('script')
<script type="text/javascript">
//<![CDATA[
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

//]]>
</script>
@endsection
@section('content')
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!--  app/View/Photographers/index.ctp -->  
    <div class="col col-md-12">
      <blockquote>現地査定員</blockquote>
    </div>
    <div class="col col-md-12"> <a href="/crm/Photographers/add" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> 新規査定員登録</a></div>
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <form action="/assess" class="form-horizontal" id="PhotographerIndexForm" method="post" accept-charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         {{ csrf_field() }}
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <div class="col col-md-9">
          <div class="well">
            <fieldset>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="PhotographerPhotographerCd" class="col col-md-4 control-label">登録番号</label>
                  <div class="col col-md-8 required">
                    <input name="data[Photographer][photographer_cd]" class="form-control input-sm ime-disabled" maxlength="5" placeholder="完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="PhotographerName" class="col col-md-4 control-label">氏名</label>
                  <div class="col col-md-8">
                    <input name="data[Photographer][name]" class="form-control input-sm" maxlength="10" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="PhotographerPhoneNumber" class="col col-md-4 control-label">電話番号</label>
                  <div class="col col-md-8">
                    <input name="data[Photographer][phone_number]" class="form-control input-sm ime-disabled" maxlength="13" placeholder="完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="PhotographerEmail" class="col col-md-4 control-label">メール</label>
                  <div class="col col-md-8">
                    <input name="data[Photographer][email]" class="form-control input-sm ime-disabled" maxlength="100" placeholder="完全一致" type="email"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="PhotographerPrefId" class="col col-md-4 control-label">都道府県</label>
                  <div class="col col-md-8">
                    <select name="data[Photographer][pref_id]" class="form-control input-sm pref_name" id="PhotographerPrefId">
                      <option value="">----------</option>
                       @foreach($list_zone as $key_zone => $zone)
                       <optgroup label="{{ $zone->name }}">
                        @foreach($list_erea as $key_ereas => $ereas)
                          @if($key_ereas == $key_zone)
                            @foreach($ereas as $erea)
                              <option value="{{ $erea->id }}">{{ $erea->name }}</option>
                            @endforeach
                          @endif
                        @endforeach
                      </optgroup>
                       @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="PhotographerAreaCode" class="col col-md-4 control-label">市区町村名</label>
                  <div class="col col-md-8">
                    <select name="data[Photographer][area_code]" class="form-control input-sm area_code" id="PhotographerAreaCode">
                      <option value="">----------</option>
                      @foreach($list_zone as $zone)
                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="col col-md-3">
          <div class="col col-md-3">
            <button type="submit" name="search" class="btn btn-default col-md-12" style="margin: 60px 0px 0px;"><span class="glyphicon glyphicon-search"></span> 検索</button>
          </div>
          <div class="form-group col-md-3">
            <a href="/assess"><input  name="clear" class="btn btn-default col-md-12" style="margin: 60px 0px 0px;" type="button" value="クリア"/></a> 
          </div>
        </div>
      </form>
    </div>
    <div class="col col-md-12"> 1529 件中 1 ページ目 (1 ～ 50 件表示)<br>
      <div class="paging">
        {{ $list_assess->links() }}
      </div>
    </div>
    <div class="col col-md-12">
      <table class="table table-striped table-bordered table-hover table-condensed ajax-sort">
        <thead>
          <tr>
            <th><span class="sort" onmouseover="show_pointer(1)" style="color: #2A39FF" id="id">登録番号</span></th>
            <th><span class="sort" onmouseover="show_pointer(2)" style="color: #2A39FF" id="name">氏名</span></th>
            <th><span class="sort" onmouseover="show_pointer(3)" style="color: #2A39FF" id="phonetic">電話番号</span></th>
            <th><span class="sort" onmouseover="show_pointer(4)" style="color: #2A39FF" id="email1">メールアドレス</span></th>
            <th>査定回数</th>
            <th><span class="sort" onmouseover="show_pointer(5)" style="color: #2A39FF" id="report_delivery_method">査定レベル</span></th>
            <th><span class="sort" onmouseover="show_pointer(6)" style="color: #2A39FF" id="number_complain">クレーム回数</span></th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_assess as $assess)
          <tr>
            <td><a href="/crm/Photographers/edit/1">{{ $assess->id }}</a></td>
            <td>{{ $assess->name }}</td>
            <td><div class="col col-md-10 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">{{ $assess->phonetic }}</div>
              <div class="col col-md-2 text-center" style="border-bottom: 1px dashed rgb(192, 192, 192);"> <a href="/crm/Photographers" class="call_phone" incoming_number="{{ $assess->phonetic }}" dial_number="0676706005" speaker_cd="{{ $assess->id }}"><span class="glyphicon glyphicon-phone-alt"></span></a> <br>
              </div></td>
            <td><div class="col col-md-12 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">{{ $assess->email1 }}<br>
              </div>
              <div class="col col-md-12 text-left" style="padding-left: 0px;"></div></td>
            <td>{{ $assess->assessment_frequency }}</td>
            <td>{{ $assess->report_delivery_method }}</td>
            <td class="text-right" style="vertical-align: middle;">{{ $assess->number_complain }}回</td>
            <td class="text-center" style="vertical-align: middle;"><form action="/crm/Photographers/delete/1" name="post_5a793d5ccfac9381289341" id="post_5a793d5ccfac9381289341" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
              </form>
              <a href="#" class="btn btn-danger btn-xs" onclick="if (confirm(&#039;削除してよろしいですか？ # I0000?&#039;)) { document.post_5a793d5ccfac9381289341.submit(); } event.returnValue = false; return false;">削除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col col-md-12"> 1529 件中 1 ページ目 (1 ～ 50 件表示)<br>
      <div class="paging">
        {{ $list_assess->links() }}
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function show_pointer(id) {
  $(".sort").css({"cursor":"pointer"});
}
  $(".sort").click(function()
  {
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
          url: '/assess-sort',
          dataType: 'text',
          type: 'post',
          contentType: 'application/x-www-form-urlencoded',
          data: {column: column, sort: 'asc', fuel_csrf_token: current_token},
          success: function( data, textStatus, jQxhr ){
              var result = JSON.parse(data);
              $('.ajax-sort tbody').html(result['content']);
              $('.pagination').html(result['pagination']);
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
          url: '/assess-sort',
          dataType: 'text',
          type: 'post',
          contentType: 'application/x-www-form-urlencoded',
          data: {column: column, sort: 'desc', fuel_csrf_token: current_token},
          success: function( data, textStatus, jQxhr ){
              var result = JSON.parse(data);
              $('.ajax-sort tbody').html(result['content']);
              $('.pagination').html(result['pagination']);
          },
          error: function( jqXhr, textStatus, errorThrown ){
              console.log( errorThrown );
          }
      });
    }
  })
  </script>
@endsection
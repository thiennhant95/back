@extends('layouts.master')
@section('title')
(10)社内システム:ユーザ管理
@endsection
@section('script')
<script type="text/javascript">
//<![CDATA[
$(function(){
  $.datepicker.setDefaults({
    language: 'ja',
    dateFormat: 'yy-mm-dd',
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    todayHightlight: true,
    beforeShowDay: function(date) {
      var result;
      var dd = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();
      var hName = ktHolidayName(dd);
      if(hName != "") {
        result = [true, "date-holiday", hName];
      } else {
        switch (date.getDay()) {
        case 0:
          result = [true, "date-holiday"];
          break;
        case 6:
          result = [true, "date-saturday"];
          break;
        default:
          result = [true];
          break;
        }
      }
      return result;
    }
  });
  $('#ReTELDateFrom').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#ReTELDateTo').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#LastTELDateFrom').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#LastTELDateTo').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
});
</script>
@endsection
@section('content')
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!-- app/View/Traders/index.ctp -->
    
    <style>
	.selected{
		display: inline-block;
		font-weight:normal;
		margin-bottom: 0px;
		padding:7px 0px 0px 20px;
		vertical-align:middle;
		margin-left: 10px;
	}
	.selected input[type=checkbox]{
		margin: 4px 0px 0px -20px;
	}
</style>
    <div class="col col-md-12">
      <blockquote>ユーザ一覧</blockquote>
    </div>
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <div class="col col-md-4"> 
        <a href="/crm/traders/add" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> 新規ユーザ登録</a></div>
    </div>
    <div class="col-md-12">
　　　　　<form action="/crm/traders" class="form-horizontal" id="TraderIndexForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          <input name="_method" value="POST" type="hidden">
        </div>
        <fieldset class="well form-horizontal col col-md-10">
          <div class="row">
            <div class="form-group col col-md-3">
              <label for="TraderName" class="col col-md-4 control-label">名前</label>
              <div class="col col-md-8">
                <input name="data[Trader][name]" maxlength="10" class="form-control input-sm" placeholder="部分一致" type="text"/>
              </div>
            </div>
            <div class="form-group col col-md-3">
              <label for="TraderPhoneNumber" class="col col-md-4 control-label">電話番号</label>
              <div class="col col-md-8">
                <input name="data[Trader][phone_number]" maxlength="13" class="form-control input-sm ime-disabled" placeholder="完全一致" type="tel"/>
              </div>
            </div>
            <div class="form-group col col-md-3">
              <label for="TraderEmail" class="col col-md-4 control-label">メール</label>
              <div class="col col-md-8">
                <input name="data[Trader][email]" maxlength="13" class="form-control input-sm ime-disabled" placeholder="部分一致" type="tel"/>
              </div>
            </div>
          </div>
        </fieldset>       
        <div class="col col-md-2">
          <div class="form-group col col-md-5">
            <button type="submit" name="search" class="btn btn-default col-md-12" style="margin: 40px 0px 0px;"><span class="glyphicon glyphicon-search"></span> 検索</button>
          </div>
          <div class="form-group col-md-5">
            <input name="clear" class="btn btn-default col-md-12" style="margin: 40px 0px 0px 15px;" value="クリア" type="submit">
          </div>
        </div>
      </form>

    </div>
    <div class="col col-md-12"> 12597 件中 1 ページ目 (1 ～ 50 件表示)<br>
      <div class="paging">
        <ul class="pagination pagination-sm">
          <li class="disabled"><a href="/crm/Traders" tag="li">&lt;&lt;</a></li>
          <li class="disabled"><a href="/crm/Traders">&lt;</a></li>
          <li class="current disabled"><a href="#">1</a></li>
          <li><a href="/crm/Traders/index/page:2">2</a></li>
          <li><a href="/crm/Traders/index/page:3">3</a></li>
          <li><a href="/crm/Traders/index/page:4">4</a></li>
          <li><a href="/crm/Traders/index/page:5">5</a></li>
          <li><a href="/crm/Traders/index/page:2" rel="next">&gt;</a></li>
          <li><a href="/crm/Traders/index/page:252" rel="last">&gt;&gt;</a></li>
        </ul>
      </div>
    </div>
    <div class="col col-md-12">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th style="width: 100px;"><a href="/crm/Traders/index/sort:trader_kana_name/direction:asc">ユーザーコード</a></th>
            <th style="width: 200px;"><a href="/crm/Traders/index/sort:trader_kana_name/direction:asc">名前</a></th>
            <th style="width: 85px;"><a href="/crm/Traders/index/sort:zip_code/direction:asc">郵便番号</a></th>
            <th style="width: 100px;"><a href="/crm/Traders/index/sort:pref_id/direction:asc">都道府県</a></th>
            <th style="width: 300px;"><a href="/crm/Traders/index/sort:pref_id/direction:asc">市町村・番地</a></th>
            <th style="width: 200px;"><a href="/crm/Traders/index/sort:pref_id/direction:asc">建物・部屋番号</a></th>
            <th style="width: 150px;"><a href="/crm/Traders/index/sort:phone_number/direction:asc">電話番号</a></th>
            <th style="width: 250px;"><a href="/crm/Traders/index/sort:smart/direction:asc">メール</a></th>
            <th style="width: 150px;"><a href="/crm/Traders/index/sort:on_saturday/direction:asc">免許証番号</a></th>
            <th style="width: 500px;"><a href="/crm/Traders/index/sort:on_sunday/direction:asc">備考</a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="../user/detail.html">T00120003</a></td>
            <td> 樽谷 由実子<br></td>
            <td>160-0023</td>
            <td>東京都</td>
            <td class="text-left">新宿区西新宿7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center"> <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman09@stagegroup.jp</td>
            <td class="text-center">1234567890000</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120014</a></td>
            <td> 鎌田　ツヨシ<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120015</a></td>
            <td> 中時　健闘<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120016</a></td>
            <td> 内山　南<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120017</a></td>
            <td> 井上　千代美<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120018</a></td>
            <td> 佐藤<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120019</a></td>
            <td> 富永<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120020</a></td>
            <td> 本田<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120021</a></td>
            <td> 染谷<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120022</a></td>
            <td> ヤマモト<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120023</a></td>
            <td> 松山<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120015</a></td>
            <td> 鈴木<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120015</a></td>
            <td> トヨタ<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890001</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120015</a></td>
            <td> 代々木<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890014</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
          <tr>
            <td>
              <a href="../user/detail.html">T00120015</a></td>
            <td> 新宿<br></td>
            <td>080-2460</td>
            <td>北海道</td>
            <td class="text-left">帯広市西20条7-4-3</td>
            <td class="text-left">升本ビル4階</td>
            <td><div class="col col-md-9 text-left" >03-5937-4886<br>
              </div>
              <div class="col col-md-3 text-center" > <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a>
              </div>
            <td class="text-center">superman01@stagegroup.jp</td>
            <td class="text-center">1234567890015</td>
            <td class="text-center">アテアテアテ</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col col-md-12"> 12597 件中 1 ページ目 (1 ～ 50 件表示)<br>
      <div class="paging">
        <ul class="pagination pagination-sm">
          <li class="disabled"><a href="/crm/Traders" tag="li">&lt;&lt;</a></li>
          <li class="disabled"><a href="/crm/Traders">&lt;</a></li>
          <li class="current disabled"><a href="#">1</a></li>
          <li><a href="/crm/Traders/index/page:2">2</a></li>
          <li><a href="/crm/Traders/index/page:3">3</a></li>
          <li><a href="/crm/Traders/index/page:4">4</a></li>
          <li><a href="/crm/Traders/index/page:5">5</a></li>
          <li><a href="/crm/Traders/index/page:2" rel="next">&gt;</a></li>
          <li><a href="/crm/Traders/index/page:252" rel="last">&gt;&gt;</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
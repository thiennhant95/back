@extends('layouts.master')
@section('title')
(10)社内システム:出品管理
@endsection
@section('script')
<script>
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
  $('#fromagreement').datepicker({
    onClose: function(selectedDate) {
      $('#toagreement').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#toagreement').datepicker({
    onClose: function(selectedDate) {
      $('#fromagreement').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#fromtrade').datepicker({
    onClose: function(selectedDate) {
      $('#totrade').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#totrade').datepicker({
    onClose: function(selectedDate) {
      $('#fromtrade').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#FromTradeSchedule').datepicker({
    onClose: function(selectedDate) {
      $('#ToTradeSchedule').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#ToTradeSchedule').datepicker({
    onClose: function(selectedDate) {
      $('#FromTradeSchedule').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#FromInquiryDate').datepicker({
    onClose: function(selectedDate) {
      $('#ToInquiryDate').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#ToInquiryDate').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#AuctionEndDateFrom').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#AuctionEndDateTo').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#ContractArrivalDateFrom').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#ContractArrivalDateTo').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#DifferenceDateFrom').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#DifferenceDateTo').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#TransferDateFrom').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#TransferDateTo').datepicker({
    onClose: function(selectedDate) {
      $('#FromInquiryDate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  
});

//]]>
</script>
@endsection
@section('content')
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!--  app/View/agreementorders/index.ctp -->
    
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <form action="/order" class="form-horizontal" id="agreementorderIndexForm" method="post" accept-charset="utf-8">
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
                  <label for="agreementorderId" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">成約番号</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][id]" class="form-control input-sm ime-disabled" maxlength="10" placeholder="完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="agreementorderName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">氏名</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="agreementorderPhoneNumber" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">電話番号</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][phone_number]" class="form-control input-sm ime-disabled" maxlength="13" placeholder="下4桁完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="agreementorderOwnCarName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">車種名</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][own_car_name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromagreement" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">出品日時</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][agreement_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromagreement" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="toagreement" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][agreement_end]" class="form-control input-sm ime-disabled" maxlength="10" id="toagreement" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="agreementorderMileage" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">走行距離</label>
                  <div class="col col-md-8">
                    <select name="data[agreementorder][mileage]" class="form-control input-sm mileage" id="agreementorderMileage">
                      <option value="">----------</option>
                      <option value="1">0～9,999km</option>
                      <option value="2">10,000～19,999km</option>
                      <option value="3">20,000～29,999km</option>
                      <option value="4">30,000～39,999km</option>
                      <option value="5">40,000～49,999km</option>
                      <option value="6">50,000～59,999km</option>
                      <option value="7">60,000～69,999km</option>
                      <option value="8">70,000～79,999km</option>
                      <option value="9">80,000～89,999km</option>
                      <option value="10">90,000～99,999km</option>
                      <option value="11">100,000～109,999km</option>
                      <option value="12">110,000～119,999km</option>
                      <option value="13">120,000～129,999km</option>
                      <option value="14">130,000～139,999km</option>
                      <option value="15">140,000～149,999km</option>
                      <option value="16">150,000～159,999km</option>
                      <option value="17">160,000～169,999km</option>
                      <option value="18">170,000～179,999km</option>
                      <option value="19">180,000～189,999km</option>
                      <option value="20">190,000～199,999km</option>
                      <option value="21">200,000km以上</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="agreementorderPrefName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">都道府県</label>
                  <div class="col col-md-8">
                    <select name="data[agreementorder][pref_name]" class="form-control input-sm pref_name" id="agreementorderPrefName">
                      <option value="">----------</option>
                      <optgroup label="北海道">
                      <option value="1">北海道</option>
                      </optgroup>
                      <optgroup label="東北">
                      <option value="2">青森県</option>
                      <option value="3">岩手県</option>
                      <option value="4">宮城県</option>
                      <option value="5">秋田県</option>
                      <option value="6">山形県</option>
                      <option value="7">福島県</option>
                      </optgroup>
                      <optgroup label="関東">
                      <option value="8">茨城県</option>
                      <option value="9">栃木県</option>
                      <option value="10">群馬県</option>
                      <option value="11">埼玉県</option>
                      <option value="12">千葉県</option>
                      <option value="13">東京都</option>
                      <option value="14">神奈川県</option>
                      </optgroup>
                      <optgroup label="北陸">
                      <option value="15">新潟県</option>
                      <option value="16">富山県</option>
                      <option value="17">石川県</option>
                      <option value="18">福井県</option>
                      </optgroup>
                      <optgroup label="中部">
                      <option value="19">山梨県</option>
                      <option value="20">長野県</option>
                      <option value="21">岐阜県</option>
                      <option value="22">静岡県</option>
                      <option value="23">愛知県</option>
                      </optgroup>
                      <optgroup label="関西">
                      <option value="24">三重県</option>
                      <option value="25">滋賀県</option>
                      <option value="26">京都府</option>
                      <option value="27">大阪府</option>
                      <option value="28">兵庫県</option>
                      <option value="29">奈良県</option>
                      <option value="30">和歌山県</option>
                      </optgroup>
                      <optgroup label="中国">
                      <option value="31">鳥取県</option>
                      <option value="32">島根県</option>
                      <option value="33">岡山県</option>
                      <option value="34">広島県</option>
                      <option value="35">山口県</option>
                      </optgroup>
                      <optgroup label="四国">
                      <option value="36">徳島県</option>
                      <option value="37">香川県</option>
                      <option value="38">愛媛県</option>
                      <option value="39">高知県</option>
                      </optgroup>
                      <optgroup label="九州">
                      <option value="40">福岡県</option>
                      <option value="41">佐賀県</option>
                      <option value="42">長崎県</option>
                      <option value="43">熊本県</option>
                      <option value="44">大分県</option>
                      <option value="45">宮崎県</option>
                      <option value="46">鹿児島県</option>
                      </optgroup>
                      <optgroup label="沖縄">
                      <option value="47">沖縄県</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="AuctionEndDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">オークション終了日時</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][s_deadline]" class="form-control input-sm ime-disabled" maxlength="10" id="AuctionEndDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="AuctionEndDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][e_deadline]" class="form-control input-sm ime-disabled" maxlength="10" id="AuctionEndDateTo" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="FromTradeSchedule" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">引取予定日</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][trade_schedule_start]" class="form-control input-sm ime-disabled" maxlength="10" id="FromTradeSchedule" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ToTradeSchedule" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][trade_schedule_end]" class="form-control input-sm ime-disabled" maxlength="10" id="ToTradeSchedule" autocomplete="off" type="tel"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromtrade" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">引取完了日</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][trade_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromtrade" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="totrade" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][trade_end]" class="form-control input-sm ime-disabled" maxlength="10" id="totrade" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ContractArrivalDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">業者着金日</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][start_receive]" class="form-control input-sm ime-disabled" maxlength="10" id="ContractArrivalDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ContractArrivalDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][end_receive]" class="form-control input-sm ime-disabled" maxlength="10" id="ContractArrivalDateTo" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="DifferenceDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">差異金額対応日</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][sa_receive]" class="form-control input-sm ime-disabled" maxlength="10" id="DifferenceDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="DifferenceDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][ea_receive]" class="form-control input-sm ime-disabled" maxlength="10" id="DifferenceDateTo" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="TransferDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">ユーザー振込日</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][start_deposite]" class="form-control input-sm ime-disabled" maxlength="10" id="TransferDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="TransferDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[agreementorder][end_deposite]" class="form-control input-sm ime-disabled" maxlength="10" id="TransferDateTo" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="agreementorderSalesContact" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">落札業者</label>
                  <div class="col col-md-8">
                    <select name="data[agreementorder][sales_contact]" class="form-control input-sm" id="agreementorderSalesContact">
                      <option value="">----------</option>
                      <option value="1">業者</option>
                      <option value="2">業者 (書類)</option>
                      <option value="3">業者 (交渉)</option>
                      <option value="4">オークション</option>
                      <option value="5">国内販売</option>
                      <option value="6">Smartオークション</option>
                      <option value="7">Smartオークション (書類)</option>
                      <option value="8">キャンセル</option>
                      <option value="9">その他</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="agreementorderDisplacement" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">排気量</label>
                  <div class="col col-md-8">
                    <select name="data[agreementorder][displacement]" class="form-control input-sm" id="agreementorderDisplacement">
                      <option value="">----------</option>
                      <option value="1">1,000cc未満</option>
                      <option value="2">1,000～1,999cc</option>
                      <option value="3">2,000～2,999cc</option>
                      <option value="4">3,000～3,999cc</option>
                      <option value="5">4,000～4,999cc</option>
                      <option value="6">5,000cc以上</option>
                    </select>
                  </div>
                </div>
              </div>	
          </div>
        </div>
        <div class="col col-md-3">
          <div class="col col-md-3">
            <button type="submit" name="search" class="btn btn-default col-md-12" style="margin: 105px 0px 0px;"><span class="glyphicon glyphicon-search"></span> 検索</button>
          </div>
          <div class="form-group col-md-3">
            <a href="/order"><input  name="clear" class="btn btn-default col-md-12" style="margin: 105px 0px 0px;" type="button" value="クリア"/></a>
          </div>
        </div>
      </form>
    </div>
      <div class="paginate_order">
        {{ $list_order->links('layouts.pagination') }}
      </div>
    </div>
    <div class="col col-md-12">
      <table class="table table-striped table-bordered table-hover table-condensed ajax-sort">
        <thead>
          <tr>
            <th style="width: 65px;"><span class="sort" onmouseover="show_pointer(1)" style="color: #2A39FF" id="order.id">番号</span></th>
            <th style="width: 150px;"><span class="sort" onmouseover="show_pointer(2)" style="color: #2A39FF" id="seller.name">氏名</span></th>
            <th style="width: 140px;">備考</th>
            <th style="width: 85px;"><span class="sort" onmouseover="show_pointer(3)" style="color: #2A39FF" id="seller.erea_id">都道府県</span></th>
            <th><span class="sort" onmouseover="show_pointer(0)" style="color: #2A39FF" id="seller_car_information.car_name">車種</span></th>
            <th style="width: 75px;"><span class="sort" onmouseover="show_pointer(4)" style="color: #2A39FF" id="displacement">排気量</span></th>
            <th style="width: 100px;"><span class="sort" onmouseover="show_pointer(5)" style="color: #2A39FF" id="car_year">年式</span></th>
            <th style="width: 100px;"><span class="sort" onmouseover="show_pointer(6)" style="color: #2A39FF" id="mileage">走行距離</span></th>
            <th style="width: 70px;"><span class="sort" onmouseover="show_pointer(7)" style="color: #2A39FF" id="end_desired_date">出品日時</span></th>
            <th style="width: 100px;"><span class="sort" onmouseover="show_pointer(8)" style="color: #2A39FF" id="deadline">オークション終了日時</span></th>
            <th style="width: 30px;"><span class="sort" onmouseover="show_pointer(9)" style="color: #2A39FF" id="refund_fee">入札数</span></th>
            <th style="width: 130px;"><span class="sort" onmouseover="show_pointer(10)" style="color: #2A39FF" id="seller_car_refund.weight_tax_refund">落札業者</span></th>
            <th style="width: 85px;"><span class="sort" onmouseover="show_pointer(11)" style="color: #2A39FF" id="count">落札金額</span></th>
            <th style="width: 85px;"><span class="sort" onmouseover="show_pointer(12)" style="color: #2A39FF" id="seller_car_sale.destination">自動車税還付金額</span></th>
            <th style="width: 85px;"><span class="sort" onmouseover="show_pointer(13)" style="color: #2A39FF" id="final_charge_amount">自賠責</span></th>
            <th style="width: 85px;"><span class="sort" onmouseover="show_pointer(14)" style="color: #2A39FF" id="ref">重量税</span></th>
            <th style="width: 85px;"><span class="sort" onmouseover="show_pointer(15)" style="color: #2A39FF" id="namea">リ料</span></th>
            <th style="width: 100px;"><span class="sort" onmouseover="show_pointer(16)" style="color: #2A39FF" id="namea">手数料金額</span></th>
            <th style="width: 120px;"><span class="sort" onmouseover="show_pointer(17)" style="color: #2A39FF" id="namea">業者請求金額</span></th>
            <th style="width: 100px;"><span class="sort" onmouseover="show_pointer(18)" style="color: #2A39FF" id="first_date">業者請求日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(19)" style="color: #2A39FF" id="receivable_date">業者着金日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(20)" style="color: #2A39FF" id="document_register_date">書類到着確認日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(21)" style="color: #2A39FF" id="namea">書類発送日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(22)" style="color: #2A39FF" id="namea">引取予定日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(23)" style="color: #2A39FF" id="nnameaame">引取完了日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(24)" style="color: #2A39FF" id="namea">確定金額差異</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(25)" style="color: #2A39FF" id="namea">差異金額対応日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(26)" style="color: #2A39FF" id="namea">ユーザー振込金額</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(27)" style="color: #2A39FF" id="deposite_due_date">ユーザー振込日</span></th>
            <th style="width: 90px;"><span class="sort" onmouseover="show_pointer(28)" style="color: #2A39FF" id="first_inquiry_date">初回問合日</span></th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_order as $order)
          <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            @foreach($various_costs as $key_various_cost => $various_cost)
            @if($key_various_cost == $order->seller_car)
              @if($various_cost == '')
                <td></td>
              @else
                <td>{{ $various_cost->remark }}</td>
              @endif
            @endif
            @endforeach
            <td>{{ $order->erea_id }}</td>
            <td>{{ $order->car_name }}</td>
            <td>{{ $order->displacement }}</td>
            <td>{{ $order->car_year }}</td>
            <td>{{ $order->mileage }}</td>
            <td>{{ $order->end_desired_date }}</td>
            <td>{{ $order->deadline }}</td>
            @foreach($count_order_detail as $key_seller_car => $count_order)
            @if($key_seller_car == $order->seller_car)
            <td>{{ $count_order }}</td>
            @endif
            @endforeach
            <td>{{ $order->destination }}</td>
            @foreach($price_max as $key_price_max => $price)
            @if($key_price_max == $order->seller_car)
            <td>{{ $price }}</td>
            @endif
            @endforeach
            <td>{{ $order->refund_fee }}</td>
            <td></td>
            <td>{{ $order->weight_tax_refund }}</td>
            <td>{{ $order->final_charge_amount }}</td>
            @foreach($various_costs as $key_various_cost => $various_cost)
            @if($key_various_cost == $order->seller_car)
              @if($various_cost == '')
                <td></td>
              @else
                <td>{{ $various_cost->commission }}</td>
              @endif
            @endif
            @endforeach
            <td></td>
            <td>{{ $order->first_date }}</td>
            <td>{{ $order->receivable_date }}</td>
            <td>{{ $order->document_register_date }}</td>
            <td></td>
            <td></td>
            <td></td>
            @foreach($price_differences as $key_price_difference => $price_difference)
            @if($key_price_difference == $order->seller_car)
            <td>{{ $price_difference }}</td>
            @endif
            @endforeach
            <td></td>
            <td></td>
            <td>{{ $order->deposite_due_date }}</td>
            <td>{{ $order->first_inquiry_date }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      <div class="paginate_order">
        {{ $list_order->links('layouts.pagination') }}
      </div>
    </div>
  </div>
<script>
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
          url: '/order-sort',
          dataType: 'text',
          type: 'post',
          contentType: 'application/x-www-form-urlencoded',
          data: {column: column, sort: 'asc', fuel_csrf_token: current_token},
          success: function( data, textStatus, jQxhr ){
              var result = JSON.parse(data);
              $('.paginate_order').html(result['pagination']);
              $('.ajax-sort tbody').html('');
              for(var i=0; i < result['count_list_order']; i++)
              {
                (result["id"][i] !== null) ? result["id"][i] : result["id"][i] = '';
                (result["name"][i] !== null) ? result["name"][i] : result["name"][i] = '';
                (result["erea_id"][i] !== null) ? result["erea_id"][i] : result["erea_id"][i] = '';
                (result["car_name"][i] !== null) ? result["car_name"][i] : result["car_name"][i] = '';
                (result["displacement"][i] !== null) ? result["displacement"][i] : result["displacement"][i] = '';
                (result["car_year"][i] !== null) ? result["car_year"][i] : result["car_year"][i] = '';
                (result["mileage"][i] !== null) ? result["mileage"][i] : result["mileage"][i] = '';
                (result["end_desired_date"][i] !== null) ? result["end_desired_date"][i] : result["end_desired_date"][i] = '';
                (result["refund_fee"][i] !== null) ? result["refund_fee"][i] : result["refund_fee"][i] = '';
                (result["weight_tax_refund"][i] !== null) ? result["weight_tax_refund"][i] : result["weight_tax_refund"][i] = '';
                (result["first_inquiry_date"][i] !== null) ? result["first_inquiry_date"][i] : result["first_inquiry_date"][i] = '';
                (result["destination"][i] !== null) ? result["destination"][i] : result["destination"][i] = '';
                (result["final_charge_amount"][i] !== null) ? result["final_charge_amount"][i] : result["final_charge_amount"][i] = '';
                (result["deadline"][i] !== null) ? result["deadline"][i] : result["deadline"][i] = '';
                (result["deposite_due_date"][i] !== null) ? result["deposite_due_date"][i] : result["deposite_due_date"][i] = '';
                (result["document_register_date"][i] !== null) ? result["document_register_date"][i] : result["document_register_date"][i] = '';
                (result["receivable_date"][i] !== null) ? result["receivable_date"][i] : result["receivable_date"][i] = '';
                (result["first_date"][i] !== null) ? result["first_date"][i] : result["first_date"][i] = '';
                $('.ajax-sort tbody').append(
                  '<tr><td><a href="/assess/edit/'+result["id"][i]+'">'+result["id"][i]+'</a></td><td>'+result["name"][i]+'</td><td></td><td>'+result["erea_id"][i]+'</td><td>'+result["car_name"][i]+'</td><td>'+result["displacement"][i]+'</td><td>'+result["car_year"][i]+'</td><td>'+result["mileage"][i]+'</td><td>'+result["end_desired_date"][i]+'</td><td>'+result["deadline"][i]+'</td><td></td><td>'+result["destination"][i]+'</td><td></td><td>'+result["refund_fee"][i]+'</td><td></td><td>'+result["weight_tax_refund"][i]+'</td><td>'+result["final_charge_amount"][i]+'</td><td></td><td></td><td>'+result["first_date"][i]+'</td><td>'+result["receivable_date"][i]+'</td><td>'+result["document_register_date"][i]+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td>'+result["deposite_due_date"][i]+'</td><td>'+result["first_inquiry_date"][i]+'</td></tr>'
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
          url: '/order-sort',
          dataType: 'text',
          type: 'post',
          contentType: 'application/x-www-form-urlencoded',
          data: {column: column, sort: 'desc', fuel_csrf_token: current_token},
          success: function( data, textStatus, jQxhr ){
              var result = JSON.parse(data);
              $('.paginate_assess').html(result['pagination']);
              $('.ajax-sort tbody').html('');
              for(var i=0; i < result['count_list_order']; i++)
              {
                (result["id"][i] !== null) ? result["id"][i] : result["id"][i] = '';
                (result["name"][i] !== null) ? result["name"][i] : result["name"][i] = '';
                (result["erea_id"][i] !== null) ? result["erea_id"][i] : result["erea_id"][i] = '';
                (result["car_name"][i] !== null) ? result["car_name"][i] : result["car_name"][i] = '';
                (result["displacement"][i] !== null) ? result["displacement"][i] : result["displacement"][i] = '';
                (result["car_year"][i] !== null) ? result["car_year"][i] : result["car_year"][i] = '';
                (result["mileage"][i] !== null) ? result["mileage"][i] : result["mileage"][i] = '';
                (result["end_desired_date"][i] !== null) ? result["end_desired_date"][i] : result["end_desired_date"][i] = '';
                (result["refund_fee"][i] !== null) ? result["refund_fee"][i] : result["refund_fee"][i] = '';
                (result["weight_tax_refund"][i] !== null) ? result["weight_tax_refund"][i] : result["weight_tax_refund"][i] = '';
                (result["first_inquiry_date"][i] !== null) ? result["first_inquiry_date"][i] : result["first_inquiry_date"][i] = '';
                (result["destination"][i] !== null) ? result["destination"][i] : result["destination"][i] = '';
                (result["final_charge_amount"][i] !== null) ? result["final_charge_amount"][i] : result["final_charge_amount"][i] = '';
                (result["deadline"][i] !== null) ? result["deadline"][i] : result["deadline"][i] = '';
                (result["deposite_due_date"][i] !== null) ? result["deposite_due_date"][i] : result["deposite_due_date"][i] = '';
                (result["document_register_date"][i] !== null) ? result["document_register_date"][i] : result["document_register_date"][i] = '';
                (result["receivable_date"][i] !== null) ? result["receivable_date"][i] : result["receivable_date"][i] = '';
                (result["first_date"][i] !== null) ? result["first_date"][i] : result["first_date"][i] = '';
                $('.ajax-sort tbody').append(
                  '<tr><td><a href="/assess/edit/'+result["id"][i]+'">'+result["id"][i]+'</a></td><td>'+result["name"][i]+'</td><td></td><td>'+result["erea_id"][i]+'</td><td>'+result["car_name"][i]+'</td><td>'+result["displacement"][i]+'</td><td>'+result["car_year"][i]+'</td><td>'+result["mileage"][i]+'</td><td>'+result["end_desired_date"][i]+'</td><td>'+result["deadline"][i]+'</td><td></td><td>'+result["destination"][i]+'</td><td></td><td>'+result["refund_fee"][i]+'</td><td></td><td>'+result["weight_tax_refund"][i]+'</td><td>'+result["final_charge_amount"][i]+'</td><td></td><td></td><td>'+result["first_date"][i]+'</td><td>'+result["receivable_date"][i]+'</td><td>'+result["document_register_date"][i]+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td>'+result["deposite_due_date"][i]+'</td><td>'+result["first_inquiry_date"][i]+'</td></tr>'
                );
              }
          },
          error: function( jqXhr, textStatus, errorThrown ){
              console.log( errorThrown );
          }
      });
    }
  })
</script>
@endsection
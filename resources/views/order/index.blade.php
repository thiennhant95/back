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
    <!--  app/View/AgreementOrders/index.ctp -->
    
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <form action="/crm/AgreementOrders" class="form-horizontal" id="AgreementOrderIndexForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <div class="col col-md-9">
          <div class="well">
            <fieldset>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="AgreementOrderId" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">成約番号</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][id]" class="form-control input-sm ime-disabled" maxlength="10" placeholder="完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="AgreementOrderName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">氏名</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="AgreementOrderPhoneNumber" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">電話番号</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][phone_number]" class="form-control input-sm ime-disabled" maxlength="13" placeholder="下4桁完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="AgreementOrderOwnCarName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">車種名</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][own_car_name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromagreement" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">出品日時</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][agreement_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromagreement" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="toagreement" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][agreement_end]" class="form-control input-sm ime-disabled" maxlength="10" id="toagreement" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="AgreementOrderMileage" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">走行距離</label>
                  <div class="col col-md-8">
                    <select name="data[AgreementOrder][mileage]" class="form-control input-sm mileage" id="AgreementOrderMileage">
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
                  <label for="AgreementOrderPrefName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">都道府県</label>
                  <div class="col col-md-8">
                    <select name="data[AgreementOrder][pref_name]" class="form-control input-sm pref_name" id="AgreementOrderPrefName">
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
                    <input name="data[AgreementOrder][auction_end_date]" class="form-control input-sm ime-disabled" maxlength="10" id="AuctionEndDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="AuctionEndDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_schedule_end]" class="form-control input-sm ime-disabled" maxlength="10" id="AuctionEndDateTo" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="FromTradeSchedule" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">引取予定日</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_schedule_start]" class="form-control input-sm ime-disabled" maxlength="10" id="FromTradeSchedule" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ToTradeSchedule" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_schedule_end]" class="form-control input-sm ime-disabled" maxlength="10" id="ToTradeSchedule" autocomplete="off" type="tel"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromtrade" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">引取完了日</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromtrade" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="totrade" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_end]" class="form-control input-sm ime-disabled" maxlength="10" id="totrade" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ContractArrivalDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">業者着金日</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_start]" class="form-control input-sm ime-disabled" maxlength="10" id="ContractArrivalDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ContractArrivalDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_end]" class="form-control input-sm ime-disabled" maxlength="10" id="ContractArrivalDateTo" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="DifferenceDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">差異金額対応日</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_start]" class="form-control input-sm ime-disabled" maxlength="10" id="DifferenceDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="DifferenceDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_end]" class="form-control input-sm ime-disabled" maxlength="10" id="DifferenceDateTo" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="TransferDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">ユーザー振込日</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_start]" class="form-control input-sm ime-disabled" maxlength="10" id="TransferDateFrom" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="TransferDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[AgreementOrder][trade_end]" class="form-control input-sm ime-disabled" maxlength="10" id="TransferDateTo" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="AgreementOrderSalesContact" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">落札業者</label>
                  <div class="col col-md-8">
                    <select name="data[AgreementOrder][sales_contact]" class="form-control input-sm" id="AgreementOrderSalesContact">
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
                  <label for="AgreementOrderDisplacement" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">排気量</label>
                  <div class="col col-md-8">
                    <select name="data[AgreementOrder][displacement]" class="form-control input-sm" id="AgreementOrderDisplacement">
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
            <input  name="clear" class="btn btn-default col-md-12" style="margin: 105px 0px 0px;" type="submit" value="クリア"/>
          </div>
        </div>
      </form>
    </div>
    <div class="col col-md-12"> 630 件中 1 ページ目 (1 ～ 50 件表示)<br />
      <div class="paging">
        <ul class="pagination pagination-sm">
          <li class="disabled"><a href="/crm/AgreementOrders" tag="li">&lt;&lt;</a></li>
          <li class="disabled"><a href="/crm/AgreementOrders">&lt;</a></li>
          <li class="current disabled"><a href="#">1</a></li>
          <li><a href="/crm/AgreementOrders?page=2">2</a></li>
          <li><a href="/crm/AgreementOrders?page=3">3</a></li>
          <li><a href="/crm/AgreementOrders?page=4">4</a></li>
          <li><a href="/crm/AgreementOrders?page=5">5</a></li>
          <li><a href="/crm/AgreementOrders?page=2" rel="next">&gt;</a></li>
          <li><a href="/crm/AgreementOrders?page=13" rel="last">&gt;&gt;</a></li>
        </ul>
      </div>
    </div>
    <div class="col col-md-12">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th style="width: 65px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.id&amp;direction=asc">番号</a></th>
            <th style="width: 150px;"><a href="/crm/AgreementOrders?sort=Customer.kana_name&amp;direction=asc">氏名</a></th>
            <th style="width: 140px;">備考</th>
            <th style="width: 85px;"><a href="/crm/AgreementOrders?sort=Prefecture.id&amp;direction=asc">都道府県</a></th>
            <th><a href="/crm/AgreementOrders?sort=OwnCar.own_car_name&amp;direction=asc">車種</a></th>
            <th style="width: 75px;"><a href="/crm/AgreementOrders?sort=OwnCar.displacement&amp;direction=asc">排気量</a></th>
            <th style="width: 100px;"><a href="/crm/AgreementOrders?sort=OwnCar.model_year_ad&amp;direction=asc">年式</a></th>
            <th style="width: 100px;"><a href="/crm/AgreementOrders?sort=OwnCar.mileage&amp;direction=asc">走行距離</a></th>
            <th style="width: 70px;"><a href="/crm/AgreementOrders?sort=OwnCar.mileage&amp;direction=asc">出品日時</a></th>
            <th style="width: 100px;"><a href="/crm/AgreementOrders?sort=OwnCar.mileage&amp;direction=asc">オークション終了日時</a></th>
            <th style="width: 30px;"><a href="/crm/AgreementOrders?sort=OwnCar.inspection_date&amp;direction=asc">入札数</a></th>
            <th style="width: 130px;"><a href="/crm/AgreementOrders?sort=Sale.sales_contact&amp;direction=asc">落札業者</a></th>
            <th style="width: 85px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.price&amp;direction=asc">落札金額</a></th>
            <th style="width: 85px;"><a href="/crm/AgreementOrders?sort=Sale.including_tax&amp;direction=asc">自動車税還付金額</a></th>
            <th style="width: 85px;"><a href="/crm/AgreementOrders?sort=Refund.refund_insurance&amp;direction=asc">自賠責</a></th>
            <th style="width: 85px;"><a href="/crm/AgreementOrders?sort=Refund.refund_weight_tax&amp;direction=asc">重量税</a></th>
            <th style="width: 85px;"><a href="/crm/AgreementOrders?sort=RecyclingDeposit.recycling_fee&amp;direction=asc">リ料</a></th>
            <th style="width: 100px;"><a href="/crm/AgreementOrders?sort=Inquiry.advertisement_code&amp;direction=asc">手数料金額</a></th>
            <th style="width: 120px;"><a href="/crm/AgreementOrders?sort=Trade.trader_name&amp;direction=asc">業者請求金額</a></th>
            <th style="width: 100px;"><a href="/crm/AgreementOrders?sort=Inquiry.inquiry_date&amp;direction=asc">業者請求日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">業者着金日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">書類到着確認日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">書類発送日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">引取予定日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">引取完了日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">確定金額差異</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">差異金額対応日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">ユーザー振込金額</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">ユーザー振込日</a></th>
            <th style="width: 90px;"><a href="/crm/AgreementOrders?sort=AgreementOrderScrapAuction.agreement_date&amp;direction=asc">初回問合日</a></th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_order as $order)
            @foreach($list_seller_car as $seller_car)
             @if($order->seller_id == $seller_car['id'])
              @foreach($list_seller_car_information as $key =>$seller_car_information)
                @if( $key == $order->id)
                  @foreach($seller_car_information as  $car_information)
                    @foreach($list_seller_car_reception as $key_reception => $seller_car_reception )
                      @if( $key_reception == $order->id)
                        @foreach($seller_car_reception as  $car_reception)  
                        <tr>
                         <td>{{ $order->id }}</td>
                          <td>{{ $order->name }}</td>
                          <td></td>
                          <td>{{ $order->erea_id }}</td>
                          <td>{{ $car_information->car_name }}</td>
                          <td>{{ $car_information->displacement }}</td>
                          <td>{{ $car_information->car_year }}</td>
                          <td>{{ $car_information->mileage }}</td>
                          <td></td>
                          <td>{{ $car_reception->end_desired_date }}</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        @endforeach
                      @endif
                    @endforeach
                  @endforeach
                @endif
              @endforeach
              @endif
            @endforeach
          @endforeach 
          <tr >
            <td><a href="/crm/AgreementOrders/edit/118262">118262</a></td>
            <td> 船津 努<br />
              (ふなつ つとむ) </td>
            <td>●28　耳が遠い　大きい声で案内必要</td>
            <td>埼玉県</td>
            <td> 三菱<br />
              ミラージュディンゴ </td>
            <td class="text-right">1,500 cc</td>
            <td> H11/1999<br />
              [普通] </td>
            <td class="text-right">65,000 km</td>
            <td>2018-03-07</td>
            <td>2018-03-07</td>
            <td>3</td>
            <td><br /></td>
            <td class="text-right">2,000 円</td>
            <td class="text-right"> 0 円 </td>
            <td class="text-right">0 円</td>
            <td class="text-right">0 円</td>
            <td class="text-right">11,330 円</td>
            <td class="text-right">14,850 円</td>
            <td class="text-right">11,330 円</td>
            <td>2018-02-06</td>
            <td>2018-02-06</td>
            <td>2018-02-06</td>
            <td>2018-02-06</td>
            <td>2018-02-06</td>
            <td>2018-02-06</td>
            <td>不明</td>
            <td>2018-02-06</td>
            <td class="text-right">14,850 円</td>
            <td>2018-02-06</td>
            <td>2018-02-06</td>
          </tr>
          <tr>
            
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col col-md-12"> 630 件中 1 ページ目 (1 ～ 50 件表示)<br />
      <div class="paging">
        <ul class="pagination pagination-sm">
          <li class="disabled"><a href="/crm/AgreementOrders" tag="li">&lt;&lt;</a></li>
          <li class="disabled"><a href="/crm/AgreementOrders">&lt;</a></li>
          <li class="current disabled"><a href="#">1</a></li>
          <li><a href="/crm/AgreementOrders?page=2">2</a></li>
          <li><a href="/crm/AgreementOrders?page=3">3</a></li>
          <li><a href="/crm/AgreementOrders?page=4">4</a></li>
          <li><a href="/crm/AgreementOrders?page=5">5</a></li>
          <li><a href="/crm/AgreementOrders?page=2" rel="next">&gt;</a></li>
          <li><a href="/crm/AgreementOrders?page=13" rel="last">&gt;&gt;</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
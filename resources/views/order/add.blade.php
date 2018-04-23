@extends('layouts.master')
@section('title')
(10)社内システム:出品詳細
@endsection
@section('script')
<script>
var token = "{{csrf_token()}}";
</script>
<script type="text/javascript" src="{{ url('js/default.js') }}"></script>
<script type="text/javascript" src="{{ url('js/valueconvertor.js') }}"></script>
<script type="text/javascript" src="{{ url('js/transmission.js')}}"></script>
<script type="text/javascript" src="{{ url('js/schedule.js') }}"></script>
<script type="text/javascript" src="{{ url('js/mode.js') }}"></script>
<script type="text/javascript" src="{{ url('js/recycling.js') }}"></script>
<script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js" charset="UTF-8"></script>
<script type="text/javascript" src="{{ url('js/jquery.disableOnSubmit.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ url('js/prefSelectExtension.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.darktooltip.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/format_control.js') }}"></script>
<script type="text/javascript" src="{{ url('js/clicktocall.js') }}"></script><script type="text/javascript"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/detail_index.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/seller.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/status.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/document.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/account.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/information.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/history.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/retrieval.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/question.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/reception.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/sale.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/sale_confirm.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/assessment.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/transfer.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/order.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/various_cost.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/recycling.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/refund.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/image.js') }}"></script>
<script type="text/javascript" src="{{ url('js/back_office/order/seller_car.js') }}"></script>
@endsection

@section('content')
<div id="container">
<div id="header"></div>
<div id="content"> 
  <!-- app/View/AgreementOrders/edit.ctp -->
  <div id="alert"></div>
  <div class="row" style="margin-right: 0px; margin-left: 0px;">
    <div class="col col-md-12">
      <blockquote>出品詳細</blockquote>
    </div>
    
      <div class="row MR0 ML0">
        <div class="col col-md-4">
          <div>
          <form id="seller_form" accept-charset="utf-8">
            <table class="table table-bordered table-condensed info_table">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>顧客情報</strong></div>
                    <div class="col col-md-2 text-center edit_seller_button_div"> <a href="#" class="btn btn-primary btn-sm edit_seller" id="add_seller">編集</a> </div>
                    <input type="hidden" name="seller_seller_id" id="seller_seller_id" value=""/>
                    <input type="hidden" name="seller_seller_cd" id="seller_seller_cd" value=""/>
                    <input type="hidden" name="seller_car_id" id="seller_car_id" value=""/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">依頼者 <small class="text-danger" style="font-style: italic;">必須</small></td>
                  <td><div class="col col-md-9 PL0">
                      <input name="seller_seller_name" class="form-control input-sm" maxlength="50" id="seller_seller_name" type="text" value=""/>
                    </div>
                    <div class="col col-md-3 text-danger" style="padding: 0px; height: 30px;"><small>(フルネーム・<br />
                      各種印字用宛名)</small></div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ふりがな</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-9 PL0">
                      <input name="seller_seller_kana_name" class="form-control input-sm hiragana" maxlength="50" id="seller_seller_kana_name" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">関係者</td>
                  <td><div class="col col-md-6 PL0">
                      <input name="seller_seller_participant" class="form-control input-sm" maxlength="50" id="seller_seller_participant" type="text" value=""/>
                    </div>
                    <div class="col col-md-2 col-md-offset-1 text-center P6_0" style="background-color: #f5f5f5;">連絡先</div>
                    <div class="col col-md-2 col-md-offset-1 text-center P6_0" style="background-color: #f5f5f5;">架電不可</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号1</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone1" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone1" type="tel" value=""/>
                    </div>
                    <div class="col col-md-2 phone_number1_div" style="padding-top:6px;"> <a href="/crm/AgreementOrders/edit/118262" class="call_phone" incoming_number="" dial_number="0120301456" speaker_cd="U04799576" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone1" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone1" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                        <input type="checkbox" name="seller_seller_phone_check1"  id="seller_seller_phone_check1" />
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号2</td>
                  <td class="form-horizontal"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone2" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone2" type="tel" value=""/>
                    </div>
                    <div class="col col-md-2 phone_number2_div" style="padding-top:6px;"> <a href="/crm/AgreementOrders/edit/118262" class="call_phone" incoming_number="048-721-7836" dial_number="0120301456" speaker_cd="U04799576" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone2" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone2" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                        <input type="checkbox" name="seller_seller_phone_check2"  id="seller_seller_phone_check2" />
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号3</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone3" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone3" type="tel" value=""/>
                    </div>
                    <div class="col col-md-2 phone_number3_div" style="padding-top:6px;"> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone3" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone3" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                         <input type="checkbox" name="seller_seller_phone_check3"  id="seller_seller_phone_check3" />
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号4</td>
                  <td class="form-horizontal"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone4" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone4" type="tel" value=""/>
                    </div>
                    <div class="col col-md-2 phone_number4_div" style="padding-top:6px;"> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone4" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone4" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                        <input type="checkbox" name="seller_seller_phone_check4"  id="seller_seller_phone_check4" />
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">FAX番号</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_fax" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_fax" type="tel" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">郵便番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="seller_seller_zip_code" class="form-control input-sm ime-disabled" maxlength="8" id="seller_seller_zip_code" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-2 text-center" style="padding-top: 5px;">
                      <button type="button" class="btn btn-warning btn-xs" >住所検索</button>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">都道府県</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-3 PL0">
                      <select name="seller_seller_erea" class="form-control input-sm pref_name" id="seller_seller_erea">
                        <option value="">----------</option>
                        @foreach($erea as $item)
                          <optgroup label="{{$item['zone_name']}}">
                            @foreach($item['data'] as $item_detail)
                              <option  value="{{$item_detail->id}}">{{$item_detail->name}}</option>
                            @endforeach
                          </optgroup>
                        @endforeach
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">住所</td>
                  <td><input name="seller_seller_address" class="form-control input-sm" maxlength="100" id="seller_seller_address" type="text" value=""/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">建物名・部屋番号等</td>
                  <td style="background-color: #f9f9f9;"><input name="seller_seller_building_number" class="form-control input-sm" maxlength="50" id="seller_seller_building_number" type="text" value=""/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">年齢</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="seller_seller_age" class="form-control input-sm ime-disabled" maxlength="3" id="seller_seller_age" type="tel" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">職業</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-3 PL0">
                      <input name="seller_seller_career" class="form-control input-sm" maxlength="20" id="seller_seller_career" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">メールアドレス1</td>
                  <td><input name="seller_seller_email1" class="form-control input-sm ime-disabled" maxlength="100" id="seller_seller_email1" type="email" value=""/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">メールアドレス2</td>
                  <td style="background-color: #f9f9f9;"><input name="seller_seller_email2" class="form-control input-sm ime-disabled" maxlength="100" id="seller_seller_email2" type="email" value=""/></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">依頼者性別</td>
                  <td><div class="col col-md-12 P6_0">                      
                  	<label class="radio-inline" for="sellerGender1">
                        <input type="radio" name="seller_seller_gender" id="seller_seller_gender1" value="1"  />
                        男性</label>
                      <label class="radio-inline" for="sellerGender2">
                        <input type="radio" name="seller_seller_gender" id="seller_seller_gender2" value="2"  />
                        女性</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">免許証番号</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-3 PL0">
                      <input name="seller_seller_license" id="seller_seller_license" class="form-control input-sm" maxlength="10" value="" type="tel"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">免許証写真</td>
                  <td><div class="col col-md-3 PL0">
                      <input type="file" name="seller_seller_license_img" id="seller_seller_license_img" accept="image/*"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">登録日時</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_register_date" class="form-control input-sm　ime-disabled datepicker" maxlength="19" id="seller_seller_register_date" type="tel" value=""/>
                    </div></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
            <form id="account_form" >
            <table class="table table-bordered table-condensed info_table" id="table-AgreementOrderAccount">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>口座情報</strong></div>
                    <div class="col col-md-2 text-center edit_account_button_div"> <a href="#" class="btn btn-primary btn-sm edit_account" id="add_account">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px;">銀行名</td>
                  <td class="bank_td"><div class="col col-md-6 PL0">
                      <input name="account_bank_name" class="form-control input-sm" maxlength="30" id="account_bank_name" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">銀行コード</td>
                  <td class="bank_code_td"><div class="col col-md-3 PL0">
                      <input name="account_bank_code" class="form-control input-sm" maxlength="4" id="account_bank_code" type="tel" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">支店名</td>
                  <td class="branch_name_td"><div class="col col-md-6 PL0">
                      <input name="account_branch_name" class="form-control input-sm" maxlength="30" id="account_branch_name" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">支店番号</td>
                  <td class="branch_number_td"><div class="col col-md-2 PL0">
                      <input name="account_branch_code" class="form-control input-sm ime-disabled" maxlength="3" id="account_branch_code" type="tel" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座種別</td>
                  <td class="account_classification_td"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="account_account_type1">
                        <input type="radio" name="account_account_type" id="account_account_type1"  />
                        普通 </label>
                      <label class="radio-inline" for="account_account_type2">
                        <input type="radio" name="account_account_type" id="account_account_type2"   />
                        当座 </label>
                      <label class="radio-inline" for="account_account_type3">
                        <input type="radio" name="account_account_type" id="account_account_type3"   />
                        貯蓄 </label>
                      <label class="radio-inline" for="account_account_type4">
                        <input type="radio" name="account_account_type" id="account_account_type4"   />
                        その他 </label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座番号</td>
                  <td class="account_number_td"><div class="col col-md-3 PL0">
                      <input name="account_account_number" class="form-control input-sm ime-disabled" maxlength="7" id="account_account_number" type="tel" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座名義人 (カナ)</td>
                  <td class="nominee_name_td"><input name="account_account_holder" class="form-control input-sm katakana" maxlength="50" id="account_account_holder" type="text" value=""/></td>
                </tr>
                <tr>
                  <td class="active">振込状態</td>
                 <td>
                      <label class="radio-inline" for="account_transfer_status1">
                        <input type="radio" name="account_transfer_status" id="account_transfer_status1"  />
                        未 </label>
                      <label class="radio-inline" for="account_transfer_status2">
                        <input type="radio" name="account_transfer_status" id="account_transfer_status2" } />
                        振込待ち </label>
                      <label class="radio-inline" for="account_transfer_status3">
                        <input type="radio" name="account_transfer_status" id="account_transfer_status3"  />
                        振込済 </label>
                    </div></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
          <form id="infor_form">
            <table class="table table-bordered table-condensed table-striped info_table">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>車両情報</strong></div>
                    <div class="col col-md-2 text-center edit_own_car_button_div"> <a href="#" class="btn btn-primary btn-sm edit_own_car" id="add_infor" >編集</a> </div>
                    <input type="hidden" name="infor_id" id="infor_id" value=""/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車種名</td>
                  <td><div class="col col-md-12 PA0" style="margin-bottom:5px;">
                      <div class="col col-md-12 PL0">
                        <input name="infor_car_name" class="form-control input-sm" maxlength="50" id="infor_car_name" autocomplete="off" readonly="readonly" type="text" value=""/>
                      </div>
                    </div>
                    <div class="col col-md-12 PA0">
                      <div class="col col-md-5 PL0">
                        <select name="infor_maker_id" class="form-control input-sm" id="infor_maker_id">
                          <option value="">----------</option>
                          @foreach($maker as $item)
                            <option  value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      <div class="col col-md-7 PL0">
                        <select name="infor_car_id" class="form-control input-sm" id="infor_car_id">
                          <option value="">----------</option>
                          @foreach($car as $item)
                            <option  value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">車両区分</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_classification1">
                        <input type="radio" name="infor_classification" id="infor_classification1" />
                        普通自動車</label>
                      <label class="radio-inline" for="infor_classification2">
                        <input type="radio" name="infor_classification" id="infor_classification2"  />
                        軽自動車</label>
                    </div></td>
                </tr>
                <tr class="form-horizontal">
                  <td class="active" style="vertical-align: middle;">年式</td>
                  <td><div class="col col-md-2 PL0">
                      <select name="infor_car_year_type" class="form-control input-sm ime-disabled" id="infor_car_year_type" autocomplete="off">
                        <option  value="H">H</option>
                        <option  value="S">S</option>
                      </select>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_car_year" class="form-control input-sm ime-disabled" id="infor_car_year" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">年</div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_car_month" class="form-control input-sm ime-disabled" id="infor_car_month" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">月</div>
                    <div class="col col-md-1 col-md-offset-1 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_about_check"  id="infor_about_check"  />
                      </div>
                    </div>
                   
                    <div class="col col-md-1 P6_0"> くらい</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">購入</td>
                  <td style="vertical-align:middle;"><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_purchase1">
                        <input type="radio" name="infor_purchase" id="infor_purchase1"  />
                        新車購入</label>
                      <label class="radio-inline" for="infor_purchase2">
                        <input type="radio" name="infor_purchase" id="infor_purchase2"  />
                        中古車購入</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">走行距離</td>
                  <td><div class="col col-md-4 PL0">
                      <input name="infor_mileage" class="form-control input-sm ime-disabled mileage" maxlength="10" id="infor_mileage" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0"> km</div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">車検日</td>
                  <td><div class="col col-md-2 PL0">
                      <select name="infor_inspection" class="form-control input-sm ime-disabled" id="infor_inspection" autocomplete="off">
                        <option  value="H">H</option>
                        <option  value="S">S</option>
                      </select>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_inspection_year" class="form-control input-sm ime-disabled" id="infor_inspection_year" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">年</div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_inspection_month" class="form-control input-sm ime-disabled" id="infor_inspection_month" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">月</div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_inspection_day" class="form-control input-sm ime-disabled" id="infor_inspection_day" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">日</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">自走可否</td>
                  <td><div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="info_self_propelled11">
                        <input type="radio" name="info_self_propelled1" id="info_self_propelled11"  />
                        走行可能</label>
                      <label class="radio-inline own_car_runnable" for="OwnCarRunnable0">
                        <input type="radio" name="info_self_propelled1" id="info_self_propelled11"  />
                        走行不可</label>
                    </div>
                    <div id="own_car_status_box" class="col col-md-12 P6_0">
                      <div id="own_car_runnable_subbox" style="display:block">
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled21" />
                        <label for="info_self_propelled21" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">使用中</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled22" />
                        <label for="info_self_propelled22" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">エンジン異音</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled23" />
                        <label for="info_self_propelled23" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">白煙</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled24" />
                        <label for="info_self_propelled24" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">バッテリ上</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled25" />
                        <label for="info_self_propelled25" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">エンジン不調</label>
                      </div>
                      <div id="own_car_unrunnable_subbox" style="display:none">
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled26" />
                        <label for="info_self_propelled26" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">タイヤ動作OK</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled27" />
                        <label for="info_self_propelled27" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">タイヤパンク</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled28" />
                        <label for="info_self_propelled28" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">バッテリ上</label>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">走行状態</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_running_condition" class="form-control input-sm" rows="3" cols="30" id="infor_running_condition">
                      </textarea>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">4tユニック進入</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_4t_unic1">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic1"  />
                        不可</label>
                      <label class="radio-inline" for="infor_4t_unic2">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic2"  />
                        可能</label>
                      <label class="radio-inline" for="infor_4t_unic3">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic3"  />
                        たぶん可</label>
                      <label class="radio-inline" for="infor_4t_unic4">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic4"  />
                        2tならOK</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ボディーカラー</td>
                  <td><div class="col col-md-4 PL0">
                      <input name="infor_body_color" class="form-control input-sm" maxlength="20" id="infor_body_color" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">排気量</td>
                  <td class="form-horizontal"><div class="col col-md-3 PL0">
                      <input name="infor_displacement" class="form-control input-sm ime-disabled displacement" maxlength="5" id="infor_displacement" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0"> cc</div>
                    <div class="col col-md-1 col-md-offset-4 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_about_check"  id="infor_about_check" />
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> くらい</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">エンジンの型式</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="infor_engine_model" class="form-control input-sm" maxlength="10" id="infor_engine_model" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ターボ (過給器)</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_turbo1">
                        <input type="radio" name="infor_turbo" id="infor_turbo1" />
                        無 (N/A、自然吸気エンジン)</label>
                      <label class="radio-inline" for="infor_turbo2">
                        <input type="radio" name="infor_turbo" id="infor_turbo2"  />
                        有 (ターボエンジン、スーパーチャージャー)</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">型式</td>
                  <td class="form-horizontal"><div class="col col-md-5 PL0">
                      <input name="infor_type" class="form-control input-sm" maxlength="30" id="infor_type" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-3 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_ambiguous_check"  id="infor_ambiguous_check" />
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> 曖昧</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">型式指定番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="infor_model_number" class="form-control input-sm ime-disabled" maxlength="6" id="infor_model_number" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">類別区分番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="infor_category_number" class="form-control input-sm ime-disabled" maxlength="4" id="infor_category_number" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">グレード</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_grade" class="form-control input-sm" maxlength="50" id="infor_grade" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">駆動方式</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_drive_system1">
                        <input type="radio" name="infor_drive_system" id="infor_drive_system1" />
                        2WD (FF / FR 等)</label>
                      <label class="radio-inline" for="infor_drive_system2">
                        <input type="radio" name="infor_drive_system" id="infor_drive_system2" />
                        4WD (AWD)</label>
                      <label class="radio-inline" for="infor_drive_system3">
                        <input type="radio" name="infor_drive_system" id="infor_drive_system3" />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">トランスミッション</td>
                  <td><div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="infor_transmission1">
                        <input type="radio" name="infor_transmission" id="infor_transmission1"  />
                        AT (CVT)</label>
                      <label class="radio-inline" for="infor_transmission2">
                        <input type="radio" name="infor_transmission" id="infor_transmission2"  />
                        MT</label>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_speed" class="form-control input-sm ime-disabled" maxlength="1" id="infor_speed" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0"> 速</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">燃料</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_owner1">
                        <input type="radio" name="infor_fuel" id="infor_fuel1" />
                        ガソリン</label>
                      <label class="radio-inline" for="infor_owner2">
                        <input type="radio" name="infor_fuel" id="infor_fuel2" />
                        ディーゼル</label>
                      <label class="radio-inline" for="infor_owner3">
                        <input type="radio" name="infor_fuel" id="infor_fuel3" />
                        ハイブリッド</label>
                      <label class="radio-inline" for="infor_owner4">
                        <input type="radio" name="infor_fuel" id="infor_fuel4" />
                        電気自動車</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">所有者 (名義)</td>
                  <td class="form-horizontal"><div class="col col-md-6 PL0">
                      <input name="infor_owner" class="form-control input-sm" maxlength="50" id="infor_owner" type="text" value=""/>
                    </div>
                    <div class="col col-md-1 col-md-offset-2 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_personal_check"  id="infor_personal_check" />
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> 個人</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">所有者住所</td>
                  <td><input name="infor_residence" class="form-control input-sm" maxlength="100" id="infor_residence" type="text" value=""/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車検証と印鑑証明書の住所までの引越し回数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="infor_number_stamp" class="form-control input-sm ime-disabled" maxlength="1" id="infor_number_stamp" type="tel" value=""/>
                    </div>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ローン残債状況</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_balance_status" class="form-control input-sm" maxlength="50" id="infor_balance_status" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">一時抹消登録</td>
                  <td><div class="col col-md-6 P6_0">
                      <label class="radio-inline" for="infor_delete_temp1">
                        <input type="radio" name="infor_delete_temp" id="infor_delete_temp1" />
                        未</label>
                      <label class="radio-inline" for="infor_delete_temp2">
                        <input type="radio" name="infor_delete_temp" id="infor_delete_temp2" />
                        済</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事故歴・修復歴</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarAccidents0">
                        <input type="radio" name="infor_accident_repair" id="infor_accident_repair1" />
                        無</label>
                      <label class="radio-inline" for="infor_accident_repair2">
                        <input type="radio" name="infor_accident_repair" id="infor_accident_repair2" />
                        有</label>
                      <label class="radio-inline" for="infor_accident_repair3">
                        <input type="radio" name="infor_accident_repair" id="infor_accident_repair3" 
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">保証書</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_written_guarantee" class="form-control input-sm" maxlength="50" id="infor_written_guarantee" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">点検記録簿</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_record_book" class="form-control input-sm" maxlength="50" id="infor_record_book" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車歴</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_history1">
                        <input type="radio" name="infor_history" id="infor_history1"  />
                        自家用</label>
                      <label class="radio-inline" for="infor_history2">
                        <input type="radio" name="infor_history" id="infor_history2"  />
                        事業用</label>
                      <label class="radio-inline" for="infor_history3">
                        <input type="radio" name="infor_history" id="infor_history3"  />
                        レンタル</label>
                      <label class="radio-inline" for="infor_history4">
                        <input type="radio" name="infor_history" id="infor_history4"  />
                        未確認</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">喫煙状況</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="info_smoking_status1">
                        <input type="radio" name="info_smoking_status" id="info_smoking_status1"  />
                        禁煙車</label>
                      <label class="radio-inline" for="info_smoking_status2">
                        <input type="radio" name="info_smoking_status" id="info_smoking_status2"  />
                        喫煙車</label>
                      <label class="radio-inline" for="info_smoking_status3">
                        <input type="radio" name="info_smoking_status" id="info_smoking_status3"  />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">装備品（オプション等）</td>
				  <td>
            @for($i=0;$i<count($equipment);$i++)
              @if($i == 0)
                <div class="col col-md-9" style="padding: 6px;">
              @endif
                <label class="radio-inline" for="infor_equipment{{$i}}">
                        <input type="radio" name="infor_equipment" id="infor_equipment{{$i}}" data-id="{{$equipment[$i]->id}}"   />
                {{$equipment[$i]->name}}</label>
              @if(($i+1)%3 == 0)
                </div>
              @endif
              @if(($i+1)%3 == 0 && ($i+1) != count($equipment))
                <div class="col col-md-9" style="padding: 6px;">
              @endif
            @endfor
                    
                    

				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">エアコン</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_air_condition1">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition1"  />
                        無</label>
                      <label class="radio-inline" for="infor_air_condition2">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition2"  />
                        オートエアコン</label>
                      <label class="radio-inline" for="infor_air_condition3">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition3"  />
                        マニュアルエアコン</label>
                      <label class="radio-inline" for="infor_air_condition4">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition4"  />
                        故障</label>
                      <label class="radio-inline" for="infor_air_condition5">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition5"  />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">装備品（オプション等）備考</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_remark" class="form-control input-sm" maxlength="50" id="infor_remark" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ドア数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="infor_number_door" class="form-control input-sm ime-disabled" maxlength="1" id="infor_number_door" type="tel" value=""/>
                    </div>
                    <div class="col col-md-2 P6_0"> ドア</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">乗員定員数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="infor_number_passenger" class="form-control input-sm ime-disabled" maxlength="1" id="infor_number_passenger" type="tel" value=""/>
                    </div>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(外装)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_condition" class="form-control input-sm" rows="3" placeholder="外装" cols="30" id="infor_condition"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(内装)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_state_interior" class="form-control input-sm" rows="3" placeholder="内装" cols="30" id="infor_state_interior"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(その他)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_state_other" class="form-control input-sm" rows="3" placeholder="車両（その他）" cols="30" id="infor_state_other"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">その他PRポイント</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_pr_points" class="form-control input-sm" rows="3" placeholder="その他PRポイント" cols="30" id="infor_pr_points"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両番号 (N/P)</td>
                  <td><div class="col col-md-6 PL0">
                      <input name="infor_vehicle_number" class="form-control input-sm" maxlength="20" id="infor_vehicle_number" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車台番号</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_chassis_number" class="form-control input-sm" maxlength="30" id="infor_chassis_number" type="tel" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">要望：取外部品</td>
                  <td class="form-horizontal"><div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part1" />
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;">ナビ</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part2" />
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;">ETC</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part3" />
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;"> タイヤ</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part4" />
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;"> ホイール</div></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
            <table class="table table-bordered table-condensed info_table" style="margin-bottom:0; margin-bottom:10px;">
              <thead>
                <tr class="info">
                  <th colspan="4"> <div class="col col-md-9 lead PL0 MB0"><strong>車両写真</strong></div>                    
                    <div class="col col-md-3 text-right"> 
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_add_image">新規追加</button>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal_add_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="image_add" class="custom-file-upload"></label>
                                        <input type="file" id="image_add">
                                        <select name="image_index_add" class="form-control input-sm" id="image_index_add">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="6">7</option>
                                                <option value="6">8</option>
                                                <option value="6">9</option>
                                                <option value="6">10</option>
                                                <option value="6">11</option>
                                                <option value="6">12</option>
                                                <option value="6">13</option>
                                                <option value="6">14</option>
                                                <option value="6">15</option>
                                                <option value="6">16</option>
                                          </select>
                                        <input type="text" id="image_name_add" accept="image/*" >
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="image_add_ajax" class="btn btn-secondary">Submit</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <button type="file" name="upfile" id="upfile" accept="image/*" class="btn btn-success btn-sm"></button>  -->
                    </div>          
                  </th>
                </tr>
              </thead>
              <tbody id="image_content">
                <tr class="active text-center">
                  <td class="col col-md-2" style="vertical-align: middle;">写真とコメント</td>
                  <td class="col col-md-4" style="vertical-align: middle;">表示順</td>
                </tr>
                
              </tbody>
      </table>
			<table class="table table-bordered table-condensed info_table" style="margin-bottom:0;">
              <tbody>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">車検証写真</td>
                  <td style="vertical-align: middle;"> 
                      <div class="flexrowbetween">
                          <div class="img">
                              <a href="" id="seller_car_inspection_show_a" rel="lightbox" class="lightbox_photo"><img src="" id="seller_car_inspection_show" alt="車検証写真" width="100"></a>
                          </div>
                          <div class="flexbtn"> 
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_inspection_photo">ファイル参照</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_inspection_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="seller_car_inspection_photo" class="custom-file-upload"></label>
                                                <input type="file" name="seller_car_inspection_photo" id="seller_car_inspection_photo" accept="image/*" style="display:none">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary seller_car_add_photo">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                     </div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">登録日時</td>
                  <td style="vertical-align: middle;">  </td>
                </tr>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類写真</td>
                  <td style="vertical-align: middle;"> 
                      <div class="flexrowbetween">
                          <div class="img">
                              <a href="" id="seller_car_document_show_a" rel="lightbox" class="lightbox_photo"><img src="" id="seller_car_document_show" alt="車検証写真" width="100"></a>
                          </div>
                          <div class="flexbtn"> 
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_document_photo">ファイル参照</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_document_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="seller_car_document_photo" class="custom-file-upload"></label>
                                                <input type="file" name="seller_car_document_photo" id="seller_car_document_photo" accept="image/*" style="display:none">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary seller_car_add_photo">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                     </div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">登録日時</td>
                  <td style="vertical-align: middle;">  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <div class="col col-md-4">
          <div>
          	<form id="status_form" accept-charset="utf-8">
            <table class="table table-bordered table-condensed info_table" id="table-Inquiry">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>案件状況</strong></div>
                    <div class="col col-md-2 text-center"> <a href="#" class="btn btn-primary btn-sm edit_inquiry" id="add_status" >編集</a>
                      <input type="hidden" name="status_id" id="status_id" value=""/>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">初回問合日</td>
                  <td style="vertical-align: middle;"></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">案件ステータス</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					<div class="col col-md-4 PL0">
						<select name="status_status" class="form-control input-sm" id="status_status">
						  <option value="">----------</option>
						  <option value="1">失注</option>
						  <option value="2">新規</option>
						  <option value="3">要再TEL</option>
						  <option value="4">後追い長期不在</option>
						  <option value="5">新規長期不在</option>
						  <option value="6">査定サービス中</option>
						  <option value="7">出品中</option>
						  <option value="8">出品後回答待ち</option>
						  <option value="9">必要書類待ち</option>
						  <option value="10">車両引取待ち</option>
						  <option value="11">振込待ち</option>
						  <option value="12">完了済み</option>
						</select>
					</div>
				　　</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">出品確度</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="status_listing_accuracy1">
                        <input type="radio" name="status_listing_accuracy"  id="status_listing_accuracy1" value="1" />
                        S</label>
                      <label class="radio-inline" for="status_listing_accuracy2">
                        <input type="radio" name="status_listing_accuracy"   id="status_listing_accuracy2" value="2" />
                        A</label>
                      <label class="radio-inline" for="status_listing_accuracy3">
                        <input type="radio" name="status_listing_accuracy"   id="status_listing_accuracy3" value="3" />
                        B</label>
                      <label class="radio-inline" for="status_listing_accuracy4">
                        <input type="radio" name="status_listing_accuracy"   id="status_listing_accuracy4" value="4" />
                        C</label>
                      <label class="radio-inline" for="status_listing_accuracy5">
                        <input type="radio" name="status_listing_accuracy"   id="status_listing_accuracy5" value="5" />
                        D</label>
                      <label class="radio-inline" for="status_listing_accuracy6">
                        <input type="radio" name="status_listing_accuracy"   id="status_listing_accuracy6" value="6" />
                        NG</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                   <td class="active" style="width: 120px; vertical-align: middle;">再TEL予定日</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					  <div class="col col-md-4 PL0">
						  <input name="status_re_tel_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="status_re_tel_date" autocomplete="off" type="tel" value=""/>
					  </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">再TEL回数</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4 PL0">
						<select name="status_tel_number_again" class="form-control input-sm" id="status_tel_number_again">
						  <option value="">----------</option>
						  <option  value="0">0</option>
						  <option  value="1">1</option>
						  <option  value="2">2</option>
						  <option  value="3">3</option>
						  <option  value="4">4</option>
						  <option  value="5">5</option>
						  <option  value="6">6</option>
						  <option  value="7">7</option>
						  <option  value="8">8</option>
						  <option  value="9">9</option>
						  <option  value="10">10</option>
						  <option  value="11">11</option>
						  <option  value="13">13</option>
						  <option  value="14">14</option>
						  <option  value="15">15</option>
						  <option  value="16">16</option>
						  <option  value="17">17</option>
						  <option  value="18">18</option>
						  <option  value="19">19</option>
						  <option  value="20">20</option>
						</select>
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">追跡</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="status_pursuit"  id="status_pursuit1"  value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> リピーター</div>
                    <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="status_pursuit"  id="status_pursuit2"  value="2"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> 複数台口</div>
                    <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="status_pursuit"  id="status_pursuit3"  value="3"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> ラジオ</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">キャンペーン提示</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="status_offer_presentation1">
                        <input type="radio" name="status_offer_presentation" id="status_offer_presentation1"  value="1" />
                        未提案</label>
                      <label class="radio-inline" for="status_offer_presentation2">
                        <input type="radio" name="status_offer_presentation" id="status_offer_presentation2"  value="2" />
                        インバウンド</label>
                      <label class="radio-inline" for="status_offer_presentation3">
                        <input type="radio" name="status_offer_presentation" id="status_offer_presentation3"  value="3" />
                        アウトバウンド</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">キャンペーン</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="status_campaign1">
                        <input type="radio" name="status_campaign" id="status_campaign1"  value="1" />
                        未</label>
                      <label class="radio-inline" for="status_campaign2">
                        <input type="radio" name="status_campaign" id="status_campaign2"  value="2" />
                        早得</label>
                      <label class="radio-inline" for="status_campaign3">
                        <input type="radio" name="status_campaign" id="status_campaign3"  value="3" />
                        紹介</label>
                      <label class="radio-inline" for="status_campaign4">
                        <input type="radio" name="status_campaign" id="status_campaign4"  value="4" />
                        リピート</label>
                      <label class="radio-inline" for="status_campaign5">
                        <input type="radio" name="status_campaign" id="status_campaign5"  value="5" />
                        セット</label>
                      <label class="radio-inline" for="status_campaign6">
                        <input type="radio" name="status_campaign" id="status_campaign6"  value="6" />
                        持込</label>
                      <label class="radio-inline" for="status_campaign7">
                        <input type="radio" name="status_campaign" id="status_campaign7"  value="7" />
                        福利厚生</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">一言備考</td>
                  <td><input name="status_word_preparation" class="form-control input-sm" maxlength="50" id="status_word_preparation" type="text" value=""/></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div style="margin-top:20px;">
            <form id="history_form">
            <table class="table table-bordered table-condensed info_table" style="margin-bottom: 0px;">
              <thead>
                <tr class="info handle_history_title">
                  <th> <div class="col col-md-11 lead PL0 MB0"><strong>対応履歴</strong></div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border-bottom-style: none;"><div class="col col-md-12">
                      <textarea name="history_input" class="form-control input-sm" rows="5" cols="30" id="history_input"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td style="border-top-style: none; border-bottom-style: none;"><div class="col col-md-12 calling_radio" style="padding: 6px">
                      <label class="radio-inline" for="history_type1">
                        <input type="radio" name="history_type" id="history_type1" value="入電" checked="checked" />
                        入電</label>
                      <label class="radio-inline" for="history_type2">
                        <input type="radio" name="history_type" id="history_type2" value="架電" />
                        架電</label>
                      <label class="radio-inline" for="history_type3">
                        <input type="radio" name="history_type" id="history_type3" value="メール受信" />
                        メール受信</label>
                      <label class="radio-inline" for="history_type4">
                        <input type="radio" name="history_type" id="history_type4" value="メール送信 " />
                        メール送信</label>
                      <label class="radio-inline" for="history_type5">
                        <input type="radio" name="history_type" id="history_type5" value="業者入電" />
                        業者入電</label>
                      <label class="radio-inline" for="history_type6">
                        <input type="radio" name="history_type" id="history_type6" value="業者架電" />
                        業者架電</label>
                      <label class="radio-inline" for="history_type7">
                        <input type="radio" name="history_type" id="history_type7" value="その他" />
                        その他</label>
                    </div></td>
                </tr>
                <tr>
                  <td style="border-top-style: none;"><div class="col col-md-2 col-md-offset-10 text-center add_inquiry_detail_button_div"> <a href="#" class="btn btn-primary btn-sm add_inquiry_detail" id="add_history">登録</a> </div></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
            <div>
                <div class="scroll">
                    <div id="live-chat2">
                        <table>
                        <tbody id="history_content">

                        </tbody>
                        </table>
                        <!-- end chat -->
                    </div>
                    <!-- end live-chat -->
                </div>
          </div>
          <div style="margin-top:20px;">
            <form id="question_form" >
            <table class="table table-bordered table-condensed info_table" style="margin-top: 20px; margin-bottom: 0px;">
              <thead>
                <tr class="info sms_history_title">
                  <th> <div class="col col-md-11 lead PL0 MB0"><strong>ショートメッセージ送信履歴</strong></div>
                    {{--<div class="col col-md-1 text-center sms_history_arrow" style="font-size: 17px;"><span class="glyphicon glyphicon-arrow-down" style="padding-top: 6px;"></span></div>--}}
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border-bottom-style: none;"><div class="col col-md-12 required">
                      <input name="question_input" class="form-control input-sm" maxlength="50" id="question_input" type="text"/>
                    </div></td>
                </tr>
                <tr>
                  <td style="border-top-style: none;">
                     <div class="col col-md-10 calling_radio" style="padding: 6px">
                      
                        <div class="col col-md-2 text-center send_short_message_div">
                            <a href="#" class="btn btn-warning btn-sm send_short_message" id="add_question">送信</a> 
                        </div>
                    </div>
                </td>
                </tr>
              </tbody>
            </table>
            </form>
            <table class="table table-striped table-bordered table-condensed sms_history_list info_table" style="margin-bottom: 0px; display: none;">
              <tbody class="sms_history">
              </tbody>
            </table>
          </div>
          <div>
              <div class="scroll">
      					<div id="live-chat2">
      							<table id="question_content">
      							</table>
                        <!-- end chat -->
                </div>
                    <!-- end live-chat -->
              </div>
          </div>
          <div>
            <form id="reception_form" >
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>出品受付情報</strong></div>
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="#;" class="btn btn-primary btn-sm send_seeking_photographer_mail" id="add_reception">編集</a> 
                    <input type="hidden" name="reception_id" id="reception_id" value=""/>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px;">出品番号</td>
                  <td> </td>
                </tr>
                <tr>
                  <td class="active">規約同意日</td>
                  <td>
                     <div class="col col-md-5">
                      <input name="reception_term_consent" class="form-control input-sm datepicker" maxlength="10" id="reception_term_consent" autocomplete="off" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px;">規約同意確認方法</td>
                  <td> <div class="col col-md-12 PL0">
                      <input name="reception_confirm_method" class="form-control input-sm" maxlength="50" id="reception_confirm_method" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">出品催促担当者</td>
                  <td> <div class="col col-md-12 PL0">
                      <input name="reception_producer_urged" class="form-control input-sm" maxlength="50" id="reception_producer_urged" type="text" value=""/>
                    </div> </td>
                </tr>
                <tr>
                  <td class="active">備考</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_remark1" class="form-control input-sm" maxlength="50" id="reception_remark1" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">顧客ID</td>
                  <td>}</td>
                </tr>
                <tr>
                  <td class="active">最低希望価格</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_minimum_recommend_price" class="form-control input-sm" maxlength="50" id="reception_minimum_recommend_price" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">オークション終了希望日時</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_end_desired_date" class="form-control input-sm datepicker" maxlength="50" id="reception_end_desired_date" type="text" value=""/>
                    </div></td>
                </tr>
                <!-- id19：成約手法変更機能 -->
                <tr>
                  <td class="active">クレーム</td>
                  <td><div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="reception_claim1">
                        <input type="radio" name="reception_claim" id="reception_claim1"  />
                        クレーム有</label>
                      <label class="radio-inline own_car_runnable" for="reception_claim2">
                        <input type="radio" name="reception_claim" id="reception_claim2"  />
                        クレーム無し</label>
                    </div>
                    </td>
                </tr>

                <tr>
                  <td class="active">抹消謄本の通知方法</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_notify_certified_copy" class="form-control input-sm" maxlength="50" id="reception_notify_certified_copy" type="text" value=""/>
                    </div></td>
                </tr>

                <tr>
                  <td class="active">抹消業務</td>
                  <td>
                      <div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="reception_deletion_work1">
                        <input type="radio" name="reception_deletion_work" id="reception_deletion_work1"  />
                        未完</label>
                      <label class="radio-inline own_car_runnable" for="reception_deletion_work2">
                        <input type="radio" name="reception_deletion_work" id="reception_deletion_work2"  />
                        一時抹消</label>
                        <label class="radio-inline own_car_runnable" for="reception_deletion_work3">
                        <input type="radio" name="reception_deletion_work" id="reception_deletion_work3"  />
                        名義変更</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="active">備考</td>
                  <td>
                      <div class="col col-md-12 PL0">
                      <textarea name="reception_remark2" class="form-control input-sm" rows="3" cols="30" id="reception_remark2"></textarea>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="text-danger" style="background-color: #ffffff;"> ※抹消業務のボタン (不要以外) を押すと、お客様宛に抹消謄本閲覧サイトの案内メールが送られます。<br>
                    ※郵送/FAXを希望されるお客様には、抹消業務のボタンを押した後に通知方法のボタンを選択してください。 </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
          <form id="assessment_form">
            <table class="table table-bordered table-condensed info_table">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>査定サービス管理</strong></div>
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="#" class="btn btn-primary btn-sm send_seeking_photographer_mail" id="add_assessment">編集</a> 
                    <input type="hidden" name="assessment_id" id="assessment_id" value=""/>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定</td>
                  <td style="vertical-align: middle;">
                    <div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="assessment_advance1">
                        <input id="assessment_advance1" name="assessment_advance"  type="radio">
                      要</label>
                      <label class="radio-inline" for="assessment_advance2">
                        <input id="assessment_advance2" name="assessment_advance"  type="radio">
                      不要</label>
                    </div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定方法</td>
                  <td style="vertical-align: middle;">
                  <div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="assessment_advance_method1">
                        <input id="assessment_advance_method1" name="assessment_advance_method"  type="radio">
                        持込</label>
                      <label class="radio-inline" for="assessment_advance_method2">
                        <input id="assessment_advance_method2" name="assessment_advance_method"  type="radio">
                        出張</label>
                    </div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定場所</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="assessment_place" class="form-control input-sm" maxlength="50" id="assessment_place" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定場所地図</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="assessment_place_map" class="form-control input-sm" maxlength="50" id="assessment_place_map" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定状況</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="assessment_situation" class="form-control input-sm datepicker" maxlength="50" id="assessment_situation" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日①</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_advance_date1" class="form-control input-sm datepicker" maxlength="10" id="assessment_advance_date1" autocomplete="off" type="text" value=""/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日②</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_advance_date2" class="form-control input-sm datepicker" maxlength="10" id="assessment_advance_date2" autocomplete="off" type="text" value=""/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日③</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_advance_date3" class="form-control input-sm datepicker" maxlength="10" id="assessment_advance_date3" autocomplete="off" type="text" value=""/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_remark1" class="form-control input-sm" maxlength="50" id="assessment_remark1" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">持込査定・出張査定候補リスト</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="assessment_candidate_list" class="form-control input-sm" rows="3" cols="30" id="assessment_candidate_list"></textarea>
                    </div></td>
                </tr>   
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定業者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_assessor1" class="form-control input-sm" maxlength="50" id="assessment_assessor1" type="text" disabled="" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定業者ID</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_assessor_id" class="form-control input-sm" maxlength="50" id="assessment_assessor_id" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定依頼日</td>
                  <td class="photo_term_td" style="vertical-align: middle;">
                     <div class="col col-md-5">
                      <input name="assessment_request_date" class="form-control input-sm datepicker" maxlength="10" id="assessment_request_date" autocomplete="off" type="text" value=""/>
                    </div>
                </tr>   
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定依頼者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_assessor2" class="form-control input-sm" maxlength="50" id="assessment_assessor2" type="text" value=""/>
                    </div></td>
                </tr> 
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定結果到着日</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_arrival_date" class="form-control input-sm datepicker" maxlength="10" id="assessment_arrival_date" autocomplete="off" type="text" value=""/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定完了確認者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_complete_confirmation" class="form-control input-sm" maxlength="50" id="assessment_complete_confirmation" type="text" value=""/>
                    </div></td>
                </tr>   
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定結果</td>
                  <td style="vertical-align: middle;">
                    <div class="col col-md-10 P6_0 spec1">
                        <div class="flexrowbetween">
                          <div>
                              <p>査定表（写真）</p>
                          </div>
                          <div class="img">
                              <a href="" id="assessment_show_table_a" rel="lightbox" class="lightbox_photo"><img src="" alt="書類写真" id="assessment_show_table" width="100"></a>
                          </div>
                          <div class="flexbtn"> 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_assessment">ファイル参照</button>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal_assessment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="assessment_table_img" class="custom-file-upload"></label>
                                                <input type="file" name="assessment_table_img" id="assessment_table_img" accept="image/*" style="display:none">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        
                  </div>
                  <div class="col col-md-10 P6_0 spec1">
                        <span>評価点（総合）</span><input name="assessment_synthetic" class="form-control input-sm radio-inline w70" maxlength="50" id="assessment_synthetic" type="text" value="" placeholder=""> <span>点</span>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価点（外装）<input name="assessment_exterior" class="form-control input-sm w70" maxlength="50" id="assessment_exterior" type="text" value="" placeholder=""> <span>点</span>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価点（内装）<input name="assessment_interior" class="form-control input-sm w70" maxlength="50" id="assessment_interior" type="text" value="" placeholder=""> <span>点</span>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価者コメント<textarea name="assessment_comment" class="form-control input-sm" rows="3" placeholder="" cols="30" id="assessment_comment"></textarea>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価者<input name="assessment_rater" class="form-control input-sm" maxlength="50" id="assessment_rater" type="text" value="" placeholder="">
                    </div>
                  </td>
                </tr>       
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_remark2" class="form-control input-sm" maxlength="50" id="assessment_remark2" type="text" value=""/>
                    </div></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
        </div>
        <div class="col col-md-4">
          <div>
            <form id="document_form" >
            <table class="table table-striped table-bordered table-condensed info_table" id="table-Document">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>書類管理</strong></div>
                    <input type="hidden" name="document_id" id="document_id" value=""/>
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="#" class="btn btn-primary btn-sm send_seeking_photographer_mail" id="add_document">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active">抹消種別</td>
                  <td colspan="2">
          					<div class="col col-md-4 PL0">
          						<select name="document_cancel_type" class="form-control input-sm" id="document_cancel_type">
          						  <option value="">----------</option>
          						  <option value="1">当社抹消</option>
          						  <option value="2">業者抹消</option>
          						</select>
          					</div>
                   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類到着</td>
        					<td style="vertical-align: middle;">

        						<div class="col col-md-12">
        							<label class="radio-inline" for="document1">
        								<input type="radio" name="document_document_arrival" id="document_document_arrival1"  />未着</label>

        							<label class="radio-inline" for="document2">
        								<input type="radio" name="document_document_arrival" id="document_document_arrival2"  />不備</label>

        							<label class="radio-inline" for="document3">
        								<input type="radio" name="document_document_arrival" id="document_document_arrival3"  />完備</label>
                            </div>


        					</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="col col-md-12">
                          <textarea name="document_condition" class="form-control input-sm" rows="5" cols="30" id="document_condition"></textarea>
                        </div>
                    </td>
                </tr>      
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ナンバープレート</td>
                  <td style="vertical-align: middle;"><div class="col col-md-4 PL0">
        						<select name="document_license_plate" class="form-control input-sm" id="document_license_plate">
        						  <option value="">----------</option>
        						  <option value="1">未着</option>
        						  <option value="2">到着</option>
        						</select>
        					</div>
        				  </td>
               </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類備考</td>
                  <td><div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="document_remark" class="form-control input-sm" rows="3" cols="30" id="document_remark"></textarea>
                    </div>
                   </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
          <form id="retrieval_form">
            <table class="table table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>引取情報</strong></div>
                    <div class="col col-md-2 text-center edit_trade_button_div"> <a href="#" class="btn btn-primary btn-sm edit_trade" id="add_retrieval">編集</a> </div>
                    <input type="hidden" name="retrieval_id"  id="retrieval_id" value=""/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第一）</td>
                  <td style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_first_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_first_date" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_first_date_check1">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check1" />
                        指定なし</label>
                      <label class="radio-inline" for="retrieval_first_date_check2">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check2"  />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="retrieval_first_date_check3">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check3"  />
                        12:00～15:00</label>
                      <label class="radio-inline" for="retrieval_first_date_check4">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check4"  />
                        15:00～</label>

                    </div>
                    <div class="col col-md-3 text-center text-danger" style="padding: 6px 0px; background-color: #f5f5f5;">日程確認待</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第二）</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_second_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_second_date" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_second_date_check1">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check1" />
                        指定なし</label>
                      <label class="radio-inline" for="retrieval_second_date_check2">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check2"  />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="retrieval_second_date_check3">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check3"  />
                        12:00～15:00</label>
                      <label class="radio-inline" for="retrieval_second_date_check4">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check4"  />
                        15:00～</label>
                    </div>
                    <div class="col col-md-3 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="retrieval_pending_schedule"  id="retrieval_pending_schedule"  />
                      </div>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第三）</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_third_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_third_date" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_third_date_check1">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check1" />
                        指定なし</label>
                      <label class="radio-inline" for="retrieval_third_date_check2">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check2"  />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="retrieval_third_date_check3">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check3"  />
                        12:00～15:00</label>
                      <label class="radio-inline" for="retrieval_third_date_check4">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check4"  />
                        15:00～</label>
                    </div>
				</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取場所</td>
                  <td style="vertical-align: middle;"><input name="retrieval_takeover_place" class="form-control input-sm" maxlength="100" id="retrieval_takeover_place" type="text" value=""/></td>
                </tr>
                <tr>
                  <td colspan="2" style="background-color: #f9f9f9;"><div id="trade_address_map" style="width: 600px; height: 400px;">
                      <div id='trade_address_map' style='width:580px; height:380px; '></div>
                      </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">立会可否</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_availability1">
                        <input type="radio" name="retrieval_availability" id="retrieval_availability1"  />
                        不可</label>
                      <label class="radio-inline" for="retrieval_availability2">
                        <input type="radio" name="retrieval_availability" id="retrieval_availability2"  />
                        可能</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取業者コード</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_company_code" class="form-control input-sm" maxlength="10" id="retrieval_company_code" value="" type="tel">
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取備考</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-12" style="padding-left: 0px;">
                      <textarea name="retrieval_remark]" class="form-control input-sm" rows="3" cols="30" id="retrieval_remark"></textarea>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ナンバーカット</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_number_cut1">
                        <input type="radio" name="retrieval_number_cut" id="retrieval_number_cut1"  />
                        無</label>
                      <label class="radio-inline" for="retrieval_number_cut2">
                        <input type="radio" name="retrieval_number_cut" id="retrieval_number_cut2"  />
                        有</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取完了確認日</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_end_recognition_day" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_end_recognition_day" autocomplete="off" type="tel" value="">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取完了日</td>
                  <td class="finish_trade_td" style="vertical-align: middle;">                      
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_end_quotation" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_end_quotation" autocomplete="off" type="tel" value="">
                    </div>
				  </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
            <form id="sale_form">
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>販売管理</strong></div>
                    <div class="col col-md-2 text-center edit_sale_button_div"> 
                      <!--id22：販売情報管理--> 
                      <a href="#" class="btn btn-primary btn-sm edit_sale" id="add_sale" >編集</a> </div>
                    <input type="hidden" name="sale_id" id="sale_id" value=""/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_sale_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_sale_date" autocomplete="off" type="tel" value="">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">計上方式</td>
                  <td class="mode_radio_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="sale_accounting_method1">
                        <input type="radio" name="sale_accounting_method" id="sale_accounting_method1"  />
                        一括</label>
                      <label class="radio-inline" for="sale_accounting_method2">
                        <input type="radio" name="sale_accounting_method" id="sale_accounting_method2"  />
                        個別</label>
                    </div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="salesPrice" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売額</td>
                  <td class="sales_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_amount" class="form-control input-sm" maxlength="10" id="sale_amount" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="vehiclePrice" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車両本体価格</td>
                  <td class="vehicle_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_body_price" class="form-control input-sm" maxlength="10" id="sale_body_price"  type="tel" value=""/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="recyclingFee" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">リサイクル料</td>
                  <td class="recycling_fee_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_recycling_fee" class="form-control input-sm" maxlength="10" id="sale_recycling_fee"  type="tel" value=""/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align:middle;">落札手数料</td>
                  <td class="successful_fee_td" style="vertical-align:middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_bid_fee" class="form-control input-sm" maxlength="10" id="sale_bid_fee"  type="tel" value=""/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align:middle;">還付金代</td>
                  <td class="refund_td" style="vertical-align:middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_refund_fee" class="form-control input-sm" maxlength="10" id="sale_refund_fee"  type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0"> 円</div></td>
                </tr>
                <tr id="sale_agency_disposal_tr">
                  <td class="active">抹消代行費用</td>
                  <td class="sale_agency_disposal_td"><div class="col col-md-4 PL0">
                      <input name="sale_delete_agent_cost" class="form-control input-sm" maxlength="10" id="sale_delete_agent_cost" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最終請求額 (税込)</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" id="sale_final_charge_amount" style="padding: 6px 0px;">  円 </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先</td>
                  <td class="sales_contact_select_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-6" style="padding-left: 0px;">
                      <select name="sale_destination" class="form-control input-sm" id="sale_destination" >
                        <option  value="1">業者</option>
                        <option  value="2">業者 (書類)</option>
                        <option  value="3">業者 (Smartオークション)</option>
                        <option  value="4">オークション</option>
                        <option  value="5">国内販売</option>
                        <option  value="6">その他</option>
                      </select>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先名</td>
                  <td style="vertical-align: middle;"><!-- id22：販売情報管理 -->
                    
                    <div class="col col-md-10 contact_name_div" style="padding-left: 0px;">
                      <input name="sale_distributor_name" class="form-control input-sm" maxlength="100" id="sale_distributor_name" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先コード</td>
                  <td style="vertical-align: middle;"><div class="col col-md-10" id="contact_cd_output" style="padding: 6px 0px;"> </div>
                    <div class="col col-md-2" id="contact_phone_number_div" style="padding: 6px;"></div>
                </tr>
                <tr class="sales_remark_tr" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売備考</td>
                  <td class="sale_remark_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="sale_remark1" class="form-control input-sm" rows="3" cols="30" id="sale_remark1"></textarea>
                    </div>
                    </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">差引額</td>
                  <td class="balance_td" style="vertical-align: middle;"><!--id24：差引額設定機能-->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_deducion_amount" class="form-control input-sm" maxlength="10" id="sale_deducion_amount" type="text" value=""/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div>
                    </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入金期日</td>
                  <td class="due_date_td" style="vertical-align: middle;"><!-- id25：入金期日設定機能 -->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_deposite_due_date" class="form-control input-sm datepicker" maxlength="10" id="sale_deposite_due_date" type="tel" value=""/>
                    </div>
                   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">売掛日</td>
                  <td style="vertical-align: middle;" id="credit_sale_date">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_receivable_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_receivable_date" autocomplete="off" type="tel" value="">
                    </div>
				  </td>
                </tr>
                <tr class="bill_tr" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">請求日</td>
                  <td class="bill_td" style="vertical-align: middle;" id="sale_bill"><!-- id26：請求管理機能 -->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_billing_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_billing_date" autocomplete="off" type="tel" value="">
                    </div>
                </tr>
                <!-- id27：請求差戻機能 -->
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">着金日</td>
                  <td class="receipts_td" style="vertical-align: middle;"><!-- id28：着金管理機能 -->
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_golden_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_golden_date" autocomplete="off" type="tel" value="">
                    </div>
				  </td>
                </tr>
                <!--id67：着金解除機能-->
              </tbody>
              <!-- id22：請求書発行機能 -->
            </table>
            </form>
          </div>

<!-- Quan -->
          <div>
            <form id="sale_confirm_form">
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>販売確定情報</strong></div>
                    <div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="#" class="btn btn-primary btn-sm edit_sale" id="add_sale_confirm">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車両本体価格（確定金額）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_body_price" class="form-control input-sm" maxlength="10" id="sale_confirm_body_price"  value="" type="tel">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">確定請求金額（税込）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_established_amount" class="form-control input-sm" maxlength="10" id="sale_confirm_established_amount"  value="" type="tel">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">金額差異</td>
                  <td style="vertical-align: middle;" id="sale_confirm_difference"></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">差引額</td>
                  <td style="vertical-align: middle;" id="sale_confirm_deduction"></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入金期日（振込期日）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_payment_deadline" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_payment_deadline" autocomplete="off" type="tel" value="">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最終売掛日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_last_account_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_last_account_date" autocomplete="off" type="tel" value="">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">請求日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_billing_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_billing_date" autocomplete="off" type="tel" value="">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">着金日（振込日）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_clothing_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_clothing_date" autocomplete="off" type="tel" value="">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-10 PL0">
                      <input name="sale_confirm_remark2" class="form-control input-sm" maxlength="50" id="sale_confirm_remark2" type="text" value="">
                    </div>
				          </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
            <form id="transfer_form">
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>顧客振込情報</strong></div>
                    <div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="#" class="btn btn-primary btn-sm edit_sale" id="add_transfer">編集</a> </div>
                
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">確定金額</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="transfer_determine_amount" class="form-control input-sm" maxlength="10" id="transfer_determine_amount"  value="" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-10 PL0">
                      <input name="transfer_remark3" class="form-control input-sm" maxlength="50" id="transfer_remark3" type="text" value="">
                    </div>
				  </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
          
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>Smartオークション出品情報</strong></div>
                    <div class="col col-md-2 text-center exhibit_scrap_auction_button_div"> 
                      <!--id30：Smart情報管理-->
                      <a href="#" class="btn btn-primary btn-sm exhibit_scrap_auction" id="add_order">編集</a> </div>
                    </div>
                    <input type="hidden" name="order_id" id="order_id" value=""/>
                  </th>
                </tr>
              </thead>
              <tbody>
              <form id="order_form" >
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">出品状況</td>
                  <td style="vertical-align: middle;">
        					  <div class="col col-md-4 PL0">
        							<select name="order_status" class="form-control input-sm" id="order_status">
        							  <option value="">----------</option>
        							  <option  value="1">未出品</option>
        							  <option  value="2">出品中</option>
        							  <option  value="3">落札</option>
        							  <option  value="4">商談中</option>
        							  <option  value="5">流札</option>
        							</select>
        						</div>
        				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最低落札価格</td>
                  <td class="start_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="order_asking_price" class="form-control input-sm" maxlength="8" id="order_asking_price" type="text" value=""/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入札締切日時</td>
                  <td class="end_at_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;" for="end_at_datepicker">
                      <input name="order_deadline_date" class="form-control input-sm datepicker" maxlength="10" id="order_deadline_date" autocomplete="off" type="text" value=""/>
                    </div>
                    <div class="col col-md-5">
                      <select name="order_deadline_hour" class="select-time" style="width: 55px; height: 30px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;" id="order_deadline_hour">
                        <option  value="00">0</option>
                        <option  value="01">1</option>
                        <option  value="02">2</option>
                        <option  value="03">3</option>
                        <option  value="04">4</option>
                        <option  value="05">5</option>
                        <option  value="06">6</option>
                        <option  value="07">7</option>
                        <option  value="08">8</option>
                        <option  value="09">9</option>
                        <option  value="11">11</option>
                        <option  value="12">12</option>
                        <option  value="13">13</option>
                        <option  value="14">14</option>
                        <option  value="15">15</option>
                        <option  value="16">16</option>
                        <option  value="17">17</option>
                        <option  value="18">18</option>
                        <option  value="19">19</option>
                        <option  value="20">20</option>
                        <option  value="21">21</option>
                        <option  value="22">22</option>
                        <option  value="23">23</option>
                      </select>
                      :
                      <select name="order_deadline_minute" class="select-time" style="width: 55px; height: 30px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;" id="order_deadline_minute">
                        <option  value="00" selected="selected">00</option>
                        <option  value="15">15</option>
                        <option  value="30">30</option>
                        <option  value="45">45</option>
                      </select>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">訂正備考</td>
                  <td style="vertical-align: middle;"><div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="order_remark" class="form-control input-sm" rows="3" cols="30" id="order_remark"></textarea>
                    </div></td>
                </tr>
                </form>
                <tr class="scrap_tender_list_tr" style="height: 41px;">
                <td class="active" style="width: 120px; vertical-align: middle;">入札状況</td>
                  <td style="vertical-align: middle;" class="scrap_tender_list_td" id="order_content">
                  </td>
                </tr>
        				<tr>
                  <form id="bid_price_form">
                    <td class="active" style="vertical-align: middle;">代理入札</td>
                    <td style="vertical-align: middle;"><div class="col col-md-12">
                      <div class="col col-md-4">業者名</div>
                      <input name="order_trader_name" class="form-control input-sm ui-autocomplete-input" id="order_trader_name" value=""  type="text"/>
                    </div>
                    <div class="col col-md-12">
                      <div class="col col-md-4">入札額</div>
                      <input name="order_trader_bid" class="form-control input-sm ui-autocomplete-input" id="order_trader_bid" type="tel"/>
                    </div>
                    <div class="col col-md-12" style="margin:10px auto;text-align:right;"> 
                        <a href="#" id="order_bid_price" class="btn btn-primary">入札</a> </div></td>
                  </form>
                </tr>
				
                <!-- 業者質問管理　--> 
                <!-- 業者クレーム管理　-->
              </tbody>
            </table>
            
          </div>
          <div>
          <form id="various_cost_form">
            <table class="table table-bordered table-condensed info_table" style="margin-bottom: 0px;">
              <thead>
                <tr class="info">
                  <th colspan="4"> <div class="col col-md-10 lead PL0 MB0"><strong>オークション関連諸費用管理</strong></div>
                    <div class="col col-md-2 text-center text-danger register_auction_cost_div"> <a href="#" class="btn btn-primary btn-sm register_auction_cost" id="add_various_cost">登録</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody id="various_cost_content">
                <tr class="active text-center">
                  <td style="width: 120px; vertical-align: middle;">日付</td>
                  <td style="width: 150px; vertical-align: middle;">分類</td>
                  <td style="vertical-align: middle;">備考</td>
                  <td style="width: 150px; vertical-align: middle;">手数料 (税別)</td>
                </tr>
                <tr style="height: 41px;">
                  <td><div class="col col-md-12 required" style="padding-left: 0px; padding-right: 0px;">
                      <input name="various_cost_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="various_cost_date" type="tel"/>
                    </div></td>
                  <td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">
                      <select name="various_cost_classification" class="form-control input-sm" id="various_cost_classification">
                        <option value="1">AA出品料</option>
                        <option value="2">AA成約料</option>
                        <option value="3">AAペナルティ</option>
                        <option value="5">陸送費</option>
                        <option value="9">その他</option>
                      </select>
                    </div></td>
                  <td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">
                      <input name="various_cost_remark" class="form-control input-sm" maxlength="50" id="various_cost_remark" type="text"/>
                    </div></td>
                  <td><div class="col col-md-11 required" style="padding-left: 0px;">
                      <input name="various_cost_commission" class="form-control input-sm ime-disabled" maxlength="7" id="various_cost_commission" type="tel"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                
                
              </tbody>
            </table>
            </form>
          </div>
          <div class="auction_cost_list_div"> </div>
          <div>
            <form id="recycling_form">
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0" id="recycling_deposit_box"><strong>リサイクル料管理</strong></div>
                  	<div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="#" class="btn btn-primary btn-sm " id="add_recycling" >編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">預託状況</td>
                  <td style="vertical-align: middle;">
        				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
          						<input name="recycling_deposite_situation" class="form-control input-sm" maxlength="100" id="recycling_deposite_situation" value="" type="text">
          					</div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">リサイクル料</td>
                  <td style="vertical-align: middle;"> <div class="col col-md-8 PL0" id="recycling_deposit_status">
        						<input name="recycling_recycling_fee" class="form-control input-sm" maxlength="100" id="recycling_recycling_fee" value="" type="text">
        					</div>
        	  			</td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <div>
          <form id="refund_form">
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>還付金管理</strong></div>
                  	<div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="#" class="btn btn-primary btn-sm" id="add_refund" >編集</a> </div>
                    <input type="hidden" name="refund_id" id="refund_id" value=""/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自賠責返戻</td>
                 <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_return_responsitory" class="form-control input-sm" maxlength="100" id="refund_return_responsitory" value="" type="text">
					</div>
				   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">重量税還付</td>
                  <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_weight_tax_refund" class="form-control input-sm" maxlength="100" id="refund_weight_tax_refund" value="" type="text">
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自動車税支払日</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="refund_tax_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="refund_tax_date" autocomplete="off" type="tel" value="">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">支払金額</td>
                 <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_payment" class="form-control input-sm" maxlength="100" id="refund_payment" value="" type="text">
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自動車税還付金</td>
                  <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_automobile_refund" class="form-control input-sm" maxlength="100" id="refund_automobile_refund" value="" type="text">
					</div>
				  </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>

  </div>
@endsection
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
                    <div class="col col-md-2 text-center edit_seller_button_div"> <a href="#" class="btn btn-primary btn-sm edit_seller" id="edit_seller">編集</a> </div>
                    <input type="hidden" name="seller_seller_id" id="seller_seller_id" value="{{$seller->id}}"/>
                    <input type="hidden" name="seller_seller_cd" id="seller_seller_cd" value=""/>
                    <input type="hidden" name="seller_car_id" id="seller_car_id" value="{{$infor->seller_car_id}}"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">依頼者 <small class="text-danger" style="font-style: italic;">必須</small></td>
                  <td><div class="col col-md-9 PL0">
                      <input name="seller_seller_name" class="form-control input-sm" maxlength="50" id="seller_seller_name" type="text" value="{{$seller->name}}"/>
                    </div>
                    <div class="col col-md-3 text-danger" style="padding: 0px; height: 30px;"><small>(フルネーム・<br />
                      各種印字用宛名)</small></div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ふりがな</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-9 PL0">
                      <input name="seller_seller_kana_name" class="form-control input-sm hiragana" maxlength="50" id="seller_seller_kana_name" type="text" value="{{$seller->kana_name}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">関係者</td>
                  <td><div class="col col-md-6 PL0">
                      <input name="seller_seller_participant" class="form-control input-sm" maxlength="50" id="seller_seller_participant" type="text" value="{{$seller->participant}}"/>
                    </div>
                    <div class="col col-md-2 col-md-offset-1 text-center P6_0" style="background-color: #f5f5f5;">連絡先</div>
                    <div class="col col-md-2 col-md-offset-1 text-center P6_0" style="background-color: #f5f5f5;">架電不可</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号1</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone1" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone1" type="tel" value="{{$seller->phone1}}"/>
                    </div>
                    <div class="col col-md-2 phone_number1_div" style="padding-top:6px;"> <a href="/crm/AgreementOrders/edit/118262" class="call_phone" incoming_number="{{$seller->phone1}}" dial_number="0120301456" speaker_cd="U04799576" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone1" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone1" type="text" value="{{$seller->phone_home1}}"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                        <input type="checkbox" name="seller_seller_phone_check1"  id="seller_seller_phone_check1" {{ $seller->phone_check1 == 1?'checked':''}}/>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号2</td>
                  <td class="form-horizontal"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone2" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone2" type="tel" value="{{$seller->phone2}}"/>
                    </div>
                    <div class="col col-md-2 phone_number2_div" style="padding-top:6px;"> <a href="/crm/AgreementOrders/edit/118262" class="call_phone" incoming_number="048-721-7836" dial_number="0120301456" speaker_cd="U04799576" inquiry_id="388102"><span class="glyphicon glyphicon-phone-alt"></span></a> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone2" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone2" type="text" value="{{$seller->phone_home2}}"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                        <input type="checkbox" name="seller_seller_phone_check2"  id="seller_seller_phone_check2" {{ $seller->phone_check2 == 1?'checked':''}}/>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号3</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone3" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone3" type="tel" value="{{$seller->phone3}}"/>
                    </div>
                    <div class="col col-md-2 phone_number3_div" style="padding-top:6px;"> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone3" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone3" type="text" value="{{$seller->phone_home3}}"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                         <input type="checkbox" name="seller_seller_phone_check3"  id="seller_seller_phone_check3" {{ $seller->phone_check3 == 1?'checked':''}}/>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">電話番号4</td>
                  <td class="form-horizontal"><div class="col col-md-4 PL0">
                      <input name="seller_seller_phone4" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_phone4" type="tel" value="{{$seller->phone4}}"/>
                    </div>
                    <div class="col col-md-2 phone_number4_div" style="padding-top:6px;"> </div>
                    <div class="col col-md-4">
                      <input name="seller_seller_home_phone4" class="form-control input-sm" maxlength="5" id="seller_seller_home_phone4" type="text" value="{{$seller->phone_home4}}"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-1">
                      <div class="checkbox">
                        <input type="checkbox" name="seller_seller_phone_check4"  id="seller_seller_phone_check4" {{ $seller->phone_check4 == 1?'checked':''}}/>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">FAX番号</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-4 PL0">
                      <input name="seller_seller_fax" class="form-control input-sm ime-disabled" maxlength="13" id="seller_seller_fax" type="tel" value="{{$seller->fax}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">郵便番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="seller_seller_zip_code" class="form-control input-sm ime-disabled" maxlength="8" id="seller_seller_zip_code" type="tel" value="{{$seller->zip_code}}"/>
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
                              <option {{$item_detail->id == $seller->erea_id?'selected':''}} value="{{$item_detail->id}}">{{$item_detail->name}}</option>
                            @endforeach
                          </optgroup>
                        @endforeach
                      </select>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">住所</td>
                  <td><input name="seller_seller_address" class="form-control input-sm" maxlength="100" id="seller_seller_address" type="text" value="{{$seller->address}}"/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">建物名・部屋番号等</td>
                  <td style="background-color: #f9f9f9;"><input name="seller_seller_building_number" class="form-control input-sm" maxlength="50" id="seller_seller_building_number" type="text" value="{{$seller->building_number}}"/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">年齢</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="seller_seller_age" class="form-control input-sm ime-disabled" maxlength="3" id="seller_seller_age" type="tel" value="{{$seller->age}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">職業</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-3 PL0">
                      <input name="seller_seller_career" class="form-control input-sm" maxlength="20" id="seller_seller_career" type="text" value="{{$seller->career}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">メールアドレス1</td>
                  <td><input name="seller_seller_email1" class="form-control input-sm ime-disabled" maxlength="100" id="seller_seller_email1" type="email" value="{{$seller->email1}}"/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">メールアドレス2</td>
                  <td style="background-color: #f9f9f9;"><input name="seller_seller_email2" class="form-control input-sm ime-disabled" maxlength="100" id="seller_seller_email2" type="email" value="{{$seller->email2}}"/></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">依頼者性別</td>
                  <td><div class="col col-md-12 P6_0">                      
                  	<label class="radio-inline" for="sellerGender1">
                        <input type="radio" name="seller_seller_gender" id="seller_seller_gender1" value="1" {{$seller->gender == 1?'checked':''}} />
                        男性</label>
                      <label class="radio-inline" for="sellerGender2">
                        <input type="radio" name="seller_seller_gender" id="seller_seller_gender2" value="2" {{$seller->gender == 0?'checked':''}} />
                        女性</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">免許証番号</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-3 PL0">
                      <input name="seller_seller_license" id="seller_seller_license" class="form-control input-sm" maxlength="10" value="{{$seller->license}}" type="tel"/>
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
                      <input name="seller_seller_register_date" class="form-control input-sm　ime-disabled datepicker" maxlength="19" id="seller_seller_register_date" type="tel" value="{{$seller->register_date}}"/>
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
                    <div class="col col-md-2 text-center edit_account_button_div"> <a href="#" class="btn btn-primary btn-sm edit_account" id="edit_account">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px;">銀行名</td>
                  <td class="bank_td"><div class="col col-md-6 PL0">
                      <input name="account_bank_name" class="form-control input-sm" maxlength="30" id="account_bank_name" type="text" value="{{$seller->bank_name}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">銀行コード</td>
                  <td class="bank_code_td"><div class="col col-md-3 PL0">
                      <input name="account_bank_code" class="form-control input-sm" maxlength="4" id="account_bank_code" type="tel" value="{{$seller->bank_code}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">支店名</td>
                  <td class="branch_name_td"><div class="col col-md-6 PL0">
                      <input name="account_branch_name" class="form-control input-sm" maxlength="30" id="account_branch_name" type="text" value="{{$seller->branch_name}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">支店番号</td>
                  <td class="branch_number_td"><div class="col col-md-2 PL0">
                      <input name="account_branch_code" class="form-control input-sm ime-disabled" maxlength="3" id="account_branch_code" type="tel" value="{{$seller->branch_name}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座種別</td>
                  <td class="account_classification_td"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="account_account_type1">
                        <input type="radio" name="account_account_type" id="account_account_type1" {{$seller->account_type == 1?'checked':''}} />
                        普通 </label>
                      <label class="radio-inline" for="account_account_type2">
                        <input type="radio" name="account_account_type" id="account_account_type2" {{$seller->account_type == 2?'checked':''}}  />
                        当座 </label>
                      <label class="radio-inline" for="account_account_type3">
                        <input type="radio" name="account_account_type" id="account_account_type3" {{$seller->account_type == 3?'checked':''}}  />
                        貯蓄 </label>
                      <label class="radio-inline" for="account_account_type4">
                        <input type="radio" name="account_account_type" id="account_account_type4" {{$seller->account_type == 4?'checked':''}}  />
                        その他 </label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座番号</td>
                  <td class="account_number_td"><div class="col col-md-3 PL0">
                      <input name="account_account_number" class="form-control input-sm ime-disabled" maxlength="7" id="account_account_number" type="tel" value="{{$seller->account_number}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座名義人 (カナ)</td>
                  <td class="nominee_name_td"><input name="account_account_holder" class="form-control input-sm katakana" maxlength="50" id="account_account_holder" type="text" value="{{$seller->account_holder}}"/></td>
                </tr>
                <tr>
                  <td class="active">振込状態</td>
                 <td>
                      <label class="radio-inline" for="account_transfer_status1">
                        <input type="radio" name="account_transfer_status" id="account_transfer_status1" {{$seller->transfer_status == 1?'checked':''}} />
                        未 </label>
                      <label class="radio-inline" for="account_transfer_status2">
                        <input type="radio" name="account_transfer_status" id="account_transfer_status2" {{$seller->transfer_status == 2?'checked':''}} />
                        振込待ち </label>
                      <label class="radio-inline" for="account_transfer_status3">
                        <input type="radio" name="account_transfer_status" id="account_transfer_status3" {{$seller->transfer_status == 3?'checked':''}} />
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
                    <div class="col col-md-2 text-center edit_own_car_button_div"> <a href="#" class="btn btn-primary btn-sm edit_own_car" id="edit_infor" >編集</a> </div>
                    <input type="hidden" name="infor_id" id="infor_id" value="{{$infor->id}}"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車種名</td>
                  <td><div class="col col-md-12 PA0" style="margin-bottom:5px;">
                      <div class="col col-md-12 PL0">
                        <input name="infor_car_name" class="form-control input-sm" maxlength="50" id="infor_car_name" autocomplete="off" readonly="readonly" type="text" value="{{$infor->car_name}}"/>
                      </div>
                    </div>
                    <div class="col col-md-12 PA0">
                      <div class="col col-md-5 PL0">
                        <select name="infor_maker_id" class="form-control input-sm" id="infor_maker_id">
                          <option value="">----------</option>
                          @foreach($maker as $item)
                            <option {{$item->id == $infor->maker_id?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      <div class="col col-md-7 PL0">
                        <select name="infor_car_id" class="form-control input-sm" id="infor_car_id">
                          <option value="">----------</option>
                          @foreach($car as $item)
                            <option {{$item->id == $infor->car_id?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">車両区分</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_classification1">
                        <input type="radio" name="infor_classification" id="infor_classification1" {{$infor->classification == 1?'checked':''}} />
                        普通自動車</label>
                      <label class="radio-inline" for="infor_classification2">
                        <input type="radio" name="infor_classification" id="infor_classification2" {{$infor->classification == 2?'checked':''}} />
                        軽自動車</label>
                    </div></td>
                </tr>
                <tr class="form-horizontal">
                  <td class="active" style="vertical-align: middle;">年式</td>
                  <td><div class="col col-md-2 PL0">
                      <select name="infor_car_year_type" class="form-control input-sm ime-disabled" id="infor_car_year_type" autocomplete="off">
                        <option {{$infor->car_year_type == 'H'?'selected':''}} value="H">H</option>
                        <option {{$infor->car_year_type == 'S'?'selected':''}} value="S">S</option>
                      </select>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_car_year" class="form-control input-sm ime-disabled" id="infor_car_year" maxlength="2" autocomplete="off" type="tel" value="{{$infor->car_year}}"/>
                    </div>
                    <div class="col col-md-1 P6_0">年</div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_car_month" class="form-control input-sm ime-disabled" id="infor_car_month" maxlength="2" autocomplete="off" type="tel" value="{{$infor->car_month}}"/>
                    </div>
                    <div class="col col-md-1 P6_0">月</div>
                    <div class="col col-md-1 col-md-offset-1 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_about_check"  id="infor_about_check" {{$infor->about_check == 1?'checked':''}} />
                      </div>
                    </div>
                   
                    <div class="col col-md-1 P6_0"> くらい</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">購入</td>
                  <td style="vertical-align:middle;"><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_purchase1">
                        <input type="radio" name="infor_purchase" id="infor_purchase1" {{$infor->purchase == 1?'checked':''}} />
                        新車購入</label>
                      <label class="radio-inline" for="infor_purchase2">
                        <input type="radio" name="infor_purchase" id="infor_purchase2" {{$infor->purchase == 2?'checked':''}} />
                        中古車購入</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">走行距離</td>
                  <td><div class="col col-md-4 PL0">
                      <input name="infor_mileage" class="form-control input-sm ime-disabled mileage" maxlength="10" id="infor_mileage" type="text" value="{{$infor->mileage}}"/>
                    </div>
                    <div class="col col-md-1 P6_0"> km</div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">車検日</td>
                  <td><div class="col col-md-2 PL0">
                      <select name="infor_inspection" class="form-control input-sm ime-disabled" id="infor_inspection" autocomplete="off">
                        <option {{$infor->inspection == 'H'?'selected':''}} value="H">H</option>
                        <option {{$infor->inspection == 'H'?'selected':''}} value="S">S</option>
                      </select>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_inspection_year" class="form-control input-sm ime-disabled" id="infor_inspection_year" maxlength="2" autocomplete="off" type="tel" value="{{$infor->inspection_year}}"/>
                    </div>
                    <div class="col col-md-1 P6_0">年</div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_inspection_month" class="form-control input-sm ime-disabled" id="infor_inspection_month" maxlength="2" autocomplete="off" type="tel" value="{{$infor->inspection_month}}"/>
                    </div>
                    <div class="col col-md-1 P6_0">月</div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_inspection_day" class="form-control input-sm ime-disabled" id="infor_inspection_day" maxlength="2" autocomplete="off" type="tel" value="{{$infor->inspection_day}}"/>
                    </div>
                    <div class="col col-md-1 P6_0">日</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">自走可否</td>
                  <td><div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="info_self_propelled11">
                        <input type="radio" name="info_self_propelled1" id="info_self_propelled11" {{$infor->self_propelled1 == 1?'checked':''}} />
                        走行可能</label>
                      <label class="radio-inline own_car_runnable" for="OwnCarRunnable0">
                        <input type="radio" name="info_self_propelled1" id="info_self_propelled11" {{$infor->self_propelled1 == 2?'checked':''}} />
                        走行不可</label>
                    </div>
                    <div id="own_car_status_box" class="col col-md-12 P6_0">
                      <div id="own_car_runnable_subbox" style="display:block">
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled21" {{$infor->self_propelled2[0] == 1?'checked':''}}/>
                        <label for="info_self_propelled21" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">使用中</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled22" {{$infor->self_propelled2[1] == 1?'checked':''}}/>
                        <label for="info_self_propelled22" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">エンジン異音</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled23" {{$infor->self_propelled2[2] == 1?'checked':''}}/>
                        <label for="info_self_propelled23" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">白煙</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled24" {{$infor->self_propelled2[3] == 1?'checked':''}}/>
                        <label for="info_self_propelled24" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">バッテリ上</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled25" {{$infor->self_propelled2[4] == 1?'checked':''}}/>
                        <label for="info_self_propelled25" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">エンジン不調</label>
                      </div>
                      <div id="own_car_unrunnable_subbox" style="display:none">
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled26" {{$infor->self_propelled2[5] == 1?'checked':''}}/>
                        <label for="info_self_propelled26" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">タイヤ動作OK</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled27" {{$infor->self_propelled2[6] == 1?'checked':''}}/>
                        <label for="info_self_propelled27" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">タイヤパンク</label>
                        <input type="checkbox" name="info_self_propelled2"  id="info_self_propelled28" {{$infor->self_propelled2[7] == 1?'checked':''}}/>
                        <label for="info_self_propelled28" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">バッテリ上</label>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">走行状態</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_running_condition" class="form-control input-sm" rows="3" cols="30" id="infor_running_condition">{{$infor->running_condition}}
                      </textarea>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">4tユニック進入</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_4t_unic1">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic1" {{$infor->t4_unic == 1?'checked':''}} />
                        不可</label>
                      <label class="radio-inline" for="infor_4t_unic2">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic2" {{$infor->t4_unic == 2?'checked':''}} />
                        可能</label>
                      <label class="radio-inline" for="infor_4t_unic3">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic3" {{$infor->t4_unic == 3?'checked':''}} />
                        たぶん可</label>
                      <label class="radio-inline" for="infor_4t_unic4">
                        <input type="radio" name="infor_4t_unic" id="infor_4t_unic4" {{$infor->t4_unic == 4?'checked':''}} />
                        2tならOK</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ボディーカラー</td>
                  <td><div class="col col-md-4 PL0">
                      <input name="infor_body_color" class="form-control input-sm" maxlength="20" id="infor_body_color" type="text" value="{{$infor->body_color}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">排気量</td>
                  <td class="form-horizontal"><div class="col col-md-3 PL0">
                      <input name="infor_displacement" class="form-control input-sm ime-disabled displacement" maxlength="5" id="infor_displacement" type="text" value="{{$infor->displacement}}"/>
                    </div>
                    <div class="col col-md-1 P6_0"> cc</div>
                    <div class="col col-md-1 col-md-offset-4 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_about_check"  id="infor_about_check" {{$infor->about_check == 1?'checked':''}}/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> くらい</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">エンジンの型式</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="infor_engine_model" class="form-control input-sm" maxlength="10" id="infor_engine_model" type="text" value="{{$infor->engine_model}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ターボ (過給器)</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_turbo1">
                        <input type="radio" name="infor_turbo" id="infor_turbo1" {{$infor->turbo == 1?'checked':''}} />
                        無 (N/A、自然吸気エンジン)</label>
                      <label class="radio-inline" for="infor_turbo2">
                        <input type="radio" name="infor_turbo" id="infor_turbo2" {{$infor->turbo == 2?'checked':''}} />
                        有 (ターボエンジン、スーパーチャージャー)</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">型式</td>
                  <td class="form-horizontal"><div class="col col-md-5 PL0">
                      <input name="infor_type" class="form-control input-sm" maxlength="30" id="infor_type" type="text" value="{{$infor->type}}"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-3 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_ambiguous_check"  id="infor_ambiguous_check" {{$infor->ambiguous_check == 1?'checked':''}}/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> 曖昧</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">型式指定番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="infor_model_number" class="form-control input-sm ime-disabled" maxlength="6" id="infor_model_number" type="text" value="{{$infor->model_number}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">類別区分番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="infor_category_number" class="form-control input-sm ime-disabled" maxlength="4" id="infor_category_number" type="text" value="{{$infor->category_number}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">グレード</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_grade" class="form-control input-sm" maxlength="50" id="infor_grade" type="text" value="{{$infor->grade}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">駆動方式</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_drive_system1">
                        <input type="radio" name="infor_drive_system" id="infor_drive_system1" {{$infor->drive_system == 1?'checked':''}}/>
                        2WD (FF / FR 等)</label>
                      <label class="radio-inline" for="infor_drive_system2">
                        <input type="radio" name="infor_drive_system" id="infor_drive_system2" {{$infor->drive_system == 1?'checked':''}} />
                        4WD (AWD)</label>
                      <label class="radio-inline" for="infor_drive_system3">
                        <input type="radio" name="infor_drive_system" id="infor_drive_system3" {{$infor->drive_system == 1?'checked':''}} />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">トランスミッション</td>
                  <td><div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="infor_transmission1">
                        <input type="radio" name="infor_transmission" id="infor_transmission1" {{$infor->transmission == 1?'checked':''}} />
                        AT (CVT)</label>
                      <label class="radio-inline" for="infor_transmission2">
                        <input type="radio" name="infor_transmission" id="infor_transmission2"  {{$infor->transmission == 2?'checked':''}} />
                        MT</label>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="infor_speed" class="form-control input-sm ime-disabled" maxlength="1" id="infor_speed" type="text" value="{{$infor->speed}}"/>
                    </div>
                    <div class="col col-md-1 P6_0"> 速</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">燃料</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_owner1">
                        <input type="radio" name="infor_fuel" id="infor_fuel1" {{$infor->fuel == 1?'checked':''}}/>
                        ガソリン</label>
                      <label class="radio-inline" for="infor_owner2">
                        <input type="radio" name="infor_fuel" id="infor_fuel2" {{$infor->fuel == 2?'checked':''}}/>
                        ディーゼル</label>
                      <label class="radio-inline" for="infor_owner3">
                        <input type="radio" name="infor_fuel" id="infor_fuel3" {{$infor->fuel == 3?'checked':''}}/>
                        ハイブリッド</label>
                      <label class="radio-inline" for="infor_owner4">
                        <input type="radio" name="infor_fuel" id="infor_fuel4" {{$infor->fuel == 4?'checked':''}}/>
                        電気自動車</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">所有者 (名義)</td>
                  <td class="form-horizontal"><div class="col col-md-6 PL0">
                      <input name="infor_owner" class="form-control input-sm" maxlength="50" id="infor_owner" type="text" value="{{$infor->owner}}"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-2 text-right PR0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_personal_check"  id="infor_personal_check" {{$infor->personal_check == 1?"checked":''}}/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> 個人</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">所有者住所</td>
                  <td><input name="infor_residence" class="form-control input-sm" maxlength="100" id="infor_residence" type="text" value="{{$infor->residence}}"/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車検証と印鑑証明書の住所までの引越し回数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="infor_number_stamp" class="form-control input-sm ime-disabled" maxlength="1" id="infor_number_stamp" type="tel" value="{{$infor->number_stamp}}"/>
                    </div>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ローン残債状況</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_balance_status" class="form-control input-sm" maxlength="50" id="infor_balance_status" type="text" value="{{$infor->balance_status}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">一時抹消登録</td>
                  <td><div class="col col-md-6 P6_0">
                      <label class="radio-inline" for="infor_delete_temp1">
                        <input type="radio" name="infor_delete_temp" id="infor_delete_temp1" {{$infor->delete_temp == 1?'checked':''}}/>
                        未</label>
                      <label class="radio-inline" for="infor_delete_temp2">
                        <input type="radio" name="infor_delete_temp" id="infor_delete_temp2" {{$infor->delete_temp == 2?'checked':''}} />
                        済</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事故歴・修復歴</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarAccidents0">
                        <input type="radio" name="infor_accident_repair" id="infor_accident_repair1" {{$infor->accident_repair == 1?'checked':''}}/>
                        無</label>
                      <label class="radio-inline" for="infor_accident_repair2">
                        <input type="radio" name="infor_accident_repair" id="infor_accident_repair2" {{$infor->accident_repair == 2?'checked':''}} />
                        有</label>
                      <label class="radio-inline" for="infor_accident_repair3">
                        <input type="radio" name="infor_accident_repair" id="infor_accident_repair3" {{$infor->accident_repair == 3?'checked':''}}/>
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">保証書</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_written_guarantee" class="form-control input-sm" maxlength="50" id="infor_written_guarantee" type="text" value="{{$infor->written_guarantee}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">点検記録簿</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_record_book" class="form-control input-sm" maxlength="50" id="infor_record_book" type="text" value="{{$infor->record_book}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車歴</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="infor_history1">
                        <input type="radio" name="infor_history" id="infor_history1" {{$infor->history == 1?'checked':''}} />
                        自家用</label>
                      <label class="radio-inline" for="infor_history2">
                        <input type="radio" name="infor_history" id="infor_history2" {{$infor->history == 2?'checked':''}} />
                        事業用</label>
                      <label class="radio-inline" for="infor_history3">
                        <input type="radio" name="infor_history" id="infor_history3" {{$infor->history == 3?'checked':''}} />
                        レンタル</label>
                      <label class="radio-inline" for="infor_history4">
                        <input type="radio" name="infor_history" id="infor_history4" {{$infor->history == 4?'checked':''}}  />
                        未確認</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">喫煙状況</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="info_smoking_status1">
                        <input type="radio" name="info_smoking_status" id="info_smoking_status1" {{$infor->smoking_status == 1?'checked':''}} />
                        禁煙車</label>
                      <label class="radio-inline" for="info_smoking_status2">
                        <input type="radio" name="info_smoking_status" id="info_smoking_status2" {{$infor->smoking_status == 2?'checked':''}} />
                        喫煙車</label>
                      <label class="radio-inline" for="info_smoking_status3">
                        <input type="radio" name="info_smoking_status" id="info_smoking_status3" {{$infor->smoking_status == 3?'checked':''}} />
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
                        <input type="radio" name="infor_equipment" id="infor_equipment{{$i}}" data-id="{{$equipment[$i]->id}}" {{in_array($equipment[$i]->id,$infor->equipment)?'checked':''}}  />
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
                        <input type="radio" name="infor_air_condition" id="infor_air_condition1" {{$infor->air_condition == 1?'checked':''}} />
                        無</label>
                      <label class="radio-inline" for="infor_air_condition2">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition2" {{$infor->air_condition == 2?'checked':''}} />
                        オートエアコン</label>
                      <label class="radio-inline" for="infor_air_condition3">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition3" {{$infor->air_condition == 3?'checked':''}} />
                        マニュアルエアコン</label>
                      <label class="radio-inline" for="infor_air_condition4">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition4" {{$infor->air_condition == 4?'checked':''}} />
                        故障</label>
                      <label class="radio-inline" for="infor_air_condition5">
                        <input type="radio" name="infor_air_condition" id="infor_air_condition5" {{$infor->air_condition == 5?'checked':''}} />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">装備品（オプション等）備考</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_remark" class="form-control input-sm" maxlength="50" id="infor_remark" type="text" value="{{$infor->remark}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ドア数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="infor_number_door" class="form-control input-sm ime-disabled" maxlength="1" id="infor_number_door" type="tel" value="{{$infor->number_door}}"/>
                    </div>
                    <div class="col col-md-2 P6_0"> ドア</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">乗員定員数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="infor_number_passenger" class="form-control input-sm ime-disabled" maxlength="1" id="infor_number_passenger" type="tel" value="{{$infor->number_passenger}}"/>
                    </div>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(外装)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_condition" class="form-control input-sm" rows="3" placeholder="外装" cols="30" id="infor_condition">{{$infor->condition}}</textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(内装)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_state_interior" class="form-control input-sm" rows="3" placeholder="内装" cols="30" id="infor_state_interior">{{$infor->state_interior}}</textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(その他)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_state_other" class="form-control input-sm" rows="3" placeholder="車両（その他）" cols="30" id="infor_state_other">{{$infor->state_other}}</textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">その他PRポイント</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="infor_pr_points" class="form-control input-sm" rows="3" placeholder="その他PRポイント" cols="30" id="infor_pr_points">{{$infor->pr_points}}</textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両番号 (N/P)</td>
                  <td><div class="col col-md-6 PL0">
                      <input name="infor_vehicle_number" class="form-control input-sm" maxlength="20" id="infor_vehicle_number" type="text" value="{{$infor->vehicle_number}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車台番号</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="infor_chassis_number" class="form-control input-sm" maxlength="30" id="infor_chassis_number" type="tel" value="{{$infor->chassis_number}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">要望：取外部品</td>
                  <td class="form-horizontal"><div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part1" {{$infor->remove_part[0] == 1?'checked':''}}/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;">ナビ</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part2" {{$infor->remove_part[1] == 1?'checked':''}}/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;">ETC</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part3" {{$infor->remove_part[2] == 1?'checked':''}}/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;"> タイヤ</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="checkbox" name="infor_remove_part"  id="infor_remove_part4" {{$infor->remove_part[3] == 1?'checked':''}}/>
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
                @foreach($images as $item)
                <tr id="row_img_{{$item->id}}">
                  <td class="text-center">
                    <div style="margin-bottom:5px;"><a href="{{url('/').'/'.$item->url}}" id="image_url_show_a{{$item->id}}" rel="lightbox" class="lightbox_photo"><img src="{{url('/').'/'.$item->url}}" alt="車検証写真" width="120" id="image_url_show{{$item->id}}"></a></div>
                    <div>
                        <input class="form-control input-sm notfocus" id="image_name_show_left{{$item->id}}" maxlength="20" type="text" value="{{$item->name}}" disabled="disabled"/></div>
                    </td>
                    <td class="text-center">
                                <div class="col col-md-12 PR0 PL0">
                                    <p class="iconclose"><button type="button" class="close delete_image" data-id="{{$item->id}}" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button></p>
                                </div>
                                <div>
                        <input class="form-control input-sm notfocus" id="image_name_show_right{{$item->id}}" maxlength="20" type="text" value="{{$item->name}}" disabled="disabled"/></div>
                      <br>           
                      <div class="text-center"> 
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_edit_image{{$item->id}}">ファイル参照</button>
                                      <!-- Modal -->
                                      <div class="modal fade" id="Modal_edit_image{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              </div>
                                              <div class="modal-body">
                                                <label for="image_url{{$item->id}}" class="custom-file-upload"></label>
                                                <input type="file" id="image_url{{$item->id}}" accept="image/*">
                                                <select name="image_index_edit{{$item->id}}" class="form-control input-sm" id="image_index_edit{{$item->id}}">
                                                  <option {{$item->index == 1?'selected':''}} value="1">1</option>
                                                  <option {{$item->index == 2?'selected':''}} value="2">2</option>
                                                  <option {{$item->index == 3?'selected':''}} value="3">3</option>
                                                  <option {{$item->index == 4?'selected':''}} value="4">4</option>
                                                  <option {{$item->index == 5?'selected':''}} value="5">5</option>
                                                  <option {{$item->index == 6?'selected':''}} value="6">6</option>
                                                  <option {{$item->index == 7?'selected':''}} value="7">7</option>
                                                  <option {{$item->index == 8?'selected':''}} value="8">8</option>
                                                  <option {{$item->index == 9?'selected':''}} value="9">9</option>
                                                  <option {{$item->index == 10?'selected':''}} value="10">10</option>
                                                  <option {{$item->index == 11?'selected':''}} value="11">11</option>
                                                  <option {{$item->index == 12?'selected':''}} value="12">12</option>
                                                  <option {{$item->index == 13?'selected':''}} value="13">13</option>
                                                  <option {{$item->index == 14?'selected':''}} value="14">14</option>
                                                  <option {{$item->index == 15?'selected':''}} value="15">15</option>
                                                  <option {{$item->index == 16?'selected':''}} value="16">16</option>
                                                </select>
                                                <input type="text" id="image_name_edit{{$item->id}}" value="{{$item->name}}" >
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" id="image_edit_ajax" data-id="{{$item->id}}" class="btn btn-secondary image_edit_ajax">Submit</button>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                       </div>
                  　　</td>
                </tr>
                @endforeach
              </tbody>
      </table>
			<table class="table table-bordered table-condensed info_table" style="margin-bottom:0;">
              <tbody>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">車検証写真</td>
                  <td style="vertical-align: middle;"> 
                      <div class="flexrowbetween">
                          <div class="img">
                              <a href="{{ url('/').'/'.$sellerCar->inspection_photo}}" rel="lightbox" class="lightbox_photo"><img src="{{ url('/').'/'.$sellerCar->inspection_photo}}" alt="車検証写真" width="100"></a>
                          </div>
                          <div class="flexbtn"> 
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">ファイル参照</button>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="file-upload" class="custom-file-upload"></label>
                                                <input type="file" id="file-upload">
                                            </div>
                                            <div class="modal-footer">
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
                  <td style="vertical-align: middle;"> {{$sellerCar->inspection_register_date}} </td>
                </tr>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類写真</td>
                  <td style="vertical-align: middle;"> 
                      <div class="flexrowbetween">
                          <div class="img">
                              <a href="{{ url('/').'/'.$sellerCar->document_photo}}" rel="lightbox" class="lightbox_photo"><img src="{{ url('/').'/'.$sellerCar->document_photo}}" alt="車検証写真" width="100"></a>
                          </div>
                          <div class="flexbtn"> 
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">ファイル参照</button>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">アップロードするファイルを選択</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="file-upload" class="custom-file-upload"></label>
                                                <input type="file" id="file-upload">
                                            </div>
                                            <div class="modal-footer">
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
                  <td style="vertical-align: middle;"> 2{{$sellerCar->document_register_date}} </td>
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
                    <div class="col col-md-2 text-center"> <a href="#" class="btn btn-primary btn-sm edit_inquiry" id="edit_status" >編集</a>
                      <input type="hidden" name="status_id" id="status_id" value="{{$status->id}}"/>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">初回問合日</td>
                  <td style="vertical-align: middle;">{{ $status->first_inquiry_date}}</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">案件ステータス</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					<div class="col col-md-4 PL0">
						<select name="status_status" class="form-control input-sm" id="status_status">
						  <option value="">----------</option>
						  <option {{ $status->status == 1?'selected':'' }} value="1">失注</option>
						  <option {{ $status->status == 2?'selected':'' }} value="2">新規</option>
						  <option {{ $status->status == 3?'selected':'' }} value="3">要再TEL</option>
						  <option {{ $status->status == 4?'selected':'' }} value="4">後追い長期不在</option>
						  <option {{ $status->status == 5?'selected':'' }} value="5">新規長期不在</option>
						  <option {{ $status->status == 6?'selected':'' }} value="6">査定サービス中</option>
						  <option {{ $status->status == 7?'selected':'' }} value="7">出品中</option>
						  <option {{ $status->status == 8?'selected':'' }} value="8">出品後回答待ち</option>
						  <option {{ $status->status == 9?'selected':'' }} value="9">必要書類待ち</option>
						  <option {{ $status->status == 10?'selected':'' }} value="10">車両引取待ち</option>
						  <option {{ $status->status == 11?'selected':'' }} value="11">振込待ち</option>
						  <option {{ $status->status == 12?'selected':'' }} value="12">完了済み</option>
						</select>
					</div>
				　　</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">出品確度</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="status_listing_accuracy1">
                        <input type="radio" name="status_listing_accuracy" {{$status->listing_accuracy == 1?'checked':''}} id="status_listing_accuracy1" value="1" />
                        S</label>
                      <label class="radio-inline" for="status_listing_accuracy2">
                        <input type="radio" name="status_listing_accuracy" {{$status->listing_accuracy == 2?'checked':''}}  id="status_listing_accuracy2" value="2" />
                        A</label>
                      <label class="radio-inline" for="status_listing_accuracy3">
                        <input type="radio" name="status_listing_accuracy" {{$status->listing_accuracy == 3?'checked':''}}  id="status_listing_accuracy3" value="3" />
                        B</label>
                      <label class="radio-inline" for="status_listing_accuracy4">
                        <input type="radio" name="status_listing_accuracy" {{$status->listing_accuracy == 4?'checked':''}}  id="status_listing_accuracy4" value="4" />
                        C</label>
                      <label class="radio-inline" for="status_listing_accuracy5">
                        <input type="radio" name="status_listing_accuracy" {{$status->listing_accuracy == 5?'checked':''}}  id="status_listing_accuracy5" value="5" />
                        D</label>
                      <label class="radio-inline" for="status_listing_accuracy6">
                        <input type="radio" name="status_listing_accuracy" {{$status->listing_accuracy == 6?'checked':''}}  id="status_listing_accuracy6" value="6" />
                        NG</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                   <td class="active" style="width: 120px; vertical-align: middle;">再TEL予定日</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					  <div class="col col-md-4 PL0">
						  <input name="status_re_tel_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="status_re_tel_date" autocomplete="off" type="tel" value="{{$status->re_tel_date}}"/>
					  </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">再TEL回数</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4 PL0">
						<select name="status_tel_number_again" class="form-control input-sm" id="status_tel_number_again">
						  <option value="">----------</option>
						  <option {{$status->tel_number_again == 0?'selected':''}} value="0">0</option>
						  <option {{$status->tel_number_again == 1?'selected':''}} value="1">1</option>
						  <option {{$status->tel_number_again == 2?'selected':''}} value="2">2</option>
						  <option {{$status->tel_number_again == 3?'selected':''}} value="3">3</option>
						  <option {{$status->tel_number_again == 4?'selected':''}} value="4">4</option>
						  <option {{$status->tel_number_again == 5?'selected':''}} value="5">5</option>
						  <option {{$status->tel_number_again == 6?'selected':''}} value="6">6</option>
						  <option {{$status->tel_number_again == 7?'selected':''}} value="7">7</option>
						  <option {{$status->tel_number_again == 8?'selected':''}} value="8">8</option>
						  <option {{$status->tel_number_again == 9?'selected':''}} value="9">9</option>
						  <option {{$status->tel_number_again == 10?'selected':''}} value="10">10</option>
						  <option {{$status->tel_number_again == 11?'selected':''}} value="11">11</option>
						  <option {{$status->tel_number_again == 12?'selected':''}} value="12">12</option>
						  <option {{$status->tel_number_again == 13?'selected':''}} value="13">13</option>
						  <option {{$status->tel_number_again == 14?'selected':''}} value="14">14</option>
						  <option {{$status->tel_number_again == 15?'selected':''}} value="15">15</option>
						  <option {{$status->tel_number_again == 16?'selected':''}} value="16">16</option>
						  <option {{$status->tel_number_again == 17?'selected':''}} value="17">17</option>
						  <option {{$status->tel_number_again == 18?'selected':''}} value="18">18</option>
						  <option {{$status->tel_number_again == 19?'selected':''}} value="19">19</option>
						  <option {{$status->tel_number_again == 20?'selected':''}} value="20">20</option>
						</select>
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">追跡</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="status_pursuit"  id="status_pursuit1" {{$status->pursuit[0] == 1?'checked':''}} value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> リピーター</div>
                    <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="status_pursuit"  id="status_pursuit2" {{$status->pursuit[1] == 1?'checked':''}} value="2"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> 複数台口</div>
                    <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="status_pursuit"  id="status_pursuit3" {{$status->pursuit[2] == 1?'checked':''}} value="3"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> ラジオ</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">キャンペーン提示</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="status_offer_presentation1">
                        <input type="radio" name="status_offer_presentation" id="status_offer_presentation1" {{$status->offer_presentation == 1?'checked':''}} value="1" />
                        未提案</label>
                      <label class="radio-inline" for="status_offer_presentation2">
                        <input type="radio" name="status_offer_presentation" id="status_offer_presentation2" {{$status->offer_presentation == 2?'checked':''}} value="2" />
                        インバウンド</label>
                      <label class="radio-inline" for="status_offer_presentation3">
                        <input type="radio" name="status_offer_presentation" id="status_offer_presentation3" {{$status->offer_presentation == 3?'checked':''}} value="3" />
                        アウトバウンド</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">キャンペーン</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="status_campaign1">
                        <input type="radio" name="status_campaign" id="status_campaign1" {{$status->campaign == 1?'checked':''}} value="1" />
                        未</label>
                      <label class="radio-inline" for="status_campaign2">
                        <input type="radio" name="status_campaign" id="status_campaign2" {{$status->campaign == 2?'checked':''}} value="2" />
                        早得</label>
                      <label class="radio-inline" for="status_campaign3">
                        <input type="radio" name="status_campaign" id="status_campaign3" {{$status->campaign == 3?'checked':''}} value="3" />
                        紹介</label>
                      <label class="radio-inline" for="status_campaign4">
                        <input type="radio" name="status_campaign" id="status_campaign4" {{$status->campaign == 4?'checked':''}} value="4" />
                        リピート</label>
                      <label class="radio-inline" for="status_campaign5">
                        <input type="radio" name="status_campaign" id="status_campaign5" {{$status->campaign == 5?'checked':''}} value="5" />
                        セット</label>
                      <label class="radio-inline" for="status_campaign6">
                        <input type="radio" name="status_campaign" id="status_campaign6" {{$status->campaign == 6?'checked':''}} value="6" />
                        持込</label>
                      <label class="radio-inline" for="status_campaign7">
                        <input type="radio" name="status_campaign" id="status_campaign7" {{$status->campaign == 7?'checked':''}} value="7" />
                        福利厚生</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">一言備考</td>
                  <td><input name="status_word_preparation" class="form-control input-sm" maxlength="50" id="status_word_preparation" type="text" value="{{$status->word_preparation}}"/></td>
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
                        @foreach($history as $item)
                          <tr>
                            <td class="active" style="vertical-align: middle; width: 90px;">{{$item->date}}</td>
                            <td class="active" style="vertical-align: middle; width: 90px;">{{$item->name}}</td>
                            <td class="active" style="vertical-align: middle; width: 80px;">{{$item->type}}</td>
                            <td>{{$item->content}}</td>
                          </tr>
                        @endforeach
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
                      @foreach($question as $item)
      								<tr>
      									<th>{{$item->name}}</th>
      									<td>{{$item->question}}</td>
      									<td>{{$item->date}}</td>
      								</tr>
      								@endforeach
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
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="#;" class="btn btn-primary btn-sm send_seeking_photographer_mail" id="edit_reception">編集</a> 
                    <input type="hidden" name="reception_id" id="reception_id" value="{{$reception->id}}"/>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px;">出品番号</td>
                  <td> {{$reception->listing_number}}</td>
                </tr>
                <tr>
                  <td class="active">規約同意日</td>
                  <td>
                     <div class="col col-md-5">
                      <input name="reception_term_consent" class="form-control input-sm datepicker" maxlength="10" id="reception_term_consent" autocomplete="off" type="text" value="{{$reception->term_consent}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px;">規約同意確認方法</td>
                  <td> <div class="col col-md-12 PL0">
                      <input name="reception_confirm_method" class="form-control input-sm" maxlength="50" id="reception_confirm_method" type="text" value="{{$reception->confirm_method}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">出品催促担当者</td>
                  <td> <div class="col col-md-12 PL0">
                      <input name="reception_producer_urged" class="form-control input-sm" maxlength="50" id="reception_producer_urged" type="text" value="{{$reception->producer_urged}}"/>
                    </div> </td>
                </tr>
                <tr>
                  <td class="active">備考</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_remark1" class="form-control input-sm" maxlength="50" id="reception_remark1" type="text" value="{{$reception->remark1}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">顧客ID</td>
                  <td>{{$seller->id}}</td>
                </tr>
                <tr>
                  <td class="active">最低希望価格</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_minimum_recommend_price" class="form-control input-sm" maxlength="50" id="reception_minimum_recommend_price" type="text" value="{{$reception->minimum_recommend_price}}"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">オークション終了希望日時</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_end_desired_date" class="form-control input-sm datepicker" maxlength="50" id="reception_end_desired_date" type="text" value="{{$reception->end_desired_date}}"/>
                    </div></td>
                </tr>
                <!-- id19：成約手法変更機能 -->
                <tr>
                  <td class="active">クレーム</td>
                  <td><div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="reception_claim1">
                        <input type="radio" name="reception_claim" id="reception_claim1" {{$reception->claim == 1?'checked':''}} />
                        クレーム有</label>
                      <label class="radio-inline own_car_runnable" for="reception_claim2">
                        <input type="radio" name="reception_claim" id="reception_claim2" {{$reception->claim == 2?'checked':''}} />
                        クレーム無し</label>
                    </div>
                    </td>
                </tr>

                <tr>
                  <td class="active">抹消謄本の通知方法</td>
                  <td><div class="col col-md-12 PL0">
                      <input name="reception_notify_certified_copy" class="form-control input-sm" maxlength="50" id="reception_notify_certified_copy" type="text" value="{{$reception->notify_certified_copy}}"/>
                    </div></td>
                </tr>

                <tr>
                  <td class="active">抹消業務</td>
                  <td>
                      <div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="reception_deletion_work1">
                        <input type="radio" name="reception_deletion_work" id="reception_deletion_work1" {{$reception->deletion_work == 1?'checked':''}} />
                        未完</label>
                      <label class="radio-inline own_car_runnable" for="reception_deletion_work2">
                        <input type="radio" name="reception_deletion_work" id="reception_deletion_work2" {{$reception->deletion_work == 2?'checked':''}} />
                        一時抹消</label>
                        <label class="radio-inline own_car_runnable" for="reception_deletion_work3">
                        <input type="radio" name="reception_deletion_work" id="reception_deletion_work3" {{$reception->deletion_work == 3?'checked':''}} />
                        名義変更</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="active">備考</td>
                  <td>
                      <div class="col col-md-12 PL0">
                      <textarea name="reception_remark2" class="form-control input-sm" rows="3" cols="30" id="reception_remark2">{{$reception->remark2}}</textarea>
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
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="#" class="btn btn-primary btn-sm send_seeking_photographer_mail" id="edit_assessment">編集</a> 
                    <input type="hidden" name="assessment_id" id="assessment_id" value="{{$assessment->id}}"/>
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
                        <input id="assessment_advance1" name="assessment_advance" {{$assessment->advance == 1?'checked':''}} type="radio">
                      要</label>
                      <label class="radio-inline" for="assessment_advance2">
                        <input id="assessment_advance2" name="assessment_advance" {{$assessment->advance == 2?'checked':''}} type="radio">
                      不要</label>
                    </div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定方法</td>
                  <td style="vertical-align: middle;">
                  <div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="assessment_advance_method1">
                        <input id="assessment_advance_method1" name="assessment_advance_method" {{$assessment->advance_method == 1?'checked':''}} type="radio">
                        持込</label>
                      <label class="radio-inline" for="assessment_advance_method2">
                        <input id="assessment_advance_method2" name="assessment_advance_method" {{$assessment->advance_method == 2?'checked':''}} type="radio">
                        出張</label>
                    </div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定場所</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="assessment_place" class="form-control input-sm" maxlength="50" id="assessment_place" type="text" value="{{$assessment->place}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定場所地図</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="assessment_place_map" class="form-control input-sm" maxlength="50" id="assessment_place_map" type="text" value="{{$assessment-> place_map}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定状況</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="assessment_situation" class="form-control input-sm" maxlength="50" id="assessment_situation" type="text" value="{{$assessment->situation}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日①</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_advance_date1" class="form-control input-sm datepicker" maxlength="10" id="assessment_advance_date1" autocomplete="off" type="text" value="{{$assessment->advance_date1}}"/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日②</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_advance_date2" class="form-control input-sm datepicker" maxlength="10" id="assessment_advance_date2" autocomplete="off" type="text" value="{{$assessment->advance_date2}}"/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日③</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_advance_date3" class="form-control input-sm datepicker" maxlength="10" id="assessment_advance_date3" autocomplete="off" type="text" value="{{$assessment->advance_date3}}"/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_remark1" class="form-control input-sm" maxlength="50" id="assessment_remark1" type="text" value="{{$assessment->remark1}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">持込査定・出張査定候補リスト</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="assessment_candidate_list" class="form-control input-sm" rows="3" cols="30" id="assessment_candidate_list">{{$assessment->candidate_list}}</textarea>
                    </div></td>
                </tr>   
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定業者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_assessor1" class="form-control input-sm" maxlength="50" id="assessment_assessor1" type="text" disabled="" value="{{$assessment->assessor1}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定業者ID</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_assessor_id" class="form-control input-sm" maxlength="50" id="assessment_assessor_id" type="text" value="{{$assessment->assessor_id}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定依頼日</td>
                  <td class="photo_term_td" style="vertical-align: middle;">
                     <div class="col col-md-5">
                      <input name="assessment_request_date" class="form-control input-sm datepicker" maxlength="10" id="assessment_request_date" autocomplete="off" type="text" value="{{$assessment->request_date}}"/>
                    </div>
                </tr>   
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定依頼者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_assessor2" class="form-control input-sm" maxlength="50" id="assessment_assessor2" type="text" value="{{$assessment->assessor2}}"/>
                    </div></td>
                </tr> 
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定結果到着日</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="assessment_arrival_date" class="form-control input-sm datepicker" maxlength="10" id="assessment_arrival_date" autocomplete="off" type="text" value="{{$assessment->arrival_date}}"/>
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定完了確認者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_complete_confirmation" class="form-control input-sm" maxlength="50" id="assessment_complete_confirmation" type="text" value="{{$assessment->complete_confirmation}}"/>
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
                              <a href="{{url('/').'/'.$assessment->table_img}}" id="assessment_show_table_a" rel="lightbox" class="lightbox_photo"><img src="{{url('/').'/'.$assessment->table_img}}" alt="書類写真" id="assessment_show_table" width="100"></a>
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
                        <span>評価点（総合）</span><input name="assessment_synthetic" class="form-control input-sm radio-inline w70" maxlength="50" id="assessment_synthetic" type="text" value="{{$assessment->synthetic}}" placeholder=""> <span>点</span>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価点（外装）<input name="assessment_exterior" class="form-control input-sm w70" maxlength="50" id="assessment_exterior" type="text" value="{{$assessment->exterior}}" placeholder=""> <span>点</span>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価点（内装）<input name="assessment_interior" class="form-control input-sm w70" maxlength="50" id="assessment_interior" type="text" value="{{$assessment->interior}}" placeholder=""> <span>点</span>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価者コメント<textarea name="assessment_comment" class="form-control input-sm" rows="3" placeholder="" cols="30" id="assessment_comment">{{$assessment->comment}}</textarea>
                    </div>
                  <div class="col col-md-10 P6_0 spec1">
                        評価者<input name="assessment_rater" class="form-control input-sm" maxlength="50" id="assessment_rater" type="text" value="{{$assessment->rater}}" placeholder="">
                    </div>
                  </td>
                </tr>       
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="assessment_remark2" class="form-control input-sm" maxlength="50" id="assessment_remark2" type="text" value="{{$assessment->remark2}}"/>
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
                    <input type="hidden" name="document_id" id="document_id" value="{{$document->id}}"/>
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="#" class="btn btn-primary btn-sm send_seeking_photographer_mail" id="edit_document">編集</a> </div>
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
          						  <option {{$document->cancel_type == 1?'selected':''}} value="1">当社抹消</option>
          						  <option {{$document->cancel_type == 2?'selected':''}} value="2">業者抹消</option>
          						</select>
          					</div>
                   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類到着</td>
        					<td style="vertical-align: middle;">

        						<div class="col col-md-12">
        							<label class="radio-inline" for="document1">
        								<input type="radio" name="document_document_arrival" id="document_document_arrival1" {{$document->document_arrival == 1 ?'checked':''}} />未着</label>

        							<label class="radio-inline" for="document2">
        								<input type="radio" name="document_document_arrival" id="document_document_arrival2" {{$document->document_arrival == 2 ?'checked':''}} />不備</label>

        							<label class="radio-inline" for="document3">
        								<input type="radio" name="document_document_arrival" id="document_document_arrival3" {{$document->document_arrival == 3 ?'checked':''}} />完備</label>
                            </div>


        					</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="col col-md-12">
                          <textarea name="document_condition" class="form-control input-sm" rows="5" cols="30" id="document_condition">{{$document->condition}}</textarea>
                        </div>
                    </td>
                </tr>      
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ナンバープレート</td>
                  <td style="vertical-align: middle;"><div class="col col-md-4 PL0">
        						<select name="document_license_plate" class="form-control input-sm" id="document_license_plate">
        						  <option value="">----------</option>
        						  <option {{$document->license_plate == 1 ?'selected':''}} value="1">未着</option>
        						  <option {{$document->license_plate == 2 ?'selected':''}} value="2">到着</option>
        						</select>
        					</div>
        				  </td>
               </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類備考</td>
                  <td><div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="document_remark" class="form-control input-sm" rows="3" cols="30" id="document_remark">{{$document->remark}}</textarea>
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
                    <div class="col col-md-2 text-center edit_trade_button_div"> <a href="#" class="btn btn-primary btn-sm edit_trade" id="edit_retrieval">編集</a> </div>
                    <input type="hidden" name="retrieval_id"  id="retrieval_id" value="{{$retrieval->id}}"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第一）</td>
                  <td style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_first_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_first_date" autocomplete="off" type="tel" value="{{$retrieval->first_date}}"/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_first_date_check1">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check1" {{$retrieval->first_date_check == 1?'checked':''}}/>
                        指定なし</label>
                      <label class="radio-inline" for="retrieval_first_date_check2">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check2" {{$retrieval->first_date_check == 2?'checked':''}} />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="retrieval_first_date_check3">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check3" {{$retrieval->first_date_check == 3?'checked':''}} />
                        12:00～15:00</label>
                      <label class="radio-inline" for="retrieval_first_date_check4">
                        <input type="radio" name="retrieval_first_date_check" id="retrieval_first_date_check4" {{$retrieval->first_date_check == 4?'checked':''}} />
                        15:00～</label>

                    </div>
                    <div class="col col-md-3 text-center text-danger" style="padding: 6px 0px; background-color: #f5f5f5;">日程確認待</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第二）</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_second_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_second_date" autocomplete="off" type="tel" value="{{$retrieval->second_date}}"/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_second_date_check1">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check1" {{$retrieval->second_date_check == 1?'checked':''}}/>
                        指定なし</label>
                      <label class="radio-inline" for="retrieval_second_date_check2">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check2" {{$retrieval->second_date_check == 2?'checked':''}} />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="retrieval_second_date_check3">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check3" {{$retrieval->second_date_check == 3?'checked':''}} />
                        12:00～15:00</label>
                      <label class="radio-inline" for="retrieval_second_date_check4">
                        <input type="radio" name="retrieval_second_date_check" id="retrieval_second_date_check4" {{$retrieval->second_date_check == 4?'checked':''}} />
                        15:00～</label>
                    </div>
                    <div class="col col-md-3 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="checkbox" name="retrieval_pending_schedule"  id="retrieval_pending_schedule" {{$retrieval->pending_schedule ==1?'checked':''}} />
                      </div>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第三）</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_third_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_third_date" autocomplete="off" type="tel" value="{{$retrieval->third_date}}"/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_third_date_check1">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check1" {{$retrieval->third_date_check == 1?'checked':''}}/>
                        指定なし</label>
                      <label class="radio-inline" for="retrieval_third_date_check2">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check2" {{$retrieval->third_date_check == 2?'checked':''}} />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="retrieval_third_date_check3">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check3" {{$retrieval->third_date_check == 3?'checked':''}} />
                        12:00～15:00</label>
                      <label class="radio-inline" for="retrieval_third_date_check4">
                        <input type="radio" name="retrieval_third_date_check" id="retrieval_third_date_check4" {{$retrieval->third_date_check == 4?'checked':''}} />
                        15:00～</label>
                    </div>
				</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取場所</td>
                  <td style="vertical-align: middle;"><input name="retrieval_takeover_place" class="form-control input-sm" maxlength="100" id="retrieval_takeover_place" type="text" value="{{$retrieval->takeover_place}}"/></td>
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
                        <input type="radio" name="retrieval_availability" id="retrieval_availability1" {{$retrieval->availability == 1?'checked':''}} />
                        不可</label>
                      <label class="radio-inline" for="retrieval_availability2">
                        <input type="radio" name="retrieval_availability" id="retrieval_availability2" {{$retrieval->availability == 2?'checked':''}} />
                        可能</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取業者コード</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_company_code" class="form-control input-sm" maxlength="10" id="retrieval_company_code" value="{{$retrieval->company_code}}" type="tel">
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取備考</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-12" style="padding-left: 0px;">
                      <textarea name="retrieval_remark]" class="form-control input-sm" rows="3" cols="30" id="retrieval_remark">{{$retrieval->remark}}</textarea>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ナンバーカット</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="retrieval_number_cut1">
                        <input type="radio" name="retrieval_number_cut" id="retrieval_number_cut1" {{$retrieval->number_cut == 1?'checked':''}} />
                        無</label>
                      <label class="radio-inline" for="retrieval_number_cut2">
                        <input type="radio" name="retrieval_number_cut" id="retrieval_number_cut2" {{$retrieval->number_cut == 2?'checked':''}} />
                        有</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取完了確認日</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_end_recognition_day" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_end_recognition_day" autocomplete="off" type="tel" value="{{$retrieval->end_recognition_day}}">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取完了日</td>
                  <td class="finish_trade_td" style="vertical-align: middle;">                      
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="retrieval_end_quotation" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="retrieval_end_quotation" autocomplete="off" type="tel" value="{{$retrieval->end_quotation}}">
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
                      <a href="#" class="btn btn-primary btn-sm edit_sale" id="edit_sale" >編集</a> </div>
                    <input type="hidden" name="sale_id" id="sale_id" value="{{$sale->id}}"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_sale_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_sale_date" autocomplete="off" type="tel" value="{{$sale->sale_date}}">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">計上方式</td>
                  <td class="mode_radio_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="sale_accounting_method1">
                        <input type="radio" name="sale_accounting_method" id="sale_accounting_method1" {{$sale->accounting_method == 1?'checked':''}} />
                        一括</label>
                      <label class="radio-inline" for="sale_accounting_method2">
                        <input type="radio" name="sale_accounting_method" id="sale_accounting_method2" {{$sale->accounting_method == 2?'checked':''}} />
                        個別</label>
                    </div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="salesPrice" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売額</td>
                  <td class="sales_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_amount" class="form-control input-sm" maxlength="10" id="sale_amount" type="tel" value="{{$sale->amount}}"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="vehiclePrice" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車両本体価格</td>
                  <td class="vehicle_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_body_price" class="form-control input-sm" maxlength="10" id="sale_body_price"  type="tel" value="{{$sale->body_price}}"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="recyclingFee" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">リサイクル料</td>
                  <td class="recycling_fee_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_recycling_fee" class="form-control input-sm" maxlength="10" id="sale_recycling_fee"  type="tel" value="{{$sale->recycling_fee}}"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align:middle;">落札手数料</td>
                  <td class="successful_fee_td" style="vertical-align:middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_bid_fee" class="form-control input-sm" maxlength="10" id="sale_bid_fee"  type="tel" value="{{$sale->bid_fee}}"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align:middle;">還付金代</td>
                  <td class="refund_td" style="vertical-align:middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_refund_fee" class="form-control input-sm" maxlength="10" id="sale_refund_fee"  type="tel" value="{{$sale->refund_fee}}"/>
                    </div>
                    <div class="col col-md-1 P6_0"> 円</div></td>
                </tr>
                <tr id="sale_agency_disposal_tr">
                  <td class="active">抹消代行費用</td>
                  <td class="sale_agency_disposal_td"><div class="col col-md-4 PL0">
                      <input name="sale_delete_agent_cost" class="form-control input-sm" maxlength="10" id="sale_delete_agent_cost" type="tel" value="{{$sale->delete_agent_cost}}"/>
                    </div>
                    <div class="col col-md-1 P6_0">円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最終請求額 (税込)</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" id="including_tax_output" style="padding: 6px 0px;"> {{$sale->final_charge_amount}} 円 </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先</td>
                  <td class="sales_contact_select_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-6" style="padding-left: 0px;">
                      <select name="sale_destination" class="form-control input-sm" id="sale_destination" >
                        <option {{$sale->destination == 1?'selected':''}} value="1">業者</option>
                        <option {{$sale->destination == 2?'selected':''}} value="2">業者 (書類)</option>
                        <option {{$sale->destination == 3?'selected':''}} value="3">業者 (Smartオークション)</option>
                        <option {{$sale->destination == 4?'selected':''}} value="4">オークション</option>
                        <option {{$sale->destination == 5?'selected':''}} value="5">国内販売</option>
                        <option {{$sale->destination == 6?'selected':''}} value="6">その他</option>
                      </select>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先名</td>
                  <td style="vertical-align: middle;"><!-- id22：販売情報管理 -->
                    
                    <div class="col col-md-10 contact_name_div" style="padding-left: 0px;">
                      <input name="sale_distributor_name" class="form-control input-sm" maxlength="100" id="sale_distributor_name" type="text" value="{{$sale->distributor_name}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先コード</td>
                  <td style="vertical-align: middle;"><div class="col col-md-10" id="contact_cd_output" style="padding: 6px 0px;"> </div>
                    <div class="col col-md-2" id="contact_phone_number_div" style="padding: 6px;">{{$sale->part_number}}</div>
                </tr>
                <tr class="sales_remark_tr" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売備考</td>
                  <td class="sale_remark_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="sale_remark1" class="form-control input-sm" rows="3" cols="30" id="sale_remark1">{{$sale->remark1}}</textarea>
                    </div>
                    </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">差引額</td>
                  <td class="balance_td" style="vertical-align: middle;"><!--id24：差引額設定機能-->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_deducion_amount" class="form-control input-sm" maxlength="10" id="sale_deducion_amount" type="text" value="{{$sale->deducion_amount}}"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div>
                    </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入金期日</td>
                  <td class="due_date_td" style="vertical-align: middle;"><!-- id25：入金期日設定機能 -->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_deposite_due_date" class="form-control input-sm datepicker" maxlength="10" id="sale_deposite_due_date" type="tel" value="{{$sale->deposite_due_date}}"/>
                    </div>
                   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">売掛日</td>
                  <td style="vertical-align: middle;" id="credit_sale_date">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_receivable_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_receivable_date" autocomplete="off" type="tel" value="{{$sale->receivable_date}}">
                    </div>
				  </td>
                </tr>
                <tr class="bill_tr" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">請求日</td>
                  <td class="bill_td" style="vertical-align: middle;" id="sale_bill"><!-- id26：請求管理機能 -->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_billing_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_billing_date" autocomplete="off" type="tel" value="{{$sale->billing_date}}">
                    </div>
                </tr>
                <!-- id27：請求差戻機能 -->
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">着金日</td>
                  <td class="receipts_td" style="vertical-align: middle;"><!-- id28：着金管理機能 -->
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_golden_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_golden_date" autocomplete="off" type="tel" value="{{$sale->golden_date}}">
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
                      <a href="#" class="btn btn-primary btn-sm edit_sale" id="edit_sale_confirm">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車両本体価格（確定金額）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_body_price" class="form-control input-sm" maxlength="10" id="sale_confirm_body_price"  value="{{$sale->body_price}}" type="tel">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">確定請求金額（税込）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_established_amount" class="form-control input-sm" maxlength="10" id="sale_confirm_established_amount"  value="{{$sale->established_amount}}" type="tel">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">金額差異</td>
                  <td style="vertical-align: middle;"></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">差引額</td>
                  <td style="vertical-align: middle;">{{$sale->deducion_amount}}</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入金期日（振込期日）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_payment_deadline" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_payment_deadline" autocomplete="off" type="tel" value="{{$sale->payment_deadline}}">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最終売掛日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_last_account_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_last_account_date" autocomplete="off" type="tel" value="{{$sale->last_account_date}}">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">請求日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_billing_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_billing_date" autocomplete="off" type="tel" value="{{$sale->billing_date}}">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">着金日（振込日）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="sale_confirm_clothing_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="sale_confirm_clothing_date" autocomplete="off" type="tel" value="{{$sale->clothing_date}}">
                    </div>
				          </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-10 PL0">
                      <input name="sale_confirm_remark2" class="form-control input-sm" maxlength="50" id="sale_confirm_remark2" type="text" value="{{$sale->remark2}}">
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
                      <a href="#" class="btn btn-primary btn-sm edit_sale" id="edit_transfer">編集</a> </div>
                
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">確定金額</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="transfer_determine_amount" class="form-control input-sm" maxlength="10" id="transfer_determine_amount"  value="{{$sale->determine_amount}}" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-10 PL0">
                      <input name="transfer_remark3" class="form-control input-sm" maxlength="50" id="transfer_remark3" type="text" value="{{$sale->remark3}}">
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
                      <a href="#" class="btn btn-primary btn-sm exhibit_scrap_auction" id="edit_order">編集</a> </div>
                    </div>
                    <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}"/>
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
        							  <option {{$order->status == 1?'selected':''}} value="1">未出品</option>
        							  <option {{$order->status == 2?'selected':''}} value="2">出品中</option>
        							  <option {{$order->status == 3?'selected':''}} value="3">落札</option>
        							  <option {{$order->status == 4?'selected':''}} value="4">商談中</option>
        							  <option {{$order->status == 5?'selected':''}} value="5">流札</option>
        							</select>
        						</div>
        				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最低落札価格</td>
                  <td class="start_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="order_asking_price" class="form-control input-sm" maxlength="8" id="order_asking_price" type="text" value="{{$order->asking_price}}"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入札締切日時</td>
                  <td class="end_at_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;" for="end_at_datepicker">
                      <input name="order_deadline_date" class="form-control input-sm datepicker" maxlength="10" id="order_deadline_date" autocomplete="off" type="text" value="{{$order->deadline_date}}"/>
                    </div>
                    <div class="col col-md-5">
                      <select name="order_deadline_hour" class="select-time" style="width: 55px; height: 30px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;" id="order_deadline_hour">
                        <option {{$order->deadline_hour == 0?'selected':''}} value="00">0</option>
                        <option {{$order->deadline_hour == 1?'selected':''}} value="01">1</option>
                        <option {{$order->deadline_hour == 2?'selected':''}} value="02">2</option>
                        <option {{$order->deadline_hour == 3?'selected':''}} value="03">3</option>
                        <option {{$order->deadline_hour == 4?'selected':''}} value="04">4</option>
                        <option {{$order->deadline_hour == 5?'selected':''}} value="05">5</option>
                        <option {{$order->deadline_hour == 6?'selected':''}} value="06">6</option>
                        <option {{$order->deadline_hour == 7?'selected':''}} value="07">7</option>
                        <option {{$order->deadline_hour == 8?'selected':''}} value="08">8</option>
                        <option {{$order->deadline_hour == 9?'selected':''}} value="09">9</option>
                        <option {{$order->deadline_hour == 10?'selected':''}} value="10">10</option>
                        <option {{$order->deadline_hour == 11?'selected':''}} value="11">11</option>
                        <option {{$order->deadline_hour == 12?'selected':''}} value="12">12</option>
                        <option {{$order->deadline_hour == 13?'selected':''}} value="13">13</option>
                        <option {{$order->deadline_hour == 14?'selected':''}} value="14">14</option>
                        <option {{$order->deadline_hour == 15?'selected':''}} value="15">15</option>
                        <option {{$order->deadline_hour == 16?'selected':''}} value="16">16</option>
                        <option {{$order->deadline_hour == 17?'selected':''}} value="17">17</option>
                        <option {{$order->deadline_hour == 18?'selected':''}} value="18">18</option>
                        <option {{$order->deadline_hour == 19?'selected':''}} value="19">19</option>
                        <option {{$order->deadline_hour == 20?'selected':''}} value="20">20</option>
                        <option {{$order->deadline_hour == 21?'selected':''}} value="21">21</option>
                        <option {{$order->deadline_hour == 22?'selected':''}} value="22">22</option>
                        <option {{$order->deadline_hour == 23?'selected':''}} value="23">23</option>
                      </select>
                      :
                      <select name="order_deadline_minute" class="select-time" style="width: 55px; height: 30px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;" id="order_deadline_minute">
                        <option {{$order->deadline_minute == 0?'selected':''}} value="00" selected="selected">00</option>
                        <option {{$order->deadline_minute == 15?'selected':''}} value="15">15</option>
                        <option {{$order->deadline_minute == 30?'selected':''}} value="30">30</option>
                        <option {{$order->deadline_minute == 45?'selected':''}} value="45">45</option>
                      </select>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">訂正備考</td>
                  <td style="vertical-align: middle;"><div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="order_remark" class="form-control input-sm" rows="3" cols="30" id="order_remark">{{$order->remark}}</textarea>
                    </div></td>
                </tr>
                </form>
                <tr class="scrap_tender_list_tr" style="height: 41px;">
                <td class="active" style="width: 120px; vertical-align: middle;">入札状況</td>
                  <td style="vertical-align: middle;" class="scrap_tender_list_td" id="order_content">
                  @foreach($orderDetail as $item)
                    @if($item->status == 0 )
                      @continue;
                    @endif
                    <div class="col col-md-12 PA0 trader_row">
                      <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
                      <div class="col col-md-10" style="padding:4px 0px 2px;"> ○  {{$item->name}} </div>
                      <div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; {{$item->price}}</div>
                      </div>
                      <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
                      <!--id78：入札キャンセル機能 --> 
                      <a href="#" class="btn btn-warning btn-xs cancel_bid" data-id="{{$item->id}}">取消</a> </div>
                    </div>
                  @endforeach
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
                @foreach($variousCost as $item)
                <tr style="height: 41px;">
                  <td><div class="col col-md-12 required" style="padding-left: 0px; padding-right: 0px;">
                      {{$item->date}}
                    </div></td>
                  <td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">
                      <select  class="form-control input-sm" disabled="">
                        <option {{$item->classification == 1?'checked':''}} value="1">AA出品料</option>
                        <option {{$item->classification == 2?'checked':''}} value="2">AA成約料</option>
                        <option {{$item->classification == 3?'checked':''}} value="3">AAペナルティ</option>
                        <option {{$item->classification == 4?'checked':''}} value="4">陸送費</option>
                        <option {{$item->classification == 5?'checked':''}} value="5">その他</option>
                      </select>
                    </div></td>
                  <td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">
                      {{$item->remark}}
                    </div></td>
                  <td><div class="col col-md-11 required" style="padding-left: 0px;">
                      {{$item->commission}}
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                @endforeach
                
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
                      <a href="#" class="btn btn-primary btn-sm " id="edit_recycling" >編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">預託状況</td>
                  <td style="vertical-align: middle;">
        				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
          						<input name="recycling_deposite_situation" class="form-control input-sm" maxlength="100" id="recycling_deposite_situation" value="{{$sale->deposite_situation}}" type="text">
          					</div>
                  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">リサイクル料</td>
                  <td style="vertical-align: middle;"> <div class="col col-md-8 PL0" id="recycling_deposit_status">
        						<input name="recycling_recycling_fee" class="form-control input-sm" maxlength="100" id="recycling_recycling_fee" value="{{$sale->recycling_fee}}" type="text">
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
                      <a href="#" class="btn btn-primary btn-sm" id="edit_refund" >編集</a> </div>
                    <input type="hidden" name="refund_id" id="refund_id" value="{{$refund->id}}"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自賠責返戻</td>
                 <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_return_responsitory" class="form-control input-sm" maxlength="100" id="refund_return_responsitory" value="{{$refund->return_responsitory}}" type="text">
					</div>
				   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">重量税還付</td>
                  <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_weight_tax_refund" class="form-control input-sm" maxlength="100" id="refund_weight_tax_refund" value="{{$refund->weight_tax_refund}}" type="text">
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自動車税支払日</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="refund_tax_date" class="form-control input-sm ime-disabled datepicker" maxlength="10" id="refund_tax_date" autocomplete="off" type="tel" value="{{$refund->tax_date}}">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">支払金額</td>
                 <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_payment" class="form-control input-sm" maxlength="100" id="refund_payment" value="{{$refund->payment}}" type="text">
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自動車税還付金</td>
                  <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="refund_automobile_refund" class="form-control input-sm" maxlength="100" id="refund_automobile_refund" value="{{$refund->automobile_refund}}" type="text">
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
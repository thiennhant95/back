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
    <form id="seller_form" accept-charset="utf-8">
      <div class="row MR0 ML0">
        <div class="col col-md-4">
          <div>
            <table class="table table-bordered table-condensed info_table">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>顧客情報</strong></div>
                    <div class="col col-md-2 text-center edit_seller_button_div"> <a href="#" class="btn btn-primary btn-sm edit_seller" id="edit_seller">編集</a> </div>
                    <input type="hidden" name="seller_seller_id" value="380180"/>
                    <input type="hidden" name="seller_seller_cd" id="seller_cd" value="U04799576"/>
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
                         <input type="checkbox" name="seller_seller_phone_check3"  id="seller_seller_phone_check3" {{ $seller->phone_check4 == 1?'checked':''}}/>
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
                        <option value="11" selected="selected">埼玉県</option>
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
                      <input name="seller_seller_license" id="seller_seller_license" class="form-control input-sm" maxlength="10" id="{{$seller->license}}" type="tel"/>
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
                      <input name="seller_seller_register_date" class="form-control input-sm　ime-disabled" maxlength="15" id="seller_seller_register_date" type="tel" value="{{$seller->register_date}}"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">メルマガ配信</td>
                  <td style="vertical-align: middle; background-color: #f9f9f9;"><div class="col col-md-10 mailmagazine PL0">{{$seller->delivery_email}}</div>
                    <div class="col col-md-2 text-center"> <a href="/crm/AgreementOrders/edit/118262" class="btn btn-danger btn-xs reject_mailmagazine" seller_id="380180">停止</a> </div></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-bordered table-condensed info_table" id="table-AgreementOrderAccount">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>口座情報</strong></div>
                    <div class="col col-md-2 text-center edit_account_button_div"> <a href="javascript:void(0);" class="btn btn-primary btn-sm edit_account" agreement_order_id="118262" seller_cd="U04799576">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px;">銀行名</td>
                  <td class="bank_td"><div class="col col-md-6 PL0">
                      <input name="data[Account][bank]" class="form-control input-sm" maxlength="30" id="bank" type="text"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">銀行コード</td>
                  <td class="bank_code_td"><div class="col col-md-3 PL0">
                      <input name="data[Account][bank_code]" class="form-control input-sm" maxlength="4" id="bank_code" type="tel"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">支店名</td>
                  <td class="branch_name_td"><div class="col col-md-6 PL0">
                      <input name="data[Account][branch_name]" class="form-control input-sm" maxlength="30" id="branch_name" type="text"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">支店番号</td>
                  <td class="branch_number_td"><div class="col col-md-2 PL0">
                      <input name="data[Account][branch_number]" class="form-control input-sm ime-disabled" maxlength="3" id="branch_number" type="tel"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座種別</td>
                  <td class="account_classification_td"><div class="col col-md-12" style="padding: 6px 0px;">
                      <input type="hidden" name="data[Account][account_classification]" id="AccountAccountClassification_" value=""/>
                      <label class="radio-inline" for="AccountAccountClassification1">
                        <input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification1" value="1" />
                        普通 </label>
                      <label class="radio-inline" for="AccountAccountClassification2">
                        <input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification2" value="2" />
                        当座 </label>
                      <label class="radio-inline" for="AccountAccountClassification4">
                        <input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification4" value="4" />
                        貯蓄 </label>
                      <label class="radio-inline" for="AccountAccountClassification9">
                        <input type="radio" name="data[Account][account_classification]" id="AccountAccountClassification9" value="9" />
                        その他 </label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座番号</td>
                  <td class="account_number_td"><div class="col col-md-3 PL0">
                      <input name="data[Account][account_number]" class="form-control input-sm ime-disabled" maxlength="7" id="account_number" type="tel"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active">口座名義人 (カナ)</td>
                  <td class="nominee_name_td"><input name="data[Account][nominee_name]" class="form-control input-sm katakana" maxlength="50" id="nominee_name" type="text"/></td>
                </tr>
                <tr>
                  <td class="active">振込状態</td>
                 <td>
                      <label class="radio-inline" for="sent_stt01">
                        <input type="radio" name="data[Account][sent_stt]" id="sent_stt01" value="0" />
                        未 </label>
                      <label class="radio-inline" for="sent_stt02">
                        <input type="radio" name="data[Account][sent_stt]" id="sent_stt02" value="1" />
                        振込待ち </label>
                      <label class="radio-inline" for="sent_stt03">
                        <input type="radio" name="data[Account][sent_stt]" id="sent_stt03" value="2" />
                        振込済 </label>
                    </div></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-bordered table-condensed table-striped info_table">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>車両情報</strong></div>
                    <div class="col col-md-2 text-center edit_own_car_button_div"> <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_own_car" data-own_car_id="388218">編集</a> </div>
                    <input type="hidden" name="data[OwnCar][id]" value="388218"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車種名</td>
                  <td><div class="col col-md-12 PA0" style="margin-bottom:5px;">
                      <div class="col col-md-12 PL0">
                        <input name="data[OwnCar][own_car_name]" class="form-control input-sm" maxlength="50" id="own_car_name" autocomplete="off" readonly="readonly" type="text" value="三菱 ミラージュディンゴ"/>
                      </div>
                    </div>
                    <div class="col col-md-12 PA0">
                      <div class="col col-md-5 PL0">
                        <select name="data[OwnCar][maker_id]" class="form-control input-sm" id="makerId">
                          <option value="">----------</option>
                          <option value="1">トヨタ</option>
                          <option value="2">レクサス</option>
                          <option value="3">日産</option>
                          <option value="4">ホンダ</option>
                          <option value="5" selected="selected">三菱</option>
                          <option value="6">マツダ</option>
                          <option value="7">スバル</option>
                          <option value="8">スズキ</option>
                          <option value="9">いすゞ</option>
                          <option value="10">ダイハツ</option>
                          <option value="11">光岡</option>
                          <option value="12">日野</option>
                          <option value="13">アルファロメオ</option>
                          <option value="14">アストンマーチン</option>
                          <option value="15">アウディ</option>
                          <option value="16">ベントレー</option>
                          <option value="17">BMW</option>
                          <option value="18">キャデラック</option>
                          <option value="19">シボレー</option>
                          <option value="20">クライスラー</option>
                          <option value="21">シトロエン</option>
                          <option value="22">ダッジ</option>
                          <option value="23">フィアット</option>
                          <option value="24">フォード</option>
                          <option value="25">GMC</option>
                          <option value="26">ヒュンダイ</option>
                          <option value="27">ジャガー</option>
                          <option value="28">ジープ</option>
                          <option value="29">ランドローバー</option>
                          <option value="30">リンカーン</option>
                          <option value="31">メルセデス・ベンツ</option>
                          <option value="32">オペル</option>
                          <option value="33">プジョー</option>
                          <option value="34">ポルシェ</option>
                          <option value="35">ルノー</option>
                          <option value="36">スマート</option>
                          <option value="37">フォルクスワーゲン</option>
                          <option value="38">ボルボ</option>
                          <option value="39">ビュイック</option>
                          <option value="40">フェラーリ</option>
                          <option value="41">ハマー</option>
                          <option value="42">ランボルギーニ</option>
                          <option value="43">ランチア</option>
                          <option value="44">ポンティアック</option>
                          <option value="45">サーブ</option>
                          <option value="46">サターン</option>
                          <option value="47">AMG</option>
                          <option value="48">ロールス・ロイス</option>
                          <option value="49">デイムラー</option>
                          <option value="50">MINI</option>
                          <option value="51">アルピナ</option>
                          <option value="52">アバルト</option>
                          <option value="53">マセラティ</option>
                          <option value="54">マーキュリー</option>
                          <option value="55">三菱ふそう</option>
                          <option value="56">UDトラックス</option>
                          <option value="57">ローバー</option>
                          <option value="58">MG</option>
                          <option value="59">ロータス</option>
                          <option value="60">ケーターハム</option>
                        </select>
                      </div>
                      <div class="col col-md-7 PL0">
                        <select name="data[OwnCar][car_id]" class="form-control input-sm" id="carId">
                          <option value="">----------</option>
                          <option value="403" car_classification="2">360</option>
                          <option value="394" car_classification="2">eKアクティブ</option>
                          <option value="393" car_classification="2">eKカスタム</option>
                          <option value="395" car_classification="2">eKクラッシィ</option>
                          <option value="396" car_classification="2">eKスポーツ</option>
                          <option value="397" car_classification="2">eKワゴン</option>
                          <option value="398" car_classification="1">FTO</option>
                          <option value="399" car_classification="1">GTO</option>
                          <option value="400" car_classification="2">i</option>
                          <option value="401" car_classification="2">i-MiEV</option>
                          <option value="402" car_classification="1">RVR</option>
                          <option value="404" car_classification="1">アウトランダー</option>
                          <option value="405" car_classification="1">アウトランダーPHEV</option>
                          <option value="407" car_classification="1">アスパイア</option>
                          <option value="408" car_classification="1">エアトレック</option>
                          <option value="410" car_classification="1">エクリプス</option>
                          <option value="411" car_classification="1">エクリプススパイダー</option>
                          <option value="412" car_classification="1">エテルナ</option>
                          <option value="413" car_classification="1">エメロード</option>
                          <option value="414" car_classification="1">カリスマ</option>
                          <option value="417" car_classification="1">ギャラン</option>
                          <option value="420" car_classification="1">ギャランGTO</option>
                          <option value="421" car_classification="1">ギャランスポーツ</option>
                          <option value="418" car_classification="1">ギャランフォルティス</option>
                          <option value="419" car_classification="1">ギャランフォルティススポーツバック</option>
                          <option value="415" car_classification="1">ギャランラムダ</option>
                          <option value="422" car_classification="1">グランディス</option>
                          <option value="423" car_classification="1">コルト</option>
                          <option value="424" car_classification="1">コルトプラス</option>
                          <option value="430" car_classification="1">ジープ</option>
                          <option value="429" car_classification="1">シグマ</option>
                          <option value="427" car_classification="1">シャリオ</option>
                          <option value="428" car_classification="1">シャリオグランディス</option>
                          <option value="432" car_classification="1">スタリオン</option>
                          <option value="433" car_classification="1">ストラーダ</option>
                          <option value="434" car_classification="2">タウンボックス</option>
                          <option value="435" car_classification="1">タウンボックスワイド</option>
                          <option value="436" car_classification="1">チャレンジャー</option>
                          <option value="437" car_classification="1">ディアマンテ</option>
                          <option value="438" car_classification="1">ディアマンテワゴン</option>
                          <option value="439" car_classification="1">ディオン</option>
                          <option value="440" car_classification="1">ディグニティ</option>
                          <option value="442" car_classification="1">デボネア</option>
                          <option value="443" car_classification="1">デボネアV</option>
                          <option value="444" car_classification="1">デリカD:2</option>
                          <option value="445" car_classification="1">デリカD:3</option>
                          <option value="446" car_classification="1">デリカD:5</option>
                          <option value="447" car_classification="1">デリカカーゴ</option>
                          <option value="448" car_classification="1">デリカスターワゴン</option>
                          <option value="449" car_classification="1">デリカスペースギア</option>
                          <option value="450" car_classification="1">デリカトラック</option>
                          <option value="451" car_classification="1">デリカバン</option>
                          <option value="452" car_classification="2">トッポ</option>
                          <option value="453" car_classification="2">トッポBJ</option>
                          <option value="454" car_classification="1">トッポBJワイド</option>
                          <option value="455" car_classification="1">トライトン</option>
                          <option value="456" car_classification="1">パジェロ</option>
                          <option value="457" car_classification="1">パジェロイオ</option>
                          <option value="458" car_classification="1">パジェロジュニア</option>
                          <option value="459" car_classification="2">パジェロミニ</option>
                          <option value="460" car_classification="1">ピスタチオ</option>
                          <option value="463" car_classification="1">フォルテ</option>
                          <option value="462" car_classification="1">プラウディア</option>
                          <option value="461" car_classification="2">ブラボー</option>
                          <option value="464" car_classification="1">マグナ</option>
                          <option value="465" car_classification="2">ミニカ</option>
                          <option value="467" car_classification="2">ミニカトッポ</option>
                          <option value="469" car_classification="2">ミニキャブ</option>
                          <option value="471" car_classification="2">ミニキャブMiEV</option>
                          <option value="470" car_classification="2">ミニキャブトラック</option>
                          <option value="472" car_classification="2">ミニキャブブラボー</option>
                          <option value="473" car_classification="1">ミラージュ</option>
                          <option value="474" car_classification="1">ミラージュアスティ</option>
                          <option value="475" car_classification="1" selected="selected">ミラージュディンゴ</option>
                          <option value="476" car_classification="1">ランサー</option>
                          <option value="477" car_classification="1">ランサーエボリューション</option>
                          <option value="479" car_classification="1">ランサーエボリューションワゴン</option>
                          <option value="480" car_classification="1">ランサーカーゴ</option>
                          <option value="481" car_classification="1">ランサーセディア</option>
                          <option value="482" car_classification="1">ランサーセディアワゴン</option>
                          <option value="483" car_classification="1">ランサーフィオーレ</option>
                          <option value="484" car_classification="1">ランサーワゴン</option>
                          <option value="485" car_classification="1">リベロ</option>
                          <option value="486" car_classification="1">リベロカーゴ</option>
                          <option value="487" car_classification="1">レグナム</option>
                        </select>
                      </div>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">車両区分</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarCarClassification1">
                        <input type="radio" name="data[OwnCar][car_classification]" id="OwnCarCarClassification1" value="1" checked="checked" />
                        普通自動車</label>
                      <label class="radio-inline" for="OwnCarCarClassification2">
                        <input type="radio" name="data[OwnCar][car_classification]" id="OwnCarCarClassification2" value="2" />
                        軽自動車</label>
                    </div></td>
                </tr>
                <tr class="form-horizontal">
                  <td class="active" style="vertical-align: middle;">年式</td>
                  <td><div class="col col-md-2 PL0">
                      <select name="data[OwnCar][model_year_era]" class="form-control input-sm ime-disabled" id="model_year_era" autocomplete="off">
                        <option value="H" selected="selected">H</option>
                        <option value="S">S</option>
                      </select>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="data[OwnCar][model_year_year]" class="form-control input-sm ime-disabled" id="model_year_year" maxlength="2" autocomplete="off" type="tel" value="11"/>
                    </div>
                    <div class="col col-md-1 P6_0">年</div>
                    <div class="col col-md-2 PL0">
                      <input name="data[OwnCar][model_year_month]" class="form-control input-sm ime-disabled" id="model_year_month" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">月</div>
                    <div class="col col-md-1 col-md-offset-1 text-right PR0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][about_model_year]" id="about_model_year_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][about_model_year]"  id="about_model_year" value="1"/>
                      </div>
                    </div>
                    <input type="hidden" name="data[OwnCar][model_year_ad]" class="form-control input-sm ime-disabled" id="model_year_year" maxlength="2" autocomplete="off" value="199900"/>
                    <div class="col col-md-1 P6_0"> くらい</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">購入</td>
                  <td style="vertical-align:middle;"><div class="col col-md-12 P6_0">
                      <input type="hidden" name="data[OwnCar][purchase]" id="OwnCarPurchase_" value=""/>
                      <label class="radio-inline" for="OwnCarPurchase1">
                        <input type="radio" name="data[OwnCar][purchase]" id="OwnCarPurchase1" value="1" />
                        新車購入</label>
                      <label class="radio-inline" for="OwnCarPurchase2">
                        <input type="radio" name="data[OwnCar][purchase]" id="OwnCarPurchase2" value="2" />
                        中古車購入</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">走行距離</td>
                  <td><div class="col col-md-4 PL0">
                      <input name="data[OwnCar][mileage]" class="form-control input-sm ime-disabled mileage" maxlength="10" id="mileage" type="text" value="65000"/>
                    </div>
                    <div class="col col-md-1 P6_0"> km</div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">車検日</td>
                  <td><div class="col col-md-2 PL0">
                      <select name="data[OwnCar][inspection_date_era]" class="form-control input-sm ime-disabled" id="inspection_date_era" autocomplete="off">
                        <option value="H" selected="selected">H</option>
                        <option value="S">S</option>
                      </select>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="data[OwnCar][inspection_date_year]" class="form-control input-sm ime-disabled" id="inspection_date_year" maxlength="2" autocomplete="off" type="tel" value="30"/>
                    </div>
                    <div class="col col-md-1 P6_0">年</div>
                    <div class="col col-md-2 PL0">
                      <input name="data[OwnCar][inspection_date_month]" class="form-control input-sm ime-disabled" id="inspection_date_month" maxlength="2" autocomplete="off" type="tel" value="3"/>
                    </div>
                    <div class="col col-md-1 P6_0">月</div>
                    <div class="col col-md-2 PL0">
                      <input name="data[OwnCar][inspection_date_day]" class="form-control input-sm ime-disabled" id="inspection_date_day" maxlength="2" autocomplete="off" type="tel" value=""/>
                    </div>
                    <div class="col col-md-1 P6_0">日</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">自走可否</td>
                  <td><div class="col col-md-12 P6_0" id="own_car_runnable_box">
                      <label class="radio-inline own_car_runnable" for="OwnCarRunnable1">
                        <input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable1" value="1" checked="checked" />
                        走行可能</label>
                      <label class="radio-inline own_car_runnable" for="OwnCarRunnable0">
                        <input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable0" value="0" />
                        走行不可</label>
                    </div>
                    <div id="own_car_status_box" class="col col-md-12 P6_0">
                      <input id="OwnCarStatusId" type="hidden" value="379871" name="data[OwnCarStatus][id]">
                      <div id="own_car_runnable_subbox" style="display:block">
                        <input type="hidden" name="data[OwnCarStatus][use_now]" id="OwnCarStatusUseNow_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][use_now]"  value="1" checked="checked" id="OwnCarStatusUseNow"/>
                        <label for="OwnCarStatusUseNow" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">使用中</label>
                        <input type="hidden" name="data[OwnCarStatus][engine_noise]" id="OwnCarStatusEngineNoise_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][engine_noise]"  value="1"  id="OwnCarStatusEngineNoise"/>
                        <label for="OwnCarStatusEngineNoise" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">エンジン異音</label>
                        <input type="hidden" name="data[OwnCarStatus][white_smoke]" id="OwnCarStatusWhiteSmoke_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][white_smoke]"  value="1"  id="OwnCarStatusWhiteSmoke"/>
                        <label for="OwnCarStatusWhiteSmoke" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">白煙</label>
                        <input type="hidden" name="data[OwnCarStatus][battery_ng_runnable]" id="OwnCarStatusBatteryNgRunnable_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][battery_ng_runnable]"  value="1"  id="OwnCarStatusBatteryNgRunnable"/>
                        <label for="OwnCarStatusBatteryNgRunnable" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">バッテリ上</label>
                        <input type="hidden" name="data[OwnCarStatus][engine_trouble]" id="OwnCarStatusEngineTrouble_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][engine_trouble]"  value="1"  id="OwnCarStatusEngineTrouble"/>
                        <label for="OwnCarStatusEngineTrouble" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">エンジン不調</label>
                      </div>
                      <div id="own_car_unrunnable_subbox" style="display:none">
                        <input type="hidden" name="data[OwnCarStatus][tire_ok]" id="OwnCarStatusTireOk_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][tire_ok]"  value="1"  id="OwnCarStatusTireOk"/>
                        <label for="OwnCarStatusTireOk" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">タイヤ動作OK</label>
                        <input type="hidden" name="data[OwnCarStatus][tire_punctured]" id="OwnCarStatusTirePunctured_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][tire_punctured]"  value="1"  id="OwnCarStatusTirePunctured"/>
                        <label for="OwnCarStatusTirePunctured" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">タイヤパンク</label>
                        <input type="hidden" name="data[OwnCarStatus][battery_ng_unrunnable]" id="OwnCarStatusBatteryNgUnrunnable_" value="0"/>
                        <input type="checkbox" name="data[OwnCarStatus][battery_ng_unrunnable]"  value="1"  id="OwnCarStatusBatteryNgUnrunnable"/>
                        <label for="OwnCarStatusBatteryNgUnrunnable" style="font-weight:normal;margin-left:7px;margin-right:15px;vertical-align:middle;cursor:pointer;">バッテリ上</label>
                      </div>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle;">走行状態</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="data[OwnCar][running]" class="form-control input-sm" rows="3" cols="30" id="OwnCarRunning"></textarea>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">4tユニック進入</td>
                  <td><div class="col col-md-12 P6_0">
                      <input type="hidden" name="data[Inquiry][tow_truck]" id="InquiryTowTruck_" value=""/>
                      <label class="radio-inline" for="InquiryTowTruck0">
                        <input type="radio" name="data[Inquiry][tow_truck]" id="InquiryTowTruck0" value="0" />
                        不可</label>
                      <label class="radio-inline" for="InquiryTowTruck1">
                        <input type="radio" name="data[Inquiry][tow_truck]" id="InquiryTowTruck1" value="1" />
                        可能</label>
                      <label class="radio-inline" for="InquiryTowTruck2">
                        <input type="radio" name="data[Inquiry][tow_truck]" id="InquiryTowTruck2" value="2" />
                        たぶん可</label>
                      <label class="radio-inline" for="InquiryTowTruck3">
                        <input type="radio" name="data[Inquiry][tow_truck]" id="InquiryTowTruck3" value="3" />
                        2tならOK</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ボディーカラー</td>
                  <td><div class="col col-md-4 PL0">
                      <input name="data[OwnCar][color]" class="form-control input-sm" maxlength="20" id="color" type="text" value="白"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">排気量</td>
                  <td class="form-horizontal"><div class="col col-md-3 PL0">
                      <input name="data[OwnCar][displacement]" class="form-control input-sm ime-disabled displacement" maxlength="5" id="displacement" type="text" value="1500"/>
                    </div>
                    <div class="col col-md-1 P6_0"> cc</div>
                    <div class="col col-md-1 col-md-offset-4 text-right PR0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][about_displacement]" id="about_displacement_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][about_displacement]"  id="about_displacement" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> くらい</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">エンジンの型式</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="data[OwnCar][engine_model]" class="form-control input-sm" maxlength="10" id="engine_model" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ターボ (過給器)</td>
                  <td><div class="col col-md-12 P6_0">
                      <input type="hidden" name="data[OwnCar][turbo]" id="OwnCarTurbo_" value=""/>
                      <label class="radio-inline" for="OwnCarTurbo0">
                        <input type="radio" name="data[OwnCar][turbo]" id="OwnCarTurbo0" value="0" />
                        無 (N/A、自然吸気エンジン)</label>
                      <label class="radio-inline" for="OwnCarTurbo1">
                        <input type="radio" name="data[OwnCar][turbo]" id="OwnCarTurbo1" value="1" />
                        有 (ターボエンジン、スーパーチャージャー)</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">型式</td>
                  <td class="form-horizontal"><div class="col col-md-5 PL0">
                      <input name="data[OwnCar][model_name]" class="form-control input-sm" maxlength="30" id="model_name" type="text" value="GF-CQ2A "/>
                    </div>
                    <div class="col col-md-1 col-md-offset-3 text-right PR0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][about_model_name]" id="about_model_name_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][about_model_name]"  id="about_model_name" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> 曖昧</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">型式指定番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="data[OwnCar][model_specify_number]" class="form-control input-sm ime-disabled" maxlength="6" id="model_specify_number" type="text" value="09304"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">類別区分番号</td>
                  <td><div class="col col-md-3 PL0">
                      <input name="data[OwnCar][classification_number]" class="form-control input-sm ime-disabled" maxlength="4" id="classification_number" type="text" value="0010"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">グレード</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="data[OwnCar][grade]" class="form-control input-sm" maxlength="50" id="grade" type="text" value="不明"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">駆動方式</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarDriving0">
                        <input type="radio" name="data[OwnCar][driving]" id="OwnCarDriving0" value="0" checked="checked" />
                        2WD (FF / FR 等)</label>
                      <label class="radio-inline" for="OwnCarDriving1">
                        <input type="radio" name="data[OwnCar][driving]" id="OwnCarDriving1" value="1" />
                        4WD (AWD)</label>
                      <label class="radio-inline" for="OwnCarDriving9">
                        <input type="radio" name="data[OwnCar][driving]" id="OwnCarDriving9" value="9" />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">トランスミッション</td>
                  <td><div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="OwnCarTransmission0">
                        <input type="radio" name="data[OwnCar][transmission]" id="OwnCarTransmission0" onclick="changeTransmission()" value="0" checked="checked" />
                        AT (CVT)</label>
                      <label class="radio-inline" for="OwnCarTransmission1">
                        <input type="radio" name="data[OwnCar][transmission]" id="OwnCarTransmission1" onclick="changeTransmission()" value="1" />
                        MT</label>
                    </div>
                    <div class="col col-md-2 PL0">
                      <input name="data[OwnCar][gear_number]" class="form-control input-sm ime-disabled" maxlength="1" id="gear_number" type="text"/>
                    </div>
                    <div class="col col-md-1 P6_0"> 速</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">燃料</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarFuel1">
                        <input type="radio" name="data[OwnCar][fuel]" id="OwnCarFuel1" value="1" checked="checked" />
                        ガソリン</label>
                      <label class="radio-inline" for="OwnCarFuel2">
                        <input type="radio" name="data[OwnCar][fuel]" id="OwnCarFuel2" value="2" />
                        ディーゼル</label>
                      <label class="radio-inline" for="OwnCarFuel3">
                        <input type="radio" name="data[OwnCar][fuel]" id="OwnCarFuel3" value="3" />
                        ハイブリッド</label>
                      <label class="radio-inline" for="OwnCarFuel4">
                        <input type="radio" name="data[OwnCar][fuel]" id="OwnCarFuel4" value="4" />
                        電気自動車</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">所有者 (名義)</td>
                  <td class="form-horizontal"><div class="col col-md-6 PL0">
                      <input name="data[OwnCar][holder]" class="form-control input-sm" maxlength="50" id="holder" type="text" value="本人　ローン組無し　引越し無し　車検確認"/>
                    </div>
                    <div class="col col-md-1 col-md-offset-2 text-right PR0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][holder_dead]" id="holder_dead_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][holder_dead]"  id="holder_dead" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0"> 個人</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">所有者住所</td>
                  <td><input name="" class="form-control input-sm" maxlength="100" id="address3" type="text" value=""/></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車検証と印鑑証明書の住所までの引越し回数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="" class="form-control input-sm ime-disabled" maxlength="1" id="" type="tel" value="5"/>
                    </div>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ローン残債状況</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="" class="form-control input-sm" maxlength="50" id="" type="text" value="ローン残債状況"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">一時抹消登録</td>
                  <td><div class="col col-md-6 P6_0">
                      <label class="radio-inline" for="OwnCarDisposal0">
                        <input type="radio" name="data[OwnCar][disposal]" id="OwnCarDisposal0" value="0" checked="checked" />
                        未</label>
                      <label class="radio-inline" for="OwnCarDisposal1">
                        <input type="radio" name="data[OwnCar][disposal]" id="OwnCarDisposal1" value="1" />
                        済</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事故歴・修復歴</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarAccidents0">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents0" value="0" />
                        無</label>
                      <label class="radio-inline" for="OwnCarAccidents1">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents1" value="1" />
                        有</label>
                      <label class="radio-inline" for="OwnCarAccidents9">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents9" value="9" checked="checked" />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">保証書</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="" class="form-control input-sm" maxlength="50" id="" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">点検記録簿</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="" class="form-control input-sm" maxlength="50" id="" type="text" value=""/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車歴</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarAccidents0">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents0" value="0" />
                        自家用</label>
                      <label class="radio-inline" for="OwnCarAccidents1">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents1" value="1" />
                        事業用</label>
                      <label class="radio-inline" for="OwnCarAccidents9">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents9" value="2" />
                        レンタル</label>
                      <label class="radio-inline" for="OwnCarAccidents9">
                        <input type="radio" name="data[OwnCar][accidents]" id="OwnCarAccidents9" value="3"  />
                        未確認</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">喫煙状況</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarSmoking0">
                        <input type="radio" name="data[OwnCar][smoking]" id="OwnCarSmoking0" value="0" />
                        禁煙車</label>
                      <label class="radio-inline" for="OwnCarSmoking1">
                        <input type="radio" name="data[OwnCar][smoking]" id="OwnCarSmoking1" value="1" />
                        喫煙車</label>
                      <label class="radio-inline" for="OwnCarSmoking9">
                        <input type="radio" name="data[OwnCar][smoking]" id="OwnCarSmoking9" value="9" checked="checked" />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">装備品（オプション等）</td>
				  <td>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarEquipmentNavigation0">
                        <input type="radio" name="data" id="OwnCarEquipmentNavigation0" value="0" checked="checked" />
                        エアコン</label>
                      <label class="radio-inline" for="OwnCarEquipmentNavigation1">
                        <input type="radio" name="data" id="OwnCarEquipmentNavigation1" value="1" />
                        パワステ</label>
                      <label class="radio-inline" for="OwnCarEquipmentNavigation2">
                        <input type="radio" name="data" id="OwnCarEquipmentNavigation2" value="2" />
                        パワーウィンドウ</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarEquipmentBackMonitor0">
                        <input type="radio" name="data" id="OwnCarEquipmentBackMonitor0" value="3" />
                        集中ドアロック</label>
                      <label class="radio-inline" for="OwnCarEquipmentBackMonitor1">
                        <input type="radio" name="data" id="OwnCarEquipmentBackMonitor1" value="4" />
                        ABS</label>
                      <label class="radio-inline" for="OwnCarEquipmentPowerSlideDoor0">
                        <input type="radio" name="data" id="OwnCarEquipmentPowerSlideDoor0" value="5"/>
                        エアバッグ</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarEquipmentPowerSlideDoor1">
                        <input type="radio" name="data" id="OwnCarEquipmentPowerSlideDoor1" value="6" />
                        ETC</label>
                      <label class="radio-inline" for="OwnCarEquipmentPowerSlideDoor2">
                        <input type="radio" name="data" id="OwnCarEquipmentPowerSlideDoor2" value="7" />
                        キーレスエントリー</label>
                      <label class="radio-inline" for="OwnCarEquipmentSunroof0">
                        <input type="radio" name="data" id="OwnCarEquipmentSunroof0" value="8" />
                        スマートキー</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarEquipmentSunroof1">
                        <input type="radio" name="data" id="OwnCarEquipmentSunroof1" value="9" />
                        CD</label>
                      <label class="radio-inline" for="OwnCarEquipmentLeatherSeat0">
                        <input type="radio" name="data" id="OwnCarEquipmentLeatherSeat0" value="10"  />
                        MD</label>
                      <label class="radio-inline" for="OwnCarEquipmentLeatherSeat1">
                        <input type="radio" name="data" id="OwnCarEquipmentLeatherSeat1" value="11" />
                        DVDビデオ</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarEquipmentAlloyWheels0">
                        <input type="radio" name="data" id="OwnCarEquipmentAlloyWheels0" value="12" />
                        テレビ</label>
                      <label class="radio-inline" for="OwnCarEquipmentAlloyWheels1">
                        <input type="radio" name="data" id="OwnCarEquipmentAlloyWheels1" value="13" />
                        ナビゲーション</label>
                      <label class="radio-inline" for="OwnCarSteering0">
                        <input type="radio" name="data" id="OwnCarSteering0" value="14"/>
                        バックカメラ</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarSteering1">
                        <input type="radio" name="data" id="OwnCarSteering1" value="15" />
                        電動スライドドア</label>
                      <label class="radio-inline" for="OwnCarSteering2">
                        <input type="radio" name="data" id="OwnCarSteering2" value="16"  />
                        サンルーフ</label>
                      <label class="radio-inline" for="OwnCarSteering2b">
                        <input type="radio" name="data" id="OwnCarSteering2b" value="17" />
                        本革シート</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarSteering3">
                        <input type="radio" name="data" id="OwnCarSteering3" value="18"  />
                        純正エアロパーツ</label>
                      <label class="radio-inline" for="OwnCarSteering4">
                        <input type="radio" name="data" id="OwnCarSteering4" value="19" />
                        純正アルミホイール</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarSteering5">
                        <input type="radio" name="data" id="OwnCarSteering5" value="20"  />
                        横滑り防止装置</label>
                      <label class="radio-inline" for="OwnCarSteering6">
                        <input type="radio" name="data" id="OwnCarSteering6" value="21" />
                        トラクションコントロール</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarSteering7">
                        <input type="radio" name="data" id="OwnCarSteering7" value="22"  />
                        寒冷地仕様車</label>
                      <label class="radio-inline" for="OwnCarSteering8">
                        <input type="radio" name="data" id="OwnCarSteering8" value="23" />
                        福祉車両</label>
                      <label class="radio-inline" for="OwnCarSteering9">
                        <input type="radio" name="data" id="OwnCarSteering9" value="24"  />
                        ローダウン</label>
                    </div>
                    <div class="col col-md-9" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarSteering10">
                        <input type="radio" name="data" id="OwnCarSteering10" value="25" />
                        禁煙車</label>
                      <label class="radio-inline" for="OwnCarSteering0">
                        <input type="radio" name="data" id="OwnCarSteering0" value="26" />
                        ペット同乗歴なし</label>
                      <label class="radio-inline" for="OwnCarSteering1">
                        <input type="radio" name="data" id="OwnCarSteering1" value="27" />
                        限定車</label>
                    </div>
                    <div class="col col-md-12" style="padding: 6px;">
                      <label class="radio-inline" for="OwnCarSteering0">
                        <input type="radio" name="data" id="OwnCarSteering0" value="28"  />
                        取扱説明書</label>
                      <label class="radio-inline" for="OwnCarSteering1">
                        <input type="radio" name="data" id="OwnCarSteering1" value="29" />
                        新車時保証書</label>
                      <label class="radio-inline" for="OwnCarSteering0">
                        <input type="radio" name="data" id="OwnCarSteering0" value="30"  />
                        スペアタイヤ</label>
                      <label class="radio-inline" for="OwnCarSteering1">
                        <input type="radio" name="data" id="OwnCarSteering1" value="31" />
                        ハンドル</label>
                    </div>

				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">エアコン</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="OwnCarEquipmentAirConditioner0">
                        <input type="radio" name="data[OwnCar][equipment_air_conditioner]" id="OwnCarEquipmentAirConditioner0" value="0" />
                        無</label>
                      <label class="radio-inline" for="OwnCarEquipmentAirConditioner1">
                        <input type="radio" name="data[OwnCar][equipment_air_conditioner]" id="OwnCarEquipmentAirConditioner1" value="1" />
                        オートエアコン</label>
                      <label class="radio-inline" for="OwnCarEquipmentAirConditioner2">
                        <input type="radio" name="data[OwnCar][equipment_air_conditioner]" id="OwnCarEquipmentAirConditioner2" value="2" />
                        マニュアルエアコン</label>
                      <label class="radio-inline" for="OwnCarEquipmentAirConditioner4">
                        <input type="radio" name="data[OwnCar][equipment_air_conditioner]" id="OwnCarEquipmentAirConditioner4" value="4" />
                        故障</label>
                      <label class="radio-inline" for="OwnCarEquipmentAirConditioner9">
                        <input type="radio" name="data[OwnCar][equipment_air_conditioner]" id="OwnCarEquipmentAirConditioner9" value="9" checked="checked" />
                        不明</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">装備品（オプション等）備考</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="data[OwnCar][grade]" class="form-control input-sm" maxlength="50" id="grade" type="text" value=""/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">ドア数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="data[OwnCar][doors]" class="form-control input-sm ime-disabled" maxlength="1" id="doors" type="tel" value="5"/>
                    </div>
                    <div class="col col-md-2 P6_0"> ドア</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">乗員定員数</td>
                  <td><div class="col col-md-2 PL0">
                      <input name="data[OwnCar][doors]" class="form-control input-sm ime-disabled" maxlength="1" id="doors" type="tel" value="5"/>
                    </div>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(外装)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="data[OwnCar][conditions_exterior]" class="form-control input-sm" rows="3" placeholder="外装" cols="30" id="OwnCarConditionsExterior">キズ・凹み多少ある</textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(内装)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="data[OwnCar][conditions_interior]" class="form-control input-sm" rows="3" placeholder="内装" cols="30" id="OwnCarConditionsInterior">シミ・汚れ多少ある</textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両状態(その他)</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="data[OwnCar][conditions]" class="form-control input-sm" rows="3" placeholder="車両（その他）" cols="30" id="OwnCarConditions"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">その他PRポイント</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="data[OwnCar][conditions]" class="form-control input-sm" rows="3" placeholder="その他PRポイント" cols="30" id="OwnCarConditions"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車両番号 (N/P)</td>
                  <td><div class="col col-md-6 PL0">
                      <input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="vehicle_number" type="text" value="大宮502め2235"/>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">車台番号</td>
                  <td><div class="col col-md-8 PL0">
                      <input name="data[OwnCar][serial_number]" class="form-control input-sm" maxlength="30" id="serial_number" type="tel" value="CQ2A-0017425"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">要望：取外部品</td>
                  <td class="form-horizontal"><div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][request_remove_navi]" id="request_remove_navi_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][request_remove_navi]"  id="request_remove_navi" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;">ナビ</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][request_remove_etc]" id="request_remove_etc_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][request_remove_etc]"  id="request_remove_etc" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;">ETC</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][request_remove_tire]" id="request_remove_tire_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][request_remove_tire]"  id="request_remove_tire" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;"> タイヤ</div>
                    <div class="col col-md-1 text-center PA0">
                      <div class="checkbox">
                        <input type="hidden" name="data[OwnCar][request_remove_wheel]" id="request_remove_wheel_" value="0"/>
                        <input type="checkbox" name="data[OwnCar][request_remove_wheel]"  id="request_remove_wheel" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-2 P6_0" style="margin: 0px -10px;"> ホイール</div></td>
                </tr>
              </tbody>

              <thead>
			  <tr class="info">
				  <th colspan="2">
					  <div class="col col-md-12 text-right edit_own_car_button_div">
						  <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_own_car" data-own_car_id="388218">編集</a>
					  </div>
				  </th>
			  </tr>
              </thead>
            </table>
          </div>
          <div>
            <table class="table table-bordered table-condensed info_table" style="margin-bottom:0; margin-bottom:10px;">
              <thead>
                <tr class="info">
					<th colspan="4"> <div class="col col-md-9 lead PL0 MB0"><strong>車両写真</strong></div>
						<div class="col col-md-3 text-right">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">新規追加</button>
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
                        <!-- <button type="file" name="upfile" id="upfile" accept="image/*" class="btn btn-success btn-sm"></button>  -->
                    </div>		
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="active text-center">
                  <td class="col col-md-2" style="vertical-align: middle;">写真とコメント</td>
                  <td class="col col-md-4" style="vertical-align: middle;">表示順</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car1.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('images/car1.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
						<div class="col col-md-12 PR0 PL0">
							<p class="iconclose"><button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button></p>
						</div>
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car2.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car2.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car3.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car3.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car4.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car4.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					  <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car5.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car5.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car6.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car6.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car7.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car7.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car8.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car8.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					  <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car9.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car9.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car10.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car10.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car11.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car11.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car12.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car12.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
						<div class="text-center">
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car13.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car13.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car14.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car14.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car15.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car15.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
                </tr>
                <tr>
                  <td class="text-center">
					<div style="margin-bottom:5px;"><a href="./images/car16.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/car16.jpg')}}" alt="車検証写真" width="120"></a></div>
					<div><input name="data[OwnCar][vehicle_number]" class="form-control input-sm" maxlength="20" id="" type="text" value=""/></div>
				  </td>
					<td class="text-center">
					  <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
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
					   <br>				   
					  <div class="text-center"> 
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
				　　</td>
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
                              <a href="{{ url('/images/img2.jpg')}}" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/img3.jpg')}}" alt="車検証写真" width="100"></a>
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
                  <td style="vertical-align: middle;"> 2018-03-01 </td>
                </tr>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">書類写真</td>
                  <td style="vertical-align: middle;"> 
                      <div class="flexrowbetween">
                          <div class="img">
                              <a href="{{ url('/images/img3.jpg')}}" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/img3.jpg')}}" alt="車検証写真" width="100"></a>
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
                  <td style="vertical-align: middle;"> 2018-03-01 </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <div class="col col-md-4">
          <div>
            <table class="table table-bordered table-condensed info_table" id="table-Inquiry">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>案件状況</strong></div>
                    <div class="col col-md-2 text-center"> <a href="javascript:void(0);" class="btn btn-primary btn-sm edit_inquiry" data-inquiry_id="388102">編集</a>
                      <input type="hidden" name="data[Inquiry][id]" value="388102"/>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">初回問合日</td>
                  <td style="vertical-align: middle;">2018年2月6日 (火)</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">案件ステータス</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					<div class="col col-md-4 PL0">
						<select name="data[AgreementOrder][project-status]" class="form-control input-sm" id="ProjectStatus">
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
                      <label class="radio-inline" for="ProductComfirm0">
                        <input type="radio" name="data[Inquiry][pro-comfirm]" id="ProductComfirm0" value="0" checked="checked" />
                        S</label>
                      <label class="radio-inline" for="ProductComfirm1">
                        <input type="radio" name="data[Inquiry][pro-comfirm]" id="ProductComfirm1" value="1" />
                        A</label>
                      <label class="radio-inline" for="ProductComfirm2">
                        <input type="radio" name="data[Inquiry][pro-comfirm]" id="ProductComfirm2" value="2" />
                        B</label>
                      <label class="radio-inline" for="ProductComfirm3">
                        <input type="radio" name="data[Inquiry][pro-comfirm]" id="ProductComfirm3" value="2" />
                        C</label>
                      <label class="radio-inline" for="ProductComfirm4">
                        <input type="radio" name="data[Inquiry][pro-comfirm]" id="ProductComfirm4" value="2" />
                        D</label>
                      <label class="radio-inline" for="ProductComfirm5">
                        <input type="radio" name="data[Inquiry][pro-comfirm]" id="ProductComfirm5" value="2" />
                        NG</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                   <td class="active" style="width: 120px; vertical-align: middle;">再TEL予定日</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					  <div class="col col-md-4 PL0">
						  <input name="data[Trade][tel_date]" class="form-control input-sm ime-disabled" maxlength="10" id="tel_date" autocomplete="off" type="tel" value="2018-03-23"/>
					  </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">再TEL回数</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-2 PL0">
						<select name="data[AgreementOrder][calltime]" class="form-control input-sm" id="calltime">
						  <option value="">----------</option>
						  <option value="0">0</option>
						  <option value="1">4</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  <option value="9">9</option>
						  <option value="10">10</option>
						  <option value="11">11</option>
						  <option value="12">12</option>
						  <option value="12">13</option>
						  <option value="12">14</option>
						  <option value="12">15</option>
						  <option value="12">16</option>
						  <option value="12">17</option>
						  <option value="12">18</option>
						  <option value="12">19</option>
						  <option value="12">20</option>
						</select>
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">追跡</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Inquiry][repeater]" id="repeater_" value="0"/>
                        <input type="checkbox" name="data[Inquiry][repeater]"  id="repeater" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> リピーター</div>
                    <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Inquiry][plurality]" id="plurality_" value="0"/>
                        <input type="checkbox" name="data[Inquiry][plurality]"  id="plurality" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> 複数台口</div>
                    <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Inquiry][radio]" id="radio_" value="0"/>
                        <input type="checkbox" name="data[Inquiry][radio]"  id="radio" value="1"/>
                      </div>
                    </div>
                    <div class="col col-md-3 P6_0" style="margin: 0px -15px;"> ラジオ</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">キャンペーン提示</td>
                  <td><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="InquiryCampaignProposal0">
                        <input type="radio" name="data[Inquiry][campaign_proposal]" id="InquiryCampaignProposal0" value="0" checked="checked" />
                        未提案</label>
                      <label class="radio-inline" for="InquiryCampaignProposal1">
                        <input type="radio" name="data[Inquiry][campaign_proposal]" id="InquiryCampaignProposal1" value="1" />
                        インバウンド</label>
                      <label class="radio-inline" for="InquiryCampaignProposal2">
                        <input type="radio" name="data[Inquiry][campaign_proposal]" id="InquiryCampaignProposal2" value="2" />
                        アウトバウンド</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">キャンペーン</td>
                  <td style="background-color: #f9f9f9;"><div class="col col-md-12 P6_0">
                      <label class="radio-inline" for="InquiryCampaign0">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign0" value="0" checked="checked" />
                        未</label>
                      <label class="radio-inline" for="InquiryCampaign1">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign1" value="1" />
                        早得</label>
                      <label class="radio-inline" for="InquiryCampaign2">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign2" value="2" />
                        紹介</label>
                      <label class="radio-inline" for="InquiryCampaign3">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign3" value="3" />
                        リピート</label>
                      <label class="radio-inline" for="InquiryCampaign4">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign4" value="4" />
                        セット</label>
                      <label class="radio-inline" for="InquiryCampaign5">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign5" value="5" />
                        持込</label>
                      <label class="radio-inline" for="InquiryCampaign6">
                        <input type="radio" name="data[Inquiry][campaign]" id="InquiryCampaign6" value="6" />
                        福利厚生</label>
                    </div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px; vertical-align: middle;">一言備考</td>
                  <td><input name="data[Inquiry][note]" class="form-control input-sm" maxlength="50" id="note" type="text" value="●28　耳が遠い　大きい声で案内必要"/></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
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
                      <textarea name="data[InquiryDetail][conditions]" class="form-control input-sm" rows="5" cols="30" id="InquiryDetailConditions"></textarea>
                    </div></td>
                </tr>
                <tr>
                  <td style="border-top-style: none; border-bottom-style: none;"><div class="col col-md-12 calling_radio" style="padding: 6px">
                      <label class="radio-inline" for="InquiryDetailCalling1">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling1" value="1" checked="checked" />
                        入電</label>
                      <label class="radio-inline" for="InquiryDetailCalling2">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling2" value="2" />
                        架電</label>
                      <label class="radio-inline" for="InquiryDetailCalling3">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling3" value="3" />
                        メール受信</label>
                      <label class="radio-inline" for="InquiryDetailCalling4">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling4" value="4" />
                        メール送信</label>
                      <label class="radio-inline" for="InquiryDetailCalling5">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling5" value="5" />
                        業者入電</label>
                      <label class="radio-inline" for="InquiryDetailCalling6">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling6" value="6" />
                        業者架電</label>
                      <label class="radio-inline" for="InquiryDetailCalling9">
                        <input type="radio" name="data[InquiryDetail][calling]" id="InquiryDetailCalling9" value="9" />
                        その他</label>
                    </div></td>
                </tr>
                <tr>
                  <td style="border-top-style: none;"><div class="col col-md-2 col-md-offset-10 text-center add_inquiry_detail_button_div"> <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm add_inquiry_detail" inquiry_id="388102">登録</a> </div></td>
                </tr>
              </tbody>
            </table>
            <table class="table table-striped table-bordered table-condensed handle_history_list info_table" style="margin-bottom: 0px; table-layout: fixed;">
              <tbody class="handle_history">
                <tr>
                  <td class="active" style="vertical-align: middle; width: 90px;">2018-02-06<br />
                    09:32:35</td>
                  <td class="active" style="vertical-align: middle; width: 90px;">吉成 英里</td>
                  <td class="active" style="vertical-align: middle; width: 80px;">その他</td>
                  <td>写真OK　立会無し　事前連絡必要<br />
                    <br />
                    白NP<br />
                    キズ・凹み多少ある<br />
                    シミ・汚れ多少ある</td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle; width: 90px;">2018-02-06<br />
                    09:33:08</td>
                  <td class="active" style="vertical-align: middle; width: 90px;">吉成 英里</td>
                  <td class="active" style="vertical-align: middle; width: 80px;">その他</td>
                  <td>書類対応願います。★書類付き購入の際は3月抹消または名変必須のため3月中に手続き必要。それ以外の場合は3/26必着にて書類・NPを弊社へ返送必要です</td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle; width: 90px;">2018-02-06<br />
                    09:34:30</td>
                  <td class="active" style="vertical-align: middle; width: 90px;">吉成 英里</td>
                  <td class="active" style="vertical-align: middle; width: 80px;">その他</td>
                  <td>手元にあった車検証は1個前の車検証だった</td>
                </tr>
                <tr>
                  <td class="active" style="vertical-align: middle; width: 90px;">2018-02-06<br />
                    10:50:14</td>
                  <td class="active" style="vertical-align: middle; width: 90px;">吉成 英里</td>
                  <td class="active" style="vertical-align: middle; width: 80px;">その他</td>
                  <td>修正<br />
                    2000円　提示　自税別（2/6吉成）</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div style="margin-top:20px;">
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
                      <input name="data[ShortMessage][message]" class="form-control input-sm" maxlength="50" id="short_message" type="text"/>
                    </div></td>
                </tr>
                <tr>
                  <td style="border-top-style: none;">
                     <div class="col col-md-10 calling_radio" style="padding: 6px">
                      
                        <div class="col col-md-2 text-center send_short_message_div">
                            <a href="/crm/AgreementOrders/edit/118262" class="btn btn-warning btn-sm send_short_message" inquiry_id="388102">送信</a> 
                        </div>
                    </div>
                </td>
                </tr>
              </tbody>
            </table>
            <table class="table table-striped table-bordered table-condensed sms_history_list info_table" style="margin-bottom: 0px; display: none;">
              <tbody class="sms_history">
              </tbody>
            </table>
          </div>
          <div>
                 <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
                      <thead>
                        <tr class="info">
                          <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>出品受付情報</strong></div>
                          </th>
                        </tr>
                     </thead>
                </table>
                <div class="scroll">
					<div id="live-chat2">
						<form action="#" method="post">
							<table>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
								<tr>
									<th>文本文本文本文本文本</th>
									<td>文本文本文本文本文本<br>文本文本文本文本文本</td>
									<td>10/04/2018(13:38)</td>
								</tr>
							</table>
						</form>
                        <!-- end chat -->
                    </div>
                    <!-- end live-chat -->
                </div>
          </div>
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>出品受付情報</strong></div>
					  <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="javascript: void(0);" class="btn btn-primary btn-sm send_seeking_photographer_mail" agreement_order_id="118262">編集</a> </div>

				  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active" style="width: 120px;">出品番号</td>
                  <td> 118262			(問合番号：0479-9576-0011-8262)
                    <input type="hidden" name="data[AgreementOrder][id]" id="agreement_order_id" value="118262"/></td>
                </tr>
                <tr>
                  <td class="active">規約同意日</td>
					<td>
						<div class="col col-md-5">
							<input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="satei_datepicker1" autocomplete="off" type="text" value="2018-03-21"/>
						</div></td>
                </tr>
                <tr>
                  <td class="active" style="width: 120px;">規約同意確認方法</td>
					<td> <div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div></td>
                </tr>
                <tr>
                  <td class="active">出品催促担当者</td>
					<td> <div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div> </td>
                </tr>
                <tr>
                  <td class="active">備考</td>
					<td><div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div></td>
                </tr>
                <tr>
                  <td class="active">顧客ID</td>
                  <td>9999</td>
                </tr>
                <tr>
                  <td class="active">顧客PW</td>
					<td><div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div></td>
                </tr>
                <tr>
                  <td class="active">最低希望価格</td>
					<td><div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div></td>
                </tr>
                <tr>
                  <td class="active">オークション終了希望日時</td>
					<td><div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div></td>
                </tr>
                <!-- id19：成約手法変更機能 -->
				<tr>
					<td class="active">クレーム</td>
					<td><div class="col col-md-12 P6_0" id="own_car_runnable_box">
							<label class="radio-inline own_car_runnable" for="OwnCarRunnable10">
								<input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable10" value="1" checked="checked" />
								クレーム有</label>
							<label class="radio-inline own_car_runnable" for="OwnCarRunnable11">
								<input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable11" value="0" />
								クレーム無し</label>
						</div>
					</td>
				</tr>
                <tr>
                  <td class="active">抹消謄本の通知方法</td>
					<td><div class="col col-md-12 PL0">
							<input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
						</div></td>
                </tr>
                <tr>
                  <td class="active">税止案件</td>
					<td>
						<div class="col col-md-12 P6_0" id="own_car_runnable_box">
							<label class="radio-inline own_car_runnable" for="OwnCarRunnable12">
								<input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable12" value="1" checked="checked" />
								未完</label>
							<label class="radio-inline own_car_runnable" for="OwnCarRunnable13">
								<input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable13" value="0" />
								一時抹消</label>
							<label class="radio-inline own_car_runnable" for="OwnCarRunnable14">
								<input type="radio" name="data[OwnCar][runnable]" id="OwnCarRunnable14" value="0" />
								名義変更</label>
						</div>
					</td>
                </tr>
                <tr>
                  <td class="active">抹消業務</td>
					<td>
						<div class="col col-md-12 PL0">
							<textarea name="" class="form-control input-sm" rows="3" cols="30" id=""></textarea>
						</div>
					</td>
                </tr>
                <tr>
                  <td colspan="2" class="text-danger" style="background-color: #ffffff;"> ※抹消業務のボタン (不要以外) を押すと、お客様宛に抹消謄本閲覧サイトの案内メールが送られます。<br>
                    ※郵送/FAXを希望されるお客様には、抹消業務のボタンを押した後に通知方法のボタンを選択してください。 </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-bordered table-condensed info_table">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>査定サービス管理</strong></div>
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="javascript: void(0);" class="btn btn-primary btn-sm send_seeking_photographer_mail" agreement_order_id="118262">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="che1">
                        <input id="che1" name="check0" value="1" type="radio">
                        要</label>
                      <label class="radio-inline" for="che2">
                        <input id="che2" name="check1" value="2" type="radio">
                        不要</label>
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定方法</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-8 P6_0">
                      <label class="radio-inline" for="chex1">
                        <input id="chex1" name="check0" value="1" type="radio">
                        持込</label>
                      <label class="radio-inline" for="chex2">
                        <input id="chex2" name="check1" value="2" type="radio">
                        出張</label>
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定場所</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定場所地図</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定状況</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-12 PL0">
                      <input name="" class="form-control input-sm" maxlength="50" id="" type="text"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日①</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="zentei_datepicker1" autocomplete="off" type="text" value="2018-03-21"/>
                    </div>
				</tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日②</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="zentei_datepicker2" autocomplete="off" type="text" value="2018-03-21"/>
                    </div>
				</tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">事前査定日③</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="zentei_datepicker3" autocomplete="off" type="text" value="2018-03-21"/>
                    </div>
				</tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"/>
                    </div></td>
                </tr>
				<tr style="height: 41px;">
                  <td class="active" style="vertical-align: middle;">持込査定・出張査定候補リスト</td>
                  <td><div class="col col-md-12 PL0">
                      <textarea name="" class="form-control input-sm" rows="3" cols="30" id=""></textarea>
                    </div></td>
				</tr>   
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定業者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定業者ID</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定依頼日</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="satei_datepicker1" autocomplete="off" type="text" value="2018-03-21"/>
                    </div>
				</tr>		
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定依頼者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"/>
                    </div></td>
                </tr>	
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定結果到着日</td>
                  <td class="photo_term_td" style="vertical-align: middle;"><div class="col col-md-5">
                      <input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="satei_datepicker2" autocomplete="off" type="text" value="2018-03-21"/>
                    </div>
				</tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">査定完了確認者</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"/>
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
                        査定表（写真）<a href="{{ url('/images/img1.jpg')}}" rel="lightbox" class="lightbox_photo"><img src="{{ url('/images/img1.jpg')}}" alt="書類写真" width="100"></a>
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
					</div>
					<div class="col col-md-10 P6_0 spec1">
                        <span>評価点（総合）</span><input name="" class="form-control input-sm radio-inline w70" maxlength="50" id="" type="text" value="" placeholder=""> <span>点</span>
                    </div>
					<div class="col col-md-10 P6_0 spec1">
                        評価点（外装）<input name="" class="form-control input-sm w70" maxlength="50" id="" type="text" value="" placeholder=""> <span>点</span>
                    </div>
					<div class="col col-md-10 P6_0 spec1">
                        評価点（内装）<input name="" class="form-control input-sm w70" maxlength="50" id="" type="text" value="" placeholder=""> <span>点</span>
                    </div>
					<div class="col col-md-10 P6_0 spec1">
                        評価者コメント<textarea name="data[OwnCar][conditions_exterior]" class="form-control input-sm" rows="3" placeholder="" cols="30" id="OwnCarConditionsExterior"></textarea>
                    </div>
					<div class="col col-md-10 P6_0 spec1">
                        評価者<input name="" class="form-control input-sm" maxlength="50" id="" type="text" value="" placeholder="">
                    </div>
				  </td>
                </tr>				
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td class="photo_note_td" style="vertical-align: middle;"><div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text"/>
                    </div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col col-md-4">
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" id="table-Document">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>書類管理</strong></div>
                    <input type="hidden" name="data[Document][id]" value="105217"/>
                    <div class="col col-md-2 text-center send_seeking_photographer_mail_button_div"> <a href="javascript: void(0);" class="btn btn-primary btn-sm send_seeking_photographer_mail" agreement_order_id="118262">編集</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="active">抹消種別</td>
                  <td colspan="2">
					<div class="col col-md-4 PL0">
						<select name="data[AgreementOrder][cancel-status]" class="form-control input-sm" id="CancelStatus">
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
								<input type="radio" name="data[Trade][trade_schedule_time]" id="document1" value="0"  checked="checked"/>未着</label>

							<label class="radio-inline" for="document2">
								<input type="radio" name="data[Trade][trade_schedule_time]" id="document2" value="0"  checked="checked"/>不備</label>

							<label class="radio-inline" for="document3">
								<input type="radio" name="data[Trade][trade_schedule_time]" id="document3" value="0"  checked="checked"/>完備</label>
                    </div>


					</td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-bottom-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][inspection_certificate]" id="inspection_certificate_" value="0"/>
                        <input type="checkbox" name="data[Document][inspection_certificate]"  id="inspection_certificate" value="1" />
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="inspection_certificate" style="margin:0;font-weight:normal;"> <span>車検証</span> </label>
                    </div>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none; border-bottom-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][insurance]" id="insurance_" value="0"/>
                        <input type="checkbox" name="data[Document][insurance]"  id="insurance" value="1" />
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="insurance" style="margin:0;font-weight:normal;"> <span>自賠責保険証</span> </label>
                    </div>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none; border-bottom-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][recycle]" id="recycle_" value="0"/>
                        <input type="checkbox" name="data[Document][recycle]"  id="recycle" value="1" />
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="recycle" style="margin:0;font-weight:normal;"> <span>リサイクル券</span> </label>
                    </div>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none; border-bottom-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][seal_impression]" id="seal_impression_" value="0"/>
                        <input type="checkbox" name="data[Document][seal_impression]"  id="seal_impression" value="1" />
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="seal_impression" style="margin:0;font-weight:normal;"> <span>印鑑登録証明書</span> <span class="text-danger">(要：住所一致確認)</span> </label>
                    </div>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none; border-bottom-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][assignment]" id="assignment_" value="0"/>
                        <input type="checkbox" name="data[Document][assignment]"  id="assignment" value="1" />
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="assignment" style="margin:0;font-weight:normal;"> <span>譲渡証明書</span> </label>
                    </div>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none; border-bottom-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][commission]" id="commission_" value="0"/>
                        <input type="checkbox" name="data[Document][commission]"  id="commission" value="1" />
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="commission" style="margin:0;font-weight:normal;"> <span>委任状</span> </label>
                    </div>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr>
                 <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none; border-bottom-style: none;">
                     <div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][regidents_card]" id="regidents_card_" value="0" disabled="disabled"/>
                        <input type="checkbox" name="data[Document][regidents_card]"  id="regidents_card" value="1" disabled="disabled"/>
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="regidents_card" style="margin:0;font-weight:normal;"> <del><span class="text-muted">住民票・戸籍附票</span><del> </label>
                    </div>
                    <input type="hidden" name="data[Document][regidents_card]" value="9"/>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div>
                 </td>
                </tr>
                <tr>
                  <td colspan="2" class="form-horizontal" style="vertical-align: middle; background-color: #ffffff; border-top-style: none;"><div class="col col-md-1 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Document][inheritance]" id="inheritance_" value="0" disabled="disabled"/>
                        <input type="checkbox" name="data[Document][inheritance]"  id="inheritance" value="1" disabled="disabled"/>
                      </div>
                    </div>
                    <div class="col col-md-7" style="padding: 6px 0px;">
                      <label for="inheritance" style="margin:0;font-weight:normal;"> <del><span class="text-muted">遺産分割協議書</span></del> </label>
                    </div>
                    <input type="hidden" name="data[Document][inheritance]" value="9"/>
                    <div class="col col-md-4" style="padding: 6px 0px;"> </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ナンバープレート</td>
                  <td style="vertical-align: middle;"><div class="col col-md-4 PL0">
						<select name="data[AgreementOrder][License_Plate]" class="form-control input-sm" id="Licenseplate">
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
                      <textarea name="data[Document][remark]" class="form-control input-sm" rows="3" cols="30" id="DocumentRemark">確認書（2/5吉成）
2/6　上記書類発送（郵便）　山岡</textarea>
                    </div>
                   </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>引取情報</strong></div>
                    <div class="col col-md-2 text-center edit_trade_button_div"> <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_trade" trade_id="105217" agreement_order_id="118262">編集</a> </div>
                    <input type="hidden" name="data[Trade][id]" value="105217"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第一）</td>
                  <td style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][trade_schedule_date]" class="form-control input-sm ime-disabled" maxlength="10" id="trade_datepicker" autocomplete="off" type="tel" value="2018-03-23"/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="TradeScheduleTime1">
                        <input type="radio" name="data[Trade][trade_schedule_time]" id="TradeScheduleTime1" value="0"  checked="checked"/>
                        指定なし</label>
                      <label class="radio-inline" for="TradeScheduleTime2">
                        <input type="radio" name="data[Trade][trade_schedule_time]" id="TradeScheduleTime2" value="1" />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="TradeScheduleTime0">
                        <input type="radio" name="data[Trade][trade_schedule_time]" id="TradeScheduleTime0" value="2" />
                        12:00～15:00</label>
                      <label class="radio-inline" for="TradeScheduleTime3">
                        <input type="radio" name="data[Trade][trade_schedule_time]" id="TradeScheduleTime3" value="3" />
                        15:00～</label>

                    </div>
                    <div class="col col-md-3 text-center text-danger" style="padding: 6px 0px; background-color: #f5f5f5;">日程確認待</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第二）</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][trade_schedule_date2]" class="form-control input-sm ime-disabled" maxlength="10" id="trade_datepicker2" autocomplete="off" type="tel"/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="dai1time0">
                        <input type="radio" name="data[Trade][trade_schedule_time]2" id="dai1time0" value="0"  checked="checked"/>
                        指定なし</label>
                      <label class="radio-inline" for="dai1time1">
                        <input type="radio" name="data[Trade][trade_schedule_time]2" id="dai1time1" value="1" />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="dai1time2">
                        <input type="radio" name="data[Trade][trade_schedule_time]2" id="dai1time2" value="2" />
                        12:00～15:00</label>
                      <label class="radio-inline" for="dai1time3">
                        <input type="radio" name="data[Trade][trade_schedule_time]2" id="dai1time3" value="3" />
                        15:00～</label>
                    </div>
                    <div class="col col-md-3 text-center" style="padding: 0px;">
                      <div class="checkbox">
                        <input type="hidden" name="data[Trade][pending_schedule]" id="chk_pending_schedule_" value="0"/>
                        <input type="checkbox" name="data[Trade][pending_schedule]"  id="chk_pending_schedule" value="1" onclick="checkPendingSchedule();"/>
                      </div>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取予定日 <br>（第三）</td>
                  <td class="form-horizontal" style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][trade_schedule_date2]" class="form-control input-sm ime-disabled" maxlength="10" id="trade_datepicker3" autocomplete="off" type="tel"/>
                    </div>
                    <div class="col col-md-5" style="padding: 6px 0px;">
                      <label class="radio-inline" for="dai2time0">
                        <input type="radio" name="data[Trade][trade_schedule_time]3" id="dai2time0" value="0"  checked="checked"/>
                        指定なし</label>
                      <label class="radio-inline" for="dai2time1">
                        <input type="radio" name="data[Trade][trade_schedule_time]3" id="dai2time1" value="1" />
                        9:00～12:00</label><br>

                      <label class="radio-inline" for="dai2time2">
                        <input type="radio" name="data[Trade][trade_schedule_time]3" id="dai2time2" value="2" />
                        12:00～15:00</label>
                      <label class="radio-inline" for="dai2time3">
                        <input type="radio" name="data[Trade][trade_schedule_time]3" id="dai2time3" value="3" />
                        15:00～</label>
                    </div>
				</td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取場所</td>
                  <td style="vertical-align: middle;"><input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" type="text" value="埼玉県北足立郡伊奈町小室5366-3　ハイツカミフジ目の前のP　駐車no4"/></td>
                </tr>
                <tr>
                  <td colspan="2" style="background-color: #f9f9f9;"><div id="trade_address_map" style="width: 600px; height: 400px;">
                      <div id='trade_address_map' style='width:580px; height:380px; '></div>
                      </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">立会可否</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="TradePresence0">
                        <input type="radio" name="data[Trade][presence]" id="TradePresence0" value="0" />
                        不可</label>
                      <label class="radio-inline" for="TradePresence1">
                        <input type="radio" name="data[Trade][presence]" id="TradePresence1" value="1" checked="checked" />
                        可能</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取業者コード</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][member_code]" class="form-control input-sm" maxlength="10" id="sales_price" value="0123456" type="tel">
                    </div>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取備考</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;"><div class="col col-md-12" style="padding-left: 0px;">
                      <textarea name="data[Trade][remark]" class="form-control input-sm" rows="3" cols="30" id="TradeRemark">書類対応願います。★書類付き購入の際は3月抹消または名変必須のため3月中に手続き必要。それ以外の場合は3/26必着にて書類・NPを弊社へ返送必要です</textarea>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">ナンバーカット</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="TradeNumberCut0">
                        <input type="radio" name="data[Trade][number_cut]" id="TradeNumberCut0" value="0" />
                        無</label>
                      <label class="radio-inline" for="TradeNumberCut1">
                        <input type="radio" name="data[Trade][number_cut]" id="TradeNumberCut1" value="1" checked="checked" />
                        有</label>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取完了確認日</td>
                  <td style="background-color: #f9f9f9; vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][seller_comfirm_date]" class="form-control input-sm ime-disabled" maxlength="10" id="seller_comfirm_date" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">引取完了日</td>
                  <td class="finish_trade_td" style="vertical-align: middle;">                      
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][seller_finish_date]" class="form-control input-sm ime-disabled" maxlength="10" id="seller_finish_date" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>販売管理</strong></div>
                    <div class="col col-md-2 text-center edit_sale_button_div"> 
                      <!--id22：販売情報管理--> 
                      <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a> </div>
                    <input type="hidden" name="data[Sale][id]" value="105239"/>
                    <input type="hidden" name="data[Sale][bill]"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][sale_date]" class="form-control input-sm ime-disabled" maxlength="10" id="sale_date" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">計上方式</td>
                  <td class="mode_radio_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-12" style="padding: 6px 0px;">
                      <label class="radio-inline" for="SaleMode1">
                        <input type="radio" name="data[Sale][mode]" id="SaleMode1" onChange="changeMode();" value="1" checked="checked" />
                        一括</label>
                      <label class="radio-inline" for="SaleMode2">
                        <input type="radio" name="data[Sale][mode]" id="SaleMode2" onChange="changeMode();" value="2" />
                        個別</label>
                    </div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="salesPrice" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売額</td>
                  <td class="sales_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][sales_price]" class="form-control input-sm" maxlength="10" id="sales_price" onblur="calculateIncludingTax();" type="tel" value="0"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="vehiclePrice" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車両本体価格</td>
                  <td class="vehicle_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][vehicle_price]" class="form-control input-sm" maxlength="10" id="vehicle_price" onblur="calculateIncludingTax();" type="tel" value="0"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <!--id22：販売情報管理-->
                <tr id="recyclingFee" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">リサイクル料</td>
                  <td class="recycling_fee_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][recycling_fee]" class="form-control input-sm" maxlength="10" id="sales_recycling_fee" onblur="calculateIncludingTax();" type="tel" value="11330"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align:middle;">落札手数料</td>
                  <td class="successful_fee_td" style="vertical-align:middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][successful_fee]" class="form-control input-sm" maxlength="10" id="SaleSuccessfulFee" onblur="calculateIncludingTax();" type="tel" value="0"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="vertical-align:middle;">還付金代</td>
                  <td class="refund_td" style="vertical-align:middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][refund]" class="form-control input-sm" maxlength="10" id="SaleRefund" onblur="calculateIncludingTax();" type="tel" value="0"/>
                    </div>
                    <div class="col col-md-1 P6_0"> 円</div></td>
                </tr>
                <tr id="sale_agency_disposal_tr">
                  <td class="active">抹消代行費用</td>
                  <td class="sale_agency_disposal_td"><div class="col col-md-4 PL0">
                      <input name="data[Sale][agency_disposal]" class="form-control input-sm" maxlength="10" id="SaleAgencyDisposal" onblur="calculateIncludingTax();" type="tel" value="0"/>
                    </div>
                    <div class="col col-md-1 P6_0">円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最終請求額 (税込)</td>
                  <td style="vertical-align: middle;"><div class="col col-md-12" id="including_tax_output" style="padding: 6px 0px;"> 0 円 </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先</td>
                  <td class="sales_contact_select_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-6" style="padding-left: 0px;">
                      <select name="data[Sale][sales_contact]" class="form-control input-sm" id="sales_contact" onchange="clearSalesContactInfo();">
                        <option value="1">業者</option>
                        <option value="2">業者 (書類)</option>
                        <option value="3">業者 (Smartオークション)</option>
                        <option value="4">オークション</option>
                        <option value="5">国内販売</option>
                        <option value="9">その他</option>
                      </select>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先名</td>
                  <td style="vertical-align: middle;"><!-- id22：販売情報管理 -->
                    
                    <div class="col col-md-10 contact_name_div" style="padding-left: 0px;">
                      <input name="data[Sale][contact_name]" class="form-control input-sm" maxlength="100" id="contact_name" autocomplete="off" onkeydown="clearSalesContactCode();" type="text"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売先コード</td>
                  <td style="vertical-align: middle;"><div class="col col-md-10" id="contact_cd_output" style="padding: 6px 0px;"> </div>
                    <div class="col col-md-2" id="contact_phone_number_div" style="padding: 6px;"> </div>
                    <input type="hidden" name="data[Sale][contact_cd]" id="contact_cd"/></td>
                </tr>
                <tr class="sales_remark_tr" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">販売備考</td>
                  <td class="sale_remark_td" style="vertical-align: middle;"><!--id22：販売情報管理-->
                    
                    <div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="data[Sale][remark]" class="form-control input-sm" rows="3" cols="30" id="SaleRemark"></textarea>
                    </div>
                    <div class="col col-md-2 text-center edit_sale_remark_div"> <a href="javascript:void(0);" class="btn btn-success btn-xs edit_sale_remark" sale_id="105239">編集</a> </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">差引額</td>
                  <td class="balance_td" style="vertical-align: middle;"><!--id24：差引額設定機能-->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][balance]" class="form-control input-sm" maxlength="10" id="balance" onblur="calculateIncludingTax();" type="text" value="0"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div>
                    <div class="col col-md-2 col-md-offset-5 text-center update_balance_button_div">
                      <input  name="update_balance" class="btn btn-warning btn-xs update_balance" type="submit" value="更新"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入金期日</td>
                  <td class="due_date_td" style="vertical-align: middle;"><!-- id25：入金期日設定機能 -->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][due_date]" class="form-control input-sm" maxlength="10" id="due_datepicker" type="tel"/>
                    </div>
                    <div class="col col-md-2 col-md-offset-6 text-center update_due_date_button_div">
                      <input  name="update_due_date" class="btn btn-warning btn-xs update_due_date" type="submit" value="更新"/>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">売掛日</td>
                  <td style="vertical-align: middle;" id="credit_sale_date">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Accounts_Receivable_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="accounts_receivable_date" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr class="bill_tr" style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">請求日</td>
                  <td class="bill_td" style="vertical-align: middle;" id="sale_bill"><!-- id26：請求管理機能 -->
                    
                    <div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Request_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="request_date" autocomplete="off" type="tel">
                    </div>
                </tr>
                <!-- id27：請求差戻機能 -->
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">着金日</td>
                  <td class="receipts_td" style="vertical-align: middle;"><!-- id28：着金管理機能 -->
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Liner_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="liner_date" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <!--id67：着金解除機能-->
              </tbody>
              <!-- id22：請求書発行機能 -->
            </table>
          </div>

<!-- Quan -->
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>販売確定情報</strong></div>
                    <div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a> </div>
                    <input type="hidden" name="data[Sale][id]" value="105239"/>
                    <input type="hidden" name="data[Sale][bill]"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">車両本体価格（確定金額）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][successful_fee]" class="form-control input-sm" maxlength="10" id="SaleSuccessfulFee" onblur="calculateIncludingTax();" value="0" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">確定請求金額（税込）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][successful_fee]" class="form-control input-sm" maxlength="10" id="SaleSuccessfulFee" onblur="calculateIncludingTax();" value="0" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">金額差異</td>
                  <td style="vertical-align: middle;"></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">差引額</td>
                  <td style="vertical-align: middle;"></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入金期日（振込期日）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Liner_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="money_date01" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最終売掛日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Liner_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="money_date02" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">請求日</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Liner_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="money_date03" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">着金日（振込日）</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Liner_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="money_date04" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td style="vertical-align: middle;">
                  	<div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text">
                    </div>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>顧客振込情報</strong></div>
                    <div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a> </div>
                    <input type="hidden" name="data[Sale][id]" value="105239"/>
                    <input type="hidden" name="data[Sale][bill]"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">確定金額</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Sale][successful_fee]" class="form-control input-sm" maxlength="10" id="SaleSuccessfulFee" onblur="calculateIncludingTax();" value="0" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">備考</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-10 PL0">
                      <input name="data[SeekingPhotographerMail][note]" class="form-control input-sm" maxlength="50" id="photo_note" type="text">
                    </div>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>Smartオークション出品情報</strong></div>
                    <div class="col col-md-2 text-center exhibit_scrap_auction_button_div"> 
                      <!--id30：Smart情報管理-->
                      <input  name="exhibit_scrap_auction" class="btn btn-primary btn-sm exhibit_scrap_auction" type="submit" value="出品"/>
                    </div>
                    <input type="hidden" name="data[ScrapAuction][id]"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">出品状況</td>
                  <td style="vertical-align: middle;">
					  <div class="col col-md-4 PL0">
							<select name="data[AgreementOrder][License_Plate]" class="form-control input-sm" id="Licenseplate">
							  <option value="">----------</option>
							  <option value="1">未出品</option>
							  <option value="2">出品中</option>
							  <option value="3">落札</option>
							  <option value="4">商談中</option>
							  <option value="5">流札</option>
							</select>
						</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">最低落札価格</td>
                  <td class="start_price_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[ScrapAuction][start_price]" class="form-control input-sm" maxlength="8" id="start_price" type="text" value="10000"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">入札締切日時</td>
                  <td class="end_at_td" style="vertical-align: middle;"><div class="col col-md-4" style="padding-left: 0px;" for="end_at_datepicker">
                      <input name="data[ScrapAuction][end_at_date]" class="form-control input-sm" maxlength="10" id="end_at_datepicker" autocomplete="off" type="text" value="2018-03-21"/>
                    </div>
                    <div class="col col-md-5">
                      <select name="data[ScrapAuction][end_at_time][hour]" class="select-time" style="width: 55px; height: 30px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;" id="ScrapAuctionEndAtTimeHour">
                        <option value="00">0</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13" selected="selected">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                      </select>
                      :
                      <select name="data[ScrapAuction][end_at_time][min]" class="select-time" style="width: 55px; height: 30px; padding: 6px 6px; border: 1px solid #ccc; border-radius: 3px;" id="ScrapAuctionEndAtTimeMin">
                        <option value="00" selected="selected">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                      </select>
                    </div></td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">訂正備考</td>
                  <td style="vertical-align: middle;"><div class="col col-md-10" style="padding-left: 0px;">
                      <textarea name="data[ScrapAuction][correction_remark]" class="form-control input-sm" rows="3" cols="30" id="ScrapAuctionCorrectionRemark"></textarea>
                    </div></td>
                </tr>
                <tr class="scrap_tender_list_tr" style="height: 41px;">
				  <td class="active" style="width: 120px; vertical-align: middle;">入札状況</td>
				  <td style="vertical-align: middle;" class="scrap_tender_list_td"><div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	森下自動車 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> <span style="background:#f0a400;color:#ffffff;padding:1px;3px;" class="hint--top-right" data-hint="+10,000 円">増</span> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 75,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00229960">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	【未手配】 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;">【代】</div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> <span style="background:#f0a400;color:#ffffff;padding:1px;3px;" class="hint--top-right" data-hint="+5,000 円"></span> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 31,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00143506">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	カーショップチャンス </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> <span style="background:#f0a400;color:#ffffff;padding:1px;3px;" class="hint--top-right" data-hint="+5,000 円">増</span> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 5,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00143506">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	DEEP </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 2,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00208231">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	S・Sオート </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> <span style="background:#337ab7;color:#ffffff;padding:2px;3px;">判</span> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 2,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00239351">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	北中自動車 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> <span style="background:#337ab7;color:#ffffff;padding:2px;3px;">判</span> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 1,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00125405">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ○	カーサポート ニーズ </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> <span style="background:#337ab7;color:#ffffff;padding:2px;3px;">判</span> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 1,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00120534">取消</a> </div>
					</div>
					<div class="col col-md-12 PA0 trader_row">
					  <div class="col col-md-10 PA0" style="margin:0px 0px 5px;border-bottom:solid 1px #333333;">
						<div class="col col-md-6" style="padding:4px 0px 2px;"> ◎	比嘉解体所 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"></div>
						<div class="col col-md-1 text-center text-primary" style="padding:4px 0px 2px;"> 有 </div>
						<div class="col col-md-1 text-center" style="padding:4px 0px 2px;"> </div>
						<div class="col col-md-1 text-center" style="padding:3px 0px 2px;"> </div>
						<div class="col col-md-2 text-right" style="padding:4px 0px 2px;">&yen; 1,000</div>
					  </div>
					  <div class="col col-md-2 text-center" style="padding:3px 0px 2px;"> 
						<!--id78：入札キャンセル機能 --> 
						<a href="/crm/AgreementOrders/edit/115391" class="btn btn-warning btn-xs tender_cancel" trader_cd="T00125416">取消</a> </div>
					</div></td>
                </tr>
				<tr>
				  <td class="active" style="vertical-align: middle;">代理入札</td>
				  <td style="vertical-align: middle;"><div class="col col-md-12">
					  <div class="col col-md-4">業者名</div>
					  <input name="data[ProxyBid][trader_name]" class="form-control input-sm ui-autocomplete-input" id="ProxyBidTraderName" value="" data-trader_cd="" type="text"/>
					</div>
					<div class="col col-md-12">
					  <div class="col col-md-4">入札額</div>
					  <input name="data[ProxyBid][amount]" class="form-control input-sm ui-autocomplete-input" id="ProxyBidAmount" type="tel"/>
					</div>
					<div class="col col-md-12" style="margin:10px auto;text-align:right;"> <a href="javascript:void(0);" id="ProxyBidButtonDocument" class="btn btn-primary">書類有入札</a> <a href="javascript:void(0);" id="ProxyBidButton" class="btn btn-danger">書類無入札</a> </div></td>
				</tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;"> 業者質問 </td>
                  <td class="quo_box" style="vertical-align: middle;"><div class="col col-md-8 quo_status_box" style="padding:6px 0px;"><span class="text-primary">Q</span>金田商店（大阪府）　2018-01-18 19:00:01</div>
                    <div class="col col-md-4">
                      <div class="quo_set_btn" style="padding:6px 0px;text-align:right;"> <a href="/crm/AgreementOrders/edit/118262" id="quo_price_change_btn" class="btn btn-success btn-xs quo_price_btn" style="margin-right:10px;" price_status="change">質問編集</a><a href="/crm/AgreementOrders/edit/118262" id="quo_send_btn1" class="btn btn-warning  btn-xs quo_send_btn" quo_send="1">未回答</a> </div>
                    </div>
					<div>書類代金の内訳教えてください。重量重量税+アテアテ+</div>
				  </td>
                </tr>
                <!-- 業者質問管理　--> 
                <!-- 業者クレーム管理　-->
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-bordered table-condensed info_table" style="margin-bottom: 0px;">
              <thead>
                <tr class="info">
                  <th colspan="4"> <div class="col col-md-10 lead PL0 MB0"><strong>オークション関連諸費用管理</strong></div>
                    <div class="col col-md-2 text-center text-danger register_auction_cost_div"> <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm register_auction_cost" agreement_order_id="118262">登録</a> </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="active text-center">
                  <td style="width: 120px; vertical-align: middle;">日付</td>
                  <td style="width: 150px; vertical-align: middle;">分類</td>
                  <td style="vertical-align: middle;">備考</td>
                  <td style="width: 150px; vertical-align: middle;">手数料 (税別)</td>
                </tr>
                <tr style="height: 41px;">
                  <td><div class="col col-md-12 required" style="padding-left: 0px; padding-right: 0px;">
                      <input name="data[AuctionCost][date]" class="form-control input-sm ime-disabled" maxlength="10" id="auction_cost_datepicker" type="tel"/>
                    </div></td>
                  <td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">
                      <select name="data[AuctionCost][cost_category]" class="form-control input-sm" id="auction_cost_category">
                        <option value="1">AA出品料</option>
                        <option value="2">AA成約料</option>
                        <option value="3">AAペナルティ</option>
                        <option value="5">陸送費</option>
                        <option value="9">その他</option>
                      </select>
                    </div></td>
                  <td><div class="col col-md-12" style="padding-left: 0px; padding-right: 0px;">
                      <input name="data[AuctionCost][note]" class="form-control input-sm" maxlength="50" id="auction_cost_note" type="text"/>
                    </div></td>
                  <td><div class="col col-md-11 required" style="padding-left: 0px;">
                      <input name="data[AuctionCost][amount]" class="form-control input-sm ime-disabled" maxlength="7" id="auction_cost_amount" type="tel"/>
                    </div>
                    <div class="col col-md-1" style="padding: 6px 0px;"> 円</div></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="auction_cost_list_div"> </div>
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0" id="recycling_deposit_box"><strong>リサイクル料管理</strong></div>
                  	<div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a> </div>
                    <input type="hidden" name="data[RecyclingDeposit][id]" value="105217"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;" id="recycling_deposit_status">
                  <td class="active" style="width: 120px; vertical-align: middle;">預託状況</td>
                  <td style="vertical-align: middle;">
				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" value="預託済" type="text">
					</div>
                    <input type="hidden" name="data[RecyclingDeposit][finish_deposit]" value="1"/>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">リサイクル料</td>
                  <td style="vertical-align: middle;"> <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" value="11,330 円" type="text">
					</div>
	  			 </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div>
            <table class="table table-striped table-bordered table-condensed info_table" style="margin-top: 20px;">
              <thead>
                <tr class="info">
                  <th colspan="2"> <div class="col col-md-10 lead PL0 MB0"><strong>還付金管理</strong></div>
                  	<div class="col col-md-2 text-center edit_sale_button_div"> 
                      <a href="/crm/AgreementOrders/edit/118262" class="btn btn-primary btn-sm edit_sale" sale_id="105239" agreement_order_id="118262">編集</a> </div>
                    <input type="hidden" name="data[Refund][id]" value="105217"/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自賠責返戻</td>
                 <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" value="不要　(見込額： 0 円)" type="text">
					</div>
				   </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">重量税還付</td>
                  <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" value="不要　(見込額： 0 円)" type="text">
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自動車税支払日</td>
                  <td style="vertical-align: middle;">
					<div class="col col-md-4" style="padding-left: 0px;">
                      <input name="data[Trade][Liner_Date]" class="form-control input-sm ime-disabled" maxlength="10" id="autocar_date" autocomplete="off" type="tel">
                    </div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">支払金額</td>
                 <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" value="不要　(見込額： 0 円)" type="text">
					</div>
				  </td>
                </tr>
                <tr style="height: 41px;">
                  <td class="active" style="width: 120px; vertical-align: middle;">自動車税還付金</td>
                  <td style="vertical-align: middle;">
  				    <div class="col col-md-8 PL0" id="recycling_deposit_status">
						<input name="data[Trade][address]" class="form-control input-sm" maxlength="100" id="parking_address" value="不要　(見込額： 0 円)" type="text">
					</div>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

  </div>
@endsection
@extends('layouts.master')
@section('title')
    (10)社内システム:業者編集
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
            $('#contractdate').datepicker({
            });
            $('#contractdate1').datepicker({
            });
            $('#contractdate2').datepicker({
            });
            $('#TraderEditForm').disableOnSubmit();
        });

        $(document).ready(function(){
            $('#TraderSmart1').on('click',function(){
                $('#CarPriceNet').prop('disabled',false);
                $('#CarPriceNetAbroad').prop('disabled',false);
                $('#VehicleInspection').prop('disabled',false);
                $('#Lease').prop('disabled',false);
                $('#SheetMetal').prop('disabled',false);
            });

            $('#TraderSmart0').on('click',function(){
                $('#CarPriceNet').prop('checked',false).prop('disabled',true);
                $('#CarPriceNetAbroad').prop('checked',false).prop('disabled',true);
                $('#VehicleInspection').prop('checked',false).prop('disabled',true);
                $('#Lease').prop('checked',false).prop('disabled',true);
                $('#SheetMetal').prop('checked',false).prop('disabled',true);
            });

            if($('#TraderSmart0').prop('checked')){
                $('#CarPriceNet').prop('checked',false).prop('disabled',true);
                $('#CarPriceNetAbroad').prop('checked',false).prop('disabled',true);
                $('#VehicleInspection').prop('checked',false).prop('disabled',true);
                $('#Lease').prop('checked',false).prop('disabled',true);
                $('#SheetMetal').prop('checked',false).prop('disabled',true);
            } else {
                $('#CarPriceNet').prop('disabled',false);
                $('#CarPriceNetAbroad').prop('disabled',false);
                $('#VehicleInspection').prop('disabled',false);
                $('#Lease').prop('disabled',false);
                $('#SheetMetal').prop('disabled',false);
            }

            $(document).on('click','#changePassword',function(){
                $('#trader_password').attr('type','password');
                var html = '<div><div class="col col-md-2"><input name="data[Trader][password]" maxLength="50" id="trader_password" class="form-control" type="password"/></div></div>';
                $('#inputPassword').html(html);
                return false;
            });

            $(document).on('click','#MembershipFree,#MembershipPremium',function(){
                var _t = $(this);
                var id = _t.attr('id');
                var mode = id == 'MembershipFree' ? '1' : '2'

                if(!confirm((mode == '1' ? '無料':'有料') + '会員に変更します。よろしいでしょうか？')){
                    return false;
                }

                $.ajax({
                    'url' : '/crm/Traders/change_membership',
                    'type' :'POST',
                    'dataType':'JSON',
                    'data' : {
                        'trader_id' : '1',
                        'smart' : mode
                    }
                }).done(function(json){
                    if(json.success){
                        _t.remove();
                        if( mode == '1'){
                            $('.effective_date').html('無料会員');
                            $('.smart_membership').html('<label class="col col-md-2 control-label">Smart利用可否</label><div class="col col-md-5"><label class="radio-inline" for="TraderSmart0"><input type="radio" name="data[Trader][smart]" id="TraderSmart0" value="0" checked="checked" /> 利用不可</label><label class="radio-inline" for="TraderSmart1"><input type="radio" name="data[Trader][smart]" id="TraderSmart1" value="1" /> 利用可</label></div>');
                        } else {
                            $('.smart_membership').remove();
                            $('.effective_date').html('有料会員' + '[適用日:'+ json.data.effective_date +']');
                        }
                    } else {
                        alert('更新に失敗しました。');
                    }
                }).fail(function(){
                    alert('更新に失敗しました。');
                    return false;
                });


                return false;
            });

            //親会社オートコンプリート
            $('#parent_trader_name').autocomplete({
                'source': '/crm/Traders/autoCompleteSmartParentTrader/1',
                'disabled' : false,
                'autoFocus' : true,
                'minLength' : 0,
                'select' : function(event,ui){
                    $('#parent_trader_name').val(ui.item.Trader.trader_name);
                    $('#parent_trader_cd').val(ui.item.Trader.trader_cd);
                    return false;
                }

            }).data('ui-autocomplete')._renderItem = function(ul,item){
                if(item.Trader.trader_name == ''){
                    $('#parent_trader_name').val('');
                    $('#parent_trader_cd').val('0');
                    return false;
                }else{
                    return $("<li>").append("<a>" + item.Trader.trader_name + "</a>").appendTo(ul);
                }
            };
        });

        //]]>
    </script>
@endsection
@section('content')
<div id="container">
    <div id="header"></div>
    <div id="content">
        <!-- app/View/Traders/edit.ctp -->

        <div class="col col-md-12">
            <blockquote>業者編集 </blockquote>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif
        <div id="traders_edit_page" class="col col-md-10 col-md-offset-1">
            <form action="add.html" class="well form-horizontal" id="TraderEditForm" method="post" accept-charset="utf-8">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>
                <fieldset>
                    <div class="form-group col col-md-12 required">
                        <label for="TraderTraderName" class="col col-md-2 control-label">業者名</label>
                        <div class="col col-md-5 required">
                            <input name="data[Trader][name]" class="form-control" maxLength="100" required="required" type="text"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderTraderKanaName" class="col col-md-2 control-label">ふりがな</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][phonetic]" class="form-control hiragana" maxLength="100" type="text"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderZipCode" class="col col-md-2 control-label">郵便番号</label>
                        <div class="col col-md-2">
                            <div class="col-md-8" style="padding: 0">
                                <input name="data[Trader][zip_code]" class="form-control" maxLength="8" onKeyUp="AjaxZip3.zip2addr(this, &#039;&#039;, &#039;data[Trader][pref_id]&#039;, &#039;data[Trader][address]&#039;);" type="tel"/>
                            </div>
                            <div class="col col-md-4 text-center" style="margin-top: 6px;">
                                <button type="button" class="btn btn-warning btn-xs" onclick="AjaxZip3.zip2addr('data[Customer][zip_code]', '', 'data[Customer][pref_id]', 'data[Customer][address]');">住所検索</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderPrefId" class="col col-md-2 control-label">都道府県</label>
                        <div class="col col-md-1 required">
                            <select name="data[Trader][pref_id]" class="form-control input-sm pref_name" id="TraderPrefId">
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
                    <div class="form-group col col-md-12">
                        <label for="TraderAddress" class="col col-md-2 control-label">住所</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][address]" class="form-control" maxLength="100" type="text"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderAddress" class="col col-md-2 control-label">建物名・部屋番号等</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][building_name]" class="form-control" maxLength="100" type="text"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderPhoneNumber" class="col col-md-2 control-label">電話番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][phone_number]" class="form-control" maxLength="13" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderFaxNumber" class="col col-md-2 control-label">FAX番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][fax_number]" class="form-control" maxLength="13" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderFaxNumberForSendPdf" class="col col-md-2 control-label">精算明細書送付先FAX番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][destination_fax]" class="form-control" maxLength="13" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderChargeName" class="col col-md-2 control-label">担当者名</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][contact_name]" class="form-control" maxLength="50" type="text" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderChargeKanaName" class="col col-md-2 control-label">担当者名 (ふりがな)</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][furigana_name]" class="form-control hiragana" maxLength="50" type="text" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderChargePhoneNumber" class="col col-md-2 control-label">担当者電話番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][furigana_phone]" class="form-control" maxLength="13" type="tel"/>
                        </div>
                    </div>

                    <div class="form-group col col-md-12">
                        <label for="TraderEmail" class="col col-md-2 control-label">メールアドレス</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][email]" class="form-control" maxLength="100" type="email" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderUrl" class="col col-md-2 control-label">WEBサイト</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][website]" type="url" class="form-control" maxLength="255"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="contractdate" class="col col-md-2 control-label">サービス利用申込日</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][service_date]" class="form-control" maxLength="10" id="contractdate" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="contractdate1" class="col col-md-2 control-label">古物商許可証確認日</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][curio_date]" class="form-control" maxLength="10" id="contractdate1" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">古物商許可証番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][permit_number]" class="form-control" maxLength="13" type="tel" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="contractdate2" class="col col-md-2 control-label">その他申込時必要書類確認日</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][document_confirmation_date]" class="form-control" maxLength="10" id="contractdate2" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">出張査定可否区分</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="shucho0">
                                    <input type="radio" name="data[Trader][assessment_classification]" id="shucho0" value="0" checked="checked" />
                                    不可</label>
                                <label class="radio-inline" for="shucho1">
                                    <input type="radio" name="data[Trader][assessment_classification]" id="shucho1" value="1" />
                                    可</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">出張査定レベル</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][assessment_level]" class="form-control" maxLength="13" type="tel" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">出張査定単価</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][assessment_price]" class="form-control" maxLength="13" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">出張査定回数</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][assessment_trip]" class="form-control" maxLength="13" type="tel" value="1"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark1]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderTerritory" class="col col-md-2 control-label">出張査定対応地域</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][assessment_area]" class="form-control" rows="3" cols="30" id="TraderTerritory"></textarea>
                        </div>
                        <div class="col col-md-5" style="padding: 15px;"><a href="./area.html" class="btn btn-success btn-small" target="_blank"><span class="glyphicon glyphicon-road"></span> 対応地域設定</a></div>
                    </div>
                    <!-- <div class="form-group col col-md-12">
                      <label class="control-label col col-md-2">対応都道府県</label>
                      <div class="col col-md-10">
                        <div class="row">
                          <div class="col col-md-1 form-control-static">北海道 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderHokkaido">
                            <input type="hidden" name="data[TraderPrefecture][pref1]" id="TraderHokkaido_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref1]"  value="1" id="TraderHokkaido"/>
                            北海道 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">東　北 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderAomori">
                            <input type="hidden" name="data[TraderPrefecture][pref2]" id="TraderAomori_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref2]"  value="2" id="TraderAomori"/>
                            青森県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderIwate">
                            <input type="hidden" name="data[TraderPrefecture][pref3]" id="TraderIwate_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref3]"  value="3" id="TraderIwate"/>
                            岩手県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderMiyagi">
                            <input type="hidden" name="data[TraderPrefecture][pref4]" id="TraderMiyagi_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref4]"  value="4" id="TraderMiyagi"/>
                            宮城県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderAkita">
                            <input type="hidden" name="data[TraderPrefecture][pref5]" id="TraderAkita_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref5]"  value="5" id="TraderAkita"/>
                            秋田県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderYamagata">
                            <input type="hidden" name="data[TraderPrefecture][pref6]" id="TraderYamagata_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref6]"  value="6" id="TraderYamagata"/>
                            山形県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderFukushima">
                            <input type="hidden" name="data[TraderPrefecture][pref7]" id="TraderFukushima_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref7]"  value="7" id="TraderFukushima"/>
                            福島県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">関　東 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderIbaraki">
                            <input type="hidden" name="data[TraderPrefecture][pref8]" id="TraderIbaraki_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref8]"  value="8" id="TraderIbaraki"/>
                            茨城県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderTochigi">
                            <input type="hidden" name="data[TraderPrefecture][pref9]" id="TraderTochigi_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref9]"  value="9" id="TraderTochigi"/>
                            栃木県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderGunma">
                            <input type="hidden" name="data[TraderPrefecture][pref10]" id="TraderGunma_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref10]"  value="10" id="TraderGunma"/>
                            群馬県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderSaitama">
                            <input type="hidden" name="data[TraderPrefecture][pref11]" id="TraderSaitama_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref11]"  value="11" id="TraderSaitama"/>
                            埼玉県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderChiba">
                            <input type="hidden" name="data[TraderPrefecture][pref12]" id="TraderChiba_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref12]"  value="12" id="TraderChiba"/>
                            千葉県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderTokyo">
                            <input type="hidden" name="data[TraderPrefecture][pref13]" id="TraderTokyo_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref13]"  value="13" id="TraderTokyo" checked="checked"/>
                            東京都 </label>
                          <label class="col col-md-2 form-control-static" for="TraderKanagawa">
                            <input type="hidden" name="data[TraderPrefecture][pref14]" id="TraderKanagawa_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref14]"  value="14" id="TraderKanagawa"/>
                            神奈川県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">北　陸 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderNigata">
                            <input type="hidden" name="data[TraderPrefecture][pref15]" id="TraderNigata_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref15]"  value="15" id="TraderNigata"/>
                            新潟県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderToyama">
                            <input type="hidden" name="data[TraderPrefecture][pref16]" id="TraderToyama_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref16]"  value="16" id="TraderToyama"/>
                            富山県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderIshikawa">
                            <input type="hidden" name="data[TraderPrefecture][pref17]" id="TraderIshikawa_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref17]"  value="17" id="TraderIshikawa"/>
                            石川県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderFukui">
                            <input type="hidden" name="data[TraderPrefecture][pref18]" id="TraderFukui_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref18]"  value="18" id="TraderFukui"/>
                            福井県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">中　部 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderYamanashi">
                            <input type="hidden" name="data[TraderPrefecture][pref19]" id="TraderYamanashi_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref19]"  value="19" id="TraderYamanashi"/>
                            山梨県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderNagano">
                            <input type="hidden" name="data[TraderPrefecture][pref20]" id="TraderNagano_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref20]"  value="20" id="TraderNagano"/>
                            長野県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderGifu">
                            <input type="hidden" name="data[TraderPrefecture][pref21]" id="TraderGifu_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref21]"  value="21" id="TraderGifu"/>
                            岐阜県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderShizuoka">
                            <input type="hidden" name="data[TraderPrefecture][pref22]" id="TraderShizuoka_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref22]"  value="22" id="TraderShizuoka"/>
                            静岡県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderAichi">
                            <input type="hidden" name="data[TraderPrefecture][pref23]" id="TraderAichi_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref23]"  value="23" id="TraderAichi"/>
                            愛知県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">関　西 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderMie">
                            <input type="hidden" name="data[TraderPrefecture][pref24]" id="TraderMie_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref24]"  value="24" id="TraderMie"/>
                            三重県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderShiga">
                            <input type="hidden" name="data[TraderPrefecture][pref25]" id="TraderShiga_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref25]"  value="25" id="TraderShiga"/>
                            滋賀県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderKyoto">
                            <input type="hidden" name="data[TraderPrefecture][pref26]" id="TraderKyoto_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref26]"  value="26" id="TraderKyoto"/>
                            京都府 </label>
                          <label class="col col-md-1 form-control-static" for="TraderOsaka">
                            <input type="hidden" name="data[TraderPrefecture][pref27]" id="TraderOsaka_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref27]"  value="27" id="TraderOsaka"/>
                            大阪府 </label>
                          <label class="col col-md-1 form-control-static" for="TraderHyogo">
                            <input type="hidden" name="data[TraderPrefecture][pref28]" id="TraderHyogo_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref28]"  value="28" id="TraderHyogo"/>
                            兵庫県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderNara">
                            <input type="hidden" name="data[TraderPrefecture][pref29]" id="TraderNara_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref29]"  value="29" id="TraderNara"/>
                            奈良県 </label>
                          <label class="col col-md-2 form-control-static" for="TraderWakayama">
                            <input type="hidden" name="data[TraderPrefecture][pref30]" id="TraderWakayama_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref30]"  value="30" id="TraderWakayama"/>
                            和歌山県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">中　国 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderTottori">
                            <input type="hidden" name="data[TraderPrefecture][pref31]" id="TraderTottori_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref31]"  value="31" id="TraderTottori"/>
                            鳥取県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderShimane">
                            <input type="hidden" name="data[TraderPrefecture][pref32]" id="TraderShimane_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref32]"  value="32" id="TraderShimane"/>
                            島根県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderOkayama">
                            <input type="hidden" name="data[TraderPrefecture][pref33]" id="TraderOkayama_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref33]"  value="33" id="TraderOkayama"/>
                            岡山県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderHiroshima">
                            <input type="hidden" name="data[TraderPrefecture][pref34]" id="TraderHiroshima_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref34]"  value="34" id="TraderHiroshima"/>
                            広島県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderYamaguchi">
                            <input type="hidden" name="data[TraderPrefecture][pref35]" id="TraderYamaguchi_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref35]"  value="35" id="TraderYamaguchi"/>
                            山口県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">四　国 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderTokushima">
                            <input type="hidden" name="data[TraderPrefecture][pref36]" id="TraderTokushima_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref36]"  value="36" id="TraderTokushima"/>
                            徳島県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderKagawa">
                            <input type="hidden" name="data[TraderPrefecture][pref37]" id="TraderKagawa_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref37]"  value="37" id="TraderKagawa"/>
                            香川県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderEhime">
                            <input type="hidden" name="data[TraderPrefecture][pref38]" id="TraderEhime_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref38]"  value="38" id="TraderEhime"/>
                            愛媛県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderKochi">
                            <input type="hidden" name="data[TraderPrefecture][pref39]" id="TraderKochi_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref39]"  value="39" id="TraderKochi"/>
                            高知県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">九　州 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderFukuoka">
                            <input type="hidden" name="data[TraderPrefecture][pref40]" id="TraderFukuoka_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref40]"  value="40" id="TraderFukuoka"/>
                            福岡県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderSaga">
                            <input type="hidden" name="data[TraderPrefecture][pref41]" id="TraderSaga_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref41]"  value="41" id="TraderSaga"/>
                            佐賀県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderNagasaki">
                            <input type="hidden" name="data[TraderPrefecture][pref42]" id="TraderNagasaki_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref42]"  value="42" id="TraderNagasaki"/>
                            長崎県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderKumamoto">
                            <input type="hidden" name="data[TraderPrefecture][pref43]" id="TraderKumamoto_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref43]"  value="43" id="TraderKumamoto"/>
                            熊本県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderOita">
                            <input type="hidden" name="data[TraderPrefecture][pref44]" id="TraderOita_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref44]"  value="44" id="TraderOita"/>
                            大分県 </label>
                          <label class="col col-md-1 form-control-static" for="TraderMiyazaki">
                            <input type="hidden" name="data[TraderPrefecture][pref45]" id="TraderMiyazaki_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref45]"  value="45" id="TraderMiyazaki"/>
                            宮崎県 </label>
                          <label class="col col-md-2 form-control-static" for="TraderKagoshima">
                            <input type="hidden" name="data[TraderPrefecture][pref46]" id="TraderKagoshima_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref46]"  value="46" id="TraderKagoshima"/>
                            鹿児島県 </label>
                        </div>
                        <div class="row">
                          <div class="col col-md-1 form-control-static">沖　縄 － </div>
                          <label class="col col-md-1 form-control-static" for="TraderOkinawa">
                            <input type="hidden" name="data[TraderPrefecture][pref47]" id="TraderOkinawa_" value="0"/>
                            <input type="checkbox" name="data[TraderPrefecture][pref47]"  value="47" id="TraderOkinawa"/>
                            沖縄県 </label>
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">持込査定可否区分</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="tokukomi0">
                                    <input type="radio" name="data[Trader][bring_assessment]" id="tokukomi0" value="0" checked="checked" />
                                    不可</label>
                                <label class="radio-inline" for="tokukomi1">
                                    <input type="radio" name="data[Trader][bring_assessment]" id="tokukomi1" value="1" />
                                    可</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">持込査定レベル</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][bought_level]" class="form-control" maxLength="13" type="tel" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">持込査定単価</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][bought_price]" class="form-control" maxLength="13" type="tel"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">持込査定回数</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][bought_frequency]" class="form-control" maxLength="13" type="tel" value="1"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark2]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">会員状況</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="Staff_stt0">
                                    <input type="radio" name="data[Trader][member_status]" id="Staff_stt0" value="0" checked="checked" />
                                    非会員</label>
                                <label class="radio-inline" for="Staff_stt1">
                                    <input type="radio" name="data[Trader][member_status]" id="Staff_stt1" value="1" />
                                    無料会員</label>
                                <label class="radio-inline" for="Staff_stt2">
                                    <input type="radio" name="data[Trader][member_status]" id="Staff_stt2" value="1" />
                                    有料会員</label>
                                <label class="radio-inline" for="Staff_stt3">
                                    <input type="radio" name="data[Trader][member_status]" id="Staff_stt3" value="1" />
                                    取引中止</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark3]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">入札可否区分</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="Exhi0">
                                    <input type="radio" name="data[Trader][bid_approval]" id="Exhi0" value="0" checked="checked" />
                                    不可</label>
                                <label class="radio-inline" for="Exhi1">
                                    <input type="radio" name="data[Trader][bid_approval]" id="Exhi1" value="1" />
                                    可</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12 smart_membership">
                        <label class="col col-md-2 control-label">サービス利用可否区分</label>
                        <div class="col col-md-5">
                            <label class="radio-inline" for="TraderSmart0">
                                <input type="radio" name="data[Trader][service_classification]" id="TraderSmart0" value="0" checked="checked" />
                                利用不可</label>
                            <label class="radio-inline" for="TraderSmart1">
                                <input type="radio" name="data[Trader][service_classification]" id="TraderSmart1" value="1" />
                                利用可</label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark4]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">出品新着メール可否区分</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="Exhibit0">
                                    <input type="radio" name="data[Trader][email_classification]" id="Exhibit0" value="0" checked="checked" />
                                    送信可</label>
                                <label class="radio-inline" for="Exhibit1">
                                    <input type="radio" name="data[Trader][email_classification]" id="Exhibit1" value="1" />
                                    送信不可</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderEmail" class="col col-md-2 control-label">出品新着メール受取アドレス</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][new_email]" class="form-control" maxLength="100" type="email" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">販促メルマガ可否区分</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="ExhibitR0">
                                    <input type="radio" name="data[Trader][promotion_email_classification]" id="ExhibitR0" value="0" checked="checked" />
                                    可</label>
                                <label class="radio-inline" for="ExhibitR1">
                                    <input type="radio" name="data[Trader][promotion_email_classification]" id="ExhibitR1" value="1" />
                                    不可</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderEmail" class="col col-md-2 control-label">販促メルマガ受取アドレス</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][promotion_email]" class="form-control" maxLength="100" type="email" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <div class="form-group col col-md-12">
                            <label class="col col-md-2 control-label">業務メール可否区分</label>
                            <div class="col col-md-5">
                                <label class="radio-inline" for="ExhibitRx0">
                                    <input type="radio" name="data[Trader][business_email_classification]" id="ExhibitRx0" value="0" checked="checked" />
                                    可</label>
                                <label class="radio-inline" for="ExhibitRx1">
                                    <input type="radio" name="data[Trader][business_email_classification]" id="ExhibitRx1" value="1" />
                                    不可</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderEmail" class="col col-md-2 control-label">業務メール受取アドレス</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][business_email]" class="form-control" maxLength="100" type="email" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="parent_trader_name" class="col col-md-2 control-label">親会社</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][parent_company]" class="form-control" id="parent_trader_name" value="" type="text"/>
                        </div>
                    </div>
                    <input type="hidden" name="data[Trader][parent_trader_cd]" class="form-control" id="parent_trader_cd"/>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label"> <a href="javascript:void(0);" class="btn btn-default btn-xs" id="changePassword">パスワード変更</a></label>
                        <div class="col col-md-10" id="inputPassword"> </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">主業態</label>
                        <div class="col col-md-7">
                            <label class="radio-inline" for="TraderMainBusiness1">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness1" value="1" />
                                解体業者</label>
                            <label class="radio-inline" for="TraderMainBusiness2">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness2" value="2" checked="checked" />
                                陸送業者</label>
                            <label class="radio-inline" for="TraderMainBusiness3">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness3" value="3" />
                                レッカー業者</label>
                            <label class="radio-inline" for="TraderMainBusiness4">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness4" value="4" />
                                輸出業者</label>
                            <label class="radio-inline" for="TraderMainBusiness5">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness5" value="5" />
                                中古車販売業者</label>
                            <label class="radio-inline" for="TraderMainBusiness6">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness6" value="6" />
                                整備業者</label>
                            <label class="radio-inline" for="TraderMainBusiness7">
                                <input type="radio" name="data[Trader][business_type]" id="TraderMainBusiness7" value="7" />
                                ガソリンスタンド</label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="control-label col col-md-2">業者区分</label>
                        <div class="col col-md-10">
                            <div class="row">
                                <div class="col col-md-1 form-control-static" for="TraderScrap">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderScrap_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderScrap"/>
                                    解体業者 </div>
                                <div class="col col-md-1 form-control-static" for="TraderTransporter">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderTrasnporter_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderTrasnporter"/>
                                    陸送業者 </div>
                                <div class="col col-md-2 form-control-static" for="TraderWrecker">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderWrecker_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderWrecker"/>
                                    レッカー業者 </div>
                                <div class="col col-md-1 form-control-static" for="TraderExporter">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderExporter_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderExporter"/>
                                    輸出業者 </div>
                                <div class="col col-md-2 form-control-static" for="TraderResaler">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderResaler_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderResaler"/>
                                    中古車販売業者 </div>
                                <div class="col col-md-1 form-control-static" for="TraderRepair">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderRepair_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderRepair"/>
                                    整備業者 </div>
                                <div class="col col-md-2 form-control-static" for="TraderGasStation">
                                    {{--<input type="hidden" name="data[Trader][category][]" id="TraderGasStation_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][category][]"  value="1" id="TraderGasStation"/>
                                    ガソリンスタンド </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="control-label col col-md-2">付加対応</label>
                            <div class="col col-md-10">
                            <div class="row">
                                <div class="col col-md-2 form-control-static" for="TraderCash">
                                    {{--<input type="hidden" name="data[Trader][additional_correspondence][]" id="TraderCash_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][additional_correspondence][]"  value="1" id="TraderCash"/>
                                    現金対応 </div>
                                <div class="col col-md-2 form-control-static" for="TraderOnSaturday">
                                    {{--<input type="hidden" name="data[Trader][additional_correspondence][]" id="TraderOnSaturday_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][additional_correspondence][]"  value="1" id="TraderOnSaturday"/>
                                    土曜日対応 </div>
                                <div class="col col-md-2 form-control-static" for="TraderOnSunday">
                                    {{--<input type="hidden" name="data[Trader][additional_correspondence][]" id="TraderOnSunday_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][additional_correspondence][]"  value="1" id="TraderOnSunday"/>
                                    日曜日対応 </div>
                                <div class="col col-md-2 form-control-static" for="TraderOnHoliday">
                                    {{--<input type="hidden" name="data[Trader][additional_correspondence][]" id="TraderOnHoliday_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][additional_correspondence][]"  value="1" id="TraderOnHoliday"/>
                                    祝日対応 </div>
                                <div class="col col-md-2 form-control-static" for="TraderCollectDocument">
                                    {{--<input type="hidden" name="data[Trader][additional_correspondence][]" id="TraderCollectDocument_" value="0"/>--}}
                                    <input type="checkbox" name="data[Trader][additional_correspondence][]"  value="1" id="TraderCollectDocument"/>
                                    書類回収代行 </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">引取依頼書送付方法</label>
                        <div class="col col-md-5">
                            <label class="radio-inline" for="TraderTradeRequestFax1">
                                <input type="radio" name="data[Trader][withdraw_method]" id="TraderTradeRequestFax1" value="1" checked="checked" />
                                FAX送信OK</label>
                            <label class="radio-inline" for="TraderTradeRequestFax0">
                                <input type="radio" name="data[Trader][withdraw_method]" id="TraderTradeRequestFax0" value="0" />
                                FAX以外希望</label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="control-label col col-md-2">取引回数</label>
                        <div class="col col-md-5">
                        <input name="data[Trader][number_transaction]" class="form-control" maxLength="13" type="tel" value="1"/>回
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">顧客クレーム回数</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][complaint_count]" class="form-control" maxLength="13" type="tel" value="1"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark5]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">業者側クレーム回数</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][claim_number]" class="form-control" maxLength="13" type="tel" value="1"/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
                            <textarea name="data[Trader][remark6]" class="form-control" rows="5" cols="30" id="">テキストテキストテキスト</textarea>
                        </div>
                    </div>

                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">支払締日</label>
                        <div class="col col-md-5">
                            <label class="radio-inline" for="TraderClosingDay1">
                                <input type="radio" name="data[Trader][payment_closing_date]" id="TraderClosingDay1" value="1" checked="checked" />
                                引取5日後 (都度払い)</label>
                            <label class="radio-inline" for="TraderClosingDay2">
                                <input type="radio" name="data[Trader][payment_closing_date]" id="TraderClosingDay2" value="2" />
                                半月締</label>
                            <label class="radio-inline" for="TraderClosingDay3">
                                <input type="radio" name="data[Trader][payment_closing_date]" id="TraderClosingDay3" value="3" />
                                月末締</label>
                            <label class="radio-inline" for="TraderClosingDay4">
                                <input type="radio" name="data[Trader][payment_closing_date]" id="TraderClosingDay4" value="4" />
                                翌月末締</label>
                            <label class="radio-inline" for="TraderClosingDay9">
                                <input type="radio" name="data[Trader][payment_closing_date]" id="TraderClosingDay9" value="9" />
                                その他</label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">得意先度 (総合評価)</label>
                        <div class="col col-md-5">
                            <label class="radio-inline" for="TraderTotalQuality1">
                                <input type="radio" name="data[Trader][customer_degree]" id="TraderTotalQuality1" value="1" />
                                C</label>
                            <label class="radio-inline" for="TraderTotalQuality2">
                                <input type="radio" name="data[Trader][customer_degree]" id="TraderTotalQuality2" value="2" />
                                B</label>
                            <label class="radio-inline" for="TraderTotalQuality3">
                                <input type="radio" name="data[Trader][customer_degree]" id="TraderTotalQuality3" value="3" checked="checked" />
                                A</label>
                            <label class="radio-inline" for="TraderTotalQuality4">
                                <input type="radio" name="data[Trader][customer_degree]" id="TraderTotalQuality4" value="4" />
                                S</label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">精算明細書送付方法</label>
                        <div class="col col-md-5">
                            <label class="radio-inline" for="TraderSendType1">
                                <input type="radio" name="data[Trader][method_statement]" id="TraderSendType1" value="1" />
                                メール</label>
                            <label class="radio-inline" for="TraderSendType2">
                                <input type="radio" name="data[Trader][method_statement]" id="TraderSendType2" value="2" checked="checked" />
                                FAX</label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderRemark" class="col col-md-2 control-label">備考</label>
                        <div class="col col-md-5">
              <textarea name="data[Trader][remark7]" class="form-control" rows="5" cols="30" id="TraderRemark">ナンバーカットと郵送以外は書類の預かり等してくれない車台番号がないと嫌がられる月末締め、翌月払い。＜真田＞</textarea>
                        </div>
                    </div>
                    <div class="form-group col col-md-4">
                        <label for="TraderCredit" class="col col-md-6 control-label" style="padding-right: 5px;">与信額</label>
                        <div class="col col-md-5 required" style="padding-left: 25px;">
                            <input name="data[Trader][credit]" class="form-control" maxlength="10" type="number" value="300000"/>
                        </div>
                        <div class="col col-md-1 form-control-static"> 円</div>
                    </div>
                    <div class="form-group col col-md-4">
                        <label for="TraderDeposit" class="col col-md-4 control-label" style="padding-right: 10px;">預り金</label>
                        <div class="col col-md-7 required" style="width: 198px; padding-left: 20px;">
                            <input name="data[Trader][deposite]" class="form-control" maxlength="10" type="number" value="0"/>
                        </div>
                        <div class="col col-md-1 form-control-static"> 円</div>
                    </div>
                    <div class="form-group col col-md-4">
                        <label class="col col-md-4 control-label">与信残高</label>
                        <div class="col col-md-4 form-control-static text-right">300,000 円</div>
                    </div>
                    <!--id39：与信額編集機能-->
                    <div class="form-group col col-md-12">
                        <label for="TraderDeficiencyAccount" class="col col-md-2 control-label">過不足金</label>
                        <div class="col col-md-2" style="width: 188px;">
                            <input name="data[Trader][excess_deficit money]" class="form-control" maxLength="10" type="number" value="0"/>
                        </div>
                        <div class="col col-md-1 form-control-static"> 円</div>
                    </div>
                    <div class="form-group col col-md-4">
                        <label for="TraderBankName" class="col col-md-6 control-label" style="padding-right: 5px;">銀行名</label>
                        <div class="col col-md-6" style="padding-left: 25px;">
                            <input name="data[Trader][bank_name]" class="form-control" maxLength="30" type="text" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-8">
                        <label for="TraderBankCode" class="col col-md-2 control-label">金融機関コード</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][bank_code]" class="form-control" maxLength="4" type="tel" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-4">
                        <label for="TraderBranchName" class="col col-md-6 control-label" style="padding-right: 5px;">支店名</label>
                        <div class="col col-md-6" style="padding-left: 25px;">
                            <input name="data[Trader][branch_name]" class="form-control" maxLength="30" type="text" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-8">
                        <label for="TraderBranchNumber" class="col col-md-2 control-label">支店番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][branch_code]" class="form-control" maxLength="3" type="tel" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">口座種別</label>
                        <div class="col col-md-5">
                            <input type="hidden" name="data[Trader][account_type]" id="trader_account_classification_" value=""/>
                            <label class="radio-inline" for="TraderAccountClassification1">
                                <input type="radio" name="data[Trader][account_type]" id="TraderAccountClassification1" value="1"  checked="checked"/>
                                普通 </label>
                            <label class="radio-inline" for="TraderAccountClassification2">
                                <input type="radio" name="data[Trader][account_type]" id="TraderAccountClassification2" value="2" />
                                当座 </label>
                            <label class="radio-inline" for="TraderAccountClassification4">
                                <input type="radio" name="data[Trader][account_type]" id="TraderAccountClassification4" value="4" />
                                貯蓄 </label>
                            <label class="radio-inline" for="TraderAccountClassification9">
                                <input type="radio" name="data[Trader][account_type]" id="TraderAccountClassification9" value="9" />
                                その他 </label>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderAccountNumber" class="col col-md-2 control-label">口座番号</label>
                        <div class="col col-md-2">
                            <input name="data[Trader][account_number]" class="form-control" maxLength="7" type="tel" value=""/>
                        </div>
                    </div>
                    <div class="form-group col col-md-12">
                        <label for="TraderNomineeName" class="col col-md-2 control-label">口座名義人 (カタカナ)</label>
                        <div class="col col-md-5">
                            <input name="data[Trader][account_holder]" class="form-control katakana" maxLength="100" type="text" value=""/>
                        </div>
                    </div>
                    <div class="col col-md-10 col-md-offset-2">
                        <input  class="btn btn-default" id="submit" type="submit" value="変更"/>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
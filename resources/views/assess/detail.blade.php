@extends('layouts.master')
@section('title')
(10)社内システム:査定員編集
@endsection
@section('script')
<script type="text/javascript" src="{{ url('js/back_office/assess/detail.js')}}"></script>
@endsection
@section('content')
<script type="text/javascript" src="{{ url('js/jquery.multiselect.js')}}"></script>
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!-- app/View/photographers/edit.ctp -->  

    <div class="col col-md-12">
      <blockquote>査定員編集</blockquote>
    </div>
    <div id="photographers_edit_page" class="col col-md-10 col-md-offset-1">
      @if(Session::has('flash_messages'))
            <div class="alert alert-{!! Session::get('results') !!}">
                {!! Session::get('flash_messages') !!}
            </div>
        @endif
      <form action="/assess/edit/{{ $assess->id }}" class="well form-horizontal" id="photographerAddForm" method="post" accept-charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div style="display:none;">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="POST"/> 
        </div>
        <input type="hidden" name="data[photographer][id]" id="photographer_cd" value="{{ $assess->id }}"/>
        <fieldset>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">PW設定</label>
            <div class="col col-md-2">
              <input name="data[photographer][pw]" class="form-control" maxLength="" type="tel" value="{{ $assess->pw }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="contractdate" class="col col-md-2 control-label">契約年月日</label>
            <div class="col col-md-2">
              <input name="data[photographer][contract_date]" class="form-control" maxLength="10" id="contractdate" type="tel" value="{{ $contract_date }}"/>
            </div>
          </div>
          <div class="form-group col col-md-4">
            <label for="photographerFamilyName" class="col col-md-6 control-label" style="padding-right: 5px;">氏名　(<font color="red">*</font>)</label>
            <div class="col col-md-6 required" style="padding-left: 25px;">
              <input name="data[photographer][family_name]" class="form-control" maxLength="20" style="width: 218px;" id="family_name" type="text" value="{{ $family_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-8">
           
            <div class="col col-md-3 required">
              <input name="data[photographer][first_name]" class="form-control" maxLength="20" type="text" id="first_name" value="{{ $first_name }}"/>
            </div>
            <div class="col col-md-7 col-md-offset-2">
                <div class="popup"><button type="button" class="btn btn-success btn-small"><span class="glyphicon glyphicon-road"></span> 対応地域設定</button>  
                </div>         
            </div>
          </div>
          
          <div class="form-group col col-md-4">
            <label for="photographerFamilyKanaName" class="col col-md-6 control-label" style="padding-right: 5px;">ふりがな</label>
            <div class="col col-md-6" style="padding-left: 25px;">
              <input name="data[photographer][family_kana_name]" class="form-control hiragana" maxLength="20" style="width: 218px;"  type="text" value="{{ $kana_family_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-8">
            <div class="col col-md-3">
              <input name="data[photographer][first_kana_name]" class="form-control hiragana" maxLength="20" type="text" value="{{ $kana_first_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderZipCode" class="col col-md-2 control-label">郵便番号</label>
            <div class="col col-md-2">
              <div class="col-md-8" style="padding: 0">
                  <input name="data[photographer][zip_code]" class="form-control ime-disabled" maxLength="8" type="tel" value="{{ $assess->zip_code }}"/>
              </div>
              <div class="col col-md-4 text-center" style="margin-top: 6px;">
                      <button type="button" class="btn btn-warning btn-xs" onclick="AjaxZip3.zip2addr('data[photographer][zip_code]', '', 'data[photographer][pref_id]', 'data[photographer][address1]');">住所検索</button>
                    </div>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerPrefId" class="col col-md-2 control-label">都道府県</label>
            <div class="col col-md-2">
              <select name="data[photographer][pref_id]" class="form-control pref_name">
                <option value="">----------</option>
                  @foreach($list_zone as $key_zone => $zone)
                   <optgroup label="{{ $zone->name }}">
                    @foreach($list_erea as $key_ereas => $ereas)
                      @if($key_ereas == $key_zone)
                        @foreach($ereas as $erea)
                          @if($erea->id == $assess->erea_id)
                            <option value="{{ $erea->id }}" selected="selected">{{ $erea->name }}</option>
                          @else
                            <option value="{{ $erea->id }}">{{ $erea->name }}</option>
                          @endif
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
              <input name="data[photographer][address1]" class="form-control" maxLength="100" type="text" value="{{ $assess->address1 }}"/>
            </div>
          </div>
        <div class="form-group col col-md-12">
            <label for="TraderAddress" class="col col-md-2 control-label">建物名・部屋番号等</label>
            <div class="col col-md-5">
              <input name="data[photographer][building_name1]" class="form-control" maxLength="100" type="text" value="{{ $assess->building_name1 }}"/>
            </div>
          </div>

          <div class="form-group col col-md-12">
            <label for="photographerAddress1" class="col col-md-2 control-label">市区町村</label>
            <div class="col col-md-5">
              <input name="data[photographer][address2]" class="form-control" maxLength="10" type="text" value="{{ $assess->address2 }}"/>
            </div>
          </div>
          
          <div class="form-group col col-md-12">
            <label for="photographerAddress2" class="col col-md-2 control-label">町域・番地</label>
            <div class="col col-md-5">
              <input name="data[photographer][building_name2]" class="form-control" maxLength="20" type="text" value="{{ $assess->building_name2 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerAddress3" class="col col-md-2 control-label">建物名</label>
            <div class="col col-md-5">
              <input name="data[photographer][municipality]" class="form-control" maxLength="30" type="text" value="{{ $assess->municipality }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerPhoneNumber1" class="col col-md-2 control-label">電話番号1</label>
            <div class="col col-md-2">
              <input name="data[photographer][phone_number1]" class="form-control ime-disabled" maxLength="13" type="tel" value="{{ $assess->phone1 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerPhoneNumber2" class="col col-md-2 control-label">電話番号2</label>
            <div class="col col-md-2">
              <input name="data[photographer][phone_number2]" class="form-control ime-disabled" maxLength="13" type="tel" value="{{ $assess->phone2 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerFaxNumber" class="col col-md-2 control-label">FAX番号</label>
            <div class="col col-md-2">
              <input name="data[photographer][fax_number]" class="form-control ime-disabled" maxLength="13" type="tel" value="{{ $assess->fax }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerEmail1" class="col col-md-2 control-label">メールアドレス1</label>
            <div class="col col-md-5">
              <input name="data[photographer][email1]" class="form-control ime-disabled" maxLength="100" type="email" value="{{ $assess->email1 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerEmail2" class="col col-md-2 control-label">メールアドレス2</label>
            <div class="col col-md-5">
              <input name="data[photographer][email2]" class="form-control ime-disabled" maxLength="100" type="email" value="{{ $assess->email2 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">報告書送付方法</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="ReportMethod0">
                @if($assess->report_delivery_method == 0)
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod0" value="0" checked="checked"/>
                @else
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod0" value="0"/>
                @endif
                送信不可</label>
              <label class="radio-inline" for="ReportMethod1">
                @if($assess->report_delivery_method == 1)
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod1" value="1" checked="checked" />
                @else
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod1" value="1" />
                @endif
                メール</label>
              <label class="radio-inline" for="ReportMethod2">
                @if($assess->report_delivery_method == 2)
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod2" value="2" checked="checked"/>
                @else
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod2" value="2" />
                @endif
                FAX</label>
              <label class="radio-inline" for="ReportMethod3">
                 @if($assess->report_delivery_method == 3)
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod3" value="3" checked="checked"/>
                 @else
                <input type="radio" name="data[photographer][report_method]" id="ReportMethod3" value="3" />
                @endif
                郵送</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">性別</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="Gender1">
                @if($assess->gender == 0)
                <input type="radio" name="data[photographer][gender]" id="Gender1" value="0" checked="checked" />
                @else
                <input type="radio" name="data[photographer][gender]" id="Gender1" value="0" />
                @endif
                男性</label>
              <label class="radio-inline" for="Gender2">
                @if($assess->gender == 1)
                <input type="radio" name="data[photographer][gender]" id="Gender2" value="1" checked="checked" />
                @else
                <input type="radio" name="data[photographer][gender]" id="Gender1" value="1" />
                @endif
                女性</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">査定レベル</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="rank1">
                @if($assess->level == 1)
                <input type="radio" name="data[photographer][rank]" id="rank1" value="1" checked="checked" />
                @else
                <input type="radio" name="data[photographer][rank]" id="rank1" value="1"/>
                @endif
                S</label>
              <label class="radio-inline" for="rank2">
                @if($assess->level == 2)
                <input type="radio" name="data[photographer][rank]" id="rank2" value="2" checked="checked" />
                @else
                <input type="radio" name="data[photographer][rank]" id="rank2" value="2"/>
                @endif
                A</label>
              <label class="radio-inline" for="rank3">
                @if($assess->level == 3)
                <input type="radio" name="data[photographer][rank]" id="rank3" value="3" checked="checked" />
                @else
                <input type="radio" name="data[photographer][rank]" id="rank3" value="3"/>
                @endif
                B</label>
              <label class="radio-inline" for="rank4">
                @if($assess->level == 4)
                <input type="radio" name="data[photographer][rank]" id="rank4" value="4" checked="checked" />
                @else
                <input type="radio" name="data[photographer][rank]" id="rank4" value="4"/>
                @endif
                C</label>
              <label class="radio-inline" for="rank5">
                @if($assess->level == 5)
                <input type="radio" name="data[photographer][rank]" id="rank5" value="5" checked="checked" />
                @else
                <input type="radio" name="data[photographer][rank]" id="rank5" value="5"/>
                @endif
                NG</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定単価</label>
            <div class="col col-md-2">
              <input name="data[photographer][price]" class="form-control" maxLength="" type="tel" value="{{ $assess->price }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定回数</label>
            <div class="col col-md-2">
              <input name="data[photographer][assessment_frequency]" class="form-control" maxLength="" type="tel" value="{{ $assess->assessment_frequency }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">クレーム回数</label>
            <div class="col col-md-2">
              <input name="data[photographer][number_complain]" class="form-control" maxLength="" type="tel" value="{{ $assess->number_complain }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定状況備考</label>
            <div class="col col-md-5">
              <input name="data[photographer][remark]" class="form-control" maxLength="100" type="text" value="{{ $assess->remark }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerBank" class="col col-md-2 control-label">銀行名</label>
            <div class="col col-md-2">
              <input name="data[photographer][bank]" class="form-control input-sm" maxLength="30" type="tel" value="{{ $assess->bank_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerBankCode" class="col col-md-2 control-label">銀行コード</label>
            <div class="col col-md-2">
              <input name="data[photographer][bank_code]" class="form-control" maxLength="4" type="tel" value="{{ $assess->bank_code }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerBranchName" class="col col-md-2 control-label">支店名</label>
            <div class="col col-md-2">
              <input name="data[photographer][branch_name]" class="form-control input-sm" maxLength="30" type="tel" value="{{ $assess->branch_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerBranchNumber" class="col col-md-2 control-label">支店番号</label>
            <div class="col col-md-2">
              <input name="data[photographer][branch_number]" class="form-control" maxLength="3" type="tel" value="{{ $assess->branch_number }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">口座種別</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="AccountClassification1">
                @if($assess->account_type == 1)
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification1" value="1" checked="checked" />
                @else
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification1" value="1"/>
                @endif
                普通 </label>
              <label class="radio-inline" for="AccountClassification2">
                @if($assess->account_type == 2)
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification2" value="2" checked="checked"/>
                @else
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification2" value="2" />
                @endif
                当座 </label>
              <label class="radio-inline" for="AccountClassification4">
                @if($assess->account_type == 4)
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification4" value="4" checked="checked"/>
                @else
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification4" value="4" />
                @endif
                貯蓄 </label>
              <label class="radio-inline" for="AccountClassification9">
                @if($assess->account_type == 9)
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification9" value="9" checked="checked"/>
                @else
                <input type="radio" name="data[photographer][account_classification]" id="AccountClassification9" value="9" />
                @endif
                その他 </label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerAccountNumber" class="col col-md-2 control-label">口座番号</label>
            <div class="col col-md-2">
              <input name="data[photographer][account_number]" class="form-control" maxLength="7" type="tel" value="{{ $assess->account_number }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="photographerNomineeName" class="col col-md-2 control-label">口座名義人 (カナ)</label>
            <div class="col col-md-2">
              <input name="data[photographer][nominee_name]" class="form-control input-sm katakana" type="tel" value="{{ $assess->account_holder }}"/>
            </div>
          </div>

          <div class="form-group col col-md-12">
            <label for="expirationdate" class="col col-md-2 control-label">契約満了日</label>
            <div class="col col-md-2">
              <input name="data[photographer][expiration_date]" class="form-control" maxLength="10" id="expirationdate" type="tel" value="{{ $expire_date }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">その他・備考</label>
            <div class="col col-md-5">
              <input name="data[photographer][other_remark]" class="form-control" maxLength="100" type="text" value="{{ $assess->other_remark }}"/>
            </div>
          </div>
          <input type="hidden" value="{{ $assess->corresponding_erea }}" id="corresponding_erea">
          <div class="col col-md-10 col-md-offset-2">
            <input  class="btn btn-default" id="submit" type="submit" value="変更"/>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <script>
$(function() {
  $(".popup").click(function(e)
  {
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    var first_name = $("#first_name").val();
    var family_name = $("#family_name").val();
    var corresponding_erea = $("#corresponding_erea").val();
    if(first_name == '' || family_name == '')
    {
      e.preventDefault();
    }
    else
    {
      var current_token = '{{csrf_token()}}';
      $.ajax({
          url: '/assess/getinfo',
          dataType: 'text',
          type: 'post',
          contentType: 'application/x-www-form-urlencoded',
          data: {first_name: first_name, family_name: family_name, corresponding_erea:corresponding_erea,fuel_csrf_token: current_token},
                success: function( data, textStatus, jQxhr ){
                    window.open('/assess/area', '_blank');
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
      });
    }
  })
})
</script>
<script>
$(function() {
  $("#photographerAddForm").validate({
    rules: {
      "data[photographer][family_name]": "required",
      "data[photographer][contract_date]":{
        required: true,
        date: true
      },
      "data[photographer][corresponding_erea]": "required",
      "data[photographer][pw]": "required",
      "data[photographer][family_kana_name]": "required",
      "data[photographer][first_kana_name]": "required",
      "data[photographer][zip_code]": "required",
      "data[photographer][pref_id]": "required",
      "data[photographer][address1]": "required",
      "data[photographer][phone_number1]": "required",
      "data[photographer][phone_number2]": "required",
      "data[photographer][fax_number]": "required",
      "data[photographer][email1]": {
        required: true,
        email: true
      },
      "data[photographer][email2]": "email",
      "data[photographer][report_method]": "required",
      "data[photographer][gender]": "required",
      "data[photographer][rank]": "required",
      "data[photographer][price]": "required",
      "data[photographer][assessment_frequency]": "required",
      "data[photographer][bank]": "required",
      "data[photographer][bank_code]": "required",
      "data[photographer][branch_name]": "required",
      "data[photographer][branch_number]": "required",
      "data[photographer][account_number]": "required",
      "data[photographer][nominee_name]": "required",
      "data[photographer][expiration_date]": {
        required: true,
        date: true
      }    
    },
    messages: {
      "data[photographer][id]": "Không được để trống ID",
      "data[photographer][family_name]": "Không được để trống Tên"
    }
  })
})
</script>
@endsection
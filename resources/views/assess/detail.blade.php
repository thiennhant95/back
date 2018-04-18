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
    <!-- app/View/Photographers/edit.ctp -->  

    <div class="col col-md-12">
      <blockquote>査定員編集</blockquote>
    </div>
    <div id="photographers_edit_page" class="col col-md-10 col-md-offset-1">
      @if(Session::has('flash_messages'))
            <div class="alert alert-{!! Session::get('results') !!}">
                {!! Session::get('flash_messages') !!}
            </div>
        @endif
      <form action="/assess/edit/{{ $assess->id }}" class="well form-horizontal" id="PhotographerAddForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="POST"/> 
        </div>
        <input type="hidden" name="data[Photographer][id]" id="photographer_cd" value="{{ $assess->id }}"/>
        <fieldset>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">PW設定</label>
            <div class="col col-md-2">
              <input name="data[Photographer][pw]" class="form-control" maxLength="" type="tel" value="{{ $assess->pw }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="contractdate" class="col col-md-2 control-label">契約年月日</label>
            <div class="col col-md-2">
              <input name="data[Photographer][contract_date]" class="form-control" maxLength="10" id="contractdate" type="tel" value="{{ $contract_date }}"/>
            </div>
          </div>
          <div class="form-group col col-md-4">
            <label for="PhotographerFamilyName" class="col col-md-6 control-label" style="padding-right: 5px;">氏名　(<font color="red">*</font>)</label>
            <div class="col col-md-6 required" style="padding-left: 25px;">
              <input name="data[Photographer][family_name]" class="form-control" maxLength="20" style="width: 218px;" type="text" value="{{ $family_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-8">
           
            <div class="col col-md-3 required">
              <input name="data[Photographer][first_name]" class="form-control" maxLength="20" type="text" value="{{ $first_name }}"/>
            </div>
            <div class="col col-md-7 col-md-offset-2">
                <div class="popup"><a href="#" class="btn btn-success btn-small"><span class="glyphicon glyphicon-road"></span> 対応地域設定</a>
                      <div class="selectmulti" id="myPopup">
                        <select name="data[Photographer][corresponding_erea][]" multiple="multiple" class="4colactive">
                          <optgroup label="北海道・東北地方">
                          <option value="北海道" @if(in_array("北海道",$corresponding_erea)) {!! "selected" !!} @endif>北海道</option>
                          <option value="青森県" @if(in_array("青森県",$corresponding_erea)) {!! "selected" !!} @endif>青森県</option>
                          <option value="岩手県" @if(in_array("岩手県",$corresponding_erea)) {!! "selected" !!} @endif>岩手県</option>
                          <option value="秋田県" @if(in_array("秋田県",$corresponding_erea)) {!! "selected" !!} @endif>秋田県</option>
                          <option value="宮城県" @if(in_array("宮城県",$corresponding_erea)) {!! "selected" !!} @endif>宮城県</option>
                          <option value="山形県" @if(in_array("山形県",$corresponding_erea)) {!! "selected" !!} @endif>山形県</option>
                          <option value="福島県" @if(in_array("福島県",$corresponding_erea)) {!! "selected" !!} @endif>福島県</option>
                          </optgroup>
                          <optgroup label="関東地方">
                          <option value="東京都" @if(in_array("東京都",$corresponding_erea)) {!! "selected" !!} @endif>東京都</option>
                          <option value="神奈川県" @if(in_array("神奈川県",$corresponding_erea)) {!! "selected" !!} @endif>神奈川県</option>
                          <option value="埼玉県" @if(in_array("埼玉県",$corresponding_erea)) {!! "selected" !!} @endif>埼玉県</option>
                          <option value="千葉県" @if(in_array("千葉県",$corresponding_erea)) {!! "selected" !!} @endif>千葉県</option>
                          <option value="茨城県" @if(in_array("茨城県",$corresponding_erea)) {!! "selected" !!} @endif>茨城県</option>
                          <option value="栃木県" @if(in_array("栃木県",$corresponding_erea)) {!! "selected" !!} @endif>栃木県</option>
                          <option value="群馬県" @if(in_array("群馬県",$corresponding_erea)) {!! "selected" !!} @endif>群馬県</option>
                          </optgroup>
                          <optgroup label="甲信越地方">
                          <option value="山梨県" @if(in_array("山梨県",$corresponding_erea)) {!! "selected" !!} @endif>山梨県</option>
                          <option value="長野県" @if(in_array("長野県",$corresponding_erea)) {!! "selected" !!} @endif>長野県</option>
                          <option value="新潟県" @if(in_array("新潟県",$corresponding_erea)) {!! "selected" !!} @endif>新潟県</option>
                          </optgroup>
                          <optgroup label="東海地方">
                          <option value="静岡県" @if(in_array("静岡県",$corresponding_erea)) {!! "selected" !!} @endif>静岡県</option>
                          <option value="愛知県" @if(in_array("愛知県",$corresponding_erea)) {!! "selected" !!} @endif>愛知県</option>
                          <option value="岐阜県" @if(in_array("岐阜県",$corresponding_erea)) {!! "selected" !!} @endif>岐阜県</option>
                          <option value="三重県" @if(in_array("三重県",$corresponding_erea)) {!! "selected" !!} @endif>三重県</option>
                          </optgroup>
                          <optgroup label="北陸地方">
                          <option value="富山県" @if(in_array("富山県",$corresponding_erea)) {!! "selected" !!} @endif>富山県</option>
                          <option value="石川県" @if(in_array("石川県",$corresponding_erea)) {!! "selected" !!} @endif>石川県</option>
                          <option value="福井県" @if(in_array("福井県",$corresponding_erea)) {!! "selected" !!} @endif>福井県</option>
                          </optgroup>
                          <optgroup label="近畿地方">
                          <option value="大阪府" @if(in_array("大阪府",$corresponding_erea)) {!! "selected" !!} @endif>大阪府</option>
                          <option value="京都府" @if(in_array("京都府",$corresponding_erea)) {!! "selected" !!} @endif>京都府</option>
                          <option value="奈良県" @if(in_array("奈良県",$corresponding_erea)) {!! "selected" !!} @endif>奈良県</option>
                          <option value="滋賀県" @if(in_array("滋賀県",$corresponding_erea)) {!! "selected" !!} @endif>滋賀県</option>
                          <option value="和歌山県" @if(in_array("和歌山県",$corresponding_erea)) {!! "selected" !!} @endif>和歌山県</option>
                          <option value="兵庫県" @if(in_array("兵庫県",$corresponding_erea)) {!! "selected" !!} @endif>兵庫県</option>
                          </optgroup>
                          <optgroup label="中国地方">
                          <option value="岡山県" @if(in_array("岡山県",$corresponding_erea)) {!! "selected" !!} @endif>岡山県</option>
                          <option value="広島県" @if(in_array("広島県",$corresponding_erea)) {!! "selected" !!} @endif>広島県</option>
                          <option value="鳥取県" @if(in_array("鳥取県",$corresponding_erea)) {!! "selected" !!} @endif>鳥取県</option>
                          <option value="島根県" @if(in_array("島根県",$corresponding_erea)) {!! "selected" !!} @endif>島根県</option>
                          <option value="山口県" @if(in_array("山口県",$corresponding_erea)) {!! "selected" !!} @endif>山口県</option>
                          </optgroup>
                          <optgroup label="四国地方">
                          <option value="香川県" @if(in_array("香川県",$corresponding_erea)) {!! "selected" !!} @endif>香川県</option>
                          <option value="徳島県" @if(in_array("徳島県",$corresponding_erea)) {!! "selected" !!} @endif>徳島県</option>
                          <option value="愛媛県" @if(in_array("愛媛県",$corresponding_erea)) {!! "selected" !!} @endif>愛媛県</option>
                          <option value="高知県" @if(in_array("高知県",$corresponding_erea)) {!! "selected" !!} @endif>高知県</option>
                          </optgroup>
                          <optgroup label="九州・沖縄地方">
                          <option value="福岡県" @if(in_array("福岡県",$corresponding_erea)) {!! "selected" !!} @endif>福岡県</option>
                          <option value="佐賀県" @if(in_array("佐賀県",$corresponding_erea)) {!! "selected" !!} @endif>佐賀県</option>
                          <option value="長崎県" @if(in_array("長崎県",$corresponding_erea)) {!! "selected" !!} @endif>長崎県</option>
                          <option value="大分県" @if(in_array("大分県",$corresponding_erea)) {!! "selected" !!} @endif>大分県</option>
                          <option value="熊本県" @if(in_array("熊本県",$corresponding_erea)) {!! "selected" !!} @endif>熊本県</option>
                          <option value="宮崎県" @if(in_array("宮崎県",$corresponding_erea)) {!! "selected" !!} @endif>宮崎県</option>
                          <option value="鹿児島県" @if(in_array("鹿児島県",$corresponding_erea)) {!! "selected" !!} @endif>鹿児島県</option>
                          <option value="沖縄県" @if(in_array("沖縄県",$corresponding_erea)) {!! "selected" !!} @endif>沖縄県</option>
                          </optgroup>
                        </select>
                    </div>
                </div> 
                
                
            </div>
          </div>
          
          
          
          <div class="form-group col col-md-4">
            <label for="PhotographerFamilyKanaName" class="col col-md-6 control-label" style="padding-right: 5px;">ふりがな</label>
            <div class="col col-md-6" style="padding-left: 25px;">
              <input name="data[Photographer][family_kana_name]" class="form-control hiragana" maxLength="20" style="width: 218px;" type="text" value="{{ $kana_family_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-8">
            <div class="col col-md-3">
              <input name="data[Photographer][first_kana_name]" class="form-control hiragana" maxLength="20" type="text" value="{{ $kana_first_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderZipCode" class="col col-md-2 control-label">郵便番号</label>
            <div class="col col-md-2">
              <div class="col-md-8" style="padding: 0">
                  <input name="data[Photographer][zip_code]" class="form-control ime-disabled" maxLength="8" onKeyUp="AjaxZip3.zip2addr(this, &#039;&#039;, &#039;data[Photographer][pref_id]&#039;, &#039;data[Photographer][address]&#039;);" type="tel" value="{{ $assess->zip_code }}"/>
              </div>
              <div class="col col-md-4 text-center" style="margin-top: 6px;">
                      <button type="button" class="btn btn-warning btn-xs" onclick="AjaxZip3.zip2addr('data[Photographer][zip_code]', '', 'data[Photographer][pref_id]', 'data[Photographer][address]');">住所検索</button>
                    </div>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPrefId" class="col col-md-2 control-label">都道府県</label>
            <div class="col col-md-2">
              <select name="data[Photographer][pref_id]" class="form-control pref_name">
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
              <input name="data[Photographer][address1]" class="form-control" maxLength="100" type="text" value="{{ $assess->address1 }}"/>
            </div>
          </div>
        <div class="form-group col col-md-12">
            <label for="TraderAddress" class="col col-md-2 control-label">建物名・部屋番号等</label>
            <div class="col col-md-5">
              <input name="data[Photographer][building_name1]" class="form-control" maxLength="100" type="text" value="{{ $assess->building_name1 }}"/>
            </div>
          </div>

          <div class="form-group col col-md-12">
            <label for="PhotographerAddress1" class="col col-md-2 control-label">市区町村</label>
            <div class="col col-md-5">
              <input name="data[Photographer][address2]" class="form-control" maxLength="10" type="text" value="{{ $assess->address2 }}"/>
            </div>
          </div>
          
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress2" class="col col-md-2 control-label">町域・番地</label>
            <div class="col col-md-5">
              <input name="data[Photographer][building_name2]" class="form-control" maxLength="20" type="text" value="{{ $assess->building_name2 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress3" class="col col-md-2 control-label">建物名</label>
            <div class="col col-md-5">
              <input name="data[Photographer][municipality]" class="form-control" maxLength="30" type="text" value="{{ $assess->municipality }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPhoneNumber1" class="col col-md-2 control-label">電話番号1</label>
            <div class="col col-md-2">
              <input name="data[Photographer][phone_number1]" class="form-control ime-disabled" maxLength="13" type="tel" value="{{ $assess->phone1 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPhoneNumber2" class="col col-md-2 control-label">電話番号2</label>
            <div class="col col-md-2">
              <input name="data[Photographer][phone_number2]" class="form-control ime-disabled" maxLength="13" type="tel" value="{{ $assess->phone2 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerFaxNumber" class="col col-md-2 control-label">FAX番号</label>
            <div class="col col-md-2">
              <input name="data[Photographer][fax_number]" class="form-control ime-disabled" maxLength="13" type="tel" value="{{ $assess->fax }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerEmail1" class="col col-md-2 control-label">メールアドレス1</label>
            <div class="col col-md-5">
              <input name="data[Photographer][email1]" class="form-control ime-disabled" maxLength="100" type="email" value="{{ $assess->email1 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerEmail2" class="col col-md-2 control-label">メールアドレス2</label>
            <div class="col col-md-5">
              <input name="data[Photographer][email2]" class="form-control ime-disabled" maxLength="100" type="email" value="{{ $assess->email2 }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">報告書送付方法</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="ReportMethod0">
                @if($assess->report_delivery_method == 0)
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod0" value="0" checked="checked"/>
                @else
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod0" value="0"/>
                @endif
                送信不可</label>
              <label class="radio-inline" for="ReportMethod1">
                @if($assess->report_delivery_method == 1)
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod1" value="1" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod1" value="1" />
                @endif
                メール</label>
              <label class="radio-inline" for="ReportMethod2">
                @if($assess->report_delivery_method == 2)
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod2" value="2" checked="checked"/>
                @else
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod2" value="2" />
                @endif
                FAX</label>
              <label class="radio-inline" for="ReportMethod3">
                 @if($assess->report_delivery_method == 3)
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod3" value="3" checked="checked"/>
                 @else
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod3" value="3" />
                @endif
                郵送</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">性別</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="Gender1">
                @if($assess->gender == 0)
                <input type="radio" name="data[Photographer][gender]" id="Gender1" value="0" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][gender]" id="Gender1" value="0" />
                @endif
                男性</label>
              <label class="radio-inline" for="Gender2">
                @if($assess->gender == 1)
                <input type="radio" name="data[Photographer][gender]" id="Gender2" value="1" />
                @else
                <input type="radio" name="data[Photographer][gender]" id="Gender1" value="1" />
                @endif
                女性</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">査定レベル</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="rank1">
                @if($assess->level == 1)
                <input type="radio" name="data[Photographer][rank]" id="rank1" value="1" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][rank]" id="rank1" value="1"/>
                @endif
                S</label>
              <label class="radio-inline" for="rank2">
                @if($assess->level == 2)
                <input type="radio" name="data[Photographer][rank]" id="rank2" value="2" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][rank]" id="rank2" value="2"/>
                @endif
                A</label>
              <label class="radio-inline" for="rank3">
                @if($assess->level == 3)
                <input type="radio" name="data[Photographer][rank]" id="rank3" value="3" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][rank]" id="rank3" value="3"/>
                @endif
                B</label>
              <label class="radio-inline" for="rank4">
                @if($assess->level == 4)
                <input type="radio" name="data[Photographer][rank]" id="rank4" value="4" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][rank]" id="rank4" value="4"/>
                @endif
                C</label>
              <label class="radio-inline" for="rank5">
                @if($assess->level == 5)
                <input type="radio" name="data[Photographer][rank]" id="rank5" value="5" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][rank]" id="rank5" value="5"/>
                @endif
                NG</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定単価</label>
            <div class="col col-md-2">
              <input name="data[Photographer][price]" class="form-control" maxLength="" type="tel" value="{{ $assess->price }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定回数</label>
            <div class="col col-md-2">
              <input name="data[Photographer][assessment_frequency]" class="form-control" maxLength="" type="tel" value="{{ $assess->assessment_frequency }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">クレーム回数</label>
            <div class="col col-md-2">
              <input name="data[Photographer][number_complain]" class="form-control" maxLength="" type="tel" value="{{ $assess->number_complain }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定状況備考</label>
            <div class="col col-md-5">
              <input name="data[Photographer][remark]" class="form-control" maxLength="100" type="text" value="{{ $assess->remark }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBank" class="col col-md-2 control-label">銀行名</label>
            <div class="col col-md-2">
              <input name="data[Photographer][bank]" class="form-control input-sm" maxLength="30" type="tel" value="{{ $assess->bank_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBankCode" class="col col-md-2 control-label">銀行コード</label>
            <div class="col col-md-2">
              <input name="data[Photographer][bank_code]" class="form-control" maxLength="4" type="tel" value="{{ $assess->bank_code }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBranchName" class="col col-md-2 control-label">支店名</label>
            <div class="col col-md-2">
              <input name="data[Photographer][branch_name]" class="form-control input-sm" maxLength="30" type="tel" value="{{ $assess->branch_name }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBranchNumber" class="col col-md-2 control-label">支店番号</label>
            <div class="col col-md-2">
              <input name="data[Photographer][branch_number]" class="form-control" maxLength="3" type="tel" value="{{ $assess->branch_number }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">口座種別</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="AccountClassification1">
                @if($assess->account_type == 1)
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification1" value="1" checked="checked" />
                @else
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification1" value="1"/>
                @endif
                普通 </label>
              <label class="radio-inline" for="AccountClassification2">
                @if($assess->account_type == 2)
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification2" value="2" checked="checked"/>
                @else
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification2" value="2" />
                @endif
                当座 </label>
              <label class="radio-inline" for="AccountClassification4">
                @if($assess->account_type == 4)
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification4" value="4" checked="checked"/>
                @else
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification4" value="4" />
                @endif
                貯蓄 </label>
              <label class="radio-inline" for="AccountClassification9">
                @if($assess->account_type == 9)
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification9" value="9" checked="checked"/>
                @else
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification9" value="9" />
                @endif
                その他 </label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerAccountNumber" class="col col-md-2 control-label">口座番号</label>
            <div class="col col-md-2">
              <input name="data[Photographer][account_number]" class="form-control" maxLength="7" type="tel" value="{{ $assess->account_number }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerNomineeName" class="col col-md-2 control-label">口座名義人 (カナ)</label>
            <div class="col col-md-2">
              <input name="data[Photographer][nominee_name]" class="form-control input-sm katakana" type="tel" value="{{ $assess->account_holder }}"/>
            </div>
          </div>

          <div class="form-group col col-md-12">
            <label for="expirationdate" class="col col-md-2 control-label">契約満了日</label>
            <div class="col col-md-2">
              <input name="data[Photographer][expiration_date]" class="form-control" maxLength="10" id="expirationdate" type="tel" value="{{ $expire_date }}"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">その他・備考</label>
            <div class="col col-md-5">
              <input name="data[Photographer][other_remark]" class="form-control" maxLength="100" type="text" value="{{ $assess->other_remark }}"/>
            </div>
          </div>
          <div class="col col-md-10 col-md-offset-2">
            <input  class="btn btn-default" id="submit" type="submit" value="変更"/>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <script>
// When the user clicks on <div>, open the popup
$(window).load(function(){
    $(".popup a").click(function(){
        $(".selectmulti").toggleClass("show");
    });
});
$('select[multiple]').multiselect({
    columns: 2,
    placeholder: 'Select options'
});
</script>
<script>
$(function() {
  $("#PhotographerAddForm").validate({
    rules: {
      "data[Photographer][id]": "required",
      "data[Photographer][family_name]": "required",
      "data[Photographer][contract_date]":{
        required: true,
        date: true
      },
      "data[Photographer][corresponding_erea]": "required",
      "data[Photographer][pw]": "required",
      "data[Photographer][family_kana_name]": "required",
      "data[Photographer][first_kana_name]": "required",
      "data[Photographer][zip_code]": "required",
      "data[Photographer][pref_id]": "required",
      "data[Photographer][address1]": "required",
      "data[Photographer][building_name1]": "required",
      "data[Photographer][address2]": "required",
      "data[Photographer][building_name2]": "required",
      "data[Photographer][municipality]": "required",
      "data[Photographer][phone_number1]": "required",
      "data[Photographer][phone_number2]": "required",
      "data[Photographer][fax_number]": "required",
      "data[Photographer][email1]": {
        required: true,
        email: true
      },
      "data[Photographer][email2]": "required",
      "data[Photographer][price]": "required",
      "data[Photographer][assessment_frequency]": "required",
      "data[Photographer][number_complain]": "required",
      "data[Photographer][remark]": "required",
      "data[Photographer][bank]": "required",
      "data[Photographer][bank_code]": "required",
      "data[Photographer][branch_name]": "required",
      "data[Photographer][branch_number]": "required",
      "data[Photographer][account_number]": "required",
      "data[Photographer][nominee_name]": "required",
      "data[Photographer][expiration_date]": {
        required: true,
        date: true
      }    
    },
    messages: {
      "data[Photographer][id]": "Không được để trống ID",
      "data[Photographer][family_name]": "Không được để trống Tên"
    }
  })
})
</script>
@endsection
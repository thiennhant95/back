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
      <form action="" class="well form-horizontal" id="PhotographerAddForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="POST"/> 
        </div>
        <fieldset>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定員ID（登録番号）</label>
            <div class="col col-md-2">
              <input name="data[Photographer][id]" class="form-control" maxLength="" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">PW設定</label>
            <div class="col col-md-2">
              <input name="data[Photographer][pw]" class="form-control" maxLength="" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="contractdate" class="col col-md-2 control-label">契約年月日</label>
            <div class="col col-md-2">
              <input name="data[Photographer][contract_date]" class="form-control" maxLength="10" id="contractdate" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-4">
            <label for="PhotographerFamilyName" class="col col-md-6 control-label" style="padding-right: 5px;">氏名　(<font color="red">*</font>)</label>
            <div class="col col-md-6 required" style="padding-left: 25px;">
              <input name="data[Photographer][family_name]" class="form-control" maxLength="20" style="width: 218px;" type="text" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-8">
           
            <div class="col col-md-3 required">
              <input name="data[Photographer][first_name]" class="form-control" maxLength="20" type="text" value=""/>
            </div>
            <div class="col col-md-7 col-md-offset-2">
                <div class="popup"><a href="#" class="btn btn-success btn-small"><span class="glyphicon glyphicon-road"></span> 対応地域設定</a>
                      <div class="selectmulti" id="myPopup">
                        <select name="data[Photographer][corresponding_erea][]" multiple="multiple" class="4colactive">
                          <optgroup label="北海道・東北地方">
                          <option value="北海道">北海道</option>
                          <option value="青森県">青森県</option>
                          <option value="岩手県">岩手県</option>
                          <option value="秋田県">秋田県</option>
                          <option value="宮城県">宮城県</option>
                          <option value="山形県">山形県</option>
                          <option value="福島県">福島県</option>
                          </optgroup>
                          <optgroup label="関東地方">
                          <option value="東京都">東京都</option>
                          <option value="神奈川県">神奈川県</option>
                          <option value="埼玉県">埼玉県</option>
                          <option value="千葉県">千葉県</option>
                          <option value="茨城県">茨城県</option>
                          <option value="栃木県">栃木県</option>
                          <option value="群馬県">群馬県</option>
                          </optgroup>
                          <optgroup label="甲信越地方">
                          <option value="山梨県">山梨県</option>
                          <option value="長野県">長野県</option>
                          <option value="新潟県">新潟県</option>
                          </optgroup>
                          <optgroup label="東海地方">
                          <option value="静岡県">静岡県</option>
                          <option value="愛知県">愛知県</option>
                          <option value="岐阜県">岐阜県</option>
                          <option value="三重県">三重県</option>
                          </optgroup>
                          <optgroup label="北陸地方">
                          <option value="富山県">富山県</option>
                          <option value="石川県">石川県</option>
                          <option value="福井県">福井県</option>
                          </optgroup>
                          <optgroup label="近畿地方">
                          <option value="大阪府">大阪府</option>
                          <option value="京都府">京都府</option>
                          <option value="奈良県">奈良県</option>
                          <option value="滋賀県">滋賀県</option>
                          <option value="和歌山県">和歌山県</option>
                          <option value="兵庫県">兵庫県</option>
                          </optgroup>
                          <optgroup label="中国地方">
                          <option value="岡山県">岡山県</option>
                          <option value="広島県">広島県</option>
                          <option value="鳥取県">鳥取県</option>
                          <option value="島根県">島根県</option>
                          <option value="山口県">山口県</option>
                          </optgroup>
                          <optgroup label="四国地方">
                          <option value="香川県">香川県</option>
                          <option value="徳島県">徳島県</option>
                          <option value="愛媛県">愛媛県</option>
                          <option value="高知県">高知県</option>
                          </optgroup>
                          <optgroup label="九州・沖縄地方">
                          <option value="福岡県">福岡県</option>
                          <option value="佐賀県">佐賀県</option>
                          <option value="長崎県">長崎県</option>
                          <option value="大分県">大分県</option>
                          <option value="熊本県">熊本県</option>
                          <option value="宮崎県">宮崎県</option>
                          <option value="鹿児島県">鹿児島県</option>
                          <option value="沖縄県">沖縄県</option>
                          </optgroup>
                        </select>
                    </div>
                </div> 
                
                
            </div>
          </div>
          
          
          
          <div class="form-group col col-md-4">
            <label for="PhotographerFamilyKanaName" class="col col-md-6 control-label" style="padding-right: 5px;">ふりがな</label>
            <div class="col col-md-6" style="padding-left: 25px;">
              <input name="data[Photographer][family_kana_name]" class="form-control hiragana" maxLength="20" style="width: 218px;" type="text" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-8">
            <div class="col col-md-3">
              <input name="data[Photographer][first_kana_name]" class="form-control hiragana" maxLength="20" type="text" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderZipCode" class="col col-md-2 control-label">郵便番号</label>
            <div class="col col-md-2">
              <div class="col-md-8" style="padding: 0">
                  <input name="data[Photographer][zip_code]" class="form-control ime-disabled" maxLength="8" onKeyUp="AjaxZip3.zip2addr(this, &#039;&#039;, &#039;data[Photographer][pref_id]&#039;, &#039;data[Photographer][address]&#039;);" type="tel" value=""/>
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
              <input name="data[Photographer][address1]" class="form-control" maxLength="100" type="text" value=""/>
            </div>
          </div>
        <div class="form-group col col-md-12">
            <label for="TraderAddress" class="col col-md-2 control-label">建物名・部屋番号等</label>
            <div class="col col-md-5">
              <input name="data[Photographer][building_name1]" class="form-control" maxLength="100" type="text" value=""/>
            </div>
          </div>
          
          
          
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress1" class="col col-md-2 control-label">市区町村</label>
            <div class="col col-md-5">
              <input name="data[Photographer][address2]" class="form-control" maxLength="10" type="text"/>
            </div>
          </div>
          
          
          
          
          
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress2" class="col col-md-2 control-label">町域・番地</label>
            <div class="col col-md-5">
              <input name="data[Photographer][building_name2]" class="form-control" maxLength="20" type="text"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress3" class="col col-md-2 control-label">建物名</label>
            <div class="col col-md-5">
              <input name="data[Photographer][municipality]" class="form-control" maxLength="30" type="text"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPhoneNumber1" class="col col-md-2 control-label">電話番号1</label>
            <div class="col col-md-2">
              <input name="data[Photographer][phone_number1]" class="form-control ime-disabled" maxLength="13" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPhoneNumber2" class="col col-md-2 control-label">電話番号2</label>
            <div class="col col-md-2">
              <input name="data[Photographer][phone_number2]" class="form-control ime-disabled" maxLength="13" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerFaxNumber" class="col col-md-2 control-label">FAX番号</label>
            <div class="col col-md-2">
              <input name="data[Photographer][fax_number]" class="form-control ime-disabled" maxLength="13" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerEmail1" class="col col-md-2 control-label">メールアドレス1</label>
            <div class="col col-md-5">
              <input name="data[Photographer][email1]" class="form-control ime-disabled" maxLength="100" type="email" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerEmail2" class="col col-md-2 control-label">メールアドレス2</label>
            <div class="col col-md-5">
              <input name="data[Photographer][email2]" class="form-control ime-disabled" maxLength="100" type="email"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">報告書送付方法</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="ReportMethod0">
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod0" value="0" checked="checked" />
                送信不可</label>
              <label class="radio-inline" for="ReportMethod1">
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod1" value="1" />
                メール</label>
              <label class="radio-inline" for="ReportMethod2">
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod2" value="2" />
                FAX</label>
              <label class="radio-inline" for="ReportMethod3">
                <input type="radio" name="data[Photographer][report_method]" id="ReportMethod3" value="3" />
                郵送</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">性別</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="Gender1">
                <input type="radio" name="data[Photographer][gender]" id="Gender1" value="0" checked="checked" />
                男性</label>
              <label class="radio-inline" for="Gender2">
                <input type="radio" name="data[Photographer][gender]" id="Gender2" value="1" />
                女性</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">査定レベル</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="rank1">
                <input type="radio" name="data[Photographer][rank]" id="rank1" value="1" checked="checked" />
                S</label>
              <label class="radio-inline" for="rank2">
                <input type="radio" name="data[Photographer][rank]" id="rank2" value="2" />
                A</label>
              <label class="radio-inline" for="rank3">
                <input type="radio" name="data[Photographer][rank]" id="rank3" value="3" />
                B</label>
              <label class="radio-inline" for="rank4">
                <input type="radio" name="data[Photographer][rank]" id="rank4" value="4" />
                C</label>
              <label class="radio-inline" for="rank5">
                <input type="radio" name="data[Photographer][rank]" id="rank5" value="5" />
                NG</label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定単価</label>
            <div class="col col-md-2">
              <input name="data[Photographer][price]" class="form-control" maxLength="" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定回数</label>
            <div class="col col-md-2">
              <input name="data[Photographer][assessment_frequency]" class="form-control" maxLength="" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">クレーム回数</label>
            <div class="col col-md-2">
              <input name="data[Photographer][number_complain]" class="form-control" maxLength="" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定状況備考</label>
            <div class="col col-md-5">
              <input name="data[Photographer][remark]" class="form-control" maxLength="100" type="text"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBank" class="col col-md-2 control-label">銀行名</label>
            <div class="col col-md-2">
              <input name="data[Photographer][bank]" class="form-control input-sm" maxLength="30" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBankCode" class="col col-md-2 control-label">銀行コード</label>
            <div class="col col-md-2">
              <input name="data[Photographer][bank_code]" class="form-control" maxLength="4" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBranchName" class="col col-md-2 control-label">支店名</label>
            <div class="col col-md-2">
              <input name="data[Photographer][branch_name]" class="form-control input-sm" maxLength="30" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerBranchNumber" class="col col-md-2 control-label">支店番号</label>
            <div class="col col-md-2">
              <input name="data[Photographer][branch_number]" class="form-control" maxLength="3" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">口座種別</label>
            <div class="col col-md-5">
              <label class="radio-inline" for="AccountClassification1">
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification1" value="1" checked="checked" />
                普通 </label>
              <label class="radio-inline" for="AccountClassification2">
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification2" value="2" />
                当座 </label>
              <label class="radio-inline" for="AccountClassification4">
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification4" value="4" />
                貯蓄 </label>
              <label class="radio-inline" for="AccountClassification9">
                <input type="radio" name="data[Photographer][account_classification]" id="AccountClassification9" value="9" />
                その他 </label>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerAccountNumber" class="col col-md-2 control-label">口座番号</label>
            <div class="col col-md-2">
              <input name="data[Photographer][account_number]" class="form-control" maxLength="7" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerNomineeName" class="col col-md-2 control-label">口座名義人 (カナ)</label>
            <div class="col col-md-2">
              <input name="data[Photographer][nominee_name]" class="form-control input-sm katakana" type="tel"/>
            </div>
          </div>

          <div class="form-group col col-md-12">
            <label for="expirationdate" class="col col-md-2 control-label">契約満了日</label>
            <div class="col col-md-2">
              <input name="data[Photographer][expiration_date]" class="form-control" maxLength="10" id="expirationdate" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">その他・備考</label>
            <div class="col col-md-5">
              <input name="data[Photographer][other_remark]" class="form-control" maxLength="100" type="text"/>
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
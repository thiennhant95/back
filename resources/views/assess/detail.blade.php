@extends('layouts.master')
@section('title')
(10)社内システム:査定員編集
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
  $('#expirationdate').datepicker({
  });
  $('#contractdate').datepicker({
  });
  
  $('#PhotographerEditForm').disableOnSubmit();
});

//]]>
</script>
@endsection
@section('content')
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!-- app/View/Photographers/edit.ctp -->  

    <div class="col col-md-12">
      <blockquote>査定員編集</blockquote>
    </div>
    <div id="photographers_edit_page" class="col col-md-10 col-md-offset-1">
      <form action="/crm/Photographers/edit/1" class="well form-horizontal" id="PhotographerEditForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <input type="hidden" name="data[Photographer][photographer_cd]" id="photographer_cd" value="I0000"/>
        <fieldset>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定員ID（登録番号）</label>
            <div class="col col-md-2">
              <input name="" class="form-control ime-disabled" maxLength="" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">PW設定</label>
            <div class="col col-md-2">
              <input name="" class="form-control ime-disabled" maxLength="" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="contractdate" class="col col-md-2 control-label">契約年月日</label>
            <div class="col col-md-2">
              <input name="" class="form-control ime-disabled" maxLength="10" id="contractdate" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-4">
            <label for="PhotographerFamilyName" class="col col-md-6 control-label" style="padding-right: 5px;">氏名　(<font color="red">*</font>)</label>
            <div class="col col-md-6 required" style="padding-left: 25px;">
              <input name="data[Photographer][family_name]" class="form-control" maxLength="20" style="width: 218px;" type="text" value="カーネクスト"/>
            </div>
          </div>
          <div class="form-group col col-md-8">
            <div class="col col-md-3 required">
              <input name="data[Photographer][first_name]" class="form-control" maxLength="20" type="text" value="車輌写真撮影"/>
            </div>
            <div class="col col-md-7 col-md-offset-2"><a href="/crm/photographers/area/1" class="btn btn-success btn-small" target="_blank"><span class="glyphicon glyphicon-road"></span> 対応地域設定</a></div>
          </div>
          <div class="form-group col col-md-4">
            <label for="PhotographerFamilyKanaName" class="col col-md-6 control-label" style="padding-right: 5px;">ふりがな</label>
            <div class="col col-md-6" style="padding-left: 25px;">
              <input name="data[Photographer][family_kana_name]" class="form-control hiragana" maxLength="20" style="width: 218px;" type="text" value="かーねくすと"/>
            </div>
          </div>
          <div class="form-group col col-md-8">
            <div class="col col-md-3">
              <input name="data[Photographer][first_kana_name]" class="form-control hiragana" maxLength="20" type="text" value="しゃしんさつえい"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerZipCode" class="col col-md-2 control-label">郵便番号</label>
            <div class="col col-md-1">
              <input name="data[Photographer][zip_code]" class="form-control ime-disabled" maxLength="8" onKeyUp="AjaxZip3.zip2addr(this, &#039;&#039;, &#039;data[Photographer][pref_id]&#039;, &#039;data[Photographer][address1]&#039;, &#039;data[Photographer][address2]&#039;, &#039;data[Photographer][address2]&#039;);" type="tel" value=""/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPrefId" class="col col-md-2 control-label">都道府県</label>
            <div class="col col-md-2">
              <select name="data[Photographer][pref_id]" class="form-control pref_name">
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
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress1" class="col col-md-2 control-label">市区町村</label>
            <div class="col col-md-5">
              <input name="data[Photographer][address1]" class="form-control" maxLength="10" type="text"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress2" class="col col-md-2 control-label">町域・番地</label>
            <div class="col col-md-5">
              <input name="data[Photographer][address2]" class="form-control" maxLength="20" type="text"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerAddress3" class="col col-md-2 control-label">建物名</label>
            <div class="col col-md-5">
              <input name="data[Photographer][address3]" class="form-control" maxLength="30" type="text"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="PhotographerPhoneNumber1" class="col col-md-2 control-label">電話番号1</label>
            <div class="col col-md-2">
              <input name="data[Photographer][phone_number1]" class="form-control ime-disabled" maxLength="13" type="tel" value="06-7711-7898"/>
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
              <input name="data[Photographer][email1]" class="form-control ime-disabled" maxLength="100" type="email" value="shashin@raxus-create.co.jp"/>
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
                <input type="radio" name="data[Photographer][gender]" id="Gender1" value="1" checked="checked" />
                男性</label>
              <label class="radio-inline" for="Gender2">
                <input type="radio" name="data[Photographer][gender]" id="Gender2" value="2" />
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
              <input name="" class="form-control ime-disabled" maxLength="" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定回数</label>
            <div class="col col-md-2">
              <input name="" class="form-control ime-disabled" maxLength="" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">クレーム回数</label>
            <div class="col col-md-2">
              <input name="" class="form-control ime-disabled" maxLength="" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">査定状況備考</label>
            <div class="col col-md-5">
              <input name="" class="form-control ime-disabled" maxLength="100" type="text"/>
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
              <input name="data[Photographer][bank_code]" class="form-control ime-disabled" maxLength="4" type="tel"/>
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
              <input name="data[Photographer][branch_number]" class="form-control ime-disabled" maxLength="3" type="tel"/>
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
              <input name="data[Photographer][account_number]" class="form-control ime-disabled" maxLength="7" type="tel"/>
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
              <input name="data[Photographer][expiration_date]" class="form-control ime-disabled" maxLength="10" id="expirationdate" type="tel"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">その他・備考</label>
            <div class="col col-md-5">
              <input name="" class="form-control ime-disabled" maxLength="100" type="text"/>
            </div>
          </div>
          <div class="col col-md-10 col-md-offset-2">
            <input  class="btn btn-default" id="submit" type="submit" value="変更"/>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
@endsection
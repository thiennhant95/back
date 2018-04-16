@extends('layouts.master')
@section('title')
(10)社内システム:ユーザ編集
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
</script>
@endsection
@section('content')
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!-- app/View/Traders/edit.ctp -->
    
    <div class="col col-md-12">
      <blockquote>ユーザー編集 </blockquote>
    </div>
    <div id="traders_edit_page" class="col col-md-10 col-md-offset-1">
      <form action="/crm/Traders/edit/1" class="well form-horizontal" id="TraderEditForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <input type="hidden" name="data[Trader][trader_cd]" id="trader_cd" value="T00120003"/>
        <fieldset>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">ユーザーコード</label>
            <div class="col col-md-5 form-control-static">T00120003</div>
          </div>
          <div class="form-group col col-md-12 required">
            <label for="TraderTraderName" class="col col-md-2 control-label">名前</label>
            <div class="col col-md-5 required">
              <input name="data[Trader][trader_name]" class="form-control" maxLength="100" required="required" type="text" value="山本　敬氏"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderTraderKanaName" class="col col-md-2 control-label">ふりがな</label>
            <div class="col col-md-5">
              <input name="data[Trader][trader_kana_name]" class="form-control hiragana" maxLength="100" type="text" value="ヤマモト　ケイシ"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderZipCode" class="col col-md-2 control-label">郵便番号</label>
            <div class="col col-md-1">
              <input name="data[Trader][zip_code]" class="form-control ime-disabled" maxLength="8" onKeyUp="AjaxZip3.zip2addr(this, &#039;&#039;, &#039;data[Trader][pref_id]&#039;, &#039;data[Trader][address]&#039;);" type="tel" value="160-0023"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderPrefId" class="col col-md-2 control-label">都道府県</label>
            <div class="col col-md-1 required">
              <select name="data[Trader][pref_id]" class="form-control pref_name">
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
                <option value="13" selected="selected">東京都</option>
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
            <label for="TraderAddress" class="col col-md-2 control-label">市町村・番地</label>
            <div class="col col-md-5">
              <input name="data[Trader][address]" class="form-control" maxLength="100" type="text" value="新宿区西新宿7-4-3"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderAddress" class="col col-md-2 control-label">建物・部屋番号</label>
            <div class="col col-md-5">
              <input name="data[Trader][address]" class="form-control" maxLength="100" type="text" value="升本ビル4階"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderPhoneNumber" class="col col-md-2 control-label">電話番号</label>
            <div class="col col-md-2">
              <input name="data[Trader][phone_number]" class="form-control ime-disabled" maxLength="13" type="tel" value="03-5937-4886"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="TraderEmail" class="col col-md-2 control-label">メールアドレス</label>
            <div class="col col-md-5">
              <input name="data[Trader][email]" class="form-control ime-disabled" maxLength="100" type="email" value="superman09@stagegroup.jp"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="Password" class="col col-md-2 control-label">パスワード</label>
            <div class="col col-md-2">
              <input name="data[Trader][password]" class="form-control ime-disabled" maxLength="50" type="text" value="@0123456789#"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">免許証番号</label>
            <div class="col col-md-2">
              <input name="data[Trader][]" class="form-control ime-disabled" maxLength="13" type="tel" value="1234567890000"/>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label for="" class="col col-md-2 control-label">免許証画像</label>
            <div class="col col-md-2">
			  <a href="./images/menkyo.jpg" rel="lightbox" class="lightbox_photo"><img src="{{ url('images/menkyo.jpg') }}" alt="免許証画像" width="240"></a>
			  <div style="margin-top:5px">
				<input name="upfile" id="upfile" accept="image/*" type="file">
			  </div>
            </div>
          </div>
          <div class="form-group col col-md-12">
            <label class="col col-md-2 control-label">備考</label>
            <div class="col col-md-5">
              <textarea name="data[Trader][]" class="form-control" rows="5" cols="30" id="">山本　敬氏です。</textarea>
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
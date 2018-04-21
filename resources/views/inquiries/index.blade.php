@extends('layouts.master')
@section('title')
(10)社内システム:問合管理
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
  $('#fromfirst').datepicker({
    onClose: function(selectedDate) {
      $('#tofirst').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#tofirst').datepicker({
    onClose: function(selectedDate) {
      $('#fromfirst').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#fromlast').datepicker({
    onClose: function(selectedDate) {
      $('#tolast').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#tolast').datepicker({
    onClose: function(selectedDate) {
      $('#fromlast').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#fromproposal').datepicker({
    onClose: function(selectedDate) {
      $('#toproposal').datepicker(
        "option", "minDate", selectedDate
      );
    }
  });
  $('#toproposal').datepicker({
    onClose: function(selectedDate) {
      $('#fromproposal').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#telagaindate').datepicker({
    onClose: function(selectedDate) {
      $('#telagaindate').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  $('#telagaindate2').datepicker({
    onClose: function(selectedDate) {
      $('#telagaindate2').datepicker(
        "option", "maxDate", selectedDate
      );
    }
  });
  

//予測AA設定
  $(document).on('click', '.expect_auction', function(){
    var expect_auction_link = $(this);
    var td = $(this).parent();
    var prev_html = td.html();
    var inquiry_id = expect_auction_link.attr('inquiry_id');
    var expectation_auction = expect_auction_link.attr('expectation_auction');
    $(this).hide();
    td.html('<br /><img src="/crm/img/load-22px.gif" id="loading" alt="loading" />');
    $.ajax({
        type: 'POST',
        url: '/inquiries/expect_auction',
        datatype: 'json',
        data: {
          'id' : inquiry_id,
          'expectation_auction' : expectation_auction
        }
      })
      .done(function(data){
        if (data == '') {
          if (expectation_auction == 1) {
            td.html('<span class="text-danger">YES</span><br /><a class="btn btn-warning btn-xs expect_auction" inquiry_id="' + inquiry_id + '" expectation_auction="' + 0 + '">解除</a>');
          } else {
            td.html('<br /><a class="btn btn-success btn-xs expect_auction" inquiry_id="' + inquiry_id + '" expectation_auction="' + 1 + '">設定</a>');
          }
        } else {
          alert('予測AA設定に失敗しました。');
          td.html(prev_html);
        }
      })
      .fail(function(jqXHR, textStatus) {
        alert('予測AAのステータスを変更できませんでした。');
        td.html(prev_html);
      });
    return false;
  });
});

//]]>
</script>
@endsection
@section('content')
<div id="container">
  <div id="header"></div>
  <meta name="csrf-token" content="{{ csrf_token() }}">
         {{ csrf_field() }}
  <div id="content"> 
    <!-- app/View/Inquiries/index.ctp -->
    
    <div class="col col-md-12"> <a href="/order/detail.html" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> ユーザー新規登録</a></div>
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <form action="/inquiries/search" class="form-horizontal" id="InquiryIndexForm" method="post" accept-charset="utf-8">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <div class="col col-md-9">
          <div class="well">
            <fieldset>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="InquiryName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">氏名</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryPhoneNumber" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">電話番号</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][phone_number]" class="form-control input-sm ime-disabled" maxlength="13" placeholder="下4桁完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryAddress" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">住所</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][address]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryEmail" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">メールアドレス</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][email]" class="form-control input-sm ime-disabled" maxlength="100" placeholder="前方一致" type="email"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="InquiryOwnCarName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">車種名</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][own_car_name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryDisplacement" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">排気量</label>
                  <div class="col col-md-8">
                    <select name="data[Inquiry][displacement]" class="form-control input-sm" id="InquiryDisplacement">
                      @for ($i = 0; $i < count($displacement); $i++)
                        <option value="{{$i}}">{{$displacement[$i]}}</option>
                      @endfor
                      
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryFreeword" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">フリーワード</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][freeword]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromfirst" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">初回問合日</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][firstinquiry_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromfirst" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="tofirst" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][firstinquiry_end]" class="form-control input-sm ime-disabled" maxlength="10" id="tofirst" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="fromlast" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">最終問合日</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][lastinquiry_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromlast" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="tolast" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][lastinquiry_end]" class="form-control input-sm ime-disabled" maxlength="10" id="tolast" autocomplete="off" type="tel"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromproposal" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">金額提示日</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][proposal_start]" class="form-control input-sm ime-disabled" maxlength="10" id="fromproposal" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="toproposal" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][proposal_end]" class="form-control input-sm ime-disabled" maxlength="10" id="toproposal" autocomplete="off" type="tel"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="telagaindate" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">再TEL日</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][lastinquiry_start]" class="form-control input-sm ime-disabled" maxlength="10" id="telagaindate" autocomplete="off" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="telagaindate2" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[Inquiry][lastinquiry_end]" class="form-control input-sm ime-disabled" maxlength="10" id="telagaindate2" autocomplete="off" type="tel"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="InquiryReception" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">査定回数</label>
                  <div class="col col-md-8">
                    <input name="" class="form-control input-sm ime-disabled" maxlength="10" id="" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryStatusCd" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">ステータス</label>
                  <div class="col col-md-8">
                    <select name="data[Inquiry][status_cd]" class="form-control input-sm" id="InquiryStatusCd">
                      @for ($i = 0; $i < count(config('constants.opportunityStatus')); $i++)
                        <option value="{{$i}}">{{config('constants.opportunityStatus')[$i]}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryRegistrant" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">初回担当者</label>
                  <div class="col col-md-8">
                    <select name="data[Inquiry][registrant]" class="form-control input-sm" id="InquiryRegistrant">
                      <option value="0">----------</option>
                      @foreach($sellers as $seller)
                        <option value="{{$seller->id}}">{{$seller->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryUpdater" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">履歴担当者</label>
                  <div class="col col-md-8">
                    <select name="data[Inquiry][updater]" class="form-control input-sm" id="InquiryUpdater">
                      <option value="">----------</option>
                      @foreach($sellers as $seller)
                        <option value="{{$seller->id}}">{{$seller->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label class="col col-md-4 control-label" style="padding: 7px 0px 0px 0px;">出品確度</label>
                  <div class="col col-md-8">
                    <input type="hidden" name="data[Inquiry][expectation_auction]" id="InquiryExpectationAuction_" value=""/>
                    <label class="radio-inline" for="InquiryExpectationAuction">
                      <input type="radio" name="data[Inquiry][expectation_auction]" id="InquiryExpectationAuction" value="" />
                      S</label>
                    <label class="radio-inline" for="InquiryExpectationAuction0">
                      <input type="radio" name="data[Inquiry][expectation_auction]" id="InquiryExpectationAuction0" value="0" />
                      A</label>
                    <label class="radio-inline" for="InquiryExpectationAuction1">
                      <input type="radio" name="data[Inquiry][expectation_auction]" id="InquiryExpectationAuction1" value="1" />
                      B</label>
                    <label class="radio-inline" for="InquiryExpectationAuction1">
                      <input type="radio" name="data[Inquiry][expectation_auction]" id="InquiryExpectationAuction1" value="2" />
                      C</label>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label class="col col-md-4 control-label" style="padding: 7px 0px 0px 0px;">自走</label>
                  <div class="col col-md-8">
                    <input type="hidden" name="data[Inquiry][runnable]" id="InquiryRunnable_" value=""/>
                    <label class="radio-inline" for="InquiryRunnable">
                      <input type="radio" name="data[Inquiry][runnable]" id="InquiryRunnable" value="" />
                      全て</label>
                    <label class="radio-inline" for="InquiryRunnable1">
                      <input type="radio" name="data[Inquiry][runnable]" id="InquiryRunnable1" value="1" />
                      可能</label>
                    <label class="radio-inline" for="InquiryRunnable0">
                      <input type="radio" name="data[Inquiry][runnable]" id="InquiryRunnable0" value="0" />
                      不可</label>
                  </div>
                </div>
                <div class="form-group col col-md-4">
                  <label class="col col-md-4 control-label" style="padding: 7px 0px 0px 0px;">査定サービス</label>
                  <div class="col col-md-8">
                    <input type="hidden" name="service_" id="" value=""/>
                    <label class="radio-inline" for="service">
                      <input type="radio" name="service" id="service" value="" />
                      無し</label>
                    <label class="radio-inline" for="service1">
                      <input type="radio" name="service" id="service1" value="0" />
                      出張査定</label>
                    <label class="radio-inline" for="service2">
                      <input type="radio" name="service" id="service2" value="1" />
                      持込査定</label>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="col col-md-3">
          <div class="col col-md-3">
            <button type="submit" name="search" class="btn btn-default col-md-12" style="margin: 245px 0px 0px;"><span class="glyphicon glyphicon-search"></span> 検索</button>
          </div>
          <div class="form-group col-md-3">
            <input id="btnClear" name="clear" class="btn btn-default col-md-12" style="margin: 245px 0px 0px;" type="reset" value="クリア"/>
          </div>
        </div>
      </form>
    </div>
    {{ $list_inquiries->links('layouts.pagination') }}
    <div class="col col-md-12">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th style="width: 150px;">@sortablelink('seller.name', '氏名')</th>
            <th style="width: 150px;">備考</th>
            <th style="width: 115px;">@sortablelink('seller.phone1', '電話番号')</th>
            <th style="width: 110px;">@sortablelink('seller.address', '住所')</th>
            <th style="width: 75px;">@sortablelink('sellerCarStatus.listing_accuracy', '出品確度')</th>
            <th>@sortablelink('sellerCarInformation.car_name', '車種')</th>
            <th style="width: 75px;">@sortablelink('displacement', '排気量')</th>
            <th style="width: 100px;">@sortablelink('sellerCarInformation.car_year', '年式')</th>
            <th style="width: 90px;">@sortablelink('mileage', '走行距離')</th>
            <th style="width: 50px;"><a href="/inquiries?sort=Inquiry.registrant&amp;direction=asc">自走</a></th>
            <th style="width: 60px;">@sortablelink('sellerCarAssessment.situation', '状況')</th>
            <th style="width: 75px;">@sortablelink('sellerCarStatus.re_tel_date', '再TEL日')</th>
            <th style="width: 70px;">@sortablelink('sellerCarStatus.tel_number_again', '再TEL回数')</th>
            <th style="width: 100px;">@sortablelink('sellerCarStatus.first_inquiry_date', '初回問合日')</th>
            <th style="width: 100px;">@sortablelink('sellerCarAssessment.request_date', '最終問合日')</th>
            <th style="width: 100px;">@sortablelink('sellerCarAssessment.advance', '初回対応者')</th>
            <th style="width: 90px;"><a href="/inquiries?sort=Inquiry.registrant&amp;direction=asc">査定サービス</a></th>
            <th style="width: 100px;"><a href="/inquiries?sort=Inquiry.updater&amp;direction=asc">最終対応者</a></th>
      <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_inquiries as $inquiry)
          <tr>
            <td><a href="/order/detail.html?id={{$inquiry->id}}">{{$inquiry->seller->name}}</a><br />
              ({{$inquiry->seller->kana_name}}) </td>
            <td>{{$inquiry->remark}}</td>
            <td>{{$inquiry->seller->phone1}}<br /></td>
            <td>{{$inquiry->seller->address}}<br /></td>
            <td>{{$inquiry->sellerCarStatus->listing_accuracy}}<br />
              
              <!--id16：予測AA設定機能--></td>
            <td> {{$inquiry->sellerCarInformation->car_name}}</td>
            <td class="text-right">{{$inquiry->displacement}}</td>
            <td>{{$inquiry->sellerCarInformation->car_year}}</td>
            <td class="text-right">{{$inquiry->mileage}}</td>
            <td></td>
            <td class="text-center"><span style="color: deeppink;">{{$inquiry->sellerCarAssessment->situation}}</span><br /></td>
            <td>{{$inquiry->sellerCarStatus->re_tel_date}}</td>
            <td>{{$inquiry->sellerCarStatus->tel_number_again}}</td>
            <td>{{$inquiry->sellerCarStatus->first_inquiry_date}}</td>
            <td>{{$inquiry->sellerCarAssessment->request_date}}</td>
            <td>{{$inquiry->sellerCarAssessment->advance}}</td>
            <td></td>
            <td>今田 なつみ</td>
      <td class="text-center" style="vertical-align: middle;">
        <button class="btn btn-danger btn-xs deleteInquiry" data="{{$inquiry->id}}">削除</button>
        <!-- <form action="/crm/Photographers/delete/2" name="post_5a793d5ccfc86726741264" id="post_5a793d5ccfc86726741264" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
              </form>
              <a href="#" class="btn btn-danger btn-xs" onclick="if (confirm(&#039;削除してよろしいですか？ # I0001?&#039;)) { document.post_5a793d5ccfc86726741264.submit(); } event.returnValue = false; return false;">削除</a></td> -->
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $list_inquiries->links('layouts.pagination') }}
  </div>
  <script type="text/javascript" src="{{ url('js/back_office/inquiry/index.js')}}"></script>
@endsection

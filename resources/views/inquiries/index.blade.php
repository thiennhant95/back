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
    
    <div class="col col-md-12"> <a href="/order/add" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> ユーザー新規登録</a></div>
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <form action="/inquiries" class="form-horizontal" id="InquiryIndexForm" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <div class="col col-md-9">
          <div class="well">
            <fieldset>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="name" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">氏名</label>
                  <div class="col col-md-8">
                    <input name="data[name]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text" value="{{$requestSearch['name']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="phone" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">電話番号</label>
                  <div class="col col-md-8">
                    <input name="data[phone]" class="form-control input-sm ime-disabled" maxlength="13" placeholder="下4桁完全一致" type="tel" value="{{$requestSearch['phone']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="ddress" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">住所</label>
                  <div class="col col-md-8">
                    <input name="data[address]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text" value="{{$requestSearch['address']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="email" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">メールアドレス</label>
                  <div class="col col-md-8">
                    <input name="data[email]" class="form-control input-sm ime-disabled" maxlength="100" placeholder="前方一致" type="email" value="{{$requestSearch['email']}}"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="carName" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">車種名</label>
                  <div class="col col-md-8">
                    <input name="data[carName]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text" value="{{$requestSearch['carName']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="displacement" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">排気量</label>
                  <div class="col col-md-8">
                    <select name="data[displacement]" class="form-control input-sm" id="displacement">
                      @for ($i = 0; $i < count(config('constants.displacement')); $i++)
                          @if ($requestSearch['displacement'] == $i)
                            <option value="{{$i}}" selected>{{config('constants.displacement')[$i]}}</option>
                          @else
                            <option value="{{$i}}">{{config('constants.displacement')[$i]}}</option>
                          @endif
                      @endfor
                      
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="freeword" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">フリーワード</label>
                  <div class="col col-md-8">
                    <input name="data[freeword]" class="form-control input-sm" maxlength="50" placeholder="部分一致" type="text" value="{{$requestSearch['freeword']}}"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromfirst" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">初回問合日</label>
                  <div class="col col-md-8">
                    <input name="data[firstinquiryStart]" class="form-control input-sm ime-disabled" maxlength="10" id="fromfirst" autocomplete="off" type="tel" value="{{$requestSearch['firstinquiryStart']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="tofirst" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[firstinquiryEnd]" class="form-control input-sm ime-disabled" maxlength="10" id="tofirst" autocomplete="off" type="tel" value="{{$requestSearch['firstinquiryEnd']}}"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="fromlast" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">最終問合日</label>
                  <div class="col col-md-8">
                    <input name="data[lastinquiryStart]" class="form-control input-sm ime-disabled" maxlength="10" id="fromlast" autocomplete="off" type="tel" value="{{$requestSearch['lastinquiryStart']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="tolast" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[lastinquiryEnd]" class="form-control input-sm ime-disabled" maxlength="10" id="tolast" autocomplete="off" type="tel" value="{{$requestSearch['lastinquiryEnd']}}"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="fromproposal" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">金額提示日</label>
                  <div class="col col-md-8">
                    <input name="data[proposalStart]" class="form-control input-sm ime-disabled" maxlength="10" id="fromproposal" autocomplete="off" type="tel" value="{{$requestSearch['proposalStart']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="toproposal" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[proposalEnd]" class="form-control input-sm ime-disabled" maxlength="10" id="toproposal" autocomplete="off" type="tel" value="{{$requestSearch['proposalEnd']}}"/>
                  </div>
                  <div class="col col-md-3"></div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="telagaindate" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">再TEL日</label>
                  <div class="col col-md-8">
                    <input name="data[retelDateStart]" class="form-control input-sm ime-disabled" maxlength="10" id="telagaindate" autocomplete="off" type="tel" value="{{$requestSearch['retelDateStart']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="telagaindate2" class="col col-md-1 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                  <div class="col col-md-8">
                    <input name="data[retelDateEnd]" class="form-control input-sm ime-disabled" maxlength="10" id="telagaindate2" autocomplete="off" type="tel" value="{{$requestSearch['retelDateEnd']}}"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="InquiryReception" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">査定回数</label>
                  <div class="col col-md-8">
                    <input name="data[assessmentFrequency]" class="form-control input-sm ime-disabled" maxlength="10" id="" type="tel" value="{{$requestSearch['assessmentFrequency']}}"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryStatusCd" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">ステータス</label>
                  <div class="col col-md-8">
                    <select name="data[status]" class="form-control input-sm" id="InquiryStatusCd">
                      @for ($i = 0; $i < count(config('constants.opportunityStatus')); $i++)
                          @if ($requestSearch['status'] == $i)
                            <option value="{{$i}}" selected>{{config('constants.opportunityStatus')[$i]}}</option>
                          @else
                            <option value="{{$i}}">{{config('constants.opportunityStatus')[$i]}}</option>
                          @endif
                        
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="InquiryRegistrant" class="col col-md-4 control-label" style="padding: 7px 2px 0px 0px;">初回担当者</label>
                  <div class="col col-md-8">
                    <select name="data[registrant]" class="form-control input-sm" id="InquiryRegistrant">
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
                    <select name="data[updater]" class="form-control input-sm" id="InquiryUpdater">
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
                    <!-- <input type="hidden" name="data[Inquiry][expectation_auction]" id="InquiryExpectationAuction_" value=""/> -->
                    <label class="radio-inline" for="listingAccuracyS">
                      <input type="radio" name="data[listingAccuracy]" id="listingAccuracyS" value="1" {{$requestSearch['listingAccuracy'] === 1 ? 'checked' : ''}}/>
                      S</label>
                    <label class="radio-inline" for="listingAccuracyA">
                      <input type="radio" name="data[listingAccuracy]" id="listingAccuracyA" value="2" {{$requestSearch['listingAccuracy'] == 2 ? 'checked' : ''}}/>
                      A</label>
                    <label class="radio-inline" for="listingAccuracyB">
                      <input type="radio" name="data[listingAccuracy]" id="listingAccuracyB" value="3" {{$requestSearch['listingAccuracy'] == 3 ? 'checked' : ''}}/>
                      B</label>
                    <label class="radio-inline" for="listingAccuracyC">
                      <input type="radio" name="data[listingAccuracy]" id="listingAccuracyC" value="4" {{$requestSearch['listingAccuracy'] == 4 ? 'checked' : ''}}/>
                      C</label>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label class="col col-md-4 control-label" style="padding: 7px 0px 0px 0px;">自走</label>
                  <div class="col col-md-8">
                    <!-- <input type="hidden" name="data[Inquiry][runnable]" id="InquiryRunnable_" value=""/> -->
                    <label class="radio-inline" for="selfRunningAll">
                      <input type="radio" name="data[selfRunning]" id="selfRunningAll" value="0" {{$requestSearch['selfRunning'] === 0 ? 'checked' : ''}}/>
                      全て</label>
                    <label class="radio-inline" for="selfRunningPossible">
                      <input type="radio" name="data[selfRunning]" id="selfRunningPossible" value="1" {{$requestSearch['selfRunning'] == 1 ? 'checked' : ''}}>
                      可能</label>
                    <label class="radio-inline" for="selfRunningNo">
                      <input type="radio" name="data[selfRunning]" id="selfRunningNo" value="2" {{$requestSearch['selfRunning'] == 2 ? 'checked' : ''}}/>
                      不可</label>
                  </div>
                </div>
                <div class="form-group col col-md-4">
                  <label class="col col-md-4 control-label" style="padding: 7px 0px 0px 0px;">査定サービス</label>
                  <div class="col col-md-8">
                    <!-- <input type="hidden" name="service_" id="" value=""/> -->
                    <label class="radio-inline" for="assessmentServiceNone">
                      <input type="radio" name="data[assessmentService]" id="assessmentService" value="1" {{$requestSearch['assessmentService'] == 1 ? 'checked' : ''}}/>
                      無し</label>
                    <label class="radio-inline" for="assessmentServiceTravel">
                      <input type="radio" name="data[assessmentService]" id="assessmentServiceTravel" value="2" {{$requestSearch['assessmentService'] == 2 ? 'checked' : ''}}/>
                      出張査定</label>
                    <label class="radio-inline" for="assessmentServiceBring-in">
                      <input type="radio" name="data[assessmentService]" id="assessmentServiceBring-in" value="3" {{$requestSearch['assessmentService'] == 3 ? 'checked' : ''}}/>
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
            <a id="btnClear" name="clear" class="btn btn-default col-md-12" style="margin: 245px 0px 0px;" href="inquiries">クリア</a>
            <!-- <input id="btnClear" name="clear" class="btn btn-default col-md-12" style="margin: 245px 0px 0px;" type="reset" value="クリア"/> -->
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
            <th style="width: 75px;">@sortablelink('sellerCarInformation.displacement', '排気量')</th>
            <th style="width: 100px;">@sortablelink('sellerCarInformation.car_year', '年式')</th>
            <th style="width: 90px;">@sortablelink('sellerCarInformation.mileage', '走行距離')</th>
            <th style="width: 50px;"><a href="/inquiries?sort=Inquiry.registrant&amp;direction=asc">自走</a></th>
            <th style="width: 60px;">@sortablelink('sellerCarStatus.status', '状況')</th>
            <th style="width: 75px;">@sortablelink('sellerCarStatus.re_tel_date', '再TEL日')</th>
            <th style="width: 70px;">@sortablelink('sellerCarStatus.tel_number_again', '再TEL回数')</th>
            <th style="width: 100px;">@sortablelink('sellerCarStatus.first_inquiry_date', '初回問合日')</th>
            <th style="width: 100px;">@sortablelink('updated_date', '最終問合日')</th>
            <th style="width: 100px;"><a href="/inquiries?sort=Inquiry.registrant&amp;direction=asc">初回対応者</a></th>
            <th style="width: 90px;">@sortablelink('sellerCarAssessment.advance_method', '査定サービス')</th>
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
            @if ($inquiry->sellerCarStatus->listing_accuracy != null)
              <td>{{config('constants.listingAccuracy')[$inquiry->sellerCarStatus->listing_accuracy - 1]}}<br />
            @else
              <td><br />
            @endif
              
              <!--id16：予測AA設定機能--></td>
            <td> {{$inquiry->sellerCarInformation->car_name}}</td>
            <td class="text-right">{{number_format($inquiry->sellerCarInformation->displacement)}} cc</td>
            <td>{{$inquiry->sellerCarInformation->car_year}}</td>
            <td class="text-right">{{number_format($inquiry->sellerCarInformation->mileage)}} km</td>
            <td></td>
            @if ($inquiry->sellerCarStatus->situation != null)
              <td class="text-center"><span style="color: deeppink;">{{$inquiry->sellerCarStatus->situation->name}}</span><br /></td>
            @else
              <td class="text-center"><span style="color: deeppink;"></span><br /></td>
            @endif
            <td>{{$inquiry->sellerCarStatus->re_tel_date}}</td>
            <td>{{$inquiry->sellerCarStatus->tel_number_again}}</td>
            <td>{{$inquiry->sellerCarStatus->first_inquiry_date}}</td>
            <td>{{$inquiry->updated_date}}</td>
            <td></td>
            @if ($inquiry->sellerCarAssessment->advance == 1)
                <td>{{config('constants.assessmentService')[$inquiry->sellerCarAssessment->advance_method]}}</td>
            @else
              <td>{{config('constants.assessmentService')[0]}}</td>
            @endif
            <td>今田 なつみ</td>
            <td class="text-center" style="vertical-align: middle;">
              <button class="btn btn-danger btn-xs deleteInquiry" data="{{$inquiry->id}}">削除</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $list_inquiries->links('layouts.pagination') }}
  </div>
  <script type="text/javascript" src="{{ url('js/back_office/inquiry/index.js')}}"></script>
@endsection

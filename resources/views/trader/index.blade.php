@extends('layouts.master')
@section('title')
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
            $('#ReTELDateFrom').datepicker({
                onClose: function(selectedDate) {
                    $('#FromInquiryDate').datepicker(
                        "option", "maxDate", selectedDate
                    );
                }
            });
            $('#ReTELDateTo').datepicker({
                onClose: function(selectedDate) {
                    $('#FromInquiryDate').datepicker(
                        "option", "maxDate", selectedDate
                    );
                }
            });
            $('#LastTELDateFrom').datepicker({
                onClose: function(selectedDate) {
                    $('#FromInquiryDate').datepicker(
                        "option", "maxDate", selectedDate
                    );
                }
            });
            $('#LastTELDateTo').datepicker({
                onClose: function(selectedDate) {
                    $('#FromInquiryDate').datepicker(
                        "option", "maxDate", selectedDate
                    );
                }
            });
        });
    </script>
@endsection
@section('content')
<body style="padding-top: 65px;">
<div id="container">
    <div id="header"></div>
    <div id="content">
        <style>
            .selected{
                display: inline-block;
                font-weight:normal;
                margin-bottom: 0px;
                padding:7px 0px 0px 20px;
                vertical-align:middle;
                margin-left: 10px;
            }
            .selected input[type=checkbox]{
                margin: 4px 0px 0px -20px;
            }
        </style>
        <div class="col col-md-12">
            <blockquote>業者一覧</blockquote>
        </div>
        <div class="row" style="margin-right: 0px; margin-left: 0px;">
            <div class="col col-md-4">
                <?php
                $url_add = route('trader-add');
                ?>
                <a href="{{$url_add}}" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> 新規業者登録</a></div>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <div class="col-md-12">
            <form action="/trader" class="form-horizontal" id="TraderIndexForm" method="post" accept-charset="utf-8">
                <meta name="csrf-token" content="{{ csrf_token()}}">
                {{ csrf_field() }}
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST"/>
                </div>
                <fieldset class="well form-horizontal col col-md-10">
                    <div class="row">
                        <div class="form-group col col-md-3">
                            <label for="TraderName" class="col col-md-4 control-label">業者名</label>
                            <div class="col col-md-8">
                                <input name="data[trader][name]" maxlength="10" class="form-control input-sm" placeholder="部分一致" type="text"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="TraderPrefId" class="col col-md-4 control-label">都道府県</label>
                            <div class="col col-md-8 required">
                                <select name="data[trader][pref_id]" class="form-control input-sm pref_name" id="TraderPrefId">
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
                        <div class="form-group col col-md-3">
                            <label for="TraderPhoneNumber" class="col col-md-4 control-label">TEL/FAX</label>
                            <div class="col col-md-8">
                                <input name="data[trader][phone_number]" maxlength="13" class="form-control input-sm" placeholder="完全一致" type="tel"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="TraderEmail" class="col col-md-4 control-label">E-mail</label>
                            <div class="col col-md-8">
                                <input name="data[trader][email]" maxlength="13" class="form-control input-sm" placeholder="部分一致" type="tel"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col col-md-3">
                            <label for="TraderEmail" class="col col-md-4 control-label">会員状況</label>
                            <div class="col col-md-8">
                                <input name="data[trader][staff]" maxlength="13" class="form-control input-sm" type="text"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="TraderEmail" class="col col-md-4 control-label">持込査定</label>
                            <div class="col col-md-8">
                                <input name="data[trader][bring_assessment]" maxlength="13" class="form-control input-sm" type="text"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="TraderEmail" class="col col-md-4 control-label">出張査定</label>
                            <div class="col col-md-8">
                                <input name="data[trader][assessment_classification]" maxlength="13" class="form-control input-sm" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col col-md-3">
                            <label for="ReTELDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">営業再TEL日</label>
                            <div class="col col-md-8">
                                <input name="data[trader][service_start_date]" class="form-control input-sm" maxlength="10" id="ReTELDateFrom" autocomplete="off" type="tel"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="ReTELDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                            <div class="col col-md-8">
                                <input name="data[trader][service_end_date]" class="form-control input-sm" maxlength="10" id="ReTELDateTo" autocomplete="off" type="tel"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="LastTELDateFrom" class="col col-md-4 control-label" style="padding: 7px 0px 0px;">営業前回TEL日</label>
                            <div class="col col-md-8">
                                <input name="data[trader][curio_start_date]" class="form-control input-sm" maxlength="10" id="LastTELDateFrom" autocomplete="off" type="tel"/>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label for="LastTELDateTo" class="col col-md-4 text-center form-control-static" style="padding: 7px 0px 0px;">～</label>
                            <div class="col col-md-8">
                                <input name="data[trader][curio_end_date]" class="form-control input-sm" maxlength="10" id="LastTELDateTo" autocomplete="off" type="tel"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col col-md-3">
                            <label class="col col-md-4 control-label">過不足金額</label>
                            <div class="col col-md-8">
                                <label class="radio-inline" for="TraderStopOrder">
                                    <input type="radio" name="data[trader][excess_deficit_money]" id="TraderStopOrder" value="1" />
                                    有</label>
                                <label class="radio-inline" for="TraderStopOrder0">
                                    <input type="radio" name="data[trader][excess_deficit_money]" id="TraderStopOrder0" value="0" />
                                    無</label>
                            </div>
                        </div>
                        <div class="form-group col col-md-3">
                            <label class="col col-md-4 control-label">入札可否</label>
                            <div class="col col-md-8">
                                <label class="radio-inline" for="OrderNo">
                                    <input type="radio" name="data[trader][bid_approval]" id="OrderNo" value="0" />
                                    不可</label>
                                <label class="radio-inline" for="OrderYes">
                                    <input type="radio" name="data[trader][bid_approval]" id="OrderYes" value="1" />
                                    可能</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- </div> -->

                <div class="col col-md-2">
                    <div class="form-group col col-md-5">
                        <button type="submit" name="search" class="btn btn-default col-md-12" style="margin: 183px 0px 0px;"><span class="glyphicon glyphicon-search"></span> 検索</button>
                    </div>
                    <div class="form-group col-md-5">
                        <input  name="clear" class="btn btn-default col-md-12" style="margin: 183px 0px 0px 15px;" type="submit" value="クリア"/>
                    </div>
                </div>
            </form>
        </div>
            <div class="paging">
                {{ $list_trader->links('layouts.pagination') }}
                <?php
                    if (isset($_GET['name'])){
                        $url_page="&name=".$_GET['name']."&phone=".$_GET['phone']."&email=".$_GET['email']."&status=".$_GET['status']."&erea=".$_GET['erea']."&service_start=".$_GET['service_start']."&curio_start=".$_GET['curio_start']."&bring=".$_GET['bring']."&classification=".$_GET['classification']."&service_end=".$_GET['service_end']."&curio_end=".$_GET['curio_end'];
                    }
                    else if (!isset($_GET['name']) && isset($url))
                        {
                            $url_page='&'.$url;
                        }
                    else
                        {
                            $url_page='';
                        }
                        if (isset($_GET['deficit']))
                        {
                            $url_page.="&deficit=".$_GET['deficit'];
                        }
                        if (isset($_GET['bid']))
                        {
                            $url_page.="&bid=".$_GET['bid'];
                        }
                ?>
            </div>
        </div>
    <?php
            if (!isset($_GET['sort']))
             {
                 $sort='asc';
             }
            else if ($_GET['sort']=='asc')
             {
                 $sort='desc';
             }
             else if ($_GET['sort']=='desc')
             {
                 $sort='asc';
             }


    ?>
        <div class="col col-md-12">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th><a class="sort" id="id" href="trader/?column=id&sort=<?php echo $sort ?><?php echo $url_page ?>">業者コード</a></th>
                    <th style="width: 180px;"><a id="name" class="sort" href="trader/?column=name&sort=<?php echo $sort ?><?php echo $url_page ?>">業者名</a></th>
                    <th style="width: 85px;"><a class="sort" href="trader/?column=zip_code&sort=<?php echo $sort ?><?php echo $url_page ?>">郵便番号</a></th>
                    <th style="width: 170px;"><a class="sort" href="trader/?column=address&sort=<?php echo $sort ?><?php echo $url_page ?>">住所</a></th>
                    <th style="width: 150px;"><a class="sort" href="trader/?column=phone&sort=<?php echo $sort ?><?php echo $url_page ?>">電話番号</a></th>
                    <th style="width: 125px;"><a class="sort" href="trader/?column=fax&sort=<?php echo $sort ?><?php echo $url_page ?>">FAX番号</a></th>
                    <th style="width: 100px;"><a class="sort" href="trader/?column=member_status&sort=<?php echo $sort ?><?php echo $url_page ?>">会員状況</a></th>
                    <th style="width: 100px;"><a class="sort" href="trader/?column=credit&sort=<?php echo $sort ?><?php echo $url_page ?>">与信額</a></th>
                    <th style="width: 100px;"><a class="sort" href="trader/?column=excess_deficit_money&sort=<?php echo $sort ?><?php echo $url_page ?>">過不足金額</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=bring_assessment&sort=<?php echo $sort ?><?php echo $url_page ?>">持込査定可否区分</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=assessment_classification&sort=<?php echo $sort ?><?php echo $url_page ?>">出張査定可否区分</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=assessment_classification&sort=<?php echo $sort ?><?php echo $url_page ?>">入札可否区分</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=name&sort=<?php echo $sort ?><?php echo $url_page ?>">買取台数（累積）</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=name&sort=<?php echo $sort ?><?php echo $url_page ?>">買取台数（当月）</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=name&sort=<?php echo $sort ?><?php echo $url_page ?>">入札数（累積）</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=name&sort=<?php echo $sort ?><?php echo $url_page ?>">入札数（当月）</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=name&sort=<?php echo $sort ?><?php echo $url_page ?>">落札台数（累積）</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=complaint_count&sort=<?php echo $sort ?><?php echo $url_page ?>">落札台数（当月）</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=complaint_count&sort=<?php echo $sort ?><?php echo $url_page ?>">顧客クレーム回数</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=claim_number&sort=<?php echo $sort ?><?php echo $url_page ?>">業者クレーム回数</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=furigana_phone&sort=<?php echo $sort ?><?php echo $url_page ?>">営業TEL回数</a></th>
                    <th style="width: 100px;"><a class="sort" href="trader/?column=service_date&sort=<?php echo $sort ?><?php echo $url_page ?>">営業再TEL日</a></th>
                    <th style="width: 50px;"><a class="sort" href="trader/?column=curio_date&sort=<?php echo $sort ?><?php echo $url_page ?>">営業前回TEL日</a></th>
                    <th style="width: 100px;"><a class="sort" href="trader/?column=account_holder&sort=<?php echo $sort ?><?php echo $url_page ?>">営業TEL最終対応者</a></th>
                    <th style="width: 150px;"><a class="sort" href="trader/?column=remark&sort=<?php echo $sort ?><?php echo $url_page ?>">営業架電備考</a></th>
                    <th style="width: 150px;"><a class="sort" href="trader/?column=remark1&sort=<?php echo $sort ?><?php echo $url_page ?>">備考</a></th>
                </tr>
                </thead>
                <tbody>
                @if(count($list_trader)==0)
                    <tr>
                        <td colspan="26">No data!</td>
                    </tr>
                @endif
                @foreach($list_trader as $row_trader)
                    <?php
                    $url_edit = route('trader-edit', ['id' => $row_trader['id']]);
                    ?>
                    <tr>
                        <td><a href="{{$url_edit}}">{{$row_trader['id']}}</a></td>
                        <td>{{$row_trader['name']}}<br></td>
                        <td>{{$row_trader['zip_code']}}</td>
                        <td> {{$row_trader['address']}}<br><br></td>
                        <td>
                            <div class="col col-md-9 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">{{$row_trader['phone']}}<br>
                            </div>
                            <div class="col col-md-3 text-center" style="border-bottom: 1px dashed rgb(192, 192, 192);"> <a href="/crm/Traders" class="call_phone" incoming_number="03-5937-4886" dial_number="0676707744" speaker_cd="T00120003"><span class="glyphicon glyphicon-phone-alt"></span></a><br>
                            </div>
                        </td>
                        <td>
                            <div class="col col-md-12 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">{{$row_trader['fax']}}<br>
                            </div>
                            <div class="col col-md-12 text-left" style="padding-left: 0px;"></div>
                        </td>
                        <td class="text-center">
                             @if ($row_trader['member_status']==0)
                              {{"非会員"}}
                                 @endif
                             @if ($row_trader['member_status']==1)
                            {{"無料会員"}}
                                 @endif
                             @if ($row_trader['member_status']==2)
                            {{"有料会員"}}
                                 @endif
                             @if ($row_trader['member_status']==3)
                            {{"取引中止"}}
                                 @endif
                        </td>
                        <td class="text-right">{{number_format($row_trader['credit'])}}円</td>
                        <td class="text-right">{{number_format($row_trader['excess_deficit_money'])}}円</td>
                        <td class="text-center">{{$row_trader['bring_assessment']==1?'不可':'可'}}</td>
                        <td class="text-center">{{$row_trader['assessment_classification']=='1'?'不可':'可'}}</td>
                        <td class="text-center">{{$row_trader['bid_approval']==1?' 不可':'可'}}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-center">{{$row_trader['complaint_count']}}</td>
                        <td class="text-center">{{$row_trader['claim_number']}}</td>
                        <td class="text-center">{{$row_trader['furigana_phone']}}</td>
                        <td class="text-center">{{date("d-m-Y", strtotime($row_trader['service_date']))}}</td>
                        <td class="text-center">{{date("d-m-Y", strtotime($row_trader['curio_date']))}}</td>
                        <td class="text-center">{{$row_trader['account_holder']}}</td>
                        <td class="text-center">{{$row_trader['remark']}}</td>
                        <td class="text-center">{{$row_trader['remark1']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <div class="paging">
        {{ $list_trader->links('layouts.pagination') }}
    </div>
    </div>
</div>
<script type="text/javascript" src="{{ url('js/back_office/trader/trader_index.js')}}"></script>
@endsection

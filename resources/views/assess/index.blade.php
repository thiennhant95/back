@extends('layouts.master')
@section('title')
(10)社内システム:査定員一覧
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
@section('content')
<?php 
    
    $url_index = route('assess');
  ?>
<div id="container">
  <div id="header"></div>
  <div id="content"> 
    <!--  app/View/photographers/index.ctp -->  
    <div class="col col-md-12">
      <blockquote>現地査定員</blockquote>
    </div>
    <div class="col col-md-12"> <a href="/assess/add" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> 新規査定員登録</a></div>
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
      <form action="/assess" class="form-horizontal" id="photographerIndexForm" method="post" accept-charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         {{ csrf_field() }}
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST"/>
        </div>
        <div class="col col-md-9">
          <div class="well">
            <fieldset>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="photographerphotographerCd" class="col col-md-4 control-label">登録番号</label>
                  <div class="col col-md-8 required">
                    <input name="data[photographer][photographer_cd]" class="form-control input-sm ime-disabled" maxlength="5" placeholder="完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="photographerName" class="col col-md-4 control-label">氏名</label>
                  <div class="col col-md-8">
                    <input name="data[photographer][name]" class="form-control input-sm" maxlength="10" placeholder="部分一致" type="text"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="photographerPhoneNumber" class="col col-md-4 control-label">電話番号</label>
                  <div class="col col-md-8">
                    <input name="data[photographer][phone_number]" class="form-control input-sm ime-disabled" maxlength="13" placeholder="完全一致" type="tel"/>
                  </div>
                </div>
                <div class="form-group col col-md-3">
                  <label for="photographerEmail" class="col col-md-4 control-label">メール</label>
                  <div class="col col-md-8">
                    <input name="data[photographer][email]" class="form-control input-sm ime-disabled" maxlength="100" placeholder="完全一致" type="email"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col col-md-3">
                  <label for="photographerPrefId" class="col col-md-4 control-label">都道府県</label>
                  <div class="col col-md-8">
                    <select name="data[photographer][pref_id]" class="form-control input-sm pref_name" id="photographerPrefId">
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
                  <label for="photographerAreaCode" class="col col-md-4 control-label">住所</label>
                  <div class="col col-md-8">
                    <input name="data[photographer][address]" class="form-control input-sm ime-disabled" maxlength="100" placeholder="" type="text"/>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="col col-md-3">
          <div class="col col-md-3">
            <button type="submit" name="search" class="btn btn-default col-md-12" style="margin: 60px 0px 0px;"><span class="glyphicon glyphicon-search"></span> 検索</button>
          </div>
          <div class="form-group col-md-3">
            <a href="{{ $url_index }}"><input  name="clear" class="btn btn-default col-md-12" style="margin: 60px 0px 0px;" type="button" value="クリア"/></a> 
          </div>
        </div>
      </form>
    </div>
      <div class="paginate_assess">
        {{ $list_assess->links('layouts.pagination') }}
      </div>
    </div>
    <div class="col col-md-12">
      <table class="table table-striped table-bordered table-hover table-condensed ajax-sort">
        <thead>
          <tr>
            <th><span class="sort" onmouseover="show_pointer(1)" style="color: #2A39FF" id="id">登録番号</span></th>
            <th><span class="sort" onmouseover="show_pointer(2)" style="color: #2A39FF" id="name">氏名</span></th>
            <th><span class="sort" onmouseover="show_pointer(3)" style="color: #2A39FF" id="phonetic">電話番号</span></th>
            <th><span class="sort" onmouseover="show_pointer(4)" style="color: #2A39FF" id="email1">メールアドレス</span></th>
            <th>査定回数</th>
            <th><span class="sort" onmouseover="show_pointer(5)" style="color: #2A39FF" id="report_delivery_method">査定レベル</span></th>
            <th><span class="sort" onmouseover="show_pointer(6)" style="color: #2A39FF" id="number_complain">クレーム回数</span></th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($list_assess as $assess)
          <?php 
            $url = route('assess-edit', ['id' => $assess->id]); 
            $url_delete = route('assess-delete', ['id' => $assess->id]);
          ?>
          <tr>
            <td><a href="{{ $url }}">{{ $assess->id }}</a></td>
            <?php 
              $name = explode('|',$assess->name);
              $family_name = $name[0];
              $first_name = '';
              if(isset($name[1]))
              {
                $first_name = $name[1];
              }
            ?>
            <td>{{ $family_name }}{{ $first_name }}</td>
            <td><div class="col col-md-10 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">{{ $assess->phone1 }}</div>
              <div class="col col-md-2 text-center" style="border-bottom: 1px dashed rgb(192, 192, 192);"> <a href="/crm/photographers" class="call_phone" incoming_number="{{ $assess->phonet1 }}" dial_number="{{ $assess->phonet1 }}" speaker_cd="{{ $assess->id }}"><span class="glyphicon glyphicon-phone-alt"></span></a> <br>
              </div></td>
            <td><div class="col col-md-12 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">{{ $assess->email1 }}<br>
              </div>
              <div class="col col-md-12 text-left" style="padding-left: 0px;"></div></td>
            <td>{{ $assess->assessment_frequency }}</td>
            <td>{{ $assess->report_delivery_method }}</td>
            <td class="text-right" style="vertical-align: middle;">{{ $assess->number_complain }}回</td>
            <td class="text-center" style="vertical-align: middle;"><form action="{{ $url_delete }}" name="post_5a793d5ccfac9381289341" id="post_5a793d5ccfac9381289341" style="display:none;" method="post">
                <input type="hidden" name="_method" value="POST"/>
              </form>
              <a href="{{ $url_delete }}" class="btn btn-danger btn-xs" onclick="if (confirm(&#039;削除してよろしいですか？ # <?php echo $assess->id ?>?&#039;)) { document.post_5a793d5ccfac9381289341.submit(); } event.returnValue = false; return false;">削除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      <div class="paginate_assess">
        {{ $list_assess->links('layouts.pagination') }}
      </div>
    </div>
  </div>
<script type="text/javascript" src="{{ url('js/back_office/assess/assess_index.js')}}"></script>
<script>
  $(function() {
  $("#photographerIndexForm").validate({
    rules: {
      "data[photographer][photographer_cd]": {
        number: true
      },  
    }
  })
})
</script>
@endsection
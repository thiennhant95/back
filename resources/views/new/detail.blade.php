@extends('layouts.master')
@section('title')
(10)社内システム:問合管理
@endsection
@section('script')

@endsection
@section('content')
<div id="container">
    <div id="header"></div>
    <div id="content">
        <div class="col col-md-12">
            <blockquote>新着情報</blockquote>
        </div>
        <div class="col col-md-12">
            @if(Session::has('flash_messages'))
            <div class="alert alert-{!! Session::get('results') !!}">
                {!! Session::get('flash_messages') !!}
            </div>
            @endif
            <form action="{{$method}}" class="well form-horizontal" id="TraderEditForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div style="display:none;">
                    <input type="hidden" name="_method" value="POST" />
                </div>
                <input type="hidden" name="data[id]" id="new_id" value="{{$id}}" />
                <input type="hidden" name="data[image]" id="new_image" value="{{$image}}" />
                <fieldset>
                    <div class="form-group col col-md-12">
                        <label class="col col-md-2 control-label">表示日付</label>
                        <div class="col col-md-5 slectwday">
                           <div class="col-md-3">
                            <select name="data[year]" class="form-control col-md-10 slectw80">
                             @for ($i = 0; $i < count($years); $i++)
                             @if ($year == $years[$i])
                             <option  selected="selected" value="{{$years[$i]}}">{{$years[$i]}}</option>
                             @else
                             <option value="{{$years[$i]}}">{{$years[$i]}}</option>
                             @endif

                             @endfor
                         </select> <span>年</span>
                     </div>
                     <div class="col-md-3">
                      <select name="data[month]" class="form-control col-md-10 slectw80">
                        @for ($i = 0; $i < count($months); $i++)
                        @if ($month == $months[$i])
                        <option  selected="selected" value="{{$months[$i]}}">{{$months[$i]}}</option>
                        @else
                        <option value="{{$months[$i]}}">{{$months[$i]}}</option>
                        @endif
                        @endfor
                    </select> <span>月</span>
                </div>
                <div class="col-md-3">
                  <select name="data[day]" class="form-control col-md-10 slectw80">
                    @for ($i = 0; $i < count($days); $i++)
                    @if ($day == $days[$i])
                    <option  selected="selected" value="{{$days[$i]}}">{{$days[$i]}}</option>
                    @else
                    <option value="{{$days[$i]}}">{{$days[$i]}}</option>
                    @endif
                    @endfor
                </select> <span>日</span>
            </div>
        </div>
    </div>
    <div class="form-group col col-md-12 required">
        <label for="TraderTraderName" class="col col-md-2 control-label">ジャンル</label>
        <div class="col col-md-5 required">
            <select name="data[category]" class="form-control">
                <option value="">----------</option>
                @foreach($categories as $category_key => $category_value)
                @if($category_value->id == $news_category_id)
                <option  selected="selected" value="{{$category_value->id}}">{{$category_value->name}}</option>
                @else
                <option  value="{{$category_value->id}}">{{$category_value->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col col-md-12">
        <label for="TraderTraderKanaName" class="col col-md-2 control-label">タイトル</label>
        <div class="col col-md-5">
            <input name="data[title]" class="form-control hiragana" maxLength="100" type="text" value="{{$title}}" />
        </div>
    </div>
    <div class="form-group col col-md-12">
        <label for="TraderZipCode" class="col col-md-2 control-label">本文</label>
        <div class="col col-md-5">
            <textarea class="form-control" name="data[content]">{{$content}}</textarea>
        </div>
    </div>
    <div class="form-group col col-md-12">
        <label for="" class="col col-md-2 control-label">画像</label>
        <div class="col col-md-2">
            <div style="margin-top:5px">
                <input name="upfile" id="upfile" accept="image/*" type="file">
            </div>
        </div>
    </div>
    <div class="form-group col col-md-12">
        <label for="" class="col col-md-2 control-label">表示/非表示</label>
        <div class="col col-md-5">
            <label class="radio-inline" for="show">
                <input type="radio" name="data[show]" id="show" value="1" {{($show == 1 ? 'checked': '')}} />
          有</label>
          <label class="radio-inline" for="show1">
              <input type="radio" name="data[show]" id="show1" value="0"  {{($show == 0 ? 'checked': '')}}  />
          無</label>
      </div>
  </div>

  <div class="col col-md-10 col-md-offset-2">
    <input class="btn btn-default" id="submit" type="submit" value="上記の内容で登録する" />
    <a class="btn btn-default" style="margin-left:15px" href="/">プレビューを見る</a>
</div>
<div class="col col-md-10 col-md-offset-2" style="margin-top:15px">
    <a class="btn btn-default" href="/news">リスト画面へ戻る</a>
</div>
</fieldset>
</form>
</div>
</div>
<div id="footer">
    <p></p>
</div>
</div>
@endsection
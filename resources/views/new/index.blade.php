@extends('layouts.master')
@section('title')
(10)社内システム:問合管理
@endsection
@section('script')

@endsection
@section('content')
<div id="container">
    <div id="header"></div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
         {{ csrf_field() }}
    <div id="content">
        <div class="col col-md-12">
            <blockquote>新着情報</blockquote>
        </div>
        <div class="row" style="margin-right: 0px; margin-left: 0px;">
            <div class="col col-md-4">
                <a href="/news/add" class="btn btn-primary btn-small" style="margin: 0px 15px 20px 0px;"><span class="glyphicon glyphicon-plus"></span> 新着情報</a></div>
        </div>
        {{ $list_news->links('layouts.pagination') }}
        <div class="col col-md-12">
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width: 100px;">@sortablelink('date_display', '表示日付')</th>
                        <th style="width: 100px;">画像</th>
                        <th style="width: 200px;">@sortablelink('newCategory.name', 'カテゴリー')</th>
                        <th style="width: 400px;">@sortablelink('title', 'タイトル')</th>
                        <th style="width: 100px;">編集</th>
                        <th style="width: 100px;">@sortablelink('title', '表示状態')</th>
                        <th style="width: 100px;">削除</th>
                        <th style="width: 100px;">プレビュー</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($list_news as $news)
                    <tr>
                        <td>{{ $news -> date_display}}</td>
                        <td><img src="{{ url($news->image)}}" alt="" class="imgresize" style="width:80px !important"></td>
                        <td>
                            @if($news->news_category_id === 1)
                                <span class="spanclpink">{{$news->newCategory->name}}</span>
                            @else
                                <span class="spanclpink" style="background:#337ab7 !important">{{$news->newCategory->name}}</span>
                            @endif
                        </td>
                        <td>{{$news->title}}</td>
                        <td><a href="/news/edit/{{$news -> id}}" style="color: #333 !important;"><button class="btn">編集</button></a></td>
                        <td><button class="btn updateShow" data="{{$news->id}}" data-show="{{$news->show}}">@if($news->show === 1) 
                                    表示中 
                                @else
                                    非表示
                                @endif
                            </button></td>
                        <td><button class="btn deleteNew" data="{{$news->id}}">削除</button></td>
                        <td><button class="btn">プレビュー</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        {{ $list_news->links('layouts.pagination') }}
    </div>
    <div id="footer">
        <p></p>
    </div>
</div>
<script type="text/javascript" src="{{ url('js/back_office/news/index.js')}}"></script>
@endsection
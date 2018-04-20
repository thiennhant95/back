<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="ja">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>@yield('title')</title>
<link href="{{ url('favicon.ico') }}" type="image/x-icon" rel="icon" />
<link href="{{ url('favicon.ico') }}" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui-1.10.3.custom.css') }}" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="{{ url('css/colorbox.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/teisei.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/default.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/body.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/addstyle.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/autocomplete.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/prefSelectExtension.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/mileageSelectExtension.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.4.1/hint.min.css" />
<link rel="stylesheet" type="text/css" href="{{ url('css/darktooltip.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/lightbox.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}" />
<script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
</head>

<body style="padding-top: 65px;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid clr">
    <div class="navbar-header"> <strong><a class="navbar-brand" href="#">スマオク管理システム</a></strong> </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li> <a href="/inquiries">問合管理</a> </li>
        <li> <a href="/order">出品管理</a> </li>
        <li> <a href="/assess">査定員管理</a></li>
        <li> <a href="/trader">業者管理</a> </li>
        <li> <a href="/user">ユーザー管理</a> </li>
        <li> <a href="/news">新着情報</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <p class="navbar-text"></p>
        </li>
        <li>
            <?php
            $days = array("日","月","火","水","木","金","土");
            ?>
          <p class="navbar-text">{{date('Y').'年'.date('m').'月'.date('d').'日'.'('.($days[@date("w")]).')'}}</p>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 阿部 薫 <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <li><a href="#">パスワード変更</a></li>
            <li class="divider"></li>
            <li><a href="{{url('logout')}}">ログアウト</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
@yield('content')
<div id="footer">
    <p></p>
  </div>
</div>
</body>

<script type="text/javascript" src="{{ url('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery.ui.datepicker-ja.js') }}"></script>
<script type="text/javascript" src="{{ url('js/HolidayChk.js') }}"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('js/jquery.colorbox-min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/prefSelectExtension.js') }}"></script>
<script type="text/javascript" src="{{ url('js/clicktocall.js') }}"></script>
<script type="text/javascript" src="{{ url('js/valueconvertor.js') }}"></script>
<script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script type="text/javascript" src="{{ url('js/jquery.disableOnSubmit.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ url('js/prefSelectExtension.js') }}"></script>
<script type="text/javascript" src="{{ url('js/mileageSelectExtension.js')}}"></script>
<script type="text/javascript" src="{{ url('js/lightbox.js')}}"></script>
<script type="text/javascript" src="{{ url('js/jquery.validate-1.14.0.min.js')}}"></script>
<script type="text/javascript" src="{{ url('js/jquery-validate.bootstrap-tooltip.js')}}"></script>
<script>
  var base_url = "{{ url('/') }}";
</script>

@yield('script')
</html>
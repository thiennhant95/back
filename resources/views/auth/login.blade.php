<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="ja">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>社内システム:ログイン</title>
<link href="{{ url('favicon.ico') }}" type="image/x-icon" rel="icon" />
<link href="{{ url('favicon.ico') }}" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui-1.10.3.custom.css') }}" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="{{ url('css/colorbox.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/teisei.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/default.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/body.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/autocomplete.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/prefSelectExtension.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('css/mileageSelectExtension.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.4.1/hint.min.css" />
<link rel="stylesheet" type="text/css" href="{{ url('css/darktooltip.min.css') }}" />

<script type="text/javascript" href="{{ url('js/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" href="{{ url('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
<script type="text/javascript" href="{{ url('js/jquery.ui.datepicker-ja.js') }}"></script>
<script type="text/javascript" href="{{ url('js/HolidayChk.js') }}"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" href="{{ url('js/jquery.colorbox-min.js') }}"></script>
</head>
<body style="padding-top: 65px;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header"> <strong><a class="navbar-brand" href="">社内システム</a></strong> </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?php
            $days = array("日","月","火","水","木","金","土");
          ?>
          <p class="navbar-text">{{date('Y').'年'.date('m').'月'.date('d').'日'.'('.($days[@date("w")]).')'}}</p>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div id="container">
  <div id="header"></div>
  <div id="content">
    @if(count($errors)>0)
      <div class="alert alert-danger">
        @foreach($errors->all() as $err)
          {{$err}}<br>
      @endforeach
      </div>
    @endif
    @if(session('message'))
      <div class="alert alert-danger">
      {{session('message')}}
      </div>
    @endif
    <form action="checkLogin" class="well form-horizontal" id="EmployeeLoginForm" method="post" accept-charset="utf-8">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div style="display:none;">
        <input type="hidden" name="_method" value="POST"/>
      </div>
      <div id="login_box" style="text-align: center; vertical-align: middle; " >
        <table style="margin:0 auto;">
          <tr>
            <th colspan="2"><img src="{{url('')}}/images/login_viewimg.png" alt="" /></th>
          </tr>
          <tr>
            <th>ユーザー名</th>
            <td><div class="form-group required">
                <div class="col col-md-9 required">
                  <input name="username" class="form-control" maxlength="30" type="text" id="EmployeeUsername" required="required"/>
                </div>
              </div></td>
          </tr>
          <tr>
            <th>パスワード</th>
            <td><div class="form-group">
                <div class="col col-md-9">
                  <input name="password" class="form-control" minlength="6" type="password" required="required" id="EmployeePassword"/>
                </div>
              </div></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><div class="form-group" >
                <div class="col col-md-9 col-md-offset-3">
                  <input  class="btn btn-default" id="roguin_button_ss" type="submit" value="ログイン"/>
                </div>
              </div></td>
          </tr>
        </table>
      </div>
      <!-- end-login_box -->
    </form>
    <div id="message"> </div>
    <style>
#login_box input{
	width:400px;
	height:40px;
}
#login_box #roguin_button_ss{
	width:150px;

}
#login_box th{
	padding-right:20px;
}
FORM#EmployeeLoginForm.well.form-horizontal{
	width:600px;
	margin:0 auto;
	text-align:center;
}
DIV#flashMessage.message{
	width:600px;
	margin:0 auto;
	padding-top:15px;
	text-align:center;
	color:#CC0000;
	font-size:1.5em;
}
</style>
  </div>
  <div id="footer">
    <p></p>
  </div>
</div>
</body>
</html>


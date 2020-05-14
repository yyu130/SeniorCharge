
@extends('homelayout')
@section('mycontent')
<!DOCTYPE html>
<html>
<head>
    <title>Sr.charge Admin CMS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
    </style>
</head>
<body style="background-color: #f0efef">
<br />
<div class="container box">
    <h3 align="center">Sr.charge Admin CMS</h3><br />

    @if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block">
        <strong>Welcome to Sr.charge CMS, {{ Auth::user()->email }}</strong>
        <br />
        <br />
<!--        <ul class="nav justify-content-center">-->
            <li class="nav-item" style="list-style-type: none">
                <a class="nav-link" href="/station">Station</a>
            </li>
            <li class="nav-item" style="list-style-type: none">
                <a class="nav-link" href="/review">Review</a>
            </li>
            <li class="nav-item" style="list-style-type: none">
                <a class="nav-link" href="{{ url('/main/logout') }}">Logout</a>
                <!--                    <a class="nav-link" href="/station">Review</a>-->
            </li>
<!--        </ul>-->


    </div>
    @else
    <script>window.location = "/main";</script>
    @endif

    <br />
</div>
</body>
</html>
@endsection

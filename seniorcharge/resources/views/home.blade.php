@extends('homelayout')
@section('title','Senior Charge')
@section('mycontent')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/custom.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom-style.css" >

<!--    <title>Welcome to Sr.Charge</title>-->
<style>

    #search{
        font-weight: bold;
        font-family: Apple SD Gothic Neo;
        font-size: 20px;
    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 8px;
        font-size: 15px;
        border: 1px solid grey;
        width: 80%;
        background: #f1f1f1;
    }

    form.example Button {
        border-radius: 8px;
        padding: 8px;
        background: green;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example Button:hover {
        background: forestgreen;
    }

    .background {
        position: relative;
        background-image: url('{{asset('image/finalhome.jpg')}}');
        background-size: cover;
        margin: 100px;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .footer{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        /*background-color: white;*/
        color: #333333;
        text-align: center;
    }

    .text{
        /*position: fixed;*/
        left: 0;
        /*bottom: 0;*/
        width: 100%;
        /*background-color: white;*/
        color: #333333;
        text-align: center;
    }

    #bg{
        height: auto;
        padding-top: 150px;
        background-image: url('{{asset('image/finalhome.jpg')}}');
        background-size: cover;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--<div class="background">-->
<!--    <h1>Free Charging?</h1>-->
<!--    <form action="/search" method="POST" role="search" class="example" style="margin-right: auto;max-width:330px">-->
<!--        {{ csrf_field() }}-->
<!--        <div class="input-group">-->
<!--            <input type="text" class="form-control" name="q"-->
<!--                   placeholder="Search postcode/suburb here...">-->
<!--            <span>-->
<!--                     <button type="submit" id="submitBtn" class="fa fa-search">-->
<!--						<span id="search">SEARCH</span>-->
<!--					</button>-->
<!--				</span>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!--<head>-->
<!--<div class="container">-->
<!--    <div class="collapse navbar-collapse" style="margin-top: auto">-->
<!--    <a href="/" class="navbar-brand" >-->
<!--        <img src="{{asset('image/green.png')}}" alt="" class="d-inline-block align-top" height="100" width="300">-->
<!--    </a>-->
<!--    </div>-->
<!--</div>-->
<!--</head>-->

<!--<nav class="navbar navbar-expand-lg navbar-light bg-white">-->
<!--    <div>-->
<!--        <a href="/" class="navbar-brand">-->
<!--            <img src="{{asset('image/homelogo.png')}}" alt="" class="d-inline-block align-middle" height="150" width="400">-->
<!--        </a>-->
<!--    </div>-->
<!--</nav>-->
<!--<br><br>-->
<!--<div class="jumbotron background mb-0 jumbotron-fluid" style="height: 500px; padding-top: 150px;">-->
<!--<div class="jumbotron background mb-0 jumbotron-fluid" style="height: 500px; padding-top: 150px;">-->
<!--    <div class="container">-->
<!--        <div class="row align-items-center">-->
<!--            <div class="col">-->
<!---->
<!--                <div class="col-md-4 text-light">-->
<!--                    <h1 class="display-5" style="color: #588D6A; font-weight: bold;font-size: 48px; font-family: Arial">Free Charging?</h1>-->
<!--                    <p style="color: white; font-family: Arial;font-size: 34px; font-weight: bold">Your Postcode/Suburb</p>-->
<!--                    <p style="width: 300px; color: white; font-size: 20px; font-family: Arial;">Enter your postcode or suburb to find your nearest free charging place</p>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-6">-->
<!--                    <form action="{{route('searchFor')}}" class="example" style="margin-right: auto;max-width:300px; ">-->
<!--                                {{ csrf_field() }}-->
<!--                                <div class="input-group">-->
<!--                                    <input type="text" class="form-control" name="q"-->
<!--                                           placeholder="Search postcode/suburb here..." style="border-radius: 8px;background-color: #ffffff">-->
<!--                                    <p></p>-->
<!--                                        <span>-->
<!--                                             <button type="submit" id="submitBtn" class="fa fa-search" style="background-color: #588D6A">-->
<!--                        						<span id="search">SEARCH</span>-->
<!--                        					</button>-->
<!--                        				</span>-->
<!--                                </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="jumbotron background mb-0 jumbotron-fluid" style="height: 500px; padding-top: 150px;">-->
<!--<body class="background">-->
<!--<div class="jumbotron mb-0 jumbotron-fluid">-->
<!--    <div class="container">-->
<!--        <div class="row align-items-center">-->
<!--            <div class="col" style="background-color: #f0efef; width:350px; height: 500px; text-align: center">-->
<!--                <div class="col-md-4 text-light" style="display: inline-block">-->
<!--                    <h1 class="display-5" style="color: #588D6A; font-weight: bold;font-size: 48px; font-family: Impact;text-align: center">Free Charging?</h1>-->
<!--                    <p style="color: #3d4738; font-family: Avenir;font-size: 34px; font-weight: bold;text-align: center">Your Postcode</p>-->
<!--                    <p style="color: #3d4738; font-size: 20px; font-family: Avenir;text-align: center">Enter your postcode or suburb to find your nearest free charging place</p>-->
<!---->
<!--                    <form action="{{route('searchFor')}}" class="example" style="text-align: center ">-->
<!--                        {{ csrf_field() }}-->
<!--                        <div class="input-group">-->
<!--                            <input type="text" class="form-control" name="query"-->
<!--                                   placeholder="Search postcode/suburb here..." style="border-radius: 8px;background-color: #ffffff">-->
<!--                            <p></p>-->
<!--                            <span>-->
<!--                                <button type="submit" id="submitBtn" class="fa fa-search" style="background-color: #588D6A">-->
<!--                                    <span id="search">SEARCH</span>-->
<!--                                </button>-->
<!--                            </span>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                    <div class="container">-->
<!--                        @if (session()->has('success_message'))-->
<!--                        <div class="alter alter-success">-->
<!--                            {{session() -> get('success_message')}}-->
<!--                        </div>-->
<!--                        @endif-->
<!---->
<!--                        @if (count($errors) > 0)-->
<!--                        <div class="alter alter-danger">-->
<!--                            <ul>-->
<!--                                @foreach ($errors->all() as $error)-->
<!--                                <li style="font-size: 20px;font-family: Arial;color: red">{{$error}}</li>-->
<!--                                @endforeach-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        @endif-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--<div class="jumbotron mb-0 jumbotron-fluid" style="height: 800px;" id="bg">-->
<!--    <div class="container">-->
<!--                <div class="row align-items-center">-->
<!--                    <div class="col">-->
<!--                        <div class="col-md-4 text-light" style="width: max-content;background-color: #f0efef">-->
<!--                            <h1 class="display-5" style="color: #588D6A; font-weight: bold;font-size: 48px; font-family: Arial">Free Charging?</h1>-->
<!--                            <p style="color: #3D4738; font-family: Arial;font-size: 34px; font-weight: bold">Your Postcode/Suburb</p>-->
<!--                            <p style="width: 300px; color: #3D4738; font-size: 20px; font-family: Arial;">Enter your postcode or suburb to find your nearest free charging place</p>-->
<!---->
<!---->
<!--                            <form action="{{route('searchFor')}}" class="example" style="margin-right: auto;max-width:300px; ">-->
<!--                                        {{ csrf_field() }}-->
<!--                                        <div class="input-group">-->
<!--                                            <input type="text" class="form-control" name="q"-->
<!--                                                   placeholder="Search postcode/suburb here..." style="border-radius: 8px;background-color: #ffffff">-->
<!--                                            <p></p>-->
<!--                                                <span>-->
<!--                                                     <button type="submit" id="submitBtn" class="fa fa-search" style="background-color: #588D6A">-->
<!--                                						<span id="search">SEARCH</span>-->
<!--                                					</button>-->
<!--                                				</span>-->
<!--                                        </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--    </div>-->
<!--</div>-->
<!--<footer>-->
<!--    <div class="footer">-->
<!--@ 2020 Sr.Charge. All Rights Reserved * Terms and Conditions * Privacy Policy-->
<!--    </div>-->
<!--</footer>-->
<!--</body>-->
<body style="background-color: #f0efef">
<div class="jumbotron mb-0 jumbotron-fluid" style="height: 650px; padding-top: 150px;" id="bg">
    <div class="container" >
<!--        <div class="row align-items-center" style="float: left">-->
<!--            <div class="col" style="background-color: #f0efef; width:350px; height: 500px; text-align: center">-->
<!--                <div class="col" style="background-color: #f0efef; float: left; text-align: center">-->

                <div class="col-md-4 text-light" style="background-color: #f0efef;width:320px; height: 450px; text-align: center">
                    <h1 class="display-5" style="color: #588D6A; font-weight: bold;font-size: 48px; font-family: Impact;text-align: center">Free Charging?</h1>
                    <p style="color: #3d4738; font-family: Avenir;font-size: 34px; font-weight: bold;text-align: center">Your Postcode</p>
                    <p style="color: #3d4738; font-size: 20px; font-family: Avenir;text-align: center">Enter your postcode or suburb to find your nearest free charging place across Melbourne</p>

                    <form action="{{route('searchFor')}}" class="example" style="text-align: center ">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="query"
                                   placeholder="Search postcode/suburb here..." style="border-radius: 8px;background-color: #ffffff">
                            <p></p>
                            <br>
                        </div>
                        <br>
                        <span>
                                <button type="submit" id="submitBtn" class="fa fa-search" style="background-color: #588D6A">
                                    <span id="search">SEARCH</span>
                                </button>
                            </span>
                    </form>
                    <div class="container">
                        @if (session()->has('success_message'))
                        <div class="alter alter-success">
                            {{session() -> get('success_message')}}
                        </div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alter alter-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li style="font-size: 20px;font-family: Arial;color: red">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
    </div>
</div>
</body>
@endsection






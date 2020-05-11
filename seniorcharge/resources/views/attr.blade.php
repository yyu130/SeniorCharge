@extends('layout')
@section('title','Attributions')
@section('mycontent')
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
<link rel="stylesheet" href="css/custom.css" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom-style.css" >

<!--    <title>Welcome to Sr.Charge</title>-->

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
<div class="container" style="margin: auto">
    <h5 style="font-weight: bold;
        color: #588D6A;
        font-size: 30px;
        font-family: Arial;">
    The site would like to attribute the resources used for the website:
    </h5>
    <ul>
        <br>
        <li style="list-style-type: circle">Library location were retrieved from Department of Premier and Cabinet - Locations of Public Libraries in Victoria – April 04, 2020 - <a href="https://data.gov.au/dataset/ds-vic-77d8ec1d-09f1-4b12-a50a-46ed662b980b/details?q=library%20victoria">https://data.gov.au/dataset/ds-vic-77d8ec1d-09f1-4b12-a50a-46ed662b980b/details?q=library%20victoria</a>
        </li>
        <br>
        <li style="list-style-type: circle">All icons used are from <a href="https://www.flaticon.com/">https://www.flaticon.com/</a></li><br>
        <li style="list-style-type: circle">All images used are from <a href="https://unsplash.com/">https://unsplash.com/</a></li>
    </ul>
</div>
<!--<div class="footer">-->
<!--    @ 2020 Sr.charge. All Rights Reserved * Terms and Conditions * Privacy Policy-->
<!--</div>-->
<!--</body>-->
@endsection






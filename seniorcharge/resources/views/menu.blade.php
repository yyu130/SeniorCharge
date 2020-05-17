<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--    <style>-->
<!--        * {-->
<!--            box-sizing: border-box;-->
<!--        }-->
<!---->
<!--        form.example input[type=text] {-->
<!--            padding: 8px;-->
<!--            font-size: 15px;-->
<!--            border: 1px solid grey;-->
<!--            width: 80%;-->
<!--            background: #f1f1f1;-->
<!--        }-->
<!---->
<!--        form.example Button {-->
<!--            border-radius: 8px;-->
<!--            padding: 7px;-->
<!--            background: #588D6A;-->
<!--            color: white;-->
<!--            font-size: 15px;-->
<!--            border: 1px solid grey;-->
<!--            border-left: none;-->
<!--            cursor: pointer;-->
<!--        }-->
<!---->
<!--        form.example Button:hover {-->
<!--            background: forestgreen;-->
<!--        }-->
<!--        body {-->
<!--            margin: 0;-->
<!--            font-family: Arial, Helvetica, sans-serif;-->
<!--        }-->
<!---->
<!--        .topnav {-->
<!--            overflow: hidden;-->
<!--            /*background-color: #333;*/-->
<!--        }-->
<!---->
<!--        .topnav a {-->
<!--            float: left;-->
<!--            display: block;-->
<!--            color: Black;-->
<!--            text-align: center;-->
<!--            padding: 14px 16px;-->
<!--            text-decoration: none;-->
<!--            font-size: 17px;-->
<!--            font-weight: bold;-->
<!--        }-->
<!---->
<!--        .topnav a:hover {-->
<!--            background-color: #ddd;-->
<!--            color: black;-->
<!--        }-->
<!---->
<!--        .topnav a.active {-->
<!--            /*background-color: lightgreen;*/-->
<!--            color: White;-->
<!--        }-->
<!---->
<!--        .topnav .icon {-->
<!--            display: none;-->
<!--        }-->
<!---->
<!--        @media screen and (max-width: 600px) {-->
<!--            .topnav a:not(:first-child) {display: none;}-->
<!--            .topnav a.icon {-->
<!--                float: right;-->
<!--                display: block;-->
<!--            }-->
<!--        }-->
<!---->
<!--        @media screen and (max-width: 600px) {-->
<!--            .topnav.responsive {-->
<!--                position: relative;-->
<!--            }-->
<!---->
<!--            .topnav.responsive .icon {-->
<!--                position: absolute;-->
<!--                right: 0;-->
<!--                top: 0;-->
<!--            }-->
<!--            .topnav.responsive a {-->
<!--                float: none;-->
<!--                display: block;-->
<!--                text-align: left;-->
<!--            }-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<nav class="navbar navbar-expand-lg navbar-light" style="background: #F0efef">-->
<!--    <div class="container">-->
<!--        <form action="{{route('searchFor')}}" class="example" style="margin-right: auto">-->
<!--            {{ csrf_field() }}-->
<!--            <div class="input-group">-->
<!--                <input type="text" class="form-control" name="query"-->
<!--                       placeholder="Search..." style="border-radius: 8px;width: 150px">-->
<!--                <span>-->
<!--					<button type="submit" id="submitBtn" style="background-color: #588D6A;border-radius: 8px" class="fa fa-search">-->
<!--						<span id="search"></span>-->
<!--					</button>-->
<!--                </span>-->
<!--            </div>-->
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
<!--        </form>-->
<!---->
<!--        <div class="container" style="text-align: center">-->
<!--            <a href="/" class="navbar-brand"  style="margin: auto">-->
<!--                <img src="{{asset('image/homelogo.png')}}" alt="" class="d-inline-block align-top" height="150" width="400">-->
<!--            </a>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--    <div class="topnav" id="myTopnav">-->
<!--        <a  style="font-weight: bold; font-size: 30px; font-family: Arial;color: #588D6A" href="/" class="nav-item nav-link @yield('menu_home')"> Home </a>-->
<!--    </div>-->
<!--</nav>-->
<!---->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #hide {
            -moz-animation: cssAnimation 0s ease-in 5s forwards;
            /* Firefox */
            -webkit-animation: cssAnimation 0s ease-in 5s forwards;
            /* Safari and Chrome */
            -o-animation: cssAnimation 0s ease-in 5s forwards;
            /* Opera */
            animation: cssAnimation 0s ease-in 5s forwards;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
        }
        @keyframes cssAnimation {
            to {
                width:0;
                height:0;
                overflow:hidden;
            }
        }
        @-webkit-keyframes cssAnimation {
            to {
                width:0;
                height:0;
                visibility:hidden;
            }
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
            padding: 7px;
            background: #588D6A;
            color: white;
            font-size: 15px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }
        form.example Button:hover {
            background: forestgreen;
        }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .topnav {
            overflow: hidden;
            /*background-color: #333;*/
        }
        .topnav a {
            float: left;
            display: block;
            color: Black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .topnav a.active {
            /*background-color: lightgreen;*/
            color: White;
        }
        .topnav .icon {
            display: none;
        }
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }
        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>
<div class="container" style="text-align: center" id="hide">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alter alter-danger">
        <ul style="list-style-type: none">
            @foreach ($errors->all() as $error)
            <li style="font-size: 20px;font-family: Arial;color: red">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #F0efef"
    <div class="collapse navbar-collapse">
        <a href="/" class="navbar-brand" >
            <img src="{{asset('image/logo.png')}}" alt="" class="d-inline-block align-top" height="150" width="350">
        </a></div>
    <div class="container" style="width: auto;margin-right: 250px">
        <form action="{{route('searchFor')}}" class="example" style="margin-right: auto">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="query"
                       placeholder="Search..." style="border-radius: 8px;width: 300px">
                <span style="margin-left: 5px">
					<button type="submit" id="submitBtn" style="background-color: #588D6A;border-radius: 8px" class="fa fa-search">
						<span id="search"></span>
					</button>
                </span>
            </div>
        </form>
<!--        <div class="container">-->
<!--            @if (session()->has('success_message'))-->
<!--            <div class="alter alter-success">-->
<!--                {{session() -> get('success_message')}}-->
<!--            </div>-->
<!--            @endif-->
<!---->
<!--            @if (count($errors) > 0)-->
<!--            <div class="alter alter-danger">-->
<!--                <ul>-->
<!--                    @foreach ($errors->all() as $error)-->
<!--                    <li style="font-size: 20px;font-family: Arial;color: red">{{$error}}</li>-->
<!--                    @endforeach-->
<!--                </ul>-->
<!--            </div>-->
<!--            @endif-->
<!--        </div>-->
    </div>
    <div class="topnav" id="myTopnav" style="margin-right: 200px">
        <a  style="font-weight: bold; font-size: 30px; font-family: Arial;color: #588D6A" href="/" class="nav-item nav-link @yield('menu_home')"> Home </a>
        <!--    <a href="/find" class="nav-item nav-link @yield('menu_find')"> Find Station </a>-->
        <!--    <a href="javascript:void(0);" class="icon" onclick="myFunction()">-->
        <!--        <i class="fa fa-bars"></i>-->
        <!--    </a>-->
    </div>
</nav>

<!--<script>-->
<!--    function myFunction() {-->
<!--        var x = document.getElementById("myTopnav");-->
<!--        if (x.className === "topnav") {-->
<!--            x.className += " responsive";-->
<!--        } else {-->
<!--            x.className = "topnav";-->
<!--        }-->
<!--    }-->
<!--</script>-->

</body>
</html>

<!---->
<!--<style>-->
<!--    * {-->
<!--        box-sizing: border-box;-->
<!--    }-->
<!---->
<!--    form.example input[type=text] {-->
<!--        padding: 8px;-->
<!--        font-size: 15px;-->
<!--        border: 1px solid grey;-->
<!--        width: 80%;-->
<!--        background: #f1f1f1;-->
<!--    }-->
<!---->
<!--    form.example Button {-->
<!--        border-radius: 8px;-->
<!--        padding: 8px;-->
<!--        background: red;-->
<!--        color: white;-->
<!--        font-size: 17px;-->
<!--        border: 1px solid grey;-->
<!--        border-left: none;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    form.example Button:hover {-->
<!--        background: #FE2E2E;-->
<!--    }-->
<!--</style>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!---->
<!--<nav class="navbar navbar-expand-lg navbar-light" style="background: mediumseagreen"-->
<!--    <div class="collapse navbar-collapse">-->
<!--        <a href="/" class="navbar-brand">-->
<!--            <img src="{{asset('image/white.png')}}" alt="" class="d-inline-block align-top" height="60" width="200">-->
<!--        </a>-->
<!--        <form action="/search" method="POST" role="search" class="example" style="margin-right: auto;max-width:200px">-->
<!--            {{ csrf_field() }}-->
<!--            <div class="input-group">-->
<!--                <input type="text" class="form-control" name="q"-->
<!--                       placeholder="Search...">-->
<!--                <span>-->
<!--					<button type="submit" id="submitBtn" class="fa fa-search">-->
<!--						<span id="search"></span>-->
<!--					</button>-->
<!--                </span>-->
<!---->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
<!--    <div class="navbar-nav" >-->
<!--        <a href="/" class="nav-item nav-link @yield('menu_home')"> Home </a>-->
<!--        <a href="/find" class="nav-item nav-link @yield('menu_find')"> Find Station </a>-->
<!--    </div>-->
<!--</a>-->
<!--</nav>-->
<!---->
<!---->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
<nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #F0efef"
    <div class="collapse navbar-collapse">
        <a href="/" class="navbar-brand" style="margin: auto">
            <img src="{{asset('image/logo.png')}}" alt="" class="d-inline-block align-top" height="150" width="400">
        </a>
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

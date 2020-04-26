<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

    #search{
        font-weight: bold;
        font-family: Arial;
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

    #background {
        position: relative;
        background-image: url('{{asset('image/finalhome.jpg')}}');
        background-size: cover;
        margin: 100px;
        background-position: center center;
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
<head>
<div class="container">
    <div class="collapse navbar-collapse" style="margin-top: auto">
    <a href="/" class="navbar-brand" >
        <img src="{{asset('image/green.png')}}" alt="" class="d-inline-block align-top" height="100" width="300">
    </a>
    </div>
</div>
</head>

<body id="background">
<!--<div class="jumbotron background mb-0 jumbotron-fluid" style="height: 500px; padding-top: 150px;">-->
<div class="jumbotron mb-0 jumbotron-fluid">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">

                <div class="col-md-4 text-light">
                    <h1 class="display-5" style="color: #588D6A; font-weight: bold;font-size: 48px; font-family: Arial">Free Charging?</h1>
                    <p style="color: white; font-family: Arial;font-size: 34px; font-weight: bold">Your Postcode/Suburb</p>
                    <p style="width: 300px; color: white; font-size: 20px; font-family: Arial;">Enter your postcode or suburb to find your nearest free charging place</p>
                </div>

                <div class="col-md-6">
                    <form action="{{route('searchFor')}}" class="example" style="margin-right: auto;max-width:300px; ">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Search postcode/suburb here..." style="border-radius: 8px;background-color: #ffffff">
                                    <p></p>
                                        <span>
                                             <button type="submit" id="submitBtn" class="fa fa-search" style="background-color: #588D6A">
                        						<span id="search">SEARCH</span>
                        					</button>
                        				</span>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<footer>
    <div class="footer">
@ 2020 Sr.Charge. All Rights Reserved * Terms and Conditions * Privacy Policy
    </div>
</footer>

</html>







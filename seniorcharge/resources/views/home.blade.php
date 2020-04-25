<html>
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
        background-image: url('{{asset('image/newhome.jpg')}}');
        background-size: contain;
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
        background-color: mediumseagreen;
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
<div class="collapse navbar-collapse">
    <a href="/" class="navbar-brand" style="position: fixed">
        <img src="{{asset('image/green.png')}}" alt="" class="d-inline-block align-top" height="100" width="300">
    </a>
</div>

<body id="background">
<!--<div class="jumbotron background mb-0 jumbotron-fluid" style="height: 500px; padding-top: 150px;">-->
<div class="jumbotron mb-0 jumbotron-fluid" style="height: 500px; padding-top: 150px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">

                <div class="col-md-4 text-light">
                    <h1 class="display-5" style="color: green">Free Charging?</h1>
                    <h3 style="width: 300px; color: green">Enter your postcode or suburb to find your nearest free charging place</h3>
                </div>

                <div class="col-md-6">
                    <form action="{{route('searchFor')}}" class="example" style="margin-right: auto;max-width:300px; ">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Search postcode/suburb here..." style="border-radius: 8px">
                                    <p></p>
                                        <span>
                                             <button type="submit" id="submitBtn" class="fa fa-search">
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
        900 Dandenong Rd
        <br>Caulfield Eest VIC 3145
        <br>(03) 9903 2000

        <br><br>@2020 Sr.Charge
    </div>
</footer>

</html>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt"
          crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"
            integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.bundle.min.js"
            integrity="sha384-Iep5TjrwnXOp2AdreAjhlprhxI5Ix8Y3I/zJd1tNQZQmonaE3i6fTdrvIG9YjOWl"
            crossorigin="anonymous"></script>
    <title>@yield('title', "Senior Charge")</title>
</head>
<body>
<!--    <div class="container">-->
@include('cmsMenu')
@yield('mycontent')
<!--@include('footer')-->
<!--    </div>-->
</body>
</html>

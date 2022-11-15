<html>
<head>
<style>

body {
        background-color: #92a8d1;
    } 

    h1 {
    width:500px;
    margin: 0 auto;
    text-align: center;
    }

    .custom {
        width: 420px !important;
    }

    
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 



</head>

<body class="bg-info">
<br> <h1>Welcome to Dashboard </h1> <br> <br>
<div class="container text-center" >


<a class="btn btn-primary btn-lg custom" href=""> HOMEPAGE</a> <br> <br>
<a class="btn btn-primary btn-lg custom" href="">Post category</a> <br> <br>
<a class="btn btn-primary btn-lg custom" href="{{route('addJournalist')}}">Add Journalist</a> <br> <br>
<a class="btn btn-primary btn-lg custom" href="{{route('journalistList')}}">View Journalist</a> <br> <br>
@if(Session::get('user')) 
    <a class="btn btn-danger btn-lg btn-block custom" href="/logout">Logout</a>
@endif

</div>
</body>
</html>
<!-- Question 2:
Create a small micro-service in a language of your choice that returns the weather for a given zip code or city (only need to implement one way) and deploy it to a Kubernetes cluster. 
Answer 2: While this may not be necessarily a microservice, it is similar in terms of getting/scraping a piece of information from URL and using that info in your webpage.
-->


<!doctype html>
<html>
<head>
<title>My Weather Forecast Webpage</title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<style>
html, body {
height:100%;
}
.container {
background-image:url("background.jpg");
width:100%;
height:100%;
background-size:cover;
background-position:center;
padding-top:100px;
}
.center {
     text-align:center;
}
.white {
color:white;
}
p {
     padding-top:15px;
padding-bottom:15px;
}
button {
     margin-top:20px;
     margin-bottom:20px;
}
.alert {
margin-top:20px;
display:none;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 center">
<h1 class="center white">Weather Predictor</h1>
<p class="lead center white">Enter your city below to get a forecast for theweather.</p>
<form>
<div class="form-group">
<input type="text" class="form-control" name="city" id="city" placeholder="Eg.London, Paris, San Francisco..." />
</div>
<button id="findMyWeather" class="btn btn-success btn-lg">Find My Weather</button>
</form>
<div id="success" class="alert alert-success">Success!</div>
<div id="fail" class="alert alert-danger">Could not find weather data for that city. Please try again.</div>
<div id="noCity" class="alert alert-danger">Please enter a city!</div>
</div>
</div>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></
script>
<script>
$("#findMyWeather").click(function(event) {

event.preventDefault();

$(".alert").hide();

if ($("#city").val()!="") {

$.get("findweather.php?city="+$("#city").val(),
function( data ) {
if (data=="") {
$("#fail").fadeIn();
} else {
$("#success").html(data).fadeIn();
}
});
} else {
$("#noCity").fadeIn();
}
});
</script>
</body>
</html>





<!—findweather.php --> 
<?php
$city=$_GET['city'];

//remove all the unnecessary spaces to get only the city name
$city=str_replace(" ","",$city);

$contents=file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");

//use Regex to extract or scrape the info that you only need
preg_match('/3 Day Weather Forest Summary:<\/b>
<span class="phrase">(.*?)</span>',$contents, $matches);

echo $matches[1];
?>


Rely 

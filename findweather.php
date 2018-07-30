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



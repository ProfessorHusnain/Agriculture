<?php
$cache_file = 'data.json';
$key='ee70b55afa2aba8df28ad06ecd7afdcc';
$cityName='Bahawalnagar';
// if(file_exists($cache_file)){
//   $data = json_decode(file_get_contents($cache_file));
// }else{

  $api_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . urlencode($cityName) . '&appid=' . $key . '&units=metric';;
  //$api_url = 'https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
  $data = file_get_contents($api_url);
  file_put_contents($cache_file, $data);
  $data = json_decode($data);
 
// }
 


/**----------------------------------------------------------------------------------------------- */

$lon = $data->coord->lon;
$lat = $data->coord->lat;
$mainWeather = $data->weather[0]->main;
$description = $data->weather[0]->description;
$icon = $data->weather[0]->icon;
$temp = $data->main->temp;
$feelsLike = $data->main->feels_like;
$pressure = $data->main->pressure;
$humidity = $data->main->humidity;
$windSpeed = $data->wind->speed;
$windDeg = $data->wind->deg;
$clouds = $data->clouds->all;
$country = $data->sys->country;
$name = $data->name;



?>
<style>

  .aqi-value{
    font-family : "Noto Serif","Palatino Linotype","Book Antiqua","URW Palladio L";
    font-size:30px;
    font-weight:bold;
  }
  h1{
    text-align: center;
    font-size:3em;
  }
  .forecast-block{
  	background-color: #fff!important;
  	width:20% !important;
  }
  .title{
  	background-color:#1b262c;
  	width: 100%;
  	color:#fff;
  	margin-bottom:0px;
  	padding-top:10px;
  	padding-bottom: 10px;
  }
  .bordered{
  	border:1px solid #000;
  }
  .weather-icon{
  	width:40%;
  	font-weight: bold;
  	background-color: #1b262c;
  	padding:10px;
  	border: 1px solid #000;
  }
</style>

<?php
  function convert2cen($value,$unit){
    if($unit=='C'){
      return $value;
    }else if($unit=='F'){
      $cen = ($value - 32) / 1.8;
      	return round($cen,2);
      }
  }
?>

  <br>
  
  <div class="row">
    <h4 class="title text-center bordered">Weather Report for <?php echo $name .' ('.$country.')';?></h4>
    <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
      <div class="single bordered" style="padding-bottom:25px;background:url('../img/back.jpg') no-repeat ;border-top:0px;background-size: cover;">
      <div class="container">
  <div class="row">
    <div class="col-sm-6" style="font-size:20px;text-align:left;padding-left:70px; ">
      <div  >  
      <p  style='margin:0;color:black;'>Today Temp</p>
      <p  style='margin:0;color:black;'><?php echo $temp;?> &#8451;</p>
    
    </div>
      <p class="weather-icon" style="width: 100%;">
        <img style="margin-left:-10px;" src="../img/weahter.png">
        <?php echo $description;?>
      </p>
      <div class="weather-icon" style="width: 100%;">
        <p><strong>Wind Speed : </strong><?php echo $windSpeed;?> <?php echo 'm/s';?></p>
        <p><strong>Wind Direction: : </strong><?php echo $windDeg;?> <?php echo 'degrees';?></p>
        <p><strong>Pressure : </strong><?php echo $pressure;?> <?php echo 'hPa';?></p>
     
      </div>
    </div>
    <div class="col-sm-6" style="font-size:20px;text-align:left;padding-left:70px;padding-right:70px;">
    <div >  
      <p style='margin:0;color:black;'>Today Feels</p>
      <p style='margin:0;color:black;'><?php echo $feelsLike;?> &#8451;</p>
    
    </div>
      <p class="weather-icon" style="width: 100%;">
        <img style="margin-left:-10px;" src="../img/weahter.png">
        <?php echo $description;?>
      </p>
      <div class="weather-icon" style="width: 100%;">
        <p><strong>Humidity : </strong><?php echo $humidity;?> <?php '%'?></p>
        <p><strong>Pressure : </strong><?php echo $pressure;?> <?php echo 'hPa';?></p>
        <p><strong>Cloudiness : </strong><?php echo $clouds;?> <?php echo '%';?></p>
      </div>
    </div>
  </div>
</div>

          </div>
    </div>
  </div>
  <br>
 
    
 

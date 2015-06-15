



<?php



$url=explode('/', $_SERVER['REQUEST_URI']);
$func_name=$url[3];
$detail=$func_name;
$trac='?q';
$pos=strpos($detail,$trac);
$div=explode('?q', $detail);
$function_name=$div[0];
$function_name($url);




  

  function weather()
  {
    	//echo $_GET['q'];

    	$url="http://api.openweathermap.org/data/2.5/weather?q=".$_GET['q'];
    	$json=file_get_contents($url);
        $data=json_decode($json,true);
        $k=$data['main']['temp'];
        $c=$k-273;
//Get current Temperature in Celsius ."<br>";
        echo "\"".$c." C \" "."or\"".$k." K \""."<br>";
       // echo $data['main']['temp']."<br>";
//Get weather condition
        echo $data['main']['humidity']."<br>";
        echo $data['weather'][0]['main']."<br>";
//Get cloud percentage
      // echo $data['clouds']['all']."<br>";
//Get wind speed
        //echo $data['wind']['speed']."<br>";
 }

    function greetings()
    {
         $c= $_GET['q'];
         echo "Hello Kitty"."<br>";
         if (strpos($c,'how') !== false) {
             echo "I'm ok .How are you ?";
       }
        if (strpos($c,'good') !== false) {
             echo "Have a good day";
       }

    }





?>

</html>

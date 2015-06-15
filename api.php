



<?php

echo " check Link(1) : https://app0905110.herokuapp.com/index.php/greetings?q=hi%20,how%20are%20u?"."<br>";
echo " check Link(2) : https://app0905110.herokuapp.com/index.php/weather?q=dhaka"."<br>"."<br>"."<br>"."<br>";

$url=explode('/', $_SERVER['REQUEST_URI']);
$func_name=$url[2];
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
		//$cc=count($data['main']['temp'];
		$end=600;
		$start=0;
		
		
        $k=$data['main']['temp'];
        $c=$k-273;
//Get current Temperature in Celsius ."<br>";
$arr = array(
   array(
        "temperature(C)" => $c,
        "temperature (K)" => $k,
		"Humidity"=> $data['main']['humidity'],
		"Weather"=>$data['weather'][0]['main']
		
    ));
	echo json_encode($arr);
  
       
//Get weather condition
      //  echo $data['main']['humidity']."<br>";
        //echo $data['weather'][0]['main']."<br>";
//Get cloud percentage
      // echo $data['clouds']['all']."<br>";
//Get wind speed
        //echo $data['wind']['speed']."<br>";
		
		
 }

    function greetings()
    {
         $c= $_GET['q'];
		 if (strpos($c,'how') !== false && strpos($c,'good') !== false) {
		 $arr = array(
         array(
         "intro" => "Hello Kitty",
       	 "Care" => "I'm ok .How are you ?",
         "greetings" => "Have a good day. Thank you"
			 
       
	   ));
	   echo json_encode($arr);
	   }
	   else if(strpos($c,'how') !== false && strpos($c,'good') !== true)
	   {
	    $arr = array(
         array(
         "intro" => "Hello Kitty",
       	 "Care" => "I'm ok .How are you ?"
         
			 
       
	   ));
	   echo json_encode($arr);
	   }
	   else if(strpos($c,'how') !== true && strpos($c,'good') !== false)
	   {
	    $arr = array(
         array(
         "intro" => "Hello Kitty",
       	   "greetings" => "Have a good day. Thank you"
         
			 
       
	   ));
	   echo json_encode($arr);
	   }
	   else
	   {
	    $arr = array(
         array(
         "intro" => "Hello Kitty"
		 
		   ));
		   echo json_encode($arr);
	   }
	   
	   

    }





?>

</html>

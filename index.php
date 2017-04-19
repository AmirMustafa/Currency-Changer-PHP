<?php

 /*=================================== IP Code: Start ===================================*/ 
  include('connection.php');
  include('header.php');
  include("geo_ip_files/geoipcity.inc");
    include("geo_ip_files/geoipregionvars.php");

    $giCity = geoip_open("geo_ip_files/GeoLiteCity.dat", GEOIP_STANDARD);

    //$ip =$_SERVER['REMOTE_ADDR'];
   $ip = file_get_contents('https://api.ipify.org');
    
    //$ip = "106.222.109.18";
    
    
    $record = geoip_record_by_addr($giCity, $ip);


    echo "<br /><br /><br /><br />";
    
    //echo $ip; die;
    echo "Getting Country and City detail by IP Address <br /><br />";
    echo "IP: " . $ip . "<br /><br />";

    echo "Country Code: " . $record->country_code .  "<br />" .
    "Country Code3: " . $record->country_code . "<br />" .
    "Country Name: " . $record->country_name . "<br />" .
    "Region Code: " . $record->region . "<br />" .
    "Region Name: " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "<br />" .
    "City: " . $record->city . "<br />" .
    "Postal Code: " . $record->postal_code . "<br />" .
    "Latitude: " . $record->latitude . "<`enter code here`br />" .
    "Longitude: " . $record->longitude . "<br />" ;
    //"Metro Code: " . $record->metro_code . "<br />" .
   // "Area Code: " . $record->area_code . "<br />" ; 

   // echo $record->latitude;


//include('footer.php');


 /*=================================== IP Code: End ===================================*/ 

  /*===================Fetching Country Symbol and Code from  DB: Start ==================*/ 

    //$q = "SELECT * FROM currencies WHERE country = '$record->country_name'";
    $q = "SELECT * FROM currencies WHERE country = 'Iran'";
    $r = mysqli_query($conn, $q) or exit(mysqli_error($conn));
    
    //echo $q; die;

    //echo $r; die;

    $fetch = mysqli_fetch_array($r);

    $amount = 500;

   // echo $fetch[4];
    echo "<br><br>";


/*===================Fetching Country Symbol and Code from  DB: End ==================*/


   

/* ======================== Currency Layer Conversion: Start ======================== */

$endpoint = 'convert';
$access_key = '0809400b4f48a8be35f2946b9c1fa4dd';

$from = 'INR';
$to = "$fetch[3]";
// echo $to; die;


// initialize CURL:
$ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// get the (still encoded) JSON data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$conversionResult = json_decode($json, true);

//echo "<pre>";
//print_r($conversionResult);


// access the conversion result
//$a = $conversionResult['success'];
//$a = $conversionResult['error'];

$converted_equivalent_value = $conversionResult['result'];

//echo $converted_equivalent_value;       //converted value stored here


/* ======================== Currency Layer Conversion: End ======================== */

/* ============== Displaying Currency Code with Symbols: Start ================ */

 echo "<h5>Currency: &emsp;$fetch[4]</h5>";

 echo "<h5>Currency Name:  &emsp; $fetch[2] &emsp;  </h5>";

 echo "<h5>Indian Currency: &emsp;&#8377; $amount</h5>";

 echo "<h5>Equivalent Value: &emsp;$fetch[4] $converted_equivalent_value</h5>";

/* ============== Displaying Currency Code with Symbols: End ================ */
    
?>
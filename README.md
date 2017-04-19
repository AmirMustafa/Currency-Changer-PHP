# Currency Changer

This Project generally collects users Country Name from his IP Address, [Currency Layer RESTful API](https://currencylayer.com) is used to convert currency from 1 country's currency
value (set to INR at present)to another's. Additionally being API, it updates itself to the current equivalent price from the market.
Another thing is done, a database table with all the country's code Currency Name, Currency HTML code is provided which is fetched to display.
Previews are added for better understanding. Technology used is PHP<br/><br/><br/>


## Installation
1. Clone or Download the repository and keep it in server or local server(like XAMPP).
2. Create a database and upload the currencies.sql file
3. Open connection.php and configure your database like below
```
<?php
	
	$conn = mysqli_connect("localhost", "your_username", "your_password", "your_database_name");

?>
```

4. Open index.php. If you are working on server use $ip =$_SERVER['REMOTE_ADDR'];

```
<?php

 /*=================================== IP Code: Start ===================================*/ 
  include('connection.php');
  include('header.php');
  include("geo_ip_files/geoipcity.inc");
    include("geo_ip_files/geoipregionvars.php");

    $giCity = geoip_open("geo_ip_files/GeoLiteCity.dat", GEOIP_STANDARD);

   $ip =$_SERVER['REMOTE_ADDR'];
   //$ip = file_get_contents('https://api.ipify.org');
```
For locahost use $ip = file_get_contents('https://api.ipify.org');

```
<?php

 /*=================================== IP Code: Start ===================================*/ 
  include('connection.php');
  include('header.php');
  include("geo_ip_files/geoipcity.inc");
    include("geo_ip_files/geoipregionvars.php");

    $giCity = geoip_open("geo_ip_files/GeoLiteCity.dat", GEOIP_STANDARD);

  // $ip =$_SERVER['REMOTE_ADDR'];
 $ip = file_get_contents('https://api.ipify.org');
```

5. Now goto [Currency Layer](https://currencylayer.com) and Signup a Basic Plan(Minimum Paid Plan) You will get your APP KEY, copy it.

6. Open index.php, paste your API Key in the code as shown below:

```
<?php
$endpoint = 'convert';
$access_key = '0809........................4dd';     //Your API KEY

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

?>

```
7. Converted Country is set as per your country as per IP. For testing try Hardcoded value

```
<?php
    //$q = "SELECT * FROM currencies WHERE country = '$record->country_name'";
    $q = "SELECT * FROM currencies WHERE country = 'Iran'";
    $r = mysqli_query($conn, $q) or exit(mysqli_error($conn));

?>
```
  
## Preview


![Screenshot of China Converted Currency Value ](https://cloud.githubusercontent.com/assets/15896579/25192814/5589d5d6-2552-11e7-9bbf-93c818237542.png?raw=true "Screenshot of China Converted Currency Value")
<br/><br/><br/>

![Screenshot of Germany Converted Currency Value ](https://cloud.githubusercontent.com/assets/15896579/25192817/575e9fea-2552-11e7-893f-c1dccc9fe730.png?raw=true "Screenshot of Germany Converted Currency Value")
<br/><br/><br/>

![Screenshot of Iran Converted Currency Value ](https://cloud.githubusercontent.com/assets/15896579/25192818/5979232c-2552-11e7-98ec-9e53f0c6955f.png?raw=true "Screenshot of Iran Converted Currency Value")
<br/><br/><br/>

![Screenshot of Currency Table Page 1](https://cloud.githubusercontent.com/assets/15896579/25192823/5b1ae198-2552-11e7-8cf8-b9017353d904.png?raw=true "Screenshot of Currency Table Page 1")
<br/><br/><br/>

![Screenshot of Currency Table Page 2](https://cloud.githubusercontent.com/assets/15896579/25192825/5eaed850-2552-11e7-850b-dae6f2fe4fe4.png?raw=true "Screenshot of Currency Table Page 2")
<br/><br/><br/>

![Screenshot of Currency Layer Dashboard Page 1](https://cloud.githubusercontent.com/assets/15896579/25192852/767bc790-2552-11e7-9e69-0703c94ed985.png?raw=true "Screenshot of Currency Layer Dashboard Page 1")
<br/><br/><br/>

![Screenshot of Currency Layer Dashboard Page 2](https://cloud.githubusercontent.com/assets/15896579/25193240/076143c4-2554-11e7-9e36-e8f6da131e18.png?raw=true "Screenshot of Currency Layer Dashboard Page 2")
<br/><br/><br/>

![Screenshot of Currency Layer Dashboard Page 3](https://cloud.githubusercontent.com/assets/15896579/25192870/7ef15980-2552-11e7-92a7-084bb42a6556.png?raw=true "Screenshot of Currency Layer Dashboard Page 3")
<br/><br/><br/>

![Screenshot of Currency Layer Dashboard Page 4](https://cloud.githubusercontent.com/assets/15896579/25192875/840ec196-2552-11e7-8437-085430df8d75.png?raw=true "Screenshot of Currency Layer Dashboard Page 4")
<br/><br/><br/>


<br/><br/><br/>

## License

(The MIT License)

Copyright (c) 2016 Amir Mustafa

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

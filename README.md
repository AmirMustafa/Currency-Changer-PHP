# Currency Changer

This Project generally collects users Country Name from his IP Address, [Currency Layer RESTful API](https://currencylayer.com) is used to convert currency from 1 country's currency
value (set to INR at present)to another's. Additionally being API, it updates itself to the current equivalent price from the market.
Another thing is done, a database table with all the country's code Currency Name, Currency HTML code is provided which is fetched to display.
Previews are added for better understanding. Technology used is PHP<br/><br/><br/>


## Installation
1. Clone or Download the repository and keep it in server or local server(like XAMPP).
2. Create a database and upload the currencies.sql file
3. Open connection.php and configure your database like below
```<?php

	
	$conn = mysqli_connect("localhost", "your_username", "your_password", "your_database_name");  // connect to database

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


![Screenshot of LinkedIn Login API Page 1 ](https://cloud.githubusercontent.com/assets/15896579/24588640/a738540a-17e9-11e7-8598-c8584ebf0721.png?raw=true "Screenshot of LinkedIn Login API Page 1")
<br/><br/><br/>

![Screenshot of LinkedIn Login API Page 2](https://cloud.githubusercontent.com/assets/15896579/24588641/aa385376-17e9-11e7-9cf1-320aa39360f6.png?raw=true "Screenshot of LinkedIn Login API Page 2")
<br/><br/><br/>

![Screenshot of LinkedIn Login API Page 3](https://cloud.githubusercontent.com/assets/15896579/24588642/aea3e736-17e9-11e7-96fa-5c13f5e54358.png?raw=true "Screenshot of LinkedIn Login API Page 3")
<br/><br/><br/>

![Screenshot of LinkedIn Login API Page 4](https://cloud.githubusercontent.com/assets/15896579/24588643/b25e04b0-17e9-11e7-9c65-7d3749819624.png?raw=true "Screenshot of LinkedIn Login API Page 4")
<br/><br/><br/>

![Screenshot of LinkedIn APP Dashboard](https://cloud.githubusercontent.com/assets/15896579/24588644/b7978ea6-17e9-11e7-80ef-595f25b69b0d.png?raw=true "Screenshot of LinkedIn APP Dashboard")
<br/><br/><br/>

![Screenshot of LinkedIn APP Dashboard](https://cloud.githubusercontent.com/assets/15896579/24588646/bca3ecfa-17e9-11e7-9489-c92a8a00ae1c.png?raw=true "Screenshot of LinkedIn APP Dashboard")

![Screenshot of LinkedIn APP Dashboard](https://cloud.githubusercontent.com/assets/15896579/24588647/c0acdf00-17e9-11e7-98bf-7f4ee287a500.png?raw=true "Screenshot of LinkedIn APP Dashboard")
<br/><br/><br/>

![Screenshot of LinkedIn APP Dashboard](https://cloud.githubusercontent.com/assets/15896579/24588648/c44372fa-17e9-11e7-96c9-87a907f7139a.png?raw=true "Screenshot of LinkedIn APP Dashboard")


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

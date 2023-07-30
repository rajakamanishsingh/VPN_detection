<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="header">
  <h1>REAL IP DETECTOR</h1>
  <h2>With Geolocation</h2>
  <p>By Rajak Manish Singh</p>
</div>

<div id="navbar">
  <a class="active" href="javascript:void(0)">Home</a>
  <a href="aboutus.html" align=right target="_self">About</a>

</div>

<div class="content"><center>
  <h1 align="center">Enter the ip address  : </h1>
  <form action="home.php" method="get">
      <input type="text" name="ip"><br><br>
      <input type="submit" name="submit">
  </form>
</div></center>
<div class="result">

</div>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {6
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
<?php 
if(isset($_REQUEST["submit"])){
$ip=$_REQUEST["ip"];
$data = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
function curl_download($Url){
  // is cURL installed yet?
  if (!function_exists('curl_init')){
    die('Sorry cURL is not installed!');
  }
 
  // OK cool - then let's create a new cURL resource handle
  $ch = curl_init();
 
  // Now set some options (most are optional)
 
  // Set URL to download
  curl_setopt($ch, CURLOPT_URL, $Url);
 
  // User agent
  curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
 
  // Include header in result? (0 = yes, 1 = no)
  curl_setopt($ch, CURLOPT_HEADER, 0);
 
  // Should cURL return or print out the data? (true = retu rn, false = print)
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
  // Timeout in seconds
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
  // Download the given URL, and return output
  $output = curl_exec($ch);
 
  // Close the cURL resource, and free system resources
  curl_close($ch);
 
  return $output;
}
$x='https://vpnapi.io/api/'.$ip.'?key=71c8Ba3291c94ecab0370c6ee608d792';
$res=curl_download($x);
$res1=explode(" ",$res);
if($data['status'] == 'success') {
    echo" <table class=\"w3-table w3-striped\">";
    echo "<tr><th>IP Address</th><td>".$data['query']."</td></tr>";
    echo "<tr><th>Country code </th><td>".$data['countryCode']."</td></tr>";
    echo "<tr><th>Country      </th><td>".$data['country']."</td></tr>";
    echo "<tr><th>Date & Time  </th><td>".date("F j, Y, g:i a")."</td></tr>";
    echo "<tr><th>Region code  </th><td>".$data['region']."</td></tr>";
    echo "<tr><th>Region       </th><td>".$data['regionName']."</td></tr>";
    echo "<tr><th>City         </th><td>".$data['city']."</td></tr>";
    echo "<tr><th>Zip code     </th><td>".$data['zip']."</td></tr>";
    echo "<tr><th>Time zone    </th><td>".$data['timezone']."</td></tr>";
    echo "<tr><th>ISP          </th><td>".$data['isp']."</td></tr>";
    echo "<tr><th>Organization </th><td>".$data['org']."</td></tr>";
    echo "<tr><th>ASN          </th><td>".$data['as']."</td></tr>";
    echo "<tr><th>Latitude     </th><td>".$data['lat']."</td></tr>";
    echo "<tr><th>Longtitude   </th><td>".$data['lon']."</td></tr>";
    echo "<tr><th>Location     </th><td>".$data['lat'].",".$data['lon']."</td></tr>";
    echo "<tr><th>VPN</th><td>".$res1[19]."</td></tr>";
    echo "<tr><th>PROXY</th><td>".$res1[28]."</td></tr>";
    echo "<tr><th>TOR</th><td>".$res1[37]."</td></tr>";
    echo "\n\n"; 

    echo"</table>";

}
    else {
      echo "Sorry unable to track your IP Address !!!<br>";
      echo " Check your Network connection !!<br>";
      echo "If you are Online then check your IP Address !!<br>";
    }
    


    


  }
?>
</body>
</html>

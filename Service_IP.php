<!DOCTYPE html>
 <html>
 <head>
         <meta charset="utf-8">
         <title>Getting started with Bootstrap</title>
         
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        
         <link rel="stylesheet" href="css/bootstrap.css">
         <style>
       body {
        padding-top: 20px;
        padding-bottom: 60px;
      }
      #map-canvas {
        margin: 0;
        padding: 0;
      }
    </style>
    
 </head>
 <body>
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
         
    
     <div class="container">

        <div class="masthead">
        <h3 class="muted">Wegilant Net Solutions</h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li ><a href="index.html">Home</a></li>
                <li ><a href="index.php" data-toggle="tab">Projects(NA)</a></li>
                <li class="active"><a href="#" onclick="window.location = 'service.html';" data-toggle="tab">Services</a></li>
                <li><a href="../#dropdown1" data-toggle="tab">Downloads(NA)</a></li>
                <li><a href="#dropdown2" data-toggle="tab">About(NA)</a></li>
                <li><a href="#" data-toggle="tab">Contact(NA)</a></li>
              </ul>
                
          
          </div>
            </div>
          </div>
        </div><!-- /.navbar -->
      

      

      <hr>

      <!-- Example row of columns -->
      <div class="row">
          
         
        
            
           <?php  
          if(isset($_POST['address'])) {
            $ip=$_POST['address'];
        $version=$_POST['type'];
        echo '<div class="spanmid4">';
        if($ip) {
            echo '<br>';
        
            
            if($version=="ipv6") {
                $ip="http://smart-ip.net/geoip-xml/".$ip."/aaaa";
            }
            else {
                 $ip="http://smart-ip.net/geoip-xml/".$ip;
            }
            
        }
 else {
     $ip="http://smart-ip.net/geoip-xml";
 }
        
if (($response_xml_data = file_get_contents($ip))===false){
    echo "Error fetching XML\n";
} else {
   libxml_use_internal_errors(true);
   $data = simplexml_load_string($response_xml_data);
   if (!$data) {
       echo "Error loading XML\n";
       foreach(libxml_get_errors() as $error) {
           echo "\t", $error->message;
       }
   } else {
                echo "<legend><h3>Result for: " .$data->host."</h3></legend>";
                echo ' <table class="table table-bordered" width="500">
           
              <tbody>
                <tr>
                  <td>Host</td>
                  <td align="right">'.$data->host.'</td>
                </tr>
                <tr>
                  <td>Country</td>
                  <td>'.$data->countryName.'</td>
                </tr>
                <tr>
                  <td>City</td>
                  <td>'.$data->city.'</td>
                </tr>
                <tr>
                  <td>Region</td>
                  <td>'.$data->region.'</td>
                </tr>
                <tr>
                  <td>Latitude</td>
                  <td>'.$data->latitude.'</td>
                </tr>
                <tr>
                  <td>Longitude</td>
                  <td>'.$data->longitude.'</td>
                </tr>
              </tbody>
              
            </table>
            </div>
                <div class="spanmid4ext" >
                       
            <div id="map-canvas" style="width:540px; height:420px;"></div>
            </div>';
                $long=$data->longitude;
                $latit=$data->latitude;
                
      
   }
}
          }
        
          else {   echo'
              <div class="spanmid">
       <form action="Service_IP.php" method="POST" >
                <form action="IpScan.php" method="POST">
            <fieldset>
            <legend><h3>IP Tracker</h3></legend>
        <label>IP Address</label>
        <input type="text" class="input-medium search-query" name="address" placeholder="172.30.106.132"><br>
       
                  <label> <br>
                    <input type="radio" checked name="type" value="ipv4" />
                    <span>IP Version 4</span>
                  </label>
                 
                  <label>
                    <input type="radio" name="type" value="ipv6" />
                    <span>IP Version 6</span>
                  </label>
        <br>
    <button type="submit" class="btn btn-danger">Submit &raquo;</button>
    </fieldset>
                </form>
                ';}
     ?>

    </div>

        
        </div>
          
        
      </div>
          <br><br>
      <hr>

      <div class="footer">
        <p>&copy; Wegilant 2013</p>
      </div>

    </div> <!-- /container -->
    <script>
var map;
function initialize() {
    
  var long = "<?php echo $long; ?>";
  var latit = "<?php echo $latit; ?>";
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(latit, long),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

    google.maps.event.addDomListener(window, 'load', initialize);

    </script>
     </body>
</html>
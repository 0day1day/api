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
    </style>
    
 </head>
 <body>
         
    
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
          
        <div class="spanmidv" >
            
           <?php  
           
          if(isset($_POST['file'])) {
            $file=$_POST['file'];
        //$version=$_POST['type'];
        
require_once('VirusTotalApi.php');
$api = new VirusTotalAPI('5bd09e6ed8284e3a7ef8c05a90deb3f77fbd6893b3a9545a734772e46d497e06');
$viruslist=array(

                    "MicroWorld-eScan",  
                    "nProtect" ,  
                    "CAT-QuickHeal" ,  
                    "McAfee" ,  
                    "Malwarebytes" ,  
                    "K7AntiVirus" ,  
                    "K7GW" ,  
                    "TheHacker" ,  
                    "NANO-Antivirus" ,  
                    "F-Prot" ,  
                    "Symantec" ,  
                    "Norman" ,  
                    "TotalDefense" ,  
                    "TrendMicro-HouseCall" ,  
                    "Avast" ,  
                    "eSafe" ,  
                    "ClamAV" ,  
                    "Kaspersky" ,  
                    "BitDefender" ,  
                    "Agnitum" ,  
                    "SUPERAntiSpyware" ,  
                    "Sophos" ,  
                    "Comodo" ,  
                    "F-Secure" ,  
                    "DrWeb" ,  
                    "VIPRE" ,  
                    "AntiVir" ,  
                    "TrendMicro" ,  
                    "McAfee-GW-Edition" ,  
                    "Emsisoft" ,  
                    "Jiangmin" ,  
                    "Antiy-AVL" ,  
                    "Kingsoft" ,  
                    "Microsoft" ,  
                    "ViRobot" ,  
                    "GData" ,  
                    "Commtouch" ,  
                    "ByteHero" ,  
                    "VBA32" ,  
                    "PCTools" ,  
                    "ESET-NOD32" ,  
                    "Rising" ,  
                    "Ikarus" ,  
                    "Fortinet" ,  
                    "AVG" ,  
                    "Panda"   
);

          
/* Upload and scan a local file. */
$result = $api->scanFile($file);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
//$api->displayResult($result);

/* Get a file report. */
$report = $api->getFileReport($scanId);
$report1 = $api->getFileReport1($scanId);
echo"<br><br><h2>File Report:</h2><br>";
$k=0;
$problem=0;
$notproblem=0;
while($k<45) {
    if($report1['report'][1][$viruslist[$k]]){
        $problem++;
    }
    else
        $notproblem++;
    
    $k++;
}
//$api->displayResult($report);
            echo '<legend>'.$problem.'<-Problem<br> '.$notproblem.' <-not a problem</legend>';
                echo ' <table class="table table-bordered" width="500">
              <tbody>
              ';
                for($i=0;$i<45;$i++){
                echo '
                <tr>
                  <td>'.$viruslist[$i].'</td>
                  <td align="right">'.$report1['report'][1][$viruslist[$i]].'</td>
              </tr>';
                }
               echo '
              </tbody>
            </table>
            
                ';
                
                
      
   

          
          }
          
     else if(isset($_POST['url'])) {
          
    require_once('VirusTotalApi.php');
$api = new VirusTotalAPI('5bd09e6ed8284e3a7ef8c05a90deb3f77fbd6893b3a9545a734772e46d497e06');
          $urllist=array(
                     "CLEAN MX", 
                    "MalwarePatrol", 
                    "ZDB Zeus", 
                    "K7AntiVirus", 
                    "Quttera", 
                    "Yandex Safebrowsing", 
                    "MalwareDomainList", 
                    "ZeusTracker", 
                    "zvelo", 
                    "Google Safebrowsing", 
                    "Kaspersky", 
                    "BitDefender", 
                    "Opera", 
                    "G-Data", 
                    "C-SIRT", 
                    "CyberCrime", 
                    "Sucuri SiteCheck", 
                    "VX Vault", 
                    "ADMINUSLabs", 
                    "SCUMWARE.org", 
                    "Dr.Web", 
                    "AlienVault", 
                    "Sophos", 
                    "Malc0de Database", 
                    "SpyEyeTracker", 
                    "Phishtank", 
                    "Avira", 
                    "Antiy-AVL", 
                    "Comodo Site Inspector", 
                    "Malekal", 
                    "ESET", 
                    "SecureBrain", 
                    "Websense ThreatSeeker", 
                    "Netcraft", 
                    "ParetoLogic", 
                    "URLQuery", 
                    "Wepawet", 
                    "Fortinet", 
                    "Minotaur", 
          );
          $url=$_POST['url'];
echo "<h3>Result for URL:</h3><h4>".$url."</h4><br>";

$result = $api->scanURL($url);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */

//$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport($url);
$report1 = $api->getURLReport1($url);
//$api->displayResult($report);
echo ' <table class="table table-bordered" width="500">
              <tbody>
              ';
                for($i=0;$i<39;$i++){
                echo '
                <tr>
                  <td>'.$urllist[$i].'</td>
                  <td align="right">'.$report1['report'][1][$urllist[$i]].'</td>
              </tr>';
                }
               echo '
              </tbody>
            </table>
          
      ';
                
                }
          
          else 
              {   echo'
       
                    <ul class="nav nav-tabs">
    <li class="active">
    <a href="#pane1" data-toggle="tab">File Scanner</a>
    </li>
    <li><a href="#pane2" data-toggle="tab">URL Scanner</a></li>
    </ul>
    <div class="tab-content">
        <div id="pane1" class="tab-pane active">
            <form action="filescanner.php" method="POST" >
            <fieldset>
            <legend>File Scanner</legend>
            <label>Filename:</label>
            <input type="file" name="file"  />
            <br><br>
            
            <button type="submit" class="btn btn-danger">Submit &raquo;</button>
            </fieldset>
            </form>
        </div>
        
         <div id="pane2" class="tab-pane">
            <form action="filescanner.php" method="POST" >
            <fieldset>
            <legend>URL Scanner</legend>
            <label>URL:<label>
            <input type="text" name="url" placeholder="www.wegilant.com" /><br/><br>
            <button type="submit" class="btn btn-danger">Submit &raquo;</button>
            </fieldset>
            </form>
        </div>
    </div>
        
                ';}
     ?>

    </div>

        
        </div>
          
        
          <br><br><br>
      <hr>

      <div class="footer">
        <p>&copy; Wegilant 2013</p>
      </div>

    </div> <!-- /container -->
    
     </body>
</html>
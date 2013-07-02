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
       
          
      
            
           <?php  
           error_reporting(0);
          if(isset($_FILES["file"]["name"])) {
              echo ' <div class="spanmidv2" >';
              if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
    echo "<legend>File Information</legend>";
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br>";
  
  move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploads/" . $_FILES["file"]["name"]);
      echo "Moved to: " . "uploads/" . $_FILES["file"]["name"];
      $file="uploads/".$_FILES["file"]["name"];
      chmod($file, 0777);
  }
            //$file1=$_FILES;
           // $file1 = fopen($_FILES["file"]["tmp_name"],'rb');
           // $file = fread($file1,$_FILES["file"]["size"]);
            
            
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
echo"<br><legend>File Report:</legend>";
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
            echo '<span class="label label-success">Not A Virus: </span><span class="badge badge-success">'.$notproblem.'</span><br>
                  <span class="label label-important">Virus File:  </span><span class="badge badge-important"> '.$problem.'</span></div>';
              echo ' <div class="spanmidv2" >';
            echo ' <table class="table table-bordered" width="430">
              <tbody>
              ';
                for($i=0;$i<45;$i++){
                echo '
                <tr>
                  <td>'.$viruslist[$i].'</td>';
                
                if($report1['report'][1][$viruslist[$i]]==NULL) {
                    echo '
                  <td align="right"><i class="icon-ok"></i></td>
              </tr>';
                } 
                else {
                    echo '
                  <td align="right">'.$report1['report'][1][$viruslist[$i]].'</td>
              </tr>';
                }
                }

                 
                
               echo '
              </tbody>
            </table>
            </div>
                ';
                
                
          
          }
          
     else if(isset($_POST['url'])) {
         echo '<div class="spanmidv2" >';
          
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
echo "<legend>Result for URL:</legend>URL: ".$url."<br><legend>Report Summary:</legend>";

$result = $api->scanURL($url);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */

//$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport($url);
$report1 = $api->getURLReport1($url);
//$api->displayResult($report);
$k=0;
$problem=0;
$notproblem=0;
while($k<45) {
    if($report1['report'][1][$urllist[$k]]){
        $problem++;
    }
    else
        $notproblem++;
    
    $k++;
}
$notproblem=$notproblem*100/45;
$problem=$problem*100/45;
 echo '<span class="label label-success">Safe Link: </span><span class="badge badge-success">'.$notproblem.'%</span><br>
                  <span class="label label-important">Malicious Link:  </span><span class="badge badge-important"> '.$problem.'%</span></div>';
          


echo '<div class="spanmidv2"><table class="table table-bordered" width="500">
              <tbody>
              ';
                for($i=0;$i<39;$i++){
                echo '
                <tr>
                  <td>'.$urllist[$i].'</td>';
                       if($report1['report'][1][$urllist[$i]]==NULL) {
                    echo '
                  <td align="right"><i class="icon-ok"></i></td>
              </tr>';
                } 
                else {
                    echo '
                  <td align="right">'.$report1['report'][1][$urllist[$i]].'</td>
              </tr>';
                }
                }
               echo '
              </tbody>
            </table>
          
      ';
                
                }
          
          else 
              {   echo'
        <div class="spanmidv" >
                    <ul class="nav nav-tabs">
    <li class="active">
    <a href="#pane1" data-toggle="tab">File Scanner</a>
    </li>
    <li><a href="#pane2" data-toggle="tab">URL Scanner</a></li>
    </ul>
    <div class="tab-content">
        <div id="pane1" class="tab-pane active">
            <form action="filescanner.php" method="POST" enctype="multipart/form-data" >
            <fieldset>
            <legend>File Scanner</legend>
            <label>Filename:</label>
            <input type="file" name="file"  />
            <br><br>
                <div class="progress progress-striped active" id="changeme" style="display: none;">
    <div class="bar" style="width: 100%; "></div>
    </div>
            <button type="submit" onclick="myfunction()" class="btn btn-danger">Submit &raquo;</button>
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

        
        </div> <!--row-->
          
        
          <br><br><br>
      <hr>

      <div class="footer">
        <p>&copy; Wegilant 2013</p>
      </div>

    </div> <!-- /container -->
    
     </body>
</html>
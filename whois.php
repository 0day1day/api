<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
      
<title>whois.php -base classes to do whois queries with php</title>
<style>
       body {
        padding-top: 20px;
        padding-bottom: 60px;
      }
</style>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
      
         <link rel="stylesheet" href="css/bootstrap.css">
       
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
                <li><a href="#dropdown1" data-toggle="tab">Downloads(NA)</a></li>
                <li><a href="#dropdown2" data-toggle="tab">About(NA)</a></li>
                <li><a href="#" data-toggle="tab">Contact(NA)</a></li>
              </ul>
                
          
          </div>
            </div>
          </div>
        </div><!-- /.navbar -->
      

        

      <hr>
      <?php 
        if(isset($_GET['query'])) {
            $url="http://whomsy.com/api/".$_GET['query']."?output=xml";
if (($response_xml_data = file_get_contents($url))===false){
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
       
   }
}   echo '
        
      
<div class="row">
    <!--results-->
    <p><legend>Results for URL :</legend></p>

      <div class="spanmidWHOIS" >
       <pre>'.$data->success.'</pre>
       
</div>';    
    }
      ?>
<!--/results-->
       

        
    
    <div class="spanmidvns" >
            <form method="get" action="whois.php" >

<legend>Domain Lookup</legend>
<label>Domain Name:</label>
        <input type="text" name="query" placeholder="www.google.com" /><br><br> <input type="submit" class="btn btn-danger" value="Submit &raquo" />
<input type="hidden" name="output" value="normal" />

</form>
 </div>
    
 
      

 </div>
      </div>
    
</body>
</html>
</body>
</html>
<?php

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
}

?>
<div class="row">
    <!--results-->
    <p><legend>Results for URL :</legend></p>

      <div class="spanmidWHOIS" >
       <pre><?php echo $data->success; ?></pre>
       
</div>
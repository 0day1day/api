<?php

require_once('VirusTotalApi.php');
//Get File Name:
$file=$_POST['file'];
$url=$_POST['url'];

if($file) {
    
echo "<h2>Scanning file:</h2>".$file;
}

if($url) {
    echo "<br><h2>Scanning URL:</h2>".$url;
    
}





/* Initialize the VirusTotalApi class. */

$api = new VirusTotalAPI('5bd09e6ed8284e3a7ef8c05a90deb3f77fbd6893b3a9545a734772e46d497e06');

if($file) {
/* Upload and scan a local file. */
$result = $api->scanFile($file);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
echo "<br><h2>Scan ID:</h2>".$scanId;
//$api->displayResult($result);

/* Get a file report. */
$report = $api->getFileReport($scanId);
$report1 = $api->getFileReport1($scanId);
echo"<br><br><h2>File Report:</h2><br>";
$api->displayResult($report);
//Important line below!!!
//echo $report1['report'][1]['AVG'];
//echo"<h2>Submission Date:</h2><br>";
//print($api->getSubmissionDate($report) . '<br>');
echo "<h2>URL Link to Report:</h2><br>";
print($api->getReportPermalink($report, TRUE) . '<br>');

}

echo '<hr>';
/* Scan an URL. */
if($url) {
$url=$_POST['url'];
echo "<h1>Result for URL:</h1>".$url."<br>";

$result = $api->scanURL($url);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */

$api->displayResult($result);

$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport($url);
$api->displayResult($report);
print_r($report);
//print($api->getTotalNumberOfChecks($report) . '<br>');
//print($api->getNumberHits($report) . '<br>');
//print($api->getReportPermalink($report, FALSE) . '<br>');
}

/* Comment on a file. */
//$report = $api->makeCommentOnFile('Hash-of-a-file-to-comment-on', 'Your-comment');
//$api->displayResult($report);

/* Comment on an URL. */
//$report = $api->makeCommentOnURL('URL-to-comment-on', 'Your-comment');
//$api->displayResult($report);

?>
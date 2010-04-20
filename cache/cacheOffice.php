<?
/*
{
      "source":"beanstalkapp",  // identifier of the payload, in case you consume JSON from many vendors.
      "author":"author username",  // username of the author 
      "author_name": "John Doe", // full name of the author
      "author_email": "user@example.com", // email of the author          
      "revision":5, // revision to which the deployment updated
      "comment":"example", // commit message
      "server":"development", // server to which data was deployed 
      "repository":"beanstalk", // repository from which deploy happened
      "repository_url":"https://example.svn.beanstalk.com/example", // source control url of the repository
      "deployed_at":"2010/02/16 15:45:20 +0000" // time when deployment happened - timezone is included.
}
*/
$myFile = 'json.txt';
$intialPayload = json_decode(@file_get_contents('php://input'));
$source = $intialPayload->{'source'};
$fh = fopen($myFile, 'a');

fwrite($fh,"intialPayload: " . $intialPayload . "\n");
fwrite($fh,"source: " . $source . "\n\n");
exit;


if($source=="beanstalkapp"){
	$fh = fopen($myFile, 'a');
	fwrite($fh,"intialPayload: " . $intialPayload . "\n");
	fwrite($fh,"source: " . $source . "\n");
	exit;
}else{
	$fh = fopen($myFile, 'a');
	fwrite($fh,"source: " . $source . "\n");
	exit;

	$arrayName = array('http://www.caboffice.com/ivr/new/gatewayDialog.xml','http://www.caboffice.com/ivr/new/hold_music.xml','http://www.caboffice.com/ivr/new/mainInterface.xml','http://www.caboffice.com/ivr/new/root.xml','http://www.caboffice.com/ivr/new/ccxmlWrapper.xml');
	$url = "http://cachemanager-api.voxeo.net/caching/2.0/management?action=clearcache&accountGUID=3D2BCAF2-0D77-4C17-AAC9-0A6993B7EE40&url=";
	foreach ($arrayName as $line) {
	    echo "<br>" . htmlspecialchars($line) . " - ";
		$ch = curl_init();		 	
		curl_setopt($ch, CURLOPT_URL, $url . urlencode($line));		// grab URL and pass it to the browser
		curl_exec($ch);
		curl_close($ch);   								    // close cURL and free system resources
	}
}
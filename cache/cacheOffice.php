<?
date_default_timezone_set('UTC');

$myFile = 'cacheLog.txt';

$fh = fopen($myFile, 'a');

	$arrayName = array('http://www.caboffice.com/ivr/new/gatewayDialog.xml','http://www.caboffice.com/ivr/new/hold_music.xml','http://www.caboffice.com/ivr/new/mainInterface.xml','http://www.caboffice.com/ivr/new/root.xml','http://www.caboffice.com/ivr/new/ccxmlWrapper.xml');
	$url = "http://cachemanager-api.voxeo.net/caching/2.0/management?action=clearcache&accountGUID=3D2BCAF2-0D77-4C17-AAC9-0A6993B7EE40&url=";

	fwrite ($fh, "\n\n-------------------------\n");
	fwrite ($fh, "Cleared Cache - " . date('D, d M Y H:i:s T') . "\n");
	foreach ($arrayName as $line) {
	    fwrite ($fh, "Cleared URL: " . htmlspecialchars($line) . " ");
		$ch = curl_init();		 	
		curl_setopt($ch, CURLOPT_URL, $url . urlencode($line));		// grab URL and pass it to the browser
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		fwrite ($fh, $result);
		curl_close($ch);   								    // close cURL and free system resources
	}
	fclose($fh);
?>
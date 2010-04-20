<?

if(!$_REQUEST['value']){
	exit;
}else{
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
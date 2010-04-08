<?php
$inputPostal = strtolower($_REQUEST['confirmedDataVariable']);
$inputExt = strtolower($_REQUEST['getExt']);

header("Content-type: text/xml");
echo('<?xml version="1.0" encoding="UTF-8"?>');
echo('<data>');
//$e2=array('tel+14079154335','tel+14079154335');

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// 			CAB COMPANIES, ASSOCIATIVE ARRAY
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

/*
$e1=array(
	'Bob\'s Cab Company'=>'tel:+14074740214',
	'Yellow Cab'=>'tel:+14074740214',
	'Checker Cab'=>'tel:+14074740214'
	);
*/
	
$e1=array(
		'Bob\'s Cab Company'=>'tel:+14074740214'
		);
	
$e2=array(
	'Bob\'s Cab Company'=>'sip:+883510001105747@sbc-staging-internal', 
	'Yellow Cab'=>'sip:+883510001105577@sbc-staging-internal'
	);
	
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// EXTENSIONS FOR APPLICATION, ASSOCIATIVE ARRAY
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$extensionArray = 
		array(
			"123"	=>	"tel:+14079154336",
			"000"	=>	"tel:+14074740214"
		);
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// 								OUTPUT XML DATA
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	if($inputPostal=='e1'){
		foreach ($e1 as $value=>$key) {
			echo('<record>');
			echo('<number>' . $key . '</number>');
			echo('<company>'	. $value . '</company>');
			echo('</record>');
		}
	} 
	elseif ($inputPostal =='e2'){
		foreach ($e2 as $key) {
			echo('<record>' . $key . '</record>');
		}
	}
		elseif (is_numeric($inputExt)){
				if (array_key_exists($inputExt, $extensionArray)) {
					echo('<number>' . $extensionArray[$inputExt] . '</number>');
				}	else{ echo('<number>invalidExtension</number>'); }
		}	else {  
				echo('<record>error</record>');
		}
echo('</data>');
?>
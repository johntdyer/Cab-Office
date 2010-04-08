<?php
	date_default_timezone_set('GMT');
	
	$myFile 		=	"logs/LOGS__".date('Y-m-d-H00').".csv";
	$year 			=	date('Y');
	$timeStamp	=	date('H:i:s');
	
	if(isset($_REQUEST['sessionID']))				$sessionID				= 	$_REQUEST['sessionID'];
	if(isset($_REQUEST['postalCode']))			$postalCode				= 	$_REQUEST['postalCode'];
	if(isset($_REQUEST['callerID']))				$callerID					= 	$_REQUEST['callerID'];
	if(isset($_REQUEST['calledID']))				$calledID					= 	$_REQUEST['calledID'];
	if(isset($_REQUEST['callResultVarVar']))			$callResultVarVar				= 	$_REQUEST['callResultVarVar'];
	if(isset($_REQUEST['totalCallDurationVar']))		$totalCallDurationVar			= 	$_REQUEST['totalCallDurationVar'];
	if(isset($_REQUEST['acceptedCall']))		$cabCompany				= 	$_REQUEST['acceptedCall'];
	if(isset($_REQUEST['transferDuration']))$transferDuration	= 	$_REQUEST['transferDuration'];
	if(isset($_REQUEST['transferResult']))	$transferResult		= 	$_REQUEST['transferResult'];
//	if(isset($_REQUEST['callStartTime']))		$callStartTime		= 	$_REQUEST['callStartTime'];

	if(!file_exists($myFile)){
		touch ($myFile);
		$fh = fopen($myFile, 'a');
		fwrite($fh,"CONFIDENTIAL INFORMATION\n");
		fwrite($fh,"CabOffice CDR - "	.	date('H00')	.	" GMT "	.	$year	.	"\n\n");
		fwrite($fh,"Time Stamp (GMT),SessionID,CallerID,CalledID,Call Duration,Call Result,Postal Code,Cab Company,Transfer Result,Transfer Duration\n");
		fwrite($fh,
			$timeStamp				.",".
			$sessionID				.",".
			$callerID					.",".
			$calledID					.",".
			$totalCallDurationVar			.",".
			$callResultVar				.",".
			$postalCode				.",".
			$acceptedCall			.",".
			$transferResult		.",".
			$transferDuration	.
			"\n");
		fclose($fh);
		
	}else{
		$fh = fopen($myFile, 'a');
		fwrite($fh,		
			$timeStamp				.",".
			$sessionID				.",".
			$callerID					.",".
			$calledID					.",".
			$totalCallDurationVar			.",".
			$callResultVar				.",".
			$postalCode				.",". 
			$acceptedCall			.",". 
			$transferResult		.",".
			$transferDuration	.
			"\n");
		fclose($fh);
		}
?>


<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("sendSurvey");
	$details = Array();
	$details["surveyID"]="SURVEYID";
	$details["user_1"]="ContactID";
    $details["delivery_message"]=$emailmessage["body"];
	$details["delivery_subject"]=$emailmessage["subject"];	
	$details["delivery_by"]="SMS";// Must be set otherwise it will be sent by SMS.
	
                        
	$api2->Data($details);
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any or the send ID.*/
                        
?>                       
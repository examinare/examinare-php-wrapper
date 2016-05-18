<?php 

	include_once("../lib/examinare-api.php");
	
	$key["apicompany"]="XXXX";// Change this to your API company						
	$key["apikey"]="YYYYYY"; // Change this to your API token	
	$key["phonesurveyid"]="ZZZZZZ"; // Change this to Phone Survey ID	
	$key["callerid"]="+17000000"; // Change this to Caller ID (Must be authenticated) and in International Format.			
	/* Change the top information 	according to your account details. */
						
	$phonenumber="+460000000"; // Use this parameter for the phone number.					
						
						
	$api = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api->setCommand("addRecipient");
	$recipient_r = Array();
                        
	$recipient_r["name"]="User at ".$phonenumber;
	$recipient_r["email"]="myname@mydomain.com";
	$recipient_r["group"]="Phone Survey Group";
    $recipient_r["phonenumber"]=$phonenumber;
	                    
	$api->Data($recipient_r);
						
	$person=$api->Execute();
	
	if($person["contacts"]["contact"]["contactID"]!=""){
		$sendcontactid = $person["contacts"]["contact"]["contactID"];
		
		$callapi = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
		$callapi->setCommand("sendPhoneSurvey");
		$callapi->Data(array('surveyID' => $key["phonesurveyid"], 'user_1' => $sendcontactid, 'callerID'=>$key["callerid"]));
		$done=$callapi->Execute();
		if(is_array($done["status"])){
			echo "SUCCESS";
			
			
		}else{
			echo "Here is an error. Sent the following: ";	
			print_r(array('Phone number' => $phonenumber));
			echo "Got the following error data".print_r($done);
		}
	}
	
?>
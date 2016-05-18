<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("addRecipient");
	$recipient_r = Array();
                        
	$recipient_r["name"]="My name";
	$recipient_r["email"]="myname@mydomain.com";
	$recipient_r["group"]="My Group";
                        
	$api2->Data($recipient_r);
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any or the Recipient record to use.*/
                        
?>                       
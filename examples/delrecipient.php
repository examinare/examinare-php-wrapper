<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("delRecipient");
	                        
	$api2->Data(array("contactID"=>"Change with ContactID from Examinare"));
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any.*/
                        
?>                       
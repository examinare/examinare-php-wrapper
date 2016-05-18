<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("listRecipientByCRMSerial");
	
      /* Example for the Zendesk ticket id 1*/ 
                        
	$api2->Data(array("crmserial"=>"Zendesk:1"));
	
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any or the Recipients in an array.*/
                        
?>  
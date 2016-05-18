<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("listSurveysByUser");
	 
	$api2->Data(array("contactID"=>"Contact ID in Examinare"));
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any or the contact information with all Surveys in an array.*/
                        
?>  
<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("listRecipientsToSurvey");
	 
                        
	$api2->Data(array("surveyID"=>"Survey ID of your Survey in Examinare"));
	
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any or the Recipients in an array.*/
                        
?>  
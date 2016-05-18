<?php 						
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	
							
	/* Change the top information 
	according to your account details. */
						
	$api2 = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$api2->setCommand("fetchResults");
	
      
                        
	$api2->Data(array("surveyID"=>"REPLACE WITH YOUR SURVEY ID"));
	// Timestamps are not needed but good to use.
	//This example below is for results between 1 january 2015 and 31 december 2015.
	$api2->Data(array("timestamp1"=>1420070400));//01/01/2015 @ 12:00am (UTC)
	$api2->Data(array("timestamp2"=>1451606400));//01/01/2016 @ 12:00am (UTC)
						
	$result=$api2->Execute();
						
                        
	/* In $result you will now find all 
	returnable errors if any or the Survey Results ready to use.*/
                        
?>  
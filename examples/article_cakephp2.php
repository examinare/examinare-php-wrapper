if($this->request->is('post')){
        
	include_once("../lib/examinare-api.php");
	$key["apicompany"]="XXXX";						
	$key["apikey"]="YYYYYY";	

	$apicreate = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
	$apicreate->setCommand("addRecipient");
	$recipient_r = Array();
                        
	$recipient_r["name"]=$this->request->data['MyModel']['name'];
	$recipient_r["email"]=$this->request->data['MyModel']['email'];	$recipient_r["group"]="My Survey Group";
                        
	$apicreate->Data($recipient_r);	

	$person=$apicreate->Execute();
	// Above code will create the recipient, now we have to mark the person for the survey. 
	if($person["contacts"]["contact"]["contactID"]!=""){
		
		$sendcontactid = $person["contacts"]["contact"]["contactID"];
		
		$apimark = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
		$apimark ->setCommand("markRecipientsToSurvey");
		$apimark ->Data(array('surveyID' => “SURVEY ID FOR YOUR SURVEY”, 'user_1' => $sendcontactid));
		$done=$callapi->Execute();

		// Ok so now we get the Survey ID from the system with the help of the recipients ContactID.
			$apisurveylink = new ExaminareAPIConnector($key["apicompany"],$key["apikey"],"");
			$apisurveylink->setCommand("listSurveysByUser");
	 
			$apisurveylink->Data(array("contactID"=>"Contact ID in Examinare"));
						
			$contactcard_r=$apisurveylink->Execute();		
			
			$urltoredirect = $contactcard_r[“contacts”][“contact”][“surveys”][“surveyInfo”][“ surveyLinkWeb”];

			header(“Location: ”. $urltoredirect);exit();

	}else{
		//The was an error.
	}
}

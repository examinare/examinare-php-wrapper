<?php 
class ExaminareAPIConnector{
public $credentials;
public $command;
public $sendinfo;
public $returnjson=0;

	public function __construct ($apiuser,$apikey,$apiurl){
		if($apiurl==""){$apiurl="api.examinare.com";}
		$url="https://".$apiurl."/framework";
		$companyid=$apiuser;
		$token=$apikey;


		$this->sendinfo['apiKey']=$token;
		$this->sendinfo['apiCompany']=$companyid;
		$this->sendinfo['url']=$url;
		
	}
	public function setCommand($Command){
		$this->sendinfo['Command']=$Command;
	}

	public function Data($sendinfo){
		foreach ($sendinfo as $key => $value)
    	{$this->sendinfo[$key]=$value;}
	}
	public function JsonEnable(){
		$this->returnjson=1;
	}
	public function Execute(){
		$sendinfo=$this->sendinfo;
		$method = "POST";
		$action=$this->sendinfo['url'];
		$fields="";
    	foreach ($sendinfo as $key => $value)
    	{
        	if ($key != 'url')
        	{
            	$fields .= $key . '=' . rawurlencode($value) . '&';
        	}
    	}
			$fields = substr($fields, 0, strlen($fields) - 1);
			$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $action);
    		curl_setopt($ch, CURLOPT_POST, 1);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($ch);
			$info_arrays = curl_getinfo($ch);
			curl_close($ch);
			if($result === false ){
				return false;
			}else{
				if($this->returnjson==1){
				return json_decode($result,1);
				}else{
				return $this->toArray(new SimpleXMLElement($result));
				}
			}
			
		}
	public function toArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);
        
        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = $this->toArray($value);
        }

        return $array;
    }
}
?>
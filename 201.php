<?php
error_reporting(E_ALL & ~E_NOTICE);

header("Content-type:text/html;charset=utf-8");
header('Content-type: application/json');
function GetCurl($url){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

	$_uid=$_GET['uid'];
	if($_uid == "")
	{
		$_uid = "21105423";
	}
	
	$fixfields="http://114.247.41.50:9343/aaa/get/pin?user=".$_uid;
//	$resp = array();
	$resp = GetCurl($fixfields);
	$resp = json_decode($resp);
//	print_r($resp);
//	$resp = json_encode($resp); 
	if($resp->msg == "ok")
	{
		echo $resp->pin;
	}

?>
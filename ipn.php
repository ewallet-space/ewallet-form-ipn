<?php

//Your ID
$mymerchant = "0";

//Don't change anything else here (unless you know what you're doing)
$token = $_POST['token'];
$merchant = $_POST['merchant'];
if((string)$merchant == (string)$mymerchant)
{
	$data = hash('md2', (string)$mymerchant . (string)$_POST['amount'] . (string)$_POST['itemid'] . (string)$_POST['userid'] . (string)$_POST['token']);
	$url = "https://ewallet.space/verifytoken.php";
	$ch = curl_init();
	$post = ['token' => $token,'data' => $data,];
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$verify = curl_exec($ch);
	curl_close ($ch);
	if($verify == "true"){ $spoofed = false; } else { $spoofed = true; }
	if($spoofed == false)
	{
		//Information confirmed
		$amount = (float)$_POST['amount'];
		$itemid =  (int)$_POST['itemid'];
		$userid = (int)$_POST['userid'];
		
		//Process information
		
		
		//Success signal
		echo "OK";
	}
	else
	{
		//Spoofed request, not to be accepted
		echo "FAIL";
	}
}
else
{
	//Spoofed merchantid, not to be accepted
	echo "FAIL";
}

?>

<?php
if(isset($_POST['submit'])){

$otp=mt_rand(100000,999999);
// Send SMS HTTP API
$url="http://panel.adcomsolution.in/http-api.php?username=fasttnet&password=nitin123&senderid=FSTNET&route=1&number=9585850362&message=otp:$otp";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($curl);
$msgid=explode(":",$result);
$msgidis=trim($msgid[1]);
curl_close($curl);

// Delivery Report Status API
// $status_url="http://panel.adcomsolution.in/http-dlr.php?username=fasttnet&password=nitin123&msg_id=$msgidis";
// $curl = curl_init($status_url);
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
// $status = curl_exec($curl);
// curl_close($curl);
}
if(isset($_POST['otp_submit'])){
	$otp_pin=$_POST['otp'];
	if($otp_pin==$otp){
		echo "OTP is verified";
	}
	else{
		echo "OTP Not Verified";
	}

}
?>
<form name="form_otp_verify" action="" method="POST">
<input type="text" name="otp" placeholder="enter your otp">
<input type="submit" name="otp_submit">
</form>
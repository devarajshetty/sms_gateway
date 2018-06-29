<?php
if(isset($_POST['submit'])){
$no=$_POST['mobile'];
$otp=mt_rand(100000,999999);
// Send SMS HTTP API
$url="http://panel.adcomsolution.in/http-api.php?username=fasttnet&password=nitin123&senderid=FSTNET&route=1&number=$no&message=otp:$otp";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($curl);
$msgid=explode(":",$result);
$msgidis=trim($msgid[1]);
curl_close($curl);

}
if(isset($_POST['otp_submit'])){
	$otp_pin=$_POST['otp'];
	$otp=$_POST['odp'];
	if($otp_pin==$otp){
		echo "OTP is verified";
	}
	else{
		echo "OTP is Not Verifieds";
	}

}

?>
<form name="form_otp_verify" action="" method="POST">
<input type="hidden" name="odp" value="<?php echo $otp; ?>">
<input type="text" name="otp" placeholder="enter your otp">
<input type="submit" name="otp_submit">
</form>

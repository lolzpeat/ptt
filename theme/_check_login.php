<?php
session_start();
require_once('nusoap/nusoap.php');
$webserviceURL = "http://www.pttbluecard.com/VLoyaltyExtWS/CustomerService.svc?wsdl";
//$webserviceURL = "http://www.pttbluecard.com/VLoyaltyExtWS/CustomerService.svc?wsdl";
?>
<noscript>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$target = $_POST['target'];
$ws_client = new soapclient($webserviceURL,true); 
$result = $ws_client->call('CheckLogin', array('userName'=>$username,'password'=>$password));
?>
</noscript>
<?php
if($_POST['action']=='checkuser'){
	echo 'result'.$result['CheckLoginResult'];
} else {
	if($result['CheckLoginResult']=='Y'){
		$_SESSION['v_smart_login']='Y';
		$_SESSION['v_smart_username']=$username;
		echo '<form action="https://www.pttbluecard.com/view/authen/AutoLogin.aspx" id="autoform" style="padding:0px">
		<input type="hidden" id="_Username" name="Username" value="'.$username.'"/>
		<input type="hidden" id="_Password" name="Password" value="'.$password.'" />
		<input type="hidden" id="_target" name="target" value="'.$target.'" />
		<!--<input type="submit" id="btnAuto"  />-->
		</form><script language="javascript">document.getElementById("autoform").submit();</script>';
	}else{
		//echo 'No';
		echo '<script>alert("��س��к����ʼ�ҹ");  location="http://www.pttbluesociety.com";</script>';
		//header('location: http://www.pttbluesociety.com');
	}
}
/* returns a result form url */
function curl_get_result($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
?>
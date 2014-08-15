<?php
session_start();
require_once('nusoap/nusoap.php');
?>
<noscript>
<?php
$username = $_POST['Username'];
$password = $_POST['Password'];
$ws_client = new soapclient('http://www.pttbluecard.com/VLoyaltyExtWS/CustomerService.svc?wsdl',true);
$result = $ws_client->call('CheckLogin', array('userName'=>$username,'password'=>$password));
?>
</noscript>
<?php
if($result[CheckLoginResult]=='Y'){
	$_SESSION['v_smart_login']='Y';
	$_SESSION['v_smart_username']=$username;
}else{
	echo 'No';
}

/*$username=$_POST['username'];
$password=$_POST['password'];
$target=$_POST['target'];
$_SESSION['v_smart_login']='Y';
$_SESSION['v_smart_username']=$username;*/
$target = $_POST['target'];
if(!empty($target))
	header('location: '.$target);
?>
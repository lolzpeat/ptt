<?php
session_start();
require_once('nusoap/nusoap.php');
echo $username = $_POST['username'].'</br>';
echo $password = $_POST['password'].'</br>';
$ws_client = new soapclient('http://www.pttbluecard.com/VLoyaltyExtWS/CustomerService.svc?wsdl',true); 
$result = $ws_client->call('CheckLogin', array('userName'=>$username,'password'=>$password));
echo '</br>';
echo $result[CheckLoginResult];
echo '</br>';
if($result[CheckLoginResult]=='Y'){
	echo $_SESSION['v_smart_login']='Y';
	echo '</br>';
	echo $_SESSION['v_smart_username']=$username;
}else{
	echo 'No';
}
?>

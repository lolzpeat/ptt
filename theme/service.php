<noscript>
<?php
require_once('nusoap/nusoap.php');
$username = $_POST['Username'];
$password = $_POST['Password'];
$ws_client = new soapclient('http://www.pttbluecard.com/VLoyaltyExtWS/CustomerService.svc?wsdl',true);
$result = $ws_client->call('CheckLogin', array('userName'=>'prasit@v-smart.com','password'=>'P@ssw0rd'));
if($result[CheckLoginResult]=='Y'){
	echo 'Yes';
}else{
	echo 'No';
}
?>
</noscript>
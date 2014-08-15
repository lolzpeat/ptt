<?php
session_start();
session_destroy();
if(isset($_GET['target'])) {
	echo '<script>window.location="'.$_GET['target'].'";</script>';
} else {	
	echo '<script>window.location="https://www.pttbluecard.com/View/authen/Logout.aspx?target=http://www.pttbluesociety.com";</script>';
}
?>

<?php
session_start();
$target = $_POST['target'];

header('location: '.$target)
?>
<?php
session_start();
require 'list.php';
$id=$_GET['id'];
//$producti=$product[$id];
//$price=$prod['price'];
//$count=$_SESSION['cart']['items'][$id]['count'];
//$_SESSION['cart']['sum'] -= $count*$price;
unset($_SESSION['cart']['items'][$id]);
//calc ();
header( 'locateion:'.$_SERVER['HTTP_REFERER']);
?>
<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);

    $_SESSION['id'] = $ip;
include ('admin/includes/db.php');

	if (isset($_GET['product_id']))
	$product_id=$_GET['product_id'];
	else
	$product_id=1;
	if (isset($_GET['action']))
	$action=$_GET['action'];
	else
	$action="empty";

	switch($action)
	{
		case "add":
			if (isset($_SESSION['cart'][$product_id]))
			$_SESSION['cart'][$product_id]++;
			else
			$_SESSION['cart'][$product_id]=1;
		break;
		case "remove":
			if (isset($_SESSION['cart'][$product_id]))
			{
				$_SESSION['cart'][$product_id]--;
				if ($_SESSION['cart'][$product_id]==0)
				unset($_SESSION['cart'][$product_id]);
			}
		break;
		case "empty":
			unset($_SESSION['cart']);
		break;
	}?>
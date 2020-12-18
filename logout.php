<?php
session_start();
if(isset($_SESSION['ulogin']))
{unset($_SESSION['ulogin']);}
if(isset($_SESSION['alogin'])){
unset($_SESSION['alogin']);}
if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	setcookie('username',$username,time()-3600);
	setcookie('password',$password,time()-3600);
}
header("Location: login.php");
?>
<?php
session_start();
error_reporting(0);

require_once 'config.php';
require_once 'totp.php';

// Register correct TOTP's entering time and reload the script.
if (isset($_GET['otp']) && getOTP($otp_secret) == $_GET['otp'])
{
	$_SESSION['totp-main'] = time();
	// TODO: $_SESSION['trials-left'] = 2;
	header('Location: .');
	die;
}
// Check whether user's IP address is trusted.
try
{
	$pdo = new PDO($db_host, $db_user, $db_pass);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $pdo -> prepare("SELECT `ip` FROM `trusted_ips` WHERE `ip` = :ip");
	$stmt -> bindValue(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
	$stmt -> execute();

	if ($user = $stmt -> fetch())
	{
		$_SESSION['totp-main'] = -1;
	}
}
catch(PDOException $e)
{
	emit_404();
	die;
}

// Destroy session on request.
if (isset($_GET['destroy']) && $_GET['destroy'] == 'yes')
{
	$_SESSION['totp-main'] = '';
	unset($_SESSION['totp-main']);

	header('Location: .');
	die;
}

require 'invisibility.php';

<?php
require_once 'config.php';

if (!isset($_SESSION))
{
	session_start();
}

// Security against Session Fixation.
if (!isset($_SESSION['init']))
{
	session_regenerate_id();
	$_SESSION['init'] = true;
}

if (
	(isset($_SESSION['totp-main']) && $_SESSION['totp-main'] != -1) && // If user doesn't have trusted IP and:
	(!isset($_SESSION['totp-main']) || // entered the page without or with wrong access token...
	(time() - $_SESSION['totp-main'] > $time_max)) // ...or time's up...
)
{
	// ...unset the variable...
	$_SESSION['totp-main'] = '';
	unset($_SESSION['totp-main']);
}

// ...which will render contents invisible to user.
if (!isset($_SESSION['totp-main']))
{
	emit_404();
	die;
}

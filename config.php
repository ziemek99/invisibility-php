<?php
/* GENERAL VARIABLES */
$time_max = 60; // User authentication time in seconds; after that user gets deauthenticated.

/* CRUCIAL SECURITY VARIABLES */
$otp_secret = 'yqghswhsafebp5kzxlo3w5z2xncc7sbi74imy7pnav2yrsdb6xol3flh5lwkm6pm';
$db_host = 'mysql:host=localhost;dbname=Database';
$db_user = 'username';
$db_pass = 'password';

/* FAKE HTTP 404 */
function emit_404()
{
	// HTTP 404 headers. Try requesting non-existent document from your server
	// with curl -v in order to mimic its behavior as closely as possible.
	header('HTTP/1.1 404 Not Found', true, 404);

	// HTTP 404 HTML page. Just like with the headers, mimic the original 404 page.
	// If there's dynamic content, like copyright dates, replicate it with proper
	// PHP functions. Pay close attention to EOLs at the beginning and the end!
	echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
</body></html>
';
}

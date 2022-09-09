<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("217026680135-b3fd11d56do5vvpp9lkstnndr7t7sdtc.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("Sarvagnya 2k22");
	$gClient->setRedirectUri("http://localhost/sarvagnya2k22/google-login/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>

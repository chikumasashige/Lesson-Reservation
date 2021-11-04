<?php
 
//Include Google Client Library for PHP autoload file
require_once(ROOT_PATH .'/vendor/autoload.php');
 
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
//Set the OAuth 2.0 Client ID
$google_client->setClientId('679164529687-1p8vmu73shqvrn173onh2e8sql37av4b.apps.googleusercontent.com');
 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
 
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Main/Main/main.php');
 
//
$google_client->addScope('email');
 
$google_client->addScope('profile');
 

 
?>
<?php

if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    trigger_error("This example only supports PHP Version 5.3.0 or higher. You are using " . phpversion());
}

//Relies on the oAuth2 library by Pierrick Charron: https://github.com/adoy/PHP-OAuth2/

require('oauth2.php');

require('oauth/IGrantType.php');
require('oauth/ClientCredentials.php');
require('oauth/Password.php');
require('oauth/RefreshToken.php');
require('oauth/AuthorizationCode.php');

const CLIENT_ID = '525'; // OAuth 2.0 client_id
const CLIENT_SECRET = '31907a04965a069468b85ca5380f8306'; // OAuth 2.0 client_secret

const REDIRECT_URI = 'http://victorlourng.com/upload/submit.php';
const APPNAME = 'Cider';

const AUTHORIZATION_ENDPOINT = 'https://www.deviantart.com/oauth2/draft15/authorize';
const TOKEN_ENDPOINT = 'https://www.deviantart.com/oauth2/draft15/token';
const SUBMIT_API = "https://www.deviantart.com/api/draft15/stash/submit";
const FOLDER_API = "https://www.deviantart.com/api/draft15/stash/folder";




try {
    $client = new OAuth2\Client(CLIENT_ID, CLIENT_SECRET, OAuth2\Client::AUTH_TYPE_AUTHORIZATION_BASIC);
    if (!isset($_REQUEST['code'])) {
        $params = array('redirect_uri' => REDIRECT_URI);
        $auth_url = $client->getAuthenticationUrl(AUTHORIZATION_ENDPOINT, REDIRECT_URI);
        header('Location: ' . $auth_url);
        die('Redirecting ...');
    } else {
        $params = array('code' => $_REQUEST['code'], 'redirect_uri' => REDIRECT_URI);
        $response = $client->getAccessToken(TOKEN_ENDPOINT, OAuth2\Client::GRANT_TYPE_AUTH_CODE, $params);

    echo('<strong>Response from www.deviantart.com/oauth2/draft15/token:</strong><br><pre>');
    print_r($response);
    echo('</pre><br><strong>Echo of $response[result] :</strong><br><pre>');
    print_r($response[result]);
    echo('</pre><strong>Token:</strong> ');
    print_r($response[result][access_token]);
    echo('<br>');

//    $val = json_decode($response[result]);

//       $val = json_decode($response[result]);
//
//        if (!$val) {
//            throw new Exception('No valid JSON response returned');
//        }
//
//        if (!$val->access_token) {
//            throw new Exception("No access token returned: ".$val->human_error);
//        }

        $client->setAccessToken($response[result][access_token]);

        $client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_OAUTH);
        

		//if (!isset($_GET['file'])) {
		//	echo '"error":"FILE parameter is missing"';
		//}
        
        //$file = $_GET['file'];

        $result = $client->fetch(
            SUBMIT_API,
            array(
                'title' => 'Calendar Project Entry',
                'artist_comments' => "A stock photo for @calendarproject's challenge. Enjoy!",
                'keywords' => 'awesome project calendar submission',
                'folder' => APPNAME,
                'file' => "@TARDIS.svg"
            ),
            OAuth2\Client::HTTP_METHOD_POST
        );

//        $result = json_decode($response['result']);
    echo('<strong>Response from www.deviantart.com/api/draft15/stash/submit:</strong><br><pre>');
    print_r($result);
    echo('</pre><br><strong>Echo of $result[result] :</strong><br><pre>');
    print_r($result[result]);

    echo('</pre><strong>Sta.sh ID:</strong> ');
    print_r($result[result][stashid]);

    echo('<br><strong>Status message below:</strong><br>');

    echo('Great Success! <a href="http://sta.sh/1');
    print_r($result[result][stashid]);
    echo('target="_blank>Click here to view your submission!</a><br>');
    echo('Your submission is in the folder:');
    print_r($result[result][folderid]);


//        if (!$result) {
//            throw new Exception('No valid JSON response returned');
//        }
//        
//        if ($result[result][status] == 'success') {
//            print "Great Success! <a href=\"http://sta.sh/1{$result[result][stashid]}\" target=\"_blank\">Stash ID {$result[result][stashid]</a>";
//            print "<br>Your submission is in the folder: {$result[result][folderid]}";
//        } else {
//            throw new Exception($result[human_error]);
//        }
    }
} catch (Exception $e) {
    print "Fatal Error: ".$e->getMessage();
}
?>

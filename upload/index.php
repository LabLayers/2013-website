<?php
require('oauth2.php');
// Relies on the oAuth2 library by Pierrick Charron: https://github.com/adoy/PHP-OAuth2/
// git clone https://github.com/adoy/PHP-OAuth2.git /path/to/this/script/OAuth2

if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    trigger_error("This example only supports PHP Version 5.3.0 or higher. You are using " . phpversion());
}

function __autoload($classname) {
    $name = preg_split('/\\\\/', $classname . '.php', -1, PREG_SPLIT_NO_EMPTY);
    require_once(implode(DIRECTORY_SEPARATOR, $name));
}

const CLIENT_ID = '525'; // OAuth 2.0 client_id
const CLIENT_SECRET = '31907a04965a069468b85ca5380f8306'; // OAuth 2.0 client_secret

const REDIRECT_URI = 'http://victorlourng.com/upload/index.php';
const APPNAME = 'files';

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
            $val = (object) $response['result'];

            if (!$val) {
                  throw new Exception('No valid JSON response returned');
            }

            if (!$val->access_token) {
                  throw new Exception("No access token returned: ".$val->human_error);
            }

            $client->setAccessToken($val->access_token);

            $client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_OAUTH);

            $response = $client->fetch(
                    SUBMIT_API,
                    array(
                        'title' => 'Hello World',
                        'artist_comments' => 'Fella Sample Image',
                        'keywords' => 'fella sample image',
                        'folder' => APPNAME,
                        'file' => "@pony.png"
                  ),
                  OAuth2\Client::HTTP_METHOD_POST
            );

            $result = (object) $response['result'];

            if (!$result) {
                  throw new Exception('No valid JSON response returned');
            }

            if ($result->status == 'success') {
                  print "Great Success! <a href=\"http://sta.sh/1{$result->stashid}\" target=\"_blank\">Stash ID {$result->stashid}</a>";
                  print "<br>Your submission is in the folder: {$result->folderid}";
            } else {
                  throw new Exception($result->human_error);
            }
      }
} catch (Exception $e) {
      print "Fatal Error: ".$e->getMessage();
}

?>
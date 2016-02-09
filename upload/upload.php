<?php
//Relies on the oAuth2 library by Pierrick Charron: https://github.com/adoy/PHP-OAuth2/
 
const CLIENT_ID = '525'; // OAuth 2.0 client_id
const CLIENT_SECRET = '31907a04965a069468b85ca5380f8306'; // OAuth 2.0 client_secret
 
const REDIRECT_URI = 'http://victorlourng.com/upload/upload.php';
const AUTHORIZATION_ENDPOINT = 'https://www.deviantart.com/oauth2/draft15/authorize';
const TOKEN_ENDPOINT = 'https://www.deviantart.com/oauth2/draft15/token';
const SUBMIT_API = "http://www.deviantart.com/api/draft15/stash/submit";
const APPNAME = 'Cider';
if (empty($_SESSION['deviant_access_token'])) {
Yii::import('application.components.OAuth2.*');
require('oauth2.php');
 
Yii::import('application.components.OAuth2.GrantType.*');
require('oauth/IGrantType.php');
require('oauth/ClientCredentials.php');
require('oauth/Password.php');
require('oauth/RefreshToken.php');
require('oauth/AuthorizationCode.php');
 
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
$val = $response['result'];
 
if (!$val) {
throw new Exception('No valid JSON response returned');
}
 
if (!$val['access_token']) {
throw new Exception("No access token returned: ".$val['human_error']);
}
 
$client->setAccessToken($val['access_token']);
 
$client->setAccessTokenType(OAuth2\Client::ACCESS_TOKEN_OAUTH);
 
$_SESSION['deviant_access_token'] = $val['access_token'];
$this->redirect('upload.php');
}
} catch (Exception $e) {
print "Fatal Error: ".$e->getMessage();
}
} else {
?>
<form action="https://www.deviantart.com/api/draft15/stash/submit?access_token=<?php echo $_SESSION['deviant_access_token']; ?>" method="POST" enctype="multipart/form-data">
<input type="file" name="photo">
<input type="submit" value="GO">
</form>
<?php
}
?>
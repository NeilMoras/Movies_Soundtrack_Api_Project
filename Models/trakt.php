<?php
session_start();
//$_SESSION['trakt']['token'] => access token stored in this
//$_SESSION['trakt']['progress'] => stores the current progress in the authorization protocol

define('TRAKT_URL', 'https://api.trakt.tv');

$TRAKT = array(
  'client_id' => 'd6bd42c638c8b6e04f4078f84cc2f2717ae43f813de38e34293be8c99044d18e',
  'client_secret' => '9b7355f665c7505193199b1b124d6a9248b850a367f064deb9f15f2e232c9a47',
  'redirect_uri' => 'http://localhost:8000/index.php',
  'state' => 'nmnmjkjkpmp92m'
);

//OAuth flow
$auth = authorize($TRAKT);
if ($auth) {
  get_token($TRAKT);
}

//Models functions
/**
 * Function to request an authorization code. Redirects to the Trakt login page for authorization.
 *
 * @param array $config An associative array containing important Trakt app settings for OAuth.
 * @return true Returns true if authorization code received.
 */
function authorize($config) {
  if (empty($_SESSION['trakt']['progress']) && !isset($_SESSION['trakt']['token'])) {
    $url = TRAKT_URL . '/oauth/authorize';
    $params = array(
      'response_type' => 'code',
      'client_id' => $config['client_id'],
      'redirect_uri' => $config['redirect_uri'],
      'state' => $config['state']
    );
    //http_build_query($params) => 'response_type=code&client_id=...&redirect_uri=...&state=...'
    $request = $url . '?' . http_build_query($params); //generate complete URL with parameters
    $_SESSION['trakt']['progress'] = 'authorizing';
    header("Location: $request"); //redirect to generated URL
  } else {
    return true;
  }
}
/**
 * Function to request access token.
 *
 * @param array $config An associative array containing important Trakt app settings for OAuth.
 * @return void
 */
function get_token($config) {
  if (isset($_GET['code']) && $_SESSION['trakt']['progress'] == 'authorizing') {
    if ($_GET['state'] == $config['state']) { //check that received $_GET['state'] is the same as the sent $config['state']
      $url = TRAKT_URL . '/oauth/token';
      $code = $_GET['code']; //the code GET parameter from the URL
      $data = array(
        'code' => $code,
        'client_id' => $config['client_id'],
        'client_secret' => $config['client_secret'],
        'redirect_uri' => $config['redirect_uri'],
        'grant_type' => 'authorization_code'
      );
      $opts = array(
        'http' => array(
          'header' => "Content-Type:application/json",
          'method' => 'POST',
          'content' => json_encode($data) //convert $data array to JSON format
        )
      );
      $context = stream_context_create($opts);
      $result = json_decode(file_get_contents($url, false, $context));
      //var_dump($result);

      $_SESSION['trakt']['token'] = $result->access_token;
      $_SESSION['trakt']['progress'] = 'token';
    }
  }
}

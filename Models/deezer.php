<?php


class Deezer{
 public function displaySoundTrack($movieName)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.deezer.com/search?q=' . $movieName ,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
          'Cookie: _abck=CFF314A8BE882F0CBA6FAABC1D2844EE~-1~YAAQDMaISPicYRJ7AQAAx+bxLQZI3Aqa4a9UOT3KgxkIBsc90qXsFBUVubL8nlZ4OGzmCv3elknhSzU6shBMMjgQNek3bfSJ0BEDk8p+Opz0CZfbi0JcHSSXf5zazEnz68JvBWu3ulvw5ZXtk0WIoFfSMs+HyP89D+Dx6OyonCkTHBQcmbeqJPEuDcTZ/SkxM+iLTowNpo381xte5ZF9IySrZ6U/kcR466DZC0hIsH6kJC3QOR71AvhwS0H8oCPA4ZQKxDs7UcYm8X6XHF2TzhAFi0vrr7Ublu3b0UEh4soHzXAAmE/vqaWM5URI5CxJJsK6poXgEQm1jMI7V+bN72EH/Svnn4FMtE4N46gXYQHg/AFM9Pu06Hc=~-1~-1~-1; ak_bmsc=8547F2FA96E2194A50F447EA70BCB398~000000000000000000000000000000~YAAQDMaISDHHYhJ7AQAA7mBnLgzeF7t+ChsNED2Cy5Yjhm0+sP9eo2hlqF8qAn8friOmPy5EC2521H8g4+lg1eqKvakq9CO0p8bSiEBMYnJOdNkrHjyW0crGOX538dv2jgZDV9Mmanax+R+MrV/bxoD7Frx3AKz76rrtl312AToU02NaGz/aM/Ye+KoXUUFVU6z8ZPeoeagb5zI92u7b8+5DazAZFG0a6j1ZdygJ4rECe7WQqpkuozqkwy9wTM8VaVmrpFCexJqkXhflj+zij6evxQHy0GPZb918p2hS7TMYuIloGQnO2mo2HM8wBNZcrSfdklNLXq9tzOgGZvBMxedD8Rn7LgU2chOxliTWPa86wzoHBXQEG9B++i6B; bm_mi=FF03D5328BF4575F0995ECF58E44316B~4kIOBM3re0qaBd1RSFartjoLkQG/j6cpfuRGF0wgAKJhqmWGVlZymbOtfvBBjwpFZpwRAmby+DpGUmb+9I4JxxVE+AEh9dU2GK6PoAZ1CcwMC2mD7XYsq3Ey7UgI9f+R/mk/UVDmCrib5gH1OAqE3U/4w6Fc4ZfCcUI1+oBz7HPPzwtvhAMQ7rkunqpAp78s2Dl4f2RhFw3BclXCBoUzjxrDJQKFgNnVwb8apYgDZ9U2nkhJZ+Z7HJUgRTEsZKfv; bm_sv=BABF0CD20F375C39CA9CA3743A499DCA~/yVNXZnb1ZMnjXUehYZu4/O9gDBtF2SiiBlvxM669Qm6tPT1bmIu5kQjvqT0umTw78WU/62uWD4Q6x1GVdAVxP69IVeWRb54yOgWSS65RxVZqebc5+GS0EQGfLXgq0QFXdiIO2rJ3s7GpJHhCKCxpkvQ740YfU7zHS40GrdR7ak=; bm_sz=DE0C07056BDDDD0ADE3DE9BD2086046D~YAAQDMaISPmcYRJ7AQAAx+bxLQyrZSqxWb40WtfbdV2aSDO3uljt3fUIyMQe2VxJ7xVQyHaD4ygLkXn+C6IN4R+uxtwF6M7Fqu6QPKnHx2DrQjiaJ5WvoAarObNqTaHiiQpHkLrqF7CKttUS0VktSj5QRKs41Qg7NxywNnDYQHepIRB2hr2gEi0ImEMtFOvegXmCy4xad6GXDaBchrPw1zCFJCOyk+znJCbFxJ9eH6/pQAvv4+Ajxuf2bxVOU/ZjlGmxpBHn0Yz2noATt71meRN/aTBqRg1CXTpkJe2N5lYXanY=~3223864~4534836; dzr_uniq_id=dzr_uniq_id_fr59f25fe51efe9792b009a221b6460258bcb01d; sid=fr42bed0569532ecd51912ceef054692f818a149'
      ),
  ));

  $deezerResponse = json_decode(curl_exec($curl));
  curl_close($curl);
  return $deezerResponse;
//  print_r($deezerResponse);
}


}
//WORKING OAUTH BUT CURRENTLY COMMENTED OUT AS NOT REQUIRED FOR THE TIME BEING BUT FOR FUTURE PROJECTS

// $app_id     = "496062";
// $app_secret = "9be244332272af33ea94c7f66ccd40a0";
// $my_url     = "http://localhost:8000/index.php";
//
// session_start();
// $code = $_REQUEST["code"];
//
// if(empty($code)){
//     $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
//
//     $dialog_url = "https://connect.deezer.com/oauth/auth.php?app_id=".$app_id
//         ."&redirect_uri=".urlencode($my_url)."&perms=email,offline_access"
//         ."&state=". $_SESSION['state'];
//
//     header("Location: ".$dialog_url);
//     exit;
//
// }
//
// if($_REQUEST['state'] == $_SESSION['state']) {
//     $token_url = "https://connect.deezer.com/oauth/access_token.php?app_id="
//         .$app_id."&secret="
//         .$app_secret."&code=".$code;
//
//     $response  = file_get_contents($token_url);
//     $params    = null;
//     parse_str($response, $params);
//     $api_url   = "https://api.deezer.com/user/me?access_token="
//         .$params['access_token'];
//
//     $user = json_decode(file_get_contents($api_url));
//     echo("Hello " . $user->name);
// }else{
//     echo("The state does not match. You may be a victim of CSRF.");
// }

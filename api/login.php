<?php

header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'objects/user.php';

$user = new User();

$login = $user->login();

include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

if (password_verify($_POST["password"], json_decode($login, true)[0]["password"])) {
    $token = array(
       "iat" => $issued_at,
       "exp" => $expiration_time,
       "iss" => $issuer,
       "data" => array(
           "id" => json_decode($login, true)[0]["id"]
       )
    );

    http_response_code(200);

    $jwt = JWT::encode($token, $key);
    /*echo json_encode(
        array(
            "message" => "Successful login.",
            "jwt" => $jwt
        )
    );*/
    //$_COOKIE["session"] = $jwt;
    setcookie("session", $jwt);
    echo json_encode(array("message" => "Successful login"));
} else {
    http_response_code(401);
    echo json_encode(array("message" => "Login failed."));
}

?>
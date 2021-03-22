<?php
header('Content-Type: application/json');

$p = $_POST;

if ($p['email'] == 'a' && $p['password'] == 'a') {
    http_response_code(200);
    echo json_encode(["token" => '123']);
} else {
    http_response_code(401);
    echo json_encode(["error" => "Invalid username or password"]);
}

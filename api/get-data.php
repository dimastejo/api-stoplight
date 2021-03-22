<?php
header('Content-Type: application/json');

$token = $_SERVER['HTTP_AUTHORIZATION'];
$formatToken = split_token_from_auth_header($token);
$tokenResponse = validate_token($formatToken);

if (!is_numeric($tokenResponse)) {
    http_response_code($tokenResponse['status']);
    echo json_encode(["error" => $tokenResponse['error']]);
    exit;
}

function split_token_from_auth_header($token)
{
    return (!empty($token) && strpos($token, ' ')) ? explode(" ", $token)[1] : $token;
}

function validate_token($token)
{
    if (empty($token)) {
        echo 'ax';
        return [
            "status" => 400,
            "error" => "Token is missing"
        ];
    } else {
        if ($token == '123') {
            return 123;
        } else {
            return [
                "status" => 401,
                "error" => "Token is invalid"
            ];
        }
    }
}


$data = [
    'id' => $tokenResponse,
    'name' => 'Dimas'
];

echo json_encode($data);

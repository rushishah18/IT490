<?php

//Required files
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('rabbitMQClient.php');

function user_login($username,$password){
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$msg = "This is a Login request";

        $request = array();
        $request['type'] = "Login";
        $request['username'] = $username;
        $request['password'] = $password;
        $request['message'] = "Check to login";
        $response = $client->send_request($request);
        echo "[Login]Client received response: ".PHP_EOL;
        print_r($response);
        return $response;

}

function user_signup($name, $email, $username, $password,$confirmpassword){
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
        $msg = "This is a signup request";

        $request = array();
        $request['type'] = "SignUp";
        $request['name'] = $name;
        $request['email'] = $email;
        $request['username'] = $username;
	$request['password'] = $password;
	$request['confirmpassword'] = $confirmpassword;
        $request['message'] = "Check to sign up";
        $response = $client->send_request($request);
        //$response = $client->publish($request);

        echo "[SignUp]Client received response: ".PHP_EOL;
        print_r($response);
        echo "\n\n";

        echo $argv[0]." END".PHP_EOL;
        return $response;
}

function save_ratings($email,$ratings){
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
        $msg = "This is a Rating request";

        $request = array();
        $request['type'] = "Ratings";
        $request['email'] = $email;
        $request['srr_ratings'] = $ratings;
        $request['message'] = "Check for Ratings";
        $response = $client->send_request($request);
        echo "[Ratings]Client received response: ".PHP_EOL;
        print_r($response);
        return $response;

}


function save_questions($value1, $value2, $value3, $value4, $value5, $value6){
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
        $msg = "This is a Rating request";

        $request = array();
        $request['type'] = "Questions";
	$request['value1'] = $value1;
	$request['value2'] = $value2;
	$request['value3'] = $value3;
	$request['value4'] = $value4;
	$request['value5'] = $value5;
	$request['value6'] = $value6;
        $request['message'] = "Check for Questions";
        $response = $client->send_request($request);
        echo "[Questions]Client received response: ".PHP_EOL;
        print_r($response);
        return $response;

}

function reset_pass($email, $password){
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
        $msg = "This is a Rating request";

        $request = array();
        $request['type'] = "Reseting";
        $request['email'] = $email;
        $request['password'] = $password;
        $request['message'] = "Check for Data";
        $response = $client->send_request($request);
        echo "[Reseting]Client received response: ".PHP_EOL;
        print_r($response);
        return $response;

}
?>

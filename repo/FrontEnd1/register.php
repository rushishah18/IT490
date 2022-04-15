<?php

include("../database/functions.php");

//Required files
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('../database/rabbitMQClient.php');


if(isset($_POST['user_signup'])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];

	$response = user_signup($name, $email, $username, $password,$confirmpassword);
	echo $response;

        if (!$response){

                echo "Could not create user, please try again!";
                header("Location: register.html");
        }
        else
    	{
                echo "Created user!";
                header("Location: redirect.html");

        }
}

?>



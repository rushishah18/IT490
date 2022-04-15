<?php


//Required files
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('../database/rabbitMQClient.php');

include("../database/functions.php");

if(isset($_POST['user_login'])){

    $username = $_POST["username"];
    $password = $_POST["password"];

	$response = user_login($username, $password);
        echo $response;

        if (!$response){

                echo "Wrong Credentials, please try again!";
                header("Location: login.html");
        }
        else
        {
                echo "Logged in Succefully!";
                header("Location: questions.html");

        }
}


?>


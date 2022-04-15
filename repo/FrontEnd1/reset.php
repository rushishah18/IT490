<?php

include("../database/functions.php");

//Required files
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('../database/rabbitMQClient.php');


if(isset($_POST['reset_pass'])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $response = reset_pass($email, $password,);
        echo $response;

        if (!$response){

                echo "Wrong information, please try again!";
                header("Location: login.html");
        }
        else
        {
                echo "Succefully Reset!";
                header("Location: redirect2.html");

        }
}

?>


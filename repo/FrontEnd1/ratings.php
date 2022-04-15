<?php

include("../database/functions.php");

//Required files
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('../database/rabbitMQClient.php');


if(isset($_POST['save_ratings'])){
        $email = $_POST["email"];
        $ratings = $_POST["srr_ratings"];

        $response = save_ratings($email, $ratings);
        echo $response;

        if (!$response){

                echo "Could not save the ratings, please try again!";
                header("Location: index.html");
        }
        else
        {
                echo "Ratings saved!";
                header("Location: redirect1.html");

        }
}

?>

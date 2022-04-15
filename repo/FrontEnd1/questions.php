<?php

include("../database/functions.php");

//Required files
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('../database/rabbitMQClient.php');


if(isset($_POST['save_questions'])){
	$value1 = $_POST["value1"];
	$value2 = $_POST["value2"];
	$value3 = $_POST["value3"];
	$value4 = $_POST["value4"];
	$value5 = $_POST["value5"];
	$value6 = $_POST["value6"];

        $response = save_questions($value1, $value2, $value3, $value4, $value5, $value6);
        echo $response;

        if (!$response){

                echo "Could not save the Records, please try again!";
                header("Location: index.html");
        }
        else
        {
                echo "Questions saved!";
                header("Location: redirect3.html");

        }
}

?>

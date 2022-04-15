<?php

    require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
    require_once('dbfunction.php');

    function requestProcessor($request){
        echo "received request".PHP_EOL;
        echo $request['type'];
        var_dump($request);

        if(!isset($request['type'])){
            return array('message'=>"ERROR: Message type is not supported");
        }

        $type = $request['type'];
        $response_msg = "";
        switch($type){
                case "Login":
                        echo "User Login.";
                        $response_msg = login($request['username'],$request['password']);
                        break;
                case "Register":
                        echo "User Signup.";
                        $response_msg = signUp($request['name'],$request['email'],$request['username'],$request['password'],$request['confirmpassword']);
			break;
	 	case "Ratings":
                        echo "Saving the Reviews.";
                        $response_msg = rating($request['email'],$request['srr_ratings']);
			break;
		case "Questions":
                        echo "Saving the Records.";
                        $response_msg = questions($request['value1'],$request['value2'],$request['value3'],$request['value4'],$request['value5'],$request['value6']);
			break;
		case "Reseting":
                        echo "Reseting Password.";
                        $response_msg = reseting($request['email'],$request['password']);
			break;
		}
        return $response_msg;
    }
    $server = new rabbitMQServer('dbrabbitmq.ini', 'testServer');

    $server->process_requests('requestProcessor');

?>

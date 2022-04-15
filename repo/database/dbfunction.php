<?php

    require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
    require_once('rabbitMQClient.php');
    require_once('dbconn.php');

    //Login function
 
    function login($username, $password){
	$mydb = dbConnect();
        $query = "SELECT * FROM users WHERE username ='$username'"; 
        $response = mysqli_query($mydb, $query);
	$count = mysqli_num_rows($response);	
    if ($count == 1) 
    {
	while($row = mysqli_fetch_array($response))
	{
		if(password_verify($password, $row["password"]))
		{
			$_SESSION['username'] = $username;
		}
		else
		{
			echo 'Wrong Credentials!';
		}
	}
	    #header('location: questions.html'); 
	    echo "Succefully Logged in!";
	
    }  
    else { 
	#header('location: login.html'); 
	echo "Incorrect Login Credentials!";
        
   }
 }
//Sign up function

	function signUp($name, $email, $username, $password, $confirmpassword){
            echo "SIGNING UP";
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $mydb = dbConnect();
            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `confirmpassword`) VALUES ('$name','$email','$username','$pass','$confirmpassword')";
            $response = mysqli_query($mydb, $query);


	    if ($response){
                        echo "";
                }
                else{
                        echo "Error: " . $query . " code: " . mysqli_error($mydb);
                }

            return true;
	}

    function rating($email, $ratings){
            $mydb = dbConnect();
            $query = "INSERT INTO `ratings`(`email`, `srr_ratings`) VALUES ('$email','$ratings')";
            $response = mysqli_query($mydb, $query);

            if ($response){
                        echo "";
                }
                else{
                        echo "Error: " . $query . " code: " . mysqli_error($mydb);
                }

            return true;
    }

    function questions($value1, $value2, $value3, $value4, $value5, $value6){
            $mydb = dbConnect();
            $query = "INSERT INTO `questions`(`value1`,`value2`,`value3`,`value4`,`value5`,`value6`) VALUES ('$value1','$value2','$value3','$value4','$value5','$value6')";
            $response = mysqli_query($mydb, $query);

            if ($response){
                        echo "";
                }
                else{
                        echo "Error: " . $query . " code: " . mysqli_error($mydb);
                }

            return true;
    }

function reseting($email, $password){
            $mydb = dbConnect();
            $query = "INSERT INTO `questions`(`email`,`password`) VALUES ('$email','$password')";
            $response = mysqli_query($mydb, $query);

            if ($response){
                        echo "";
                }
                else{
                        echo "Error: " . $query . " code: " . mysqli_error($mydb);
                }

            return true;
    }
    
?>


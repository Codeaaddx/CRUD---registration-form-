<?php
    ob_start();
	session_start();
	ini_set('display_errors', 1); 
	require 'db.php';
    require 'errors.php';
    

	
	if(isset($_POST['login'])){
        if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `volunteer_form` WHERE `email`=? AND `password`=? ";
			$query = $connection->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['email'] = $fetch['email'];
                $_SESSION['password'] = $fetch['password'];
				header("location: profile.php");
        
		
            }
        }

    
    else {
       
        echo "error";
    }
    }
    
?>
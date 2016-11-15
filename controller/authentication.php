<?php

  session_start();
  require('../model/database.php');
  require('../model/functions.php');


    $memberUsername = ($_POST['memberUsername']);
    $memberPassword = ($_POST['memberPassword']);


$count = login($memberUsername, $memberPassword);
$memberType = admin_check($memberUsername, $memberPassword);
$memberID=memberID($memberUsername, $memberPassword);

   

//var_dump($count);
//exit;
	if($count == 1)
	{ 
        if($memberType == 'A'){
        $_SESSION['user'] = $memberUsername;
        $_SESSION['userID'] = $memberID;
        $_SESSION['memberType'] = 'admin';
        header('location:../view/admin_view.php');  
            
        }else {
		$_SESSION['user'] = $memberUsername;
        $_SESSION['userID'] = $memberID;
		$_SESSION['success'] = 'Hello ' . $memberUsername . '.!';
        $_SESSION['userid'] = $id;
		header('location:../view/myaccount2.php');
        }
	}
	else
	{
		
		$_SESSION['error'] = 'Incorrect username or password. Please try again.';
        echo 'nope';
		header('location:../view/login.php');
	}	
 
?>		

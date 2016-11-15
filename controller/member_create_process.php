<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

    $memberFirstName = ($_POST['create_member_memberFirstName']);
    $memberLastName = ($_POST['create_member_memberLastName']);
    $memberEmail = ($_POST['create_member_memberEmail']);
    $memberUsername = ($_POST['create_member_memberUsername']);
    $memberPassword = ($_POST['create_member_memberPassword']);

	if (empty($memberFirstName) || empty($memberLastName)|| empty($memberEmail) || empty($memberUsername)|| empty($memberPassword))
	{ 

		$_SESSION['error'] = 'All fields are required.'; 
		header("location:../view/login.php");
		exit();
	}

$count = count_email($memberEmail);
if($count >= 1){
    $_SESSION['error'] = 'Email taken'; 
		header("location:../view/login.php");
		exit();
    
}

$count = count_username($memberUsername);
if($count >= 1){
    $_SESSION['error'] = 'Username taken'; 
		header("location:../view/login.php");
		exit();
    
}


$result = add_member($memberFirstName, $memberLastName, $memberEmail, $memberUsername, $memberPassword);
if($result)
		{
        $_SESSION['success'] = 'Account successfully added.';
        header('location:../view/login.php');
}
else
		{
        $_SESSION['error'] = 'An error has occurred. Please try again.';
        header('location:../view/login.php');
        echo "An error has occurred. Please try again.";
}
 

?>
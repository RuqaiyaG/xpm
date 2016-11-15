<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');



    $memberID = $_POST['update_member_memberID'];
    $memberFirstName = $_POST['update_member_memberFirstName'];
    $memberLastName = $_POST['update_member_memberLastName'];
    $memberEmail = $_POST['update_member_memberEmail'];
    $memberUsername = $_POST['update_member_memberUsername'];
    $memberPassword = $_POST['update_member_memberPassword'];

if (empty($memberID) || empty($memberFirstName) || empty($memberLastName)||empty($memberPassword)|| empty($memberEmail) || empty($memberUsername)) 
	{ 
		=
		$_SESSION['error'] = 'All * fields are required.';
		header("location:../view/admin_view.php");
		exit();
	}

$result = update_member($memberFirstName, $memberLastName, $memberEmail, $memberUsername, $memberPassword, $memberID); 
if($result)
		{
        $_SESSION['success'] = 'member successfully updated.';
        header('location:../view/admin_view.php');
}
else
		{
        $_SESSION['error'] = 'An error has occurred. Please try again.';
        header('location:../view/admin_view.php');
}

?>
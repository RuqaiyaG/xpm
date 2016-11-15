<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

   
    $memberID = $_GET['memberID'];
    
$result = delete_member($memberID); 
if($result)
		{
        $_SESSION['success'] = 'Member successfully deleted.';
        header('location:../view/admin_view.php');
}
else
		{
        $_SESSION['error'] = 'An error has occurred. Please try again.';
        header('location:../view/admin_view.php');
}

?>

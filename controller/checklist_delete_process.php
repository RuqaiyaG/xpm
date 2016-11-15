<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

   
    $checklistID = $_POST['delete_checklist_checklistID'];
    
$result = delete_project($checklistID); 
if($result)
		{
        $_SESSION['success'] = 'Checklist successfully deleted.';
        header('location:../view/forms.php');
}
else
		{
        $_SESSION['error'] = 'An error has occurred. Please try again.';
        header('location:../view/forms.php');
}

?>
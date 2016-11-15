<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

    $memberID = $_POST['update_checklist_memberID'];
    $taskID = $_POST['update_checklist_taskID'];
    $checklistID = $_POST['update_checklist_checklistID'];
    $checklistName = $_POST['update_checklist_checklistName'];
    $checklistItem = $_POST['update_checklist_checklistItem'];
    $checklistItemStatus = $_POST['update_checklist_checklistItemStatus'];
    $checklistNotes = $_POST['update_checklist_checklistNotes'];
    $checklistDueDate = $_POST['update_checklist_checklistDueDate'];

	if (empty($memberID) || empty($taskID)||empty($checklistID)|| empty($checklistName) || empty($checklistItem)|| empty($checklistItemStatus)|| empty($checklistNotes)|| empty($checklistDueDate)) 
	{ 

		$_SESSION['error'] = 'All * fields are required.'; 
		header("location:../view/forms.php");
		exit();
	}
$result = update_checklist($memberID, $taskID, $checklistName, $checklistItem, $checklistItemStatus, $checklistNotes, $checklistDueDate, $checklistID); 
if($result)
		{
        $_SESSION['success'] = 'Checklist successfully updated.';
        header('location:../view/forms.php');
}
else
		{
        $_SESSION['error'] = 'An error has occurred. Please try again.';
        header('location:../view/forms.php');
}

?>
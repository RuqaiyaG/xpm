<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
if ($_POST){
    
$memberID = $_POST['memberID'];
$taskID = $_POST['taskID'];
$checklistName = $_POST['$checklistName'];
$checklistItem = $_POST['$checklistItem'];
$checklistItemStatus = $_POST['$checklistItemStatus'];
$checklistNotes = $_POST['$checklistNotes'];
$checklistDueDate = $_POST['$checklistDueDate'];

global $conn;
		$sql = "INSERT INTO checklist (memberID, taskID, checklistName,  checklistItem, checklistItemStatus, checklistNotes, checklistDueDate) VALUES(:memberID, :taskID, :checklistName, :checklistItem, :checklistItemStatus, :checklistNotes, :checklistDueDate)" ;
		$statement = $conn->prepare($sql);
        $statement->bindValue(':memberID', $memberID);
        $statement->bindValue(':taskID', $taskID);
        $statement->bindValue(':checklistName', $checklistName);
        $statement->bindValue(':checklistItem', $checklistItem);
        $statement->bindValue(':checklistItemStatus', $checklistItemStatus);
        $statement->bindValue(':checklistNotes', $checklistNotes);
        $statement->bindValue(':checklistDueDate', $checklistDueDate);
		$result = $statement->execute();
		$statement->closeCursor();
//		return $result;
    echo $result;
}

?>



<?php
//	//start session management
//	session_start();
//	//connect to the database
//	require('../model/database.php');
//    require('../model/functions.php');
//
//    $memberID = $_POST['create_checklist_memberID'];
//    $taskID = $_POST['create_checklist_taskID'];
//    $checklistName = $_POST['create_checklist_checklistName'];
//    $checklistItem = $_POST['create_checklist_checklistItem'];
//    $checklistItemStatus = $_POST['create_checklist_checklistItemStatus'];
//    $checklistNotes = $_POST['create_checklist_checklistNotes'];
//    $checklistDueDate = $_POST['create_checklist_checklistDueDate'];
//
//	if (empty($memberID) || empty($taskID)|| empty($checklistName) || empty($checklistItem)|| empty($checklistItemStatus)|| empty($checklistNotes)|| empty($checklistDueDate)) 
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//		exit();
//	}
//$result = add_checklist($memberID, $taskID, $checklistName, $checklistItem, $checklistItemStatus, $checklistNotes, $checklistDueDate); 
//if($result)
//		{
//        $_SESSION['success'] = 'Checklist successfully added.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//        echo "An error has occurred. Please try again.";
//}

?>
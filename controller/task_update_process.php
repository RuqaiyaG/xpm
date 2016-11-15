<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

if ($_POST)
    {
        global $conn;
        $update_task_taskID = trim($_POST['view_task_taskID']);
        $update_task_projectID = trim($_POST['view_task_projectID']);
        $update_task_taskName = trim($_POST['view_task_taskName']);
        $update_task_taskDescription = trim($_POST['view_task_taskDescription']);
        $update_task_taskStartDate = trim($_POST['view_task_taskStartDate']);
        $update_task_taskEndDate = trim($_POST['view_task_taskEndDate']);
        $update_task_taskColour = trim($_POST['view_task_taskColour']);
        
     	$sql = "UPDATE task SET projectID = :projectID, taskName = :taskName, taskDescription = :taskDescription, taskStartDate =:taskStartDate, taskEndDate = :taskEndDate, taskColour = :taskColour WHERE taskID = :taskID";
//        var_dump($sql);
//        die();
        $statement = $conn->prepare($sql);
        $statement->bindValue(':taskID', $update_task_taskID);
        $statement->bindValue(':projectID', $update_task_projectID);
        $statement->bindValue(':taskName', $update_task_taskName);
        $statement->bindValue(':taskDescription', $update_task_taskDescription);
        $statement->bindValue(':taskStartDate', $update_task_taskStartDate);
        $statement->bindValue(':taskEndDate', $update_task_taskEndDate);
        $statement->bindValue(':taskColour',  $update_task_taskColour);
        $result = $statement->execute();
        return $result;	
    }

?>









































<?php
//	//start session management
//	session_start();
//	//connect to the database
//	require('../model/database.php');
//    require('../model/functions.php');
//
//    $taskID = $_POST['update_task_taskID'];
//    $projectID = $_POST['update_task_projectID'];
//    $taskName = $_POST['update_task_taskName'];
//    $taskDescription = $_POST['update_task_taskDescription'];
//    $taskStartDate = $_POST['update_task_taskStartDate'];
//    $taskEndDate = $_POST['update_task_taskEndDate'];
//
//	if (empty($taskID) ||empty($projectID) || empty($taskName)|| empty($taskDescription) || empty($taskStartDate)|| empty($taskEndDate)) 
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//		exit();
//	}
//$result = update_task($projectID, $taskName, $taskDescription, $taskStartDate, $taskEndDate, $taskID); 
//if($result)
//		{
//        $_SESSION['success'] = 'Task successfully updated.';
//        header('location:../view/forms.php');
//        echo "worked";
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//        echo "An error has occurred. Please try again.";
//}

?>
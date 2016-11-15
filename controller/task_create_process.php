<?php
session_start();
require('../model/database.php');
    if ($_POST)
    {
        global $conn;
        $create_task_projectID = trim($_POST['create_task_projectID']);
        $create_task_taskName = trim($_POST['create_task_taskName']);
        $create_task_taskDescription = trim($_POST['create_task_taskDescription']);
        $create_task_taskStartDate = trim($_POST['create_task_taskStartDate']);
        $create_task_taskEndDate = trim($_POST['create_task_taskEndDate']);
        $create_task_colour = trim($_POST['create_task_colour']);
        
        $sql = "INSERT INTO task(projectID, taskName, taskDescription, taskStartDate, taskEndDate, taskColour) VALUES('$create_task_projectID', '$create_task_taskName', '$create_task_taskDescription', '$create_task_taskStartDate', '$create_task_taskEndDate', '$create_task_colour')";
//        var_dump($sql);
//        die();
        $statement = $conn->prepare($sql);
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
//    $projectID = $_POST['create_task_projectID'];
//    $taskName = $_POST['create_task_taskName'];
//    $taskDescription = $_POST['create_task_taskDescription'];
//    $taskStartDate = $_POST['create_task_taskStartDate'];
//    $taskEndDate = $_POST['create_task_taskEndDate'];
//    $taskColour = $_POST['create_task_colour'];
//
//	if (empty($projectID) || empty($taskName)|| empty($taskDescription) || empty($taskStartDate)|| empty($taskEndDate) || empty($taskColour))
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//		exit();
//	}
//$result = add_task($projectID, $taskName, $taskDescription, $taskStartDate, $taskEndDate,$taskColour); 
//if($result)
//		{
//        $_SESSION['success'] = 'Task successfully added.';
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
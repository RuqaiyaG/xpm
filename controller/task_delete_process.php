<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

   
    $taskID = $_POST['del_task_id'];
    
$sql = "DELETE FROM task WHERE taskID = :taskID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':taskID', $taskID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;

//if($result)
//		{
//        $_SESSION['success'] = 'Task successfully deleted.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//}

?>
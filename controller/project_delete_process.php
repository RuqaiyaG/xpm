<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');

   
    $projectID = $_POST['del_project_id'];
    $memberID = $_SESSION['userID'];

global $conn;
		$sql = "DELETE FROM team WHERE memberID = :memberID AND projectID = :projectID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':projectID', $projectID);
		$statement->bindValue(':memberID', $memberID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	


    
//$result = delete_project($projectID); 
//if($result)
//		{
//        $_SESSION['success'] = 'Project successfully deleted.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//}

?>
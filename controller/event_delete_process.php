<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');

    $eventID = $_POST['del_event_id'];
//    $projectID = $_GET['projectID'];

global $conn;
		$sql = "DELETE FROM event WHERE eventID = :eventID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':eventID', $eventID);
//		$statement->bindValue(':projectID', $projectID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	


?>

<?php
//	//start session management
//	session_start();
//	//connect to the database
//	require('../model/database.php');
//    require('../model/functions.php');
//
//   
//    $eventID = $_POST['delete_event_eventID'];
//    
//$result = delete_project(eventID); 
//if($result)
//		{
//        $_SESSION['success'] = 'Event successfully deleted.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//}

?>
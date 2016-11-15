<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
if($_POST){
    
$eventID_update = $_POST['eventID_update'];
$event_name_update = $_POST['event_name_update'];
$event_description_update = $_POST['event_description_update'];
$event_date_update = $_POST['event_date_update'];
$event_location_update = $_POST['event_location_update'];  
$projectID = $_POST['projectID_event_update'];

$sql = "UPDATE event SET projectID = :projectID, eventName = :eventName, eventDescription = :eventDescription, eventDate =:eventDate, eventLocation = :eventLocation WHERE eventID = :eventID";      
		$statement = $conn->prepare($sql);
        $statement->bindValue(':projectID', $projectID);
        $statement->bindValue(':eventName', $event_name_update);
        $statement->bindValue(':eventDescription', $event_description_update);
        $statement->bindValue(':eventDate', $event_date_update);
        $statement->bindValue(':eventLocation', $event_location_update);
        $statement->bindValue(':eventID', $eventID_update);
//    var_dump($statement);
//    exit();
		$result = $statement->execute();
		$statement->closeCursor();
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
//    $eventID = $_POST['update_event_eventID'];
//    $projectID = $_POST['update_event_projectID'];
//    $eventName = $_POST['update_event_eventName'];
//    $eventDescription = $_POST['update_event_eventDescription'];
//    $eventDate = $_POST['update_event_eventDate'];
//    $eventLocation = $_POST['update_event_eventLocation'];
//
//	if (empty($projectID) ||empty($eventID) || empty($eventName)|| empty($eventDescription) || empty($eventDate)|| empty($eventLocation))
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//		exit();
//	}
//$result = update_event($projectID, $eventName, $eventDescription, $eventDate, $eventLocation, $eventID); 
//        
//if($result)
//		{
//        $_SESSION['success'] = 'Event successfully updated.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//        echo "An error has occurred. Please try again.";
//}

?>
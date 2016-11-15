<?php
session_start();
require('../model/database.php');
    if ($_POST)
    {
        global $conn;
        $create_event_projectID = trim($_POST['create_event_projectID']);
        $create_event_eventName = trim($_POST['create_event_eventName']);
        $create_event_eventDescription = trim($_POST['create_event_eventDescription']);
        $create_event_eventDate = trim($_POST['create_event_eventDate']);
        $create_event_eventLocation = trim($_POST['create_event_eventLocation']);
        
        $sql = "INSERT INTO event(projectID, eventName, eventDescription, eventDate, eventLocation) VALUES('$create_event_projectID','$create_event_eventName','$create_event_eventDescription','$create_event_eventDate','$create_event_eventLocation')";
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
//    $projectID = $_POST['create_event_projectID'];
//    $eventName = $_POST['create_event_eventName'];
//    $eventDescription = $_POST['create_event_eventDescription'];
//    $eventDate = $_POST['create_event_eventDate'];
//    $eventLocation = $_POST['create_event_eventLocation'];
//
//	if (empty($projectID) || empty($eventName) || empty($eventDescription) || empty($eventDate) || empty($eventLocation))
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//        echo "my input fields were empty";
//		exit();
//	}
//$result = add_event($projectID, $eventName, $eventDescription, $eventDate, $eventLocation); 
//
//if($result)
//		{
//        $_SESSION['success'] = 'Event successfully added.';
//        header('location:../view/forms.php');
//        exit();
//
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//        echo "An error has occurred. Please try again.";
//    		exit();
//
//}

?>
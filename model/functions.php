<?php

function login($memberUsername, $memberPassword){
    global $conn;
		$sql = 'SELECT * FROM member WHERE memberUsername = :memberUsername AND memberPassword = :memberPassword';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberUsername', $memberUsername);
        $statement->bindValue(':memberPassword', $memberPassword);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
}


function admin_check($memberUsername, $memberPassword){
    global $conn;
		$sql = 'SELECT memberType FROM member WHERE memberUsername = :memberUsername AND memberPassword = :memberPassword';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberUsername', $memberUsername);
        $statement->bindValue(':memberPassword', $memberPassword);
		$statement->execute();
        $result = $statement->fetchAll();
		$statement->closeCursor();
        foreach($result as $row){
            $memberType = $row['memberType'];
        }
		return $memberType;
}
function memberID($memberUsername, $memberPassword){
      global $conn;
		$sql = "SELECT memberID FROM member WHERE memberUsername = '$memberUsername'" ;
		$statement = $conn->prepare($sql);
		$statement->execute();
        $result = $statement->fetchAll();
foreach ($result as $res):
           $memberid =$res['memberID'];
endforeach;
    return $memberid;
}


function get_memberID(){
    global $conn;
        $memberID = $_GET['memberID'];
		$sql = 'SELECT *  FROM member WHERE memberID = :memberID';
        $statement = $conn->prepare($sql);
		$statement->bindValue(':memberID', $memberID);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
}

function getall_members()
{
        global $conn;
        $sql = "SELECT * FROM member";
        $statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
    
}

function getimage($memberID){
        global $conn;
        $sql = "SELECT memberImage FROM member WHERE memberID= :memberID";
//        $statement = $conn->prepare($sql);
//        $statement->bindValue(':memberID', $memberID);
//		$statement->execute();
//		$result = $statement->fetchAll (PDO::FETCH_ASSOC);
//		$statement->closeCursor();
//		return $result; 
//        foreach($result as $row){
//            $memberImage = $row['memberImage'];
//        }
        $query = $conn->prepare($sql);
        $query->bindValue(':memberID', $memberID);
        $query->execute();
        $imageresult = $query->fetchall(PDO::FETCH_ASSOC);
        foreach($imageresult as $single)
            if(!empty($single['memberImage'])){
            print_r ('<img id="account_image" src="data:image/jpeg;base64,'.base64_encode( $single['memberImage'] ).'"/>');
        }else{
            echo '<img id="account_image" src="../view/img/defaultmember.png"/>';    
             }   

}

function get_member_projects($memberID){
        global $conn;
        $sql = "SELECT * FROM team JOIN project ON team.projectID=project.projectID JOIN member ON team.memberID=member.memberID WHERE team.memberID = '$memberID' ";
        $statement = $conn->prepare($sql);
		$statement->execute();
		$projects = $statement->fetchAll();
		$statement->closeCursor();
		return $projects;
}
function get_team_members($projectID,$userID){
        global $conn;
        $sql = "SELECT * FROM team JOIN member ON team.memberID=member.memberID WHERE projectID = '$projectID' AND team.memberID != '$userID'";
        $statement = $conn->prepare($sql);
		$statement->execute();
		$team = $statement->fetchAll();
		$statement->closeCursor();
		return $team;
}

function count_email($memberEmail)
	{
		global $conn;
		$sql = 'SELECT * FROM member WHERE memberEmail = :memberEmail';
		$statement = $conn->prepare($sql);
        $statement->bindValue(':memberEmail', $memberEmail);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
	}
function count_username($memberUsername)
	{
		global $conn;
		$sql = 'SELECT * FROM member WHERE memberUsername = :memberUsername';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberUsername', $memberUsername);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();	
		return $count;
	}

function add_member($memberFirstName, $memberLastName, $memberEmail, $memberUsername, $memberPassword)
	{
		global $conn;
		$sql = "INSERT INTO member (memberFirstName, memberLastName, memberEmail, memberUsername, memberPassword) VALUES (:memberFirstName, :memberLastName, :memberEmail, :memberUsername, :memberPassword)";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberFirstName', $memberFirstName);
		$statement->bindValue(':memberLastName', $memberLastName);
		$statement->bindValue(':memberEmail', $memberEmail);
		$statement->bindValue(':memberUsername', $memberUsername);
		$statement->bindValue(':memberPassword', $memberPassword);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;			
	}

function update_member($memberFirstName, $memberLastName, $memberEmail, $memberUsername, $memberPassword, $memberID){
    global $conn;
		$sql = "UPDATE member SET memberFirstName =:memberFirstName, memberLastName = :memberLastName, memberEmail = :memberEmail, memberUsername = :memberUsername, memberPassword =:memberPassword  WHERE memberID = :memberID";         
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberFirstName', $memberFirstName);
		$statement->bindValue(':memberLastName', $memberLastName);
		$statement->bindValue(':memberEmail', $memberEmail);
		$statement->bindValue(':memberUsername', $memberUsername);
		$statement->bindValue(':memberPassword', $memberPassword);
		$statement->bindValue(':memberID', $memberID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;		
}
function delete_member($memberID){
    global $conn;
		$sql = "DELETE FROM member WHERE memberID = :memberID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':memberID', $memberID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	
}
    
function add_project($projectName, $projectDescription, $projectStartDate, $projectEndDate){
    	global $conn;
		$sql = "INSERT INTO project (projectName, projectDescription, projectStartDate, projectEndDate) VALUES (:projectName, :projectDescription, :projectStartDate, :projectEndDate)";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':projectName', $projectName);
		$statement->bindValue(':projectDescription', $projectDescription);
		$statement->bindValue(':projectStartDate', $projectStartDate);
		$statement->bindValue(':projectEndDate', $projectEndDate);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	
}

function update_project($projectID, $projectName, $projectDescription, $projectStartDate, $projectEndDate){
        global $conn;
		$sql = "UPDATE project SET projectName = :projectName, projectDescription = :projectDescription, projectStartDate = :projectStartDate, projectEndDate =:projectEndDate WHERE projectID = :projectID"; 
        $statement = $conn->prepare($sql);
		$statement->bindValue(':projectName', $projectName);
		$statement->bindValue(':projectDescription', $projectDescription);
		$statement->bindValue(':projectStartDate', $projectStartDate);
		$statement->bindValue(':projectEndDate', $projectEndDate);
        $statement->bindValue(':projectID', $projectID); 
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
}

function delete_project($projectID){
    global $conn;
		$sql = "DELETE FROM project WHERE projectID = :projectID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':projectID', $projectID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	
}
    
function add_event($projectID, $eventName, $eventDescription, $eventDate, $eventLocation){
       global $conn;    
//        echo $projectID . " ";
//        echo $eventName . " ";
//        echo $eventDescription . " ";
//        echo $eventDate . " ";
//        echo $eventLocation . " ";
       $sql = "INSERT INTO event (projectID, eventName, eventDescription, eventDate, eventLocation) VALUES( :projectID, :eventName, :eventDescription, :eventDate, :eventLocation)";

    try {
       $statement = $conn->prepare($sql);
       $statement->bindValue(':projectID', $projectID);
       $statement->bindValue(':eventName', $eventName);
       $statement->bindValue(':eventDescription', $eventDescription);
       $statement->bindValue(':eventDate', $eventDate);
       $statement->bindValue(':eventLocation', $eventLocation);
       $result = $statement->execute();
       $statement->closeCursor();
       return $result;	
    }
    catch(PDOException $e)
	{
		$error_message = $e->getMessage();
        echo $error_message;
        include('../view/database_error.php');
		exit();
	}
    
}
function update_event($projectID, $eventName, $eventDescription, $eventDate, $eventLocation, $eventID){
        global $conn;
		$sql = "UPDATE event SET projectID = :projectID, eventName = :eventName, eventDescription = :eventDescription, eventDate =:eventDate, eventLocation = :eventLocation WHERE eventID = :eventID";      
		$statement = $conn->prepare($sql);
        $statement->bindValue(':projectID', $projectID);
        $statement->bindValue(':eventName', $eventName);
        $statement->bindValue(':eventDescription', $eventDescription);
        $statement->bindValue(':eventDate', $eventDate);
        $statement->bindValue(':eventLocation', $eventLocation);
        $statement->bindValue(':eventID', $eventID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	
}
function delete_event($eventID){
        global $conn;
        $sql = "DELETE FROM event WHERE eventID = :eventID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':eventID', $eventID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
}

function add_task($projectID, $taskName, $taskDescription, $taskStartDate, $taskEndDate, $taskColour){
       global $conn;
       $sql = "INSERT INTO task (projectID, taskName, taskDescription, taskStartDate, taskEndDate,taskColour) VALUES(:projectID, :taskName, :taskDescription, :taskStartDate, :taskEndDate, :taskColour)";
       $statement = $conn->prepare($sql);
       $statement->bindValue(':projectID', $projectID);
       $statement->bindValue(':taskName', $taskName);
       $statement->bindValue(':taskDescription', $taskDescription);
       $statement->bindValue(':taskStartDate', $taskStartDate);
       $statement->bindValue(':taskEndDate', $taskEndDate);
       $statement->bindValue(':taskColour', $taskColour);
       $result = $statement->execute();
       $statement->closeCursor();
       return $result;
}
function update_task($projectID, $taskName, $taskDescription, $taskStartDate, $taskEndDate, $taskID){
        global $conn;
		$sql = "UPDATE task SET projectID = :projectID, taskName = :taskName, taskDescription = :taskDescription, taskStartDate =:taskStartDate, taskEndDate = :taskEndDate WHERE taskID = :taskID";
		$statement = $conn->prepare($sql);
        $statement->bindValue(':projectID', $projectID);
        $statement->bindValue(':taskName', $taskName);
        $statement->bindValue(':taskDescription', $taskDescription);
        $statement->bindValue(':taskStartDate', $taskStartDate);
        $statement->bindValue(':taskEndDate', $taskEndDate);
        $statement->bindValue(':taskID', $taskID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	}

function delete_task($taskID){
        $sql = "DELETE FROM task WHERE taskID = :taskID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':taskID', $taskID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
}

function add_checklist($memberID, $taskID, $checklistName, $checklistItem, $checklistItemStatus, $checklistNotes, $checklistDueDate){
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
		return $result;	
}

function update_checklist($memberID, $taskID, $checklistName, $checklistItem, $checklistItemStatus, $checklistNotes, $checklistDueDate, $checklistID){ 
        global $conn;
		$sql = "UPDATE checklist SET memberID = :memberID, taskID = :taskID, checklistName = :checklistName, checklistItem =:checklistItem, checklistItemStatus = :checklistItemStatus, checklistNotes = :checklistNotes, checklistDueDate = :checklistDueDate  WHERE checklistID = :checklistID";
		$statement = $conn->prepare($sql);
        $statement->bindValue(':memberID', $memberID);
        $statement->bindValue(':taskID', $taskID);
        $statement->bindValue(':checklistName', $checklistName);
        $statement->bindValue(':checklistItem', $checklistItem);
        $statement->bindValue(':checklistItemStatus', $checklistItemStatus);
        $statement->bindValue(':checklistNotes', $checklistNotes);
        $statement->bindValue(':checklistDueDate', $checklistDueDate);
        $statement->bindValue(':checklistID', $checklistID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;	
}

function delete_checklist($checklistID){
        $sql = "DELETE FROM checklist WHERE checklistID = :checklistID";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':checklistID', $checklistID);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
}
    
function add_member_into_project(){}
function delete_member_from_project(){}

function viewAllTasksForProject(){
            global $conn;
            $sql = "SELECT * FROM task WHERE ProjectID='1' AND taskStartDate= '2016-10-03'";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
}
//havent used:
function get_num_tasks(){
                        global $conn;    
                        $taskcount = "SELECT COUNT(*) AS count FROM task WHERE taskStartDate BETWEEN '2016-10-10' AND '2016-10-16' ORDER BY taskStartDate";
                        $state= $conn->prepare($taskcount);
                        $state->execute();
                        $count = $state->fetchAll();
                        $state->closeCursor();
                        return $count;
}

//function task_hover($taskhoverid){
//                global $conn;
//                $sql = "SELECT * FROM task WHERE taskID = $taskhoverid ";
//                $statement = $conn->prepare($sql);
//                $statement->execute();
//                $result = $statement->fetchall();
//                $statement->closeCursor();
//                return $result;
//    
//}
?>
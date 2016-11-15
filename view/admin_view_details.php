<script src="js/jquerything.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<script src="https://code.jquery.com/jquery-1.10.2.js">
</script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php 
session_start();
if ($_SESSION['memberType'] !== 'admin'){
        header('location:../view/myaccount2.php');
}

require('../controller/authorisation.php');
require('../model/database.php');
require('../model/functions_messages.php');
require('header.php');
require('../model/functions.php');
//require('../view/css/index.css');


?>
    <div id="admin_panel_members" class="admin_panel" style="">
    <?php
        global $conn;
        $get_members_sql = "SELECT * FROM member";
        $statement = $conn->prepare($get_members_sql);
		$statement->execute();
		$members = $statement->fetchAll();
		$statement->closeCursor();
        echo'<table border="1px solid white" class="details" style="width:100%;color:white;">';
        echo '<tr style="font-weight:bold;">
               <td> MEMBER ID</td>
               <td> FIRST NAME</td>
               <td> LAST NAME</td>
               <td> EMAIL</td>
               <td> USERNAME</td>
               <td> MEMBER TYPE</td>
               <td> JOIN DATE</td> 
            </tr>';
        foreach($members as $member){
          echo'<tr>';   
            echo '<td>'.$member['memberID'].'</td>';
            echo '<td>'.$member['memberFirstName'].'</td>';
            echo '<td>'.$member['memberLastName'].'</td>';
            echo '<td>'.$member['memberEmail'].'</td>';
            echo '<td>'.$member['memberUsername'].'</td>';
            echo '<td>'.$member['memberType'].'</td>';
            echo '<td>'.$member['memberJoinDate'].'</td>';
            echo'</tr>';
        }
        echo'</table>';
    ?>
    </div>

<div id="admin_panel_projects" class="admin_panel" style="">
        <?php
        global $conn;
        $get_projects_sql = "SELECT * FROM project";
        $statement = $conn->prepare($get_projects_sql);
		$statement->execute();
		$projects = $statement->fetchAll();
		$statement->closeCursor();
        echo'<table border="1px solid white" class="details" style="width:100%;color:white;">';
        echo '<tr style="font-weight:bold;">
               <td> PROJECT ID</td>
               <td> PROJECT NAME</td>
               <td> START DATE</td>
               <td> END DATE</td>
               <td> DATE CREATED </td>
            </tr>';
        foreach($projects as $project){
          echo'<tr>';   
            echo '<td>'.$project['projectID'].'</td>';
            echo '<td>'.$project['projectName'].'</td>';
            echo '<td>'.$project['projectStartDate'].'</td>';
            echo '<td>'.$project['projectEndDate'].'</td>';
            echo '<td>'.$project['projectCreatedDate'].'</td>';
            echo'</tr>';
        }
        echo'</table>';
    ?>
    </div>

<div id="admin_panel_tasks" class="admin_panel" style="">
    <?php
        global $conn;
        $get_tasks_sql = "SELECT * FROM task";
        $statement = $conn->prepare($get_tasks_sql);
		$statement->execute();
		$tasks = $statement->fetchAll();
		$statement->closeCursor();
        echo'<table border="1px solid white" class="details" style="width:100%;color:white;">';
        echo '<tr style="font-weight:bold;">
               <td> TASK ID</td>
               <td> PROJECT ID</td>
               <td> TASK NAME</td>
               <td> TASK DESCRIPTION</td>
               <td> TASK START DATE</td>
               <td> TASK END DATE</td>
               <td> TASK COLOUR</td>
               <td> DATE CREATED </td>
            </tr>';
        foreach($tasks as $task){
          echo'<tr>';   
            echo '<td>'.$task['taskID'].'</td>';
            echo '<td>'.$task['projectID'].'</td>';
            echo '<td>'.$task['taskName'].'</td>';
            echo '<td>'.$task['taskDescription'].'</td>';
            echo '<td>'.$task['taskStartDate'].'</td>';
            echo '<td>'.$task['taskEndDate'].'</td>';
            echo '<td>'.$task['taskColour'].'</td>';
            echo '<td>'.$task['taskCreatedDate'].'</td>';
            echo'</tr>';
        }
        echo'</table>';
    ?>
    
    </div>
    <div id="admin_panel_events" class="admin_panel" style="">
        <?php
        global $conn;
        $get_events_sql = "SELECT * FROM event";
        $statement = $conn->prepare($get_events_sql);
		$statement->execute();
		$events = $statement->fetchAll();
		$statement->closeCursor();
        echo'<table border="1px solid white" class="details" style="width:100%;color:white;">';
        echo '<tr style="font-weight:bold;">
               <td> EVENT ID</td>
               <td> PROJECT ID</td>
               <td> EVENT NAME</td>
               <td> EVENT DESCRIPTION</td>
               <td> EVENT DATE</td>
               <td> EVENT LOCATION</td>
               <td> DATE CREATED </td>
            </tr>';
        foreach($events as $event){
          echo'<tr>';   
            echo '<td>'.$event['eventID'].'</td>';
            echo '<td>'.$event['projectID'].'</td>';
            echo '<td>'.$event['eventName'].'</td>';
            echo '<td>'.$event['eventDescription'].'</td>';
            echo '<td>'.$event['eventDate'].'</td>';
            echo '<td>'.$event['eventLocation'].'</td>';
            echo '<td>'.$event['eventCreatedDate'].'</td>';
            echo'</tr>';
        }
        echo'</table>';
    ?>
    </div>
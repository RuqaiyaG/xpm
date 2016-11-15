<?php
session_start();
require('../model/database.php');
    if ($_POST)
    {
        global $conn;
        $add_member_project_projectID = trim($_POST['add_member_project_projectID']);
        $add_member_project_memberusername = trim($_POST['add_member_project_memberusername']);
        
        
        $get_id_fromusername_sql = "SELECT memberID FROM member WHERE memberUsername= '$add_member_project_memberusername' ";
        $statement = $conn->prepare($get_id_fromusername_sql);
        $statement->execute();
        $memberidresults = $statement->fetch();        
       if(empty($memberidresults)){
                echo "Username Invalid";
        } else{
           foreach ($memberidresults as $memberidresult){
               $sql = "INSERT INTO team (projectID, memberID) VALUES('$add_member_project_projectID','$memberidresult')";
        $statement = $conn->prepare($sql);
        $result = $statement->execute();
        return $result;	
           }
           
       }

    }
?>
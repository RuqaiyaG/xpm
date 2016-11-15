<?php
session_start();
require('../model/database.php');

if(isset($_POST['create_project_submit'])){
    
    $projectName = $_POST['create_project_projectName'];
    $projectDescription = $_POST['create_project_projectDescription'];
    $projectStartDate = $_POST['create_project_projectStartDate'];
    $projectEndDate = $_POST['create_project_projectEndDate'];
    
$sql= "INSERT INTO project (projectID, projectName, projectDescription, projectStartDate, projectEndDate, projectCreatedDate)  
VALUES (NULL, :projectName, :projectDescription, :projectStartDate, :projectEndDate, CURRENT_TIMESTAMP)";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':projectName', $projectName);
    $statement->bindValue(':projectDescription', $projectDescription);
    $statement->bindValue(':projectStartDate', $projectStartDate);
    $statement->bindValue(':projectEndDate', $projectEndDate);
    $result = $statement->execute();
    $project_insert_id = $conn->lastInsertId();

$memberID = $_SESSION['userID'];
$sql= "INSERT INTO team (memberID, projectID)  
VALUES (:memberID , :projectID)";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':memberID', $memberID);
    $statement->bindValue(':projectID', $project_insert_id);
    $result = $statement->execute();
    header('location:../view/myaccount2.php');
//    header("Refresh:0");
//    echo 'worked';
}
?>
<?php
//	//start session management
//	session_start();
//	//connect to the database
//	require('../model/database.php');
//    require('../model/functions.php');
//
//    $projectName = $_POST['create_project_projectName'];
//    $projectDescription = $_POST['create_project_projectDescription'];
//    $projectStartDate = $_POST['create_project_projectStartDate'];
//    $projectEndDate = $_POST['create_project_projectEndDate'];
//
//	if (empty($projectName) || empty($projectDescription)|| empty(projectStartDate) || empty($projectEndDate)) 
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//		exit();
//	}
//$result = add_project($projectName, $projectDescription, $projectStartDate, $projectEndDate); 
//if($result)
//		{
//        $_SESSION['success'] = 'Project successfully added.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//}

?>
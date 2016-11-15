
<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');

if ($_POST)
    {
        global $conn;
        $update_project_projectID = trim($_POST['update_project_projectID']);
        $update_project_projectName = trim($_POST['update_project_projectName']);
        $update_project_projectDescription = trim($_POST['update_project_projectDescription']);
        $update_project_projectStartDate = trim($_POST['update_project_projectStartDate']);
        $update_project_projectEndDate = trim($_POST['update_project_projectEndDate']);
        
     	$sql = "UPDATE project SET projectName = :projectName, projectDescription = :projectDescription, projectStartDate =:projectStartDate, projectEndDate = :projectEndDate WHERE projectID = :projectID";
        $statement = $conn->prepare($sql);
        $statement->bindValue(':projectID', $update_project_projectID);
        $statement->bindValue(':projectName', $update_project_projectName);
        $statement->bindValue(':projectDescription', $update_project_projectDescription);
        $statement->bindValue(':projectStartDate', $update_project_projectStartDate);
        $statement->bindValue(':projectEndDate', $update_project_projectEndDate);
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
//    $projectName = $_POST['update_project_projectName'];
//    $projectDescription = $_POST['update_project_projectDescription'];
//    $projectStartDate = $_POST['update_project_projectStartDate'];
//    $projectEndDate = $_POST['update_project_projectEndDate'];
//    $projectID = $_POST['update_project_projectID'];
//    
//	if (empty($projectName) || empty($projectDescription)|| empty($projectStartDate) || empty($projectEndDate)|| empty($projectID)) 
//	{ 
//
//		$_SESSION['error'] = 'All * fields are required.'; 
//		header("location:../view/forms.php");
//		exit();
//
//	}
//$result = update_project($projectID, $projectName, $projectDescription, $projectStartDate, $projectEndDate); 
//if($result)
//		{
//        $_SESSION['success'] = 'Project successfully updated.';
//        header('location:../view/forms.php');
//}
//else
//		{
//        $_SESSION['error'] = 'An error has occurred. Please try again.';
//        header('location:../view/forms.php');
//}

?>
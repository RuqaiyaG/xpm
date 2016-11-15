<?php
require('../model/database.php');
require('../model/functions.php');


if(isset($_POST["memberUsername"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $memberUsername = $_POST["memberUsername"];
    
     global $conn;
    $sqlcheck = "SELECT * FROM member WHERE memberUsername= :memberUsername";
    $statement = $conn->prepare($sqlcheck);
		$statement->bindValue(':memberUsername', $memberUsername);
		$statement->execute();
		//$result = $statement->fetchAll();
		//$statement->closeCursor();
//		$count = $statement->rowCount();	
        //return $result;
//    echo $result;
//    die();
   
    if($statement->fetch()){
       // echo 'in database';
        $created = $memberUsername;
        $sqlimage = "SELECT memberImage FROM member WHERE memberUsername= '$created'";
        $query = $conn->prepare($sqlimage);
        $query->execute();
        $imageresult = $query->fetchall(PDO::FETCH_ASSOC);
        foreach($imageresult as $single)
            if(!empty($single['memberImage'])){
        print_r ('<img id="login_image" src="data:image/jpeg;base64,'.base64_encode( $single['memberImage'] ).'"/>');
    }else{
            echo '<img id="login_image" src="../view/img/defaultmember.png"/>';    
            }
    
    }
            
        
        
        
        
       // print_r ($result);
//        echo '"<img width=50px; height=50px; src="data:image/jpeg;base64,'.base64_encode($result).'"/>';
//        $result = $statement->fetch();
//        echo '"<img width=50px; height=50px; src="data:image/jpeg;base64,'.base64_encode( $result ).'"/>';
        
        
//        $result = getall_members ();
//        foreach($result as $row)
//         echo '"<img width=50px; height=50px; src="data:image/jpeg;base64,'.base64_encode( $row['memberImage'] ).'"/>';
           // echo $row['memberImage'];
        
        
//        $sqlimage = "SELECT memberImage FROM member WHERE memberUsername= $memberUsername";
//        foreach ($conn->query($sqlimage) as $row) {
//        print $row['memberImage'] . "\t";
//    }
//         global $conn;
//        $sqlimage = "SELECT memberImage FROM member WHERE memberUsername= $memberUsername";
//         $statement = $conn->prepare($sqlcheck);
//		$statement->execute();
//        if($statement->fetch()){
//            echo 
//        }
    
        
        
//        die('<p> no </p>');
//    $sqlimage = "SELECT memberImage FROM member WHERE memberUsername= $memberUsername";  
//        $statement = $conn->prepare($sqlimage);
//		$statement->execute();
//            if($statement->fetch()){
//                echo $memberImage;
//            }else{
//                echo 'image error';
//            }
//        
       // echo $memberFirstName;
    else{
//        die('<p> yes</p>');
//        echo 'not in database';
        echo '';
}
}

?>
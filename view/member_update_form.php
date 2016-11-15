<?php 
	//start session management
	session_start();
	//include authorisation management
	require('../controller/authorisation.php');
	//connect to the database
	require('../model/database.php');
    require('../model/functions.php');
    
    ?>

<div id="updatememberform_container">
    <?php
    $memberID = $_GET['memberID'];
    $result = get_memberID();
    ?>
    <form method="post" id="updatememberform" action="../controller/member_update_process.php">
        
        <label>ID</label>
        <input type="text" name="update_member_memberID" id="update_member_memberID" value="<?php echo $result['memberID'];?>" class="input_field"><br/> 
        
        <label>Username</label>
        <input type="text" name="update_member_memberUsername" id="update_member_memberUsername" value="<?php echo $result['memberUsername']; ?>" class="input_field"><br/>
        
        
        <label>Password</label>
        <input type="text" name="update_member_memberPassword" id="update_member_memberPassword" value="<?php echo $result['memberPassword']; ?>" class="input_field"><br/>
        
        
        <label>First Name</label>
        <input type="text" name="update_member_memberFirstName" id="update_member_memberFirstName" value="<?php echo $result['memberFirstName']; ?>" class="input_field"><br/> 
        
        <label>Last Name</label>
        <input type="text" name="update_member_memberLastName" id="update_member_memberLastName" value="<?php echo $result['memberLastName']; ?>" class="input_field"><br/>  
        
        <label>Email</label>
        <input type="text" name="update_member_memberEmail" id="update_member_memberEmail" value="<?php echo $result['memberEmail']; ?>" class="input_field"><br/>
        
        
        
        <input type="submit" name="update_member_submit" id="update_member_submit" value="update">

    </form>
</div>
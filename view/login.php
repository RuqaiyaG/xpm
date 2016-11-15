<?php
session_start();
require('../model/database.php');
require('../model/functions_messages.php');
require ('../controller/check_user_login.php');

if(isset($_SESSION['user'])){   
    header('location:../view/myaccount2.php');         
    }
?>

<head>
<link rel="stylesheet" type="text/css" href="../view/css/index.css">
<script src="../view/js/jsFunctions.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<script src="https://code.jquery.com/jquery-1.10.2.js">
</script>
<script src="js/jquerything.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    
$(document).ready(function() {
    var x_timer;    
    $("#memberUsername").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    }); 

function check_username_ajax(memberUsername){
    $("#user-result").html('<p><img height=30px; width=30px; src="img/loading.gif"/></p>');
    $.post('../controller/check_user_login.php', {'memberUsername' :memberUsername}, function(data) {
      $("#user-result").html('<p style="font-size:35px;color:#fff;text-align:center;"></p>');
      $("#above_login").html(data);
    });
}
//function display_user_image(){
//    $("#above_login").html('#userimage');
//}
});
</script>
<script>
$(document).on("click","#login_notmembertext", function(){
    $("#box_container").show();
    $("#box_container").css("display","flex")
                });
$(document).on("click","#close_signup_form", function(){
    $("#box_container").hide();
                });


</script>

</head>
<body id="login_body">
<?php require('header.php');?>
<a href="../controller/logout_process.php">Logout</a>
<div style="background-color:white;color:red;font-size:25px;font-weight:bold;text-align:center;">
    <?php
    if(isset($_SESSION['error'])){
        print $_SESSION['error'];
        $_SESSION['error'] = null;
    }elseif(isset($_SESSION['success'])){
        print $_SESSION['success'];
        $_SESSION['success'] = null;
        
    }
    ?>
    </div>
    <div id="login_form_container">
        
        <form method="post" action="../controller/authentication.php" id="login_form">
            <div id="above_login"></div>
            <div class="login_icon">
                <div id="usericon_container">
                    <div id="usericon_head"></div>
                    <div id="usericon_body"></div>
                </div>
            
            <input type="text" name="memberUsername" id="memberUsername" placeholder="Username" style="text-align:left;">
            <span id="user-result" style="margin-left:-40px;"></span>
            
            
            </div>
            <div class="login_icon">
            <div class="icon-lock">
                <div class="lock-top-1" style="background-color: #E5E9EA"></div>
                <div class="lock-top-2"></div>
                <div class="lock-body" style="background-color: #E5E9EA"></div>
                <div class="lock-hole"></div>
            </div>
            <input type="password" name="memberPassword" id="password_field" placeholder="Password" style="text-align:left;"><br/>
            </div>
            
                
            <input type="submit" name="login" value="Login" id="login_submit">
        </form>
        <div><p id="login_notmembertext">Not a member?</p></div>
       
    </div>
    
   
    
    
<!--<div id="tint">-->
   
    <div id="box_container" style="display:none;">
        <div id="left_box">
        <p>.</p>
        </div>  
        <div id="right_box">

        <span id="close_signup_form">x</span> 
        <div id="signup_form_container">

            <form method= "post" name="signup_form" id="signup_form" action="../controller/member_create_process.php">

            <input type="text" name="create_member_memberFirstName" id="create_member_memberFirstName" placeholder="First Name"><br/>

            <input type="text" name="create_member_memberLastName" id="create_member_memberLastName" placeholder="Last Name"><br/>

            <input type="email" name="create_member_memberEmail" id="create_member_memberEmail" placeholder="Email"><br/>

            <input type="text" name="create_member_memberUsername" id="create_member_memberUsername" placeholder="Username"><br/>

            <input type="password" name="create_member_memberPassword" id="create_member_memberPassword" placeholder="Password"><br/>

            <input type="submit" name="submit" value="Sign Up" id="signup_submitbutton">

            </form>
        </div>
        </div>
    </div>
<!--</div> -->
</body>
<footer>
<?php require('footer.php');?>
</footer>



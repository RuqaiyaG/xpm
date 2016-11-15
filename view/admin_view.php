<script src="js/jquerything.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<script src="https://code.jquery.com/jquery-1.10.2.js">
</script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>
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
<script>
 var members_interval;
 var projects_interval;
 var tasks_interval;
 var events_interval;

    
function triggerTimer_members(){
    slideTimer_members_interval = setInterval(members,2000);
}
function triggerTimer_projects(){
    slideTimer_projects_interval = setInterval(projects,2000);
}
function triggerTimer_tasks(){
    slideTimer_tasks_interval = setInterval(tasks,2000);
}
function triggerTimer_events(){
    slideTimer_events_interval = setInterval(events,2000);
}
    
function cancelTimer_members(){
    clearInterval(members_interval);
}
function cancelTimer_projects(){
    clearInterval(projects_interval);
}
function cancelTimer_tasks(){
    clearInterval(tasks_interval);
}
function cancelTimer_events(){
    clearInterval(events_interval);
}
    
var  members = function(){
    $( "#admin_panel_right_view" ).load( "admin_view_details.php #admin_panel_members", function () {
         $(this).unwrap();
    }); 

}; 
var  projects = function(){
    $( "#admin_panel_right_view" ).load( "admin_view_details.php #admin_panel_projects", function () {
         $(this).unwrap();
    }); 
}; 
var  tasks = function(){
    $( "#admin_panel_right_view" ).load( "admin_view_details.php #admin_panel_tasks", function () {
         $(this).unwrap();
    }); 
};
var  events = function(){
    $( "#admin_panel_right_view" ).load( "admin_view_details.php #admin_panel_events", function () {
         $(this).unwrap();
    }); 
}; 
$(document).on("click","#admin_panel_left_icon_members", function(){

    $("#admin_panel_right_view").show();
    $("#admin_panel_projects").hide();
    $("#admin_panel_tasks").hide();
    $("#admin_panel_events").hide();
    
    cancelTimer_members();
    cancelTimer_projects();
    cancelTimer_tasks();
    cancelTimer_events();
    triggerTimer_members();
});

$(document).on("click","#admin_panel_left_icon_projects", function(){  
    
    $("#admin_panel_right_view").show();
    $("#admin_panel_members").hide();
    $("#admin_panel_tasks").hide();
    $("#admin_panel_events").hide();
    
    cancelTimer_members();
    cancelTimer_projects();
    cancelTimer_tasks();
    cancelTimer_events();
    triggerTimer_projects();

        
}); 

$(document).on("click","#admin_panel_left_icon_tasks", function(){
    $("#admin_panel_right_view").show();
    $("#admin_panel_members").hide();
    $("#admin_panel_projects").hide();
    $("#admin_panel_events").hide();
    
    cancelTimer_members();
    cancelTimer_projects();
    cancelTimer_tasks();
    cancelTimer_events();
    triggerTimer_tasks();
        
});  
 
$(document).on("click","#admin_panel_left_icon_events", function(){       
    $("#admin_panel_right_view").show();
    $("#admin_panel_members").hide();
    $("#admin_panel_projects").hide();
    $("#admin_panel_tasks").hide();
    
    cancelTimer_members();
    cancelTimer_projects();
    cancelTimer_tasks();
    cancelTimer_events();
    triggerTimer_events();

        
});
</script>
<body id="admin_body">
<div style="width:30px;height:40px;border:3px solid #DCE1E7;position:fixed;right:0px;bottom:0px;">
            <a href="../controller/logout_process.php" style="font-size:2em;margin:0px;text-decoration:none;color:#DCE1E7;">&#8617;</a>
</div>
<!--    <a style="float:right;color:white;" href="../controller/logout_process.php">Logout</a><br/> <br/>-->
<div id="admin_panel_left_icons">
    <div id="admin_panel_left_icon_members" class="admin_panel_left_icon">
    <i class="fa fa-user" style="font-size:7em;text-align:center;"></i><br/>
    MEMBERS
    </div>
    <div id="admin_panel_left_icon_projects" class="admin_panel_left_icon">
    <i class="fa fa-pie-chart" style="font-size:7em;text-align:center;"></i><br/>
    PROJECTS
    </div>
    <div id="admin_panel_left_icon_tasks" class="admin_panel_left_icon">
    <i class="fa fa-align-left" style="font-size:7em;text-align:center;"></i><br/>
    TASKS
    </div>
    <div id="admin_panel_left_icon_events" class="admin_panel_left_icon">
    <i class="fa fa-calendar" style="font-size:7em;text-align:center;"></i><br/>
    Events
    </div>
</div>
<div id="admin_panel_right_view"> 

    
    
</div>
</body>
<?php //require('footer.php');?>
<script>
//$(document).on("click","#admin_panel_left_icon_projects", function projects(){
//    $( "#admin_panel_right_view" ).load( "admin_view_details.php #admin_panel_projects" );
//    $("#admin_panel_right_view").toggle();
//    $("#admin_panel_members").hide();
//    $("#admin_panel_tasks").hide();
//    $("#admin_panel_events").hide();
//
//                }); 
</script>
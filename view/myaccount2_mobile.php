<?php
session_start();
require('../model/database.php');
require('../model/functions.php');
require('../controller/authorisation.php');

if (isset($_SESSION['memberType'])){
        header('location:../view/admin_view.php');
}


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="js/jquerything.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/index_mobile.css"/>
<script src="https://code.jquery.com/jquery-1.10.2.js">
</script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $(document).on("click", "#menu_icon", function(){
                var style =  {position:"absolute"};

        $("#project_menu_slide").animate({width: 'show'}, 'medium');
        $(this).hide();
        
    });    
    
    $(document).on("click", "#projects_title", function(){
        $("#project_menu_slide").animate({width: 'hide'}, 'medium', function() {
    if ($(this).is(':hidden'))
        $("#menu_icon").animate({width: 'show'}, 'fast');
        });
    });
    
$(document).on("click", ".task", function(){
var no_style = {position:"fixed", left:"65px", width:"250px",height:"150", "z-index":"2"};
        $(this).next().next('.task_details').show();
        $(this).next().next('.task_details').css(no_style);
        $("#tint").show();
        
    });  
    
$(document).on("click", ".task_details_close", function(){
        $(".task_details").hide();
        $("#tint").hide();
        
    });      

$(document).ready(function() {
      $('.task').hover(
function () {
    var idting = $(this).attr('id');
    var otherting = $(idting);
    var name  = $(this).next().next('#no').children(".viewtaskname").attr('id');
    
    if(idting){
        $('.' + idting).css({'opacity':'1'});
        $('#' + idting).children(".taskname").html('<span class="hovernameappear" style="position:absolute;">'+ name +'</span>');
        
//        $('#' + idting).children(".task_icon_delete").show();
//        $('#' + idting).children(".task_icon_view").show();
    }
//    $(".task").html(idting);
}, 
    
function () {
//$(this).css({"background-color":"pink"}); 
$('.task').css({'opacity':'0.7'}); 
$('.hovernameappear').remove(); 
}
);
});
</script>
<script>
$(document).on("click","#add_toggle", function(){
            $('.add_icon_toggle').animate({width: 'toggle'}, 'medium', function() {
    if ($(this).is(':visible'))
        $(this).css('display','inline-block');
});              
                });
$(document).on("click",".iconclose", function(){
    $(".iconclose").hide();
});
</script>
<script>
$(document).on("click", "#add_project_icon", function(){
    $("#create_project_form").show();
  
});
$(document).on("click","#close_project_form", function(){
    $("#create_project_form").hide();
                });
</script>
<script>
$(document).on("click", "#add_task_icon", function(){
    $("#create_task_form").show();
  
});
$(document).on("click","#close_task_form", function(){
    $("#create_task_form").hide();
                });
</script>
<script>
$(document).on("click", "#add_event_icon", function(){
    $("#create_event_form").show();
  
});
$(document).on("click","#close_event_form", function(){
    $("#create_event_form").hide();
                });
</script>
<body>
<div id="mobile_container">
<div id="tint"></div>
<div id="top_menu_section">
    <div style="width:25px;height:35px;border:3px solid #DCE1E7;position:fixed;top:9px;left:336px;">
            <a href="../controller/logout_process.php" style="font-size:2em;margin:0px;text-decoration:none;color:#DCE1E7;">&#8617;</a>
        </div>
   <i class="fa fa-bars" id="menu_icon"></i>    
      <div id="project_menu_slide">
            <div id="projects_title">Projects
          <i class="fa fa-angle-left" id="menu_icon_close"></i>
          </div>
              <div id="scrollbar" class="scrollbar">
          <?php
            $memberID = $_SESSION['userID'];
            $projects = get_member_projects($memberID);
            foreach ($projects as $project):
          ?>
          <div class="user_account_project_sidebar" id="<?php echo $project['projectID'];?>">
            <div class="user_account_project_name">
              <a style="color:#9cf0f0;" id="<?php echo $project['projectID'];?>" href="<?php echo'?projectID='.$project['projectID'];?>">
                <?php echo $project['projectName'];?>
              </a>
            </div>
                <div id="project_details" style="display:none;">
                <span class="project_view_projectID" id="<?php echo $project['projectID'];?>"></span><br/>
                <span class="project_view_projectName" id="<?php echo $project['projectName'];?>"></span><br/>
                <span class="project_view_projectDescription" id="<?php echo $project['projectDescription'];?>"></span><br/>
                <span class="project_view_projectStartDate" id="<?php echo $project['projectStartDate'];?>"></span><br/>
                <span class="project_view_projectEndDate" id="<?php echo $project['projectEndDate'];?>"></span>
                </div>
              <div id="projects_icon_container" style="width:100%;text-align:center;">
              <div title="Edit Project" id="view_project_icon" style="background-color:#2e275c;display:inline-block;border-radius:30px;width:30px;height:30px;">
                 <i style="color:#9cf0f0;font-size:1.5em;padding-top:2px;" class="fa fa-pencil"></i>
              </div>
              <div title="Delete Project" id="delete_project_icon" style="background-color:#2e275c;display:inline-block;border-radius:30px;width:30px;height:30px;">
                  <i style="color:#9cf0f0;font-size:1.5em;padding-top:2px;" class="fa fa-trash-o"></i>
              </div>
                  </div>
<!--              <div style="background-color:#4a4e70;color:white;">ADD MEMBER TO PROJECT</div>-->
            <div class="user_account_project_members_container">
              <?php
                $projectID = $project['projectID']; 
                $userID = $_SESSION['userID'];
                $team = get_team_members($projectID,$userID);
                foreach ($team as $team_member):
              ?>
              <div class="user_account_project_member" title="<?php echo $team_member['memberFirstName'].' '.$team_member['memberLastName']?>">
                <?php 
//                  echo $team_member['memberID'];
                  if(!empty($team_member['memberImage'])){
            print_r ('<img class="project_member_image_mobile" src="data:image/jpeg;base64,'.base64_encode( $team_member['memberImage'] ).'"/>');
        }else{
            echo '<img class="project_member_image_mobile" src="../view/img/defaultmember.png"/>';    
             }   
                  
                  ?>
              </div>
              <?php endforeach; ?>
                <div title="Add Member" id="add_member_project_icon" style="background-color:#2e275c;display:inline-block;border-radius:30px;width:30px;height:30px;vertical-align:top;border:1px solid #9cf0f0">
        <i style="color:#9cf0f0;font-size:1.5em;padding-left:5.5px;padding-top:3px;vertical-align:top;" class="fa fa-plus"></i>
    </div>  
            </div>
          </div>
          <?php endforeach;?>
        </div>
</div>
    <span id="member_name"><?php echo $_SESSION['user']?>
    </span>
    </div>
  <div id="days_container">
     <?php
            $dt = new DateTime;
            if (isset($_GET['year']) && isset($_GET['week'])) {
            $dt->setISODate($_GET['year'], $_GET['week']);
            } else {
            $dt->setISODate($dt->format('o'), $dt->format('W'));
            }
            $year = $dt->format('o');
            $week = $dt->format('W');

            $week_start= $dt->format('Y-m-d'); 
            // add 7 days to the date above
            $week_end = date('Y-m-d', strtotime($week_start . " +6 days"));
        if(!isset($_GET['projectID'])) {
            echo '<p class="project_notice" style="color:white;text-align:center;">'.'SELECT PROJECT'.'</p>';?>
            
            <?php    
            }
            else{
                $memberID= $_SESSION['userID'];
                $sql_check_project = "SELECT projectID from team WHERE memberID = :memberID";
                   $statement = $conn->prepare($sql_check_project);
                   $statement->bindValue(':memberID', $memberID);
                   $statement->execute();
                   $users_projects = $statement->fetchAll();
                $statement->closeCursor();

                if(!in_array($_GET['projectID'], array_column($users_projects, 0))) {
                    echo '<p class="project_notice">'.' UNAVAILABLE PROJECT'.'</p>';
                }else{
         do {  
            // loops through 7 times 
            echo '<span class="day" id="'. $dt->format('Y-m-d') .'" value="" '. $dt->format('Y-m-d') . '"">'.
                $dt->format('D'). '<br>'.'<span class="date">' . $dt->format('d').'<br/>'.$dt->format('M').'</span>' .
                '</br>'.'</br>';
            echo '22';
        $WTID_sql = "SELECT task.taskID FROM task JOIN team ON task.projectID=team.projectID WHERE team.memberID='".$_SESSION['userID']."' AND task.projectID = '".$_GET['projectID']."' AND task.taskStartDate <= '".$week_end."' AND task.taskEndDate >= '".$week_start."' ORDER BY task.taskStartDate";
            $statement = $conn->prepare($WTID_sql);
            $statement->execute();
            $week_result = $statement->fetchAll();
            foreach ($week_result as $WTID){
            //SQL get 1 day worth of taskID = DTID
            $DTID_sql="SELECT * FROM task JOIN team ON task.projectID=team.projectID WHERE team.memberID='".$_SESSION['userID']."' AND task.projectID = '".$_GET['projectID']."' AND task.taskStartDate <= '".$dt->format('Y-m-d')."' AND task.taskEndDate >= '".$dt->format('Y-m-d')."' ORDER BY task.taskStartDate";
            $statement = $conn->prepare($DTID_sql);
            $statement->execute();
            $day_result = $statement->fetchAll();
            $found = false;
            foreach ($day_result as $DTID) {
            ////if WTID = DTID
            if ($WTID['taskID'] == $DTID['taskID']){
            //display task                              
            echo '<span class="task  '. $DTID['taskID']. '" 
            style="background-color:'. $DTID['taskColour'].';opacity:0.7;" 
            id="'. $DTID['taskID']. '" name="'. $DTID['taskID']. '">'. '<span class="taskname"></span>'.       
            '</span>' . '</br>';
            echo '<div id="no" class="task_details">'.
            '<span></span>'.
            '<span class="task_details_heading">Task Details'.
                '<span class="task_details_close" style="float:right;">&#x2716;</span>'.
                
            '</span>'.'<br/>'.
            '<div class="viewtaskid" id="'. $DTID['taskID']. '">Task ID:'. $DTID['taskID'].'</div>'.
            '<div class="viewtaskname" id="'. $DTID['taskName']. '">Task Name:'. $DTID['taskName'].'</div>'.
            '<div class="viewtaskdesc" id="'. $DTID['taskDescription']. '">Task Description:'. $DTID['taskDescription'].'</div>'.
            '<div class="viewtaskstartdate" id="'. $DTID['taskStartDate']. '">Task Start Date:'. $DTID['taskStartDate'].'</div>'.
            '<div class="viewtaskenddate" id="'. $DTID['taskEndDate']. '">Task End Date:'. $DTID['taskEndDate'].'</div>'.
            '<div class="viewtaskcolour" id="'. $DTID['taskColour']. '">Task Color:'. $DTID['taskColour']. '</div>'.
            '</div>';
            $found = true;
            //else black space   
            }                         
            }
            if($found == false) {
            echo '<span class="task_none" style="background-color:transparent;">'. '</span>' . '</br>'; 
            }
            }

               
            echo "</span>";
                
            $dt->modify('+1 day');
            } while ($week == $dt->format('W'));}}
         
        ?>
    
      <span id="add_project_icon" class="icon_container add_icon_toggle iconclose" style="position:fixed;left:310px;top:420px;">
          <i title="Add Project" class="fa fa-bookmark-o icon"></i>
        </span>
            <form method="post" action="../controller/project_create_process.php" name="create_project_form" id="create_project_form" class="form_container" >
    <div style="float:right;font-size:20px;" id="close_project_form">&#x2716;
    </div>
<span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Add Project</span><br/><br/>
    <label>Project Name:</label>
    <input type="text" name="create_project_projectName" id="create_project_projectName" placeholder="Project Name" required /><br/>
    <label>Project Description:</label>
    <input type="text" name="create_project_projectDescription" id="create_project_projectDescription" placeholder="Project Description" required /><br/>
    <label>Project Start Date:</label>
  <input type="text" name="create_project_projectStartDate" id="create_project_projectStartDate" placeholder="YYYY-MM-DD" style="background-color:white;" required /><br/>
    <label>Project End Date:</label>
    <input type="text" name="create_project_projectEndDate" id="create_project_projectEndDate" placeholder="YYYY-MM-DD" required /><br/>
    <span class="submit_span"><input class="submit" type="submit" name="create_project_submit" id="create_project_submit" required /></span><br/>

</form>
      
      
      <span id="add_task_icon" class="icon_container  add_icon_toggle iconclose" style="position:fixed;left:280px;top:420px;"><i title="Add Task" class="fa fa-align-left icon"></i></span> 
       <form method="post" name="create_task_form" id="create_task_form" class="form_container">
                <div style="float:right;font-size:20px;" id="close_task_form">&#x2716;</div>
                <span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Add Task</span><br/><br/>
                    
                <input type="hidden" name="create_task_projectID" id="create_task_projectID" value="<?php echo $_GET['projectID'] ?>" placeholder="<?php echo $_GET['projectID'] ?>">
                <label>Task Name:</label>
                <input type="text" name="create_task_taskName" id="create_task_taskName" placeholder="Task Name">
                <br/>
                  <label>Task Description:</label>
                <input type="text" name="create_task_taskDescription" id="create_task_taskDescription" placeholder="Task Description">
                <br/>
                  <label>Task Start Date:</label>
                <input type="datetime" name="create_task_taskStartDate" id="create_task_taskStartDate" placeholder="YYYY-MM-DD">
                <br/>
                  <label>Task End Date:</label>
                <input type="datetime" name="create_task_taskEndDate" id="create_task_taskEndDate" placeholder="YYYY-MM-DD">
                <br/>
                <label>Task Colour:</label>
                <input type="color" name="create_task_colour" id="create_task_colour"placeholder="Task Colour">
                <br/>
           <span class="submit_span"><input class="submit" type="submit" name="create_task_submit" id="create_task_submit"></span>
                <br/>
              </form>
      
      <span id="add_event_icon" class="icon_container  add_icon_toggle iconclose" style="position:fixed;left:250px;top:420px;">
          <i title="Add Event"class="fa fa-calendar icon"></i>
      </span>
      
      <form method="post" name="create_event_form" id="create_event_form" class="form_container">
                <div id="close_event_form" style="float:right;font-size:20px;">&#x2716;
                </div>
                 <span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Add Event</span><br/><br/>
                <input type="hidden" name="create_event_projectID" id="create_event_projectID" value="<?php echo $_GET['projectID'] ?>" placeholder="<?php echo $_GET['projectID'] ?>">
                <br/>
                  <label>Event Name:</label>
                <input type="text" name="create_event_eventName" id="create_event_eventName" placeholder="Event Name">
                <br/>
                  <label>Event Description:</label>
                <input type="text" name="create_event_eventDescription" id="create_event_eventDescription" placeholder="Event Description">
                <br/>
                  <label>Event Date:</label>
                <input type="datetime" name="create_event_eventDate" id="create_event_eventDate" placeholder="YYYY-MM-DD">
                <br/>
                  <label>Event Location:</label>
                <input type="text" name="create_event_eventLocation" id="create_event_eventLocation" placeholder="Event Location">
                <br/>
          <span class="submit_span"><input class="submit" type="submit" name="create_event_submit" id="create_event_submit"></span>
                <br/>
              </form>
        <span id="add_toggle" class="icon_container" style="position:fixed;left:340px;top:420px;"><i title="Add" style="" class="fa fa-plus icon"></i> </span>   
    </div> 
    <div id="events_container">
    <div id="events_heading">Events</div>
    <div id="events_scroll" class="scrollbar2">
    <?php
        if(!isset($_GET['projectID'])) {
            echo '<p class="project_notice" style="color:white;text-align:center;">'.'SELECT PROJECT'.'</p>';}else{
    $event_sql = "SELECT * FROM event WHERE eventDate BETWEEN '".$week_start."' AND '".$week_end."' AND projectID = '".$_GET['projectID']."' ORDER BY eventDate";
            $statement = $conn->prepare($event_sql);
            $statement->execute();
            $events = $statement->fetchAll();
         foreach ($events as $event){
           $event_date =  $event['eventDate'];
           $event_day_formatted = date("d", strtotime($event_date));
           $event_month_formatted = date("M", strtotime($event_date));
            echo 
    '<div id="'.$event['eventID'].'" class="events_view">'.
            '<div class="event_details_left">'.
             $event_day_formatted.'</br>'.$event_month_formatted.
            '</div>'.
                    '<div class="events_details_right">'.
                        'Event:'. $event['eventName'].'<br/>'.
                        'Event Description:'. $event['eventDescription'].'</br>'.
                        'Event Location:'. $event['eventLocation'].'</br>'.
                    '</div>'.
    '</div>'.'</br>';
            }}
        
    ?>
        </div>
    </div>
      <a id="prev_button" href="<?php echo $_SERVER['PHP_SELF'].'?projectID='.$_GET['projectID'].'&week='.($week-1).'&year='.$year; ?>">&lt;
          </a> 
          <!--Previous week-->
          <a id="next_button" href="<?php echo $_SERVER['PHP_SELF'].'?projectID='.$_GET['projectID'].'&week='.($week+1).'&year='.$year; ?>">&gt;
          </a> 
          <!--Next week-->
    

    </div>
   


 
</body>
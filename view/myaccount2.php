<script>
//function redirect() {
//   if (screen.width <= 400) {
//      window.location = "https://www.google.com/";
//   }
</script>
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
<link rel="stylesheet" type="text/css" href="css/index.css"/>
<script src="https://code.jquery.com/jquery-1.10.2.js">
</script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
//$(document).ready(function() {
//    $("#evt_color").change(function() {
//        $("#user_account_name").css("background-color", $(this).val());
//        $(".day").css("background-color", $(this).val());
//    }).change(); // trigger change event so div starts out with a colour
//                 // on page load
//});
if($(window).width() < 480){

window.location = "mobile.yoursite.com"

}
</script>

<script>
$(document).on("click","#task_icon_view", function(){
    var taskviewid = $(this).next().children(".viewtaskid").attr('id');
    var taskviewname = $(this).next().children(".viewtaskname").attr('id');
    var taskviewdesc = $(this).next().children(".viewtaskdesc").attr('id');
    var taskviewstartdate = $(this).next().children(".viewtaskstartdate").attr('id');
    var taskviewenddate = $(this).next().children(".viewtaskenddate").attr('id');
    var taskviewcolour = $(this).next().children(".viewtaskcolour").attr('id');
    
    $("#view_task_taskID").val(taskviewid);
    $("#view_task_taskName").val(taskviewname);
    $("#view_task_taskDescription").val(taskviewdesc);
    $("#view_task_taskStartDate").val(taskviewstartdate);
    $("#view_task_taskEndDate").val(taskviewenddate);
    $("#view_task_taskColour").val(taskviewcolour);
    $("#view_checklist_taskID").val(taskviewid);
    $("#test2").text(taskviewid);
//    console.log(taskidview);
    
                });

    </script>
<script>
  $(document).on("click",".js_form", function(){
    $(this).children("form").addClass( "form_show" );
    $(".tint_transparent").show(); //not working**
//      $('.add_toggle').hide();
                });
  $(document).on("click",".close", function(e){
    e.stopPropagation();
    $(".close").parent("form").removeClass( "form_show" );
      $(".tint_transparent").hide();// not working**
                }); 
//$(document).on("click","#task_bar_up", function(){
////    e.stopPropagation();
//    $("#task_bar").show();
//    $("#task_bar_up").hide();
//                }); 
//    
//$(document).on("click","#task_bar_down", function(){
////    e.stopPropagation();
//      $("#task_bar").hide();
//      $("#task_bar_up").show();
//      $(".close").parent("form").removeClass( "form_show" );
//                });
    
$(document).ready(function() {
      $('.taskname').hover(
function (e) {
    var color = $(this).closest(".task").css("background-color");
//$(this).css({"background-color":"red"});
$("#task-hover").show();
if((e.clientX + 250) > window.innerWidth) {
    var eeeclien = e.clientX - 250;
} else {
    var eeeclien = e.clientX;
}
$('#task-hover').css({'top':e.clientY,'left':eeeclien, 'position':'absolute', 
'color' : '#DCE1E7',
//'border-radius': '100px',
'text-align' : 'center',
//'border':'1px solid black', 
'padding':'5px',background: 'rgba(0,0,0,0.8)'});
//$('#task-hover').prepend('<h3>TASK:</h3><input id="taskhoverid" name="taskhoverid" value="'+ this.id +'"/>');
//var disid = this.id;
//$("#task-hover").text(disid);   
    var taskhoverid = $(this).next().next().children(".viewtaskid").attr('id');
    var taskhovername = $(this).next().next().children(".viewtaskname").attr('id');
    var taskhoverdesc = $(this).next().next().children(".viewtaskdesc").attr('id');
    var taskhoverstartdate = $(this).next().next().children(".viewtaskstartdate").attr('id');
    var taskhoverenddate = $(this).next().next().children(".viewtaskenddate").attr('id');
    
    
    $("#task-hover").html('TaskID:' + ' ' + taskhoverid + '</br>' + 'Task Name:' + ' ' + taskhovername + '</br>' +'Task Description:' + ' ' + taskhoverdesc + '</br>' +'Task Start Date:' + ' ' + taskhoverstartdate + '</br>' + 'Task End Date:' + ' ' + taskhoverenddate);
//    console.log(taskhoverid);
}, 
          
function () {
//$(this).css({"background-color":"pink"}); 
$("#task-hover").hide();
}
);
});

$(document).ready(function() {
      $('.task').hover(
function () {
    var idting = $(this).attr('id');
    var otherting = $(idting);
    var name  = $(this).children('#no').children(".viewtaskname").attr('id');
    
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

    
$(document).on("click","#task_icon_view", function(){
                $("#task_view").show();
                $("#view_task_popup_task").show();
                $("#view_task_popup_checklist").hide();
                $(".tint_transparent").show();
                }); 

$(document).on("click","#close_task_view", function(){
                $("#task_view").hide();
                $(".tint_transparent").hide();

                }); 
    
$(document).on("click","#view_task", function(){
                $("#view_task_popup_checklist").hide();
                $(".checklist_more").hide();
                $("#view_task_popup_task").show();
                }); 
    
$(document).on("click","#view_checklist", function(){
                $("#view_task_popup_task").hide();
                $("#view_task_popup_checklist").show();
      
                });
$(document).on("click","#view_events_icon", function(){
                $("#view_events").toggle();
                $('.add_toggle').hide();
                $(".tint_transparent").show();
//                $("#message_div").text("shwing");
                }); 
    
$(document).on("click","#close_view_events", function(){
                $("#view_events").hide();
                    $(".event_update_form").hide();
                    $(".event_details_view").show();
                    $(".event_details_view_more_icon").show();
                    $(".event_update_icon").show();
                    $(".events_details_view_more").hide();
                    $(".tint_transparent").hide();
      
                });

</script>
<script>

$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '#create_task_form', function()
	{
		if($.trim($('#create_task_projectID').val()) == ''){
			alert('Please enter projectID.');
			$('#create_task_projectID').focus()
			return false;
		}
		if($.trim($('#create_task_taskName').val()) == ''){
			alert('Please enter taskName.');
			$('#create_task_taskName').focus()
			return false;
		}
        if($.trim($('#create_task_taskDescription').val()) == ''){
			alert('Please enter Task Description.');
			$('#create_task_taskDescription').focus()
			return false;
		}
        if($.trim($('#create_task_taskStartDate').val()) == ''){
			alert('Please enter taskStartDate.');
			$('#create_task_taskStartDate').focus()
			return false;
		}
        if($.trim($('#create_task_taskEndDate').val()) == ''){
			alert('Please enter taskEndDate.');
			$('#create_task_taskEndDate').focus()
			return false;
		}
        if($.trim($('#create_task_colour').val()) == ''){
			alert('Please enter task_colour.');
			$('#create_task_colour').focus()
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : '../controller/task_create_process.php',
		data : data,
		success :  function(data)
				   {						
						$("#create_task_form").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
//                                $("#").load("myaccount2.php");
//								$(".result").html(data);
                                
                            $("#message_div").text("task added!").fadeOut(3000).hide;
                                location.reload(window.location);
							});
						});   
				   },
            
		});
		return false;
	});
});


</script>
<script>
$(document).on("click",".checklist_member", function(){
    $(this).next().show();
                });
$(document).on("click","#close", function(){
    $(this).parent().hide();
                });
</script>
<script>
$(function(){
    $(document).on('click','.task_icon_delete',function(){
       if (confirm("are you sure you want to delete this task?")){
        
        var del_task_id= $(this).parent().attr('id');

        $.ajax({
            type:'POST',
            url:'../controller/task_delete_process.php',
            data:{'del_task_id':del_task_id},
            success: function(data){
                
                							$("#message_div").fadeIn(500).show(function()
							{
                            $("#message_div").text("Task Deleted!").fadeOut(3000).hide;
                                location.reload(window.location);
							});
             }  

            });
            }
        });
});

</script>
<script>
$(function(){
    $(document).on('click','#delete_project_icon',function(){
        var del_project_id= $(this).parent().prev().children(".project_view_projectID").attr('id');
//        console.log(del_project_id);
        
       if (confirm("are you sure you want to delete this project?")){

        $.ajax({
            type:'POST',
            url:'../controller/project_delete_process.php',
            data:{'del_project_id':del_project_id},
            success: function(data)				   {						
						$("#add_member_project_form").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
                                
                            $("#message_div").text("project deleted!").fadeOut(3000).hide;
                                document.location.href = '../view/myaccount2.php';
							});
						});   
				   },

            });
            }
        });
});

</script>
<script>
$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '#create_event_form', function()
	{
		if($.trim($('#create_event_projectID').val()) == ''){
			alert('Please enter projectID.');
			$('#create_event_projectID').focus()
			return false;
		}
		if($.trim($('#create_event_eventName').val()) == ''){
			alert('Please enter eventName.');
			$('#create_event_eventName').focus()
			return false;
		}
        if($.trim($('#create_event_eventDescription').val()) == ''){
			alert('Please enter eventDescription.');
			$('#create_event_eventDescription').focus()
			return false;
		}
        if($.trim($('#create_event_eventDate').val()) == ''){
			alert('Please enter eventDate.');
			$('#create_event_eventDate').focus()
			return false;
		}
        if($.trim($('#create_event_eventLocation').val()) == ''){
			alert('Please enter eventLocation.');
			$('#create_event_eventLocation').focus()
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : '../controller/event_create_process.php',
		data : data,
		success :  function(data)
				   {						
						$("#create_event_form").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
                                
                            $("#message_div").text("event added!").fadeOut(3000).hide;
                                location.reload(window.location);
							});
						});   
				   },
            
		});
		return false;
	});
});


</script>
<script>
$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '#add_member_project_form', function()
	{
		if($.trim($('#add_member_project_projectID').val()) == ''){
			alert('Please enter projectID.');
			$('#add_member_project_projectID').focus()
			return false;
		}
		if($.trim($('#add_member_project_memberusername').val()) == ''){
			alert('Please enter memberID.');
			$('#add_member_project_memberusername').focus()
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : '../controller/add_teamMember_process.php',
		data : data,
		success :  function(data)
				   {		
                       
						$("#add_member_project_form_container").fadeOut(500).hide(function()
						{
                            $("#tint_transparent").hide();
							$("#message_div").fadeIn(500).show(function()
							{
//                                $("#").load("myaccount2.php");
//								$(".result").html(data);
                                
                            $("#message_div").text("Team member Added!").fadeOut(5000).hide;
                    
                                
                                location.reload(window.location);
							});
						});   
				   },
            
		});
		return false;
	});
});

</script>
<script>
$(document).on("click","#add_member_project_icon", function(){
                $("#add_member_project_form_container").show();
                var add_teammember_id= $(this).parent().parent().attr('id');
                $("#add_member_project_projectID").val(add_teammember_id);
                $(".tint_transparent").show();
                }); 
    
$(document).on("click","#add_member_project_form_close", function(){
                $("#add_member_project_form_container").hide();
                $(".tint_transparent").hide();
      
                });
</script>
<script>
$(document).on("click","#task_bar_myaccount", function(){
                $("#my_account_details_container").toggle();
                $('.add_toggle').hide();
                $(".tint_transparent").show();
                }); 
    
$(document).on("click","#my_account_details_close", function(){
                $("#my_account_details_container").hide();
                $(".tint_transparent").hide();
      
                });
</script>
<script>
$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '#view_task_popup_task', function()
	{
		if($.trim($('#view_task_taskID').val()) == ''){
			alert('Please enter taskID.');
			$('#view_task_taskID').focus()
			return false;
		}
		if($.trim($('#view_task_projectID').val()) == ''){
			alert('Please enter projectID.');
			$('#view_task_projectID').focus()
			return false;
		}
        if($.trim($('#view_task_taskName').val()) == ''){
			alert('Please enter taskName.');
			$('#view_task_taskName').focus()
			return false;
		} 
        if($.trim($('#view_task_taskDescription').val()) == ''){
			alert('Please enter taskDescription.');
			$('#view_task_taskDescription').focus()
			return false;
		} 
        if($.trim($('#view_task_taskStartDate').val()) == ''){
			alert('Please enter taskStartDate.');
			$('#view_task_taskStartDate').focus()
			return false;
		} 
        if($.trim($('#view_task_taskEndDate').val()) == ''){
			alert('Please enter taskEndDate.');
			$('#view_task_taskEndDate').focus()
			return false;
		} 
        if($.trim($('#view_task_taskColour').val()) == ''){
			alert('Please enter task Colour.');
			$('#view_task_taskColour').focus()
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : '../controller/task_update_process.php',
		data : data,
		success :  function(data)
				   {						
						$("#task_view").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
//                                $("#").load("myaccount2.php");
//								$(".result").html(data);
                                
                            $("#message_div").text("task updated!").fadeOut(3000).hide;
                                
                                location.reload(window.location);
							});
						});   
				   },
            
		});
		return false;
	});
});

</script>
<script>
$(document).on("click","#view_project_icon", function(){
    
    var update_project_projectID = $(this).parent().prev().children(".project_view_projectID").attr('id');
    var update_project_projectName = $(this).parent().prev().children(".project_view_projectName").attr('id');
    var update_project_projectDescription = $(this).parent().prev().children(".project_view_projectDescription").attr('id');
    var update_project_projectStartDate = $(this).parent().prev().children(".project_view_projectStartDate").attr('id');
    var update_project_projectEndDate = $(this).parent().prev().children(".project_view_projectEndDate").attr('id');
    
                $("#update_project_projectID").val(update_project_projectID);
                $("#update_project_projectName").val(update_project_projectName);
                $("#update_project_projectDescription").val(update_project_projectDescription);
                $("#update_project_projectStartDate").val(update_project_projectStartDate);
                $("#update_project_projectEndDate").val(update_project_projectEndDate);
console.log(update_project_projectID);
                $("#update_project_form_container").show();
                $(".tint_transparent").show();
    
                }); 

    
$(document).on("click","#update_project_form_close", function(){
                $("#update_project_form_container").hide();
                $(".tint_transparent").hide();
      
                });
</script>
<script>
$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '#update_project_form', function()
	{
		if($.trim($('#update_project_projectID').val()) == ''){
			alert('Please enter projectID.');
			$('#update_project_projectID').focus()
			return false;
		}
		if($.trim($('#update_project_projectName').val()) == ''){
			alert('Please enter projectName.');
			$('#update_project_projectName').focus()
			return false;
		}
        if($.trim($('#update_project_projectDescription').val()) == ''){
			alert('Please enter projectDescription.');
			$('#update_project_projectDescription').focus()
			return false;
		} 
        if($.trim($('#update_project_projectStartDate').val()) == ''){
			alert('Please enter projectStartDate.');
			$('#vupdate_project_projectStartDate').focus()
			return false;
		} 
        if($.trim($('#update_project_projectEndDate').val()) == ''){
			alert('Please enter projectEndDate.');
			$('#update_project_projectEndDate').focus()
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : '../controller/project_update_process.php',
		data : data,
		success :  function(data)
				   {						
						$("#update_project_form_container").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
//                                $("#").load("myaccount2.php");
//								$(".result").html(data);
                                
                            $("#message_div").text("project updated!").fadeOut(3000).hide;
                                
                                location.reload(window.location);
							});
						});   
				   },
            
		});
		return false;
	});
});

</script>
<script>
$(function(){
    $(document).on('click','.delete_event_icon',function(){
        var del_event_id= $(this).parent().attr('id');
        console.log(del_event_id);
        
       if (confirm("are you sure you want to delete this event?")){

        $.ajax({
            type:'POST',
            url:'../controller/event_delete_process.php',
            data:{'del_event_id':del_event_id},
            success: function(data){
						$("#view_events").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
                            $("#message_div").text("event updated!").fadeOut(3000).hide;
                                
                                location.reload(window.location);
						});
						});   
				   },

            });
            }
        });
});
</script>
<script>
//$(function(){
//   'use strict';
//    
//    var regex = {
//      //regex patterns here 
//        email: 	/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
//    };
//    
//    $.each($('.validate fieldset input:not([type="submit"])'), function(){
//        $(this).on('focusout',function(){
//            if(!regex[$(this).attr('name')].test($(this).val())){
//                $(this).addClass('error');
//        }else{
//            $(this).removeClass('error');
//        }
//                  
//        });
//    });
//    
//});
</script>
<script>
//  $( function() {
//    $( "#create_project_projectStartDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
//  } ); 
//$( function() {
//    $( "#create_project_projectEndDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
//  } );
//
//    
//    
// $(function () {
//        $("#create_project_projectStartDate").datepicker({
//            dateFormat: 'dd/mm/yy',
//            inline: true,
////            minDate: 'dateToday'
//        });
//        $("#create_project_projectEndDate").datepicker({
//            dateFormat: 'dd/mm/yy',
//            inline: true,
//             minDate: $("#create_project_projectStartDate").datepicker("getDate") });
//        });
</script>
<script>
$(document).on("click",".event_details_view_more_icon", function(){
    $(this).next(".events_details_view_more").show();
    $(this).hide();
                });
$(document).on("click",".event_update_icon", function(){
    $(this).next(".event_update_form").show();
    $(this).prev(".event_details_view_more_icon").hide();
    $(this).prev(".event_details_view").hide();
    $(this).hide();
                });
$(document).on("click",".event_cancel_update_icon", function(){
    $(".event_update_form").hide();
    $(".event_details_view").show();
    $(".event_details_view_more_icon").show();
    $(".event_update_icon").show();
    $(".events_details_view_more").hide();

                });
</script>
<script>

$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '.event_update_form', function()
	{
        if($.trim($('#projectID_event_update').val()) == ''){
			alert('Please enter projectID.');
			$('#projectID_event_update').focus()
			return false;
		}
        
		if($.trim($('#eventID_update').val()) == ''){
			alert('Please enter eventID.');
			$('#eventID_update').focus()
			return false;
		}
		if($.trim($('#event_name_update').val()) == ''){
			alert('Please enter event_name.');
			$('#event_name_update').focus()
			return false;
		}
        if($.trim($('#event_description_update').val()) == ''){
			alert('Please enter event Description.');
			$('#event_description_update').focus()
			return false;
		}
        if($.trim($('#event_date_update').val()) == ''){
			alert('Please enter event date.');
			$('#event_date_update').focus()
			return false;
		}
        if($.trim($('#event_location_update').val()) == ''){
			alert('Please enter location.');
			$('#event_location_update').focus()
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : '../controller/event_update_process.php',
		data : data,
		success :  function(data)
				   {						
                        $("#view_events").fadeOut(500).hide(function()
						{
							$("#message_div").fadeIn(500).show(function()
							{
                                
                            $("#message_div").text("Event Updated").fadeOut(3000).hide;
                                location.reload(window.location);
							});
						});   
				   },
            
		});
		return false;
	});
});

</script>
<script>
$(document).on("click","#noproject_addproject_icon", function(){
            $("#create_project_form").toggle();
            $(".tint_transparent").show();
                });
$(document).on("click","#close_outside_project_form", function(){
            $("#create_project_form").hide();
            $(".tint_transparent").hide();
                });

</script>
<script>
//$(document).on("click","#add", function(){
//            $(".add_toggle").toggle(function(){
//                $(".add_toggle").css({'display':'inline-block'})
//                                    }),function(){
//                    $(".add_toggle").css({'display':'none'});
//            }
//                    
//                });
    $(document).on("click","#add", function(){
            $('.add_toggle').animate({width: 'toggle'}, 'medium', function() {
    if ($(this).is(':visible'))
        $(this).css('display','inline-block');
});
              
                });
</script>
<html>
  <body>
    <div id="user_account_container">
        <div class="tint_black" style="width:100%;height:100%;position:absolute;top:0px;left:0px;background-color:black;opacity:0.9;"></div>
        
      <div id="user_account_left_sidebar">
        <div style="width:30px;height:40px;border:3px solid #DCE1E7;float:left;">
            <a href="../controller/logout_process.php" style="font-size:2em;margin:0px;text-decoration:none;color:#DCE1E7;">&#8617;</a>
        </div>
        <div id="user_account_image">
            <?php
            $memberID= $_SESSION['userID'];
       $imageresult =  getimage($memberID);
            ?>
        </div>
        <div id="user_account_name">
          <?php echo $_SESSION['user']?>
        </div>
        <div id="scrollbar_style" class="scrollbar">
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
              <div title="Edit Project" id="view_project_icon" style="background-color:#2e275c;display:inline-block;border-radius:30px;width:40px;height:40px;">
                 <i style="color:#9cf0f0;font-size:2em;padding-top:4px;" class="fa fa-pencil"></i>
              </div>
              <div title="Delete Project" id="delete_project_icon" style="background-color:#2e275c;display:inline-block;border-radius:30px;width:40px;height:40px;">
                  <i style="color:#9cf0f0;font-size:2em;padding-top:4px;" class="fa fa-trash-o"></i>
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
            print_r ('<img class="project_member_image" src="data:image/jpeg;base64,'.base64_encode( $team_member['memberImage'] ).'"/>');
        }else{
            echo '<img class="project_member_image" src="../view/img/defaultmember.png"/>';    
             }   
                  
                  ?>
              </div>
              <?php endforeach; ?>
                <div title="Add Member" id="add_member_project_icon" style="background-color:#2e275c;display:inline-block;border-radius:30px;width:50px;height:50px;vertical-align:top;margin-top:10px;border:1px solid #9cf0f0">
        <i style="color:#9cf0f0;font-size:2.5em;padding-left:9.5px;padding-top:5px;" class="fa fa-plus"></i>
    </div>  
            </div>
          </div>
          <?php endforeach;?>
                  </div>
      </div>
      <div id="user_account_middle">
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
            echo '<p class="project_notice">'.'SELECT PROJECT'.'</p>';?>
            <span id="noproject_addproject_icon" style="background-color:#fff;border:2px solid #9cf0f0; width:60px;height:60px;border-radius:50px;text-align:center;vertical-align:top;float:right;position:fixed;bottom:5px;right:0px;">
                <i title="Add Project" style="color:#4a4e70;font-size:3em;padding-top:5px;" class="fa fa-plus"></i>    
                </span>
            <form style="border:1px solid #4a4e70;border-top:20px solid #4a4e70;background-color:#fff;width:400;display:none;position:fixed;top:300px;left:800px;z-index:3;"method="post" action="../controller/project_create_process.php" name="create_project_form" id="create_project_form">
                    <div style="float:right;font-size:30px;"id="close_outside_project_form">&#x2716;
                    </div>
                <span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Add Project</span><br/><br/>
                    <label>Project Name:</label>
                    <input type="text" name="create_project_projectName" id="create_project_projectName" placeholder="Project Name" required><br/>
                <label>Project Description:</label>
                    <input type="text" name="create_project_projectDescription" id="create_project_projectDescription" placeholder="Project Description" required><br/>
                <label>Project Start Date:</label>
                  <input type="text" name="create_project_projectStartDate" id="create_project_projectStartDate" placeholder="YYYY-MM-DD" style="background-color:white;" required><br/>
                <label>Project End Date:</label>
                    <input type="text" name="create_project_projectEndDate" id="create_project_projectEndDate" placeholder="YYYY-MM-DD" required><br/>
                <span style="text-align:center;width:100%;display:inline-block">    
                    <input class="submit" value="Add Project" type="submit" name="create_project_submit" id="create_project_submit" required></span><br/>
     
                </form>
            
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
//                    echo "yes";


            do {  
            // loops through 7 times 
            echo "<span class=\"day\" id=\"" . $dt->format('Y-m-d') . "\" value=\"" . $dt->format('Y-m-d') . "\">" . "<div class=\"day_name\">" . $dt->format('l') .  "<br>" . $dt->format('d M Y'). "</div>". 
            "</br>". "</br>". "</br>". "</br>";
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
            id="'. $DTID['taskID']. '" name="'. $DTID['taskID']. '">'.'<span class="taskname">' . 
//                $DTID['taskName']. 
                '</br>'.'</span>' . 
            '<div title="Edit Task" id="task_icon_view" style="width:25px;height:25px;border:1px solid #DCE1E7; border-radius:15px;text-align:center;display:inline-block;">'.
                '<i style="color:#fff;font-size:1em;padding-top:3px;" class="fa fa-pencil"></i>'
            .'</div>'.
            '<div id="no"style="display:none;background-color:yellow;">'.
            '<div class="viewtaskid" id="'. $DTID['taskID']. '">name</div>'.
            '<div class="viewtaskname" id="'. $DTID['taskName']. '">name</div>'.
            '<div class="viewtaskdesc" id="'. $DTID['taskDescription']. '">desc</div>'.
            '<div class="viewtaskstartdate" id="'. $DTID['taskStartDate']. '">start</div>'.
            '<div class="viewtaskenddate" id="'. $DTID['taskEndDate']. '">end</div>'.
            '<div class="viewtaskcolour" id="'. $DTID['taskColour']. '">Colour</div>'.
            '</div>'.
            '<div title="Task Delete" class="task_icon_delete" style="width:25px;height:25px;border:1px solid #DCE1E7; border-radius:15px;text-align:center;display:inline-block;">'.
                '<i style="color:#fff;font-size:1em;padding-top:3px;" class="fa fa-trash-o"></i>'
            .'</div>'
            .'</span>' . '</br>';
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
            } while ($week == $dt->format('W'));} 
          ?> 
          <a id="prev_button" href="<?php echo $_SERVER['PHP_SELF'].'?projectID='.$_GET['projectID'].'&week='.($week-1).'&year='.$year; ?>">&lt;
          </a> 
          <!--Previous week-->
          <a id="next_button" href="<?php echo $_SERVER['PHP_SELF'].'?projectID='.$_GET['projectID'].'&week='.($week+1).'&year='.$year; ?>">&gt;
          </a> 
          <!--Next week-->
<!--
           <div style="position:fixed;top:200px;left:900px; backgroud-color:black;">
                <select id="evt_color"> 
                <option value="#3366CC">Blue</option> 
                <option value="#E070D6">Fuchsia</option> 
                <option value="#808080">Gray</option> 
                <option value="#4bb64f">Green</option> 
                <option value="#ed9d2b">Orange</option> 
                <option value="#FF9CB3">Pink</option> 
                <option value="#EA4A4A">Red</option> 
                </select>
            </div> 
-->
            
            
<!--          <span style="position:fixed;right:0px;bottom:0px;background-color:yellow;" id="task_bar_up">up</span>-->
<!--          <div style="position:fixed; bottom:5px;right:0px; width:80%;height:70px;" id="task_bar">-->
              <div style="background-color:yellow;">
          
            <span class="js_form task_bar_icon add_toggle" style="display:none;background-color:#fff;border:2px solid #9cf0f0; width:40px;height:40px;border-radius:50px;text-align:center;vertical-align:top;float:right;position:fixed;bottom:50px;right:150px;">
                <i title="Add Project" style="color:#4a4e70;font-size:2em;padding-top:5px;" class="fa fa-bookmark-o hide_icon"></i>
<!--                <div class="tint_transparent" style="width:100%;height:100%;position:fixed;top:0px;left:0px;background-color:transparent;"></div>-->
                <form method="post" action="../controller/project_create_process.php" name="create_project_form" class="form_hide validate" id="create_project_form" style="border:1px solid #4a4e70;border-top:20px solid #4a4e70;background-color:#fff;width:400;">
                    <div style="float:right;font-size:30px;" class="close">&#x2716;
                    </div>
                <span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Add Project</span><br/><br/>
                    <label>Project Name:</label>
                    <input type="text" name="create_project_projectName" id="create_project_projectName" placeholder="Project Name" required><br/>
                    <label>Project Description:</label>
                    <input type="text" name="create_project_projectDescription" id="create_project_projectDescription" placeholder="Project Description" required><br/>
                    <label>Project Start Date:</label>
                  <input type="text" name="create_project_projectStartDate" id="create_project_projectStartDate" placeholder="YYYY-MM-DD" style="background-color:white;" required><br/>
                    <label>Project End Date:</label>
                    <input type="text" name="create_project_projectEndDate" id="create_project_projectEndDate" placeholder="YYYY-MM-DD" required><br/>
                    <input class="submit" type="submit" name="create_project_submit" id="create_project_submit" required><br/>
     
                </form>
              
            </span>
            <span class="js_form task_bar_icon add_toggle" style="display:none;background-color:#fff;border:2px solid #9cf0f0; width:40px;height:40px;border-radius:50px;text-align:center;vertical-align:top;float:right;position:fixed;bottom:50px;right:100px;">
                <i title="Add Task" style="color:#4a4e70;font-size:2em;padding-top:5px;" class="fa fa-align-left hide_icon"></i>            
              <form method="post" name="create_task_form" id="create_task_form" class="form_hide" style="border:1px solid #4a4e70;border-top:20px solid #4a4e70;background-color:#fff;width:400;">
                <div style="float:right;font-size:30px;" class="close">&#x2716;</div>
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
                <input class="submit" type="submit" name="create_task_submit" id="create_task_submit">
                <br/>
              </form>
            </span>
            <span class="js_form task_bar_icon add_toggle" style="display:none;background-color:#fff;border:2px solid #9cf0f0; width:40px;height:40px;border-radius:50px;text-align:center;vertical-align:top;float:right;position:fixed;bottom:50px;right:50px;">
                <i title="Add Event" style="color:#4a4e70;font-size:2em;padding-top:5px;" class="fa fa-calendar hide_icon"></i>
              <form method="post" name="create_event_form" id="create_event_form" class="form_hide" style="border:1px solid #4a4e70;border-top:20px solid #4a4e70;background-color:#fff;width:400;">
                <p class="close" style="float:right;font-size:30px;">&#x2716;
                </p>
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
                <input class="submit" type="submit" name="create_event_submit" id="create_event_submit">
                <br/>
              </form>
            </span>
                   
<!--
            <span  class="task_bar_icon" style="display:inline-block;background-color:yellow;width:70px;height:70px;border-radius:50px;text-align:center;vertical-align:top;">
              <a href="../controller/logout_process.php">LOG OUT
              </a>
            </span>
-->
              <span id="view_events_icon" style="display:inline-block;background-color:#fff;border:2px solid #9cf0f0; width:40px;height:40px;border-radius:50px;text-align:center;position:fixed;bottom:100px;right:0px;">
                  <i title="Add Event" style="color:#4a4e70;font-size:2em;padding-top:5px;" class="fa fa-calendar"></i>                 
                  </span>
            <div id="add" style="display:inline-block;background-color:#fff;border:2px solid #9cf0f0; width:40px;height:40px;border-radius:50px;text-align:center;vertical-align:top;position:fixed;right:0px;bottom:50px;">
              <i title="Add" style="color:#4a4e70;font-size:2em;padding-top:5px;" class="fa fa-plus"></i>
            </div>
            <span  id="task_bar_myaccount" class="task_bar_icon" style="display:inline-block;background-color:#fff;border:2px solid #9cf0f0; width:40px;height:40px;border-radius:50px;text-align:center;vertical-align:top;position:fixed;bottom:0px;right:0px">
                <i title="View Account" style="color:#4a4e70;font-size:2em;padding-top:5px;" class="fa fa-user"></i>
            </span>
            </div>
            
            <?php 
            $event_sql = "SELECT * FROM event WHERE eventDate BETWEEN '".$week_start."' AND '".$week_end."' AND projectID = '".$_GET['projectID']."' ORDER BY eventDate";
            $statement = $conn->prepare($event_sql);
            $statement->execute();
            $events = $statement->fetchAll();
            echo '<div style="background:rgba(73,76,99,0.8);color:white;position:fixed;left:40%;top:25%;width:400px; height:500px;overflow:scroll;z-index:3;" id="view_events">';
            echo '<div id="close_view_events" style="float:right;font-size:30px;">&#x2716;</div>';
            echo '<span style="color:white;width:100%;display:inline-block;margin-bottom:10px;text-align:center;font-size:25px;font-weight:bold;">EVENTS FOR THE WEEK';
            echo '</span>';
            foreach ($events as $event){
            echo '<div id="'.$event['eventID'].'" class="events_view" style="border-left:10px solid #00ff40;background-color:white;text-align:center;color:black;font-weight:bold;" >'.
            '<span style="" class="delete_event_icon">x</span>'.'</br>'.
            '<div class="event_details_view">'.
            'Event:'. $event['eventName'].'<br/>'.'Event Date:'. $event['eventDate'].'</br>'.
            '<span class="event_details_view_more_icon" style="color:green;">View more...</span>'.
            '<div class="events_details_view_more">'.
            'Event Description:'. $event['eventDescription'].'</br>'.
            'Event Location:'. $event['eventLocation'].'</br>'.
            '</div>'.
            '</div>'.
            '<span class="event_update_icon" style="color:blue;">EDIT</span>'.
            '<form method="post" class="event_update_form" style="display:none;">'.
                '<span class="event_cancel_update_icon" style="color:red;font-weight:bold;">Cancel Update</span>'.'</br>'.
                '<input type="hidden" id="projectID_event_update" name="projectID_event_update" value="'.$_GET['projectID'].'"/>'.
                '<input type="hidden" id="eventID_update" name="eventID_update" value="'.$event['eventID'].'"/>'.
                '<label>Event Name:</label>'.
                '<input type="text" id="event_name_update" name="event_name_update" value="'.$event['eventName'].'"/>'.'</br>'.
                 '<label>Event Description:</label>'.
                '<input type="text" id="event_description_update" name="event_description_update" value="'.$event['eventDescription'].'"/>'.'</br>'.
                 '<label>Event Date:</label>'.
                '<input type="text" id="event_date_update" name="event_date_update" value="'.$event['eventDate'].'"/>'.'</br>'.
                 '<label>Event Location:</label>'.
                '<input type="text" id="event_location_update" name="event_location_update" value="'.$event['eventLocation'].'."/>'.'</br>'.
                '<input class="submit" type="submit" id="event_update_submit" name="event_update_submit" value="Update"/>'.
            '</form>'
                
            .'</div>'.'</br>';
            }
            $events_after_sql = "SELECT * FROM event WHERE eventDate > '".$week_end."' AND projectID = '".$_GET['projectID']."' ORDER BY eventDate";
            $statement = $conn->prepare($events_after_sql);
            $statement->execute();
            $events_after = $statement->fetchAll();
                
            echo '<span style="color:white;width:100%;display:inline-block;margin-bottom:10px;text-align:center;font-size:25px;font-weight:bold;">EVENTS AFTER THIS WEEK';
            echo '</span>';
            foreach ($events_after as $event_after){
             echo '<div id="'.$event_after['eventID'].'" class="events_view" style="border-left:10px solid #00ff40;background-color:white;text-align:center;color:black;font-weight:bold;" >'.
            '<span style="" class="delete_event_icon">x</span>'.'</br>'.
            '<div class="event_details_view">'.
            'Event:'. $event_after['eventName'].'<br/>'.'Event Date:'. $event_after['eventDate'].'</br>'.
            '<span class="event_details_view_more_icon" style="color:green;">View more...</span>'.
            '<div class="events_details_view_more">'.
            'Event Description:'. $event_after['eventDescription'].'</br>'.
            'Event Location:'. $event_after['eventLocation'].'</br>'.
            '</div>'.
            '</div>'.
            '<span class="event_update_icon" style="color:blue;">EDIT</span>'.
            '<form method="post" class="event_update_form" style="display:none;">'.
                '<span class="event_cancel_update_icon" style="color:red;font-weight:bold;">Cancel Update</span>'.'</br>'.
                 '<input type="hidden" id="projectID_event_update" name="projectID_event_update" value="'.$_GET['projectID'].'"/>'.
                '<input type="hidden" id="eventID_update" name="eventID_update" value="'.$event_after['eventID'].'"/>'.
                 '<label>Event Name:</label>'.
                '<input type="text" id="event_name_update" name="event_name_update" value="'.$event_after['eventName'].'"/>'.'</br>'.
                 '<label>Event Description:</label>'.
                '<input type="text" id="event_description_update" name="event_description_update" value="'.$event_after['eventDescription'].'"/>'.'</br>'.
                 '<label>Event Date:</label>'.
                '<input type="text" id="event_date_update" name="event_date_update" value="'.$event_after['eventDate'].'"/>'.'</br>'.
                 '<label>Event Location:</label>'.
                '<input type="text" id="event_location_update" name="event_location_update" value="'.$event_after['eventLocation'].'."/>'.'</br>'.
                '<input class="submit" type="submit" id="event_update_submit" name="event_update_submit" value="update"/>'.
            '</form>'
                
            .'</div>'.'</br>';
            }
            echo '</div>';
             ?>

<!--            <span style="background-color:yellow;" id="task_bar_down" >down</span>-->
<!--          </div>    -->
          <?php      
            }
            ?>
            
<!--            <div id="test" style="backgroundcolor=red;width:100px;height:100px;">sdfsdf</div>-->
 <div class="tint_transparent" style=""></div>
    <div id="task_view" style="display:none;position:fixed;top:30%;left:40%;background-color:#fff;width:400px;height:250px;z-index:3">
   

    <div style="width:100%;height:20px;display:inline-block;">
        
        <span id="view_task" style="width:50%;height:40px;display:inline-block;float:left;background-color:#1a1154;color:white;">
            Task
        </span>
        <span id="view_checklist" style="width:50%;height:40px;display:inline-block;float:left;background-color:#2b245b;color:white;">
            Checklists
            <p style="float:right;font-size:30px;vertical-align:top;" id="close_task_view">&#x2716;</p>
        </span>
        <form  id="view_task_popup_task" name="view_task_popup_task" class="view_task_popup" style="background-color:white;">
         <input type="hidden" placeholder="taskID" id="view_task_taskID" name="view_task_taskID" value=""/>
        <input type="hidden" name="view_task_projectID" id="view_task_projectID" placeholder="projectID"value="<?php echo $_GET['projectID'] ?>"/>
        <label>Task Name:</label>
        <input type="text" name="view_task_taskName" id="view_task_taskName" placeholder="Task Name"/><br/>
        <label>Task Description:</label>
        <input type="text" name="view_task_taskDescription" id="view_task_taskDescription" placeholder="Task Description"/><br/>
        <label>Task Start Date:</label>
        <input type="datetime" name="view_task_taskStartDate" id="view_task_taskStartDate" placeholder="Task Start Date"/><br/>
        <label>Task End Date:</label>
        <input type="datetime" name="view_task_taskEndDate" id="view_task_taskEndDate" placeholder="Task End Date"/><br/>
        <label>Task Colour:</label>
        <input type="color" name="view_task_taskColour" id="view_task_taskColour" placeholder="Task Colour"/><br/>
        <span style="text-align:center;width:100%;display:inline-block">
        <input class="submit" type="submit" name="view_task_update_submit" id="view_task_update_submit" value="Update"/><br/>
        </span>
        </form>
        <div id="view_task_popup_checklist" class="view_task_popup" style="display:none;">
          <?php
            if (isset($_POST['submit'])) {
                
            }
?>
            <form action="" method="post">
                <input id="view_checklist_taskID" value="" />
               
                <input name="submit" type="submit" />
            </form>
<!--            <input id="view_checklist_taskID" value="" />-->
          
                        
<?php

            $sql="SELECT DISTINCT checklist.memberID FROM checklist JOIN task ON task.taskID=checklist.taskID JOIN project ON project.projectID=task.projectID WHERE checklist.taskID= '' AND task.projectID = '".$_GET['projectID']."'";

            $statement = $conn->prepare($sql);
            $statement->execute();
            $checklist_members = $statement->fetchAll();
            foreach ($checklist_members as $checklist_member){
                echo '<div class="checklist_member" id="'.$checklist_member['memberID'].'" style="display:inline-block;width:50px;height:50px;border-radius:20px;background-color:yellow;text-align:center;color:black;">'.$checklist_member['memberID'].'</div>'.'&nbsp';
        
            echo '<div class="checklist_more" style="background-color:pink;display:none;">';
         echo '<p id=close>x</p>';
            $taskid = 98;
            $member = $checklist_member['memberID'];
//            $sql="SELECT * FROM checklist WHERE memberID = $member";
            $sql="SELECT checklist.checklistID,checklist.checklistName,checklist.checklistItem,checklist.checklistItemStatus,checklist.checklistNotes,checklist.checklistDueDate
            FROM project JOIN task ON project.projectID=task.projectID JOIN checklist ON task.taskID=checklist.taskID WHERE checklist.taskID= $taskid AND checklist.memberID=$member";
//                var_dump($sql);
//                die();
            $statement = $conn->prepare($sql);
            $statement->execute();
            $checklist_items = $statement->fetchAll();
                foreach ($checklist_items as $checklist_item){
                    echo 'Checklist Name:'.' '.$checklist_item['checklistName'] . '</br>';
                    echo 'Checklist Due Date:'.' '.$checklist_item['checklistDueDate'] . '</br>';
                    
                }  
        echo '</div>';   

            }

?>
            
            
        </div>

    </div>
</div>
            <div id="message_div" style="font-size:2.5em;font-weight:bold;display:none;position:fixed;bottom:100px;right:30%;"></div>
            <div id="task-hover" style="display:none;width:250px;"></div>
     
    <div id="add_member_project_form_container" style="display:none;position:fixed;top:30%; left:45%;border:1px solid #4a4e70;border-top:20px solid #4a4e70;background-color:#fff;width:300;z-index:3;"> 
        <span id="add_member_project_form_close" style="float:right;font-size:30px;">&#x2716;</span>
    
    <form method="post" name="add_member_project_form" id="add_member_project_form">
    <span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Add Member</span><br/><br/>
    <input type="hidden" name="add_member_project_projectID" id="add_member_project_projectID" value="">
    <label>Member Username:</label><br/>
    <input style="margin-left:69px;margin-right:60px;" type="text" name="add_member_project_memberusername" id="add_member_project_memberusername" placeholder="Member Username"><br/> 
    <span style="text-align:center;width:100%;display:inline-block">
    <input class="submit" type="submit" name="add_member_project_submit" id="add_member_project_submit">
        </span><br/>
    </form>
    </div>
       <div id="my_account_details_container" style="">
           <div id="my_account_details_close" style="float:right;font-size:30px;">&#x2716;</div><br/>
           <div style="text-align:center;font-weight:bold;font-size:25px;">MY ACCOUNT DETAILS</div> <br/>
<!--           <div style="">MemberID: <?php //echo $_SESSION['userID'];?></div><br/>-->
         
           <?php
               global $conn;
                $memberID = $_SESSION['userID'];
                $sql = 'SELECT *  FROM member WHERE memberID = :memberID';
                $statement = $conn->prepare($sql);
                $statement->bindValue(':memberID', $memberID);
                $statement->execute();
                //use the fetch() method to retrieve a single row
                $user_results = $statement->fetchAll();
                $statement->closeCursor();
                
            foreach ($user_results as $user_result){
                    
           ?>
           <div>First Name:    <?php echo $user_result['memberFirstName']?></div><br/>
           <div>Last Name:    <?php echo $user_result['memberLastName']?></div><br/>
           <div>Username:    <?php echo $user_result['memberUsername']?></div><br/>
           <div>Email:    <?php echo $user_result['memberEmail']?></div><br/>
           <div>Join Date:    <?php echo $user_result['memberJoinDate']?></div>
           
           <?php    
           }
           ?> 

       </div>     
  
                 
        <div id="update_project_form_container" style="position:fixed;top:25%;left:40%;display:none;border:1px solid #4a4e70;border-top:20px solid #4a4e70;background-color:#fff;width:400;z-index:3;">
             <form method="post" name="update_project_form" id="update_project_form">
                    <div style="float:right;font-size:30px;" id="update_project_form_close">&#x2716;</div>
                    <span class="form_title" style="text-align:center;width:100%;display:inline-block; font-size:30px;font-weight:bold;">Update Project</span><br/><br/>
                    <input type="hidden" name="update_project_projectID" id="update_project_projectID" placeholder="ProjectID"><br/>
                    <label>Project Name:</label>    
                    <input type="text" name="update_project_projectName" id="update_project_projectName" placeholder="Project Name"><br/>
                    <label>Project Description:</label>
                    <input type="text" name="update_project_projectDescription" id="update_project_projectDescription" placeholder="Project Description"><br/>
                    <label>Project Start Date:</label>
                    <input type="datetime" name="update_project_projectStartDate" id="update_project_projectStartDate" placeholder="Project Start Date"><br/>
                    <label>Project End Date:</label>
                    <input type="datetime" name="update_project_projectEndDate" id="update_project_projectEndDate" placeholder="Project End Date"><br/>
                 <span style="text-align:center;width:100%;display:inline-block">
                    <input class="submit" value="update" type="submit" name="update_project_submit" id="update_project_submit"><br/>
                    </span>
                </form>    
            
        </div>         
            
            
            
            
            
            
        </div>
          
        
      </div>
    </div>
      
  </body>
  <?php
//require('footer.php');
?>
    
</html>
<!--
//            '<a href="'.$_SERVER['PHP_SELF'].'?projectID='.$_GET['projectID'].'&week='.$week.'&year='.$year.'&taskID='. $DTID['taskID'].'">'
//            .'V'.'</a>'
-->

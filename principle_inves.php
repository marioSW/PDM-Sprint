<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Research Data Storage Management</title>

<link rel="stylesheet" href="css/style.default.css" />

<link rel="stylesheet" href="css/bootstrap-fileupload.min.css" />
<link rel="stylesheet" href="css/bootstrap-timepicker.min.css" />

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.cookies.js"></script>
<script src="js/jquery.uniform.min.js"></script>
<script src="js/bootstrap-fileupload.min.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.tagsinput.min.js"></script>
<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/charCount.js"></script>
<script src="js/colorpicker.js"></script>
<script src="js/ui.spinner.min.js"></script>
<script src="js/chosen.jquery.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/custom.js"></script>
<script src="js/forms.js"></script>
</head>

<body>

<div id="mainwrapper" class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <a href="principle_inves.php"><img src="images/thumbs/logo.png" alt="" /></a>
        </div>
		
		 <div class="headerinner" style="margin-left: 260px;">
            <ul class="headmenu">
          <li class="right">
                    <div class="userloggedinfo">
                        <img src="images/thumbs/user_login.png" alt="">
						
						
                        <div class="userinfo">
                            <h5><?php echo $_SESSION['user_name']; ?><br><small><?php echo $_SESSION['mail'];?></small></h5>
							<h6></h6>
                            <ul>
								<li><a href="">View Profile</a></li>
								<li><a href="">Account Setting</a></li>
                                <li><a href="login.php">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
    </ul></div>
        
    </div>
	<div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
                              
				<li class="active"><a href="principle_inves.php"><span class="iconfa-list-alt"></span> Request Forms</a></li>
				</li>
              
				
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href=""><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            
            <li>Principal Investigatore</li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-calendar"></span></div>
            <div class="pagetitle">
                <h5></h5>
                <h1>Request For Storage</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">                
            
				<div class="widgetbox box-inverse"style="width:1000px;">
                <h4 class="widgettitle">Storage Request Form</h4>
                <div class="widgetcontent wc1">
                    
                    <form id="form" class="form-horizontal" role="form" action="" method="post">
                        
                        <div class="form-group">
                            <label for="firstname" class="col-md-2 control-label">User Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control input-large" name="name" id="name" placeholder="User Name" style="width:300px;">
                            </div>
                        </div>
                        
                       
                        
                       <div class="form-group">
                        <label for="inputPassword" class="col-md-2 control-label">Request type</label>
                        <div class="col-md-10"   >
                           <select  class="form-control input-default" id="type" name="type"   style="width:300px;" onchange="enableTextbox()" >
                                  <option value="" >Choose a type....</option> 
                                  
                                  <option value="Normal Storage">Normal Storage</option> 
                                  <option value="Additional Storage">Additional Storage</option> 
								 					  
								    
                                  
                                 
                            </select>
							
                        </div>
                    </div>
                          
					
					 <div class="form-group">
                            <label for="location" class="col-md-2 control-label">Reason</label>
                            <div class="col-md-10">
                                <textarea class="form-control input-default" id="reason" name="reason" placeholder="Reason" style="width:300px;"></textarea>
                            </div>
                        </div>
						
						
						
						
						 <div class="form-group">
                            <label for="location" class="col-md-2 control-label">Space Require</label>
                            <div class="col-md-10">
                                <textarea class="form-control input-default" id="description" name="description" placeholder="Space Require" style="width:300px;"></textarea>
                            </div>
                        </div>
						
						<div class="form-group">
                        <label for="inputPassword" class="col-md-2 control-label">Date Event</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <input 
									id="datepicker" type="text" placeholder="mm-dd-yyyy" name="date" id="date" class="form-control" style="width:120px;"  />
                                </div>
                            </div>
                        </div>
                    </div>
					</br>
					<div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
							    <button input type="submit" class="btn btn-primary" name="submit" >Submit Request</button>
                            </div>
							
                    </div>
						
                    </form>
					
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "storage_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['submit'])){
$requesttype = $_POST['type'];
					$reas = $_POST['reason'];
					$date =$_POST['date'] ;
					$dd=date_create($date);
					$datepic=date_format($dd,"Y-m-d");
					$userid=$_POST['log'];
$sql = "INSERT INTO `storage_system`.`request` (`request_type`, `request_status`, `request_date`, `user_id`) VALUES ('$requesttype', '$reas', '$datepic', '$userid');";
 if ($conn->query($sql) === TRUE) {
    echo "<font color=\"green\">New record created successfully</font>";	
} 
else {
      echo alert("<font color=\"red\">Error: " . $sql . "<br>" . $conn->error."</font>");
}
} 
$conn->close();
?>         
                    
					</div><!--widgetcontent-->
				</div><!--widget-->

            </br>
            
            <div class="footer">
                    <div class="footer-left">
                        <span>&copy; 2015.Group-11. All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed by: <a href="">Group-11</a></span>
                    </div>
                </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->




<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#form").validate({
		rules: {
			name: "required",
			type: "required",
			location: "required",
			date: "required",
			description: "required"
		},
		messages: {
			name: "Please enter user name",
			type: "Please select request type",
			location: "Please enter the reason",			
			date: "Please select date",
			description: "Please enter the space require"
		}
	});
});



</script>
<script type = "text/javascript">
function enableTextbox() {
var val = document.getElementById("type").selectedIndex;
var op = document.getElementById("type").options;
if (op[val].text == 'Regular Event') { document.getElementById("datepicker").disabled = true}
else { document.getElementById("datepicker").disabled = false}

if (op[val].text == 'Special Event') { document.getElementById("day").disabled = true}
else { document.getElementById("day").disabled = false}
}
</script>


</body>
</html>

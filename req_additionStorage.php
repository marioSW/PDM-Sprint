<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Research Data Storage Management</title>

<link rel="stylesheet" href="css/style.default.css" />
<link rel="stylesheet" href="css/style.palegreen.css" />
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
             <a href="admin.php"><img src="images/thumbs/logo.png" alt="" /></a>
        </div>
		 <div class="headerinner" style="margin-left: 260px;">
            <ul class="headmenu">
          <li class="right">
                    <div class="userloggedinfo">
                        <img src="images/thumbs/user_login.png" alt="">
						
						
                        <div class="userinfo">
                            <h5><?php  echo $_SESSION['name'];?><br><small><?php echo $_SESSION['mail'];?></small></h5>
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
       <div class="headerinner" style="margin-left: 260px;">
            <ul class="headmenu">
          <li class="right">
                    <div class="userloggedinfo">
                        <img src="images/thumbs/thumb1.png" alt="">
						
						
                        <div class="userinfo">
                            <h5><?php echo $_SESSION['user_name']; ?><br><small><?php echo $_SESSION['mail']; ?></small></h5>
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
                
                <li class="dropdown"><a href=""><span class="iconfa-list-alt"></span>Additional Storage</a>
				<ul style="display: block">
                        <li class="active"><a href="req_additionStorage.php">Request Additional Storage </a></li>
                        <li><a href="Myprogress.php">Progress</a></li>
                    </ul>
				</li>

            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href=""><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="req_additionStorage.php">Additional Storage </a> <span class="separator"></span></li>
            <li>Request additional storage </li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-list-alt"></span></div>
            <div class="pagetitle">
                <h5>Additional Storage</h5>
                <h1>Request Additional Storage</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">                
            
				<div class="widgetbox box-inverse"style="width:1000px;">
                <h4 class="widgettitle">Additional Storage Request Form</h4>
                <div class="widgetcontent wc1">
                    
                    <form id="form" class="form-horizontal" role="form" method="post">
                        
                        
					<div class="form-group">
                            <label for="heading" class="col-md-2 control-label">User Name</label>
                            <div class="col-md-10">
                                <b><input type="text" class="form-control input-large" name="name" id="name" value="Data Manager" placeholder="user name" style="width:300px;" ></b>
                            </div>
                        </div>
					
					  					 
						<div class="form-group">
                            <label for="reason" class="col-md-2 control-label">Reason</label>
                            <div class="col-md-10">
                                <textarea class="form-control input-default" id="reason" name="reason" placeholder="Reason" style="width:300px;"></textarea>
                            </div>
                        </div>
                        
						<div class="form-group">
                            <label for="spaceRequired" class="col-md-2 control-label">Space Required (MB)</label>
                            <div class="col-md-10">
                                <textarea class="form-control input-default" id="description" name="description" placeholder="Space Require" style="width:300px;"></textarea>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="date" class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input id="datepicker" type="text" placeholder="mm-dd-yyyy" name="date" id="date" class="form-control" style="width:120px;" />
                            </div>
                        </div>
						
						
                        <div class="form-group">
                             <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit Request</button>
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
				//$userid = $_SESSION['user_id'];
				$reason= $_POST['reason'];
				$space = $_POST['description'];
				$date =$_POST['date'] ;
				$dd=date_create($date);
				$date_add=date_format($dd,"Y-m-d");
				
				
				$sql = "INSERT INTO `request`(`request_date`,`request_reason`,`request_status`,`request_type`,`request_storage`,`user_id`) VALUES('$date_add','$reason','pending','additionalStorage','$space','1')";
				if ($conn->query($sql) === TRUE) {
				echo "<font color=\"green\">New record created successfully</font>";
}				 else {
                 echo "<font color=\"red\">Error: " . $sql . "<br>" . $conn->error."</font>";
}

}

				$conn->close();


?>
				   
				   

					</div><!--widgetcontent-->
				</div><!--widget-->
            
            
            
            

                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->


<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#form").validate({
		rules: {
			description: "required",
			reason: "required",
			date: "required",
			
			
		},
		messages: {
			description: "Please enter space required",
			reason:"Please enter the reason",
			date: "Please select date",
			
			
		}
	});
});




</script>



<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery( "#datepicker" ).datepicker();
});
</script>

<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery( "#datepicker1" ).datepicker();
});
</script>




</body>
</html>

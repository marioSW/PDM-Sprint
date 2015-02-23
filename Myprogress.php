<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Zoo Ceylon</title>

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
                        <li><a href="req_additionStorage.php">Request Additional Storage</a></li>
                        <li class="active"><a href="Myprogress.php">View Request Progress</a></li>
                    </ul>
				</li>    
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href=""><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="Myprogress.php">Additional Storage</a> <span class="separator"></span></li>
            <li>View Request Progress</li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-list-alt"></span></div>
            <div class="pagetitle">
                <h5>Additional Storage</h5>
                <h1>View Request Progress</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">                
            
				<div class="widgetbox box-inverse">
                <h4 class="widgettitle">Additional Storage Request Progress</h4>
                <div class="widgetcontent wc1">
                    
                    <form id="form" class="form-horizontal" role="form">
                      
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
						$sql="SELECT * FROM `request` WHERE `user_id`=1;";
						$result = $conn->query($sql);
						if($result->num_rows > 0){
						echo "<table class=\"table table-bordered table-infinite\" id=\"dyntable2\" style=\"margin:-1px;\">
                    <colgroup>
                       
                        <col class=\"con1\" />
                        <col class=\"con0\" />
                        <col class=\"con1\" />
                        <col class=\"con0\" />
                       
                    </colgroup>
                    <thead>
                        <tr>
                           <!--	<th class=\"head0 nosort\"><input type=\"checkbox\" class=\"checkall\" /></th> --->
                            
							<th class=\"head0\">Request_Date</th>
                            <th class=\"head1\">Reason</th>
                            <th class=\"head0\">Status</th>
                          <th class=\"head1\">Storage</th>
						
						  <th class=\"head1\">Request Type</th>
                          
                        </tr>
                    </thead>";
                    
					
					while($row = $result->fetch_assoc())
					{
						echo "<tbody>";
						echo "<tr class=\"gradeX\">";
						
						echo "<td>".$row["request_date"]."</td>";
						echo "<td>".$row["request_reason"]."</td>";
						echo "<td>".$row["request_status"]."</td>";
						echo "<td>".$row["request_storage"]."</td>";
						
						echo "<td>".$row["request_type"]."</td>";
						
						echo "</tr>";
						echo "</tbody>";					
                        
                    }
					
						}
					else
					{
						echo "<font color=\"red\"> 0 results </font>";
					}
					echo "</table>";
					
				?>
                    
					</div><!--widgetcontent-->
				</div><!--widget-->
            
            
            
            
            <div class="footer">
                    <div class="footer-left">
                        <span></span>
                    </div>
                    <div class="footer-right">
                        <span><a href=""></a></span>
                    </div>
                </div><!--footer-->
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->




</body>
</html>

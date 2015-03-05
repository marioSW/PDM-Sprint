<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Research Data Storage Management</title>

<link rel="stylesheet" href="css/style.default.css" />
<link rel="stylesheet" href="css/responsive-tables.css">

    
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/modernizr.min.js"></script>
<script src="js/jquery.cookies.js"></script>
<script src="js/jquery.uniform.min.js"></script>
<script src="js/flot/jquery.flot.min.js"></script>
<script src="js/flot/jquery.flot.resize.min.js"></script>
<script src="js/responsive-tables.js"></script>
<script src="js/jquery.slimscroll.js"></script>

<script src="js/custom.js"></script>

<!--[if lte IE 8]>
<script src="js/excanvas.min.js"></script>
<![endif]-->

</head>

<body>

<div id="mainwrapper" class="mainwrapper">
    
    <div class="header">
        <div class="logo">
        <a href="pending_requests.php"><img src="images/thumbs/logo.png" alt="" /></a>
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
            	<li class="nav-header"></li>
               
                <li class="dropdown active"><a href=""><span class="iconfa-list-alt"></span> Storage Requests</a>
                	<ul style="display: block">
                        <li class="active"><a href="pending_requests.php">Pending Storage Requests</a></li>
                        <li ><a href="all_requests.php">All Storage Requests</a></li>
						<li ><a href="accepted_requests.php">Approved Storage Requests</a></li>
						<li ><a href="rejected_requests.php">Rejected Storage Requests</a></li>
                    </ul>
                </li>
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="pending_requests.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Approver</li>
            
        </ul>
        
        <div class="pageheader">
          
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h1><b>Pending Storage Requests</b></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row">
                    <div id="dashboard-left" class="col-md-8">
                        
                          <h4 class="widgettitle"><span class="glyphicon glyphicon-comment glyphicon-white"></span> Pending Requests</h4>
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
						
						
						<br/>
						
						
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
						
						$sql="SELECT * FROM `system_user` s ,`request` r WHERE r.user_id=s.user_id AND r.request_status='Pending' AND r.request_type='Normal' AND s.user_type='principleinvestigator'";
						$result = $conn->query($sql);
						
						if($result->num_rows > 0){
						while($row = $result->fetch_assoc())
						{
						$usernames=$row['user_un'];
						$desgnation=$row['user_type'];
						$type=$row['request_type'];
						$date=$row['request_date'];
						
							
						
                            echo "<ul class=\"commentlist\">
                                <li>
									
                                    <div class=\"comment-info\">
                                     
									<h5><b>UserName :</b> ".$usernames."</h5>
									 </br>
									 
									<h5><b>Designation :</b> ".$desgnation."</h5>
									 </br>
									 
									<h5><b>Request Type :</b> ".$type."</h5>
									 </br>
									 
									<h5><b>Request Date :</b> ".$date."</h5>
									 </br>
									 
									 
                                        <p>
                                            <a href=\"\" class=\"btn btn-success btn-sm\" name=\"Accept1\" id=\"Accept1\"><span class=\"glyphicon glyphicon-thumbs-up glyphicon-white\"></span> Approve</a>
                                            <a href=\"\" class=\"btn btn-default btn-sm\" name=\"Reject1\" id=\"Reject1\"><span class=\"glyphicon glyphicon-thumbs-down\"></span> Reject</a>
                                        </p>
                                    </div>
                                </li>
                                
                            </ul>";
							
							
							}
							}
							?>
							
						</div>
						
						<br/>
					
                    </div><!--col-md-8-->
					
					<div id="dashboard-right" class="col-md-4">
                        
                        <h5 class="subtitle">Announcements</h5>
                        
                        <div class="divider15"></div>
                 
                                      
                </div><!--row-->
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
<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
</body>
</html>

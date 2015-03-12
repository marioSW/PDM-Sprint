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
            <a href="admin.php"><img src="images/thumbs/logo.png" alt="" /></a>
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
				
                <li class="active"><a href="admin.php"><span class="iconfa-laptop"></span> View Pending Requests</a></li>
                <li ><a href="admin_requests.php"><span class="iconfa-laptop"></span>Requests</a></li>
				
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
	<div class="rightpanel">
        
        <ul class="breadcrumbs">
             <li><a href="admin.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>View Pending Requests</li>
            
        </ul>
        
        <div class="pageheader">
          
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                
				<h5></h5>
                <h1>View Pending Requests</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row">
                    <div id="dashboard-left" class="col-md-8">
                        
                        <h4 class="widgettitle"><span class="glyphicon glyphicon-comment glyphicon-white"></span> Pending Requests</h4>
                        <div class="widgetcontent nopadding">
                            <ul class="commentlist">
							</br>
                               <?php
							require_once __DIR__ .'/DB/db_connect.php';
							$db=new DB_CONNECT();

							//variables
							$reqid;
							$reqtype;
							$usrid;
							$reqdate;
							$username;
							
							$response=$db->retrieve_requested();
							$json=json_decode($response,true);

							for($x=0;$x<count($json);$x++)
							{
								if(isset($json[$x]['REQ_ID']) != null)
								{
								$reqid=$json[$x]['REQ_ID'];
								$reqtype=$json[$x]['REQ_TYPE'];
								$usrid=$json[$x]['USR_ID'];
								$reqdate=$json[$x]['REQ_DATE'];
								$username=$db->retrieve_user_name($usrid);
							
							?>
                                <li>
                                    
                                    <div class="comment-info">
                                       <div class="row">
											
											<div class="col-md-6 ">
												<h4><b><?php echo "Requested by	 : ".$username?></b></h4>																						
												<h5><?php echo "<b>Request Type  :</b> ".$reqtype; ?></h5>
												<h5><?php echo "<b>Request Date  :</b> ".$reqdate; ?></h5>
											</div>
												<span class="col-md-6" ><h5><b><?php echo "Request ID   :".$reqid?></h5></b></span>	
										</div>
                                    </div>
                                </li>
                                
							<?php
								}
							
								else
								{
							
							?>
							 
								<li>
                                    
                                    <div class="comment-info">
                                        <h4><a href="">This is a Demo</a></h4>
                                        <h5><a href="">No Results Found</a></h5>
                                        <p>if there are any descriptions it would be like so</p>
                                        <p>
                                            <a href="" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-thumbs-up glyphicon-white"></span> Approve</a>
                                            <a href="" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-thumbs-down"></span> Reject</a>
                                        </p>
                                    </div>
                                </li>
                            <?php

								}	
							}
							
									
							?>
                                <li><a href="admin_requests.php">View All Requests</a></li>
                            </ul>

                        </div>
                        
                        <br />
                        
                        
                    </div><!--col-md-8-->
                    <div class="col-md-4">
						<div class="widgetbox">
							<h4 class="widgettitle">Approve or Reject <a class="close">&times;</a> <a class="minimize">&#8211;</a></h4>
							<div class="widgetcontent">
								<form id="form" class="form-horizontal" role="form" action="" method="post">
								<div class="form-group">
									choose request id: 
									<select class="uniformselect" name="choice" style="width:170">
									<option value=""> choose an Id </option>
									<?php 
									$only_requestid;
									$x=0;
							
									$response=$db->retrieve_req_pending_id();
									$json=json_decode($response,true);
							
									for($x=0;$x<count($json);$x++)
									{
								
										if(isset($json[$x]['REQ_ID']) != null)
										{
											echo "<option value='".$json[$x]['REQ_ID']."'>".$json[$x]['REQ_ID']."</option>";
										}
								
							
									}	
								
									?>
									</select>
								</div>
								<br>
								<div class="form-group">
									<button name="accept" id="accept" onclick="" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-thumbs-up glyphicon-white"></span> Approve</button>
									<button name="reject" id="reject" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-thumbs-down"></span> Reject</button>
								</div>
								<?php
								$selected_id;
								if(isset($_POST['accept']))
								{
								$selected_id=(isset($_POST['choice']) ? $_POST['choice'] : null);
								
								$response=$db->approve_requests($selected_id);
								}
								else if( isset($_POST['reject']))
								{
								$selected_id=(isset($_POST['choice']) ? $_POST['choice'] : null);
								$response=$db->reject_requests($selected_id);
								
								}
								?>	
							</form>	
							</div>
						</div><!--widgetbox-->
					</div><!--col-md-4-->
                    
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
    </body>
</html>
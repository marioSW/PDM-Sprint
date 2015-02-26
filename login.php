<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Research Data Storage Management</title>

<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<!--<link rel="stylesheet" href="css/style.palegreen.css" type="text/css" />-->

<!-- Helloo.... -->

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/modernizr.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/custom.js"></script>


</head>

<body class="loginpage" >


<div class="loginpanel">
    <div class="loginpanelinner">
        
        <div class="logo animate0 bounceIn"><img src="images/login_logo.png" alt="" /></div>
		<?php
			if(isset($_GET['msg']))
			{
				$message = $_GET['msg'];
				if($message == 1)
				{
					echo "<span style = 'color:green'>Your Entry has been saved! </span>";
					
				}
				if($message == 2)
				{
					echo "<span style = 'color:red;'>Invalid Username or Password </span>";
					
				}
				
			}
		
		?>
		
        <form id="login" name="Login-Form" action="login.php" method="post" role="form" >
            
           <!-- <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid username or password</div>
            </div>-->
			
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Enter any username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Enter any password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
               <!-- <button name="submit">Sign In</button>-->
					<button input type="submit" class="btn btn-primary" name="submit" id="submit" >Sign In</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <div class="pull-right">Not a member? <a href="registration.php">Sign Up</a></div>
                <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
            </div>
            <?php
session_start();
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
	if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM `system_user` WHERE user_un='$username' and user_pw='$password'";
	$getLogin = $conn->query($sql);
	$row =$getLogin->fetch_array();
	
	if($getLogin->num_rows > 0)
	{
		$_SESSION['IsValid'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_un'];
		$_SESSION['user_desig'] = $row['user_type'];
		$_SESSION['mail'] = $row['user_mail_address'];
		$_SESSION['name'] = $row['user_type'];
		
		if($_SESSION['user_desig'] == 'datamanager')
		{
		header("Location:req_additionStorage.php");
		}
			
		else if($_SESSION['user_desig'] == 'principleinvestigator')
		{
		header("Location:principle_inves.php");
		}
		
		else if($_SESSION['user_desig'] == 'administrator')
		{
		header("Location:admin.php");
		}
		
		else if($_SESSION['user_desig'] == 'approver')
		{
		header("Location:pending_requests.php");
		}
	/*	else if($_SESSION['user_desig'] == 'researcher')
		{
		header("Location:home_researcher.php");
		}
		
		*/ 		
	}
	else
	{
		header("Location:login.php?msg=2");
	}
	
	
	}
?>
			
        </form>
        
    </div><!--loginpanelinner-->
</div><!--loginpanel-->
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#form").validate({
		rules: {
			username: "required",
			password: "required"
			
		},
		messages: {
			username: "Please enter event name",
			password: "Please select event type"
		
		}
	});
});
</script>

</body>
</html>

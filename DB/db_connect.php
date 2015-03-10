<?php
#db_connect.php
#requiring the db_config file
require_once __DIR__ .'/db_config.php';

class DB_CONNECT{
	//constructor
	function __construct(){

	}

#function to retrieve requests that are have not been accepted
	function retrieve_requested()
	{
	$response;
		$con =new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		$qry="select * from request where `request_status`='pending'";
		$result=$con->query($qry);
	
		if( $result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					$response[]=array('REQ_ID'=>$row["request_id"],'REQ_TYPE'=>$row["request_type"],'REQ_DATE'=>$row["request_date"],'USR_ID'=>$row["user_id"]);
		
				}
			}
			else
			{
				$response[]=array("success"=>"error");
	
			}

		return json_encode($response);
		$con->close();
	
	}
	
	#getting users' name from id
	function retrieve_user_name($id)
	{
		$con =new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		$qry="select systemuser_name from `system_user` where user_id='".$id."'";
		$result=$con->query($qry);
		if( $result->num_rows>0)
			{
				
				while($row = $result->fetch_assoc())
				{
					$response=$row["systemuser_name"];
				}
			}
			return $response;
	}
	#get all users' requests
	function retrieve_all_requests()
	{
	$user_name;
	$response;
		$con =new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		$qry="select * from request";
		$result=$con->query($qry);
	
		
		if( $result->num_rows>0)
			{
				
				while($row = $result->fetch_assoc())
				{

					$response[]=array('REQ_ID'=>$row["request_id"],'REQ_TYPE'=>$row["request_type"],'REQ_DATE'=>$row["request_date"],'REQ_STAT'=>$row["request_status"],'USR_ID'=>$row["user_id"]);
		
				}
			}
			else
			{
				$response[]=array("success"=>"error");
	
			}

		return json_encode($response);
		$con->close();
	
	}
	
	#Function to approve requests by adding id
	function approve_requests($reqid)
	{
		$con =new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		$qry="update `request` set request_status='Approved' where request_id=".$reqid;
		$result=$con->query($qry);
		if($result == 1)
		{
		
		}
		else
		{
			echo "Failed to Approve";
		}
		return "success";
	}
	
	#function to retrieve all request ids's
	function retrieve_req()
	{
		$con=new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		$qry="select `request_id` from `request";
		$result=$con->query($qry);
		
		if( $result->num_rows>0)
			{
				
				while($row = $result->fetch_assoc())
				{

					$response[]=array('REQ_ID'=>$row["request_id"],'REQ_TYPE'=>$row["request_type"],'REQ_DATE'=>$row["request_date"],'REQ_STAT'=>$row["request_status"],'USR_ID'=>$row["user_id"]);
		
				}
			}
			else
			{
				$response[]=array("success"=>"error");
	
			}

		return json_encode($response);
		$con->close();
		
	}
}
?>
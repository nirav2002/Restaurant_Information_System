<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_restaurant")
	{
		save_restaurant();
		exit;
	}
	if($_REQUEST[act]=="delete_restaurant")
	{
		delete_restaurant();
		exit;
	}
	
	###Code for save restaurant#####
	function save_restaurant()
	{
		global $con;
		$R=$_REQUEST;		
		/////////////////////////////////////
		$image_name = $_FILES[restaurant_image][name];
		$location = $_FILES[restaurant_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}				
		if($R[restaurant_id])
		{
			$statement = "UPDATE `restaurant` SET";
			$cond = "WHERE `restaurant_id` = '$R[restaurant_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `restaurant` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`restaurant_name` = '$R[restaurant_name]', 
				`restaurant_type` = '$R[restaurant_type]', 
				`restaurant_email` = '$R[restaurant_email]', 
				`restaurant_facility` = '$R[restaurant_facility]', 
				`restaurant_cuisine_type` = '$R[restaurant_cuisine_type]', 
				`restaurant_about` = '$R[restaurant_about]', 
				`restaurant_phone` = '$R[restaurant_phone]', 
				`restaurant_image` = '$image_name',
				`restaurant_pincode` = '$R[restaurant_pincode]', 
				`restaurant_address` = '$R[restaurant_address]', 
				`restaurant_city` = '$R[restaurant_city]', 
				`restaurant_state` = '$R[restaurant_state]'".
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../restaurant-report.php?msg=$msg");
	}
#########Function for delete restaurant##########3
function delete_restaurant()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM restaurant WHERE restaurant_id = $_REQUEST[restaurant_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../restaurant-report.php?msg=Deleted Successfully.");
}
?>

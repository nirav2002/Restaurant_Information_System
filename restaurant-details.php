<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[restaurant_id])
	{
		$SQL="SELECT * FROM restaurant, city, state, restaurant_type WHERE restaurant_type = dt_id AND restaurant_city = city_id AND restaurant_state = state_id AND restaurant_id = $_REQUEST[restaurant_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$data[restaurant_name]?> Restaurant Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div id="myrow">
					
				<table>
		
						<tr>
							<th>Restaurant Type</th>
							<td><?=$data[dt_title]?></td>
						</tr>
						<tr>
							<th>Restaurant Name</th>
							<td><?=$data[restaurant_name]?></td>
						</tr>
						<tr>
							<th>Restaurant Email</th>
							<td><?=$data[restaurant_email]?></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><?=$data[restaurant_phone]?></td>
						</tr>
						<tr>
						<tr>
							<th>Restaurant City</th>
							<td><?=$data[city_name]?></td>
						</tr>
						<tr>
							<th>Restaurant State</th>
							<td><?=$data[state_name]?></td>
						</tr>
						<tr>
							<th>Restaurant Facility</th>
							<td><?=$data[restaurant_facility]?></td>
						</tr>
						<tr>
							<th>Cuisine Type</th>
							<td><?=$data[restaurant_cuisine_type]?></td>
						</tr>
					
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Restaurant <?=$data['restaurant_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[restaurant_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 

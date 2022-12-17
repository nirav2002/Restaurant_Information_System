<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `restaurant`, `restaurant_type`,`city`, `state` WHERE restaurant_type = dt_id AND restaurant_city = city_id AND restaurant_state = state_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_restaurant(restaurant_id)
{
	if(confirm("Do you want to delete the restaurant?"))
	{
		this.document.frm_restaurant.restaurant_id.value=restaurant_id;
		this.document.frm_restaurant.act.value="delete_restaurant";
		this.document.frm_restaurant.submit();
	}
}
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Restaurant Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_restaurant" action="lib/restaurant.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Image</td>
						<td scope="col">Restaurant Name</td>
						<td scope="col">Restaurant Type</td>
						<td scope="col">Email</td>
						<td scope="col">Phone</td>
						<td scope="col">City</td>
						<td scope="col">State</td>
						<td scope="col">Cuisine Type</td>	
						<td scope="col">Restaurant Facility</td>							
						<td scope="col">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[restaurant_id]?></td>
						<td>
						<a href="restaurant-details.php?restaurant_id=<?php echo $data[restaurant_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[restaurant_image]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[restaurant_name]?></td>
						<td><?=$data[dt_title]?></td>
						<td><?=$data[restaurant_email]?></td>
						<td><?=$data[restaurant_phone]?></td>
						<td><?=$data[city_name]?></td>
						<td><?=$data[state_name]?></td>
						<td><?=$data[restaurant_cuisine_type]?></td>
						<td><?=$data[restaurant_facility]?></td>
						<td style="text-align:center">
							<a href="restaurant.php?restaurant_id=<?php echo $data[restaurant_id] ?>">Edit</a> | <a href="Javascript:delete_restaurant(<?=$data[restaurant_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="restaurant_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 

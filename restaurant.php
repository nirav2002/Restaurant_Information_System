<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[restaurant_id])
	{
		$SQL="SELECT * FROM restaurant WHERE restaurant_id = $_REQUEST[restaurant_id]";
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
				<h4 class="heading colr"><?=$heading?>Add Restaurant</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/restaurant.php" enctype="multipart/form-data" method="post" name="frm_restaurant">
					<ul class="forms">
						<li class="txt">Restaurant Name</li>
						<li class="inputfield"><input name="restaurant_name" id="restaurant_name" type="text" class="bar" required value="<?=$data[restaurant_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Restaurant Type</li>
						<li class="inputfield">
							<select name="restaurant_type" class="bar" required/>
								<?php echo get_new_optionlist("restaurant_type","dt_id","dt_title",$data[restaurant_type]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Restaurant Email</li>
						<li class="inputfield"><input name="restaurant_email" id="restaurant_email" type="text" class="bar" required value="<?=$data[restaurant_email]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Restaurant Facility</li>
						<li class="textfield"><textarea name="restaurant_facility" cols="" rows="4" required style="width:300px; height:70px"><?=$data[restaurant_facility]?></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">Cuisine</li>
						<li class="textfield"><textarea name="restaurant_cuisine_type" cols="" rows="4" required style="width:300px; height:70px"><?=$data[restaurant_cuisine_type]?></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">About Restaurant</li>
						<li class="textfield"><textarea name="restaurant_about" cols="" rows="4" required style="width:300px; height:70px"><?=$data[restaurant_about]?></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">Restaurant Phone</li>
						<li class="inputfield"><input name="restaurant_phone" id="restaurant_phone" type="text" class="bar" required value="<?=$data[restaurant_phone]?>"/></li>
					</ul>
                    <ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield">
							<select name="restaurant_city" class="bar" required/>
								<?php echo get_new_optionlist("city","city_id","city_name",$data[restaurant_city]); ?>
							</select>
						</li>
					
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield">
							<select name="restaurant_state" class="bar" required/>
								<?php echo get_new_optionlist("state","state_id","state_name",$data[restaurant_state]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Restaurant Address</li>
						<li class="inputfield"><input name="restaurant_address" id="restaurant_address" type="text" class="bar" required value="<?=$data[restaurant_address]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Restaurant Pin Code</li>
						<li class="inputfield"><input name="restaurant_pincode" id="restaurant_pincode" type="text" class="bar" required value="<?=$data[restaurant_pincode]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="restaurant_image" type="file" class="bar"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_restaurant">
					<input type="hidden" name="avail_image" value="<?=$data[restaurant_image]?>">
					<input type="hidden" name="restaurant_id" value="<?=$data[restaurant_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 

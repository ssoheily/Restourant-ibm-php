
 <?php include_once('func.php'); ?> 
 <?php include_once('head.php'); ?> 
	<img src="foto.jpg" alt="Cinque Terre" width="800" height="600"  style=float:right style=width:300px>
	<p>welcome to restuarant: 
		<?php 
			function dd($a){  //// for debug
			print_r($a);
			}

	
		// URL token
		$user="Guest"; // loginAndlogout-parameter 1
		$loginparam="0";// log-parameter 2
		 if($_GET["param"]!="")
		 {
			$token_decrypted=base64_decode($_GET["param"]);// in login.php
			$token_decrypted=explode("$=$321",$token_decrypted);
			$userANDtimestamp=explode("$%$$$",$token_decrypted[0]);
			$timestamp=$userANDtimestamp[0]+10; //timestamp
			$user=$userANDtimestamp[1];  //userID'
			$loginparam="1";  // log-parameter 3 => in footer.php [if(is_user_loggen_in($loginparam)]
			$time_limit=time(); //current time
			//dd($timestamp."-".$time_limit); 
			// limit time for url copy 
			if($timestamp < $time_limit )
			{
				header('Location:http://localhost/dashboard/news/login.php');
			}
			
		 }

		  echo "<strong> ".$user."</strong></p>"; 
		  ?>
		
		<?php 
		
		 if(get_name_user()=="guest"){
			
		echo  "<b> ".'If you register, you will get %5 discount on the price    '."</b>"; 
		} 
		?> <br /><br />  <?php
		$timestamp = time()+date("Z");
		echo 'What do you want today: ';
		echo gmdate("Y/m/d H:i:s",$timestamp);?>

		<!-- print COMBO # in field product_id   // **-->	
		<script type="application/javascript">
		var default_value="COMBO #";
		function autofill()
		{
			var first_value = document.getElementById("product_id_java").value;
			document.getElementById("product_id_java").innerHTML = default_value + first_value ;
			document.getElementById("product_id_java").value = default_value + first_value ;
		}

		function delelelet()
		{
	
			document.getElementById("product_id_java").value ="" ;
		}

		function checkvalue()
		{
			var current_range=document.getElementById("rangessss").value ;

			document.getElementById("newrange").innerHTML = current_range  ;
		}
		</script>

		 <br />
		<!-- <p>If you register, you will get <mark>%</mark>5 discount on the price</p> -->
		<form action="fetch.php" method="POST"> 
		<br /><br /> 
		<label>Enter Product ID:</label><br /> 
		<input type="text" onchange="autofill()" onclick="delelelet()" id="product_id_java" name="product_id" placeholder="Enter Product ID" required/> 
		<?php // $_SESSION["userID"] = 'guest'; ?>
		<input style="display:none" type="text" name="kunde_name" value="<?php echo $user; /* $_SESSION["userID"] */  ?>"/> 
		<br /><br /> 

		<label>Enter Table ID:</label><br /> 
		<input type="number" name="table_id" placeholder="Enter Name"  max="10" required/> 
		<br /><br /> 

		<label>Enter Name:</label><br /> 
		<input type="text" name="namebediener" placeholder="Enter Name" required/> 
		<br /><br /> 
		
		<button type="submit" name="submit">Submit</button> 
		<br /><br /> 
		<label>Your satisfaction with previous orders:</label><br /> 
		<div style="color:'red';width:10%">
		<input onchange="checkvalue()" type="range" name="Feedback" id="rangessss" placeholder="Enter Feedback"  max="2"  required/> 
		
		<label style="" id="newrange">your Feedback:<br/><p>bad=0 gut=1 normal=2</p> </label>
		</div>		
		</form>

		
	<?php
	$t = date("H");
	
	if ($t < "20") {
	echo "Have a good day!";
	} else {
	echo "Have a good night!";
	}
	?>

		<?php include_once('footer.php'); ?> 







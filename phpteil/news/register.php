

 <?php include_once('func.php'); ?> 
 <?php include_once('head.php'); ?> 
 
 
 <div class="row">
 <!-- <div style=padding:15px55px30px; > -->
	<!--  exclusive col-md is 12(3+6+3)  -->
	
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Register </h3>
            </div>
            <div class="panel-body">
			<center> 
				<div id="users">
					<form onsubmit="formsubmit()" id="formtodb" > <!-- // go to line 89 for method and action -->
					<div class="form-group">
						<div class="col-sm-10">
						
						<label>Enter username</label><br /> 
						<input id="username" type="text" name="username" class="input" placeholder="your name ..." required/><br>
						</div>
						</div>
						<div class="form-group">	
						<div class="col-sm-10">	
						<br />					
						<label>Enter email</label><br /> 
						<input id="email" type="email" name="email" class="input" placeholder="your email ..." required/><br>
						</div>
						</div>
						<div class="form-group">
						<div class="col-sm-10">
						<br />
						<label>Enter password</label><br /> 
						<input id="regpassword" type="password" name="password" class="input" placeholder="your password ..."required/><br>
						</div>
						</div>
						<div class="form-group">
						<div class="col-sm-10">
						<br />
						<label>repeat password</label><br /> 
						<input id="regpasswordcopy" type="password" name="password-conf" class="input" placeholder="repeat your password ..." required/><br>
						</div>
						</div>
						<div class="form-group">
						<div class="col-sm-10">
						<br /> 
						<input type="submit" value="Register" />
						</div>
						</div>
					</form>
				</div>
			</center> 
			
            </div>
        </div>
        
		</div>
		<!--</div>-->
        <div class="col-md-3"></div>
    </div>	

	<?php include_once('footer.php'); ?> 
	
	<?php
error_reporting(0);
// keep the value on the page as long as the password are same     *** //
$username= $_GET["username"];
$emailname= $_GET["email"];
echo "<script>document.getElementById('username').value='".$username."';</script>";
echo "<script>document.getElementById('email').value='".$emailname."';</script>";
	
?>

<script>

function formsubmit() {
var regpassword = document.getElementById('regpassword').value;
var regpasswordcopy = document.getElementById('regpasswordcopy').value;

if (regpassword != regpasswordcopy){
	alert("Please check your Password!");
}
else {
	document.getElementById('formtodb').action="db.php";
	document.getElementById('formtodb').method="POST";
	document.getElementById('formtodb').submit();
}

}

</script>
                   
<?php include_once('func.php'); ?> 
<?php// echo 'sdgfdgfd';?>
<?php include_once('head.php'); ?>
	<div class="row">
	<!--  exclusive col-md is 12(3+6+3)  -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Login Admin</h3>
            </div>
            <div class="panel-body">
               <center> 
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="userID" class="col-sm-2 control-label">UserID </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="" name="userID" placeholder="UserID please" required/ >
                        </div>
	                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password please"required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="" name="email" placeholder="Email please" required/ >
                        </div>
	                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="login" class="btn btn-primary">Bestätigen</button>
								
                        </div>
                    </div>
                </form>
				</center>
                
            </div>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>	
	
	
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 	
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

         </div>

			<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo home_url(); ?>">HOME</a></li>
						<!-- <li><a href="<?php echo home_url('register.php'); ?>">CREATE ACCOUNT</a></li> -->
					</ul>
			</div><!--/.nav-collapse --> 
	  </div>	
	</nav> 
	 <!-- /.container -->
 </div><!-- /.container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		 <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo SITE_URL;?>includes/bootstrap/js/bootstrap-rtl.min.js "></script>
  </body>
</html>


<?php 
error_reporting(0);
$userID = $_POST['userID'];
$password = $_POST['password'];
$email = $_POST['email'];
if($userID == "" || $password=="" || $email=="" )
	die();
$password =sha1($password);

// $check = mysqli_query($db, "SELECT * FROM users_2 WHERE userID='$userID' AND user_password='$password' ");
// $check_email = mysqli_query($db, "SELECT * FROM users_2 WHERE userID='admin'AND user_password='d033e22ae348aeb5660fc2140aec35850c4da997' ");

$postRequest = array(
    'userID' => ($userID),   
	'password' => ($password) ,
    'email' => ($email)
);

//Gibt eine Zeichenkette zurück, die die JSON-Darstellung des übergebenen value beinhaltet
$postRequest = json_encode($postRequest);

$cURLConnection = curl_init('http://127.0.0.1:7800/service/adminlogin');//curl beginn
//Curl option
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);//transfer mit Post to URL from IBM
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//true is success  
// curl exection
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);//curl ende
$result = json_decode($apiResponse);

// error
$resulterror= $result->error;
//print_r($resulterror);
get_error($resulterror);


$check="$result->username";
$eror="$result->error";


		//if( mysqli_num_rows($check) > 0 )   
		if($eror!= 1)
		{
			if($check == "isnotequell"){
				echo "<script>alert('Der Benutzername oder das Passwort ist falsch.')</script>";
				die();
            }
            else
            {
                
                $token = base64_encode(time()."$%$$$".$check."$=$321237132sfdcwqe");  //// $=$321    $=$%$$$   /// du kannst einfach # stellen 	
                //redirect definiert in func.php
                redirect('http://localhost/dashboard/news/admin.php?param='.$token);

                //  echo "<script>window.location.href='http://localhost/dashboard/news/admin.php'</script>"; //
            }
           
        }

		
?>
			

				



























 

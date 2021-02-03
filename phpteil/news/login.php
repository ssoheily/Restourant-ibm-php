<?php include_once('func.php'); ?> 
<?php include_once('head.php'); ?>
	<div class="row">
	<!--  exclusive col-md is 12(3+6+3)  -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
               <center> 
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="userID" class="col-sm-2 control-label">BenutzerID </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="" name="userID" placeholder="BenutzerID Bitte" required/ >
                        </div>
	                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Bitte"required/>
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
						<li><a href="<?php echo home_url('register.php'); ?>">CREATE ACCOUNT</a></li>
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

if($userID == "" || $password=="")
	die();
$password =sha1($password);

// $check = mysqli_query($db, "SELECT * FROM users_2 WHERE userID='$userID' AND user_password='$password' ");
// $check_email = mysqli_query($db, "SELECT * FROM users_2 WHERE userID='admin'AND user_password='d033e22ae348aeb5660fc2140aec35850c4da997' ");

$postRequest = array(
    'userID' => ($userID),   
	'password' => ($password)

);

//Gibt eine Zeichenkette zurück, die die JSON-Darstellung des übergebenen value beinhaltet
$postRequest = json_encode($postRequest);

$cURLConnection = curl_init('http://127.0.0.1:7800/service/login');//curl beginn
//Curl option
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);//transfer mit Post to URL from IBM
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//true is success  
// curl exection
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);//curl ende

$result = json_decode($apiResponse);

 //print_r($result);
$resulterror= $result->error;
 //print_r($resulterror);
 get_error($resulterror);

    

$check="$result->username";

		if($check == "isnotequell"){
			echo "<script>alert('Der Benutzername oder das Passwort ist falsch.')</script>";
			die();
		}
		$token = base64_encode(time()."$%$$$".$check."$=$321237132sfdcwqe");  //// $=$321    $=$%$$$   /// du kannst einfach # stellen 	
			header('Location:http://localhost/dashboard/news/index.php?param='.$token);
		//}
		
		
		
		
	$t = date("H");
	
	if ($t < "20") {
	echo "Have a good day!";
	} else {
	echo "Have a good night!";
	}
	
					
		
			

				






























 
///  error messeage///
/* 
$messages = array();
  function add_message($message = null, $type = 'error') {
		if(!$message) {
			return;
		}
		
		global $messages;
		$messages[] = array(
			'message' => $message,
			'type' => $type,
		);
	}
	
	function show_messages() {
		global $messages;
		if(empty($messages)) {
			return;
		}
    
    foreach($messages as $item) {
        $message = $item['message'];
        $type = $item['type'];
        if($type == 'error') {
            $type = 'danger';
        }
        ?>
        <div class="alert alert-<?php echo $type; ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $message; ?>
        </div>
        <?php
    }
}
 */

				
/*

//call function from 'logout.php' and in modules.php
	function process_inputs() {
		// wann only click 'submit'  without user and pass
		if(!isset($_POST['login'])) {
			return;
		}
		
		if(isset($_POST['userID'])) {
			$userID = $_POST['userID'];
		}

		if(empty($userID)) {
			add_message('Der Benutzername darf nicht leer sein.', 'error');
			return;
		}
		
		if(isset($_POST['password'])) {
			$password = $_POST['password'];
		}
		
		if(empty($password)) {
			add_message('Das Passwort darf nicht leer sein.', 'error');
			return;
		}
		
		user_login($userID, $password);
		
		if(!is_user_loggen_in()) {
			add_message('Der Benutzername oder das Passwort ist falsch.', 'error');
		} else {
			redirect_to(home_url());
		}
		
		$messages = array();
  function add_message($message = null, $type = 'error') {
		if(!$message) {
			return;
		}
		
		global $messages;
		$messages[] = array(
			'message' => $message,
			'type' => $type,
		);
	}
		
		
    
}
*/
	?>

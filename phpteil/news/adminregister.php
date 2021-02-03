<?php include_once('func.php');?>
<?php include_once('head.php'); ?>
<div class="row">
	<!--  exclusive col-md is 12(3+6+3)  -->
    <div class="col-md-3"></div>
      <div class="col-md-6">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >Please Register neue Admin</h3>
            </div>
          <div  style= background-color:moccasin;>
            <div class="panel-body">
             <center> 
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="userID" class="col-sm-2 control-label">name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="" name="userID" placeholder="BenutzerID Bitte" required/ >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">email: </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="" name="email" placeholder="BenutzerID Bitte" required/ >
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
      </div>
        <div class="col-md-3"></div>
    </div>	
 <!-- <h1>Register Admin</h1>
 <form action="" method="post">
  <label for="name">name:</label><br>
  <input type="text"  name="name" require/><br>
  <label for="email">email:</label><br>
  <input type="email"  name="email" require/><br>
  <label for="password">password:</label><br>
  <input type="password"  name="password" require/><br><br>
  <input type="submit" value="Submit">
</form>  -->
<?php 
data_check($_POST['userID']);
data_check($_POST['email']);
data_check($_POST['password']);	

//check full or blank 	
function data_check($data)
{
	if (isset($data) && $data != "")
		return true;
}
$name = $_POST['userID'];
$email =$_POST['email'];
$password = $_POST['password'];
$password =sha1($password);

$postRequest = array(
    'name' => ($name),   
	'email' => ($email),
	'password' => ($password)
);
//Gibt eine Zeichenkette zurück, die die JSON-Darstellung des übergebenen value beinhaltet
$postRequest = json_encode($postRequest);

$cURLConnection = curl_init('http://127.0.0.1:7800/service/adminregister');//curl beginn
//Curl option
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);//transfer mit Post to URL from IBM
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//true is success  
// curl exection
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);//curl ende
$result = json_decode($apiResponse);
$register=$result;
// error
$resulterror= $result->error;
get_error($resulterror);


if($register){
	//echo 'done';
  echo "<script>alert('Succsess.')</script>";
  echo  '<center><img src="images.jpg" alt="successful!!!!!"></center>';
 /*  ?><center><input type="button" onClick="history.back(-2)" value="◄ Go Back"></center><?php */
}else{
	//echo 'error';
}

 ?> 
<?php include_once('footer.php'); ?> 

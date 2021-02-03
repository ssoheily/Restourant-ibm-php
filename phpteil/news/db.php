<?php include_once('func.php'); ?> 
<?php include_once('head.php'); ?>
<?php 
//error_reporting(0); 
$username =  $_POST["username"];
$email = $_POST['email'];
$password = $_POST['password'];
$password_conf = $_POST['password-conf'];
 
if($password != $password_conf)
{

	?><script>alert('Der Benutzername oder das Passwort ist falsch.'); location="http://localhost/dashboard/news/register.php"; </script><?php

}	
else
{
	$password = sha1($password);
	
	$postRequest = array(
    'username' => ($username),   //intval:Konvertiert einen Wert nach integer
	'email' => ($email),
	'password' => ($password),
	'password_conf' => ($password_conf)

);
//Gibt eine Zeichenkette zurück, die die JSON-Darstellung des übergebenen value beinhaltet
$postRequest = json_encode($postRequest);

$cURLConnection = curl_init('http://127.0.0.1:7800/service/registration');//curl beginn

//Curl option
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);//transfer mit Post to URL from IBM
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//true is success  

// curl exection
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);//curl ende

// $apiResponse - available data from the API request
// Konvertiert eine JSON-kodierte Zeichenkette in eine PHP-Variable.
$result = json_decode($apiResponse);

// error
$resulterror= $result->error;
get_error($resulterror);



$register=$result;
if($register){
	//echo 'done';
	header('Location:http://localhost/dashboard/news/login.php?param=');
}else{
	//echo 'error';
}
} 
 


?>

<?php include_once('footer.php'); ?> 

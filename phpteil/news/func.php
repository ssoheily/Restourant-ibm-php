<?php

if(!isset($_SESSION["userID"]))
{
	$_SESSION["userID"] = 'guest';
	
	//echo "<center>Hi  ".$_GET["param"]."</center>";
}
else
{
	$check_login="1";
	//echo "<center>Hi ".$_GET["param"]."</center>";
	//echo "Hi guest!!";
}

function get_name_user()
		{
			
			return $_SESSION["userID"];
		}

//	session_start();
	define('SITE_URL','http://localhost/dashboard/news/');
	define('SITE_PATH',__DIR__ . DIRECTORY_SEPARATOR);
	define('APP_TITLE','ERSTE PROGRAMM');
/* 
	function get_error($e)
	{
		if($e== 1)
		{
			header('Location:http://localhost/dashboard/news/fetch.php');
			die();
		}
	}
 */
	function get_error($e)
	{
		if($e== 1)
		{
		//	IF EROR65-- 
		//	IF 
			header('Location:http://localhost/dashboard/news/error.php');
			die();
		}
	}
	
	function get_title()
		{
			return 'Home' ;
		}
		
	function home_url($path = null){
		if(!$path || $path == '/'){
			return SITE_URL;
		}
		return SITE_URL . $path;
		
	}	
	
	 $current_user_id = null;
	function is_user_loggen_in($loginparam) {
		if($loginparam=="1")
			return true;
			else {
				global $current_user_id;
				if($current_user_id) {
					return true;
				}
				return false;
		}
	}

	$current_user = "";
	function get_current_user_data() {
    global $current_user;
    return $current_user;
    }
   
	
	
	function redirect($url)
	{
		if (!headers_sent()){
			header("Location: $url");
		}else{
			
			echo "<script type='text/javascript'>window.location.href='$url'</script>";
			echo "<noscript><meta http-equiv='refresh' content='0;url=$url'/></noscript>";
		}
		exit;
	}
	





	
    /* function is_email_valid() {    
        $email = get_input('email');

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            die('The provided email address is not vaid.');
        }

        echo "<p>Entered e-mail address: $email</p>";
    }	  */
?>

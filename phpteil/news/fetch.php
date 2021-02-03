
 <?php include_once('func.php'); ?> 
 <?php include_once('head.php'); ?> 
<?php 

data_check($_POST['product_id']);
data_check($_POST['table_id']);
data_check($_POST['namebediener']);	
data_check($_POST['kunde_name']);	
//check full or blank 	
function data_check($data)
{
	if (isset($data) && $data != "")
		return true;
}
$product_id = $_POST['product_id'];
$table_id = $_POST['table_id'];
$namebediener = $_POST['namebediener'];
$kunde_name = $_POST['kunde_name'];
$Feedback = $_POST['Feedback'];
// $timestamp = time()+date("Z");

$postRequest = array(
    'product_id' => ($product_id),   //intval:Konvertiert einen Wert nach integer
	'table_id' => intval($table_id),
	'namebediener' => ($namebediener),
	'Feedback' => intval($Feedback),
	'kunde_name' => $kunde_name
	
);
//Gibt eine Zeichenkette zurück, die die JSON-Darstellung des übergebenen value beinhaltet
$postRequest = json_encode($postRequest);

$cURLConnection = curl_init('http://127.0.0.1:7800/service/restaurant');//curl beginn
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


	//$urltocheck="&beschreibung=".$result->beschreibung."&leer_table=".$result->leer_table."&status=".$result->status."&kunde_name=".$result-> kunde_name."&product_id=".$result-> product_id."&amount=".$result->amount."&namebediener=".$result->namebediener;
	/* echo '<br>';
	var_dump($urltocheck);
	echo '<br>'; */
		echo"<span style='color:#080; font-weight:bold;'>$result->beschreibung</span>";	
		echo"<span style='color:#080; font-weight:bold;'>$result->leer_table</span>";
		echo "<table>"; 
		echo "<tr><td>table_id number:</td><td>".$result->table_id."</td><td>is ".$result->status." </td></tr>"; 
		echo "<tr><td>Dear Mrs. / Mr. : </td><td>".$result->kunde_name."</td><td>" ; 
		echo "<tr><td>Order ID: </td><td>".$result->product_id."</td></tr>"; 
		echo "<tr><td>Price: </td><td>".$result->price."</td></tr>"; 
		echo "<tr><td>name operator: </td><td>".$result->namebediener."</td></tr>"; 
		
		
		
		echo "</table>"; 

		
//} */
//$result = xml_parse($apiResponse);

/* if(isset($result))
{
	//$urltocheck="?beschreibung=".$result->beschreibung."&product_id=".$result->product_id."&namebediener=".$result->namebediener."&table_id=".$result->table_id;
	$urltocheck="?product_id=".$result->product_id."&namebediener=".$result->namebediener."&table_id=".$result->table_id."&kilid=".$result-> kunde_name;
	
	header('Location: http://localhost/dashboard/news/result.php'.$urltocheck);
}
 */

?>
<?php include_once('footer.php'); ?> 

	

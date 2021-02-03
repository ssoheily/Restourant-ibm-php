
 <?php include_once('func.php'); ?> 
 <?php include_once('head.php'); ?> 
<?php 

$cURLConnection = curl_init('http://127.0.0.1:7800/service/resterror');//curl beginn
//Curl option
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, "0");//transfer mit Post to URL from IBM
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//true is success  
// curl exection
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);//curl ende

// $apiResponse - available data from the API request
// Konvertiert eine JSON-kodierte Zeichenkette in eine PHP-Variable.
$result = json_decode($apiResponse);


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

	

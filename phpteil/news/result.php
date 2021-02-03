
<!-- diese seite wurde nicht benutzt in projrct -->
<?php 


$result = json_decode($apiResponse);
//header('Location:http://localhost/dashboard/news/index.php');
//$urltocheck="?beschreibung=".$result->beschreibung."&product_id=".$result->product_id."&namebediener=".$result->namebediener."&table_id=".$result->table_id;
$urltocheck="?product_id=".$result->username."&namebediener=".$result->password;
var_dump($urltocheck);




?>


<p>welcome to result site:   </p>
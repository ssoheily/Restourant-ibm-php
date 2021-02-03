<?php include_once('func.php'); ?> 
<?php include_once('head.php'); ?> 
 <h1>hallo admin</h1>
 
 <a href="http://localhost/dashboard/news/adminregister.php">Click me to Register Admin</a>
 
 <head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
  width:160px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>


<table>
<caption>all customer</caption>
<tr style="color:lightgreen;">
  <th>BESTELL_ID</th>
  <th>PRODUCT_ID</th>
  <th>PRISE</th>  
  <th>NAME_RESTURANT</th> 
  <th>TABLE_ID</th> 
  <th>ZEIT</th> 
</tr>
</table>

 <?php
//connect.php file code start


///////////////////////////////////////////////////////////////// connection method for Oracle throw IBM

$cURLConnection = curl_init('http://127.0.0.1:7800/service/admin');//curl beginn
//Curl option
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, "0");//transfer mit Post to URL from IBM
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//true is success  
// curl exection
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);//curl ende
$row = json_decode($apiResponse);

// error
$resulterror= $row->error;
get_error($resulterror);

//print_r($row);

//echo $row[0].[PRODUCT_ID];
//echo $row[0];
//print_r($row);
foreach($row as $roww) {
  //$counter="0";
 // print_r($roww);
 echo "
  
 <table>
 <tr>";
      foreach($roww as $qq) {
        echo "<th>".$qq."</th>";
//echo $qq."/n";
        }
        echo "
  
        </table>
        </tr>";

 // print_r($roww);
  //print_r($roww[0][PRODUCT_ID]);
  //print($roww.['0'][PRODUCT_ID]);
////////////////////////////////////////////////////////////////////////////////////////////////////

}
?>
</body>

 <?php include_once('footer.php'); ?> 


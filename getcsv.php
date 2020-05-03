<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
require_once "nastr.php";
$tables=array();
$tables[]="order.csv";
$tables[]="sales.csv";
$tables[]="production.csv";
$tables[]="sostav.csv";
$tables[]="money.csv";
$rez=array();
foreach($tables as $table)
{
    $rez[$table]=array();
    $fp = fopen($table, 'r');
    $rus_key = fgetcsv($fp,"1024",$razd);
    $key = fgetcsv($fp,"1024",$razd);
    $json = array();
    while($row = fgetcsv($fp,"1024",$razd))
    {
        $json[] = array_combine($key, $row);
    }
    fclose($fp);
    $rez[$table]["rus"]=$rus_key;
    $rez[$table]["z"]=$key;
    $rez[$table]["t"]=$json;
}
echo json_encode($rez);
?>
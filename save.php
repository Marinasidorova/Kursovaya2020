<?php
require_once "nastr.php";
$table = file_get_contents($_GET["table"]);
$table=explode("\n",$table);
$rez="";
foreach($table as $stroka)
{
    if(strlen($stroka)>0)
    {
        $stroka2=trim($stroka);
        $m=explode($razd,$stroka2);
        if($m[0]=="id")
        {
            $rez.=$stroka2."\n";
        }
        else if($m[0]!=$_GET["id"])
        {
            $rez.=$stroka2."\n";
		}
		else
		{
			$rez.=$_GET["stroka"]."\n";
		}
    }
}
file_put_contents($_GET["table"],$rez);
?>
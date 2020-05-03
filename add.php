<?php
require_once "nastr.php";
$table = file_get_contents($_GET["table"]);
$table=explode("\n",$table);
$gm=explode($razd,trim($_GET["stroka"]));
$new_id=0;
foreach($table as $stroka)
{
    if(strlen($stroka)>0)
    {
        $stroka2=trim($stroka);
        $m=explode($razd,$stroka2);
        if($m[0]!="id")
        {
            if(intval($m[0])>$new_id)
            {
                $new_id=intval($m[0]);
            }
        }
    }
}
file_put_contents($_GET["table"],$ns.($new_id+1).$razd.$_GET["stroka"]."\n",FILE_APPEND);
?>
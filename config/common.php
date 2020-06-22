<?php
function dbinsert($table,$type) {
$dbin=mysql_query("INSERT INTO `$table` $type");
return $dbin;
}


function dbquery($table,$type) {
$dbq=mysql_query("SELECT * FROM `$table` $type");
while($rdb=mysql_fetch_array($dbq)){
$rdbq[]=$rdb;
}
return $rdbq;
}

function dbquerysun($table,$type) {
$dbqsun=mysql_query("SELECT count(id) FROM `$table` $type");
$rdbsun=mysql_fetch_array($dbqsun);
return $rdbsun;
}

function dbdel($table,$type) {
$dbdel=mysql_query("delete FROM `$table` where $type");
return $rdel;
}

function queryall($table,$type) {
$sql=mysql_query("SELECT * FROM `$table` $type");
$row=mysql_fetch_array($sql);
return $row;
}

function upalldt($table,$type) {
$dbup=mysql_query("UPDATE `$table` SET $type");
return $dbup;
}

//控制调用字数
function cutstr($str,$cutleng)
{
$str = $str; 
$cutleng = $cutleng;
$strleng = strlen($str); 
if($cutleng>$strleng)return $str;
$notchinanum = 0;
for($i=0;$i<$cutleng;$i++)
{
if(ord(substr($str,$i,1))<=128)
{
$notchinanum++;
}
}
if(($cutleng%2==1)&&($notchinanum%2==0))
{
$cutleng++;
}
if(($cutleng%2==0)&&($notchinanum%2==1)) 
{
$cutleng++;
}
return substr($str,0,$cutleng);
}

//截取使用
function GetBetween($content,$start,$end){
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
//ip获取
function getIP() 
{ 
if (isset($_SERVER)) { 
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
$realip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) { 
$realip = $_SERVER['HTTP_CLIENT_IP']; 
} else { 
$realip = $_SERVER['REMOTE_ADDR']; 
} 
} else { 
if (getenv("HTTP_X_FORWARDED_FOR")) { 
$realip = getenv( "HTTP_X_FORWARDED_FOR"); 
} elseif (getenv("HTTP_CLIENT_IP")) { 
$realip = getenv("HTTP_CLIENT_IP"); 
} else { 
$realip = getenv("REMOTE_ADDR"); 
} 
} 
return $realip; 
}
//创建文件
function writefile($fname,$str){

    $fp=fopen($fname,"w");

    fputs($fp,$str);

    fclose($fp);

}
function inject_check($sql_str) { 
   $check=eregi('select|insert|update|delete|script|iframe|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);     // 进行过滤 
   if($check){ 
       echo "输入非法注入内容！"; 
       exit(); 
   }else{ 
       return $sql_str; 
   } 

} 
function msglayer($str,$num) {
$dbin="<script>parent.layer.msg('$str',{shade: 0.3,shift:$num});</script>";
return $dbin;
}
function msglayerurl($str,$num,$url) {
$dbin="<script>parent.layer.msg('$str',{shade: 0.3,shift:$num});setTimeout(function(){top.location.href='$url'},3000);</script>";
return $dbin;
}

?>
<?php
error_reporting(0); 
include("config/common.php");
include("config/conn.php");

$type="where id='1'";
$zhifu=queryall(ubozf,$type);
//关闭网站
if($zhifu[wz]=="1"){
echo "404";
exit;
}

$pid=$_GET[pid];
$uid=$_GET[uid];
if($pid){
$tgurl="?pid=".$pid."&uid=".$uid;
}else{
$tgurl="";
}
//写渠道
$type = "order by id DESC limit 0,1";
$user=queryall(uboip,$type);
$userid=$user[userid];
if ($userid==null){
$userid="1000";
}else{
$userid=$user[userid]+1;
}
$user=$_COOKIE[userid];
if($user){
$tzurl="i.php".$tgurl;
header("location:$tzurl");
exit;
}else{
setcookie("userid", $userid,time()+999999999);
$type="(`id`, `userid`, `ms`, `cs`) VALUES (null,'$userid','普通会员','5')"; 
dbinsert(uboip,$type);
}

//写渠道
//统计参数写入 降PID UID的值写入
if($pid){
$sql = "SELECT pid FROM ubojl WHERE pid='$pid' and  uid='$uid' ";
$query = mysql_query($sql);
$rows=mysql_fetch_array($query);
$type="WHERE pid='$pid' and  uid='$uid'  ";
$ubojl=queryall(ubojl,$type);
$cs=$ubojl[cs]+1;
if ($rows) {
mysql_query("UPDATE  ubojl set cs='$cs' where pid='$pid' and uid='$uid'"); 
}else {
mysql_query("insert into ubojl set pid='$pid',uid='$uid',cs='1'"); 
}
}
//读取标题列表
$type="order by rand() limit 1";
$name=queryall(biaoti,$type);
//随机标题
if($zhifu[wzname]=="0"){
$tzname=$name[name];
}else{
$tzname="激情影院";
}
//形成转向链接
$link="i.php".$tgurl;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>加载中-<?php echo $tzname?></title>
<style>.btn{background-color:green;width:280px;text-align:center;height:40px;line-height:40px;border:0;border-radius:3px;text-decoration:none;color:#fff;font-size:23px}</style>
</head>
<body>
<a class="btn" style="text-align:center;margin:0 auto;display:block;font-weight:bolder;position:absolute;bottom:150px;left:0;right:0;margin:auto" href="<?php echo $link?>">激情影院</a>
<meta http-equiv="refresh" content="3; url=<?php echo $link?>" />
 </body>
</html>

<?php
error_reporting(0); 

if($_COOKIE[adminname]==null){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
//批量导入域名
if($_POST[urlok]){
$tmp = $_FILES['url']['tmp_name'];
if (empty ($tmp)) {
echo msglayer("请选择要导入的文件！",8);
}
$ar = array_map('trim', file($tmp));
foreach($ar as $row) {
$type="where url='$row'";
$url=queryall(url,$type);
if($url[url]==$row){
}else{
$type="(`id`, `url`) VALUES (null,'$row')"; 
dbinsert(url,$type);
echo msglayerurl("导入完成",4,"pl.php");
}
}
}
//批量导入标题
if($_POST[nameok]){
$tmp = $_FILES['name']['tmp_name'];
if (empty ($tmp)) {
echo msglayer("请选择要导入的文件！",8);
}
$ar = array_map('trim', file($tmp));
foreach($ar as $row) {
$type="where name='$row'";
$biaoti=queryall(biaoti,$type);
if($biaoti[name]==$row){
}else{
$type="(`id`, `name`) VALUES (null,'$row')"; 
dbinsert(biaoti,$type);
echo msglayerurl("导入完成",4,"pl.php");
}
}
}
//手动添加域名
if($_POST[uok]){
$url=$_POST[url];
$type="where url='$url'";
$u=queryall(url,$type);
if($url==null){
echo msglayer("域名不能为空",8);
}elseif($u){
echo msglayer("域名已存在",8);
}else{
$type="(`id`, `url`) VALUES (null,'$url')"; 
dbinsert(url,$type);
echo msglayerurl("添加成功",4,"pl.php");
}
}
//手动添加标题
if($_POST[nok]){
$name=$_POST[name];
$type="where name='$name'";
$u=queryall(biaoti,$type);
if($name==null){
echo msglayer("标题不能为空",8);
}elseif($u){
echo msglayer("标题已存在",8);
}else{
$type="(`id`, `name`) VALUES (null,'$name')"; 
dbinsert(biaoti,$type);
echo msglayerurl("添加成功",4,"pl.php");
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>导入数据</title>
<link href="images/admin2.css" rel="stylesheet" type="text/css">
<script src="images/common.js" type="text/javascript"></script>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/diy.js"></SCRIPT>
</head>
<body>
<?php include_once('header.php'); ?> 
<?php include_once('left.php'); ?> 
<div class="main_right">
<div class="yui">
<div class="content">
<div id="divMain">
<div class="divHeader">批量导入域名</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form  action="" method="post" enctype="multipart/form-data" target="msgubotj" >
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width:100px;"><p align="left"><b>选择TXT文件</b></p></td>
<td><p><input type="file" name="url" style="width:300px;">   提示：txt格式化为一行一个 不能含有空白行 不能含有http://</p></td>
</tr>
</tbody>
</table>
<p>
<input type="submit" class="button" value="导入" name="urlok"  >

</p>
</form>
</div></div>
<div class="divHeader">批量导入标题</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form action="" method="post" target="msgubotj" enctype="multipart/form-data" >
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width:100px;"><p align="left"><b>选择TXT文件</b></p></td>
<td><p><input type="file" name="name" style="width:300px;">  提示：txt格式化为一行一个 不能含有空白行</p></td>
</tr>
</tbody>
</table>
<p>
<input type="submit" class="button" value="导入"  name="nameok" >

</p>
</form>
</div></div>
<div class="divHeader">手动添加标题</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form action="" method="post" target="msgubotj" >
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width:100px;"><p align="left"><b>标题</b></p></td>
<td><p><input type="text" name="name" style="width:300px;"></p></td>
</tr>
</tbody>
</table>
<p>
<input type="submit" class="button" value="添加"  name="nok" >
</p>
</form>
</div></div>
<div class="divHeader">手动添加域名</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form action="" method="post" target="msgubotj" enctype="multipart/form-data" >
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width:100px;"><p align="left"><b>域名</b></p></td>
<td><p><input type="text" name="url" style="width:300px;">  提示：不能含有http://</p></td>
</tr>
</tbody>
</table>
<p>
<input type="submit" class="button" value="添加"  name="uok" >
</p>
</form>
</div></div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
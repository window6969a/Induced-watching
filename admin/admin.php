<?php
error_reporting(0); 
if($_COOKIE[adminname]==null){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
$type="WHERE id='1'";
$duqu=queryall(uboadmin,$type);
if($_POST[edit]){
if($_POST[username]==null){
echo msglayer("帐号不能为空！",3);
}elseif($_POST[password]==null){
echo msglayer("密码不能为空！",3);
}else{
$newpass=md5($_POST[password]);
$type="name='$_POST[username]',pass='$newpass'   where id='1'";
upalldt(uboadmin,$type);
echo msglayerurl("修改成功",4,"admin.php");
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>管理员</title>
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
<div class="divHeader">修改帐号密码</div>
<br>
<form action="" method="post" target="msgubotj">
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tr>
<td width="15%" scope="col"><p>帐号：</p></td>
<td width="85%" scope="col">
<input class="text-input big-input" type="text" name="username" value="<?php echo $duqu[name]?>"/>
</td>
</tr>
<tr>
<td width="15%" scope="col"><p>密码：</p></td>
<td width="85%" scope="col">
<input class="text-input big-input" type="text" name="password" value=""/>
</td>
</tr>
</table>
<p>
<input type="submit" class="button" value="修改"  name="edit">
</p>
</form>
<br>
</div>
</div>
</div>
</div>
</body>
</html>
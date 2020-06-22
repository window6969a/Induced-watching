<?php
error_reporting(0); 

if($_COOKIE[adminname]==null){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
$type="where id='$_GET[id]'";
$xg=queryall(ubouser,$type);
$page=$_GET["page"];
if($_POST[edit]){
if($_POST[pass]==null){
echo msglayer("密码不能为空！",3);
}else{
$newpass=md5($_POST[pass]);
$type="pass='$newpass',tel='$_POST[tel]',qq='$_POST[qq]',alipayname='$_POST[alipayname]',alipay='$_POST[alipay]',fencheng='$_POST[fencheng]',kl='$_POST[kl]',kl2='$_POST[kl]'  where id='$_POST[id]'";
upalldt(ubouser,$type);
if ($page){
echo msglayerurl("修改成功",8,"user.php?page=$page");
}else{
echo msglayerurl("修改成功",8,"user.php");
}
}}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>修改渠道信息</title>
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
<div class="divHeader">修改信息</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form action="" method="post" target="msgubotj"><input type="hidden" name="id" value="<?php echo $xg[id]?>">	
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><p align="left"><b>密码</b></p></td>
<td><p><input name="pass" type="password"  class="text-input big-input"   value=""> </p></td>
</tr>
<tr>
<td><p align="left"><b>QQ</b></p></td>
<td><p><input name="qq" type="text"  class="text-input big-input"  value="<?php echo $xg[qq]?>" ></p></td>
</tr>
<tr>
<td><p align="left"><b>电话</b><br></p></td>
<td><p><input name="tel" type="text"  class="text-input big-input"  value="<?php echo $xg[tel]?>" ></p></td>
</tr>
<tr>
<td><p align="left"><b>收款人</b><br>
</p></td>
<td><p><input name="alipayname" type="text"  class="text-input big-input" value="<?php echo $xg[alipayname]?>"  > </p></td>
</tr>
<tr>
<td><p align="left"><b>收款帐号</b><br>
</p></td>
<td><p><input name="alipay" type="text"  class="text-input big-input" value="<?php echo $xg[alipay]?>"  > </p></td>
</tr>
<tr>
<td><p align="left"><b>分成比例</b><br>
</p></td>
<td><p>
<select name="fencheng"  class="inpMain"  >
<option value='<?php echo $xg[fencheng]?>'><?php echo $xg[fencheng]?> % </option>
<?php 
for($i=0;$i<101;$i++){
echo "<option value='$i'>$i % </option>";
}
?>
</select>
</p></td>
</tr>

<tr>
<td><p align="left"><b>扣量比例</b><br>
</p></td>
<td><p>
<select name="kl"  class="inpMain"  >
<?php if($xg[kl]==0){?>
<option value='0'>0 不扣量</option>
<?php }else{?>
<option value='<?php echo $xg[kl]?>'><?php echo $xg[kl]?>  笔 扣一笔 </option>
<?php }?>
<?php 
for($i=0;$i<21;$i++){
if($i==0){
echo "<option value='$i'>$i 不扣量 </option>";
}else{
echo "<option value='$i'>$i 笔 扣一笔 </option>";
}

}
?>
</select>
</p></td>
</tr>
</tbody>
</table>
<p>
<br><input type="submit" class="button" value="提交"  name= "edit"   >
</p>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
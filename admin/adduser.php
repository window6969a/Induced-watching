<?php
error_reporting(0); 
if($_COOKIE[adminname]==null){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
if($_POST[add]){
if($_POST[user]==null){
echo msglayer("�ʺŲ���Ϊ�գ�",3);
}elseif($_POST[pass]==null){
echo msglayer("���벻��Ϊ�գ�",3);
}else{
$dt=date("Y-m-d");
$newpass=md5($_POST[pass]);
$type = "order by id DESC limit 0,1";
$user=queryall(ubouser,$type);
$userid=$user[userid];
if ($userid==null){
$userid="50000";
}else{
$userid=$user[userid]+1;
}
$type="(`id`, `user`, `pass`, `qq`, `tel`,`alipayname`, `alipay`,`userid`,`fencheng`,`kl`,`kl2`) VALUES (null,'$_POST[user]','$newpass','$_POST[qq]','$_POST[tel]','$_POST[alipayname]','$_POST[alipay]','$userid','$_POST[fencheng]','$_POST[kl]','$_POST[kl]')"; 
dbinsert(ubouser,$type);
echo msglayerurl("��ӳɹ�������ҳ��",5,"user.php");
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>�������</title>
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
<div class="divHeader">�������</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form action="" method="post" target="msgubotj"><input type="hidden" name="sid" value="<?php echo $suid?>">	
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="100"><p align="left"><b>�û���</b></p></td>
<td><p><input name="user"  class="text-input big-input" type="text"   value=""></p></td>
</tr>
<tr>
<td><p align="left"><b>����</b></p></td>
<td><p><input name="pass" type="password"   class="text-input big-input"  value=""> </p></td>
</tr>
<tr>
<td><p align="left"><b>QQ</b></p></td>
<td><p><input name="qq" type="text"  class="text-input big-input"  value="" ></p></td>
</tr>
<tr>
<td><p align="left"><b>�绰</b><br></p></td>
<td><p><input name="tel" type="text"  value="" class="text-input big-input"  ></p></td>
</tr>
<tr>
<td><p align="left"><b>�տ���</b><br>
</p></td>
<td><p><input name="alipayname" type="text"  class="text-input big-input" value=""  > </p></td>
</tr>
<tr>
<td><p align="left"><b>�տ��ʺ�</b><br>
</p></td>
<td><p><input name="alipay" type="text"  class="text-input big-input" value=""  > </p></td>
</tr>

<tr>
<td><p align="left"><b>�ֳɱ���</b><br>
</p></td>
<td><p>
<select name="fencheng"  class="inpMain"  >
<?php 
for($i=0;$i<101;$i++){
echo "<option value='$i'>$i % </option>";
}
?>
</select>
</p></td>
</tr>
<tr>
<td><p align="left"><b>��������</b><br>
</p></td>
<td><p>
<select name="kl"  class="inpMain"  >
<?php 
for($i=0;$i<21;$i++){
if($i==0){
echo "<option value='$i'>$i ������ </option>";
}else{
echo "<option value='$i'>$i �� ��һ�� </option>";
}

}
?>
</select>
</p></td>
</tr>


</tbody>
</table>
<p>
<br><input type="submit" class="button" value="�ύ"  name= "add"   >
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
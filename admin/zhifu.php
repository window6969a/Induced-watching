<?php
error_reporting(0); 
if($_COOKIE[adminname]==null){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
$type="WHERE id='1'";
$zhifu=queryall(ubozf,$type);
if($_POST[ok]){
$type="money1='$_POST[money1]',money2='$_POST[money2]',money3='$_POST[money3]',wz='$_POST[wz]',wzurl='$_POST[wzurl]',wzname='$_POST[wzname]',play='$_POST[play]',kl='$_POST[kl]',uboid='$_POST[uboid]',ubokey='$_POST[ubokey]',ubowg='$_POST[ubowg]'        where id='1'";
upalldt(ubozf,$type);
echo msglayerurl("���óɹ�",4,"zhifu.php");
}
if($_POST[btn]){
if($_POST[ubo]=="0"){
$type="ccc='ok'  where id='1'";
upalldt(ubobq,$type);
echo msglayerurl("������Ȩ",8,"zhifu.php");
}else{
echo msglayerurl("�빴ѡʹ��Э��",8,"zhifu.php");
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>�����޸�</title>
<link href="images/admin2.css" rel="stylesheet" type="text/css">
<script src="images/common.js" type="text/javascript"></script>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/diy.js"></SCRIPT>
<style type="text/css" media="screen">
.none{display: none;}
.ubo{}
.ubo2{}
</style>
</head>
<body>
<?php include_once('header.php'); ?> 
<?php include_once('left.php'); ?> 
<div class="main_right">
<div class="yui">
<div class="content">
<div id="divMain">
<div class="divHeader">�����޸�</div>
<div id="divMain2">
<div class="tab-content" style="border: none; padding: 0px; margin: 0px; display: block;" id="tab3">
<form action="" method="post" target="msgubotj" >
<table width="100%" style="padding:0px;margin:0px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width:80px;"><p align="left"><b>�̻�ID:</b></p></td>
<td>
<input name="uboid" value="<?php echo $zhifu[uboid]?>" style="width:340px;">
</td>
</tr>
<tr>
<td style="width:80px;"><p align="left"><b>�̻���Կ:</b></p></td>
<td>
<input name="ubokey" value="<?php echo $zhifu[ubokey]?>" style="width:340px;">
</td>
</tr>
<tr>
<td style="width:80px;"><p align="left"><b>���ص�ַ:</b></p></td>
<td>
<input name="ubowg" value="<?php echo $zhifu[ubowg]?>" style="width:340px;">
</td>
</tr>


<tr>
<td style="width:80px;"><p align="left"><b>�۸�����:</b></p></td>
<td>
�ƽ�۸�:<input name="money1" value="<?php echo $zhifu[money1]?>" style="width:40px;text-align: center;">
��ʯ�۸�:<input name="money2" value="<?php echo $zhifu[money2]?>" style="width:40px;text-align: center;">
���ü۸�:<input name="money3" value="<?php echo $zhifu[money3]?>" style="width:40px;text-align: center;">
</td>
</tr>
<tr>
<td style="width:80px;"><p align="left"><b>��վ����:</b></p></td>
<td>
<?php if($zhifu[wz]=="0"){?>
<input type="radio" name="wz"  value="0" checked="true" >����</label>
<input type="radio" name="wz"  value="1" >�ر�</label>
<?php }elseif($zhifu[wz]=="1"){ ?>
<input type="radio" name="wz"  value="0" >����</label>
<input type="radio" name="wz"  value="1" checked="true" >�ر�</label>
<?php }?>
</td>
</tr>

<tr>
<td style="width:80px;"><p align="left"><b>�������:</b></p></td>
<td>
<?php if($zhifu[wzurl]=="0"){?>
<input type="radio" name="wzurl"  value="0" checked="true" >����</label>
<input type="radio" name="wzurl"  value="1" >�ر�</label>
<?php }elseif($zhifu[wzurl]=="1"){ ?>
<input type="radio" name="wzurl"  value="0" >����</label>
<input type="radio" name="wzurl"  value="1" checked="true" >�ر�</label>
<?php }?>
</td>
</tr>
<tr>
<td style="width:80px;"><p align="left"><b>�������:</b></p></td>
<td>
<?php if($zhifu[wzname]=="0"){?>
<input type="radio" name="wzname"  value="0" checked="true" >����</label>
<input type="radio" name="wzname"  value="1" >�ر�</label>
<?php }elseif($zhifu[wzname]=="1"){ ?>
<input type="radio" name="wzname"  value="0" >����</label>
<input type="radio" name="wzname"  value="1" checked="true" >�ر�</label>
<?php }?>
</td>
</tr>
<tr>
<td style="width:80px;"><p align="left"><b>������ʾ:</b></p></td>
<td>
<?php if($zhifu[play]=="0"){?>
<input type="radio" name="play"  value="0" checked="true" >����</label>
<input type="radio" name="play"  value="1" >�ر�</label>
<?php }elseif($zhifu[play]=="1"){ ?>
<input type="radio" name="play"  value="0" >����</label>
<input type="radio" name="play"  value="1" checked="true" >�ر�</label>
<?php }?>
</td>
</tr>
<tr>
<td style="width:80px;"><p align="left"><b>��������:</b></p></td>
<td>
<?php if($zhifu[kl]=="0"){?>
<input type="radio" name="kl"  value="0" checked="true" >����</label>
<input type="radio" name="kl"  value="1" >�ر�</label>
<?php }elseif($zhifu[kl]=="1"){ ?>
<input type="radio" name="kl"  value="0" >����</label>
<input type="radio" name="kl"  value="1" checked="true" >�ر�</label>
<?php }?>
</td>
</tr>
</tbody>
</table>
<p><input type="submit" class="button" value="�ύ"  name="ok" ></p>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html><?php
?>
<?php
error_reporting(0); 

if($_COOKIE[adminname]==null){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
$userid=$_GET["userid"];
$del=$_GET[action];
$delid=$_GET[delid];
if($del=="del"){
$type="id='$delid'";
dbdel(ubouser,$type);
$page=$_GET["page"];
if ($page){
echo msglayerurl("ɾ���ɹ�",8,"user.php?page=$page");
}else{
echo msglayerurl("ɾ���ɹ�",8,"user.php");
}
}
$zuori=date("Y-m-d",strtotime("-1 day"));
$day=date("Y-m-d");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>��������</title>
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
<div class="divHeader">��������</div><div class="SubMenu"></div><div id="divMain2">
<form class="search" method="get" action="">
<p>�����û�ID:
<input id="userid" name="userid" style="width:150px;" type="text" value="">
<input type="submit" class="button" value="�ύ">
<input type="button" class="button" value="�������" onClick="location.href='adduser.php'">
</p>
</form>
<table width=100% border="1" cellspacing="0" cellpadding="0" class="tableBorder tableBorder-thcenter">
<tbody>
<tr>
<tr>
<th>�ƹ�ID</th>
<th>�û���</th>
<th>��ϵ�ֻ�</th>
<th>��ϵQQ</th>
<th>�տ���</th>
<th>�տ��ʺ�</th>
<th>�ֳɱ��� %</th>
<th>��������</th>
<th>��������</th>
<th>������</th>
<th>�鿴����</th>
<th>��������</th>
<th>����</th>
</tr>
<?php 
$Page_size=18; 
$sql = "WHERE 1=1";
if($userid){
$sql .=" and userid like '%$userid%' ";
}
$result = mysql_query("select id from ubouser   ".$sql."  ");
$count = mysql_num_rows($result); 
if($count == 0){
echo '<tr><td colspan=14 align="center">��ѯ��������</td></tr>';
}
$page_count = ceil($count/$Page_size); 
$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 
//�жϵ�ǰҳ�� 
if(empty($_GET['page'])||$_GET['page']<0){ 
$page=1; 
}else { 
$page=$_GET['page']; 
} 
$offset=$Page_size*($page-1); 
$query = mysql_query("select * from  ubouser   ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 	
<tr>
<td align="center"><?php echo $a[userid]?></td>
<td align="center"><?php echo $a[user]?></td>
<td align="center"> <?php echo $a[tel]?></td>
<td align="center"><?php echo $a[qq]?></td>
<td align="center"><?php echo $a[alipayname]?></td>
<td align="center"><?php echo $a[alipay]?></td>
<td align="center"><?php echo $a[fencheng]?> %</td>
<td align="center"><?php $userid=$a[userid];$sql="select sum(pidmoney) from ubotj where  pid='$userid' and shijian like '%".$day."%' ";if ($res=mysql_query($sql)){
list($money1)=mysql_fetch_row($res);mysql_free_result($res);
} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?></td>
<td align="center"><?php $userid=$a[userid];$sql="select sum(pidmoney) from ubotj where  pid='$userid' and shijian like '%".$zuori."%' ";if ($res=mysql_query($sql)){
list($money1)=mysql_fetch_row($res);mysql_free_result($res);
} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?></td>
<td align="center"><?php $userid=$a[userid];$sql="select sum(pidmoney) from ubotj where  pid='$userid' ";if ($res=mysql_query($sql)){
list($money1)=mysql_fetch_row($res);mysql_free_result($res);
} 
if($money1 == null){ ?>��0Ԫ<?php }else{  ?>��<?php $xs1=round($money1,2);echo $xs1;?> Ԫ<?php }
?></td>
<td align="center"><a href="uid.php?id=<?php echo $a[userid]?>" >�鿴</a></td>
<td align="center"><?php if($a[kl]==0){?><?php }else{?>ÿ  <font color="ff0000"> <?php echo $a[kl]?> </font> �� �۳� <font color="ff0000"> 1 </font>��<?php }?></td>

<td align="center"><a href="useredit.php?id=<?php echo $a[id]?>&page=<?php echo $page?>" class="button"><img src="images/page_edit.png" width="16"></a>&nbsp;<a onClick="return window.confirm(&quot;������ȷ����������������ȡ����ֹͣ��&quot;);" href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>" class="button"target="msgubotj"><img src="images/delete.png"  width="16"></a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a> "; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
if($userid){
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid\">��ҳ</a> "; //��ҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid\">��һҳ</a>"; //��һҳ 
}else {
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">��ҳ</a> "; //��ҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">��һҳ</a>"; //��һҳ 
}
}else { 
$key.="<a> ��ҳ</a> "; //��ҳ 
$key.="<a >��һҳ</a>"; //��һҳ  
} 
if($pages>$page_len){ 
//�����ǰҳС�ڵ�����ƫ�� 
if($page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//�����ǰҳ������ƫ�� 
//�����ǰҳ����ƫ�Ƴ�������ҳ�� 
if($page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//����ƫ�ƶ�����ʱ�ļ��� 
$init = $page-$pageoffset; 
$max_p = $page+$pageoffset; 
} 
} 
} 
for($i=$init;$i<=$max_p;$i++){ 
if($i==$page){ 
$key.=' <a  class="number current">'.$i.'</a>'; 
} else { 
if($userid){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$userid\">".$i."</a>"; 
} else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
}
} 
} 
if($page!=$pages){ 
if($userid){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid\">��һҳ</a> ";//��һҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid\">���һҳ</a>"; //���һҳ 
}else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">��һҳ</a> ";//��һҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">���һҳ</a>"; //���һҳ 
}
}else { 
$key.=" <a >��һҳ</a> ";//��һҳ 
$key.="<a>���һҳ</a>"; //���һҳ 
} 
?> 
<tr><td colspan=15><?php if($count ==0){?><?php }else{?><?php echo $key?><?php }?></td></tr>
</tbody>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

<?php
error_reporting(0); 

if($_COOKIE[adminname]==null){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
$del=$_GET[action];
$delid=$_GET[delid];
if($del=="del"){
$type="id='$delid'";
dbdel(biaoti,$type);
$page=$_GET["page"];
if ($page){
echo msglayerurl("ɾ���ɹ�",8,"name.php?page=$page");
}else{
echo msglayerurl("ɾ���ɹ�",8,"name.php");
}
}
$tzurl=$_SERVER["QUERY_STRING"];
if($_POST[bjcz]){
$array =$_POST["del_id"]; 
if(!empty($array)){
$del_sun=count($array); 
for($i=0;$i<$del_sun;$i++){
$sql='select * from  biaoti  where id='.$array[$i];
$rs=mysql_query($sql);
$row=mysql_fetch_array($rs);
if(!empty($row['file'])){
if(unlink($row['file'])==false){
echo '';
exit;
}
}
if ($_POST["del_id"]==null){
echo msglayer("��ѡ����Ҫɾ��������",8);
}else{
mysql_query('Delete from biaoti where id='.$array[$i]); 
echo msglayerurl("ɾ���ɹ�",8,"name.php?$tzurl");
}
}
}else{ 
echo msglayer("��ѡ����Ҫɾ��������",8);
}}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>��������б�</title>
<link href="images/admin2.css" rel="stylesheet" type="text/css">
<script src="images/common.js" type="text/javascript"></script>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/diy.js"></SCRIPT>
<script type="text/javascript">
function All(e, itemName){
var aa = document.getElementsByName(itemName);
for (var i=0; i<aa.length; i++)
aa[i].checked = e.checked; 
}
function checkdel(delid,formname){
var flag = false;
for(i=0;i<delid.length;i++){
if(delid[i].checked == true){
flag = true;
break;
}
}
if(!flag){
return true;
}else{
formname.submit();
}
}
</script>
</head>
<body>
<?php include_once('header.php'); ?> 
<?php include_once('left.php'); ?> 
<div class="main_right">
<div class="yui">
<div class="content">
<div id="divMain">
<div class="divHeader">��������б�</div><div class="SubMenu"></div><div id="divMain2">
<form action="" method="post" target="msgubotj" >
<table width=100% border="1" cellspacing="0" cellpadding="0" class="tableBorder tableBorder-thcenter">
<tbody>
<tr>
<tr>
<th style="width: 42px;">ѡ��</th>
<th>ID</th>
<th>��������</th>
<th>����</th>
</tr>
<?php 
$Page_size=18; 
$sql = "WHERE 1=1";
$result = mysql_query("select id from biaoti ".$sql."  ");
$count = mysql_num_rows($result); 
if($count == 0){
echo '<tr><td colspan=14 align="center">û������</td></tr>';
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
$query = mysql_query("select * from  biaoti   ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 	

<tr>
<td align="center"><input type="checkbox" title="<?php echo $a['id']; ?>" name="del_id[]" value="<?php echo $a['id']; ?>" id="del_id" /></td>
<td align="center"><?php echo $a[id]?></td>
<td align="center"><?php echo $a[name]?></td>
<td align="center"><a onClick="return window.confirm(&quot;������ȷ����������������ȡ����ֹͣ��&quot;);" href="?action=del&delid=<?php echo $a[id]?>&page=<?php echo $page?>" class="button"target="msgubotj"><img src="images/delete.png"  width="16"></a></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ����� 
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ���� 
$key.="<a class='number' >��ǰ�� $page ҳ/�� $pages ҳ</a> "; //�ڼ�ҳ,����ҳ 
if($page!=1){ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">��ҳ</a> "; //��ҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">��һҳ</a>"; //��һҳ 
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
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
} 
} 
if($page!=$pages){ 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">��һҳ</a> ";//��һҳ 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">���һҳ</a>"; //���һҳ 
}else { 
$key.=" <a >��һҳ</a> ";//��һҳ 
$key.="<a>���һҳ</a>"; //���һҳ 
} 
?> 
<tr><td colspan=15 >&nbsp;&nbsp;   <input type="checkbox" name="mmAll" onClick="All(this, 'del_id[]')" style="position:relative;clip: rect(6 15 15 6)"><input name="bjcz"  type="submit" value="����ɾ��"  onclick="javascript:if(checkdel(del_id,'check')){return true;}else{return false;};"  target="msgubotj"/><?php if($count ==0){?><?php }else{?><?php echo $key?><?php }?></td></tr>
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
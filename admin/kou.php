<?php
error_reporting(0); 

if($_COOKIE[adminname]==null){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
include("../config/conn.php");
include("../config/common.php");
$userid=$_GET["userid"];
$btime=$_GET["btime"];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Content-Language" content="zh-CN">
<title>扣量列表</title>
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
<div class="divHeader">扣量列表</div><div class="SubMenu"></div><div id="divMain2">
<form class="search" method="get" action="">
<p>
渠道ID：<input id="userid" name="userid" style="width:150px;" type="text" value="<?php if($userid==null){ }else{ echo $userid;}?>" > 
时间：<input style="width:80px;" name="btime" id="btime" value="<?php if($btime==null){ echo date('Y-m-d',strtotime("-1 day"));}else{ echo $btime;}?>">
<input type="submit" class="button" value="提交">
</p></form>
<SCRIPT language=javascript src="../app/laydate/laydate.js" charset="gb2312"></SCRIPT>
<script>
!function(){
laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
laydate({elem: '#btime'});//绑定元素
}();
</script>
<table width=100% border="1" cellspacing="0" cellpadding="0" class="tableBorder tableBorder-thcenter">
 <tbody>
<tr class="color1">
<th>数据编号</th>
<th>渠道ID</th>
<th>渠道UID</th>
<th>付款金额</th>
<th>商户订单号</th>
<th>商品名称</th>
<th>付款日期</th>
<th>订单状态</th>
</tr>
<?php 
$Page_size=18; 
$sql = "WHERE 1=1";
if($userid){
$sql .=" and   pid='$userid' ";
}else{
if($btime){
$sql .="   and shijian='$btime'";
}
}
$result = mysql_query("select id from kldd   ".$sql."  ");
$count = mysql_num_rows($result); 
if($count == 0){
echo '<tr><td colspan=14 align="center">查询不到数据</td></tr>';
}
$page_count = ceil($count/$Page_size); 
$init=1; 
$page_len=7; 
$max_p=$page_count; 
$pages=$page_count; 
//判断当前页码 
if(empty($_GET['page'])||$_GET['page']<0){ 
$page=1; 
}else { 
$page=$_GET['page']; 
} 
$offset=$Page_size*($page-1); 
$query = mysql_query("select * from kldd ".$sql." order by id desc   limit $offset, $Page_size");
while ($a=mysql_fetch_array($query)) { 
?> 

<tr>
<td align="center"><?php echo $a[id]?></td>
<td align="center"><?php echo $a[pid]?></td>
<td align="center"><?php echo $a[uid]?></td>
<td align="center"><?php echo $a[money]?></td>
<td align="center"><?php echo $a[ddh]?></td>
<td align="center"><?php echo $a[des]?></td>
<td align="center"><?php echo $a[shijian]?></td>
<td align="center"><?php if($a[ddzt]=='SUCCESS'){ ?>支付成功<?php }else{?>支付失败<?php }?></td>
</tr>
<?php 
} 
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
$key='<tr><td colspan=12><div class="pagination">'; 
$key.="<a class='number' >当前第 $page 页/共 $pages 页</a> "; //第几页,共几页 
if($page!=1){ 
if($userid){
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid&btime=$btime&etime=$etime\">首页</a> "; //首页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid&btime=$btime&etime=$etime\">上一页</a>"; //上一页 
}elseif($btime){
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&userid=$userid&btime=$btime&etime=$etime\">首页</a> "; //首页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&userid=$userid&btime=$btime&etime=$etime\">上一页</a>"; //上一页 
}else {
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页</a> "; //首页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">上一页</a>"; //上一页 

}
}else { 
$key.="<a> 首页</a> "; //首页 
$key.="<a >上一页</a>"; //上一页  
} 
if($pages>$page_len){ 
//如果当前页小于等于左偏移 
if($page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//如果当前页大于左偏移 
//如果当前页码右偏移超出最大分页数 
if($page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//左右偏移都存在时的计算 
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
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$userid&btime=$btime&etime=$etime\">".$i."</a>"; 
} elseif($btime){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&userid=$userid&btime=$btime&etime=$etime\">".$i."</a>"; 
} else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>"; 
}
} 
} 
if($page!=$pages){ 
if($userid){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid&btime=$btime&etime=$etime\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid&btime=$btime&etime=$etime\">最后一页</a>"; //最后一页 
}elseif($btime){
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&userid=$userid&btime=$btime&etime=$etime\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&userid=$userid&btime=$btime&etime=$etime\">最后一页</a>"; //最后一页 
}else { 
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">下一页</a> ";//下一页 
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">最后一页</a>"; //最后一页 
}
}else { 
$key.=" <a >下一页</a> ";//下一页 
$key.="<a>最后一页</a>"; //最后一页 
} 
?> 
<tr><td colspan=15><?php if($count ==0){?><?php }else{?><?php echo $key?><?php }?></td></tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
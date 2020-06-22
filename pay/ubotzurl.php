<?php
error_reporting(0); 
include_once("config.php");
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
$kl=$zhifu[kl];
$uboid=$_POST["uboid"];//商户ID号
$ubozt=$_POST["ubozt"];//支付状态 1为成功
$ubodingdan=$_POST["ubodingdan"];//平台订单号
$ubobz=$_POST["ubobz"];//备注信息
$ubomoney=$_POST["ubomoney"];//支付金额
$ubosj=$_POST["ubosj"];//支付时间
$ubodes=$_POST["ubodes"];//商品描述
$ubosign=$_POST["ubosign"];//验证
$pid=$_POST["pid"];//推广渠道使用
$uid=$_POST["uid"];//推广渠道使用
date_default_timezone_set('PRC');
$shijian=date("Y-m-d H:i:s" ,time());
$ubosj=date("Y-m-d");
$preEncodeStr=$ubozt.$uboid.$ubodingdan.$ubomoney.$ubokey;
$newsign=md5($preEncodeStr);
//写自己的数据库
$type="where ddh='$ubodingdan'";
$row=queryall(dingdan,$type);
if($newsign==$ubosign){
if($ubozt=="1") { 
echo "success";//支付成功
if (strpos($ubobz, '-') !== false) {
$p = explode('-',$ubobz); 
$userid=$p[0];
$jb=$p[1];
}
$type="where userid='$userid'";
$user=queryall(uboip,$type);
if($user){
if($jb=="vip"){
$type="ms='VIP会员'  where userid='$userid'";
upalldt(uboip,$type);
}elseif($jb=="hjvip"){
$type="ms='黄金会员'  where userid='$userid'";
upalldt(uboip,$type);
}elseif($jb=="zuanvip"){
$type="ms='钻石会员'  where userid='$userid'";
upalldt(uboip,$type);
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($kl=="0"){
$type="where userid='$pid'";
$klks=queryall(ubouser,$type);
$ns=$klks[kl2];
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($klks){
$cs=$klks[kl]-1;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($cs=="1"){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($ubomoney< 9 && $ubomoney>0){
if(!$row){
$type="(`id`, `ddh`, `ddzt`, `money`, `des`, `pid`,`uid`,`shijian`) VALUES (null,'$ubodingdan','SUCCESS','$ubomoney','$ubodes','$pid','$uid','$shijian')"; 
dbinsert(dingdan,$type);
////////////////////////////////////////////////////////////////////////////////////////////////////////
$type="where userid='$pid'";
$pidsj=queryall(ubouser,$type);
if ($pidsj){
$pidmoney=($ubomoney*$pidsj[fencheng])/100;
$type="where userid='$uid'";
$uidpd=queryall(ubouid,$type);
if ($uidpd){
$uidmoney=($pidmoney*$uidpd[fc])/100;
}else{
$uidmoney="0";
}
$sql = "SELECT shijian FROM ubotj WHERE pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$query = mysql_query($sql);
$rows=mysql_fetch_array($query);
$type="WHERE  pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$duqu=queryall(ubotj,$type);
$pidmoney2=$duqu[pidmoney]+$pidmoney;
$uidmoney2=$duqu[uidmoney]+$uidmoney;
////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($rows) {
mysql_query("UPDATE  ubotj set pidmoney='$pidmoney2',uidmoney='$uidmoney2' where shijian='$ubosj' and pid='$pid' and uid='$uid' "); 
}else {
mysql_query("insert into ubotj set pid='$pid',shijian='$ubosj',pidmoney='$pidmoney',uidmoney='$uidmoney',uid='$uid'"); 
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
}

}else{
$type="(`id`, `ddh`, `ddzt`, `money`, `des`, `pid`,`uid`,`shijian`) VALUES (null,'$ubodingdan','SUCCESS','$ubomoney','$ubodes','$pid','$uid','$shijian')"; 
dbinsert(kldd,$type);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$type="kl='$ns' where userid='$pid'";
upalldt(ubouser,$type);

}else{
$type="kl='$cs' where userid='$pid'";
upalldt(ubouser,$type);
if(!$row){
$type="(`id`, `ddh`, `ddzt`, `money`, `des`, `pid`,`uid`,`shijian`) VALUES (null,'$ubodingdan','SUCCESS','$ubomoney','$ubodes','$pid','$uid','$shijian')"; 
dbinsert(dingdan,$type);
////////////////////////////////////////////////////////////////////////////////////////////////////////
$type="where userid='$pid'";
$pidsj=queryall(ubouser,$type);
if ($pidsj){
$pidmoney=($ubomoney*$pidsj[fencheng])/100;
$type="where userid='$uid'";
$uidpd=queryall(ubouid,$type);
if ($uidpd){
$uidmoney=($pidmoney*$uidpd[fc])/100;
}else{
$uidmoney="0";
}
$sql = "SELECT shijian FROM ubotj WHERE pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$query = mysql_query($sql);
$rows=mysql_fetch_array($query);
$type="WHERE  pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$duqu=queryall(ubotj,$type);
$pidmoney2=$duqu[pidmoney]+$pidmoney;
$uidmoney2=$duqu[uidmoney]+$uidmoney;
////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($rows) {
mysql_query("UPDATE  ubotj set pidmoney='$pidmoney2',uidmoney='$uidmoney2' where shijian='$ubosj' and pid='$pid' and uid='$uid' "); 
}else {
mysql_query("insert into ubotj set pid='$pid',shijian='$ubosj',pidmoney='$pidmoney',uidmoney='$uidmoney',uid='$uid'"); 
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}else{
if(!$row){
$type="(`id`, `ddh`, `ddzt`, `money`, `des`, `pid`,`uid`,`shijian`) VALUES (null,'$ubodingdan','SUCCESS','$ubomoney','$ubodes','$pid','$uid','$shijian')"; 
dbinsert(dingdan,$type);
////////////////////////////////////////////////////////////////////////////////////////////////////////
$type="where userid='$pid'";
$pidsj=queryall(ubouser,$type);
if ($pidsj){
$pidmoney=($ubomoney*$pidsj[fencheng])/100;
$type="where userid='$uid'";
$uidpd=queryall(ubouid,$type);
if ($uidpd){
$uidmoney=($pidmoney*$uidpd[fc])/100;
}else{
$uidmoney="0";
}
$sql = "SELECT shijian FROM ubotj WHERE pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$query = mysql_query($sql);
$rows=mysql_fetch_array($query);
$type="WHERE  pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$duqu=queryall(ubotj,$type);
$pidmoney2=$duqu[pidmoney]+$pidmoney;
$uidmoney2=$duqu[uidmoney]+$uidmoney;
////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($rows) {
mysql_query("UPDATE  ubotj set pidmoney='$pidmoney2',uidmoney='$uidmoney2' where shijian='$ubosj' and pid='$pid' and uid='$uid' "); 
}else {
mysql_query("insert into ubotj set pid='$pid',shijian='$ubosj',pidmoney='$pidmoney',uidmoney='$uidmoney',uid='$uid'"); 
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else{
if(!$row){
$type="(`id`, `ddh`, `ddzt`, `money`, `des`, `pid`,`uid`,`shijian`) VALUES (null,'$ubodingdan','SUCCESS','$ubomoney','$ubodes','$pid','$uid','$shijian')"; 
dbinsert(dingdan,$type);
////////////////////////////////////////////////////////////////////////////////////////////////////////
$type="where userid='$pid'";
$pidsj=queryall(ubouser,$type);
if ($pidsj){
$pidmoney=($ubomoney*$pidsj[fencheng])/100;
$type="where userid='$uid'";
$uidpd=queryall(ubouid,$type);
if ($uidpd){
$uidmoney=($pidmoney*$uidpd[fc])/100;
}else{
$uidmoney="0";
}
$sql = "SELECT shijian FROM ubotj WHERE pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$query = mysql_query($sql);
$rows=mysql_fetch_array($query);
$type="WHERE  pid='$pid' and  uid='$uid' and  shijian='$ubosj'";
$duqu=queryall(ubotj,$type);
$pidmoney2=$duqu[pidmoney]+$pidmoney;
$uidmoney2=$duqu[uidmoney]+$uidmoney;
////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($rows) {
mysql_query("UPDATE  ubotj set pidmoney='$pidmoney2',uidmoney='$uidmoney2' where shijian='$ubosj' and pid='$pid' and uid='$uid' "); 
}else {
mysql_query("insert into ubotj set pid='$pid',shijian='$ubosj',pidmoney='$pidmoney',uidmoney='$uidmoney',uid='$uid'"); 
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else{
echo "订单失败";//支付失败
}
}else{ 
echo "签名错误";//验证失败
}
?>
<?php
error_reporting(0); 
include_once("config.php");
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
$kl=$zhifu[kl];
$uboid=$_POST["uboid"];//�̻�ID��
$ubozt=$_POST["ubozt"];//֧��״̬ 1Ϊ�ɹ�
$ubodingdan=$_POST["ubodingdan"];//ƽ̨������
$ubobz=$_POST["ubobz"];//��ע��Ϣ
$ubomoney=$_POST["ubomoney"];//֧�����
$ubosj=$_POST["ubosj"];//֧��ʱ��
$ubodes=$_POST["ubodes"];//��Ʒ����
$ubosign=$_POST["ubosign"];//��֤
$pid=$_POST["pid"];//�ƹ�����ʹ��
$uid=$_POST["uid"];//�ƹ�����ʹ��
date_default_timezone_set('PRC');
$shijian=date("Y-m-d H:i:s" ,time());
$ubosj=date("Y-m-d");
$preEncodeStr=$ubozt.$uboid.$ubodingdan.$ubomoney.$ubokey;
$newsign=md5($preEncodeStr);
//д�Լ������ݿ�
$type="where ddh='$ubodingdan'";
$row=queryall(dingdan,$type);
if($newsign==$ubosign){
if($ubozt=="1") { 
echo "success";//֧���ɹ�
if (strpos($ubobz, '-') !== false) {
$p = explode('-',$ubobz); 
$userid=$p[0];
$jb=$p[1];
}
$type="where userid='$userid'";
$user=queryall(uboip,$type);
if($user){
if($jb=="vip"){
$type="ms='VIP��Ա'  where userid='$userid'";
upalldt(uboip,$type);
}elseif($jb=="hjvip"){
$type="ms='�ƽ��Ա'  where userid='$userid'";
upalldt(uboip,$type);
}elseif($jb=="zuanvip"){
$type="ms='��ʯ��Ա'  where userid='$userid'";
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
echo "����ʧ��";//֧��ʧ��
}
}else{ 
echo "ǩ������";//��֤ʧ��
}
?>
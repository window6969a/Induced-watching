<?php
error_reporting(0); 
header('Access-Control-Allow-Origin:*');
include_once("config.php");
$ubodingdan=date("YmdHis");//订单号
$ubomoney=$_GET["ubomoney"];//提交的支付金额
$ubopid=$_GET["ubopid"];//提交的渠道ID
$ubouid=$_GET["ubouid"];//提交的渠道UID
$ubotzurl=$ubotzurl;//通知信息
$ubobackurl=$ubobackurl;//跳转地址
$ubobz=$_GET["ubobz"];
$ubodes=$_GET["ubodes"];
$ubo=$_GET["uboms"];
$pay="3";
$bz=$ubobz."-".$ubo;
if($ubopid==null){$ubopid=$uboid;}
if($ubouid==null){$ubouid=$uboid;}
//加密字符串
$ubostr=$uboid.$ubodingdan.$ubomoney.$ubotzurl.$ubokey;
$ubosign = md5($ubostr);//签名数据 32位小写的组合加密验证串
//提交参数
$post= array(
'uboid' =>$uboid,
'ubodingdan' =>$ubodingdan,
'ubopid' =>$ubopid,
'ubouid' =>$ubouid,
'ubodes' =>$ubodes,
'ubobz' =>$ubobz,
'ubomoney' =>$ubomoney,
'ubotzurl' =>$ubotzurl,
'ubobackurl' =>$ubobackurl,
'ubosign' =>$ubosign,
'pay' =>$pay
);
$postch = curl_init();
curl_setopt($postch, CURLOPT_POST, 1);
curl_setopt($postch, CURLOPT_URL,$url);
curl_setopt($postch, CURLOPT_POSTFIELDS, $post);
ob_start();
curl_exec($postch);
$con = ob_get_contents() ;
ob_end_clean();
$paysj=json_decode($con, true); 
$tzurl=$paysj[payUrl];
if($tzurl==null){
$img="../pay/zhifu.jpg";
}else{
$img=$tzurl;
}
echo json_encode(array('img'=>$img,'ddh'=>$ubodingdan));
?>
<?php
error_reporting(0); 
header('Access-Control-Allow-Origin:*');
include_once("config.php");
$ubodingdan=date("YmdHis");//������
$ubomoney=$_GET["ubomoney"];//�ύ��֧�����
$ubopid=$_GET["ubopid"];//�ύ������ID
$ubouid=$_GET["ubouid"];//�ύ������UID
$ubotzurl=$ubotzurl;//֪ͨ��Ϣ
$ubobackurl=$ubobackurl;//��ת��ַ
$ubobz=$_GET["ubobz"];
$ubodes=$_GET["ubodes"];
$ubo=$_GET["uboms"];
$pay="3";
$bz=$ubobz."-".$ubo;
if($ubopid==null){$ubopid=$uboid;}
if($ubouid==null){$ubouid=$uboid;}
//�����ַ���
$ubostr=$uboid.$ubodingdan.$ubomoney.$ubotzurl.$ubokey;
$ubosign = md5($ubostr);//ǩ������ 32λСд����ϼ�����֤��
//�ύ����
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
<?php 
if($_COOKIE[adminname]==null){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$uploaddir = "../img/";//�����ļ�����Ŀ¼ ע�����/ 
$type=array("jpg","gif","bmp","jpeg","png");//���������ϴ��ļ������� 
$patch="admin/";//��������·�� 
$p=$_POST[id];
//��ȡ�ļ���׺������ 
function fileext($filename) { 
return substr(strrchr($filename, '.'), 1); 
} 
function random($length) { 
$hash = 'www.wcopay.com-qq1661255431-'; 
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; 
$max = strlen($chars) - 1; 
mt_srand((double)microtime() * 1000000); 
for($i = 0; $i < $length; $i++) { 
$hash .= $chars[mt_rand(0, $max)]; 
} 
return $hash; 
} 
$a=strtolower(fileext($_FILES['file']['name'])); 
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)) { 
$text=implode(",",$type); 
}else{ 
$filename=explode(".",$_FILES['file']['name']); 
do 
{ 
$filename[0]=random(100); //������������� 
$name=implode(".",$filename); 
$uploadfile2=$uploaddir.$name; 
$uploadfile="img/".$name; 
} 
while(file_exists($uploadfile2)); 
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile2)) { 
if(is_uploaded_file($_FILES['file']['tmp_name'])) { 
echo "�ϴ�ʧ��!"; 
} else {
} 
} 
}
?> 
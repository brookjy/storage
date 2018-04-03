<?php
//该文件名为 sendemailPHPMail.php
/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/Exception.php';
require 'php/PHPMailer.php';
require 'php/SMTP.php'; */
include_once "class.phpmailer.php"; 
include_once "class.smtp.php"; 
include_once "../model/common.php";


$today = date('Y-m-d', strtotime('today'));
$this_monday = date('Y-m-d', strtotime('monday this week'));
$next_monday = date('Y-m-d', strtotime('monday next week'));
$flight_query = "SELECT COUNT(*) FROM flight_service where DATE(time) > CURDATE()";
$flight = query($flight_query);
$housekeeping_query = "SELECT COUNT(*) FROM housekeeping_service where DATE(time) > DATE(CURDATE())";
$housekeeping = query($housekeeping_query);
$medical_query = "SELECT COUNT(*) FROM medical_service where DATE(time) > DATE(CURDATE())";
$medical = query($medical_query);
$pickup_query = "SELECT COUNT(*) FROM pickup_service where DATE(date) > DATE(CURDATE())";
$pickup = query($pickup_query);
// 这周1至下周1前
$purchase_query = "SELECT COUNT(*) FROM purchase_service where DATE(date) >= SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-1) and DATE(date) < SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-8)";
$purchase = query($purchase_query);
$repair_query = "SELECT COUNT(*) FROM repair_service where finish = 0";
$repair = query($repair_query);

//include_once "Exception.php";
//获取一个外部文件的内容 
$mail=new PHPMailer(); 
///
// $send_name=$_POST['name'];
// $send_address=$_POST['address'];
// $send_content=$_POST['content'];
//$send_theme=$_POST['theme'];
//$send_kind=$_POST['kind'];
// $mailcontent = "姓名昵称: ".$send_name."<br>电话邮箱: ".$send_phone."<br>用途: ".$send_theme."<br>风格: ".$send_kind."<br>内容: ".$_POST['content'];//邮件内容
$mailcontent = "需要处理的业务一共有".$flight."项接机送机，".$housekeeping."项月嫂，".$medical."项医疗接送，".$pickup."项接送服务，".$purchase."项采购服务，".$repair."项维修服务。查看详情请至 http://ser.leaderbb.com/admin/admin_access.php";//邮件内容

function query($count_query) {
    GLOBAL $mysqli;
    $result = $mysqli->query($count_query);
    $check_retrieve = $result->fetch_assoc();
    return $check_retrieve["COUNT(*)"];
}


///
//设置smtp参数 
$mail->IsSMTP(); 
$mail->SMTPAuth=true; 
$mail->SMTPKeepAlive=true;
$mail->CharSet = 'UTF-8'; 

// $mail->Host="ssl://smtp.aliyun.com"; 
// $mail->Port=465; 
// //填写你的email账号和密码 
// $mail->Username="svacation@aliyun.com"; 
// $mail->Password="m3745055";#注意这里要填写授权码就是我在上面网易邮箱开启SMTP中提到的，不能填邮箱登录的密码哦。 
// //设置发送方，最好不要伪造地址 
// $mail->From="svacation@aliyun.com"; 
// $mail->FromName="svacation@aliyun.com"; 


$mail->Host = 'smtp.qq.com';
// 设置使用ssl加密方式登录鉴权
$mail->SMTPSecure = 'ssl';
$mail->Port=465; 
//填写你的email账号和密码 
$mail->Username="479428597@qq.com"; 
$mail->Password="oqyehpracqutbich";#注意这里要填写授权码就是我在上面网易邮箱开启SMTP中提到的，不能填邮箱登录的密码哦。 
//设置发送方，最好不要伪造地址 
$mail->From="479428597@qq.com"; 
$mail->FromName="svacation"; 


// $mail->Host="ssl://smtp-mail.outlook.com"; 
// $mail->Port=465; 
// //填写你的email账号和密码 
// $mail->Username="nigelhan1@hotmail.com"; 
// $mail->Password="m3745055";#注意这里要填写授权码就是我在上面网易邮箱开启SMTP中提到的，不能填邮箱登录的密码哦。 
// //设置发送方，最好不要伪造地址 
// $mail->From="nigelhan1@hotmail.com"; 
// $mail->FromName="nigelhan1@hotmail.com";//发送者用户名 


$mail->Subject="需要处理的邮件";//邮件标题 
$mail->AltBody=$mailcontent; //邮件内容
$mail->WordWrap=50; // set word wrap 
$mail->MsgHTML($mailcontent); 
//设置回复地址 
$mail->AddReplyTo("479428597@qq.com","svacation"); 
//设置邮件接收方的邮箱和姓名 
$mail->AddAddress("liurobben@gmail.com","Chunk");//接收者邮箱和用户名 
$mail->AddAddress("nigelhan1@hotmail.com","Chunk");//接收者邮箱和用户名 
//使用HTML格式发送邮件 
$mail->IsHTML(true); 
//通过Send方法发送邮件 
//根据发送结果做相应处理 
if(!$mail->Send()){ 
    //echo "Mailer Error:".$mail->ErrorInfo;
    echo "<meta charset=\"UTF-8\">";
    echo "<script language=\"JavaScript\">\r\n";
    echo " alert(\"对不起，邮件发送失败！！\");\r\n";
    echo " history.back();\r\n";
    echo "</script>";
    exit;
    exit(); 
    }else{ 
        echo "<meta charset=\"UTF-8\">";
        echo "<script language=\"JavaScript\">\r\n";
        echo " alert(\"发送成功！！\");\r\n";
        echo " history.back();\r\n";
        echo "</script>";
        exit; 
} ?>



<?php
    header('Content-type:text/html;charset=utf-8');
    $phonenum=$_POST["phonenumber"];
    $code=rand(100000,999999);
    $content="【snoweek学习过程】".$code;
    $ch = curl_init();
    $url = 'http://apis.baidu.com/kingtto_media/106sms/106sms?mobile='.$phonenum.'&content='.$content;
    $header = array(
        'apikey:27a3d37cb57bcd235e9253abcda3b66b',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    //print_r($res);
    if(strpos("$#".$res,"ok")){
        require "./functions/connect_mysql.php"; 
        require "./functions/code_function.php"; 
        insert_code($phonenum,$code);
        $message['send']='success';
        $json_message=json_encode($message);
        echo $json_message;
        //echo "发送成功";
    }else{
        $message['send']='fail';
        $json_message=json_encode($message);
       echo $json_message;
        //echo "发送失败";
    }
?>
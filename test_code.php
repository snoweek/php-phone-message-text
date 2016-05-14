<?php
    header('Content-type:text/html;charset=utf-8');
    require "./functions/connect_mysql.php"; 
    require "./functions/code_function.php";
    $phonenum=$_POST["phonenumber"];
    $code=$_POST["code"];
    $result=test_code($phonenum,$code);
    echo $result;
?>
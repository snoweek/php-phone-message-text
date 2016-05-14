<?php
    function insert_code($phonenumber,$submit_code){        
        $dbc=connect_mysql();           
        $q='insert into code(phonenum,code,send_time)values(?,?,NOW())';
        $stmt=mysqli_prepare($dbc,$q);
        mysqli_stmt_bind_param($stmt,'ss',$phonenum,$code);
        $phonenum=$phonenumber;
        $code=$submit_code;
        mysqli_stmt_execute($stmt);
    }
    function test_code($phonenumber,$submit_code){
        $dbc=connect_mysql();
        $q='select * from code where phonenum=? and code=?';
        $stmt=mysqli_prepare($dbc,$q);
        mysqli_stmt_bind_param($stmt,'ss',$phonenum,$code);
        $phonenum=$phonenumber;
        $code=$submit_code;
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);                          
        if(mysqli_stmt_affected_rows($stmt)==1){
            $message['test_code']='success';
            $json_message=json_encode($message);
            return $json_message;
        }else{
            $message['test_code']='fail';
            $json_message=json_encode($message);
            return $json_message;
        } 
        mysqli_stmt_close($stmt); 
        mysql_close($dbc);        
    }
?>
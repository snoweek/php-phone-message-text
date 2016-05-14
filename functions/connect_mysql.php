<?php
    function connect_mysql() {
        $dbc=@mysqli_connect('127.0.0.1', 'root','123456','phone_message_test') 
            or die('could not connect to mysql');
        mysqli_set_charset($dbc,'utf8');
        return $dbc; 
    }
?>
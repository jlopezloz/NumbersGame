<?php
#this is my code (JG Lopez)
function init_db(){
    $db = mysqli_connect('localhost','root','root');
    mysqli_select_db($db, 'acashop');
    return $db;
}

$db=init_db();

?>

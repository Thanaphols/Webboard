<?php 
session_start();
$GLOBALS['conn'] = '';

function connect() {
    $user = 'root';
    $pass = '';
    $database = 'webboard';
    $GLOBALS['conn']  = mysqli_connect('localhost',$user,$pass,$database);
    if(!$GLOBALS['conn']) {
        echo 'Connecting to Webboard Database Failed!!!';
    } else{
        mysqli_set_charset($GLOBALS['conn'], 'utf8');
    }
}
function countRow($table, $column,$value) {
    $sql = 'SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'" ';
    $result = mysqli_query($GLOBALS['conn'],$sql);
    return $result->num_rows;
}

function getData($sql) {
    $result =  mysqli_query($GLOBALS['conn'],$sql);
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function chklogin($loginURL){
    if(!isset($_SESSION['userName'])){
        echo '<meta http-equiv="refresh" content="0;url='.$loginURL.'"/>';
    }
    
}
?>
<?php 
$hostname="localhost";
$username="root";
$password="";
$dbname="chat_application";

$connect=mysqli_connect($hostname,$username,$password,$dbname);
if(!$connect){
    die(mysqli_error($connect));
}
function formatDate ($date){
    return date("g:i a",strtotime($date));
}
?>


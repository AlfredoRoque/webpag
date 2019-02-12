<?php $conn = new mysqli('localhost','root','','gdlwebcamp');

if ($conn->connect_error) {
    echo $error -> $conn->connect_error;
}
//acentos y demas
$conn->set_charset('utf8');

?>
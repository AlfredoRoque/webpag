<?php $conn = new mysqli('us-cdbr-east-04.cleardb.com','b9dbfe4b261282','1e43acdc','heroku_9e42f258aeb47d4');
if ($conn->connect_error) {
    echo $error -> $conn->connect_error;
}
//acentos y demas
$conn->set_charset('utf8');
// echo ":)";

?>
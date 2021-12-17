<?php
require __DIR__ .'/vendor/autoload.php';
ob_start(); // makes the php return its output only after finishing running
date_default_timezone_set("Asia/Beirut");
$_SESSION["samesite"] ="Lax";

function qResult($q) {
    $result = Array();
    foreach ($q as $doc) {
        array_push($result, $doc);
    }
    return $result;
}

try {
    $con = new MongoDB\Client(
        'mongodb+srv://horizon299fyp:IbNkuf0gnBDXYdPi@cluster0.82fqu.mongodb.net/horizon?retryWrites=true&w=majority'
    );
    $con = $con->horizon;
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    
}

?>
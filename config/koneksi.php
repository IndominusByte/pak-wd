<?php 
function conn() {
    $mysqli = new mysqli('localhost', 'root', '', 'uas');
    $mysqli->set_charset('utf8');
    return $mysqli;
}
?>

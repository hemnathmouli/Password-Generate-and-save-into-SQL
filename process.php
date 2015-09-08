<?php
if(isset($_GET['gen'])){
    include_once 'functions.php';
    $passgen = new passgen();
    echo $passgen->passgen();
 }
?>

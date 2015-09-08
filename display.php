<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['uname'])){
    $theclass = new passgen();
    $theclass->get();
}
?>
 <a href = "logout.php" style = "position:absolute; top: 10px; right:10px;">Logout</a>

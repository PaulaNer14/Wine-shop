<?php
if(session_status() !== 2) {
    session_start();
}
if(isset($_SESSION['login_user'])){
    session_unset();
    session_destroy();
}
// go back
header("Location: index.php");
?>
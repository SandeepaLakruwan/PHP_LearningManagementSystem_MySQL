<?php
// process sign out and redirected to sign in page
session_start(); 
session_destroy(); 

header("Location: SignIn.php");
exit; 
?>

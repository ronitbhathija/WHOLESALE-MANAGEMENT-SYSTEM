<?php
session_start();
unset($_SESSION["CID"]);
unset($_SESSION["login"]);
header("Location:login.html");
?>
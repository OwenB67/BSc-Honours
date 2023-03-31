<?php

//Destroy the session to log the user out
session_start();
session_destroy();
header("Location: Login.php");
?>
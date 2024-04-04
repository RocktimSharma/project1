<?php
session_start();
unset($_SESSION["loggedIn"]);

header("Location:login.php");
die;

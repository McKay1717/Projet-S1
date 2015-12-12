<?php
include_once('include/function-login.php');
session_start();
disconnect();
header("location: index.php");

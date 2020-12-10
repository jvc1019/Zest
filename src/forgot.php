<?php
    include("conn.php");

    $Name = $_GET["userName"];
    $Email = $_GET["userEmail"];
    $Code = $_GET["code"];
    $Agree = $_GET['agree'];

    echo $Name;
    echo $Email;
    echo $Code;
    echo $Agree;

    if ($Code == "smwm" and $Agree == "on"){
    	header('location:landing.php');
    }else{
    	header('location:help.php?help=forgot');
    }
?>
<?php
session_start();
require_once "../conect.php";


if(isset($_POST["idcustomer"]) && !empty($_POST["idcustomer"])){
    
    $_SESSION['customertocar']=$_POST["idcustomer"];
}
?>
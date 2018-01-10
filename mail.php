
<?php
if (isset($_POST['opis'])){
require_once "conect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
$id=$_POST['id'];
$opis=$_POST['opis'];
$price=$_POST['cena'];
$iduser=$_SESSION['iduser'];
$result = $polaczenie->query("UPDATE fix SET description = '$opis', price= '$price', iduser='$iduser' WHERE id = '$id'") ;

header('Location:naprawa.php');
}
?>
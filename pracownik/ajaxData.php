<?php


session_start();
require_once "../conect.php";


if(isset($_POST["idcustomer"]) && !empty($_POST["idcustomer"])){
  
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    $query = $polaczenie->query("SELECT * FROM car WHERE idcustomer = ".$_POST['idcustomer']."  ORDER BY model ASC");
    $_SESSION['customertocar']= $_POST['idcustomer'];

    
    $rowCount = $query->num_rows;
    
   
    if($rowCount > 0){
        echo '<option value="" disabled selected>Wybierz samochód </option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['idcar'].'">'.$row['brand']." ".$row['model'].'</option>';
        }
        
    }else{
        echo '<option value="">Brak przypisanych samochoddów</option>';
    }
    echo '<option value="nowysamochod.php">'."Dodaj samochód".'</option>';
}

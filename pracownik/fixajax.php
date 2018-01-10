<?php
session_start();
    if (isset($_POST['naprawa']))
    {	
        $idfix=$_POST['naprawa'];
        require_once "../conect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        $rezultat=$polaczenie->query("SELECT * FROM fix ");
        $wiersz=$rezultat->fetch_assoc();
        echo"<textarea  name='description' placeholder='Opis wykonanych czynności' value='".$wiersz['description']."'></textarea>"."<input type='text' name='price' placeholder='Cena naprawy' >"."<input type='submit' value='Zapisz i zakończ naprawę'>";
        
        }

?>

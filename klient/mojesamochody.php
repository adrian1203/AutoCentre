<?php
session_start();

if (!isset($_SESSION['zalogowany']))
{
    header('Location: ../index.php');
    exit();
}    
?>
    <!DOCTYPE html>

    <html lang="pl-Pl">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Strona serwisu samochodowego">
        <title>
            Seriws samochodów
        </title>
        <link rel="stylesheet" title="main" href="../style/pracownicy.css" />
        <link rel="stylesheet" href="../style/strona-glowna.css" type="text/css">
        <link rel="stylesheet" title="main" href="../style/tabelki.css" type="text/css">
        <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
        <script src="../jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../wybor.js"></script>
    </head>

    <body>
        <script type="text/javascript">
            $(document).ready(function() {
                $('select').on('change', function() {
                    setStyle(this.value);
                })
            });

        </script>
        <div class="stylelista" id="stylelista">
            <select name="" id="wybory">
            <option value="" disabled selected>Wybierz styl</option>
            <option value="main" >Główny</option>
            <option value="alt" >Alternatywny</option>
        </select>

        </div>
        <nav>


            <div class="menu">

                <a id="zdjecie" href="../index.php"><img src="../galeria/menu.png" alt="zdjecie menu"></a>
                <a id="zdjecie" href="uzytkownik.php"><img src="../galeria/e-panel-logo.png" alt="zdjecie menu"></a>

                <ol>
                    <li><a class="page-scroll" href="mojenaprawy.php">Moje naprawy</a></li>
                    <li><a href="mojesamochody.php">Moje samochody</a></li>
                    <li><a class="page-scroll" href="customer_car.php">Dodaj Samochód</a></li>
                    <li><a class="page-scroll" href="../logout.php">Wyloguj</a></li>
                </ol>

            </div>

        </nav>
        <div class="pusty"></div>
        <h2>Moje samochody</h2>
        <?php

$idcustomer=$_SESSION['idcustomer'];
require_once "../conect.php";
$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
$rezultat=$polaczenie->query("SELECT * FROM car WHERE idcustomer=$idcustomer");

echo"<table cellpadding=5 border=1>";
echo"<tr><th> Marka</th><th> Model </th><th>Rok produkcji </th><th>Numer rejestracyjny </th></tr>";
while ($wiersz=$rezultat->fetch_assoc()) {
echo"<tr>";
echo "<td>".$wiersz['brand']." "."</td>"; 
echo "<td>".$wiersz['model']."</td>"; 
echo "<td>".$wiersz['year']."</td>"; 
echo "<td>".$wiersz['number']."</td>";
echo "</tr>";


}

echo"</table>"
?>

    </body>

    </html>

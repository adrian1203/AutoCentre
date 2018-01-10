<?php
session_start();

if (!isset($_SESSION['zalogowanyuser']))
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
        <link rel="stylesheet" href="../style/dodruku.css" type="text/css" media="print">
        <script type="text/javascript" src="../wybor.js"></script>
        <script src="../jquery-3.2.1.min.js"></script>

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
            <option value="">Wybierz styl</option>
            <option value="main" >main</option>
            <option value="alt" >alt</option>
        </select>

        </div>
        <nav>


            <div class="menu">

                <a id="zdjecie" href="../index.php"><img src="../galeria/menu.png" alt="zdjecie menu"></a>
                <a id="zdjecie" href="pracownicy.php"><img src="../galeria/e-panel-logo.png" alt="zdjecie menu"></a>

                <ol>
                    <li><a class="page-scroll" href="nowanaprawa.php">Nowa naprawa</a></li>
                    <li><a class="page-scroll" href="naprawa.php">Zakończ naprawę</a></li>
                    <li><a class="page-scroll" href="spisnapraw.php">Moje naprawy</a></li>
                    <li><a class="page-scroll" href="../logout.php">Wyloguj</a></li>
                </ol>

            </div>
            <div class="pusty"></div>

        </nav>
        <h2>Moje naprawy</h2>
        <?php
       
        $iduser=$_SESSION['iduser'];
     require_once "../conect.php";
   $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
   $rezultat=$polaczenie->query("SELECT * FROM fix WHERE iduser=$iduser");

   echo"<table cellpadding=5 border=1>";
   echo"<tr><th>Numer naprawy</th><th>Data</th><th>Uszkodzenie</th><th>Klient </th><th>Samochód</th><th>Opis naprawy</th><th>Cena</th></tr>";
   while ($wiersz=$rezultat->fetch_assoc()) {
        $idcar=$wiersz['idcar'];
        $car=$polaczenie->query("SELECT * FROM car WHERE idcar=$idcar");
         $cartr=$car->fetch_assoc();
         $idcustomer=$wiersz['idcustomer'];
          $customer=$polaczenie->query("SELECT * FROM customer WHERE idcustomer=$idcustomer");
          $customertr=$customer->fetch_assoc();
        echo"<tr>";
          echo "<td>".$wiersz['id']." "."</td>"; 
         echo "<td>".$wiersz['date']."</td>"; 
          echo "<td>".$wiersz['what']."</td>"; 
          echo "<td>".$customertr['name']." ".$customertr['surname']."</td>";
          echo "<td>".$cartr['brand']." ".$cartr['model']."</td>";
            echo "<td>".$wiersz['description']."</td>"; 
            echo "<td>".$wiersz['price']."</td>"; 
            echo "</tr>";
            

   }

   echo"</table>"
       ?>

    </body>

    </html>

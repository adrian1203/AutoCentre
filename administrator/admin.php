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
    <link rel="stylesheet" title="main" href="../style/pracownicy.css" type="text/css" />
    <link rel="stylesheet" href="../style/strona-glowna.css" type="text/css" />
    <link rel="stylesheet" href="../style/animate.min.css" type="text/css">
    <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
    <link rel="stylesheet"  href="../style/dodruku.css" type="text/css" media="print">
    <script type="text/javascript" src="../wybor.js"></script>
    <script src="../jquery-3.2.1.min.js"></script>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#wybory').on('change', function(){
                setStyle(this.value);
            })});
    </script>
    <div class="stylelista" id="stylelista"> 
        <select name="" id="wybory" >
            <option value="" selected disabled>Wybierz styl</option>
            <option value="main" >Główny</option>
            <option value="alt" >Alternatywny</option>
        </select>

    </div>
    <nav>


        <div class="menu">

            <a id="zdjecie" href="../index.php"><img src="../galeria/menu.png" alt="zdjecie menu"></a>
            <a id="zdjecie" href="admin.php"><img src="../galeria/e-panel-logo.png" alt="zdjecie menu"></a>

            <ol>
                <li><a class="page-scroll" href="wszystkienaprawy.php">Zrealizowane </a> </li>
                <li><a class="page-scroll" href="oczekujace.php">Oczekujące </a> </li>
                <li><a class="page-scroll" href="wszyscykilenci.php">Klienci</a></li>
                <li><a class="page-scroll" href="wszyscypracownicy.php">Pracownicy</a></li>
                <li><a class="page-scroll" href="wszystkiesamochody.php">Samochody</a></li>
                <li><a class="page-scroll" href="dodajpracownika.php">Nowy pracownik</a></li>
                <li><a class="page-scroll" href="../logout.php">Wyloguj</a></li>
            </ol>

        </div>
        <div class="pusty"></div>
        <header>

            <div class="header-contant" id="header-contant">
                <h1 class="hidden ">Auto Centre<br>Panel elektroniczny</h1><br>
                <p class="hidden">Bądź na bieżącą z kazdą naprawą </p>

            </div>


        </header>
    </nav>
    <p>
        Jesteś zalogowany jako administrator
    </p>

</body>

</html>

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
<!--        <link rel="stylesheet" title="main" href="../style/fixedmenu.css" type="text/css">-->
        <link rel="stylesheet" title="main" href="../style/pracownicy.css" type="text/css">
        <link rel="stylesheet" href="../style/strona-glowna.css" type="text/css">
        <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
        <script src="../jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../wybor.js"></script>

    </head>

    <body>
        <script type="text/javascript">
            $(document).ready(function() {
                $('select').on('change', function(){
                    setStyle(this.value);
                })});
        </script>
        <div class="stylelista" id="stylelista"> 
            <select name="" id="wybory" >
                <option value="" disabled selected >Wybierz styl</option>
                <option value="main" >main</option>
                <option value="alt" >alt</option>
            </select>

        </div>
        <nav>


            <div class="menu">

                <a id="zdjecie" href="../index.php"><img src="../galeria/menu.png" alt="zdjecie menu"></a>
                <a href="uzytkownik.php" class="btn btn-default btn-xl wow tada" id="info-button" ><img src="../galeria/e-panel-logo.png" alt="zdjecie menu"></a>

                <ol>
                    <li><a  href="mojenaprawy.php">Moje naprawy</a></li>
                    <li><a  href="mojesamochody.php">Moje samochody</a></li>
                    <li><a class="page-scroll" href="customer_car.php">Dodaj samochód</a></li>
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
            <?php
            echo "Jesteś zalogowany jako ".$_SESSION['name']." ".$_SESSION['surname'];?>
        </p>

    </body>

</html>

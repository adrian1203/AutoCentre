<?php
session_start();

if (!isset($_SESSION['zalogowanyuser']))
{
    header('Location: ../index.php');
    exit();
}    
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Strona serwisu samochodowego">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">
        <title>
            Seriws samochodów
        </title>
        <link rel="stylesheet" href="../style/style.css" />
        <link rel="stylesheet" title="main" href="../style/pracownicy.css" />
        <link rel="stylesheet" href="../style/strona-glowna.css" type="text/css">
        <link rel="stylesheet" title="main" href="../style/tabelki.css" type="text/css">
        <link rel="stylesheet" href="../style/popup.css">
        <link rel="stylesheet" href="../style/dodajpracownika.css" type="text/css">
        <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
        <link rel="stylesheet" href="../style/dodruku.css" type="text/css" media="print">
        <script type="text/javascript" src="../wybor.js"></script>
        <script src="../jquery-3.2.1.min.js"></script>
    </head>

    <body>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#wybory').on('change', function() {
                    setStyle(this.value);
                })
            });

        </script>
        <div class="stylelista" id="stylelista">
            <select name="" id="wybory">
            <option value="" selected disabled>Wybierz styl</option>
            <option value="main" >Główny</option>
            <option value="alt" >Alternatywny</option>
        </select>

        </div>
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
        <div class="popup-inner" id="popup-inner">
            <a href="admin.php" class="close" id=""><i class="fa fa-times fa-2x"></i></a>
            <h3>Dodaj pracownika</h3>

            <form method="post" action="nowarejestracjauser.php">
                <label>  <input placeholder="Imie" type="text" name="name" required="required" value="<?php
                if (isset($_SESSION['fr_name']))
                {
                    echo $_SESSION['fr_name'];
                    unset($_SESSION['fr_name']);
                }
                ?>"></label>

                <label>  <input type="text" placeholder="Nazwisko" name="surname" required="required" value="<?php
                if (isset($_SESSION['fr_surname']))
                {
                    echo $_SESSION['fr_surname'];
                    unset($_SESSION['fr_surname']);
                }
                ?>" > </label>

                <label>  <input type="text" placeholder="Miejscowosc" name="city" required="required" value="<?php
                if (isset($_SESSION['fr_city']))
                {
                    echo $_SESSION['fr_city'];
                    unset($_SESSION['fr_city']);
                }
                ?>"> </label>

                <label>  <input type="text" placeholder="Kod pocztowy" name="cod" required="required" value="<?php
                if (isset($_SESSION['fr_cod']))
                {
                    echo $_SESSION['fr_cod'];
                    unset($_SESSION['fr_cod']);
                }
                ?>"> </label>

                <label>  <input type="text" placeholder="Ulica" name="street" required="required" value="<?php
                if (isset($_SESSION['fr_street']))
                {
                    echo $_SESSION['fr_street'];
                    unset($_SESSION['fr_street']);
                }
                ?>" > </label>

                <label>  <input type="text" placeholder="Login" name="login" required="required" value="<?php
                if (isset($_SESSION['fr_login']))
                {
                    echo $_SESSION['fr_login'];
                    unset($_SESSION['fr_login']);
                }
                ?>"  />

                <?php
                if (isset($_SESSION['e_login']))
                {
                    echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                    unset($_SESSION['e_login']);
                }
                ?></label>

                <label>  <input type="password" placeholder="Haslo" name="password" required="required" > 
                <?php
                if (isset($_SESSION['e_haslo']))
                {
                    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                    unset($_SESSION['e_haslo']);
                }
                ?>      
            </label>

                <label>  <input type="password" placeholder="Powtórz haslo" name="checkpassword" required="required" > </label>

                <label> <input type="email" placeholder="Email" name="email" required="required" value="<?php
                if (isset($_SESSION['fr_email']))
                {
                    echo $_SESSION['fr_email'];
                    unset($_SESSION['fr_email']);
                }
                ?>">
                <?php
                if(isset($_SESSION['e_email'])){
                    echo $_SESSION['e_email'];
                    unset($_SESSION['e_email']);
                }
                ?> </label>

                <input type="submit" name="ready" value="Dodaj">
            </form>

        </div>

    </body>

    </html>

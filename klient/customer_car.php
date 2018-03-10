<?php
session_start();

if (!isset($_SESSION['zalogowany']))
{
    header('Location: ../index.php');
    exit();
}    
?>
    <?php


$customer=$_SESSION['idcustomer'];


if (isset($_POST['brand']))
{
    $brand = $_POST['brand'];
    $model= $_POST['model'];
    $year = $_POST['year'];
    $number = $_POST['number'];
    require_once "../conect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try 
    {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0)
        {
            echo "stringrrr";
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            if ($polaczenie->query("INSERT INTO car VALUES (NULL, '$brand', '$model', '$year', '$number','$customer')"))
            {
                $_SESSION['udanarejestracja']=true;
                header('Location: uzytkownik.php');
            }
            else
            {
                echo "stringrrr";
                throw new Exception($polaczenie->error);
            }



            $polaczenie->close();
        }

    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: '.$e;
    }

}
?>

        <!DOCTYPE html>
        <html lang="pl-Pl">

        <head>
            <meta charset="utf-8">
            <meta name="description" content="Strona serwisu samochodowego">
            <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

            <!-- Custom Fonts -->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
            <title>
                Nowy samochod
            </title>
            <link rel="stylesheet" href="../style/style.css" />
            <link rel="stylesheet" title="main" href="../style/pracownicy.css" />
            <link rel="stylesheet" href="../style/strona-glowna.css" type="text/css">
            <link rel="stylesheet" title="main" href="../style/tabelki.css" type="text/css">
            <link rel="stylesheet" href="../style/popup.css">
            <link rel="stylesheet" href="../style/dodajpracownika.css" type="text/css">
            <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <script src="../jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="../wybor.js"></script>
        </head>

        <body onload="adddate();">
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#wybory').on('change', function() {
                        setStyle(this.value);
                    })
                });

            </script>
            <div class="stylelista" id="stylelista">
                <select name="" id="wybory">
                <option disabled selected >Wybierz styl</option>
                <option value="main" >Główny</option>
                <option value="alt" >Alternatywny</option>
            </select>

            </div>

            <div class="menu">

                <a id="zdjecie" href="../index.php"><img src="../galeria/menu.png" alt="zdjecie menu"></a>
                <a id="zdjecie" href="uzytkownik.php"><img src="../galeria/e-panel-logo.png" alt="zdjecie menu"></a>

                <ol>
                    <li><a href="mojenaprawy.php">Moje naprawy</a></li>
                    <li><a href="mojesamochody.php">Moje samochody</a></li>
                    <li><a class="page-scroll" href="customer_car.php">Dodaj samochód</a></li>
                    <li><a class="page-scroll" href="../logout.php">Wyloguj</a></li>
                </ol>

            </div>
            <div class="pusty"></div>
            <div class="popup-inner" id="popup-inner">
                <a href="uzytkownik.php" class="close" id=""><i class="fa fa-times fa-2x"></i></a>
                <form method="post">
                    <h3>Dodaj samochód</h3>
                    <label> <input placeholder="Marka" type="text" name="brand" required="required"></label>

                    <label> <input placeholder="Model" type="text" name="model" required="required"></label>

                    <label> <input placeholder="Rok produkcji"type="year" name="year" required="required"></label>

                    <label> <input placeholder="Numer rejestracyjny" type="text" name="number" required="required"></label>
                    <input type="submit" value="Dodaj Samochód">

                </form>




            </div>

        </body>

        </html>

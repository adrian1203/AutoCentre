<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl-Pl">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Strona serwisu samochodowego">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <title>
        Seriws samochodów
    </title>
    <link rel="stylesheet" title="main" href="style/pracownicy.css" type="text/css" />
    <link rel="stylesheet" title="main" href="style/header.css" type="text/css" />
    <link rel="stylesheet" href="style/strona-glowna.css" type="text/css" />
    <link rel="stylesheet" title="main" href="style/opis.css" type="text/css" />
    <link rel="stylesheet" title="main" href="style/popup.css" type="text/css">
    <link rel="stylesheet" href="style/animate.min.css" type="text/css">
    <link rel="stylesheet" title="alt" href="style/atlmenu.css" type="text/css">
    <link rel="stylesheet" href="style/dodruku.css" type="text/css" media="print">
    <script type="text/javascript" src="wybor.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <?php
    if (isset($_SESSION['error'])){
        echo"<style>#popup{display:block;}</style>";
        unset($_SESSION['error']);
    }
    ?>
        <?php
    if (isset($_SESSION['udanarejestracja'])){
        echo"<style>#popup{display:block;}</style>";
    
    }
    ?>

</head>



<body onload="listStyles()" id="page-top">
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
           <option value="alt" >Alternaywny</option>
       </select>

    </div>
    <nav>

        <div class="menu">
            <a id="zdjecie" href="#page-top"><img src="galeria/menu.png" alt="zdjecie menu"></a>
            <a href="" class="btn btn-default btn-xl wow tada" id="info-button" onclick="showPopup(event);"><img src="galeria/e-panel-logo.png" alt="zdjecie menu"></a>
            <ol>

                <li><a class="page-scroll" href="#onas">O nas</a> </li>
                <li><a class="page-scroll" href="#naprawy">Zakres usług</a></li>
                <li><a class="page-scroll" href="#galeria">Galeria</a></li>
                <li><a class="page-scroll" href="#kontakt">Kontakt</a></li>


            </ol>
        </div>
    </nav>
    <div class="pusty"></div>
    <header>

        <div class="header-contant" id="header-contant">
            <h1 class="hidden ">Auto Centre</h1><br>
            <p class="hidden">Oddaj swój samochód w dobre ręce i zaufaj naszemu doświadczeniu</p>

        </div>
        <a href="#onas" class="btn">Dowiedz się więcej</a>

    </header>

    <section class="o-nas" id="onas">
        <div class="container">
            <h2>Nasz serwis</h2>

            <p> Istniejemy na krakowskim rynku usług motoryzacyjnych od 2016roku. Oferujemy usługi z zakresu profesjonalnej mechaniki samochodowej. W zakres działań naszego serwisu samochodowego wchodzi komputerowa diagnostyka i naprawa układów elektronicznych silnika.Wykonujemy również naprawy zawieszenia, systematyczne przeglądy. Cały nasz serwis operty jest na nowoczesnych techonolgiach informacyjych, dzięki czemu nasz kilent od początku do końca może śledzić postęp naprawy sowjego samochodu w serwisie. </p>
        </div>
    </section>

    <section class="naprawy" id="naprawy">

        <div class="naprawy" id="naprwy">
            <div class="spis-napraw">
                <div class="naprawy-tabela">
                    <h3>Silnik</h3>
                    <img src="galeria/silnik.jpg" alt="zdjecie">
                    <p>Oferujemy kompleksowa diagnostyke i naprawe silnikow roznych marek</p>
                </div>
                <div class="naprawy-tabela">
                    <h3>Klimatyzacja</h3>
                    <img src="galeria/klimatyzacja.png" alt="zdjecie">
                    <p>Oferujemy kompleksowa diagnostyke i naprawe silnikow roznych marek</p>

                </div>
                <div class="naprawy-tabela">
                    <h3>Zaiweszenie</h3>
                    <img src="galeria/zawieszenie.jpg" alt="zdjecie">
                    <p>Oferujemy kompleksowa diagnostyke i naprawe silnikow roznych marek</p>

                </div>
                <div class="naprawy-tabela">
                    <h3>Serwis okresowy</h3>
                    <img src="galeria/serwis.jpg" alt="zdjecie">
                    <p>Oferujemy kompleksowa diagnostyke i naprawe silnikow roznych marek</p>

                </div>
                <div class="naprawy-tabela">
                    <h3>Wymiana opon</h3>
                    <img src="galeria/opna.jpg" alt="zdjecie">
                    <p>Oferujemy kompleksowa diagnostyke i naprawe silnikow roznych marek</p>

                </div>
                <div class="naprawy-tabela">
                    <h3>Uslugi blacharskie</h3>
                    <img src="galeria/lakierowanie.jpg" alt="zdjecie">
                    <p>Oferujemy kompleksowa diagnostyke i naprawe silnikow roznych marek</p>

                </div>
            </div>
        </div>


    </section>
    <section class="galeria" id="galeriia">
        <div class="galeria-tytul">
            <p></p>
            <h2>Galeria</h2>
            <p></p>
        </div>
        <div id="galeria">
            <img src="galeria/148821188954978621_A_N.jpg" alt="zdjecie">
            <img src="galeria/galeria1.jpg" alt="zdjecie">
            <img src="galeria/148821188954978621_A_N.jpg" alt="zdjecie">
            <img src="galeria/audi.jpg" alt="zdjecie">
        </div>"
    </section>
    <section class="kontakt" id="kontakkt">
        <div id="kontakt">
            <h2>Zostańmy w kontakcie</h2>
            <p>Jesteśmy zawsze do Twojej dyspozycji i chętnie odpowiemy na Twoje pytania!</p>
            <p>Krakow <br> ul.Uliczna 23<br> Tel. 256865853</p>
            <p> Email: seriws@krakow.pl</p>
        </div>
    </section>

    <aside id="popup">
        <div class="popup-inner" id="popup-inner">
            <div class="in">
                <a href="" class="close" id=""><i class="fa fa-times fa-2x"></i></a>
                <h2>Elektroniczny system obsługi klienta</h2>
                <?php 
            if(isset($_SESSION['udanarejestracja'])){
                //echo $_SESSION['udanarejestracja'];
                echo"Udana rejestracja możesz się zalgować";
                unset($_SESSION['blad']);
            }
            unset($_SESSION['udanarejestracja']);
            ?>
                <h3>Logowanie</h3>
                <form action="zalogujuser.php" method="post">
                    <label>  <input type="text" placeholder="Login"  name="login" required="required"  /></label>

                    <label>  <input type="password" placeholder="Haslo"name="password" required="required" > </label>

                    <input type="submit" value="Zaloguj">
                </form>
                <?php 
            if(isset($_SESSION['blad'])){
                echo $_SESSION['blad'];
                unset($_SESSION['blad']);
            }
            unset($_SESSION['blad']);
            ?>
                <h3>Nie masz jeszcze konta zapraszamy do rejestracjii</h3>

                <form id="rejestracja" method="post" action="nowarejestracja.php">
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


                    <input type="submit" name="ready" value="Rejestruj">
                </form>
            </div>
        </div>
    </aside>

    <!--
    <div id="spis">
        <ul>
            <li> <a href="rejestracja.php"> Panel klienta  </a></li>
            <li> <a href="rejestracjauser.php"> Panel pracownika  </a></li>
        </ul>
    </div>
-->
    <script src="popup.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="pl-Pl">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Strona serwisu samochodowego">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
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
    <script src="../jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../wybor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#naprawa').on('change', function() {
                var fixID = $(this).val();
                if (fixID) {
                    $.ajax({
                        type: 'POST',
                        url: "fixajax.php",
                        data: 'naprawa=' + fixID,
                        success: function(html) {
                            $('#test').html(html);

                        }
                    });

                }
            });


        });

    </script>
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
                <option value="">Wybierz styl</option>
                <option value="main" >Główny</option>
                <option value="alt" >Alternatywny</option>
            </select>

    </div>
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
    <div class="popup-inner" id="popup-inner">
        <a href="pracownicy.php" class="close" id=""><i class="fa fa-times fa-2x"></i></a>
        <h3>Wybierz naprawę</h3>

        <form id="formularz" method="post" action="zakoncznaprawe.php">
            <label>
                    <select name="naprawa" id="naprawa">
                       <option value="" disabled selected>Wybierz naprawę</option>
                        <?php
                        require_once "../conect.php";
                        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                        $rezultat=$polaczenie->query("SELECT * FROM fix WHERE price='0'");

                        while ($wiersz=$rezultat->fetch_assoc()) {
                            $what=$wiersz['what'];
                            $date=$wiersz['date'];
                            $id=$wiersz['id'];
                            $idcar=$wiersz['idcar'];
                            $car=$polaczenie->query("SELECT * FROM car WHERE idcar=$idcar");
                            $cartr=$car->fetch_assoc();
                            $brand=$cartr['brand'];
                            $model=$cartr['model'];
                            $number=$cartr['number'];
                            echo"<option value='".$id."'> $brand $model $number   $date</option>";
                        }
                        ?>
                    </select>
                    
                </label>
            <label id="test">
                    
                </label>


        </form>


    </div>

</body>




</html>

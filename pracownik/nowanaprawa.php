<?php

session_start();



if (!isset($_SESSION['zalogowanyuser']))
{
    header('Location: ../index.php');
    exit();
}

if (isset($_POST['what']))
{
    $iduser=$_SESSION['iduser'];
    $what = $_POST['what'];
    $data = $_POST['data'];
    if (isset($_POST['customer'])){
        header('Location: ../index.php');
    }
    $idcustomer = $_POST['customer'];
    $idcar = $_POST['car'];
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
            if ($polaczenie->query("INSERT INTO fix VALUES (NULL, '$data', '$what', '$idcustomer', $iduser, '$idcar','Jeszcze nie naprawiono' ,000 )"))
            {
                $_SESSION['udanarejestracja']=true;
                header('Location: pracownicy.php');
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
        <link rel="stylesheet" href="../style/form.css" type="text/css">
        <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
        <script type="text/javascript" src="../wybor.js"></script>
        <script src="data.js" type="text/javascript">


        </script>
        <script src="../jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#customer').on('change', function() {
                    var customerID = $(this).val();
                    if (customerID) {
                        $.ajax({
                            type: 'POST',
                            url: "ajaxData.php",
                            data: 'idcustomer=' + customerID,
                            success: function(html) {
                                $('#car').html(html);

                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "ajaxdodaj.php",
                            data: 'idcustomer=' + customerID,
                            success: function(html) {
                                $('#dodaj').html(html);

                            }
                        });
                    } else {
                        $('#car').html('<option value="">Wybierz najpierw klienta</option>');

                    }
                });


            });
            $(document).ready(function() {
                $("select").click(function() {
                    var open = $(this).data("isopen");
                    if (open && $(this).val() == "nowysamochod.php") {
                        window.location.href = $(this).val()
                    }
                    //set isopen to opposite so next time when use clicked select box
                    //it wont trigger this event
                    $(this).data("isopen", !open);
                });
            })

        </script>
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

            <h3>Dodaj nową naprawe</h3>

            <form id="formularz" method="post">
                <?php
                //Include database configuration file
                require_once "../conect.php";
                $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                //Get all country data
                $query=$polaczenie->query("SELECT * FROM customer ORDER BY name ASC");


                //Count total number of rows
                $rowCount = $query->num_rows;
                ?>
                    <select name="customer" id="customer">
                    <option value="" disabled selected>Wybierz Klienta</option>
                    <?php
                    if($rowCount > 0){
                        while($row = $query->fetch_assoc()){ 
                            $name=$row['name'];
                            $surname=$wrow['surname'];
                            
                            echo '<option value="'.$row['idcustomer'].'">'.$row['name']." ".$row['surname'].'</option>';
                        }
                    }else{
                        echo '<option value="">Country not available</option>';
                    }
                       
                    ?>
                </select>

                    <select name="car" id="car">
                    <option value="" disabled selected>Wybierz najpierw klienta</option>
                </select>

                    <label id="dodaj"></label>

                    <label> <textarea class="desc" placeholder="Zgłaszane usterki" type="text" name="what" required="required"></textarea></label>
                    <label>  <input id="data" placeholder="Data dodania"type="date" name="data" required="required" > </label>
                    <input type="submit" name="ready" value="Dodaj naprawę">

            </form>

        </div>




    </body>

    </html>

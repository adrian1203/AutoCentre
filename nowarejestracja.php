<?php

session_start();
$email = $_POST['email'];
echo"$email";
if (isset($_SESSION['udanarejestracja']))
{
    echo "Rejestracja udane, możesz się zalogować";
    unset($_SESSION['udanarejestracja']);
}
if (isset($_POST['email']))
{
    //Udana walidacja? Załóżmy, że tak!
    $wszystko_OK=true;
    echo"to jestem";
    //Sprawdź poprawność nickname'a
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $city = $_POST['city'];
    $cod = $_POST['cod'];
    $street = $_POST['street'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkpassword = $_POST['checkpassword'];
    //Sprawdzenie długości nicka
    if ((strlen($login)<3) || (strlen($login)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_login']="Nick musi posiadać od 3 do 20 znaków!";
    }

    if (ctype_alnum($login)==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_login']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    // Sprawdź poprawność adresu email


    if ((strlen($password)<8) || (strlen($password)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
    }

    if ($password!=$checkpassword)
    {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
    }   

    $password_hash = password_hash($password, PASSWORD_DEFAULT);



   


    //Zapamiętaj wprowadzone dane
    $_SESSION['fr_login'] = $login;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_password'] = $password;
    $_SESSION['fr_name'] = $name;
    $_SESSION['fr_surname'] = $surname;
    $_SESSION['fr_city'] = $city;
    $_SESSION['fr_cod'] = $cod;
    $_SESSION['fr_street'] = $street;
    /*if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
        */
    require_once "conect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try 
    {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0)
        {
            echo "string";
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("SELECT idcustomer FROM  customer WHERE email='$email'");
            $rezultat1 = $polaczenie->query("SELECT iduser FROM  user WHERE email='$email'");
            if (!$rezultat) throw new Exception($polaczenie->error);
            if (!$rezultat1) throw new Exception($polaczenie->error);
            $ile_takich_maili = $rezultat->num_rows;
            $ile_takich_maili1 = $rezultat1->num_rows;
            if($ile_takich_maili>0 or $ile_takich_maili1>0 )
            {
                $wszystko_OK=false;
                $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
            }       

            //Czy nick jest już zarezerwowany?
            $rezultat = $polaczenie->query("SELECT idcustomer FROM customer WHERE login='$login'");
            $rezultat1 = $polaczenie->query("SELECT iduser FROM user WHERE login='$login'");

            if (!$rezultat) throw new Exception($polaczenie->error);
            if (!$rezultat1) throw new Exception($polaczenie->error);
            $ile_takich_nickow = $rezultat->num_rows;
            $ile_takich_nickow1 = $rezultat1->num_rows;
            if($ile_takich_nickow>0 or $ile_takich_nickow>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_login']="Istnieje już klient o takim nicku! Wybierz inny.";
            }

            if ($wszystko_OK==true)
            {
                //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy

                if ($polaczenie->query("INSERT INTO customer VALUES (NULL, '$login', '$password_hash', '$email', '$name', '$surname', '$city','$cod' ,'$street')"))
                {
                    $rezultat = $polaczenie->query("SELECT idcustomer FROM customer WHERE login='$login'");
                    $wiersz=$rezultat->fetch_assoc();
                    
                    $_SESSION['udanarejestracja']="Możesz sie zalgować";
                    $_SESSION['idcustomer'] = $wiersz['idcustomer'];
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['login'] = $login;
                    $_SESSION['name'] = $name;
                    $_SESSION['surname'] = $surname;
                    header('Location: klient/uzytkownik.php');
                }
                else
                {
                    throw new Exception($polaczenie->error);
                }

            }
            else{
                $_SESSION['error']="blad";
                header('Location: index.php');
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


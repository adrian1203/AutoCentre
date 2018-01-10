<?php
session_start();
if (!isset($_SESSION['zalogowanyuser']))
{
    header('Location: ../index.php');
    exit();
}
if (isset($_POST['naprawa']))
{	
    $description=$_POST['description'];
    $idfix=$_POST['naprawa'];
    $iduser=$_SESSION['iduser'];
    $price=$_POST['price'];
    require_once "../conect.php";
    //mysqli_report(MYSQLI_REPORT_STRICT);
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
            if ($polaczenie->query("UPDATE fix SET iduser='".$iduser."' , description='".$description."' , price='".$price."' WHERE id='".$idfix."' "))
            {
                $rezultat=$polaczenie->query("SELECT * FROM fix WHERE id='".$idfix."' ");
                $fix=$rezultat->fetch_assoc();
                $tmp=$fix['idcustomer'];
                $rezultat1=$polaczenie->query("SELECT * FROM customer WHERE idcustomer='".$tmp."' ");
                $tmp=$rezultat1->fetch_assoc();
                $to=$tmp['email'];
                $content="Witaj ".$tmp['name']." ".$tmp['surname']." Twoj samochod został naprawiony Cena naprawy to ".$fix['idcustomer']." Pozdrawiam";
                $_SESSION['udanarejestracja']=true;
                //echo"$content";
                //header('Location: pracownicy.php');
                $od  = "From: autocentrekrakow@gmail.com \r\n";
                if(mail("adrian.opiela11@gmail.com", "Zakończenie naprawy","Twoja naprawa została zakończona, możesz odebrać swój samochód", $od)){
                    header('Location: pracownicy.php'); 
                }
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

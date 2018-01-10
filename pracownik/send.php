<?php
session_start();

$text=$_GET['message'];
$nick=$_SESSION["name"];
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
        if ($polaczenie->query("INSERT INTO messages VALUES (NULL, '$nick', '$text')"))
        {

        }
        else
        {
            echo "stringrrr";
            throw new Exception($polaczenie->error);
        }
        if ($rezultat=$polaczenie->query("SELECT * FROM messages"))
        {
            $tmp=0;
            $first=$rezultat->fetch_assoc();
            while ($wiersz=$rezultat->fetch_assoc()) {
                $tmp++;
                if($tmp>10){
                    $polaczenie->query("DELETE FROM messages WHERE idmessage=".$first['idmessage']."");
                    break;
                }

            }
        }
        else
        {
            echo "Błąd połącznia";
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
?>

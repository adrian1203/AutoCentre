<?php
require_once "../conect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try 
{
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno!=0)
    {
        echo "Błąd połącznia";
        throw new Exception(mysqli_connect_errno());
    }
    else
    {
        if ($rezultat=$polaczenie->query("SELECT * FROM messages"))
        {
            while ($wiersz=$rezultat->fetch_assoc()) {
                echo"".$wiersz['text']."";

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
<?php
session_start();

$text=$_POST['mess'];
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
        if ($polaczenie->query("INSERT INTO messages VALUES (NULL, 'hhhhh', 'hhhh', 'hhhh', '$text')"))
        {
           
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
?>

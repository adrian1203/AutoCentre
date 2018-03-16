<?php

require_once "conect.php";
session_start();

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM user WHERE login='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
        {
            $rezultat1 = @$polaczenie->query(
                sprintf("SELECT * FROM customer WHERE login='%s'",
                        mysqli_real_escape_string($polaczenie,$login)));
        	$ilu=$rezultat->num_rows;
            $ilu1=$rezultat1->num_rows;
        	if($ilu>0){
        		$wiersz=$rezultat->fetch_assoc();
        		if(password_verify($password, $wiersz['password'])){     
        		$_SESSION['iduser'] = $wiersz['iduser'];
      			$_SESSION['zalogowanyuser'] = true;
				$_SESSION['login'] = $wiersz['login'];
				$_SESSION['name'] = $wiersz['name'];
				$_SESSION['surname'] = $wiersz['surname'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['city'] = $wiersz['city'];
				$_SESSION['cod'] = $wiersz['cod'];
				$_SESSION['street'] = $wiersz['street'];
				
				unset($_SESSION['blad']);
        	$rezultat->free_result();
                    if($_SESSION['login']=="admin"){
                        header('Location: administrator/admin.php');
                    }
                    else{
                        header('Location: pracownik/pracownicy.php');
                    }
        	
            }else{
                $_SESSION['blad'] = "Nieprawidlowy login lub haslo";
                $_SESSION['error']="cos nie tak";
                $_SESSION['errorlog']="chuj";
                header('Location:index.php');
}
        	}
           elseif($ilu1>0){
                $wiersz=$rezultat1->fetch_assoc();
                if(password_verify($password, $wiersz['password'])){
                    $_SESSION['idcustomer'] = $wiersz['idcustomer'];
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['login'] = $wiersz['login'];
                    $_SESSION['name'] = $wiersz['name'];
                    $_SESSION['surname'] = $wiersz['surname'];
                    $_SESSION['email'] = $wiersz['email'];
                    $_SESSION['city'] = $wiersz['city'];
                    $_SESSION['cod'] = $wiersz['cod'];
                    $_SESSION['street'] = $wiersz['street'];
                    unset($_SESSION['blad']);
                    $rezultat->free_result();
                    header('Location: klient/uzytkownik.php');
                }else{
                    $_SESSION['blad'] = "Nieprawidlowy login lub haslo";
                    $_SESSION['error']="cos nie tak";
                    $_SESSION['errorlog']="";
                    header('Location:index.php');
                }

            }
        	else{
        	$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            $_SESSION['error']="cos nie tak";
            header('Location:index.php');
        	}
        }
       
    }
?>

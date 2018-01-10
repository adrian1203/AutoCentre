function checked() {
    return document.getElementById("check").checked; // Zwraca boolean true jesli zaznaczony, false jesli nie
}

// Sprawdzanie czy wpisany nick i wiadomość
function checkValues() {
    return  document.getElementById("message").value; // Jesli wpisane zwraca true
}

// AJAX - wyswietlanie wiadomosci
function update() {
    document.getElementById("../chat").innerHTML = ""; // Wyczyszczenie czata (jak odznaczymy checkbox)

    var xmlhttp;
    xmlhttp=new XMLHttpRequest();


    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==3 && xmlhttp.status==200) { // Ladowanie polaczenia
            if (checked()) { // Jesli checkbox zaznaczony to wyswietlenie wyniku dzialania skryptu messages.php
                document.getElementById("chat").innerHTML=xmlhttp.responseText;
            }
        }
        if (xmlhttp.readyState==4) { // Zamykanie polaczenia
            xmlhttp.open("GET","messages.php",true);
            xmlhttp.send();
        }
    }	
    xmlhttp.open("GET", "messages.php", true); // Specyfikacja typu polaczenia
    xmlhttp.send(); // Wyslanie zapytania do serwera
}

// AJAX - wysylanie wiadomosci
function send() {
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();


    /*	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("debug").innerHTML=xmlhttp.responseText; // Do debugowania
		}
	}
*/

    //var nickValue = encodeURIComponent(document.getElementById( "message").value); // Pobranie nicku
    var messageValue = encodeURIComponent(document.getElementById("message").value); // Pobranie wiadomosci

    xmlhttp.open("GET", "send.php?message="+messageValue, true); // Specyfikacja polaczenia z odpowiednimi parametrami do wykorzystania w PHP
    // (nick i wiadomosc)
    xmlhttp.send();

    document.getElementById("message").value = ""; 
}
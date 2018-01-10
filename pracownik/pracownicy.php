<?php
session_start();
    
    if (!isset($_SESSION['zalogowanyuser']))
    {
        header('Location: ../index.php');
        exit();
    }    
    ?>
    <!DOCTYPE html>
    <html lang="pl-Pl">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Strona serwisu samochodowego">
        <title>
            Seriws samochodów
        </title>
        <link rel="stylesheet" title="main" href="../style/pracownicy.css" type="text/css">
        <link rel="stylesheet" href="../style/strona-glowna.css" type="text/css">
        <link rel="stylesheet" href="../style/message.css" type="text/css">
        <link rel="stylesheet" href="../style/stylelist.css" type="text/css">
        <link rel="stylesheet" title="alt" href="../style/altindex.css" type="text/css">
        <link rel="stylesheet"  href="../style/dodruku.css" type="text/css" media="print">
        <script src="../jquery-3.2.1.min.js"></script>
        <script src="chat.js" type="text/javascript"></script>
        <script type="text/javascript" src="../wybor.js"></script>
       
        <script>
            
            function checked() {
                
                return document.getElementById("check").checked; 
                
            }

            
            function checkValues() {
                return  document.getElementById("message").value; 
            }

           
            function update() {
                document.getElementById("chat").innerHTML = ""; 
                var isopen;
                var t="true";
                var f="false";
                isopen=new XMLHttpRequest();
            
                if(checked()){
                    isopen.open("GET", "memory.php?isopen="+t, true);
                    document.getElementById("chatbox").style.display='block';}
                else{ isopen.open("GET", "memory.php?isopen="+f, true);
                    document.getElementById("chatbox").style.display='none';}
                var xmlhttp;
                xmlhttp=new XMLHttpRequest();
                

                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==3 && xmlhttp.status==200) { 
                        if (checked()) { 
                            document.getElementById("chat").innerHTML=xmlhttp.responseText;
                        }
                    }
                    if (xmlhttp.readyState==4) { 
                        xmlhttp.open("GET","messages.php",true);
                        xmlhttp.send();
                    }
                }	
                xmlhttp.open("GET", "messages.php", true); 
                xmlhttp.send(); 
            }

            
            function send() {
                var xmlhttp;
                xmlhttp=new XMLHttpRequest();
                

              
                var messageValue = encodeURIComponent(document.getElementById("message").value); 

                xmlhttp.open("GET", "send.php?message="+messageValue, true); 
                xmlhttp.send();

                document.getElementById("message").value = ""; 
            }
        </script>
        <?php
        if (isset($_SESSION['chatsession'])){
            if($_SESSION['chatsession']=="true"){
                echo"<style>.chatbox{display:block;}</style>";
            }
            

        }
        ?>
    </head>

    <body>
        <script type="text/javascript">
            $(document).ready(function() {
                $('select').on('change', function(){
                    setStyle(this.value);
                })});
        </script>
        <div class="stylelista" id="stylelista"> 
            <select name="" id="wybory" >
                <option value="">Wybierz styl</option>
                <option value="main" >Główny</option>
                <option value="alt" >Alternatywny</option>
            </select>

        </div>
        
        <nav>


            <div class="menu">

                <a id="zdjecie" href="../index.php"><img src="../galeria/menu.png" alt="zdjecie menu"></a>
                <a id="zdjecie" href="pracownicy.php"><img src="../galeria/e-panel-logo.png" alt="zdjecie menu"></a>

                <ol>
                    <li><a class="page-scroll" href="nowanaprawa.php">Nowa naprawa</a> </li>
                    <li><a class="page-scroll" href="naprawa.php">Zakończ naprawę</a></li>
                    <li><a class="page-scroll" href="spisnapraw.php">Moje naprawy</a></li>
                    <li><a class="page-scroll" href="../logout.php">Wyloguj</a></li>
                </ol>

            </div>
            <div class="pusty"></div>
            <header>

                <div class="header-contant" id="header-contant">
                    <h1 class="hidden ">Auto Centre<br>Panel elektroniczny</h1><br>
                    <p class="hidden">Bądź na bieżącą z kazdą naprawą </p>

                </div>
                <div class="openchat" id="openchat">
                   Chat
                    <input type="checkbox" name="check" id="check" onchange="update();"/>
                </div>
                <div class="chatbox" id="chatbox">
                    
                    <textarea rows="20"  id="chat"  disabled></textarea>

                    <p>Wpisz wiadomość:<p> <input type="text" name="message" id="message" />
                    <button type="button" value="Wyślij" onclick="if ( checkValues()) { send(); } else { alert('Uruchom czat a następnie wpisz nick i wiadomość'); }">Wyślij</button>
                    <div id="debug"></div>

                </div>
                

            </header>
        </nav>
        <p>
            <?php
        echo "Jesteś zalogowany jako ".$_SESSION['name']." ".$_SESSION['surname'];?>
        </p>

    </body>

    </html>

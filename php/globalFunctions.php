<?php

function printNavbar(){
    echo '<nav class="row sticky-top navbar-dark bg-dark" style="box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.75)">
    <div class="col-md-2 col-sm-12 col-12 border-right border-secondary" id="logo"><a class="" href="index.php"><img src="images/AdventureHubLogo.png" alt="logo.png" id="imglogo"></div></a>
    <div class="col-md-7 col-sm-0 col-0"></div>
    <div class="col-md-3 col-sm-12 col-12 text-white border-left border-secondary">';
    if(!isset($_SESSION["nombre"])) echo '<center>Eres organizador? <a href="Login-Register.php?type=reg">registrate</a> o <a href="Login-Register.php?type=log">inicia sesión</a></center>';
    else{       
        echo '<center><a class=" btn btn btn-outline-light btn-sm" href="php/logout.php">Salir</a></center></div>';
    }
    echo '</nav>';    
}

?>
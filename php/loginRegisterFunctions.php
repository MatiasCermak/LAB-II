<?php

include "php/dbconnection.php";

function register()
{
    echo '<form action="UserPage.php" method="post" id="reg">
    <div class="form-group">
        <label for="exampleInputEmail1" class="">Direccion de Email</label>
        <input type="email" class="form-control" id="exampleInputEmailreg" aria-describedby="emailHelp" name="mail" required>
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu contraseña con nadie.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nombre de Organizador</label>
        <input type="text" class="form-control" id="organizer" name="org" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPasswordreg" name="pass" required>
    </div>';
    if ($_GET['type']=='regf') {
        echo '<div class="alert alert-danger" role="alert">
        Alguno de los parámetros ingresados ya está en uso, por favor, intente de nuevo con otros parámetros.
      </div>';     
    }
    echo '<button type="submit" class="btn btn-primary" name="submit" value="reg">Registrarse</button>
</form>';
}

function login(){
    echo '<form action="UserPage.php" method="post" id="login">
    <div class="form-group">
        <label for="exampleInputEmail1" class="">Direccion de Email</label>
        <input type="email" class="form-control" id="exampleInputEmaillog" name="mail" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu contraseña con nadie.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPasswordlog" name="pass" required>
    </div>
    ';
    if ($_GET['type']=='logf') {
        echo '<div class="alert alert-danger" role="alert">
        Mail o contraseña incorrectos, por favor ingresa de nuevo.
      </div>';     
    }
    echo '
    <button type="submit" class="btn btn-primary" name="submit" value="log">Ingresar</button>
</form>';
}


?>
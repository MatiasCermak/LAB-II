<?php

include "php/dbconnection.php";

function authLogin(){
    connect($conn);
    $login = $conn->prepare('SELECT id_organizador, mail_organizador, password, nombre 
                                FROM organizadores
                                WHERE mail_organizador=\''. $_POST['mail'].'\' AND password=\''. $_POST['pass'].'\'');
    
    
    $login->execute();
    $data = $login->fetchAll();
    if(count($data)==0){
        echo '<script type="text/javascript">
           window.location.replace("Login-Register.php?type=logf");
      </script>';
    }
    $_SESSION['idorg'] = $data[0]['id_organizador'];
    $_SESSION['mail'] = $data[0]['mail_organizador'];
    $_SESSION['pass'] = $data[0]['password'];
    $_SESSION['nombre'] = $data[0]['nombre'];
}

function authRegister(){
    connect($conn);
    $login = $conn->prepare('SELECT mail_organizador
                                FROM organizadores
                                WHERE mail_organizador=\''. $_POST['mail'].'\'');
    
    if($login->execute()){
        $data = $login->fetchAll();
        if(count($data)!=0){
            echo '<script type="text/javascript">
           window.location.replace("Login-Register.php?type=regf");
            </script>';
        }
    }

    $login = $conn->prepare('SELECT nombre
                                FROM organizadores
                                WHERE nombre=\''. $_POST['org'].'\'');
    
    if($login->execute()){
        $data = $login->fetchAll();
        if(count($data)!=0){
            echo '<script type="text/javascript">
           window.location.replace("Login-Register.php?type=regf");
            </script>';
        }
    }

    $login = $conn->prepare('INSERT INTO `organizadores` (`id_organizador`, `mail_organizador`, `password`, `nombre`) VALUES (NULL, \'' . $_POST['mail'] . '\',\'' . $_POST['pass'] . '\', \'' . $_POST['org'] . '\');');
    
    if(!$login->execute()){
        echo '<script type="text/javascript">
           window.location.replace("Login-Register.php?type=regf");
            </script>';
    }

    $login = $conn->prepare('SELECT * FROM `organizadores` ORDER BY `organizadores`.`id_organizador` DESC');
    if(!$login->execute()){
        echo '<script type="text/javascript">
           window.location.replace("Login-Register.php?type=regf");
            </script>';
    }
    $data = $login->fetchAll();
    $_SESSION['idorg'] = $data[0]['id_organizador'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['nombre'] = $_POST['org'];
}

function entry(){
    if($_POST['submit'] == 'log'){
        authLogin();
    }   
    else if($_POST['submit'] == 'reg'){
        authRegister();
    }
}

function showTypes(){
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT *
    FROM tipo_evento' );
    $cardsStatement->execute();
    $params = $cardsStatement->fetchAll();
    for( $i = 0; $i < count($params); $i++){
        echo '<option value="'. $params[$i]['id_tipo'] . '">'. $params[$i]['tipo'] .'</option>';
    }
}

function showEvents(){
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT id_eventos, titulo
    FROM eventos
    WHERE organizador_id = ' . $_SESSION['idorg'] . '&& estado = 1 ' );
    $cardsStatement->execute();
    $params = $cardsStatement->fetchAll();
    for( $i = 0; $i < count($params); $i++){
        echo '<div class="form-group"><center><input class="form-check-input" type="checkbox" id="check" value="' . $params[$i]['id_eventos'] . '" name="' . $params[$i]['id_eventos'] . '">
        <label class="form-check-label" for="check">
        <span class="badge badge-primary"> ' . $params[$i]['titulo'] . '</span>
        </label></center></div><br>';
    }
}

function showReservationsConfirmed(){
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT id_eventos, titulo
    FROM eventos
    WHERE organizador_id = ' . $_SESSION['idorg'] . '&& estado = 1 && fecha_limite >= CURDATE() ' );
    $cardsStatement->execute();
    $params = $cardsStatement->fetchAll();
    foreach ($params as $i) { 
        $cardsStatement = $conn->prepare('SELECT *
        FROM reservas
        WHERE reservas.evento_id = ' . $i['id_eventos'] . ' && reservas.confirmada = 1' );
        $cardsStatement->execute();
        $par = $cardsStatement->fetchAll();
        if(count($par) == 0) continue;
        echo '<div class="list-group"> <button type="button" class="list-group-item list-group-item-action active">
        Reservas para: ' . $i['titulo'] . '
      </button>';
        foreach($par as $j){
            echo '
            <button type="button" class="list-group-item list-group-item-action">Nombre: ' . $j['nombre_reserva'] . '</button>
            <button type="button" class="list-group-item list-group-item-action">Mail: ' . $j['mail_usuario'] . '</button>
            <button type="button" class="list-group-item list-group-item-action">Cantidad de reservas: ' . $j['num_reservas'] . '</button>
            <br>
            ';
        }
        echo '</div>';
    }
}

function showReservationsUnconfirmed(){
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT id_eventos, titulo
    FROM eventos
    WHERE organizador_id = ' . $_SESSION['idorg'] . '&& estado = 1 && fecha_limite >= CURDATE() ' );
    $cardsStatement->execute();
    $params = $cardsStatement->fetchAll();
    if(count($params) == 0) return;
    foreach ($params as $i) { 
        $cardsStatement = $conn->prepare('SELECT *
        FROM reservas
        WHERE reservas.evento_id = ' . $i['id_eventos'] . ' && reservas.confirmada = 0' );
        $cardsStatement->execute();
        $par = $cardsStatement->fetchAll();
        if(count($par) == 0) continue;
        echo '<div class="list-group"> <button type="button" class="list-group-item list-group-item-action active">
        Reservas para: ' . $i['titulo'] . '
      </button>';
        foreach($par as $j){
            echo '
            <button type="button" class="list-group-item list-group-item-action">Nombre: ' . $j['nombre_reserva'] . '</button>
            <button type="button" class="list-group-item list-group-item-action">Mail: ' . $j['mail_usuario'] . '</button>
            <button type="button" class="list-group-item list-group-item-action">Cantidad de reservas: ' . $j['num_reservas'] . '</button>
            <br>
            ';
        }
        echo '</div>';
    }
}
    

?>
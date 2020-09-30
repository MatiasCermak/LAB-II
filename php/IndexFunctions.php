<?php
include 'php/dbconnection.php';

function mainCardViewer(&$conn)
{
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, tipo_evento.tipo 
                                        FROM eventos JOIN tipo_evento
                                        ON eventos.tipo_id = tipo_evento.id_tipo');
    $cardsStatement->execute();
    $data = $cardsStatement->fetchAll();
    $numRows = floor(count($data) / 8);
    $numOfLastCards = count($data) % 8;
    for ($j = 0; $j < $numRows; $j++) {
        if ($j == 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck" id="card-container">';
        }
        if ($j != 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck inv" id="card-container">';
        }
        for ($i = 0; $i < 8; $i++) {
            echo '<div class="col-md-3 col-sm-12 col-12 spacer-card card-group">
                <div class="card h-100" >
                    <img src="images/imagen2.png" class="card-img-top" alt="...">
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[$i * ($j + 1)]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-info">Tipo de Evento: ' . $data[$i * ($j + 1)]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-info">Fecha: ' . $data[$i * ($j + 1)]['fecha'] . '</span></p>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    }
    if ($numOfLastCards != 0) {
        if($numRows == 0) echo '<div class="col-md-10 col-sm-12 col-12 card-deck" id="card-container">';
        else echo '<div class="col-md-10 col-sm-12 col-12 card-deck inv" id="card-container">';
        for ($i = 0; $i < $numOfLastCards; $i++) {
            echo '<div class="col-md-3 col-sm-12 col-12 spacer-card card-group">
                <div class="card h-100" >
                    <img src="images/imagen2.png" class="card-img-top" alt="...">
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[$i]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-info">Tipo de Evento: ' . $data[$i]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-info">Fecha: ' . $data[$i]['fecha'] . '</span></p>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    }
    disconnect($conn);
}

function filteredCardViewer(&$conn, $id)
{
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, tipo_evento.tipo 
    FROM eventos 
    JOIN tipo_evento
    ON eventos.tipo_id = tipo_evento.id_tipo
    WHERE eventos.tipo_id = ' . $id);
    $cardsStatement->execute();
    $data = $cardsStatement->fetchAll();

    $numRows = floor(count($data) / 8);
    $numOfLastCards = count($data) % 8;
    for ($j = 0; $j < $numRows; $j++) {
        if ($j == 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck" id="card-container">';
        }
        if ($j != 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck inv" id="card-container">';
        }
        for ($i = 0; $i < 8; $i++) {
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 spacer-card card-group">
                <div class="card h-100" >
                    <img src="images/imagen2.png" class="card-img-top" alt="...">
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[$i * ($j + 1)]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-info">Tipo de Evento: ' . $data[$i * ($j + 1)]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-info">Fecha: ' . $data[$i * ($j + 1)]['fecha'] . '</span></p>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    }
    if ($numOfLastCards != 0) {
        if($numRows == 0) echo '<div class="col-md-10 col-sm-12 col-12 card-deck" id="card-container">';
        else echo '<div class="col-md-10 col-sm-12 col-12 card-deck inv" id="card-container">';
        for ($i = 0; $i < $numOfLastCards; $i++) {
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 spacer-card card-group">
                <div class="card h-100" >
                    <img src="images/imagen2.png" class="card-img-top" alt="...">
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[$i]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-info">Tipo de Evento: ' . $data[$i]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-info">Fecha: ' . $data[$i]['fecha'] . '</span></p>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    }
    disconnect($conn);
}

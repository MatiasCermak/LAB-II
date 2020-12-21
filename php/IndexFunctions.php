<?php
include 'php/dbconnection.php';

function bannerCardViewer(&$conn){
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT eventos.id_eventos, eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, eventos.imagen, eventos.cupo_completo, tipo_evento.tipo 
                                        FROM eventos JOIN tipo_evento
                                        ON eventos.tipo_id = tipo_evento.id_tipo
                                        WHERE cupo_completo = 0 && estado = 1 && fecha_limite >= CURDATE()
                                        ORDER BY eventos.fecha ASC
                                        LIMIT 4
                                    ');
    $cardsStatement->execute();
    $data = $cardsStatement->fetchAll();
    for ($i = 0; $i < 4; $i++){
        if($i == 0){
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 card-group">';
        }
        else if($i == 1 or $i == 2){
            echo '<div class="col-lg-3 col-md-4 col-sm-0 col-0 card-group">';
        }
        else echo '<div class="col-lg-3 col-md-0 col-sm-0 col-0 card-group">';
        echo '<a class="w-100 h-100" href="event-page.php?id='. $data[$i]['id_eventos'] .'"><div class="card" style="width: 100%;">
            <div style="height:200px; background: #E9ECEF;"><center><img src="'. $data[$i]['imagen'] .'" class="img-fluid" alt="..." style="height: 200px;!important"></center></div>
            <div class="card-body" style="height:200px>
            <h5 class="card-title">' . $data[$i]['titulo'] . '</h5>
            <p class="card-text"> <span class="badge badge-pill badge-primary">Tipo de Evento: ' . $data[$i]['tipo'] .
    '</span><br> <span class="badge badge-pill badge-primary">Fecha: ' . $data[$i]['fecha'] . '</span></p>
            </div>
        </div></a>
    </div>';
    }
    disconnect($conn);
}

function mainCardViewer(&$conn)
{
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT eventos.id_eventos, eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, eventos.imagen, eventos.cupo_completo, tipo_evento.tipo 
                                        FROM eventos JOIN tipo_evento
                                        ON eventos.tipo_id = tipo_evento.id_tipo
                                        WHERE cupo_completo = 0 && estado = 1 && fecha_limite >= CURDATE()');
    $cardsStatement->execute();
    $data = $cardsStatement->fetchAll();
    $numRows = floor(count($data) / 12);
    $numOfLastCards = count($data) % 12;
    for ($j = 0; $j < $numRows; $j++) {
        if ($j == 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary" id="card-container">';
        }
        if ($j != 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary inv" id="card-container">';
        }
        for ($i = 1; $i <= 12; $i++) {
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 spacer-card card-group">
                <a class="w-100 h-100 rounded" href="event-page.php?id='. $data[($i * ($j + 1)) -1]['id_eventos'] .'"><div class="card h-100">
                <div style="height:200px; background: #E9ECEF;"><center><img src="'. $data[($i * ($j + 1)) -1]['imagen'] .'" class="img-fluid" alt="..." style="height: 200px;!important"></center></div>
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[($i * ($j + 1)) -1]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-primary">Tipo de Evento: ' . $data[($i * ($j + 1)) -1]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-primary">Fecha: ' . $data[($i * ($j + 1)) -1]['fecha'] . '</span></p>
                    </div>
                </div></a>
            </div>';
        }
        echo '</div>';
    }
    if ($numOfLastCards != 0) {
        if($numRows == 0) echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary" id="card-container">';
        else echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary inv" id="card-container">';
        for ($i = count($data) - count($data) % 12; $i < count($data); $i++) {
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 spacer-card card-group">
                <a class="w-100 h-100" href="event-page.php?id='. $data[$i]['id_eventos'] .'"><div class="card h-100" >
                <div style="height:200px; background: #E9ECEF;"><center><img src="'. $data[$i]['imagen'] .'" class="img-fluid" alt="..." style="height: 200px;!important"></center></div>
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[$i]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-primary">Tipo de Evento: ' . $data[$i]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-primary">Fecha: ' . $data[$i]['fecha'] . '</span></p>
                    </div>
                </div></a>
            </div>';
        }
        echo '</div>';
    }
    disconnect($conn);
}

function filteredCardViewer(&$conn, $id)
{
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT eventos.id_eventos, eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, eventos.imagen, eventos.cupo_completo, tipo_evento.tipo 
    FROM eventos 
    JOIN tipo_evento
    ON eventos.tipo_id = tipo_evento.id_tipo
    WHERE eventos.tipo_id = ' . $id . '&& cupo_completo = 0 && estado = 1 && fecha_limite >= CURDATE()');
    $cardsStatement->execute();
    $data = $cardsStatement->fetchAll();

    $numRows = floor(count($data) / 12);
    $numOfLastCards = count($data) % 12;
    for ($j = 0; $j < $numRows; $j++) {
        if ($j == 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary" id="card-container">';
        }
        if ($j != 0) {
            echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary inv" id="card-container">';
        }
        for ($i = 1; $i <= 12; $i++) {
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 spacer-card card-group">
                <a class="w-100 h-100" href="event-page.php?id='. $data[($i * ($j + 1)) -1]['id_eventos'] .'"><div class="card h-100" >
                <div style="height:200px; background: #E9ECEF;"><center><img src="'. $data[($i * ($j + 1)) -1]['imagen'] .'" class="img-fluid" alt="..." style="height: 200px;!important"></center></div>
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[($i * ($j + 1)) -1]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-primary">Tipo de Evento: ' . $data[($i * ($j + 1)) -1]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-primary">Fecha: ' . $data[($i * ($j + 1)) -1]['fecha'] . '</span></p>
                    </div>
                </div></a>
            </div>';
        }
        echo '</div>';
    }
    if ($numOfLastCards != 0) {
        if($numRows == 0) echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary" id="card-container">';
        else echo '<div class="col-md-10 col-sm-12 col-12 card-deck bg-secondary border-top border-secondary inv" id="card-container">';
        for ($i = count($data) - count($data) % 12; $i < count($data); $i++) {
            echo '<div class="col-lg-3 col-md-4 col-sm-12 col-12 spacer-card card-group">
                <a class="w-100 h-100" href="event-page.php?id='. $data[$i]['id_eventos'] .'"><div class="card h-100" >
                <div style="height:200px; background: #E9ECEF;"><center><img src="'. $data[$i]['imagen'] .'" class="img-fluid" alt="..." style="height: 200px;!important"></center></div>
                    <div class="card-body w-100">
                        <h5 class="card-title">' . $data[$i]['titulo'] . '</h5>
                        <p class="card-text"> <span class="badge badge-pill badge-primary">Tipo de Evento: ' . $data[$i]['tipo'] .
                '</span><br> <span class="badge badge-pill badge-primary">Fecha: ' . $data[$i]['fecha'] . '</span></p>
                    </div>
                </div></a>
            </div>';
        }
        echo '</div>';
    }
    disconnect($conn);
}

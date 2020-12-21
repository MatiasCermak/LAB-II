<?php
include "php/dbconnection.php";

function getEventParams(&$params){
    connect($conn);
    $cardsStatement = $conn->prepare('SELECT eventos.id_eventos, eventos.titulo, eventos.descripcion, eventos.cupo, eventos.ubicacion, eventos.fecha, eventos.tipo_id, eventos.cant_max_reservas, eventos.cant_reservas_disp, eventos.imagen, eventos.fecha, tipo_evento.tipo, organizadores.nombre
    FROM eventos 
    JOIN tipo_evento
    ON eventos.tipo_id = tipo_evento.id_tipo
    JOIN organizadores
    ON eventos.organizador_id = organizadores.id_organizador
    WHERE eventos.id_eventos = '. $_GET['id']);
    $cardsStatement->execute();
    $params = $cardsStatement->fetchAll();
}

?>
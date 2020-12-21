<?php
    include "php/dbconnection.php";

    function makeReservation(){
        connect($conn);
        $reserve = $conn->prepare('INSERT INTO `reservas` (`id_reserva`, `evento_id`, `mail_usuario`, `nombre_reserva`, `fecha_reserva`, `num_reservas`) VALUES (NULL, \''. $_GET['id'] .'\', \''. $_POST['mail'] .'\', \''. $_POST['name'] .'\', current_timestamp(), \''. $_POST['select'] .'\')');
        if(!$reserve->execute()) return false;
        $reserve = $conn->prepare('SELECT cant_reservas_disp
            FROM eventos 
            WHERE eventos.id_eventos = '. $_GET['id']);
        if(!$reserve->execute()) return false;
        
        $data = $reserve->fetchAll();
        if($data[0]['cant_reservas_disp'] == $_POST['select'] ){
            $reserve = $conn->prepare('UPDATE eventos   
            SET cupo_completo = 1 
            WHERE id_eventos = '. $_GET['id']);
            if(!$reserve->execute()) return false;
        }

        $newVal = $data[0]['cant_reservas_disp'] - $_POST['select'];
        $reserve = $conn->prepare('UPDATE eventos   
            SET cant_reservas_disp = '. $newVal . ' WHERE id_eventos = '. $_GET['id']);
        if(!$reserve->execute()) return false;
        
        $reserve = $conn->prepare('SELECT titulo
            FROM eventos   
            WHERE id_eventos = '. $_GET['id']);
        if(!$reserve->execute()) return false;
        $data = $reserve->fetchAll();

        $res = $conn->prepare('SELECT id_reserva
            FROM  reservas  
            ORDER BY id_reserva DESC');
        if(!$res->execute()) return false;
        $dat = $res->fetchAll();

        $to      = $_POST['mail']; 

        $subject = 'Confirmacion de Reserva'; 

        $message = 'Hola ' . $_POST['name'] . '!' . "\r\n" . 'Este es un mail de confirmación de tu reserva de ' . $data[0]['titulo'] . '. ' . "\r\n" . 'Para confirmar tu reserva, simplemente haz click Aqui: http://cerk.com.ar/confirmation-page-email.php?id=' . $dat[0]['id_reserva'] ; 

        $headers = 'From: matias@cerk.com' . "\r\n";

        ini_set("SMTP", "mail.cerk.com.ar");
        ini_set("smtp_port", "26");
        
        mail($to, $subject, $message, $headers); 

        return true;
    }

    function createEvent(){
        connect($conn);
        $reserve = $conn->prepare('INSERT INTO `eventos` (`id_eventos`, `tipo_id`, `titulo`, `descripcion`, `cupo`, `ubicacion`, `fecha`, `fecha_limite`, `imagen`, `organizador_id`, `cant_reservas_disp`, `cant_max_reservas`, `cupo_completo`) 
        VALUES (NULL, \'' . $_POST['tipoev'] .'\', \'' . $_POST['titulo'] .'\', \'' . $_POST['desc'] .'\', \'' . $_POST['cupo'] . '\', \'' . $_POST['ubi'] . '\', \'' . $_POST['fechaev'] . '\', \'' . $_POST['fechalim'] . '\', \'' . $_POST['img'] . '\', \'' . $_GET['idorg'] . '\', \'' . $_POST['cupo'] . '\', \'' . $_POST['resper'] . '\', \'0\');');
        if(!$reserve->execute()) return false;
        $reserve = $conn->prepare('SELECT * FROM `eventos` ORDER BY `eventos`.`id_eventos` DESC');
        if(!$reserve->execute()) return false;
        $data = $reserve->fetchAll();
        return $data[0]['id_eventos'];

    }

    function deleteEvent(){
        connect($conn);
        $ret = true;
        foreach ($_POST as $i)
        {
            $reserve = $conn->prepare('UPDATE eventos   
            SET estado = \'0\' WHERE id_eventos = '. $i);
            if(!$reserve->execute()){
                echo "Falso";
                $ret=false;
            }
            
        }
        return $ret;
        
    }

    function confirmReservation(){
        connect($conn);
        $reserve = $conn->prepare('UPDATE reservas  
            SET confirmada = 1 
            WHERE id_reserva = '. $_GET['id']);
        if(!$reserve->execute()) return false;
        return true;
    }

    function successMsg(){
        echo '<div class="alert alert-success" role="alert">
            Reserva creada exitosamente! <hr> Puedes volver al menu de inicio haciendo click en el logo.
      </div>';

    }

    function failMsg(){
        echo '<div class="alert alert-danger" role="alert">
            La reserva no ha podido ser creada. Haz click <a href="event-page.php?id='. $_GET['id'].
            '" class="alert-link"> Aqui </a> para volver a intentarlo.</div>';
    }

    function failMsg2(){
        echo '<div class="alert alert-danger" role="alert">
            La publicación del evento ha fallado, intentalo de nuevo.</div>';
    }

    function successMsg3(){
        echo '<div class="alert alert-success" role="alert">
            Eliminación de eventos exitosa. <hr> Puedes volver al menu de inicio haciendo click en el logo.
      </div>';

    }


    function failMsg3(){
        echo '<div class="alert alert-danger" role="alert">
            La eliminación de los eventos ha fallado, intentalo de nuevo.</div>';
    }

    function successMsg4(){
        echo '<div class="alert alert-success" role="alert">
            La reserva se ha completado con éxito! Disfruta de tu evento.
      </div>';

    }

    function failMsg4(){
        echo '<div class="alert alert-danger" role="alert">
            Ha habido un error en la confirmación de la reserva </div>';
    }
?>
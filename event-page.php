<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>AdventureHub</title>
</head>
<body >
    <?php
    include "php/globalFunctions.php";
    include "php/eventPageFunctions.php";
    ?>
    <!-- JQuery, Poppper.js y javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>    
    <div class="container-fluid">
        <?php
            printNavbar();
            getEventParams($params)
        ?>
        <div class="row">
        <div class="col-md-1 col-sm-0 col-0"></div>
        <div class="col-md-10 col-sm-12 col-12 bg-secondary"><h4><?php echo $params[0]['titulo'] ?></div></h4>
        <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-0 col-0"></div>
            <div class="col-md-4 col-sm-12 col-12" style="height: 325px; background: #E9ECEF;"><center><img src="<?php echo $params[0]['imagen'] ?>" class="img-fluid" style="height: 285px;" alt="Image not found"></center></div>
            <div class="col-md-6 col-sm-12 col-12 bg-dark text-white shadow-lg border-bottom border-secondary" style="height: 325px; background: #E9ECEF;">
            <form action="confirmation-page.php?id=<?php echo $_GET['id'] ?>" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Cantidad de entradas a reservar: </label>
                <select class="form-control" id="exampleFormControlSelect1" name="select">
                    <?php 
                        $j = $params[0]['cant_max_reservas'];
                        if($j > $params[0]['cant_reservas_disp']) $j = $params[0]['cant_reservas_disp'];

                        for ($i=1; $i <= $j ; $i++) { 
                            echo '<option>' . $i . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Dirección de email:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" name="mail" required>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre del Titular de las reservas:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name"  required>
            </div>
            <button class="btn btn-outline-primary" type="submit">Reservar!</button>
            </form>
            </div>
            <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
        <div class="row"> 
            <div class="col-md-1 col-sm-0 col-0"></div>
            <div class="col-md-10 col-sm-12 col-12 bg-dark" style="max-height:max-content;">
            <div class="col-md-3 col-sm-12 col-12">
                <span class="badge badge-pill badge-primary d-block">Tipo de Evento: <?php echo $params[0]['tipo'] ?></span>
                <br>
                <span class="badge badge-pill badge-primary d-block">Fecha: <?php echo $params[0]['fecha'] ?> </span>
                <br>
                <span class="badge badge-pill badge-primary d-block">Organizador: <?php echo $params[0]['nombre'] ?></span>
                <br>
                <span class="badge badge-pill badge-primary d-block">Ubicación: <?php echo $params[0]['ubicacion'] ?></span>
            </div>
            <div class="col-md-9 col-sm-12 col-12 bg-light h-100"><center><h5>Descripción</h5></center><hr> <?php echo $params[0]['descripcion'] ?></div>
            </div>
            <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
        <div class="row align-bottom">
        <div class="col-md-1 col-sm-0 col-0"></div>
            <footer class="col-md-10 col-sm-12 col-12 bg-dark shadow-lg text-light border-top border-secondary rounded-bottom"> &copy Propiedad de Matías Cermak</footer>
        </div>   
        
    </div>
</body>
</html>
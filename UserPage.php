<?php
session_start();
?>
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

<body>
    <?php
    include "php/globalFunctions.php";
    include "php/userPage.php";
    ?>
    <!-- Bootstrap Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <div class="container-fluid h-100">
        <?php
        entry();
        printNavbar();
        ?>
        <div class="row">
        <div class="col-md-1 col-sm-0 col-0"></div>
        <div class="col-md-5 col-sm-12 col-12" style="background: #E9ECEF;">        
        <!-- Button trigger modal -->
            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            Crear evento
            </button></center>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="confirmation-page-event.php?idorg=<?php echo $_SESSION['idorg'] ?>" method="post">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="titulo" required>
                        </div>
                        <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo de Evento</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="tipoev" required>
                                <?php showTypes() ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cupo</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="cupo" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cantidad de Reservas por persona</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="resper" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Imagen(url)</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="img" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ubicación</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="ubi" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descripción</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="start">Fecha Evento: </label>
                            <input type="date" id="start" name="fechaev"
                                value="<?php echo date("Y-m-d") ?>"
                                min="<?php echo date("Y-m-d") ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="start">Fecha limite de Inscripción: </label>
                            <input type="date" id="start" name="fechalim"
                                value="<?php echo date("Y-m-d") ?>"
                                min="<?php echo date("Y-m-d") ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
            </div>    
        </div>
        <div class="col-md-5 col-sm-12 col-12" style="background: #E9ECEF;">
        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBdrop">
            Eliminar eventos
            </button></center>
            <!-- Modal -->
            <div class="modal fade" id="staticBdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Eventos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="confirmation-page-event-delete.php" method="post">
                    <?php showEvents() ?>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-0 col-0"></div>
        </div>  
        <div class="row">
        <div class="col-md-1 col-sm-0 col-0"></div>
        <div class="col-md-5 col-sm-12 col-12 border" style="background: #E9ECEF;">
        <center><h5> Reservas Confirmadas </h5></center>
            <hr>
            <?php showReservationsConfirmed(); ?>
        </div>   
        <div class="col-md-5 col-sm-12 col-12 border" style="background: #E9ECEF;">
            <center><h5> Reservas No Confirmadas </h5></center>
            <hr>
            <?php showReservationsUnconfirmed(); ?>
        </div>
        <div class="col-md-1 col-sm-0 col-0"></div> 
        </div>
        
        </div>
        <div class="row align-bottom">
        <div class="col-md-1 col-sm-0 col-0"></div>
            <footer class="col-md-10 col-sm-12 col-12 bg-dark shadow-lg text-light border-top border-secondary rounded-bottom"> &copy Propiedad de Matías Cermak</footer>
        </div> 
    </div>
</body>
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
    <!-- Includes de Php esenciales -->
    <?php
    include "php/IndexFunctions.php";
    include "php/globalFunctions.php";
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
        ?>
    
        <div class="row bg-secondary">
           <?php
                bannerCardViewer($conn);
           ?>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-0 col-0"></div>
            <div class="col-md-10 col-sm-12 col-12 bg-dark rounded shadow">
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Filtrar
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form method="get">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="">
                                <label class="form-check-label" for="inlineRadio">Todos</label>
                            </div>
                            <?php
                            connect($conn);
                            $data = $conn->query('SELECT tipo, id_tipo FROM tipo_evento');
                            foreach ($data as $row) {
                                echo '<div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" value="' . $row['id_tipo'] .  '">
                            <label class="form-check-label" for="inlineRadio"> ' . $row['tipo'] . '</label>
                        </div>';
                            }
                            ?>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
        <div class="row" id="card-section">
            <div class="col-md-1 col-sm-0 col-0"></div>
            <?php
            if ($_SERVER['REQUEST_URI'] == '/index.php?inlineRadioOptions=' or $_SERVER['REQUEST_URI'] == '/index.php' or $_SERVER['REQUEST_URI'] == '/index.php?' or $_SERVER['REQUEST_URI'] == '/') {
                mainCardViewer($conn);
            } else {
                filteredCardViewer($conn, $_GET['inlineRadioOptions']);
            }
            ?>
            <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-0 col-0"></div>
            <div class="col-md-10 col-sm-12 col-12 bg-dark shadow">
                <div class="col-md-3 col-sm-6 col-6 border-right border-secondary">
                    <center><button type="button" class="btn btn-outline-primary disabled" id="prevbt" >
                        Anterior
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                        </svg>
                    </button></center>
                </div>
                <div class="col-md-6 col-sm-0 col-0"></div>
                <div class="col-md-3 col-sm-6 col-6 border-left border-secondary">
                    <center><button type="button" class="btn btn-outline-primary" id="nextbt">
                        Siguiente
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"></path>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                    </button></center>
                </div>
            </div>
            <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
        <div class="row align-bottom">
            <div class="col-md-1 col-sm-0 col-0"></div>
            <footer class="col-md-10 col-sm-12 col-12 bg-dark text-light border-top border-secondary"> &copy Propiedad de Matias Cermak
            </footer>
            <div class="col-md-1 col-sm-0 col-0"></div>
        </div>
    </div>

    <script type="text/javascript" src="js/index.js"></script>

</body>

</html>
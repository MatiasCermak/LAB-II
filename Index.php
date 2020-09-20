<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <!-- JQuery, Poppper.js y javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <div class="container-fluid">

        <header class="row">
            <div class="col-md-2 col-sm-12 col-12" id="logo"><img src="images/AdventureHubLogo.png" alt="logo.png"
                    id="imglogo"></div>
            <div class="col-md-3 col-sm-0 col-0" id="buscador">
                <form>
                    <input type="text" placeholder="Buscar" style="width: 100%; height: 30px">
                </form>
            </div>
            <div class="col-md-4 col-sm-0 col-0"> Spacer</div>
            <div class="col-md-3 col-sm-0 col-0">Eres organizador? <a href="#">registrate</a> o <a href="#">inicia
                    sesión</a></div>
            <div class="col-md-0 col-sm-12 col-12">Menu acordeon</div>
        </header>
        <div class="row">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-none d-lg-block">
                            <div class="slide-box">
                                <div class="card" style="width: 18rem;">
                                    <img src="images/imagen3.png " class="card-img-top " alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Titulo.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="images/imagen2.png " class="card-img-top " alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="d-none d-md-block d-lg-none">
                            <div class="slide-box">

                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="d-none d-sm-block d-md-none">
                            <div class="slide-box">

                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-none d-lg-block">
                            <div class="slide-box">

                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-md-block d-lg-none">
                            <div class="slide-box">
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-sm-block d-md-none">
                            <div class="slide-box">
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block d-sm-none">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-sm-0 col-0">Spacer</div>
        <div class="col-md-10 col-sm-12 col-12" id="event-container">

            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100" >
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100" >
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100" >
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100" >
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100"  >
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100" >
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-12 spacer-card">
                <div class="card w-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-0 col-0">Spacer</div>
    </div>
    <div class="row align-items-end">
        <footer class="col-md-12 col-sm-12 col-12"> &copy Propiedad de Matías Cermak y Jeremías Fernandez
        </footer>
    </div>





    </div>


</body>

</html>
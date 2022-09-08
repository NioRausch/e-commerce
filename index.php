<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-commerce</title>
        <!-- CSS only -->
        <link href="index.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <body class="bg-light">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-bag-check-fill"></i>E-Commerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <span class="navbar-text">
                        <a class="nav-link active button" aria-current="page" href="#">Criar sua conta</a>
                    </span>

                    <span class="navbar-text">
                        <a class="nav-link active" aria-current="page" href="#">Entre</a>
                    </span>

                </div>

                <!--<div class="dropdown user-log">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Usuario</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Logar</a></li>
            </ul>
        </div>-->
            </div>
        </nav>
        <div class="page">
            <div class="centerdiv">

                <!-- Coluna de categorias--->
                <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-light left-menu" style="width: 280px;">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">

                        <span class="fs-4"><i class="bi bi-bookmark-fill" width="60" height="60"></i>Categorias</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <div class="accordion" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            Eletrônicos
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample"
                                        aria-expanded="false">
                                        <div class="accordion-body">
                                            <ul>
                                                <li>
                                                    <a href="#" class="nav-link text-dark">
                                                        <i class="bi bi-phone" width="16" height="16"></i>
                                                        Celulares e smartphones
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="nav-link text-dark">
                                                        <i class="bi bi-tv" width="16" height="16"></i>
                                                        Tv e vídeos
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- ########################### -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Casa
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul>
                                                <li>
                                                    <a href="#" class="nav-link text-dark">
                                                        <i class="bi bi-alarm" width="16" height="16"></i>
                                                        Elétrodomésticos
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="nav-link text-dark">
                                                        <i class="bi bi-box" width="16" height="16"></i>
                                                        Móveis e decorações
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                    </ul>
                </div>

                <!-- Exibição de produtos--->
                <div class="produtos">
                    <div class="row produto">
                        <img class="produto-imagem" src="res/teste.jpg">
                        <div class="descricao">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
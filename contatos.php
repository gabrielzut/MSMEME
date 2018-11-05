<!doctype html>
<html lang="en" style="height: 100%">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link rel="stylesheet" type="text/CSS" href="estilo.css">
    <title>MSMEME</title>
    <?php header('Content-Type: text/html; charset=utf-8');?>
</head>

<body class="bg-light mh-100">
    <?php
    session_start();
    if(!(isset($_SESSION['email']) && isset($_SESSION['password']))){
      header('location:index.php?msg=erro');
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand" href="#">
            <img src="logo.png" width="120" height="33" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Contatos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Minha conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sair.php">Sair</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa..." aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </ul>
        </div>
    </nav>
    <div class="container-fluid py-5 px-5 bg-dark text-white">
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <p class="mt-1"><img src="perfil.png" class="rounded border border-success status rounded imgperfil" width="100px"></p>
                </div>
                <div class="col-md-10 col-xs-12">
                    <h1><?php echo $_SESSION['nickname'];?></h1>
                    <h5><?php echo $_SESSION['frase'];?></h5>
                </div>
            </div>
        </div>
        <div class="text-right">
            
        </div>
    </div>
    <div class="lista mh-100">
        <div class="container-fluid pt-1 px-5 bg-light mh-100">
            <div class="container text-center text-md-left mh-100">
                <div class="row contatos">
                    <div class="col-md-1 col-xs-12">
                        <p><img src="perfil.png" class="rounded border border-success status rounded mt-3" width="40px"></p>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <h4 class="mt-2">Nickname</h4>
                        <h6>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                            a força" - Meu amigo robso</h6>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row contatos">
                    <div class="col-md-1 col-xs-12">
                        <p><img src="perfil.png" class="rounded border border-success status rounded mt-3" width="40px"></p>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <h4 class="mt-2">Nickname</h4>
                        <h6>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                            a força" - Meu amigo robso</h6>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row contatos">
                    <div class="col-md-1 col-xs-12">
                        <p><img src="perfil.png" class="rounded border border-success status rounded mt-3" width="40px"></p>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <h4 class="mt-2">Nickname</h4>
                        <h6>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                            a força" - Meu amigo robso</h6>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row contatos">
                    <div class="col-md-1 col-xs-12">
                        <p><img src="perfil.png" class="rounded border border-success status rounded mt-3" width="40px"></p>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <h4 class="mt-2">Nickname</h4>
                        <h6>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                            a força" - Meu amigo robso</h6>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row contatos">
                    <div class="col-md-1 col-xs-12">
                        <p><img src="perfil.png" class="rounded border border-success status rounded mt-3" width="40px"></p>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <h4 class="mt-2">Nickname</h4>
                        <h6>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                            a força" - Meu amigo robso</h6>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row contatos">
                    <div class="col-md-1 col-xs-12">
                        <p><img src="perfil.png" class="rounded border border-success status rounded mt-3" width="40px"></p>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <h4 class="mt-2">Nickname</h4>
                        <h6>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                            a força" - Meu amigo robso</h6>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark">
        <div class="container">
            <span class="text-white">
                Teste.
            </span>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
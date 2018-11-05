<!doctype html>
<html lang="en">

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

<body class="bg-light">
    <?php
    session_start();
    if(!(isset($_SESSION['email']) && isset($_SESSION['password']))){
      header('location:index.php?msg=erro');
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand" href="contatos.php">
            <img src="logo.png" width="120" height="33" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="contatos.php">Contatos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Minha conta</a>
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
    <div class="container p-5">
        <div class="row mb-5 text-center text-md-left">
            <div class="col-md-2 col-xs-12">
                <p class="mt-1"><img src="perfil.png" class="rounded border border-success status rounded imgperfil" width="100px"></p>
            </div>
            <div class="col-md-10 col-xs-12">
                <h1>Nickname</h1>
                <h5>"Cavalo dado até a água mole avisa amigo é desconfia olha os olho por olho dente por espeto faz
                    a força" - Meu amigo robso</h5>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <h3>Informações de usuário</h3>
        </div>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <form>
                    <div class="form-group">
                        <label for="nomeusuario" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeusuario" placeholder="Nome de usuário">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-xs-12 aligncentro">
                <button type="button" class="btn btn-success btn-lg btn-block">Enviar</button>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <h3>Alterar senha</h3>
        </div>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <form>
                    <div class="form-group">
                        <label for="senhaantiga" class="col-form-label">Senha antiga:</label>
                        <input type="password" class="form-control" id="senhaantiga" placeholder="Senha antiga">
                    </div>
                    <div class="form-group">
                        <label for="senhanova" class="col-form-label">Senha nova:</label>
                        <input type="password" class="form-control" id="senhanova" placeholder="Senha nova">
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-xs-12 aligncentro">
                <button type="button" class="btn btn-success btn-lg btn-block">Enviar</button>
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
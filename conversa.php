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
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-md-2 bg-light border border-dark text-center y-3">
                <div class="row">
                    <div class="col-4 col-md-12 conversas">
                        <div class="contatos py-2">
                            <img src="perfil.png" class="img-fluid rounded border border-success status rounded" width="100px">
                            <h4 class="mt-2">Nickname</h4>
                            <a href="">Ver contato</a>
                        </div>
                        <hr>
                    </div>
                    <div class="col-4 col-md-12 conversas">
                        <div class="contatos py-2">
                            <img src="perfil.png" class="img-fluid rounded border border-danger status rounded" width="100px">
                            <h4 class="mt-2">Nickname</h4>
                            <a href="">Ver contato</a>
                        </div>
                        <hr>
                    </div>
                    <div class="col-4 col-md-12 conversas">
                        <div class="contatos py-2">
                            <img src="novaConversa.png" class="img-fluid rounded border border-primary status rounded"
                                width="100px">
                            <h4 class="mt-2">Nova conversa</h4>
                            <br>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-10 p-3 col-xs-12 bg-white mensagens">
                <div class="row">
                    <div class="col mb-3">
                        <p><b>Você</b> diz:</p>
                        <p class="ml-3">eae vei blz kkk</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p><b>Lorem Ipsum</b> diz:</p>
                        <p class="ml-3">blz man e ae como ta a kebrada</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p><b>Você</b> diz:</p>
                        <p class="ml-3"><img src="meme.png" width="200px"></img></p>
                    </div>
                </div>
                <div class="row campoMensagem">
                    <div class="col-12">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn"><img src="icons/bold.png" width="32px"></button>
                            <button type="button" class="btn"><img src="icons/italic.png" width="32px"></button>
                            <button type="button" class="btn"><img src="icons/under.png" width="32px"></button>
                            <button type="button" class="btn"><img src="icons/strike.png" width="32px"></button>
                            <button type="button" class="btn"><img src="icons/emote.png" width="32px"></button>
                            <button type="button" class="btn"><img src="icons/image.png" width="32px"></button>
                        </div>
                    </div>
                    <div class="col-md-10 col-12">
                        <textarea class="form-control my-2" rows="3" ></textarea>
                    </div>
                    <div class="col aligncentro">
                        <button type="submit" class="btn btn-lg">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer bg-dark">
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
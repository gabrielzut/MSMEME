<!doctype html>
<html lang="en" class="pagina100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link rel="stylesheet" type="text/CSS" href="estilo.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>

    <title>MSMEME</title>
    <?php header('Content-Type: text/html; charset=utf-8');?>
</head>

<body class="bg-light pagina100">
    <?php
    session_start();
    if(!(isset($_SESSION['email']) && isset($_SESSION['password']))){
        header('location:index.php?msg=erro');
        exit;
    }
    if(!(isset($_POST['emailConversa']))){
        header('location:contatos.php');
        exit;
    }
    echo "<div style='display:none;' id='emailConversa'>" . $_POST['emailConversa'] . "</div>";
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
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-light text-center contatoConversa">
                <div class="contatos py-4">
                    <img src="perfil.png" class="img-fluid rounded border border-success status rounded" width="100px">
                    <h4 class="mt-2">Nickname</h4>
                    <a href="">Ver contato</a>
                </div>
                <hr>
            </div>
            <div class="col-md-10 col-xs-12 bg-white mensagens">
                <div class="container-fluid">
                    <div class="listaMensagens">
                        <div class="row mb-3">
                            <div class="col">
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
                        <textarea id="txArea" class="form-control my-2" rows="3" ></textarea>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
<script>
    $("#txArea").emojioneArea({
        pickerPosition:"top"
    });
</script>
</html>
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

    <script src="jquery-3.3.1.min.js"></script>

    <title>MSMEME</title>
    <?php header('Content-Type: text/html; charset=utf-8');?>

    <?php require 'getPedidos.php'?>
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
        </div>
    </nav>
    <div class="container-fluid py-5">
        <div class="container text-center pb-4">
            <h1 class="text-center mb-3">Pedidos de amizade</h1>
            <button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#modalAdicionar">
                Adicionar amigo
            </button>
            <?php 
                $pedidos = getPedidos();
                $numPedidos = count($pedidos);

                if($numPedidos == 0){
                    echo "<h4>Você não tem pedidos de amizade pendentes!</h4>";
                }
                for($i=0;$i<$numPedidos;$i++){
                    echo "
                        <div class='card w-100 my-2'>
                            <div class='card-body'>
                                <div class='row text-center text-md-left'>
                                    <div class='col-12 col-md-9'>
                                        <h3 class='card-title'>" . $pedidos[$i]['nickname'] . "</h3>
                                    </div>
                                    <div class='col-12 col-md-3'>
                                        <form method='POST' action='aceitarPedido.php'>
                                            <input type='hidden' id='emailPedido' name='emailPedido' value='" . $pedidos[$i]['email'] . "'>
                                            <button class='btn btn-success my-1' type='submit' name='envio' value='1'>Aceitar</button>
                                            <button class='btn btn-danger my-1' type='submit' name='envio' value='0'>Rejeitar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
            ?>
            <a href="contatos.php"><button class="btn btn-success my-3">Voltar</button></a>
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
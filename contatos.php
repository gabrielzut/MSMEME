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

    <script src="jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        $(window).on('load',function(){
            $('#modalErro').modal('show');
            $('#modalEnvio').modal('show');
        });
        $(document).ready(function(){
            $('#formImagem').on('change', "input#imagem", function (e) {
                e.preventDefault();
                $("#formImagem").submit();
            });
        });
    </script>

    <title>MSMEME</title>
    <?php header('Content-Type: text/html; charset=utf-8');?>
</head>

<body class="bg-light pagina100">
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
    <div class="container-fluid py-4 bg-dark text-white">
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <form id="formImagem" action="alterarImagem.php" method="POST" enctype="multipart/form-data">
                        <label for="imagem">
                            <p class="mt-1"><img src="<?php echo "./img/" . $_SESSION['imagem']?>" class="rounded border border-success status rounded imgperfil bg-white" width="100px" height="100px"></p>
                        </label>

                        <input id="imagem" name="imagem" type="file">
                    </form>
                </div>
                <div class="col-md-10 col-xs-12">
                    <h1><?php echo $_SESSION['nickname'];?></h1>
                    <h5><?php echo $_SESSION['frase'];?></h5>
                </div>
            </div>
            <div class="text-center text-md-right">
                <button type="button" class="btn btn-success mr-2 mb-2" data-toggle="modal" data-target="#modalAdicionar">
                    Adicionar amigo
                </button>
                <button type="button" class="btn btn-success mb-2">
                    Pedidos de amizade <span class="badge badge-light" data-toggle="modal" data-target="#modalPedidos">0</span>
                </button>
            </div>
        </div>
    </div>
    <div class="lista">
        <div class="container-fluid pt-1 px-5 bg-light">
            <div class="container text-center text-md-left">
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
    <form action="pedidoAmizade.php" method="POST">
        <div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="modalAdicionar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Adicionar amigo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" class="col-form-label">Email:</label>
                            <input type="emailpedido" class="form-control" id="emailpedido" placeholder="Email do amigo a adicionar" name="emailpedido">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="<?php 
        if(isset($_GET['msg'])){
          if($_GET['msg'] == "erro"){
            echo "modalErro";
          }
          if($_GET['msg'] == "envio"){
            echo "modalEnvio";
          }
        }else{
            echo "modalSemErro";
        }
    ?>" tabindex="-1" role="dialog" aria-labelledby="modalErro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Aviso</h5>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php
                                if(isset($_GET['msg'])){
                                    if($_GET['msg'] == "erro"){
                                        echo "Não foi possível adicionar amigo! Vocês já são amigos ou já existe um pedido de amizade pendente.";
                                    }
                                    if($_GET['msg'] == "envio"){
                                        echo "Pedido de amizade enviado!";
                                    }
                                }
                            ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
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
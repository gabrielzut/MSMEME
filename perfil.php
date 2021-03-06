<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="icon" href="favicon.png" />
    <script src="js/uploadImagem.js"></script>

    <title>MSMEME</title>
    <?php header('Content-Type: text/html; charset=utf-8');?>

    <script src="uploadImagem.js"></script>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="contatos.php">Contatos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Minha conta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="php/sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container perfil p-5">
        <div class="row">
            <div class="col-12">
                <?php 
                    if(isset($_GET['msg'])){
                        if($_GET['msg'] == "erroimagem"){
                            echo "<div class='alert alert-danger' role='alert'> Erro na alteração de imagem! </div>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row mb-5 text-center text-md-left">
            <div class="col-md-2 col-xs-12">
                <form id="formImagem" action="php/alterarImagem.php" method="POST" enctype="multipart/form-data">
                    <label for="imagem">
                        <p class="mt-1"><img src="<?php echo "./img/" . $_SESSION['imagem']?>" class="rounded border border-success status rounded imgperfil bg-white" width="100px" height="100px"></p>
                    </label>

                    <input id="imagem" name="imagem" type="file" accept="image/*">
                </form>
            </div>
            <div class="col-md-10 col-xs-12">
                <h1><?php echo $_SESSION['nickname'];?></h1>
                <h5><?php echo $_SESSION['frase'];?></h5>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <h3>Alterar informações de usuário</h3>
        </div>
        <form method="POST" action="php/alterarUsuario.php">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="form-group">
                        <label for="nickname" class="col-form-label">Apelido:</label>
                        <input type="text" class="form-control" id="nickname" placeholder="Apelido" name="nickname" maxlength="60" value="<?php echo $_SESSION['nickname'];?>">
                    </div>
                    <div class="form-group">
                        <label for="frase" class="col-form-label">Status:</label>
                        <input type="text" class="form-control" id="frase" placeholder="Frase" name="frase" maxlength="140" value="<?php echo $_SESSION['frase'];?>">
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 aligncentro">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Enviar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="row mt-5">
            <h3>Alterar senha</h3>
        </div>
        <form method="POST" action="php/alterarSenha.php">
            <div class="row">
                <div class="col-12">
                    <?php 
                        if(isset($_GET['msg'])){
                            if($_GET['msg'] == "errosenha"){
                                echo "<div class='alert alert-danger' role='alert'> Erro na alteração! </div>";
                            }
                            if($_GET['msg'] == "sucessosenha"){
                                echo "<div class='alert alert-success' role='alert'> Senha alterada com sucesso! </div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-8 col-xs-12">
                    <div class="form-group">
                        <label for="antiga" class="col-form-label">Senha antiga:</label>
                        <input type="password" class="form-control" id="antiga" name="antiga" placeholder="Senha antiga">
                    </div>
                    <div class="form-group">
                        <label for="nova" class="col-form-label">Nova senha:</label>
                        <input type="password" class="form-control" id="nova" name="nova" placeholder="Nova senha">
                    </div>
                    <div class="form-group">
                        <label for="novaconfirmar" class="col-form-label">Confirmar nova senha:</label>
                        <input type="password" class="form-control" id="novaconfirmar" name="confirmar" placeholder="Confirmar nova senha">
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 aligncentro">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <footer class="bg-dark">
        <div class="container">
            <span class="text-white">
                Grupo: Caio, Carlos Silva, Fabricio Junior, Gabriel, Vinícius Perna.
            </span>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>

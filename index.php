<!doctype html>
<html lang="en" class="login">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
  <title>Bem vindo ao MSMEME!</title>
  <?php header('Content-Type: text/html; charset=utf-8');?>
</head>

<body class="login">
  <?php
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
      header('location:contatos.php');
    }
  ?>
  <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-12">
        <img class="img-fluid" src="logo.png">
        <?php if(isset($_GET['msg'])){
          if($_GET['msg'] == "erro"){
            echo "<div class='alert alert-danger' role='alert'> Erro no login! </div>";
          }
          if($_GET['msg'] == "sucesso"){
            echo "<div class='alert alert-success' role='alert'>Cadastro efetuado com sucesso!</div>";
          }
          if($_GET['msg'] == "errocadastro"){
            echo "<div class='alert alert-danger' role='alert'> Erro no cadastro! </div>";
          }
        }
        ?>
        <form action="login.php" method="POST">
          <input type="email" class="form-control mt-3 formlogin" id="email" placeholder="Email" name="email">
          <input type="password" class="form-control formlogin" id="password" placeholder="Senha" name="password">
          <div class="text-center">
            <button type="submit" class="btn btn-success mt-4 w-25">Entrar</button>
            <button type="button" class="btn btn-success mt-4 w-25" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button>
          </div>
        </form>
        <form action="cadastro.php" method="POST">
          <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Cadastro</h5>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="username" class="col-form-label">Nome de usuário:</label>
                    <input type="text" class="form-control" id="username" placeholder="Nome de usuário" name="username">
                  </div>
                  <div class="form-group">
                    <label for="emailcadastro" class="col-form-label">E-mail:</label>
                    <input type="email" class="form-control" id="emailcadastro" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="senhacadastro" class="col-form-label">Senha:</label>
                    <input type="password" class="form-control" id="senhacadastro" placeholder="Senha" name="password">
                  </div>
                  <div class="form-group">
                    <label for="confirmar" class="col-form-label">Confirmar senha:</label>
                    <input type="password" class="form-control" id="confirmar" placeholder="Confirmar senha" name="confirmar">
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
<!doctype html>
<html lang="en" class="conversa100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
    <script src="lib/jquery-3.3.1.min.js"></script>
    <link rel="icon" href="favicon.png" />

    <script src="js/atualizaConversa.js"></script>

    <title>MSMEME</title>
    <?php header('Content-Type: text/html; charset=utf-8');?>

    <?php require "php/conn.php";
        session_start();
        if(!(isset($_SESSION['email']) && isset($_SESSION['password']))){
            header('location:index.php?msg=erro');
            exit;
        }
        if(!(isset($_POST['emailConversa']))){
            header('location:contatos.php');
            exit;
        }
        if(isset($_POST['envio'])){
            header('Content-Type: text/html; charset=utf-8');

            $emailRecebimento = $_POST["emailConversa"];

            $conexao = conectar();

            if($_POST['envio'] == "texto"){
                $conteudo = $_POST["conteudo"];
                $sql = "INSERT INTO mensagem (emailEnvio, emailRecebimento, conteudoMensagem, tipoMensagem) VALUES ('" . $_SESSION['email'] . "','" . $emailRecebimento . "','" . $conteudo . "',0);";
                $resultado = executar_sql($conexao, $sql);
            }else if($_POST['envio'] == "imagem"){
                $imagem = $_FILES['imagem'];

                if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){
                    $nomeTemp = $imagem['tmp_name'];
                    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

                    $sqlId = "SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'mensagem'";
                    $resultado = executar_sql($conexao, $sqlId);
                    $arrayResultado = lerResultado($resultado);
                    $id = $arrayResultado[0]['auto_increment'];

                    $conteudo = $id . "." . $extensao;

                    $sql = "INSERT INTO mensagem (emailEnvio, emailRecebimento, conteudoMensagem, tipoMensagem) VALUES ('" . $_SESSION['email'] . "','" . $emailRecebimento . "','" . $conteudo . "',1);";

                    move_uploaded_file($nomeTemp, './imgConversa/' . $conteudo);
                    $resultado = executar_sql($conexao, $sql);
                }
                else{
                    echo "<script> alert('Arquivo Inválido. Selecione uma Imagem.'); </script>";
                }

                
            }
            
        }
    ?>
</head>

<body class="bg-light conversa100">
    <?php
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
                    <a class="nav-link" href="php/sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="paginaConversa">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 bg-light text-center contatoConversa">
                    <div class="py-4" id="contato">
                        
                    </div>
                    <hr>
                </div>
                <div class="col-md-10 col-xs-12 bg-white mensagens">
                    <div class="container-fluid">
                        <div class="listaMensagens" id="mensagens">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <form id="formConversa" action="conversa.php" method="POST" enctype="multipart/form-data">
                        <div class="row campoMensagem">
                            <div class="col-12">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn" id="bold"><img src="icons/bold.png" width="32px"></button>
                                    <button type="button" class="btn" id="italic"><img src="icons/italic.png" width="32px"></button>
                                    <button type="button" class="btn" id="under"><img src="icons/under.png" width="32px"></button>
                                    <button type="button" class="btn" id="strike"><img src="icons/strike.png" width="32px"></button>
                                    <button type="button" class="btn" id="btnImagem" name="btnImagem"><img src="icons/image.png" width="32px"></button>
                                    <button type="button" class="btn" id="emoji" data-container="body" data-toggle="popover" data-html="true" data-placement="top" title="<div>Emojis</div>" data-content="
                                        <div class='container'>
                                            <div id='carouselEmojis' class='carousel slide' data-ride='carousel'>
                                                <div class='carousel-inner'>
                                                    <div class='carousel-item active'>
                                                        <div class='emojis'>
                                                            <button type='button' class='btn btn-sm'>😁</button>
                                                            <button type='button' class='btn btn-sm'>😂</button>
                                                            <button type='button' class='btn btn-sm'>😃</button>
                                                            <button type='button' class='btn btn-sm'>😄</button>
                                                            <button type='button' class='btn btn-sm'>😅</button>
                                                            <button type='button' class='btn btn-sm'>😆</button>
                                                            <button type='button' class='btn btn-sm'>😉</button>
                                                            <button type='button' class='btn btn-sm'>😊</button>
                                                            <button type='button' class='btn btn-sm'>😋</button>
                                                            <button type='button' class='btn btn-sm'>😌</button>
                                                            <button type='button' class='btn btn-sm'>😍</button>
                                                            <button type='button' class='btn btn-sm'>😏</button>
                                                            <button type='button' class='btn btn-sm'>😒</button>
                                                            <button type='button' class='btn btn-sm'>😓</button>
                                                            <button type='button' class='btn btn-sm'>😔</button>
                                                            <button type='button' class='btn btn-sm'>😖</button>
                                                            <button type='button' class='btn btn-sm'>😘</button>
                                                            <button type='button' class='btn btn-sm'>😚</button>
                                                            <button type='button' class='btn btn-sm'>😜</button>
                                                            <button type='button' class='btn btn-sm'>😝</button>
                                                        </div>
                                                    </div>
                                                    <div class='carousel-item'>
                                                        <div class='emojis'>
                                                            <button type='button' class='btn btn-sm'>😞</button>
                                                            <button type='button' class='btn btn-sm'>😠</button>
                                                            <button type='button' class='btn btn-sm'>😡</button>
                                                            <button type='button' class='btn btn-sm'>😢</button>
                                                            <button type='button' class='btn btn-sm'>😣</button>
                                                            <button type='button' class='btn btn-sm'>😤</button>
                                                            <button type='button' class='btn btn-sm'>😥</button>
                                                            <button type='button' class='btn btn-sm'>😨</button>
                                                            <button type='button' class='btn btn-sm'>😩</button>
                                                            <button type='button' class='btn btn-sm'>😪</button>
                                                            <button type='button' class='btn btn-sm'>😫</button>
                                                            <button type='button' class='btn btn-sm'>😭</button>
                                                            <button type='button' class='btn btn-sm'>😰</button>
                                                            <button type='button' class='btn btn-sm'>😱</button>
                                                            <button type='button' class='btn btn-sm'>😲</button>
                                                            <button type='button' class='btn btn-sm'>😳</button>
                                                            <button type='button' class='btn btn-sm'>😵</button>
                                                            <button type='button' class='btn btn-sm'>😷</button>
                                                            <button type='button' class='btn btn-sm'>👆</button>
                                                            <button type='button' class='btn btn-sm'>👇</button>
                                                        </div>
                                                    </div>
                                                    <div class='carousel-item'>
                                                        <div class='emojis'>
                                                            <button type='button' class='btn btn-sm'>👈</button>
                                                            <button type='button' class='btn btn-sm'>👉</button>
                                                            <button type='button' class='btn btn-sm'>👊</button>
                                                            <button type='button' class='btn btn-sm'>👋</button>
                                                            <button type='button' class='btn btn-sm'>👌</button>
                                                            <button type='button' class='btn btn-sm'>👍</button>
                                                            <button type='button' class='btn btn-sm'>👎</button>
                                                            <button type='button' class='btn btn-sm'>👏</button>
                                                            <button type='button' class='btn btn-sm'>❤</button>
                                                            <button type='button' class='btn btn-sm'>🐵</button>
                                                            <button type='button' class='btn btn-sm'>🍉</button>
                                                            <button type='button' class='btn btn-sm'>🥔</button>
                                                            <button type='button' class='btn btn-sm'>🍔</button>
                                                            <button type='button' class='btn btn-sm'>🍕</button>
                                                            <button type='button' class='btn btn-sm'>🎄</button>
                                                            <button type='button' class='btn btn-sm'>🏥</button>
                                                            <button type='button' class='btn btn-sm'>⛪</button>
                                                            <button type='button' class='btn btn-sm'>🔝</button>
                                                            <button type='button' class='btn btn-sm'>✅</button>
                                                            <button type='button' class='btn btn-sm'>❌</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a id='prev' class='carousel-control-prev' href='#carouselEmojis' role='button' data-slide='prev'>
                                                    <span class='carousel-control-prev-icon mr-5' aria-hidden='true'></span>
                                                    <span class='sr-only'>Anterior</span>
                                                </a>
                                                <a id='next' class='carousel-control-next' href='#carouselEmojis' role='button' data-slide='next'>
                                                    <span class='carousel-control-next-icon ml-5' aria-hidden='true'></span>
                                                    <span class='sr-only'>Próxima</span>
                                                </a>
                                                </div>
                                        </div>
                                    "><img src="icons/emote.png" width="32px"></button>
                                    <input type="file" id="imagem" name="imagem" accept="image/*">
                                </div>
                            </div>
                            <input type="hidden" id="emailConversa" name="emailConversa" value="<?php echo $_POST['emailConversa'] ?>">
                            <div class="col-md-9 col-12">
                                <textarea id="txArea" name="conteudo" class="form-control my-2" rows="3" ></textarea>
                            </div>
                            <div class="col aligncentro">
                                <button id="btnEnvio" type="submit" name="envio" value="texto" class="btn btn-lg envio">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="bg-dark">
            <div class="container">
                <span class="text-white">
                    Grupo: Caio, Carlos Silva, Fabricio Junior, Gabriel, Vinícius Perna.
                </span>
            </div>
        </footer>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>

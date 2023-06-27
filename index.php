<?php

    session_start();
    include_once("php/paginas.php");

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    }

    if (isset($_SESSION['logado'])) {
        $logado = $_SESSION['logado'];
    }
    else {
        $logado = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Modals -->
    <!-- Modal Login -->
    <div id="modalLogin" class="modal">
        <div class="row" id="corpoModal">
            <form action="login.php" method="GET" class="col s12">
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <h2>Faça Login: (Não Funcional)</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <label for="usuario">Nome de Usuário:</label>
                        <input type="text" name="usuario" id="usuario" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <label for="password">Senha:</label>
                        <input type="password" name="senha" id="senha" class="validate">
                    </div>
                </div>
                <div class="row" id="rowBtnInput">
                    <div class="input-field col">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

    <!-- Modal Perfil -->
    <div id="modalPerfil" class="modal">
        <div class="row">
            
        </div>
    </div>

    <!-- Navbar -->
    <nav>
        <div class="nav-wrapper" id="navbar">
            <div id="divDireitaNav" class="right">
                <a id="botaoLogin" href="<?php if (!isset($_SESSION['logado'])) {echo ('#modalLogin');} else {echo('#modalPerfil');} ?>" class="waves-effect waves-light modal-trigger"><img id="imgPerfil" src="api/img/EvwoCc1XYAEUIzR.jfif" alt="" class="circle responsive-img"></a>
            </div>
            <ul id="nav-mobile" class="left">
                <li><a href="?pagina=img">Imagem de Perfil</a></li>
                <li><a href="?pagina=produtos">Produtos</a></li>
            </ul>
        </div>
    </nav>

    <!-- Corpo do Site -->
    <div class="container">
        <?php
            if (isset($pagina)) {
                switch ($pagina) {
                    case 'img':
                        adcImgUsuario($logado);
                        break;
                    
                    case 'produtos':
                        todosProdutos();
                        break;
                    
                    default:
                        
                        break;
                }
            }
            else {
                // pagina muito maneira de apresentação aqui
                pagInicial();
            }
        ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
</body>
</html>
<?php

function pagInicial()
{
    $botaoLogin = "'botaoLogin'";
    $botaoImg = "'linkBtnImg'";
    $botaoProd = "'linkBtnProd'";
    echo ('
    <div class="row">
        <div class="col">
            <h1>Boas vindas ao site bobo!!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col"><h3>Escolha um de nossos serviços:</h3></div>
    </div>
    <div class="row row-centro">
        <div class="col">
            <button class="waves-effect waves-light btn-large" onclick="document.getElementById('. $botaoImg .').click()"><a id="linkBtnImg" href="?pagina=img"><i class="material-icons left">add_a_photo</i>Envio de Imagens</a></button>
        </div>
        <div class="col">
            <button class="waves-effect waves-light btn-large" onclick="document.getElementById('. $botaoProd .').click()"><a id="linkBtnProd" href="?pagina=produtos"><i class="material-icons left">add_shopping_cart</i>Lista de Produtos</a></button>
        </div>
    </div>
    <div class="row row-centro">
        <div class="col">
            <button class="waves-effect waves-light btn-large" onclick="document.getElementById('. $botaoLogin .').click()"><i class="material-icons left">account_circle</i>Perfil</button>
        </div>
    </div>');
}

function todosProdutos()
{

    echo ('
    <div class="row">
        <div class="col">
            <h2>Nossos Produtos:</h2>
        </div>
    </div>
    <div id="produtos">
        
    </div>
    <script src="scriptProdutos.js"></script>
    ');
}

function infoProd()
{

    echo ('');
}

function adcImgUsuario($logado)
{
    $usuario = "";

    if ($logado != "") {
        $usuario = $logado;
    }

    if (isset($_SESSION['msg'])) {
        echo ("<h1>" . $_SESSION['msg'] . "</h1>");
    }

    echo ('
        <div class="row">
            <form id="formEnviarImg" method="POST" class="col s12" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <h2>Enviar Imagem:</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <label for="usuarioAdcImg">Nome de Usuário:</label>
                        <input value="' . $usuario . '" type="text" name="usuarioAdcImg" id="usuarioAdcImg" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <label for="senhaAdcImg">Senha:</label>
                        <input type="password" name="senhaAdcImg" id="senhaAdcImg" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5 offset-s3">
                        <div class="file-path-wrapper">
                            <label for="imgUserInput">Link da Imagem:</label>
                            <input class="validate" type="text" id="imgUserInput" name="imgUserInput" required>
                        </div>
                    </div>
                    <div class="input-field col s1">
                        <img hidden class="responsive-img" id="previewImgUsuario" src="#" alt="Sua Imagem de Perfil">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <textarea id="descImgUser" name="descImgUser" class="materialize-textarea"></textarea>
                        <label for="descImgUser">Breve Descrição da Imagem: (Opcional)</label>
                    </div>
                </div>
                <div class="row" id="rowBtnInput">
                    <div class="input-field col">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                
            </form>
        </div>

        <!-- div que vai exibir a resposta da API -->
        <div id="resposta">
            <h3>Resposta da Tentativa:</h3>
            <pre class="response"></pre>
        </div>

        <script>
            const imgUserInput = document.getElementById("imgUserInput");
            imgUserInput.onchange = evt => {
                const file = imgUserInput.value
                if (file != "") {
                    previewImgUsuario.src = file;
                    previewImgUsuario.removeAttribute("hidden");
                }
            }
        </script>
        <script src="scriptAddImg.js"></script>
    ');
}




?>
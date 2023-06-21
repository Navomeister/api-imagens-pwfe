<?php
    include_once("conexao.php");

    // Definir o nome de usuario e a senha
    $usuarioPermitido = 'olhos';
    $senhaPermitida = 'oculosgarrafa';



    // parte de pegar imagens
    $sql = 'SELECT * FROM produto INNER JOIN imagem_produto ON id_produto = fk_produto;';
    $result = $conn->query($sql);

    if (
        !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
        || $_SERVER['PHP_AUTH_USER'] !== $usuarioPermitido || $_SERVER['PHP_AUTH_PW'] !== $senhaPermitida
    ) {
        // se as credenciais estiverem erradas, retorna erro
        header('HTTP/1.0 401 Unauthorized');
        $response = array(
            'status' => 'error',
            'message' => 'Sem Permissão'
        );
        exit;
    } else {
        header('Acess-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Authorization, Content-type');
    
        // verificar o método de requisição
        $method = $_SERVER['REQUEST_METHOD'];
    
        // verifica o endpoint solicitado
        $endpoint = $_GET['endpoint'];
    
        // verificar os parâmetros de requisição
        $params = $_POST;
    
        // define uma resposta padrão
        $response = array(
            'status' => 'error',
            'message' => 'Resposta Padrão'
        );
    
        // verifica o método e o endpoint para executar a lógica da API
        if ($method == 'POST') {
            // verificação de conexão com o banco
            if ($conn->connect_error) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Erro de Conexão, ' . $conn->connect_error
                );
            } else {
                if ($endpoint == 'addImagem') {

                    /* Receive the RAW post data. */
                    $content = trim(file_get_contents("php://input"));

                    /* $decoded can be used the same as you would use $_POST in $.ajax */
                    $decoded = json_decode($content, true);

                    $usuario = $decoded['usuarioAdcImg'];
                    $senha = md5($decoded['senhaAdcImg']);

                    // consulta o banco
                    $sql = "SELECT * FROM usuario WHERE nome_usuario = '$usuario' AND senha_usuario = '$senha'";
                    $result = $conn->query($sql);
                    $response = array(
                        'status' => 'error',
                        'message' => 'Erro: Usuário Inexistente.'
                    );
                    
                    // verifica se o query retornou algo
                    if ($result->num_rows > 0) {
                        $itens = $result->fetch_assoc();

                        if (isset($decoded['descImgUser'])) {
                            $desc = $decoded['descImgUser'];
                        }
                        else{
                            $desc = "";
                        }

                        $sql = "INSERT INTO imagem_usuario VALUES(DEFAULT, ". $itens['id_usuario'] .", '". $decoded['imgUserInput'] ."', '$desc', NOW());";
                        $result = $conn->query($sql);

                        $imagem = array();

                        $sql = "SELECT * FROM imagem_usuario WHERE fk_usuario = ". $itens['id_usuario'];
                        $result = $conn->query($sql);

                        $i = 0;
    
                        // adicione informações ao array
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user = array(
                                'id' => $row['id_img_user'],
                                'path' => $row['path_img_user'],
                                'desc' => $row['desc_img_user']
                            );
    
                            $imagem[$i] = $user;
                            $i++;
                        }
    
                        $response = array(
                            'status' => 'success',
                            'imagem' => $imagem
                        );
                    }
                }
                elseif ($endpoint == 'cadastro') {
                    
                }
                elseif ($endpoint == 'produtos') {
                    $sql = "SELECT * FROM produto INNER JOIN imagem_produto ON id_produto = fk_produto";
                    $result = $conn->query($sql);

                    $produtos = array();

                    $i = 0;

                    while ($row = $result->fetch_assoc()) {
                        $produto = array(
                            'id' => $row['id_produto'],
                            'nome' => $row['nome_produto'],
                            'desc' => $row['desc_produto'],
                            'path_img' => $row['path_img_prod'],
                            'desc_img' => $row['desc_img_prod'],
                            'fonte_img' => $row['fonte']
                        );
                        $produtos[$i] = $produto;
                        $i++;
                    }

                    $response = array(
                        'status' => 'success',
                        'produtos' => $produtos
                    );
                }
                
                else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Erro: Endpoint não Encontrado'
                    );
                }
                    
                // fecha conexão com o banco
                $conn->close();
            }
        }
    }
    echo(json_encode($response));
?>
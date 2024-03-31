<?php
include_once("../config.php");

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do usuário foram enviados
    if(isset($_POST['usuario'])) {
        // Extrai os dados do formulário
        $usuario = $_POST['usuario'];
        
        
        
        $conexao = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);;
        
        // Verifica a conexão com o banco de dados
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }
        
        // Prepara e executa a query SQL para inserir o usuário no banco de dados
        $nome = $conexao->real_escape_string($usuario['nome']);
        $email = $conexao->real_escape_string($usuario['email']);
        $senha = $conexao->real_escape_string($usuario['password']);
        $genero = $conexao->real_escape_string($usuario['genero']);
        $cpf = $conexao->real_escape_string($usuario['cpf']);
        $senha_hash=password_hash($senha, PASSWORD_DEFAULT);
        // Query para inserir usuário
        $query = "INSERT INTO usuarios (nome, email, senha_hash, genero, cpf) VALUES ('$nome', '$email', '$senha_hash', '$genero', '$cpf')";
        
        if ($conexao->query($query) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $conexao->error;
        }
        
        // Fecha a conexão com o banco de dados
        $conexao->close();
    } else {
        echo "Dados do usuário não foram recebidos.";
    }
}



  

    function upload ($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
        try {
            $nomearquivo = basename($arquivo_destino);
            $uploadOK = 1;

            if(isset($_POST["submit"])) {
                $check = getimagesize($nome_temp);
                if($check !== false) { 
                    $_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
                    $_SESSION['type'] = "info";
                    $uploadOK = 1;
                } else {
                    $uploadOK = 0;
                    throw new Exception("O arquivo não é uma imagem!");
                }
            }
            
            // Check if file already exists
            if (file_exists($arquivo_destino)) {
              $uploadOK = 0;
              throw new Exception("Desculpe, o arquivo já existe!");
            }
            
            // Check file size
            if ($tamanho_arquivo > 5000000) {
              $uploadOK = 0;
              throw new Exception("Desculpe, mas o arquivo é muito grande");
            }
            
            // Allow certain file formats
            if($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg"
            && $tipo_arquivo != "gif" ) {
              $uploadOK = 0;
              throw new Exception("Desculpe, mas só são permitiods arquivo de imagem JPG, JPEG, PNG e GIF!");
            }
            // Check if $uploadOK is set to 0 by an error
            if ($uploadOK == 0) {
              throw new Exception("Desculpe, o arquivo não pode ser enviado!");
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {
                $_SESSION['message'] = "O arquivo ". htmlspecialchars($nomearquivo). " foi armazenado.";
                $_SESSION['type'] = "success";
              
              } else {
                throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
              }
            }
        } catch(Exception $e){
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
      }

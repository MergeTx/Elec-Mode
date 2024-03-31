<?php
ob_start();
if (isset($_POST['submit'])) {
    $secret = "6LdSZdEmAAAAADcvsv17xA36Bg7cKEuWdpTxu35T";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
    $data = file_get_contents($url);
    $row = json_decode($data, true);

    if ($row['success'] == "true") {
        echo "<script>alert('Wow you are not a robot 😲');</script>";
    } else {
        echo "<script>alert('Oops you are a robot 😡');</script>";
    }
}
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Usuários</title>
</head>

<body>
    <h1>Formulário de Cadastro de Usuários</h1>
    <form action="Cadastrar.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="usuario[nome]" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="usuario[email]" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="usuario[password]" required><br><br>

        <label for="genero">Gênero:</label><br>
        <select id="genero" name="usuario[genero]">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select><br><br>

        <label for="foto">Foto (URL):</label><br>
        <input type="file" id="foto" name="foto"><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="usuario[cpf]" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
            placeholder="000.000.000-00"><br><br>

        <div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz" required>
        </div>

        <div id="actions">
            <input type="submit" value="Cadastrar">
        </div>
    </form>

</body>

</html>
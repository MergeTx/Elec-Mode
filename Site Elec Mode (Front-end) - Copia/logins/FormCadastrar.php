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

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/global.css">
    <script src="../js/darkmodeStorage.js"></script>
    <title>Formulário de Cadastro de Usuários</title>
</head>

<body>
    <div class="containerForm">
        <div class="formAfter">
            <form action="Cadastrar.php" method="post" enctype="multipart/form-data">
                <div class="containerLogo">
                    <img src="../Logo/Logo_Preta (sem as letras).png" alt="">
                    <h3>Cadastrar</h3>
                </div>
                <div class="row">
                    <div class="formGroup">
                        <input type="text" id="nome" name="usuario[nome]" placeholder="Username" required>
                    </div>
                </div>
                <div class="row">
                    <div class="formGroup">
                        <input type="email" id="email" name="usuario[email]" placeholder="Email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="formGroup">
                        <input type="password" id="senha" name="usuario[password]" placeholder="Senha" required>
                    </div>
                </div>
                <div class="row">
                    <div class="formGroup">
                        <input type="text" id="cpf" name="usuario[cpf]" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                            placeholder="CPF"><br><br>

                        <div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz" required>
                        </div>
                    </div>
                </div>

                

                <div id="actions">
                    <div class="btnSubmit">
                        <button type="submit" value="Cadastrar">Cadastrar</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</body>

</html>
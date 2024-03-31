<?php
include("../config.php");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados" . $mysqli->error);
}

if(isset($_POST['USER']) || isset($_POST['senha'])) {

	if(strlen($_POST['USER']) == 0){
		echo "Preencha seu usuario";
		$logado = "nao";
		
	}
	else if(strlen($_POST['senha']) ==0){
		echo "Preencha sua senha";
		$logado = "nao";
		
	}
	else{
		$login = $mysqli->real_escape_string($_POST['USER']);
		$senha = $mysqli->real_escape_string($_POST['senha']);
		$sql_code = "SELECT * FROM usuarios WHERE email = '$login'";
		$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " .$mysqli->error);

		$quantidade = $sql_query->num_rows;

		if($quantidade == 1) {
			$Usuario = $sql_query->fetch_assoc();

			if(!isset($_SESSION)) {
				session_start();
			}
			if (password_verify($senha, $Usuario['senha_hash'])) {
				$_SESSION['id'] = $Usuario['id'];
				$_SESSION['nome'] = $Usuario['nome'];
				$_SESSION['foto'] = $Usuario['foto'];
				$_SESSION['senha'] = $Usuario['senha_hash'];
				$logado="ok";
				$_SESSION['email']= $Usuario['email'];
	
				header("Location: " . BASEURL);
            } 						
		}  else {
			
			$_SESSION['message'] = "Falha ao logar! Usuário ou senha incorretos";
			$_SESSION['type'] = "danger";
			$_SESSION['erro'] = "sim";
			echo "<script>";
			echo "alert('" . $_SESSION['message'] . "');";
			echo "window.location.href = '" . BASEURL . "';";
			echo "</script>";
			exit();
		}
	}
}
?>
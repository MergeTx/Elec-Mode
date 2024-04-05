
<?php


if (isset($_POST['submit'])) {
	$secret = "6LdSZdEmAAAAADcvsv17xA36Bg7cKEuWdpTxu35Tuu";
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

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="../js/darkmodeStorage.js" defer></script>
	<link rel="stylesheet" href="../Styles/global.css">
	<title>Document</title>
</head>
<body>
	
<div class="containerForm">
	<div class="formAfter">
		<form method="post" action="../inc/controla_login.php" id="loga">
			<?php if (!empty($_SESSION['message'])): ?>
				<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
					<?php echo $_SESSION['message']; ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<div class="containerLogo">
				<img src="../Logo/Logo_Preta (sem as letras).png" alt="">
				<h3>Login</h3>
			</div>
			<div class="row">
				<div class="formGroup">
					<input type="email" class="formControl" name="USER" id="USER" placeholder="Email" required>
				</div>
				<div class="formGroup">
					<input type="password" class="formControl" name="senha" id="senha" placeholder="Senha" required>
				</div>

				<div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz" required>
				</div>
			</div>


			<div id="actions" class="row">
				<div class="btnSubmit">
					<button type="submit" class="btn btn-secondary">Continuar</button>
				</div>
			</div>
			</div>
		</form>
	</div>
</div>


</body>
</html>
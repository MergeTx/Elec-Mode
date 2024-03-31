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
<script src="https://www.google.com/recaptcha/api.js"></script>

<form method="post" action="../inc/controla_login.php" id="loga">
	<?php if (!empty($_SESSION['message'])): ?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<?php echo $_SESSION['message']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>
	<div class="row"
		style="display: flex;flex-direction: row;justify-content: center; align-items: center;margin-left: 120px;margin-right: 120px">
		<div class="form-group col-md-12">
			<label for="USER"> EMAIL</label>
			<input type="email" class="form-control" name="USER" id="USER" required>
		</div>
		<div class="form-group col-md-12">
			<label for="senha"> SENHA</label>
			<input type="password" class="form-control" name="senha" id="senha" required>
		</div>

		<div class="g-recaptcha" data-sitekey="6LdSZdEmAAAAAPzie5WGn96a_YHQ_cpoIZgq0iCz" required>
		</div>
	</div>


	<div id="actions" class="row">
		<div class="col-md-12" style="display: flex;flex-direction: row;justify-content: center; align-items: center;">
			<button type="submit" class="btn btn-secondary" style="width: 800px">Continuar</button>
		</div>
	</div>
	</div>
</form>
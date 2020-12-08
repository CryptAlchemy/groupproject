<?php
include('../inc/head.php');

if(!isset($_SESSION['uid'])) {
	header('Location: /');
	exit;
}
?>
<body>
	<div class="container mt-5 d-flex justify-content-center">
		<div class="d-flex bg-light p-3 rounded">
			<div class="image">
				<img src="/assets/img/pfp/<?=$UserInfo['pfp']?>.png"  class="img-responsive" class="rounded" width="155">
			</div>
			<div class="ml-3">
				<p class="font-weight-bold h4"><?=$UserInfo['username'] ?></i></p>
				<p>Wins <?=$UserInfo['wins']?></p>
				<p>Keep up the grind and get those high scores!</p>
			</div>
		</div>
	</div>
</body>
<?php
include('../inc/head.php');

if(!isset($_SESSION['uid'])) {
	header('Location: /');
	exit;
}
?>
<body>
		<div class="container mt-5 d-flex justify-content-center">
			<div class="d-flex align-items-center">
				<div class="image"> <img src="/assets/img/pfp/<?=$UserInfo['pfp']?>.png"  class = "img-responsive"  class="rounded" width="155"> </div>
				<div class="ml-3 w-100">
					<a class="nav-item">
						<a class="text-white font-weight-bold" href="/profile.php"><?=$UserInfo['username'] ?></i></a>
					</li>
					<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
						<div class="d-flex flex-column"> 
						<div class="Wins">Wins <?=$UserInfo['wins']?>
						</span>
					</div>
			</div>
		</div>
	</div>
</body>
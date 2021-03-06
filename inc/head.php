<?php
include('config.php');

$UserInfoQuery = $conn->prepare("select * from users where id = :id");
$UserInfoQuery->bindParam(":id",$_SESSION['uid']);
$UserInfoQuery->execute();
$UserInfo = $UserInfoQuery->fetch(PDO::FETCH_ASSOC);

if(!isset($UserInfo)||count($UserInfo)==0) {
	session_destroy();
	session_unset();
	header('Location: /');
}
?>
<!DOCTYPE html>
<html>
	<title>Tic Tac Toe!</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="/assets/css/main.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
	  
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/assets/js/main.min.js"></script>
	
	<link rel="icon" type="image/png" href="/assets/img/favicon.ico" >

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</html>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand d-flex align-items-center" href="/"><img class="mr-2" width="40" src="/assets/img/favicon.png"> Tic Tac Toe!</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/leaderboard.php">Leaderboard</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<?php if(isset($_SESSION['uid'])) { ?>
				<li class="nav-item d-flex align-items-center">
					<a class="nav-link text-dark py-0" href="/profile.php"><?=$UserInfo['username']?><img class="ml-3" width="30px" src="/assets/img/pfp/<?=$UserInfo['pfp']?>.png"></a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<?php if(!isset($_SESSION['uid'])) { ?>
					<a class="text-dark" href="/login.php">Login</a>
					or
					<a class="text-dark" href="/signup.php">Sign Up</a>
					<?php } else { ?>
					<a class="text-dark nav-link" href="/logout.php">Log Out <i class="fas fa-sign-out-alt fa-fw fa-sm"></i></a>
					<?php } ?>
				</li>
			</ul>
		</div>
	</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>
<script>
	<?php
	//start session
	session_start();
	?>
</script>

<nav class="navbar navbar-custom navbar-expand-lg navbar-light ">
	<a class="navbar-brand" href="index.php">
		<img src="Icons/logo.png" width="50rem" alt="Logo">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
		aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<label class="title">Shaken,<br> Not Stirred</label>
		<div class="navbar-nav navbar-navHeader">
			<a id="Guides" class="nav-item nav-link" href="Guides.php">Guides</a>
			<a id="Quizzes" class="nav-item nav-link" href="Quizzes.php">Quizzes</a>
			<a id="Venues" class="nav-item nav-link" href="Venues.php" id="Venues">Venues</a>

		</div>

		<div class="navbar-nav navbar-navStatus">
			<?php if (isset($_SESSION['Email'])) { ?>
				<a class="nav-item nav-link navbar-navLog" href="Account.php"><img src="Icons/person-circle.svg"
						width="50rem" alt="My Account" /></a>
				<a class="nav-item nav-link navbar-navReg" href="Logout.php" name="Logout" type="submit">Logout</a>
			<?php } elseif (isset($_SESSION['ManagerEmail'])) { ?>
				<a class="nav-item nav-link navbar-navLog" href="UserDetails.php">Users</a>
				<a class="nav-item nav-link navbar-navReg" href="Logout.php" name="Logout" type="submit">Logout</a>
			<?php } else { ?>
				<a id="Login" class="nav-item nav-link navbar-navLog" href="Login.php">Login</a>
				<a id="Register" class="nav-item nav-link navbar-navReg" href="Register.php">Register</a>
			<?php } ?>
		</div>
	</div>
</nav>

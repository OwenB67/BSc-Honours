<?php
//Start session
session_start();

//Checks if email is set, if not, user is redirected to login page
if (!isset($_SESSION['Email'])) {
	header("Location: Login.php");
} else {
	$sessionemail = $_SESSION['Email'];
	//Connect to database
	require_once "phpconnect.php";

	//Fetch all user details
	$sql = mysqli_query($conn, "Select distinct u.username, u.gender, u.email, q.title, qt.score, qt.date From user u left join quiz_taken qt on u.username = qt.username Inner join quiz q on q.quiz_id = qt.quiz_id where u.email = '$sessionemail' order by q.title");
	$sql2 =  mysqli_query($conn, "Select distinct username From user where email = '$sessionemail'");
	$username = mysqli_fetch_array($sql2, MYSQLI_ASSOC)['username'];
	$numresults = mysqli_num_rows($sql);
} ?>

<!DOCTYPE html>
<html>

<head>
	<title>Shaken, Not Stirred - Account</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
</head>

<body>
	<header>
		<?php 
		include 'Header.php';
		?>
	</header>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="content shadow">
					<div class="modalFont text-center">
						<h1 class="p-3">Hello, <b><?php echo $username ?></b></h1>
						<img style='margin-left: 5%; display: inline;' src="Icons/person-circle.svg" width="50rem" alt="My Account">
					</div>
					
					<div class="modalFont card-body">
						<h2 style='font-size:180%'>Quizzes Taken</h2>
						<?php 
						if ($numresults == 0) {
							?><p class="modalFont"><b>You haven't taken any quizzes yet</b></p>
						<?php }
						else {
							while ($row = mysqli_fetch_array($sql)) { 
								$score = $row["score"];
								if ($score == 10) {
									$skill = "Expert";
								} elseif ($score > 6) {
									$skill = "Proficient";
								} elseif ($score > 3) {
									$skill = "Proficient";
								} elseif ($score == NULL) {
									$skill = "Not started";
								} else {
									$skill = "Novice";
								}
							?>
								<p class="modalFont" style='font-size:160%'><b><?php echo $row["title"]?></b></p>
								<p class="modalFont" style='font-size:140%'><b>Best Score: </b><?php echo $row["score"] ?><b></p>
								<p class="modalFont" style='font-size:140%'> <b>Skill Level: </b><?php echo $skill ?></p>
						<?php }} ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>

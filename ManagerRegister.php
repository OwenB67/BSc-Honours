<?php
//Start session
session_start();

//Check if register button is pressed
if (isset($_POST['Register'])) {

    //Connect to database
    require_once "SQLConnect.php";

    //Declare all variables & prevent sql injection
    $email = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['ManagerEmail'])));
    $password = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Password'])));
    $venue = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Venue'])));
    $secQuestion = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['SecQuestion'])));
    $secAnswer = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['SecAnswer'])));

    //SQL select query to check if a record already exists with that email
    $sql_check_email = mysqli_fetch_array(mysqli_query($conn, "select email from manager where email = '$email'"));

    //SQL select query to check if the venue exists in the database for legitimacy 
    $sql_check_venue = mysqli_fetch_array(mysqli_query($conn, "select name from venues where name = '$venue'"));

    //Check if email already exists in database
    if (!empty($sql_check_email)) {
        $messageError = "Error, the email address " . $email . " is already in use. Please log in to your account and select 'forgot password' if necessary.";
    //Check if venue exists in database
    } elseif (empty($sql_check_venue)) {
        $messageError = "Error, the venue " . $venue . " does not exist in the database. Please enter a valid venue.";
    } else {
        //Hash the password so it is not readable in the database for security
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //SQL insert query to store manager record
        $sql = mysqli_query($conn, "Insert into manager (email, password, venue, security_question, security_answer) values('$email', '$hash', '$venue', '$secQuestion', '$secAnswer')");
        $_SESSION['ManagerEmail'] = $email;
        header("Location: UserDetails.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Manager Register</title>
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
    <?php if (isset($messageError)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $messageError ?>
        </div>
    <?php } elseif (isset($messageSuccess)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $messageSuccess ?>
        </div>
    <?php } ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="content shadow">
                    <div class="card-title text-center">
                        <h2 class="p-3">Manager Register</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="ManagerRegister.php">
                            <div class="mb-4 modalFont">
                                <label for="ManagerEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ManagerEmail" name="ManagerEmail" required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password" name="Password"
                                    onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}" maxlength="50"
                                    title="Password must contain at least one number, one uppercase, lowercase letter, and be between 8 and 50 characters."
                                    required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="Confirm_password"
                                    name="Confirm_password" onChange="onChange()"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}" required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Venue" class="form-label">Venue</label>
                                <input type="text" class="form-control" id="Venue" name="Venue"
                                    title="Enter the venue you manage. The venue must exist in our database to prove its legitimacy."
                                    required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="SecQuestion" class="form-label">Security Question</label>
                                <select type="text" class="custom-select" id="SecQuestion" name="SecQuestion">
                                    <option>What is your mother's maiden name?</option>
                                    <option>What is the name of your best friend?</option>
                                    <option>What is the name of your pet?</option>
                                    <option>What was the brand of your first car?</option>
                                    <option>Which primary school did you attend?</option>
                                    <option>Which secondary school did you attend?</option>/>
                                    <input type="text" class="form-control" id="SecAnswer" name="SecAnswer" required />
                            </div>
                            <div class="d-grid itemList">
                                <button class="btn btn-block login " type="submit" name="Register">Sign Up</button>
                            </div>
                            <div class="d-grid itemList">
                                <a class="btn btn-block login" href="Register.php">User Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    //Check that both passwords entered match
    function onChange() {
        const Password = document.querySelector('input[name=Password]');
        const Confirm_password = document.querySelector('input[name=Confirm_password]');
        if (Confirm_password.value === Password.value) {
            Confirm_password.setCustomValidity('');
        } else {
            Confirm_password.setCustomValidity('Passwords do not match.');
        }
    }
    $(document).ready(function () {
        $(".active").removeClass("active");
        $("#Register").addClass("active");
    });
</script>

</html>
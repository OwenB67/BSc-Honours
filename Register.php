<?php
session_start();
//Logs out user/manager if they are already signed in
if (isset($_SESSION['Email']) || isset($_SESSION['ManagerEmail'])) {
    header("Location: Logout.php");
}

//Checks if register button is pressed
if (isset($_POST['Register'])) {

    //Connect to database
    require_once "phpconnect.php";

    //Declare all variables & prevent sql injection
    $username = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Username'])));
    $gender = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Gender'])));
    $email = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Email'])));
    $password = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Password'])));
    $secQuestion = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['SecQuestion'])));
    $secAnswer = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['SecAnswer'])));
    $age = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Age'])));

    //SQL select query to check if a record already exists with that email
    $sql_check_email = mysqli_fetch_array(mysqli_query($conn, "select email from user where email = '$email'"));
    $sql_check_username = mysqli_fetch_array(mysqli_query($conn, "select username from user where username = '$username'"));

    //Checks if email already exists in database
    if (!empty($sql_check_email)) {
        $messageError = "Error, the email address " . $email . " is already in use. Please log in to your account or select 'forgot password' if necessary.";

        //Checks if username already exists in database
    } elseif (!empty($sql_check_username)) {
        $messageError = "Error, the username " . $username . " is already in use. Please enter a different username.";

    } elseif ($age == 'No') {
        $messageError = "Error, you must be at least 18 years old to view this content.";

    } else {
        //Hash the password so it is not readable in the database for security
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //SQL insert query to store user record
        $sql = mysqli_query($conn, "Insert into user (username, gender, email, password, security_question, security_answer) 
                                          values('$username', '$gender', '$email', '$hash', '$secQuestion', '$secAnswer')");
        $_SESSION['Email'] = $email;
        header("Location: Account.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Register</title>
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
                        <h2 class="p-3">Register</h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="Register.php">
                            <div class="mb-4 modalFont">
                                <label for="Username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="Username" name="Username" required />
                            </div>
                            <div class="modalFont">
                                <label class="radio-inline">
                                    <input type="radio" name="Gender" value="Male" required />Male &nbsp&nbsp
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="Gender" value="Female" />Female &nbsp&nbsp
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="Gender" value="Other" />Other
                                </label>
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password" name="Password"
                                    onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}" maxlength="50"
                                    title="Password must contain at least one number, one uppercase, lowercase letter, and be between 8 and 50 characters"
                                    required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="Confirm_password"
                                    name="Confirm_password" onChange="onChange()"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}" required />
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
                            <div class="modalFont" required>
                                <label for="Username" class="form-label">Are you 18 years old or older?</label><br>
                                <input type="checkbox" name="Age" onclick="oneChecked(this)" value="Yes" />&nbspYes
                                &nbsp&nbsp
                                <input type="checkbox" name="Age" onclick="oneChecked(this)" value="No" />&nbspNo
                            </div>
                            <br>
                            <div class="d-grid itemList">
                                <button class="btn btn-block login " type="submit" name="Register">Sign Up</button>
                            </div>
                            <div class="d-grid itemList">
                                <a class="btn btn-block login" href="ManagerRegister.php">Manager Register</a>
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
    //Allow only one box to be checked
    function oneChecked(checkbox) {
        var checkboxes = document.getElementsByName('Age')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>

</html>

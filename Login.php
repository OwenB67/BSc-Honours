<?php
//Start session
session_start();

//Checks if a user/manager is already logged in, if so, they are redirected to their profile page
if (isset($_SESSION['Email']) || isset($_SESSION['ManagerEmail'])) {
    header("Location: Account.php");
}

//check if login button pressed
if (isset($_POST['Login'])) {

    //Connect to database
    require_once "phpconnect.php";

    //Declares email and password variables and performs functions on them to prevent SQL injection
    $Email = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Email'])));
    $Password = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['Password'])));

    //Query database for email in user table
    $sql = mysqli_fetch_array(mysqli_query($conn, "Select * from user where Email = '$Email'"));
    
    //Verify that the password entered matches the hashed password in database
    $hash = $sql[3];
    if (password_verify($Password, $hash)) {
        $_SESSION['Email'] = $Email;
        header("Location: Account.php");
    } else {
    $message = "Error, invalid login.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Login</title>
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
                    <div class="card-title text-center">
                        <h2 class="p-3">Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="Login.php">
                            <div class="mb-4 modalFont">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" required />
                            </div>
                            <div class="mb-4 modalFont">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password" name="Password" required />
                                <p class="error-message">
                                    <?php if (isset($message)) {
                                        echo $message;
                                    } ?>
                                </p>
                            </div>
                            <div class="d-grid itemList">
                                <button class="btn btn-block login " type="submit" name="Login">Sign In</button>
                            </div>
                            <div class="d-grid itemList">
                                <a class="btn btn-block login" href="ForgotPassword.php">Forgot Password?</a>
                            </div>
                            <div class="d-grid itemList">
                                <a class="btn btn-block login" href="ManagerLogin.php">Manager Login</a>
                            </div>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $(".active").removeClass("active");
        $("#Login").addClass("active");
    });
</script>

</html>

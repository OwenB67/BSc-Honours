<?php
//Start session
session_start();

if (isset($_SESSION['ManagerEmail']) &&!empty($_SESSION['ManagerEmail'])) {
    $sessionemail = $_SESSION['ManagerEmail'];
    //Connect to database
    require_once "phpconnect.php";
    $sql = mysqli_fetch_array(mysqli_query($conn, "Select security_question, security_answer from manager where email = '$sessionemail'"));
    $secQuestion = $sql[0];
    $answer = $sql[1];
    

    //If security answer matches, change password to new password
    if (isset($_POST['SecAnswer'])) {
        if ($answer === $_POST['SecAnswer']) {
            $password = $_POST['Password'];

            //Hash the password so it is not readable in the database for security
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if ($_POST['Password'] === $_POST['Confirm_password']) {
                echo "<script>alert('Success, password is now being reset.');window.location='UserDetails.php'</script>";
                $sql_update = mysqli_query($conn, "Update manager set password = '$hash' where email = '$sessionemail'");
            //If passwords entered do not match, alert manager to try again
            } else {
                echo "<script>alert('Error, both passwords entered did not match. Please try again.');window.location='PasswordChange.php'</script>";
            }
        //Alert manager that security answer did not match
        } else {
            echo "<script>alert('The security answer was incorrect. Please try again.');window.location='PasswordChange.php'</script>";
        }
    } else { ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Shaken, Not Stirred - Password Change</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="style.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
        </head>

        <body>

            <header>
                <?php
                include "Header.php";
                ?>
            </header>

            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="content shadow">
                            <div class="card-title text-center">
                                <h2 class="p-3">Forgotten Password</h2>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="ManagerPasswordChange.php">
                                    <div class="mb-4 modalFont">
                                        <label for="secQuestion" class="form-label">
                                            <?php echo $secQuestion ?>
                                        </label>
                                        <input type="text" class="form-control" id="SecAnswer" name="SecAnswer" required />
                                    </div>
                                    <div class="mb-4 modalFont">
                                        <label for="Password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="Password" name="Password"
                                            onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}" maxlength="50"
                                            title="Password must contain at least one number, one uppercase, lowercase letter, and be between 8 and 50 characters"
                                            required />
                                    </div>
                                    <div class="mb-4 modalFont">
                                        <label for="Password" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="Confirm_password"
                                            name="Confirm_password" onChange="onChange()"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}" required />
                                    </div>
                                    <div class="d-grid itemList">
                                        <button class="btn btn-block login " type="submit" name="PasswordChange">Reset
                                            Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <?php
    }
} else {
    echo "<script>alert('Please set an email.');window.location='ManagerForgotPassword.php'</script>";
}
?>

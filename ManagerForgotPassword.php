<?php
//Start session
session_start();

//Check if password reset hyperlink is pressed
if (isset($_POST['ManagerForgotPassword'])) {

    //Connect to database
    require_once "SQLConnect.php";

    //Declare email and password variables and perform functions on them to prevent SQL injection
    $Email = mysqli_real_escape_string($conn, stripslashes(strip_tags($_POST['ManagerEmail'])));

    $sql = mysqli_query($conn, "Select email from manager where email = '$Email'");
    $row = mysqli_fetch_array($sql);
    
    //Check if details match
    if ($sql->num_rows===0) {
        echo '<script>alert("Error, invalid email.")</script>';
    } else {
        $email = $row[0] ?? null;
        if ($email!=null) {
            $_SESSION['ManagerEmail'] = $email;
            header("Location: ManagerPasswordChange.php");
        } else{
            echo '<script>alert("Error, website malfunction")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Manager Forgot Password</title>
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
                        <h2 class="p-3">Forgotten Password</h2>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="ManagerForgotPassword.php">
                            <div class="mb-4 modalFont">
                                <label for="ManagerEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="ManagerEmail" name="ManagerEmail" required />
                            </div>
                            <div class="d-grid itemList">
                                <button class="btn btn-block login " type="submit" name="ManagerForgotPassword">Submit
                                    Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
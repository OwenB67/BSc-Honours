<?php
//Start session
session_start();

//Check that user/manager is logged in before giving them access to the Guides page
if (isset($_SESSION['ManagerEmail'])) {
}elseif (!isset($_SESSION['Email'])) {
	  header("Location: Login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Guides</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <script>
        $(document).ready(function () {
            $(".active").removeClass("active");
            $("#Guides").addClass("active");
        });
    </script>
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
                        <h2 class="p-3">Guides</h2>
                    </div>
                    <div class="card-body">
                                    <div class="itemList">
                                <a class="btn btn-block login" href="VideoGuides.php">Video Guides</a><br>
                                    </div>
                                    <div class="itemList">
                                <a class="btn btn-block login" href="WrittenGuides.php">Written Guides</a><br>
                                    </div>
                                    <div class="itemList">
                                <a class="btn btn-block login" href="Recipes.php">Cocktail Recipes</a>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
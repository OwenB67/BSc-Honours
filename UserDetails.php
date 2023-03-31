<?php
session_start();

//Connect to database
require_once "SQLConnect.php";
$sql = mysqli_query($conn, "Select distinct u.username, u.gender, u.email, q.title, qt.score, qt.date From user u Inner join quiz_taken qt on u.username = qt.username Inner join quiz q on q.quiz_id = qt.quiz_id");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Users</title>
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

    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-lg-8 col-sm-10">
            <div class="content shadow">
                <div class="card-title text-center">
                    <h2 class="p-3">Recipes</h2>
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                <div class="col-md-4">
                                    <div class="itemList">
                                    <?php echo '<img src="Icons/person-circle.svg" height="150rem" width="230rem" alt="User Account"</p>';?>
                                        <button type="button" class="btn btn-block login" id="<?php echo $row['username']?>" data-toggle="modal" data-target="#<?php echo($row['username'].'Modal') ?>"><?php echo $row["username"]?></button>
                                    </div>
                                    
                                    <!-- User Modal -->
                    <div class="modal fade" id="<?php echo($row['username'].'Modal') ?>" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" aria-labelledby="<?php echo($row['username'].'ModalLabel') ?>" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="<?php echo($row['username'].'ModalLabel')?>">User</h5>
                            <!-- Adds a button in the form of an x that the user can press to close the modal -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="row modalFont">
                            <!-- echoes all information taken from quiz taken table in the database -->
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Username</b><br>' . $row["username"] . '</p>';?>
                                                </div>
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Email</b><br>' . $row["email"] . '</p>';?>
                                                </div>
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Gender</b><br>' . $row["gender"] . '</p>';?>
                                                </div>
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Quiz</b><br>' . $row["title"] . '</p>'; ?>
                                                </div>
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Score</b><br>' . $row["score"] . '</p>'; ?>
                                                </div>
                                                
                        </div>
                        </div>
                        <!-- Adds a second button that the user can press to close the modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                                

                </div>
            </div>
        </div>
    </div>

</body>
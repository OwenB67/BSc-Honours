<?php
//Start session
session_start();

//Check that user/manager is logged in before giving them access to the Venues page
if (isset($_SESSION['ManagerEmail'])) {
}elseif (!isset($_SESSION['Email'])) {
	  header("Location: Login.php");
}
//Connect to database
require_once "SQLConnect.php";
$sql = mysqli_query($conn, "Select * from venues");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shaken, Not Stirred - Venues</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <script>
        $(document).ready(function () {
            $(".active").removeClass("active");
            $("#Venues").addClass("active");
        });
    </script>
</head>

<body>

    <header>
        <?php
        include 'Header.php';
        ?>
    </header>
  
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-lg-8 col-sm-10">
            <div class="content shadow">
                <div class="card-title text-center">
                    <h2 class="p-3">Venues</h2>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row"> 
                            <?php while ($row = mysqli_fetch_array($sql)) {?>
                                <div class="col-md-4">
                                   <div class="itemList"> 
                                    <?php echo '<img src="Icons/' . $row["picture_id"] . '" height="150rem" width="230rem" alt="Venue Image"</p>';?>
                                        <button type="button" class="btn btn-block login itemname" id="<?php echo $row['venue_id']?>" data-toggle="modal" data-target="#<?php echo($row['venue_id'].'Modal') ?>"><?php echo $row["name"]?></button>
                                    </div>

                        <!-- Recipe Modal -->
                    <div class="modal fade" id="<?php echo($row['venue_id'].'Modal') ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="<?php echo($row['venue_id'].'ModalLabel') ?>" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="<?php echo($row['venue_id'].'ModalLabel')?>">Venue</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="row modalFont">
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Venue Name</b><br>' . $row["name"] . '</p>';
                                                    echo '<img src="Icons/' . $row["picture_id"] . '" width="240rem" alt="Venue Image"</p>'; ?>
                                                </div>
                                                <div class="col-lg">
                                                <?php echo '<p><b>Postcode</b><br>' . $row["postcode"] . '</p>'; ?>
                                                </div>
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>City</b><br>' . $row["city"] . '</p>'; ?>
                                                </div>
                                                <div class="col-lg">
                                                    <?php
                                                    echo '<p><b>Country</b><br>' . $row["country"] . '</p>'; ?>
                                                </div>
                        
                        </div>
                        </div>
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
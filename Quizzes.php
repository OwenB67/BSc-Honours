<?php
//Start session
session_start();

//Check that user/manager is logged in before giving them access to the Quizzes page
if (isset($_SESSION['ManagerEmail'])) {
} elseif (!isset($_SESSION['Email'])) {
  header("Location: Login.php");
}

//Connect to database
require_once "phpconnect.php";
$sql = mysqli_query($conn, "Select * from quiz");
$answers = array("answer1", "answer2", "answer3", "answer4");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Shaken, Not Stirred - Quizzes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
  <script>
    $(document).ready(function () {
      $(".active").removeClass("active");
      $("#Quizzes").addClass("active");
    });
  </script>
</head>

<body>

  <header>
    <?php
    include 'Header.php';
    ?>
  </header>

  <?php
  if ($_POST) {
    $quiz_id = $_POST['quiz_id'];
    $sql3 = mysqli_query($conn, "select * from question where quiz_id = $quiz_id");
    $num_questions = mysqli_num_rows($sql3);

    $score = 0;
    while ($row3 = mysqli_fetch_array($sql3)) {
      $selected = $_POST[$row3['question_id']];
      $correct = $row3['correct_answer'];

      if ($selected == $correct) {
        $score++;
      }
    }

    $email = $_SESSION['Email'];
    $username = mysqli_fetch_array(mysqli_query($conn, "Select * from user where Email = '$email'"))['username'];
    $date = date('d-m-y h:i:s');
    //Check the username has a value to stop manager data from being put in the quiz_id table
    if (isset($username)) {
      $sqli = mysqli_query($conn, "Insert into quiz_taken(username, quiz_id, score, date) Values ('$username', '$quiz_id', '$score', '$date')");
    }
    echo "<script type='text/javascript'> alert('You scored $score/$num_questions!') </script>";
  }
  ?>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="content shadow">
          <div class="card-title text-center">
            <h2 class="p-3">Quizzes</h2>
          </div>
          <div class="card-body">
            <?php while ($row = mysqli_fetch_array($sql)) { ?>

              <div class="itemList">

                <button type="button" class="btn btn-block login" id="<?php echo $row['quiz_id'] ?> Description"
                  data-toggle="modal" data-target="#<?php echo $row['quiz_id'] . "Modal" ?> Description"><?php echo $row["title"] ?></button>
              </div>

              <!-- Description Modal -->
              <div class="modal fade modalFont" id="<?php echo $row['quiz_id'] . "Modal" ?> Description"
                data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="#<?php echo $row['quiz_id'] . "ModalLabel" ?> Description" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="#<?php echo $row['quiz_id'] . "ModalLabel" ?> Description"><?php echo $row['title']?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row modalFont">
                        <div class="col-sm">
                          <?php echo '<img src="Icons/' . $row["picture_id"] . '" width="350rem" alt="Quiz Image"</p>'; ?>
                        </div>
                        <div class="col-sm" style='text-align:center'>
                          <?php echo $row["description"]; ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="<?php echo $row['quiz_id'] ?>" data-toggle="modal"
                        data-target="#<?php echo $row['quiz_id'] . "Modal" ?>">Try Quiz</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Quiz Modal -->
              <div class="modal fade modalFont" id="<?php echo $row['quiz_id'] . "Modal" ?>" data-backdrop="static"
                data-keyboard="false" tabindex="-1" aria-labelledby="#<?php echo $row['quiz_id'] . "ModalLabel" ?>"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="#<?php echo $row['quiz_id'] . "ModalLabel" ?>"><?php echo $row['title'] ?>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="<?php echo $row['quiz_id'] . "Form" ?>" method="post" action=''>
                        <input type="hidden" id="quiz_id" name="quiz_id" value="<?php echo $row['quiz_id'] ?>">
                        <ol>
                          <?php
                          $quiz_id = $row['quiz_id'];
                          $sql2 = mysqli_query($conn, "select * from question where quiz_id = $quiz_id");
                          while ($row2 = mysqli_fetch_array($sql2)) { ?>
                            <li>
                              <h3>
                                <?php echo ($row2["question"]); ?>
                              </h3>
                              <?php for ($i = 0; $i < 4; $i++) { ?>
                                <input type="radio" id="<?php echo ($row2["question_id"] . $answers[$i]); ?>"
                                  name="<?php echo ($row2["question_id"]); ?>" value="<?php echo ($answers[$i]); ?>" required>
                                <label for="<?php echo ($row2["question_id"] . $answers[$i]); ?>"><?php echo ($row2[$answers[$i]]); ?></label><br>
                              <?php }
                          } ?>
                        </ol>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" id="submitFormData" value="Submit">
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php

//Convert mysqli warnings to exceptions to make the following try catch work
mysqli_report(MYSQLI_REPORT_STRICT);
//Connect to database
try {
    $conn = mysqli_connect("localhost", "root", "", 'bared');
} catch (mysqli_sql_exception $e) {
    header("Location: SQLError.php");
}

//Convert mysqli exceptions back to warnings as it is no longer needed 
mysqli_report(MYSQLI_REPORT_OFF);

?>
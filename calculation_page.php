<?php

session_start();

if (!isset($_SESSION['dimension'])) {
    session_destroy();
    unset($_SESSION['dimension']);
    header("location: index.php");
}

if (isset($_POST['submit-matrix'])) {
    // receive all input values from the form
    $dimension = $_SESSION['dimension'];
    
    for ($i = 0; $i < $dimension; $i++) {
        for ($j = 0; $j < $dimension; $j++) {
            $matrix[$i][$j] = $_POST[$i.$j];
        }
    }


    /*
    for ($i = 0; $i < $dimension; $i++) {
        for ($j = 0; $j < $dimension; $j++) {
            echo $matrix[$i][$j].' ';
        }
    }*/
  // echo json_encode($matrix);
    
  // $command = escapeshellcmd('python calculate.py '.json_encode($matrix).' '.$_SESSION['dimension']);
  // $matrix = [["0","1"],["0","0"]];
  $dimension = $_SESSION['dimension'];

  $command = escapeshellcmd('python calculate.py '.json_encode($matrix).' '.$dimension);  
  $output = shell_exec($command);
  echo $output;

}

if (isset($_GET['reset'])) {
    session_destroy();
    unset($_SESSION['rows']);
    unset($_SESSION['columns']);
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilpotent Matrix Checker</title>
</head>
<body>
<p><a href="calculation_page.php?reset='1'" style="color: red;">Reset</a> </p>
</body>
</html>
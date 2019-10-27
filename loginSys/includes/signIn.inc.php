<?php

if(isset($_POST['signin-submit'])){

  //check connection
  require 'dbcon.inc.php';

  //store data passed from the signup form in a variable so we can use it later
  $name = $_POST["username"];
  $password = $_POST["password"];

  // We check for any empty inputs.
  if (empty($name) || empty($password)){
    header("Location: ../index.php?error=emptyfields&name=".$name);
    exit();
  }
  else { 
    // If we got to this point, it means the user didn't make an error! :)

    // Next we need to get the password from the user in the database that has the same username as what the user typed in, and then we need to de-hash it and check if it matches the password the user typed into the login form.

    // We will connect to the database using prepared statements which work by us sending SQL to the database first, and then later we fill in the placeholders by sending the users data.    
    
    $sql =  "SELECT supname, suppassword FROM signUp WHERE supname=? AND suppassword =?";
    // $sql =  "SELECT * FROM signUp WHERE supname=? OR supemail =?; ";

    //initialize a new statement using the connection from the dbh.inc.php file.
    $stmt = mysqli_stmt_init($conn);

    // Prepare a select statement and check for error
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
    exit();
    }
    else{
      // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.

      mysqli_stmt_bind_param($stmt, "ss", $name, $password); 

      // Attempt to execute the prepared statement and send to database
      mysqli_stmt_execute($stmt);

      // Store result
      mysqli_stmt_store_result($stmt);

      //$result = mysqli_stmt_get_result($stmt); (use with fetch assoc and when store is not in use)

      // Check if username exists, if yes then verify password
      if (mysqli_stmt_num_rows($stmt) == 1) {

        // Bind result variables
        mysqli_stmt_bind_result($stmt, $row['supname'], $row['suppassword']);
      
        // $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_stmt_fetch($stmt)) {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          $pwdcheck = password_verify($password, $row['suppassword']);
          if($pwdcheck == false){
            header("Location: ../index.php?error=wrongpassword");
          exit();
          }
          else if($pwdcheck == true){

            // Store data in session variables
            session_start();
            $_SESSION['idSup'] = $row['supid'];
            $_SESSION['nameSup'] = $row['supname'];  

            // Redirect user to welcome page
            header("Location: ../index.php?login=success");
            exit();
          }
          else{
            header("Location: ../index.php?error=wrongpwrd");
            exit();
          }
        }
        else{
          header("Location: ../index.php?error=nouser");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=No account found with that username");
        exit();
        
      }
    }
  }
}
else{
  header("Location: ../index.php");
  exit();
}
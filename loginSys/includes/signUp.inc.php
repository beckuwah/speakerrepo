<?php
if(isset($_POST['signup-submit'])){

  //check connection
  require 'dbcon.inc.php';

  // main code
  $name = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $pwdrepeat = $_POST["passwordrepeat"];

  if (empty($name) || empty($email) || empty($password) || empty($pwdrepeat)) {
    header("Location: ../signUp.php?error=emptyfields&username=".$name."&email=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$name)) {
  header("Location: ../signUp.php?error=invaildemailusername");
  exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signUp.php?error=invaildemail&username=".$name);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
    header("Location: ../signUp.php?error=invaildusername&email=".$email);    
    exit();
  }
  // elseif ($password < 5){
  //   header("Location: ../signUp.php?error=passwordmustbemorethan5characters&username=".$name."&email=".$email);     
  //   exit();  
  // }
  else if ($password !== $pwdrepeat) {
    header("Location: ../signUp.php?error=passwordcheck&username=".$name."&email=".$email);     
    exit();
  }
  else{
   $sql = "SELECT supemail FROM signUp WHERE supemail= ?";
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../signUp.php?error=sqlselecterror");
    exit();
   }
   else{
     mysqli_stmt_bind_param($stmt, "s", $email );
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
      $resultCheck= mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0 ){
        header("Location: ../signUp.php?error=usertaken&username=".$name);
      exit();
      }
      else{
        $sql = "INSERT INTO signUp (supname, supemail, suppassword) VALUES(?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signUp.php?error=sqlInserterror");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $name , $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../signUp.php?signup=success");
          exit();

        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../signUp.php");
  exit();
}
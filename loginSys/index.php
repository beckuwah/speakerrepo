<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="log_style.css" type="text/css" >
    <link rel="stylesheet" href="dist/bootstrap-4.1.3.css" type="text/css">
    <title>Sign In</title>
</head>
<body>
    <table class="signinTable">
        <tbody>
            <tr>
                <td>
                    <nav class="navbar navbar-expand-md navbar-light sinheader">
                            <div class="navbar-header">
                                <a href="../index.html" class="navbar-brand">
                                LOGO
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#logNav">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="logNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a href="../index.html" class="nav-link">Home</a> </li>
                                    <!-- <li class="nav-item"><a href="#" class="nav-link"></a></li> -->
                                    <li class="nav-item active"> <a href="signUp.php" class="nav-link">Sign Up</a></li>
                                </ul>
                            </div>
                        </nav>
                    <div class="wrapform">
                        <div class="signHeader">
                            <h5>SIGN IN</h5>
                        </div> 
                        <div class="session text-center">
                            <?php 
                            if(isset($_SESSION['idSup'])){
                                echo '<h6> You are logged In!</h6>';
                            }
                            else {
                                echo '<h6> You are logged out!</h6>';
                            }
                            ?>
                        </div>
                        <div class="indexform">
                            <form action="includes/signIn.inc.php" method="post"> 
                                <div class="form-group col-sm-12 col-lg-9">
                                    <input type="text"class="form-control" name="username" placeholder="Username/Email">
                                </div>
                                <div class="form-group col-sm-12 col-lg-9">
                                    <input type="password"  class="form-control"  name="password" placeholder="Password">
                                </div>
                                <div class="form-group col-sm-6 col-lg-3">
                                    <input type="submit" name="signin-submit" class="btn btn-block btn-primary">
                                </div>
                            </form> 
                        </div>
                        <hr width="30%">
                        <div class="index-signup">
                            <form action="signUp.inc.php" method="post">
                                <p class="indexSignUp">Don't have an account? <a href="signUp.php">Sign up</a>.</p>
                            </form>
                        </div> 
                    </div> 
                </td>
            </tr>
        </tbody>
    </table>
    <script src="js/index.js"></script> 
    <script src="dist/jquery-3.3.1.min.js"></script>
    <script src="dist/bootstrap.js"></script> 
</body>
</html>
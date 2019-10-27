<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sign up</title>
    <link rel="stylesheet" href="log_style.css" type="text/css" />
    <link rel="stylesheet" href="dist/bootstrap-4.1.3.css" type="text/css" />
    <script src = "index.js"></script>
    <script src="dist/jquery-3.3.1.min.js"></script>
    <script src="dist/bootstrap.js"></script>
</head>
<body>
    <table class="signupTable">
        <tbody>
            <tr>
                <td>
                    <nav class="navbar navbar-expand-md navbar-light supheader">
                            <div class="navbar-header">
                                <a href="" class="navbar-brand">
                                LOGO
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#logNavv">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="logNavv">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a href="../index.html" class="nav-link">Home</a></li>
                                    <!-- <li class="nav-item"><a href="#" class="nav-link"></a></li> -->
                                    <li class="nav-item active"> <a href="index.php" class="nav-link">Login</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="wrapform">
                            <div class="signHeader">
                                <h4>SIGN UP</h4>
                            </div>
                            <?php
                            if(isset($_GET['error'])){
                                if($_GET['error']== "emptyfields"){
                                    echo "<p> Fill in all fields!</p>";
                                }
                                else if($_GET['error']== "invaildemailusername"){
                                    echo "<p> Invalid username and e-mail!</p>";
                                } 
                                else if($_GET['error']== "invaildemail"){
                                    echo "<p> Invalid e-mail!</p>";
                                } 
                                else if($_GET['error']== "invaildusername"){
                                    echo "<p> Invalid username!</p>"; 
                                } 
                                else if($_GET['error']== "passwordcheck"){
                                    echo "<p> Password do not match!</p>";
                                }
                                else if($_GET['error']== "usertaken"){
                                    echo "<p> Username is taken already, try another email!</p>";
                                }
                            }
                            else if ($_GET['signup'] == "success") {
                                echo "<p> Signup successful!</p>";
                            };
                            ?>
                            <form action="includes/signUp.inc.php" method="post" class="signform"> 
                            <div class="form-group col-sm-12 col-lg-9">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group col-sm-12 col-lg-9"> 
                                <input type="email" name="email" class="form-control"  placeholder="Email">
                            </div>
                            <div class="form-group col-sm-12 col-lg-9">
                                <input type="password" name="password" class="form-control"  placeholder="Password">
                            </div>  
                            <div class="form-group col-sm-12 col-lg-9">    
                                <input type="password" name="passwordrepeat" class="form-control"  placeholder="Repeat password">
                            </div>       
                            <div class="form-group col-sm-6 col-lg-3">
                                <input type="submit" name="signup-submit" class="btn btn-block btn-danger">
                            </div>  
                            <hr width="30%">  
                            <div class="footernote">
                                <p>If you are an already registered member, please <a href="index.php">login </a>here.</p>
                            </div>
                        </form>
                        </div>
                    </div>       
                </td>        
            </tr>             
        </tbody>            
    </table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="dist/bootstrap-4.1.3.css" />
    <script src="dist/jquery-3.3.1.min.js"></script>
    <script src="dist/bootstrap.js"></script>
    <script src = "index.js"></script>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="navbar-header">
                <a href="" class="navbar-brand logo">
                    LOGO
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="contactnav navbar-nav ml-auto mt-2 pl-2 mt-lg-0">
                    <li class="nav-item">
                        <a type="button" data-toggle="modal" data-target="#modal1" class="nav-link">Add contact</a>
                        <div class="modal fade" id="modal1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="contactpage.php" method="POST" class="">
                                        <div class="modal-body">
                                            <div class="form-group"><input type="text" name="username" placeholder="Add name" class="form-control" required> </div>
                                            <div class="form-group"><input type="number" name="phoneNum" placeholder="Phone number" class="form-control" required> </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" type="submit" name="addSubmit">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>                
                        </div>
                    </li>
                    <li type="button" class="nav-item">
                        <a class="nav-link" href="logO.php">LOGOUT</a>
                    </li>
                </ul>
                
            </div>   
        </nav>
    </div>
    <div class="contactHeader">
        <h3>My Contact list</h3>
    </div>
    <div class="container">       
    <?php
        $server="localhost";
        $username="becky";
        $password="";
        $db="loginSys";

        //create connection
        $conn = mysqli_connect( $server, $username, $password, $db);

        //check connection

        if(!$conn){
            die("Connection not sucessfully:" . mysqli_connect_error());
        }
        //Inserting users into database
        if (isset($_POST['addSubmit'])) {
            $name = $_POST["username"];
            $num = $_POST["phoneNum"];
            $sql = "INSERT INTO addCont (name, phone) VALUES('$name','$num')";

            if (mysqli_query( $conn, $sql)) { ?>

            <script>window.location="contactpage.php";</script>
            <?php
            }
        }
        //Getting users from database
        $selectsql = "SELECT * FROM addCont";
        $result = mysqli_query( $conn, $selectsql);

        echo "<table class='table'>
        <thead>
            <tr>
                <th>S/no</th>
                <th>Name</th>
                <th>Phone number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tboby>
        ";
        $c=1;
        while($row = mysqli_fetch_array($result)){

            // $id = $row['id'];
            $name = $row['name'];
            $phone = $row['phone'];

            echo "<tr>
                <td>$c</td>
                <td>$name</td>
                <td>$phone</td>
                <td>Edit</td>
                <td>Delete</td>
                </tr>
            
            ";
            $c++;
        }
        echo"</tbody> </table>";
    
    ?> 
</body>
</html>

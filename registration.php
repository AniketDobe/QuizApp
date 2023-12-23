<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: user/profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Quizzer</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    
</head>
<body>

<?php
        require 'navbar.php';
        require_once 'user/database.php';

        if(isset($_POST['submit'])){
            
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $sql = "SELECT * FROM `users` WHERE `email` = '$email';";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if(empty($name) or empty($email) or empty($password)){
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                echo 'Please fill all the details!';
                echo '<a href="registration.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
            }
            else if($rowCount>0){
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                echo 'Email already exist!';
                echo '<a href="registration.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
                // echo "Email already exist";
            }
            
            // $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$fullname', '$email', '$password');";
            // $result = mysqli_query($conn, $sql);
            else if($result){

                //added
                $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
                $result = mysqli_query($conn, $sql);
                //////////////////////////////////////////
                echo '<div class="alert alert-success alert-dismissible custom-alert" role="alert">';
                echo 'Your account has been created successfully!';
                echo '<a href="registration.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                echo 'Fail to create an account!';
                echo '<a href="registration.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
                // die("Connection failed: " . mysqli_error());
            }
            
        }
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Register for Quizzer</h4>
                </div>
                <div class="card-body">
                    <form action="registration.php" method="post">
                        <div class="form-group">
                            <label for="name">Full Name*</label>
                            <input type="text" class="form-control" name="name" id="name" require placeholder="Enter your full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" name="email" id="email" require placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" name="password" id="password" require placeholder="Enter your password">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" name="submit" class="btn btn-primary btn-block form-control">Register</button>
                        </div>
                        <p></p>
                        <p>Already have an account? <a href="login.php">Log in here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="p-2"></p>

<?php
    require 'footer.php';
?>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->
</body>
</html>

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
    <title>Login - Quizzer</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        img {
            width: 50%;
        }
        
    </style>
</head>
<body>
<?php
        require 'navbar.php';
        require_once 'user/database.php';

        if(isset($_POST['login'])){
            
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($row["email"] != $email ){
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                echo 'Enter corect email!';
                echo '<a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
            }
            else if(empty($email) or empty($password)){
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                echo 'Please fill all the details!';
                echo '<a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
            }
            else if($email == $row["email"] && $password == $row["password"]){
                session_start();
                // $_SESSION["user"] = "yes";
                $_SESSION["user"] = $email;
                header("Location: user/profile.php");
                die();
            }
            else {
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                // echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo 'Enter corect email & password!';
                echo '<a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
            }  
        }   
    ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Login to Quizzer</h4>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <button type="submit" name="login" class="btn btn-primary btn-block form-control">Login</button>
                        </div>
                        <p></p>
                        <p>Don't have an account? <a href="registration.php">Sign up here</a></p>
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

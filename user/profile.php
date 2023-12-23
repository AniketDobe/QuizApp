<?php
    require 'navbar.php';
    
    $user = $_SESSION["user"];


    $query = "SELECT `id`, `name`, `email`, `bio` FROM `users` WHERE email = '$user'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $id = $row['id'];
            $email = $row['email'];
            $bio = $row['bio'];     
        }
    }
    else {
        echo "Error executing the query: " . mysqli_error($conn);
    }    


    

    if(isset($_POST['submit'])){
        $bio = $_POST["bio"];
        // $user = 'aniketdobe1@gmail.com';
        // $query = "INSERT INTO `users` (`bio`) VALUES ('$bio') WHERE `email` = '$user'";

        // $query = "UPDATE `users` SET `bio` = '$bio' WHERE `email` = $user;";
        $query = "UPDATE `users` SET `bio` = '$bio' WHERE `id` = $id;";


        if (mysqli_query($conn, $query)) {
            echo '<div class="alert alert-success alert-dismissible custom-alert" role="alert">';
            echo 'Profile updated successfully!';
            echo '<a href="profile.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
            echo '</div>"';
          } else {
            echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
            echo 'Something went wrong!';
            echo '<a href="profile.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
            echo '</div>"';
            echo "Error updating record: " . mysqli_error($conn);
          }
        // echo var_dump($query);
        // $result = mysqli_query($conn, $query);
        
        // echo var_dump($result);


        // if($result){
        //     echo '<script type ="text/JavaScript">'; 
        //     echo 'alert("Your account has been created successfully!")';  
        //     echo "</script>";
        // }
        // else{
        //     echo '<script type ="text/JavaScript">'; 
        //     echo 'alert("Fail to create an account!")';  
        //     echo "</script>";
        //     // die("Connection failed: " . mysqli_error());
        // }
    }
    
?>
    <!-- User Profile Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/quiz.png" alt="Profile Image" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo " $name"; ?></h5>
                        <p class="card-text"><?php echo " $email"; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Your Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="profile.php" method="post">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" disabled value="<?php echo " $name"; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" disabled value="<?php echo " $email"; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio (Optional)</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo "$bio"; ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<p></p>
    <!-- Footer -->
<?php
    require 'footer.php';

?>

    <!-- Bootstrap 5 JavaScript (Popper.js is no longer required) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->
</body>
</html>

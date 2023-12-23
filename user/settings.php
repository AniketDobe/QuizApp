<?php
    require 'navbar.php';
    
    $user = $_SESSION["user"];


    $query = "SELECT `id`, `email`, `password` FROM `users` WHERE email = '$user'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $email = $row['email'];
            $password = $row['password'];     
        }
    }
    else {
        echo "Error executing the query: " . mysqli_error($conn);
    }  

    if(isset($_POST['submit'])){
        $oldPassword = $_POST["oldPassword"];

        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        // echo "$oldPassword";

        if(empty($oldPassword) or empty($newPassword) or empty($confirmPassword)){
            echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
            echo 'All fields are mendatory!';
            echo '<a href="settings.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
            echo '</div>"';
            // echo "All fields are mendatory!";
        }
        else if($newPassword != $confirmPassword){
            echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
            echo 'Mismatch passwords!';
            echo '<a href="settings.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
            echo '</div>"';
            // echo "Mismatch passwords!";
        }
        else if($oldPassword != $password){
            echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
            echo 'Enter correct old password!';
            echo '<a href="settings.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
            echo '</div>"';
            // echo "Enter correct old password!";
        }
        else{
            $query = "UPDATE `users` SET `password` = '$newPassword' WHERE `id` = $id;";

            if (mysqli_query($conn, $query)) {
                echo '<div class="alert alert-success alert-dismissible custom-alert" role="alert">';
                echo 'Password updated successfully!';
                echo '<a href="settings.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
                // echo "Password updated successfully";
            } else {
                echo '<div class="alert alert-danger alert-dismissible custom-alert" role="alert">';
                echo 'Something went wrong!';
                echo '<a href="settings.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>';
                echo '</div>"';
                // echo "Error updating record: " . mysqli_error($conn);
            }
        } 
    }
?>
    <!-- Settings Content -->
    <div class="container mt-5">
        <h1>Settings</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Account Settings</h5>
                <form action="settings.php" method="post">
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter old password">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Enter confirm password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

<p></p>
<?php
    require 'footer.php';
?>

</body>
</html>

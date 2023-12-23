<?php
    require 'navbar.php';

    $query = "SELECT DISTINCT `category` FROM `questions`";

    $result = mysqli_query($conn, $query);
?>
    <div class="container mt-5">
        <h1>Live Quizzes</h1>
        <p>Every question is an opportunity to learn and challenge yourself.</p>
        <?php
            $qno = 0;
            while($row=$result->fetch_assoc())
            {
                $qno++;
                $category = $row['category'];
        ?>
        <div class="card mb-4">
            <div class="card-header">
                Quiz <?php echo "$qno"; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo "$category"; ?></h5>
                <p class="card-text">All the best for Quiz Competition. Hope you will enjoy it.</p>
                <!-- <a href="quiz.php" class="btn btn-primary">View Quiz</a> -->
                <form action="quiz.php" method="post">
                    <button type="submit" name="submit" class="btn btn-primary" value="<?php echo $category; ?>">View Quiz</button>
                </form>
                <!-- <a href="#" class="btn btn-danger">Remove from Saved</a> -->
            </div>
        </div>
        <?php
            }
        ?>
    </div>
<p></p>
    <!-- Footer -->
<?php
    require 'footer.php';
?>
</body>
</html>

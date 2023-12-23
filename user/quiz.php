<?php
require 'navbar.php';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the selected category from the form submission
    $selectedCategory = $_POST['submit'];
    // echo $selectedCategory;

    // Use the selected category to fetch questions from the database
    $query = "SELECT * FROM `questions` WHERE `category` = '$selectedCategory'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        echo "Error retrieving questions: " . mysqli_error($conn);
        exit;
    }

    // Check if there are questions
    if (mysqli_num_rows($result) == 0) {
        echo "No questions available for the selected category.";
        exit;
    }
}
?>

<style>
        body {
            background-color: #f0f0f0;
        }
        .quiz-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            /* margin: 20px; */
        }
        .quiz-question {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .quiz-options label {
            display: block;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        .quiz-options label:hover {
            background-color: #f7f7f7;
        }
        .quiz-options input[type="radio"] {
            display: none;
        }
        .quiz-options label input[type="radio"]:checked + span {
            background-color: #b7c5d2;
            color: #000;
            border: 10px solid #b7c5d2;
            display: block;
        }
        hr {
            border-top: 1px solid #ccc;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border: 1px solid #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5 quiz-container">
        <form method="POST" action="submitQuiz.php">
            <?php
            // Check if $result is defined and not null
            if (isset($result)) {
                $questionNumber = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $questionNumber++;
                    ?>
                    <div class="quiz-question">
                        <p><?php echo "Question $questionNumber: ", $row['question']; ?></p>
                    </div>
                    <div class="quiz-options">
                        <label>
                            <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="1">
                            <span><?php echo $row['option1']; ?></span>
                        </label>
                        <label>
                            <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="2">
                            <span><?php echo $row['option2']; ?></span>
                        </label>
                        <label>
                            <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="3">
                            <span><?php echo $row['option3']; ?></span>
                        </label>
                        <label>
                            <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="4">
                            <span><?php echo $row['option4']; ?></span>
                        </label>
                    </div>
                    <hr>
                    <?php
                }
            } else {
                echo "Error: \$result is not defined.";
            }
            ?>

                <form action="quiz.php" method="post">
                    <button type="submit" name="submit" class="btn btn-primary" value="<?php echo $selectedCategory; ?>">Submit Quiz</button>
                </form>
            <!-- <button type="submit" class="btn btn-primary m-1" name="submit">Submit Quiz</button> -->
        </form>
    </div>

    <?php
    require 'footer.php';
?>

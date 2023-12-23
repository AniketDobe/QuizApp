<?php
require 'navbar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selected category is set
    if(isset($_POST['submit'])) {
        // Get the selected category from the form submission
        $selectedCategory = $_POST['submit'];

        // Use the selected category to fetch correct answers from the database
        $query = "SELECT `id`, `correctanswer` FROM `questions` WHERE `category` = '$selectedCategory'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $score = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $questionId = $row['id'];
                $correctAnswer = $row['correctanswer'];

                // Check if the submitted answer is correct
                if (isset($_POST['answer'][$questionId]) && $_POST['answer'][$questionId] == $correctAnswer) {
                    $score++;
                }
            }

            // Display the score or save it to the database, etc.
            $totalQuestions = mysqli_num_rows($result);
        } else {
            echo "No questions available for the selected category.";
        }
    } else {
        echo "Error: Selected category not provided.";
    }
} else {
    // Redirect to the quiz page if accessed directly without submitting the form
    header('Location: quizzes.php');
    exit;
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
        .result-message {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .score {
            font-size: 36px;
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
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
        <div class="result-message">Quiz Results</div>
        <div class="score">Your score is: <?php echo "$score / $totalQuestions"; ?></div>
        <div class="text-center">
            <a href="quizzes.php" class="btn btn-primary">Back to Quizzes</a>
        </div>
    </div>

    <?php
    require 'footer.php';
?>

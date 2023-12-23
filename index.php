<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer - Test Your Knowledge</title>


    <style>
        .quizimg {
            width: 75%;
        }

        img {
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Quizzer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

<?php
    require 'navbar.php';
?>

<!-- Hero Section -->
<section class="hero bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Test Your Knowledge with Quizzer</h1>
        <p class="lead">A fun and interactive way to learn and challenge yourself.</p>
        <a href="#quiz-section" class="btn btn-light btn-md">Start Quiz</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>About Quizzer</h2>
                <p>Welcome to Quizzer, your go-to destination for fun and educational quizzes. We believe that learning can be enjoyable, and our quizzes are designed to make it so.</p>
                <p>At Quizzer, we cover a wide range of topics, from history and science to pop culture and entertainment. Whether you're looking to test your knowledge or just have some fun, we have quizzes for you.</p>
                <p>Our team is passionate about creating engaging and informative quizzes that cater to all interests and age groups. We strive to provide a user-friendly experience and a platform where everyone can explore, learn, and have a good time.</p>
                <p>Thank you for choosing Quizzer, and we hope you enjoy your quiz journey with us!</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="assets/quiz.png" alt="About Quizzer" class="quizimg img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center">Features</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 p-4">
                    <img src="assets/question.svg" class="card-img-top" alt="Feature 2">
                    <div class="card-body">
                        <h5 class="card-title text-center">Wide Range of Quizzes</h5>
                        <p class="card-text text-center">Explore a variety of quizzes on different topics and interests.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 p-4">
                    <img src="assets/user.svg" class="card-img-top" alt="Feature 3">
                    <div class="card-body">
                        <h5 class="card-title text-center">User-Friendly</h5>
                        <p class="card-text text-center">Our platform is easy to use and accessible for all users.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 p-4">
                    <img src="assets/clock.svg" class="card-img-top" alt="Feature 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Test Your Knowledge</h5>
                        <p class="card-text text-center">Challenge yourself and test your knowledge with our quizzes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <div class="row">
            <div class="col-md-6">
                <p>If you have any questions or feedback, feel free to reach out to us. We'd love to hear from you!</p>
                <p>Email: info@quizzer.com</p>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    require 'footer.php';
?>

</body>
</html>

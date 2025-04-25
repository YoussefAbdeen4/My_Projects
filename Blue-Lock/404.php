<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #031dae;
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 6rem;
            color: #ffffff;
            animation: pulse 1.5s infinite;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #040000;
        }
        .home-btn {
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            background-color: #030b53;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .home-btn:hover {
            background-color: #040000;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>404</h1>
    <h2>Oops! The page you're looking for doesn't exist.</h2>
    <button class="home-btn" onclick="goHome()">Go Back Home</button>
</div>

<script>
    function goHome() {
        // Replace 'index.html' with the path to your home page
        window.location.href = 'index.php';
    }
</script>

</body>
</html>

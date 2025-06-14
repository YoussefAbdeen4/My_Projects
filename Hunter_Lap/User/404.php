<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
        }

        .container {
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }

        h1 {
            font-size: 8em;
            margin-bottom: 10px;
            color: #ff6347; /* Prominent error color */
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #555;
        }

        .home-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #007bff; /* Blue button color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>404</h1>
    <h2>Page Not Found</h2>
    <a href="index.php" class="home-button">Go to Homepage</a>
</div>
</body>
</html>
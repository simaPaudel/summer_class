<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404: Page Not Found</title>
    <style>
        body {
            background-color: #000;
            color: #ffd700;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        a {
            padding: 10px 20px;
            background-color: #ffd700;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a:hover {
            background-color: #e6c200;
        }
    </style>
</head>
<body>
    <h1>404: Page Not Found</h1>
    <p>Oops! The page you’re looking for doesn’t exist.</p>
    <a href="{{ url('/') }}">Back to Home</a>
</body>
</html>

<?php

include('passwordChecker.php');

$passwordStrength = '';
$feedback = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];

    $result = checkPasswordStrength($password);
    $passwordStrength = $result['strength'];
    $feedback = implode("<br>", $result['feedback']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Strength Checker</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .feedback {
            padding: 15px;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .weak {
            background-color: #f8d7da;
            color: #721c24;
        }

        .moderate {
            background-color: #fff3cd;
            color: #856404;
        }

        .strong {
            background-color: #d4edda;
            color: #155724;
        }

        .feedback ul {
            padding-left: 20px;
        }

        .feedback li {
            font-size: 14px;
        }

        .password-strength {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<h1>Password Strength Checker</h1>

<div class="container">
    <form method="post" action="index.php">
        <label for="password">Enter your password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Check Strength</button>
    </form>

    <?php if ($passwordStrength): ?>
        <div class="feedback <?php echo strtolower($passwordStrength); ?>">
            <h3 class="password-strength">Password Strength: <?php echo $passwordStrength; ?></h3>
            <?php if ($feedback): ?>
                <ul>
                    <li><strong>Suggestions:</strong></li>
                    <?php echo $feedback; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</body>

</html>

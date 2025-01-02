<?php

function checkPasswordStrength($password) {
    $strength = 0;
    $feedback = [];

    // Check length
    if (strlen($password) >= 8) {
        $strength += 1;
    }
    if (strlen($password) >= 12) {
        $strength += 1;
    }

    // Check for lowercase characters
    if (preg_match('/[a-z]/', $password)) {
        $strength += 1;
    }

    // Check for uppercase characters
    if (preg_match('/[A-Z]/', $password)) {
        $strength += 1;
    }

    // Check for numbers
    if (preg_match('/\d/', $password)) {
        $strength += 1;
    }

    // Check for special characters
    if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $strength += 1;
    }

    // Check for common passwords
    $commonPasswords = ["123456", "password", "123456789", "qwerty", "abc123"];
    if (in_array($password, $commonPasswords)) {
        $strength -= 2;
        $feedback[] = "This password is too common. Consider using a unique one.";
    }

    // Determine strength level
    if ($strength == 0) {
        return ["strength" => "Very Weak", "feedback" => $feedback];
    } elseif ($strength <= 2) {
        return ["strength" => "Weak", "feedback" => $feedback];
    } elseif ($strength <= 4) {
        return ["strength" => "Moderate", "feedback" => $feedback];
    } else {
        return ["strength" => "Strong", "feedback" => $feedback];
    }
}
?>

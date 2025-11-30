<?php
session_start(); // Initialize session handling for auth state and flash messages
require 'config/db.php'; // Load database connection

// Redirect back to the referrer (or index) with an optional anchor
function redirect_back($anchor = '') {
    $target = $_SERVER['HTTP_REFERER'] ?? 'index.php';
    if ($anchor && strpos($target, '#') === false) {
        $target .= '#' . $anchor;
    }
    header("Location: $target");
    exit;
}

// Only handle POST submissions with a declared form type
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['form_type'])) {
    redirect_back();
}

$formType = $_POST['form_type'];

if ($formType === 'register') {
    // Collect registration inputs
    $name     = trim($_POST['UserName'] ?? '');
    $email    = trim($_POST['Email'] ?? '');
    $password = $_POST['Password'] ?? '';
    $confirm  = $_POST['ConfirmPassword'] ?? '';

    $_SESSION['auth_context'] = 'register'; // Keep register tab open on error

    // Basic required-field checks
    if ($name === '' || $email === '' || $password === '') {
        $_SESSION['auth_error'] = 'All fields are required.';
        redirect_back('register-modal');
    }
    // Email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['auth_error'] = 'Please enter a valid email.';
        redirect_back('register-modal');
    }
    // Password match check
    if ($password !== $confirm) {
        $_SESSION['auth_error'] = 'Passwords do not match.';
        redirect_back('register-modal');
    }

    // Ensure email is unique
    $stmt = $conn->prepare("SELECT UserID FROM `User` WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['auth_error'] = 'This email is already used.';
        $stmt->close();
        redirect_back('register-modal');
    }
    $stmt->close();

    // Store password 
    $stmt = $conn->prepare("INSERT INTO `User` (UserName, Email, PasswordHash) VALUES (?, ?, ?)");
    if (!$stmt) {
        $_SESSION['auth_error'] = 'Could not create account. Please try again.';
        redirect_back('register-modal');
    }
    $stmt->bind_param("sss", $name, $email, $password);
    if (!$stmt->execute()) {
        if ($conn->errno == 1062) {
            $_SESSION['auth_error'] = 'This email is already used.';
        } else {
            $_SESSION['auth_error'] = 'Could not create account. Please try again.';
        }
        $stmt->close();
        redirect_back('register-modal');
    }
    $userId = $stmt->insert_id;
    $stmt->close();

    // Persist logged-in user info and success message
    $_SESSION['user'] = ['UserID' => $userId, 'UserName' => $name, 'Email' => $email];
    $_SESSION['auth_success'] = 'Account created. Welcome, ' . $name . '!';
    unset($_SESSION['auth_error'], $_SESSION['auth_context']);
    redirect_back();
}

if ($formType === 'login') {
    // Collect login inputs
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $_SESSION['auth_context'] = 'login'; // Keep login tab open on error

    // Basic required-field checks
    if ($email === '' || $password === '') {
        $_SESSION['auth_error'] = 'Email and password are required.';
        redirect_back('signin-modal');
    }

    // Fetch user by email
    $stmt = $conn->prepare("SELECT UserID, UserName, Email, PasswordHash FROM `User` WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user   = $result->fetch_assoc();
    $stmt->close();

    // Email not found
    if (!$user) {
        $_SESSION['auth_error'] = 'Invalid email or password.';
        redirect_back('signin-modal');
    }

    $stored = $user['PasswordHash'];
    // Accept plain match or hashed match
    $isValid = ($password === $stored) || password_verify($password, $stored);
    if (!$isValid) {
        $_SESSION['auth_error'] = 'Invalid email or password.';
        redirect_back('signin-modal');
    }

    // Persist logged-in user info and success message
    $_SESSION['user'] = [
        'UserID'   => $user['UserID'],
        'UserName' => $user['UserName'],
        'Email'    => $user['Email'],
    ];
    $_SESSION['auth_success'] = 'Signed in as ' . $user['UserName'];
    unset($_SESSION['auth_error'], $_SESSION['auth_context']);
    redirect_back();
}

// Fallback for unsupported form types
$_SESSION['auth_error'] = 'Invalid request.';
redirect_back();

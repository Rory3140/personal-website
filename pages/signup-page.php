<?php
    include_once '../config.php';
    include_once $connPath;

    // Start the session
    session_start(); 

    $error = '';
    // Process sign up form data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $retypePassword = $_POST['retype-password'];

        // Basic password validation
        if ($password !== $retypePassword) {
            $error = "Passwords do not match. Please try again.";
        } else {
            // Query the database to check if the email or username is already taken
            $query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $error = "Email or username is already taken. Please choose another one.";
            } else {
                // Insert new user into the database
                $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
                if (mysqli_query($conn, $query)) {
                    header('Location: ' . $loginPath);
                    exit;
                } else {
                    $error = "Error: " . mysqli_error($conn);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <link rel="icon" href="<?php echo $websiteIcon; ?>">
</head>

<body>
    <div class="default-container">
        <div class="container-header">
            <h1>Sign Up</h1>
            <a id="login-home" href="<?php echo $homePath; ?>">
                <img id="home-icon" src="<?php echo $homeIcon; ?>" alt="Home Icon">
            </a>
        </div>
        <form action="" method="post">
            <div>
                <label for="username">username</label>
                <input class="textbox" type="text" name="username" required>
            </div>
            <div>
                <label for="email">email</label>
                <input class="textbox" type="email" name="email" required>
            </div>
            <div>
                <label for="password">password</label>
                <input class="textbox" type="password" name="password" required>
            </div>
            <div>
                <label for="retype-password">re-type password</label>
                <input class="textbox" type="password" name="retype-password" required>
            </div>
            <?php if ($error): ?>
                <p class="error">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>
            <input class="button" type="submit" name="submit-button" value="submit">
            <label for="submit-button">already have an account? <a href="<?php echo $loginPath; ?>">Login</a></label>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Rory Wood</p>
        <p>Email: <a href="mailto:rorywood9@live.com">rorywood9@live.com</a></p>
        <p>Website: <a href="http://www.rorywood.co.uk">www.rorywood.co.uk</a></p>
    </footer>

    <script src="<?php echo $jsPath; ?>"></script>
</body>

</html>

<?php
// Close database connection
$conn->close();
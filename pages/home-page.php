<?php
include_once '../config.php';
include_once $connPath;

// Start the session
session_start();

// Check if the user is logged in (userid is stored in the session)
if (isset($_SESSION['userid'])) {
    // Access the userid and username from the session
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <link rel="icon" href="<?php echo $websiteIcon; ?>">
</head>

<body>
    <nav id="nav-bar">
        <div id="menu-icon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <a href="<?php echo $homePath; ?>">
            <img id="home-icon" src="<?php echo $homeIcon; ?>" alt="Home Icon">
        </a>
        <div class="profile-icon">
            <?php
            if (isset($_SESSION['userid'])) {
                echo "<a href=" . $profilePath . "><img src=" . $profileIcon . " alt='Profile Icon'></a>";
            } else {
                echo "<a href=" . $loginPath . " class='button' id='nav-login'>Login</a>";
            }
            ?>
        </div>
    </nav>

    <div id="nav-menu">
        <?php
        if (!isset($_SESSION['userid'])) {
            echo "<a href=" . $loginPath . " class='button' id='login'>Login</a>";
        } else {
            echo "<a href=" . $profilePath . " class='button'>Profile</a>";
            echo "<a href=" . $logoutPath . " class='button' id='logout'>Logout</a>";
        }
        ?>
    </div>

    <div class="default-container wide-container" id="home-container">
        <div class="container-header">
            <h1>Dashboard</h1>
        </div>

        <div class="home-block">
            <?php
            if (isset($_SESSION['userid'])) {
                echo "<h2 id='welcome'>Welcome," . $username . "!</h2>";
            }
            ?>
            <p id="description">This is my personal website which provides a comprehensive overview of my skills and experiences in web development.
                The projects consist of PHP, React, and Javascript projects. For inquiries or project proposals,
                please feel free to reach out. Thank you for exploring my website. </p>
        </div>

        <div class="app-block">
            <a href="<?php echo $resumePath; ?>" class="button app"><span>Resume</span><span>PHP</span></a>
            <a href="<?php echo $bouncingBallPath; ?>" class="button app"><span>Bouncing Ball</span> <span>Javascript</span></a>
            <a href="<?php echo $calculatorPath; ?>" class="button app"><span>Calculator</span> <span>React</span></a>
            <a href="<?php echo $listSelectorPath; ?>" class="button app"><span>To-Do List</span> <span>PHP</span></a>
            <a href="<?php echo $golfStatsPath; ?>" class="button app"><span>Golf Stats</span> <span>PHP</span></a>
        </div>
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

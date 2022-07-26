<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Login System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Roboto+Condensed&family=Roboto+Mono&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/intro.css">
        <link rel="stylesheet" href="css/forms.css">
    </head>
    <body>
        
        <!-- NAVBAR -->
        <nav>
            <ul class="menu general">
                <li><a href="index.php" id="logo">Login System</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="discover.php">Discover</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Log In</a></li>
            </ul>
            <ul class="menu member">
                <!-- A note that php tags work a lot like EJS tags in node. -->
                <?php
                    // If user is logged in, show username and logout button
                    if(isset($_SESSION["_id"])) {
                ?>
                        <li><a href="profile.php"><?php echo $_SESSION["username"]; ?></a></li>
                        <li><a href="logout.php">Log Out</a></li>
                <?php
                    // If user is not logged in, show login and sign up buttons
                    } else {
                ?>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Log In</a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
<?php // no closing tags needed if we're doing a purely php file

include "../debug.php";

// the .inc in this does not do anything. The "inc" is for "includes". 
// The includes folder serves no functionality. It is just a distinction that holds files that aren't seen by the user.

// This file is for grabbing form data and relaying it to the classes in the "classes" folder that actually connect to the database and add the user.


// First, we must check to see the user got here by being redirected through our signup form.
// isset() checks if something is set. $_POST contains the contents of the form submitted using a post method.
// We are checking if all the contents of our form are set. If they are, we can continue.
if(isset($_POST["username"]) && isset($_POST["password"])) {

    // Grabbing form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Instantiate LoginController class
    include "../classes/databasehandler.classes.php";
    include "../classes/login.classes.php";
    include "../classes/logincontroller.classes.php";
    $signup = new LoginController($username, $password);

    // Running error handlers and user signup
    $login->loginUser();

    // Redirecting back to front page
    header("location: ../index.php?error=none");


} else {
    header("location: ../index.php?error=emptyinput");
}


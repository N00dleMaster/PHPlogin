<?php
// login.classes is for making queries and otherwise interacting with the db

// It extends the DBH class, which connects to the db

class Login extends DBH {



    // This method retrieves the user from the database
        // Redirects to index.php if there is a database error
        // This function is used by the LoginController class only after user validation
    protected function getUser($username, $password) {
        // Make prepared statement (connect() method is inherited from DBH class)
        $statement = $this->connect()->prepare('SELECT username, email, password FROM users WHERE username = ?;');

        // If statement fails
        if(!$statement->execute(array($username))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        // If no rows returned (user not found)
        if($statement->rowCount() == 0) {
            $statement = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        // Store the results of the db in a results variable, so we don't have to retype this
        $results = $statement->fetchAll(PDO::FETCH_ASSOC)[0]; // fetchAll() returns an array of arrays, each array containing a row of data 

        // If everything is in order, take the hashed password from db, hash the password the user entered, and compare the two
        $hashedPass = $results["password"]; 
        $checkPass = password_verify($password, $hashedPass); // password_verify() is a built-in php function that hashes the password and compares it to the hashed password in the db

        // Then use $checkPass to see if passwords match or not. Perform appropriate actions
        if(!$checkPass) {
            $statement = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } else {
            // If the password matched, set the session variables and redirect to the home page
            $user = $results;
            session_start(); // This is used to start a user session (send cookie to browser) in php
            $_SESSION["_id"] = $results["_id"]; // Set session superglobal variables
            $_SESSION["username"] = $results["username"];
            $_SESSION["email"] = $results["email"];

            // Set statement to null
            $statement = null;

            // Redirect to home page and exit
            header("location: ../index.php?error=none");
            exit();
        }


    }

}
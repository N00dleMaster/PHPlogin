<?php
// signup.classes is for making queries and otherwise interacting with the db

// It extends the DBH class, which connects to the db

class Signup extends DBH {


    // This method queries the database to see if the email or username is already in use
        // returns false if in use, true if not in use
        // Redirects to index.php if there is a database error
        // This function is used by the SignupController class for user validation.
    protected function checkUser($username, $email) {
        // Use prepared statements to prevent SQL injection
        $statement = this->connect()->prepare('SELECT username FROM users WHERE username=? OR email=?;'); // connect function is from dbh

        // Execute prepared statement, replacing "?" with the variables we want to use (the variables must be entered in an array). Check for errors.
        // The statement returns true or false depending on whether or not it succeeded
        // If it fails:
        if(!$statement->execute(array($username, $email))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed"); // redirect to index.php with error message that index.php will display
            exit(); // exits entire php script
        }

        // If it returns some rows or not:
        $resultCheck;
        if($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return resultCheck;
    }



    // This method inserts the user into the database
        // Redirects to index.php if there is a database error
        // This function is used by the SignupController class only after user validation
    protected function setUser($username, $password, $email) {
        // Make prepared statement
        $statement = this->connect()->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?);');
        // Hash the password before inserting into db!
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // this func built into php
        // If statement fails
        if(!statement->execute(array($username, $hashedPassword, $email))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        // Set statement to null anyway
        $statement = null;
    }

}
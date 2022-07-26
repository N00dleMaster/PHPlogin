<?php
// LoginController, like SignupController is for changing surface level verification and stuff


class LoginController extends Login {

    // Properties
    private $username;
    private $password;

    // Constructor
    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    // Handles errors (empty inputs) and then calls the parent method to actually authenticate
    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit(); // exits script
        }

        $this->getUser($this->username, $this->password); // in login.classes.php because this is where we interact with the db
    }


    // Checks to see if all properties are set
        // Returns boolean value
    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->password)) { // empty() is a built-in php func
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}
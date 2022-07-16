<?php
// SignupController is for changing things in the db


class SignupController {

    // Properties
    private $username;
    private $password;
    private $passwordRepeat;
    private $email;

    // Constructor
    function __construct($username, $password, $passwordRepeat, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }

    // Methods - Checks to see if all properties are set
        // Returns boolean value
    private function emptyInput() {
        $result;
        if(empty(this->username) || empty(this->password) || empty(this->passwordRepeat) || empty(this->email)) { // empty() is a built in php func
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Methods - Checks to see if username is valid
        // Returns boolean value
        // only allows certain characters in username (verified using a regex)
    private function invalidUsername() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) { // see docs for more info on preg_match
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Methods - Checks to see if email is valid
        // Returns boolean value
        // Verified email using regex built into php for emails
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Methods - Check if passwords match
        // returns boolean
    private function passwordsMatch() {
        $result;
        if($this->password == $this->passwordRepeat) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

}
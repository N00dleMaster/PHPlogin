<?php
// Databse class. Open up connection to database


class DBH {

    protected function connect() {
        try {
            // We're using XAMPP on localhost. By default the username and password are "root" and not set, respectively
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password); // Format for connecting to db using PDO
            return $dbh; // dbh = database handler 
        } catch(PDOEception $e) {
            print "Error!: " + e->getMessage() + "<br/>";
            die(); // kills connection to db
        }
    }

}
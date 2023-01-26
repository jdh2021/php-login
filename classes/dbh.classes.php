<?php

// this file sets up database connection to run SQL statements inside database

// no need to create properties or constructor. not creating an objecting based off this class, just need method to refer to afterwards
class Dbh {
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            // run connection dbh - database handler
            $dbh = new PDO('mysql:host=localhost;dbname=phplogin', $username, $password);
            // call on database and return database handler
            return $dbh;
        } catch (PDOException $e) {
            print "Error:" . $e->getMessage() . "<br/>";
            // kills connection afterwards
            die();
        }

    }

}


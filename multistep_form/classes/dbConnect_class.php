<?php

class dbConnect
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            return new PDO('mysql:host=localhost;dbname=multistep_form', $username, $password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
<?php

$dsn = "mysql:host=localhost;dbname=jo";
        $user = "root";
        $pass = "";
        try {
            $db = new PDO($dsn, $user, $pass);
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
<?php

//connection variables
$user = 'root';
$password = 'root';
$db = "accounts";
$host = 'localhost';
$port = 3306;

$link = mysqli_connect($host, $user, $password, $db);

if (!$link) {
    echo 'Error: ' . mysqli_connect_error();
} else {
    echo '<b>Success:</b> A proper connection to MySQL was made! The my_db database is great.<br>';
    echo '<b>Host information:</b> ' . mysqli_get_host_info($link);
}

//create the database
//if ( !$link->query('CREATE DATABASE accounts') ) {
if (!mysqli_query($link, 'CREATE DATABASE accounts')) {
    echo 'Error: ' . mysqli_connect_error();
} else {
    echo 'Luotu uusi tietokanta: accounts.';
}

$luo_taulut = 
' CREATE TABLE `accounts`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`) 
);';

//create users table with all the fields
if (!mysqli_query($link, $luo_taulut)) {
    echo 'Error: ' . mysqli_connect_error();
} else {
    echo 'Luotu taulut tietokantaan accounts.';
}

mysqli_close($link);

?>
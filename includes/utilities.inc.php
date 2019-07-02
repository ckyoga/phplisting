<?php # utilities.inc.php
// This page does the setup and configuration required by every other page.

// Autoload classes from "classes" directory:
function class_loader($class) {
    require('classes/' . $class . '.php');
}
spl_autoload_register('class_loader');

// Start the session:
session_start();

// Check for a user in the session:
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;

// Create the database connection as a PDO object:
try {

    $databaseName = 'test';
    $databaseUser = 'userPHP';
    $databasePassword = 'phppass';

    // Create the object:
    $pdo = new PDO('mysql:host=localhost;dbname='.$databaseName, $databaseUser, $databasePassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) { // Report the error!
    
    $pageTitle = 'Error!';
    include('includes/header.inc.php');
    include('views/error.html');
    include('includes/footer.inc.php');
    exit();
    
}
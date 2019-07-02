<?php # listing.php

// Need the utilities file:
require('includes/utilities.inc.php');

// message that will be displayed when everything is OK :)
$okMessage = 'Listing successfully submitted. ';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. ';

error_reporting(E_ALL & ~E_NOTICE);

// Get POST data
$mlsNumber =  (!empty($_POST['mlsNumber'])? $_POST['mlsNumber'] : '');
$address = (!empty($_POST['address']) ? $_POST['address'] : '');
$description = (!empty($_POST['description']) ? $_POST['description'] : '');

//echo "mls " . $mlsNumber . "<br>";
// Insert the listing:
try {

    // Make sure $mlsNumber is unique
    $sql = "SELECT COUNT(*) FROM listings WHERE mlsNumber = :mlsNumber";
    $result = $pdo->prepare($sql);
    $result->execute(array(':mlsNumber' => $mlsNumber));
//echo "1. " . $sql . "<br>";

    // If unique continue with the Insert
    if (!$result->fetchColumn()) {

        $q = "INSERT INTO listings (mlsNumber, address, description) values (:mlsNumber, :address, :description)";
        $stmt = $pdo->prepare($q);
        $r = $stmt->execute(array(':mlsNumber' => $mlsNumber, ':address' => $address, ':description' => $description));
//echo "2. " . $q . "<br>";

        $responseArray = array('type' => 'success', 'message' => $okMessage);

    } else {

        $responseArray = array('type' => 'mlsunique', 'message' => $errorMessage);
    }

} catch (Exception $e) { // Catch generic Exceptions.
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
    echo "with " . $_SERVER['HTTP_X_REQUESTED_WITH'] . "<br>";
    echo "strlower" . $_SERVER['HTTP_X_REQUESTED_WITH'] . "<br>";
}

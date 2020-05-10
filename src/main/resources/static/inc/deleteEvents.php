<?php

include $_SERVER['DOCUMENT_ROOT'] . '/config/db_credentials.php';

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection was created successfully
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create a query
$query = 'DELETE FROM event_info;';

// Prepare Query
$preparedStatement = mysqli_prepare($conn, $query);

// Execute the query
mysqli_stmt_execute($preparedStatement);

// Check rows were inserted
printf("%d Row changed.\n", mysqli_stmt_affected_rows($preparedStatement));

// Close statement
mysqli_stmt_close($preparedStatement);

// Close Connection
mysqli_close($conn);

header('Location: /postScriptum.php'); 
exit;

?>
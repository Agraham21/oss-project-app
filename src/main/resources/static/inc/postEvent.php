<?php

include $_SERVER['DOCUMENT_ROOT'] . '/config/db_credentials.php';

// Output the test data
echo $_POST["eventTitle"];
echo $_POST["eventLore"];
echo $_POST["eventPlan"];

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection was created successfully
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create a query
$query = 'INSERT INTO event_info (event_title, event_lore, event_plan) VALUES (?, ?, ?);';

// Prepare Query
$preparedStatement = mysqli_prepare($conn, $query);

// Bind Parameters
mysqli_stmt_bind_param($preparedStatement, 'sss', $_POST["eventTitle"], $_POST["eventLore"], $_POST["eventPlan"]);

// Execute the query
mysqli_stmt_execute($preparedStatement);

// Check rows were inserted
printf("%d Row inserted.\n", mysqli_stmt_affected_rows($preparedStatement));

// Close statement
mysqli_stmt_close($preparedStatement);

// Close Connection
mysqli_close($conn);

header('Location: /postScriptum.php'); 
exit;

?>

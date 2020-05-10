<!DOCTYPE html>
<html>

<?php include 'design/header.php'; ?>
<?php include 'config/db_credentials.php'; ?>

<body>

<?php include_once 'design/navbar.php'; ?>

<style>
#container1 {
  min-width: 75%;
  min-height: 100%;
  border-style: solid;
  max-height: 100%;
}
#container2 {
  min-width: 25%;
  min-height: 100%;
  max-height: 100%;
  border-style: solid;
}
</style>

<div class="flex-container">

	<div id="container1">

  <form id="myForm" method="POST" action="inc/postEvent.php">
  Event Title: <input name="eventTitle" type="text">
  Event Plan: <input name= "eventPlan" type="text">
  Event Lore: <input name="eventLore" type="text">
  <input type="submit">
  </form>

  <form method="POST" action="inc/deleteEvents.php">
  <input type="submit" value="Delete All Events">
  </form>

	<?php

  // Create connection
  $conn = mysqli_connect($hostname, $username, $password, $database);

  // Check connection was created successfully
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Create a query
  $query = 'SELECT event_title, event_lore, event_plan FROM event_info;';

  // Prepare Query
  $preparedStatement = mysqli_prepare($conn, $query);

  // Execute the query
  mysqli_stmt_execute($preparedStatement);

  // Save the result set
  $result = mysqli_stmt_get_result($preparedStatement);

  // Loop through the available rows and output
  ?>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <hr>
    <h1><?php echo $row['event_title']; ?></h1>
    <h2>Event Plan</h2>
    <?php echo $row['event_plan']; ?>
    <h2>Event Lore</h2>
    <?php echo $row['event_lore']; ?>
    
  <?php } ?>

  <?php
  // Close statement
  mysqli_stmt_close($preparedStatement);
    
  // Close Connection
  mysqli_close($conn);
  ?>

	</div>

	<div id="container2">
    <a class="twitter-timeline" data-height="100%" data-theme="dark" href="https://twitter.com/PostScriptumGam?ref_src=twsrc%5Etfw">Tweets by PostScriptumGam</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
	</div>

</body>

</html>
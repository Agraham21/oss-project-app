<!DOCTYPE html>
<html>

<?php include 'design/header.php'; ?>

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
	I am container one
	</div>

	<div id="container2">
    <a class="twitter-timeline" data-height="100%" data-theme="dark" href="https://twitter.com/PostScriptumGam?ref_src=twsrc%5Etfw">Tweets by PostScriptumGam</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
	</div>

</body>

</html>
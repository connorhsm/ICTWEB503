<div class="header">
	<h2><a href="index.php">Home</a></h2>
	<h2><a href="login.php">Login</a></h2>
	<h2><a href="register.php">Register</a></h2>
	<h2><a href="index.php?logout='1'">Logout</a></h2>
	<h2><?php if (isset($_SESSION[username])) { echo "Welcome $_SESSION[username]!";} else {echo "You are not logged in!";}?>
</div>
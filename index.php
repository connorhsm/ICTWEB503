<?php
session_start();

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
if (isset($_GET['addnew'])) {
	header("location: addnew.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php include('header.php') ?>

	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php if (isset($_SESSION['username'])) :
			$db = mysqli_connect('localhost', 'username', 'password', 'ICTWEB502');

			$result = mysqli_query($db, "SELECT * FROM contacts");
			echo "<table border='1'><tr><th>Name</th><th>Business</th><th>Phone</th><th>Email</th><th>Postcode</th></tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['business'] . "</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['postcode'] . "</td>";
				echo "<td><a href=\"\">Edit</a></td>";
				echo "<td><a href=\"\">Delete</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			?>
			<p> <a href="index.php?addnew='1'">Add new contact</a> </p>
		<?php endif ?>
	</div>

</body>

</html>
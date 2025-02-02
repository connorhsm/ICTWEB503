<?php 
session_start();
include('server.php');
$loggedInUser = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$loggedInUser' LIMIT 1";
$result = mysqli_query($db, $query);
$ownerID = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add new contact</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php include('header.php') ?>

    <form method="post" action="addnew.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label>OwnerID</label>
            <input type="text" name="ownerID" value="<?php echo $ownerID['id'] ?>" readonly>
        </div>
        <div class="input-group">
            <label>Business</label>
            <input type="text" name="business">
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="number" name="phone">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label>Post code</label>
            <input type="number" name="postcode">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="addContact">Add Contact</button>
        </div>
    </form>
</body>

</html>
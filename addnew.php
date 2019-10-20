<?php include('server.php') ?>
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
            <label>Business</label>
            <input type="text" name="business">
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="tel" name="phone">
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
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
</body>

</html>
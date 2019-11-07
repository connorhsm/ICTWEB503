<?php 
include('server.php');
$id = $_REQUEST['id'];
$db = mysqli_connect('localhost', 'username', 'password', 'ICTWEB502');
$query = "SELECT * FROM contacts WHERE id='$id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add new contact</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('header.php') ?>

    <form method="post" action="editcontact.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>ID</label>
            <input type="number" name="id" value="<?php echo $row['id']; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="input-group">
            <label>Business</label>
            <input type="text" name="business" value="<?php echo $row['business']; ?>">
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="tel" name="phone" value="<?php echo $row['phone']; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="input-group">
            <label>Post code</label>
            <input type="number" name="postcode" value="<?php echo $row['postcode']; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="editContact">Edit Contact</button>
        </div>
    </form>

    <body>

</html>
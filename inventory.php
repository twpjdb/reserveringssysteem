<?php
session_start();

if (!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

//Require DB settings with connection variable
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM inventory";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$inventory = [];
while ($row = mysqli_fetch_assoc($result)) {
    $inventory[] = $row;
}

//Close connection
mysqli_close($db);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Inventory</title>
</head>
<body>
<div class="topnav" id="myTopnav">
    <a href="login.php" class="inactive">Stadslab</a>
    <a href="index.php" class="inactive">Reserveren</a>
    <a href="login.php" class="inactive">Login</a>
    <a href="admin.php" class="inactive">Menu</a>
    <a href="javascript:void(0);" class="icon" onclick="jsNav()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<table id="myTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Item</th>
        <th>Total</th>
        <th>Current</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&copy; Stadslab</td>
    </tr>
    </tfoot>
    <tbody>
<!--    <?php //echo $inventory[0]['id'] ?> -->
    <?php foreach ($inventory as $inventorylist) {
//        $id = $inventory['id'];
        ?>
        <tr>
            <td><?= $inventorylist['id']; ?></td>
            <td><?= $inventorylist['item']; ?></td>
            <td><?= $inventorylist['total']; ?></td>
            <td><?= $inventorylist['current']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script src="js/topnav.js"></script>
</body>
</html>

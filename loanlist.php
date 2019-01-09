<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

//Require DB settings with connection variable
   require_once "includes/database.php";



//Get the result set from the database with a SQL query
    $query = "SELECT * FROM loan_list";
    $result = mysqli_query($db, $query);

//Loop through the result to create a custom array
    $loan_list = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $loan_list[] = $row;
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
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <title>Loan list</title>
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
        <th>Items</th>
        <th>Datum uit</th>
        <th>Datum in</th>
        <th>Te laat?</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="10">&copy; Stadslab</td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($loan_list as $loans) {
        ?>
        <tr>
            <td><?= $loans['id']; ?></td>
            <td><?= $loans['items']; ?></td>
            <td><?= $loans['datum uit']; ?></td>
            <td><?= $loans['datum in']; ?></td>
            <td><?= $loans['te laat']; ?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script src="js/topnav.js"></script>
</body>
</html>

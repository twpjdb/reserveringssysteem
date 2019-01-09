<?php
require_once('includes/database.php');




?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">



</head>
<body>
<title>Reserveren</title>

<nav class="topnav" id="myTopnav">
    <a href="https://www.stadslabrotterdam.nl" class="inactive">Stadslab</a>
    <a href="index.php" class="active">Reserveren</a>
    <a href="login.php" class="inactive">Login</a>
    <a href="javascript:void(0);" class="icon" onclick="jsNav()">
        <i class="fa fa-bars"></i>
    </a>
</nav>

<div class="header">
    <h2>Reserveren</h2>
</div>

<form method="post" action="">
    <div>
        <?php include('errors.php')?>
    </div>
    <div class="input-group">
        <label for="email">HR E-mail</label>
        <input type="email" name="email" id="email">
    </div>
    <select>
        <option value="volvo">Arduino</option>
        <option value="saab">Raspberry Pi v2</option>
        <option value="mercedes">Bread board</option>
        <option value="audi">Force sensing resistor</option>
    </select>

    <div class="input-group">
        <label for="date-start">Begin datum</label>
        <input type="date" name="date-start" id="date-start">
    </div>
    <div class="input-group">
        <label for="date-end">Eind datum</label>
        <input type="date" name="date-end" id="date-end">
    </div>
    <p class="error-date" id="date-verified">Het leentermijn is 2 weken</p>
    <div class="btn1cont" align="center">
        <input type="submit" class="btn1" name="submit" value="Reserveren"/>
    </div>
</form>




<script src="js/topnav.js"></script>
<script src="js/datepicker.js"></script>

</body>
</html>

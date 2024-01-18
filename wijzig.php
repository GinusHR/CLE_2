<?php
session_start();
 if (!isset($_SESSION['user'])) {
     header('Location: login.php');
     exit;
 }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Viktoria Schoonmaakbedrijf - Wijzig afspraken</title>
</head>
<body>
<header>
    <?php
    include_once 'includes/nav.php';
    ?>
</header>
<div class="bigtext">
    <div>
        <p>Wijzig afspraken</p>
    </div>
</div>

<footer>
    <?php
    include_once 'includes/footer.php';
    ?>
</footer>
</body>



</html>
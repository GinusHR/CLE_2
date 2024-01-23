<?php
require_once 'includes/database.php';
/** @var mysqli $db */

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=deleteTaak.php?id='.$_GET['id']);
    exit;
}
if(!key_exists('id', $_GET))
{
    header("Location: taken.php");
    exit();
}

$id = htmlentities($_GET['id']);
$query = "SELECT * FROM jobs WHERE id = '$id'";
$result = mysqli_query($db, $query);
$job = mysqli_fetch_assoc($result);

$email = $_SESSION['user']['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
$user_info = mysqli_fetch_assoc($result);

if(!$job || ($user_info['admin'] != '1'))
{
    header("Location: taken.php");
    exit;
}

if (isset($_POST['submit'])) {
    if (empty($errors) && $_POST['submit'] == 'submit') {
        $query = "DELETE FROM `jobs`
        WHERE `id` = $id";
        $success = mysqli_query($db, $query) or die('Error:' . mysqli_error($db));
    }
    header("Location: taken.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/afspraken.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Viktoria Schoonmaakbedrijf - Wijzigen</title>
</head>
<body>
<header>
    <?php
    include_once 'includes/nav.php';
    ?>
</header>

<div class="div0" >

    <div class="bigtext">
        <p>Taak verwijderen</p>
    </div>

    <form class="form2" action="" method="post">
        <div class="smalltaxt">
            <p>Weet u zeker dat u taak <b><?php echo $job['name'] ?> (€<?php echo $job['price']?>/hr)</b>
                wilt verwijderen?</p>
        </div>

        <div class="div2">
            <div class="div2/5">
                <button class="form-knop" type="submit" name="submit" value="submit">
                    Verwijder
                </button>
                <button class="form-knop" type="submit" name="submit" value="back">
                    &laquo; Terug
                </button>
            </div>
        </div>

    </form>

</div>

</body>

<footer>
    <?php
    include_once 'includes/footer.php';
    ?>

</footer>

</html>
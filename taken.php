<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['user']))
{
    header("Location: login.php?location=taken.php");
    exit;
}

require_once 'includes/database.php';
/** @var $db */

$email = $_SESSION['user']['email'];

$query = "SELECT admin FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
$user_admin = mysqli_fetch_assoc($result)['admin'];

if($user_admin != '1')
{
    header("Location: wijzig.php");
    exit;
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($db, $query);
$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <link rel="stylesheet" href="styles/wijzig.css">
    <title>Viktoria Schoonmaakbedrijf - Wijzig afspraken</title>
</head>
<body>
<header>
    <?php
    include_once 'includes/nav.php';
    ?>
</header>

<main class="wijzigMain">
    <div class="backgroundDiv">
        <div class="bigtext">
            <div>
                <p>Taken</p>
            </div>
        </div>

        <div class="tableLink">
            <a href="addTaak.php">Voeg een taak toe</a>
        </div>
        <br>
        <?php if(!empty($jobs)): ?>
            <table class="wijzigTable">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Omschrijving</th>
                        <th>Prijs</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($jobs as $job):
                ?>
                    <tr>
                        <th><?php echo $job['name']?></th>
                        <th><?php echo $job['description']?></th>
                        <th>€<?php echo $job['price']?>/hr</th>
                        <th class="tableLink"><a href="editTaak.php?id=<?php echo $job['id']?>">Wijzig</a></th>
                        <th class="tableLink"><a href="deleteTaak.php?id=<?php echo $job['id']?>">Verwijder</a></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
        <div class="smalltaxt">
            <div>
                <p>Geen taken gevonden...</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>

<footer>
    <?php
    include_once 'includes/footer.php';
    ?>
</footer>
</body>



</html>
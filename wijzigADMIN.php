<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['user']))
{
    header("Location: login.php?location=wijzigADMIN.php");
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

$query = "SELECT * FROM dates";
$result = mysqli_query($db, $query);
$dates = mysqli_fetch_all($result);


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
                <p>Wijzig afspraken</p>
            </div>
        </div>
        <?php if(!empty($dates)): ?>
            <table class="wijzigTable">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Locatie</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($dates as $date):
                    $datetime = explode(" ", $date[4]);
                    $query = "SELECT * FROM users WHERE id = '$date[1]'";
                    $result = mysqli_query($db, $query);
                    $user = mysqli_fetch_assoc($result);
                ?>
                    <tr>
                        <th><?php echo $user['name']?></th>
                        <th><?php echo $user['email']?></th>
                        <th><?php echo $datetime[0]?></th>
                        <th><?php echo substr($datetime[1], 0, -3)?></th>
                        <th><?php echo $date[2]?>
                        <th class="tableLink"><a href="edit.php?id=<?php echo $date[0]?>">Wijzig</a></th>
                        <th class="tableLink"><a href="delete.php?id=<?php echo $date[0]?>">Cancel</a></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
        <div class="smalltaxt">
            <div>
                <p>Geen afspraken gevonden...</p>
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
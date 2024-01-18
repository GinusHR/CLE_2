<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['user']))
{
    header("Location: login.php?location=wijzig.php");
    exit;
}

require_once 'includes/database.php';
/** @var $db */

$email = $_SESSION['user']['email'];

$query = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
$user_id = mysqli_fetch_assoc($result)['id'];

if(!$user_id)
{
    //TODO: add stuff for when user exists but user_id does not.
}

$query = "SELECT * FROM dates where user_id = '$user_id'";
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
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($dates as $date):
                    $datetime = explode(" ", $date[4]);?>
                    <tr>
                        <th><?php echo $datetime[0]?></th>
                        <th><?php echo substr($datetime[1], 0, -3)?></th>
                        <th><?php echo $date[2]?>
                        <th class="tableLink"><a href="edit.php?<?php echo $date[0]?>">Wijzig</a></th>
                        <th class="tableLink"><a href="delete.php?<?php echo $date[0]?>">Cancel</a></th>
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
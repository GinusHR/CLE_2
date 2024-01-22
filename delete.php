<?php
require_once 'includes/database.php';
/** @var mysqli $db */

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=delete.php?id='.$_GET['id']);
    exit;
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($db, $query);
$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(!key_exists('id', $_GET))
{
    header("Location: wijzig.php");
    exit();
}

$id = htmlentities($_GET['id']);
$query = "SELECT * FROM dates WHERE id = '$id'";
$result = mysqli_query($db, $query);
$date = mysqli_fetch_assoc($result);

$email = $_SESSION['user']['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
$user_info = mysqli_fetch_assoc($result);

if(!$date || ($user_info['admin'] != '1' && $user_info['id'] != $date['user_id']))
{
    header("Location: wijzig.php");
    exit;
}

$user_id = $date['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($db, $query);
$date_user = mysqli_fetch_assoc($result);



$job_id = $date['job_id'];

$query = "SELECT name FROM jobs where id = '$job_id'";
$result = mysqli_query($db, $query);
$selected_job = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    if (empty($errors) && $_POST['submit'] == 'submit') {
        $query = "DELETE FROM `dates`
        WHERE `id` = $id";
        $success = mysqli_query($db, $query) or die('Error:' . mysqli_error($db));
    }
    header("Location: wijzig.php");
    exit();
}


mysqli_close($db);
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
        <p>Afspraak cancelen</p>
    </div>

    <form class="form2" action="" method="post">
        <div class="smalltaxt">
            <p>Weet u zeker dat u afspraak <b><?php echo $date['location'] ?> (<?php echo $date['datetime']?>)</b>
                <?php if($user_info['admin'] == 1){
                    echo "van <b>".$date_user['name']."</b> ";
                } ?>
                wilt cancelen?</p>
        </div>

        <div class="div2">
            <div class="div2/5">
                <button class="form-knop" type="submit" name="submit" value="submit">
                    Cancel
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
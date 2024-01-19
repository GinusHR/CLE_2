<?php
require_once 'includes/database.php';
/** @var mysqli $db */

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=edit.php?id='.$_GET['id']);
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
$job_id = $date['job_id'];

$query = "SELECT name FROM jobs where id = '$job_id'";
$result = mysqli_query($db, $query);
$selected_job = mysqli_fetch_assoc($result);
//TODO: handle non-existent $date

//TODO: update date in database

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
        <p>Wijzig een afspraak</p>

    </div>

    <form class="form2" action="" method="post">
        <div class="div_ultra">
            <div class="div1">

                <div class="locatieDiv">
                    <div>
                        <label for="location">Locatie</label>
                    </div>

                    <div>
                        <input id="location" name="location" type="text" value="<?php echo $date['location'] ?>"required>
                    </div>
                </div>



                <div class="omschrijvingDiv">
                    <div>
                        <label for="omschrijving">Omschrijving</label>
                    </div>

                    <div>
                        <textarea name="omschrijving" id="omschrijving" cols="30" rows="10"><?php echo $date['description'] ?></textarea>
                    </div>
                </div>



            </div>

            <div class="div2">
                <div class="div2/5">

                    <div class="datumDiv">
                        <div>
                            <label for="date">Datum</label>
                        </div>

                        <div>
                            <input class="input2" id="date" name="date" type="date" value="<?php echo explode(" ", $date['datetime'])[0] ?>" required>
                        </div>

                    </div>
                    <p>&</p>
                    <div class="tijdDiv">
                        <div>
                            <label for="time">Tijd</label>
                        </div>

                        <div >
                            <input class="input2" id="time" name="time" type="time" value="<?php echo explode(" ", $date['datetime'])[1] ?>" required>
                        </div>
                    </div>

                </div>


                <div class="soortDiv">
                    <div>
                        <label for="job">Soort afspraak</label>
                    </div>

                    <div>
                        <select id="job" name="job">
                            <option value=""></option>
                        <?php foreach($jobs as $job): ?>
                            <option
                                value="<?php echo $job['name']?>"
                                <?php if($job['name'] == $selected_job['name']) echo 'selected';?>
                            >
                                <?php echo $job['name']?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <input class="form-knop" type="submit">

    </form>

</div>

</body>

<footer>
    <?php
    include_once 'includes/footer.php';
    ?>

</footer>

</html>
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

$success = false;

if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $datetime = $_POST['date'] ." ". $_POST['time'];
    $description = $_POST['omschrijving'];
    $job_id = $_POST['job'];
    $job_price = 0;

    foreach($jobs as $job)
    {
        if($job['id'] == $job_id)
        {
            $job_price = $job['price'];
            break;
        }
    }
    $hours = $_POST['hours'];
    $user_id = $_SESSION['user']['id'];

    $price = $job_price * $hours;

    $errors = [];
    if($location == '') {
        $errors['location'] = 'Voer de locatie in';
    }

    if($datetime == '') {
        $errors['date']['time'] = 'Voer de datum en tijd in';
    }

    if($price == '') {
        $errors['price'] = 'Selecteer de prijs';
    }

    if($hours == '') {
        $errors['hours'] = 'Kies het aantal uur';
    }


    if (empty($errors)) {
        $query = "UPDATE `dates`
        SET `job_id` = $job_id, `location` = '$location', `description` = '$description', `datetime` = '$datetime', `price` = $price, `hours` = $hours
        WHERE `id` = $id";
        $success = mysqli_query($db, $query) or die('Error:' . mysqli_error($db));
    }
    $query = "SELECT * FROM dates WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    $date = mysqli_fetch_assoc($result);
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


<?php if($success): ?>
    <div class="bigtext">
        <p>Afspraak succesvol gewijzigd.</p>
    </div>
<?php endif; ?>

<div class="div0" >

    <div class="bigtext">
        <p>Edit een afspraak</p>

    </div>

    <form class="form2" action="" method="post">
        <div class="div_ultra">
            <div class="div1">

                <div class="locatieDiv">
                    <div>
                        <label for="location">Locatie</label>
                    </div>

                    <div>
                        <input id="location" name="location" type="text" value="<?php echo $date['location'] ?>" required>
                        <?= $errors['location'] ?? '' ?>
                    </div>
                </div>



                <div class="omschrijvingDiv">
                    <div>
                        <label for="omschrijving">Omschrijving</label>
                    </div>

                    <div>
                        <textarea name="omschrijving" id="omschrijving" cols="39" rows="10"><?php echo $date['description'] ?></textarea>
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
                            <?= $errors['date'] ?? '' ?>
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
                                        value="<?php echo $job['id']?>"
                                    <?php if($job['name'] == $selected_job['name']) echo 'selected';?>
                                >
                                    <?php echo $job['name']?> (€<?php echo $job['price']?>/hr)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?= $errors['soort'] ?? '' ?>
                    </div>

                    <div>
                        <label for="hours">Uren</label>
                    </div>

                    <div>
                        <input id="hours" name="hours" type="number" min="1" max="10" value="<?php echo $date['hours'] ?>" required>
                        <?= $errors['hours'] ?? '' ?>
                    </div>
                </div>

            </div>
        </div>

        <button class="form-knop" type="submit" name="submit">
            Wijzig
        </button>

    </form>

</div>

</body>

<footer>
    <?php
    include_once 'includes/footer.php';
    ?>

</footer>

</html>
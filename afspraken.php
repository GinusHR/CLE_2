<?php
/** @var mysqli $db */

require_once 'includes/database.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=afspraken.php');
    exit;
}

$query = "SELECT * FROM jobs";
$result = mysqli_query($db, $query);
$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
$success = false;

if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $datetime = $_POST['date'] ." ". $_POST['time'];
    $description = $_POST['omschrijving'];
    $job_id = $_POST['job'];
    $job_price = 0;

    if($job_id == 0)
    {
        return;
    }

    foreach($jobs as $job)
    {
        if($job['id'] == $job_id)
        {
            $job_price = $job['price'];
            break;
        }
    }
    $hours = $_POST['hours'];
    $id = $_SESSION['user']['id'];

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
        $query = "INSERT INTO `dates` (user_id, job_id, location, description, datetime, price, hours)
                VALUES ($id, $job_id, '$location', '$description', '$datetime', $price, $hours)";
        $result = mysqli_query($db, $query) or die('Error:' . mysqli_error($db));
    }
    $success = true;
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
    <title>Viktoria Schoonmaakbedrijf - Afspraken</title>
</head>
<body>
    <header>
        <?php
            include_once 'includes/nav.php';
        ?>
    </header>

    <?php if($success): ?>
    <div class="bigtext">
        <p>Afspraak succesvol toegevoegd.</p>
    </div>
    <?php endif; ?>

<div class="div0" >

    <div class="bigtext">
        <p>Maak een afspraak</p>

    </div>

    <form class="form2" action="" method="post">
        <div class="div_ultra">
            <div class="div1">

                <div class="locatieDiv">
                    <div>
                        <label for="location">Locatie</label>
                    </div>

                    <div>
                        <input id="location" name="location" type="text" required>
                            <?= $errors['location'] ?? '' ?>
                    </div>
                </div>



                <div class="omschrijvingDiv">
                    <div>
                        <label for="omschrijving">Omschrijving</label>
                    </div>

                    <div>
                        <textarea name="omschrijving" id="omschrijving" cols="39" rows="10"></textarea>
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
                        <input class="input2" id="date" name="date" type="date"  required>
                    </div>

                </div>
                    <p>&</p>
                <div class="tijdDiv">
                    <div>
                        <label for="time">Tijd</label>
                    </div>

                    <div >
                        <input class="input2" id="time" name="time" type="time" required>
                        <?= $errors['date'] ?? '' ?>
                    </div>
                </div>

            </div>


            <div class="soortDiv">
                <div>
                    <label for="job">Soort afspraak</label>
                </div>

                <div>
                    <select id="job" name="job" required>
                        <option value=""></option>
                        <?php foreach($jobs as $job): ?>
                            <option value="<?php echo $job['id']?>">
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
                    <input id="hours" name="hours" type="number" min="1" max="10" value="1" required>
                    <?= $errors['hours'] ?? '' ?>
                </div>
            </div>

        </div>
        </div>

        <button class="form-knop" type="submit" name="submit">
            Verzenden
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
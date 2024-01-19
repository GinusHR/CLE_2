<?php
/** @var mysqli $db */

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=afspraken.php');
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
                        <input class="input2" id="date" name="date" type="date" required>
                    </div>

                </div>
                    <p>&</p>
                <div class="tijdDiv">
                    <div>
                        <label for="time">Tijd</label>
                    </div>

                    <div >
                        <input class="input2" id="time" name="time" type="time" required>
                    </div>
                </div>

            </div>


            <div class="soortDiv">
                <div>
                    <label for="soort">Soort afspraak</label>
                </div>

                <div>
                    <input id="soort" name="soort" type="text" required>
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
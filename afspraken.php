<?php

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
<div class="formdiv">
    <form action="" method="post">

        <div>

            <div>
                <label for="name">Naam</label>
            </div>

            <div>
                <input id="name" name="name" type="text" required>
            </div>

            <div>
                <label for="email">Email</label>
            </div>

            <div>
                <input id="email" name="email" type="email" required>
            </div>
        </div>




        <div>
            <div>
                <div>
                    <label for="date">Datum</label>
                </div>

                <div>
                    <input id="date" name="date" type="date" required>
                </div>

                <div>
                    <label for="time">Tijd</label>
                </div>

                <div>
                    <input id="time" name="time" type="time" required>
                </div>

            </div>


            <div>
                <label for="location">Locatie</label>
            </div>

            <div>
                <input id="location" name="location" type="text" required>
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
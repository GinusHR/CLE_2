<?php



if(isset($_POST['submit'])) {
    // Get form data
    /** @var $db */
    require_once 'includes/database.php';
    $naam = mysqli_real_escape_string($db, $_POST['naam']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);

    // Server-side validation
    $errors = [];
    if($naam == '') {
        $errors['naam'] = 'Voer uw naam in.';
    }
    if($email == '') {
        $errors['email'] = 'Voer uw email in.';
    }
    if($wachtwoord == '') {
        $errors['wachtwoord'] = 'Voer een wachtwoord in.';
    }

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    if($user) {
        $errors['email'] = 'Dit email is al in gebruik.';
    }

    if (empty($errors)) {
        //INSERT in DB
        $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (`name`, `email`, `password`)
                    VALUES('$naam', '$email', '$wachtwoord')";
        $result = mysqli_query($db, $query);

        if ($result) {
            $success = 'Gebruiker ' . htmlentities($_POST['naam']) . ' succesvol geregistreerd!';
        } else {
            $errors['db'] = mysqli_error($db);
        }
        mysqli_close($db);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viktoria Schoonmaakbedrijf - Registrate</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <?php
        include_once 'includes/nav.php';
    ?>
</header>
<main class="registratieMain">
    <section>
        <div class="bigtext">
            <div>
                <p>Registreer</p>
            </div>
        </div>
        <?php
        if (isset($errors['db'])) {
            echo $errors['db'];
        } elseif (isset($success)) {
            echo $success;
        }
        ?>
        <div class="formdiv">
            <form action="" method="post">
                <div class="veld">
                    <div >
                        <div>
                            <label for="naam">Naam</label>
                        </div>
                        <div>
                            <input name="naam" id="naam" type="text" placeholder="Naam" required>
                        </div>
                    </div>
                    <div >
                        <div>
                            <label for="email">Email</label>
                        </div>
                        <div>
                            <input name="email" id="email" type="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div >
                        <div>
                            <label for="wachtwoord">Wachtwoord</label>
                        </div>
                        <div>
                            <input name="wachtwoord" id="wachtwoord"  type="password" placeholder="Wachtwoord" required>
                        </div>
                    </div>
                    <div>
                        <input class="form-knop" type="submit" name="submit" value="submit">
                    </div>
                    <div class="registratieErrors">
                        <p><?= $errors['naam'] ?? '' ?></p>
                        <p><?= $errors['email'] ?? '' ?></p>
                        <p><?= $errors['wachtwoord'] ?? '' ?></p>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <?php
        include_once 'includes/footer.php';
        ?>
    </footer>
</main>
</body>
</html>

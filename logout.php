<?php
/** @var mysqli $db */

session_start();

require_once 'includes/database.php';

if (isset($_POST['submit'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
if(!key_exists('user', $_SESSION))
{
    header('Location: index.php');
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
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Viktoria Schoonmaakbedrijf - Logout</title>
</head>


<body>

<header>
    <?php
        include_once 'includes/nav.php';
    ?>
</header>

<section>
    <div class="bigtext">
        <div>
            <p>Log out</p>
        </div>
        <div class="smalltaxt">
            <p>Weet u zeker dat u wilt uitloggen?</p>
        </div>
    </div>
    <div class="formdiv">
        <form action="" method="post">
            <div class="veld">
                <div>
                    <button class="form-knop" type="submit" name="submit">
                        Log out
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

</body>

<footer>
    <?php
    include_once 'includes/footer.php';
    ?>
</footer>

</html>

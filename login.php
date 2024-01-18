<?php
/** @var mysqli $db */

session_start();

require_once 'includes/database.php';

$login = false;

$emailError = '';
$passwordError = '';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($_POST['email'])) {
        $emailError = 'Email cannot be empty!';

    }

    if (empty($_POST['password'])) {
        $passwordError = 'Password cannot be empty!';
    }

    if (empty($emailError) && empty($passwordError)) {

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $query);

        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'name' => $user['name'],
                        'email' => $user['email'],
                    ];
                    $login = true;
                    header('Location:index.php');
                } else {
                    $errors['loginFailed'] = 'Incorrect login credentials';
                }
            } else {
                $errors['loginFailed'] = 'Incorrect login credentials';
            }

        } else {
            $errors['loginFailed'] = 'Incorrect login credentials';
        }

    } else {
        die('Database query error: ' . mysqli_error($db));
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
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Viktoria Schoonmaakbedrijf-login</title>
</head>


<body>

<header>
    <?php
     include_once 'includes/nav.php';
    ?>
</header>
<section>

    <?php if($login) {?>
        <div class="bigtext">
            <div>
                <p>U bent al ingelogd</p>
            </div>
            <div class="smalltaxt">
                <p>U kunt nu afspraken maken</p>
            </div>
            <div class="linkdiv">
                Naar <a href="afspraken.php">Afspraken</a>
            </div>
        </div>

    <?php } else {?>

    <div class="formdiv">
        <form action="" method="post">
            <div class="bigtext">
                <div>
                    <p>U moet nog inloggen</p>
                </div>
                <div class="smalltaxt">
                    <p>U moet ingelogd zijn om een afspraak te maken.</p>
                </div>

            </div>

            <div class="veld">
                <div >
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <div>
                        <input name="email" id="email" type="email" placeholder="Email bvb. naam@org.nl" value="<?= $email ?? '' ?> " required>
                       <div class="error">
                           <?= $emailError ?>
                       </div>
                    </div>

                </div>
                <div >
                    <div>
                        <label for="password">Wachtwoord</label>
                    </div>
                    <div>
                        <input name="password" id="password"  type="password" placeholder="Wachtwoord" value="<?= $password ?? '' ?>" required>
                        <div class="error">
                            <?= $passwordError ?>
                        </div>
                    </div>

                </div>

                <div>
                    <button type="submit" value="submit" name="submit" class="form-knop">
                        Log in
                    </button>
                </div>

                <div  class="linkdiv">
                    <p>Nog geen account? <a href="registratie.php">Registreer</a> hier.</p>
                </div>
            </div>



        </form>
        <?php } ?>
    </div>

</section>


</body>
  <?php
    include_once 'includes/footer.php';
  ?>
</html>

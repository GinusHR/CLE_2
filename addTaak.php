<?php
require_once 'includes/database.php';
/** @var mysqli $db */

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=addTaak.php?id='.$_GET['id']);
    exit;
}

$email = $_SESSION['user']['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
$user_info = mysqli_fetch_assoc($result);

if(($user_info['admin'] != '1'))
{
    header("Location: taken.php");
    exit;
}

$success = false;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];


    $errors = [];
    if($name == '') {
        $errors['name'] = 'Voer een naam in';
    }

    if($description == '') {
        $errors['description'] = 'Voeg een omschrijving toe';
    }

    if($price == '') {
        $errors['price'] = 'Selecteer een prijs';
    }


    if (empty($errors)) {
        $query = "INSERT INTO `jobs` (name, description, price) 
        VALUES ('$name', '$description', $price)";
        $success = mysqli_query($db, $query) or die('Error:' . mysqli_error($db));
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
        <p>Taak succesvol toegevoegd.</p>
    </div>
<?php endif; ?>

<div class="div0" >

    <div class="bigtext">
        <p>Maak een taak</p>

    </div>

    <form class="form2" action="" method="post">
        <div class="div_ultra">
            <div class="div1">

                <div class="locatieDiv">
                    <div>
                        <label for="name">Naam</label>
                    </div>

                    <div>
                        <input id="name" name="name" type="text" value="" required>
                        <?= $errors['name'] ?? '' ?>
                    </div>
                </div>



                <div class="omschrijvingDiv">
                    <div>
                        <label for="description">Omschrijving</label>
                    </div>

                    <div>
                        <textarea name="description" id="description" cols="39" rows="10"></textarea>
                        <?= $errors['description'] ?? '' ?>
                    </div>
                </div>


                    <div>
                        <label for="price">Prijs per uur</label>
                    </div>

                    <div>
                        €<input id="price" name="price" type="number" step=0.01 min="0.00" value="0.00" required>
                        <?= $errors['price'] ?? '' ?>
                    </div>
                </div>
            </div>

        <button class="form-knop" type="submit" name="submit">
            Toevoegen
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
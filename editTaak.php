<?php
require_once 'includes/database.php';
/** @var mysqli $db */

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php?location=editTaak.php?id='.$_GET['id']);
    exit;
}

if(!key_exists('id', $_GET))
{
    header("Location: taken.php");
    exit;
}

$id = htmlentities($_GET['id']);
$query = "SELECT * FROM jobs WHERE id = '$id'";
$result = mysqli_query($db, $query);
$job = mysqli_fetch_assoc($result);

$email = $_SESSION['user']['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);
$user_info = mysqli_fetch_assoc($result);

if(!$job || ($user_info['admin'] != '1'))
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
        $errors['description'] = 'Voer een omschrijving toe';
    }

    if($price == '') {
        $errors['price'] = 'Selecteer een prijs';
    }


    if (empty($errors)) {
        $query = "UPDATE `jobs`
        SET `name` = '$name', `description` = '$description', `price` = $price
        WHERE `id` = $id";
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
        <p>Taak succesvol gewijzigd.</p>
    </div>
<?php endif; ?>

<div class="div0" >

    <div class="bigtext">
        <p>Edit een taak</p>

    </div>

    <form class="form2" action="" method="post">
        <div class="div_ultra">
            <div class="div1">

                <div class="locatieDiv">
                    <div>
                        <label for="name">Naam</label>
                    </div>

                    <div>
                        <input id="name" name="name" type="text" value="<?php echo $job['name'] ?>" required>
                        <?= $errors['name'] ?? '' ?>
                    </div>
                </div>



                <div class="omschrijvingDiv">
                    <div>
                        <label for="description">Omschrijving</label>
                    </div>

                    <div>
                        <textarea name="description" id="description" cols="39" rows="10"><?php echo $job['description'] ?></textarea>
                        <?= $errors['description'] ?? '' ?>
                    </div>
                </div>


                    <div>
                        <label for="price">Prijs per uur</label>
                    </div>

                    <div>
                        €<input id="price" name="price" type="number" step=0.01 min="0.00" value="<?php echo $job['price'] ?>" required>
                        <?= $errors['price'] ?? '' ?>
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
<nav>
    <div class="navlinks">
        <span class="navCompanyName">Viktoria Schoonmaakbedrijf</span>
        <a href="index.php">Home</a>
        <a href="afspraken.php">Afspraken</a>
        <a href="wijzig.php">Wijzig afspraak</a>
        <?php
        if(!isset($_SESSION))
        {
            session_start();
        }
        require_once 'includes/database.php';
        /** @var $db */
        $email = $_SESSION['user']['email'];

        $query = "SELECT admin FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        $user_admin = mysqli_fetch_assoc($result)['admin'];

        if($user_admin == '1')
        {
            echo '<a href="taken.php">Taken</a>';
        }
        ?>
        <a href="agenda.php">Agenda</a>
        <a href="overOns.php">Over Ons</a>
        <a href="contact.php">Contact</a>

    </div>
    <div class="navLoginLinks">
        <a href="logout.php">Uitloggen</a>
    </div>
</nav>

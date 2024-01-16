<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['user']))
{
    include_once 'includes/login_nav.php';
}
else{
?>
<nav>
    <div class="navlinks">
        <span class="navCompanyName">Viktoria Schoonmaakbedrijf</span>
        <a href="index.php">Home</a>
        <a href="afspraken.php">Afspraken</a>
        <a href="overOns.php">Over Ons</a>
        <a href="contact.php">Contact</a>
    </div>
    <div class="navLoginLinks">
        <a href="login.php">Login</a>
        <a href="registratie.php">Registreer</a>
    </div>
</nav>
<?php } ?>
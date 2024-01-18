<?php

session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viktoria Schoonmaakbedrijf- About us</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
    <style>

        .introOverOns {
            background-color: #E4DBD2;
            margin: 0 15vw;
            padding: 2vw;
            border: #E4DBD2 1px solid;
            border-radius: 15px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: #cebeaf;

        }

        /* The actual timeline (the vertical ruler) */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: white;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        /* Container around content */
        .container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        /* The circles on the timeline */
        .container::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: white;
            border: 4px solid #FF9F55;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        /* Place the container to the left */
        .left {
            left: 0;
        }

        /* Place the container to the right */
        .right {
            left: 50%;
        }

        /* Add arrows to the left container (pointing right) */
        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        /* Add arrows to the right container (pointing left) */
        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        /* Fix the circle for containers on the right side */
        .right::after {
            left: -16px;
        }

        /* The actual content */
        .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {
            /* Place the timelime to the left */
            .timeline::after {
                left: 31px;
            }

            /* Full-width containers */
            .container {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .container::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left::after, .right::after {
                left: 15px;
            }

            /* Make all right containers behave like the left ones */
            .right {
                left: 0%;
            }
        }
    </style>

</head>

<body>
<header>
    <?php
    include_once 'includes/nav.php';
    ?>
</header>

<main>
    <div>
        <section>
            <h1 class="bigtext">Ons Verhaal</h1>
            <div class="introOverOns">
                <p>
                    Ons bedrijf is geboren uit een streven naar kwaliteit en klanttevredenheid, gedreven door de overtuiging dat een opgeruimde omgeving bijdraagt aan het welzijn van iedereen. Bij Viktoria zijn we trots op onze professionele aanpak, deskundig personeel en innovatieve reinigingsmethoden. Ontdek hoe Viktoria Schoonmaakbedrijf een verschil maakt in hygiëne en netheid, terwijl we streven naar een omgeving die niet alleen schoon is, maar ook inspirerend en gezond.
                </p>
            </div>

        </section>
    </div>
</main>

<div class="timeline">
    <div class="container left">
        <div class="content">
            <h2>2005</h2>
            <p>In 2005 is het bedrijf opgericht, gespecialiseerd in dagelijkse schoonmaakdiensten. </p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2006</h2>
            <p>Het jaar daarop, in 2006 werd de eerste grote klant verworven, namelijk de Montessori school.</p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>2007</h2>
            <p> In 2007 werd het dienstenaanbod uitgebreid met beglazingsservice.</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2008</h2>
            <p>Gevolgd door de introductie van vloerbehandelingsservice in 2008.</p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>2009</h2>
            <p>Gedurende het jaar 2009 werden werknemers in dienst genomen, wat bijdroeg aan de verdere groei van het bedrijf.</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2010 t/m 2012</h2>
            <p>In de daaropvolgende jaren, 2010, 2011 en 2012, werden meerdere grote klanten aangetrokken, waaronder Kober en de katholieke basisscholen Zandberg, Mandt en de Stee.</p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>2017</h2>
            <p>Deze positieve trend zette zich voort, en in 2017 werden T Web in Teteringen en HelderCamara aan de klantenlijst toegevoegd.</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2019 t/m 2023</h2>
            <p>In de daaropvolgende jaren, 2019, 2020 en 2023, werd het klantenbestand verder uitgebreid met gerenommeerde namen zoals Gemeente Sport Breda, basisschool Springplank, Breepark en het COA.</p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>Het Heden</h2>
            <p>Het bedrijf heeft zich inmiddels ontwikkeld tot een serieus familiebedrijf, waar zowel tevreden werknemers als klanten een belangrijke rol spelen. Het streven naar klanttevredenheid staat centraal, met een focus op zowel kwaliteit als kwantiteit, 24/7. Het bedrijf beschikt over ervaren professionals die bekend zijn met alarmsystemen en nauwe banden onderhouden met meldkamers van beveiligingsdiensten om de veiligheid van hun klanten te waarborgen.</p>
        </div>
    </div>
</div>

</body>

<footer>
    <?php
        include_once 'includes/footer.php';
    ?>
</footer>


</html>





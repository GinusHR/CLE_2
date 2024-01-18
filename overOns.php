<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viktoria Schoonmaakbedrijf-homepage</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
</head>
<style>
    /* Your CSS styles go here */
    <?php
    $fontFaces = [
        'Poppins' => ['700', 'https://static.trustoo.nl/fonts/poppins-v20-latin-700.woff2', 'https://static.trustoo.nl/fonts/poppins-v20-latin-700.woff'],
        'Mulish' => [
            '400' => 'https://static.trustoo.nl/fonts/mulish-v12-latin-regular.woff2',
            '600' => 'https://static.trustoo.nl/fonts/mulish-v12-latin-600.woff2',
            '800' => 'https://static.trustoo.nl/fonts/mulish-v12-latin-800.woff2',
        ],
        'Material Icons Outlined' => ['400', 'https://static.trustoo.nl/fonts/icons_2023.woff2'],
    ];

    foreach ($fontFaces as $fontName => $fontVariants) {
        foreach ($fontVariants as $fontWeight => $fontSrc) {
            echo "@font-face {
                  font-family: '$fontName';
                  font-style: normal;
                  font-display: swap;
                  font-weight: $fontWeight;
                  src: local(''),
                       url('$fontSrc') format('woff2'); /* Add additional formats if needed */
                }\n";
        }
    }
    ?>
</style>
<body>
<header>
    <?php
    include_once 'includes/nav.php';
    ?>
</header>

<main>
    <div>
        <section class="onsverhaal" style="text-align: center;">
            <h1 class="onsverhaaltitel">Ons Verhaal</h1>
            <p>
                Zeker, hier is een korte introductie voor de "Over Ons" pagina van de website van Viktoria Schoonmaakbedrijf:

                ---

                Welkom bij Viktoria Schoonmaakbedrijf, waar toewijding aan uitmuntendheid en passie voor een schone leef- en werkomgeving samenkomen. Ons bedrijf is geboren uit een streven naar kwaliteit en klanttevredenheid, gedreven door de overtuiging dat een opgeruimde omgeving bijdraagt aan het welzijn van iedereen. Bij Viktoria zijn we trots op onze professionele aanpak, deskundig personeel en innovatieve reinigingsmethoden. Ontdek hoe Viktoria Schoonmaakbedrijf een verschil maakt in hygiëne en netheid, terwijl we streven naar een omgeving die niet alleen schoon is, maar ook inspirerend en gezond.
            </p>
        </section>
    </div>
</main>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .onsverhaal {

            max-width: 800px; /* Stel de gewenste maximale breedte in */
            margin: 0 auto; /* Hierdoor wordt het gecentreerd op brede schermen */
            margin-left: 350px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        * {
            box-sizing: border-box;
        }
        
        body {
            background-color: #cebeaf;
            font-family: Helvetica, sans-serif;
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
            width: 10px;
            background-color: white;
            top: 0;
            bottom: -400px;
            left: 50%;
            margin-left: -5px;
        }

        /* Container around content */
        .container {
            padding: 10px 40px;
            position: relative;

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
            <p>Het jaar daarop, in 2006, werd de eerste grote klant verworven, namelijk de Montessori school. </p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>2007</h2>
            <p>  In 2007 werd het dienstenaanbod uitgebreid met beglazingsservice</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2008</h2>
            <p>gevolgd door de introductie van vloerbehandelingsservice in 2008.</p>
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
            <h2> 2010 t/m 2012</h2>
            <p>In de daaropvolgende jaren, 2010, 2011 en 2012, werden meerdere grote klanten aangetrokken, waaronder Kober en de katholieke basisscholen Zandberg, Mandt en de Stee.</p>
        </div>
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
        <h2>Het heden</h2>
        <p>Het bedrijf heeft zich inmiddels ontwikkeld tot een serieus familiebedrijf, waar zowel tevreden werknemers als klanten een belangrijke rol spelen. Het streven naar klanttevredenheid staat centraal, met een focus op zowel kwaliteit als kwantiteit, 24/7. Het bedrijf beschikt over ervaren professionals die bekend zijn met alarmsystemen en nauwe banden onderhouden met meldkamers van beveiligingsdiensten om de veiligheid van hun klanten te waarborgen.</p>
    </div>
</div>
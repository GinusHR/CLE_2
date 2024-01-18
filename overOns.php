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
                Welkom bij Viktoria Schoonmaakbedrijf, waar we geloven in het bieden van hoge kwaliteit
                voor een lage kwantiteit. Onze toewijding aan uitmuntendheid betekent dat we streven naar
                een vlekkeloos resultaat. Wij zijn toegewijd aan het leveren van hoogwaardige
                schoonmaakdiensten, waardoor uw leef- en werkomgeving straalt met frisheid.
                Ontdek een wereld van vlekkeloze reinheid met Viktoria Schoonmaakbedrijf - waar
                elk detail telt en uw tevredenheid onze prioriteit is.
            </p>
        </section>
    </div>
</main>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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

<div class="timeline">
    <div class="container left">
        <div class="content">
            <h2>2017</h2>
            <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2016</h2>
            <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>2015</h2>
            <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2012</h2>
            <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
        </div>
    </div>
    <div class="container left">
        <div class="content">
            <h2>2011</h2>
            <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
        </div>
    </div>
    <div class="container right">
        <div class="content">
            <h2>2007</h2>
            <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
        </div>
    </div>
</div>

</body>




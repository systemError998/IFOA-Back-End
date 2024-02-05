<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Exercise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- DATA E ORA IN PHP -->
        <?php 
            date_default_timezone_set('UTC');
        ?>
        <h2 class="text-center"> <?= 'Today is' . ' ' . date("l") . ' ' . date("d F Y") ?> </h2>
        <h3 class="text-center"> <?= "It's" . ' ' . date("H:i:s")  ?> </h3>
        
        <!-- ARRAY SQUADRE  -->

        <?php
            $arrSerieA = ["Juventus", "Inter", "Milan", "Napoli", "Roma", "Lazio"];
            // print_r($arrSerieA);

            echo '<h2 class="text-center">Serie A</h2>';

            echo '<ul>';
            foreach ($arrSerieA as $key => $value) {
                echo '<li class="text-center list-group-item">' . $value . '</li>';
            }
            echo '</ul>';


            $formSerieA = 
            [
                "Lazio" => ["Anna", "Vincenzo", "Jessica", "Giuseppe" ],
                "Juventus" => ["Gregorio", "Trixia", "Matteo", "Xhoana" ],
                "Inter" => ["Mikael", "Francesco", "Daniele", "Andrea" ], 
                "Milan" => ["Celeste", "Francesco", "Kleo", "Marco" ], 
                "Napoli" => ["Arcangelo", "Mario", "Luca", "Giulio" ], 
                "Roma" => ["Vincenzo", "Milena", "Pierpaolo", "Simone" ],
            ];
            echo '<ul>';
                foreach ($formSerieA as $squadra => $formazione) {
                    echo '<h2 class="text-center">' . $squadra . '</h2>';
                    foreach ($formazione as $key => $ruolo) {
                        echo '<li class="text-center list-group-item">' . $ruolo . '</li>';
                    }
                }
            echo '</ul>';


            $partSerieA =
            [
                "Torino - Salernitana",
                "Napoli - Verona ",
                "Lazio - Atalanta",
                "Inter - Juventus",
                "Milan - Roma",
            ];

            $matrix = [[$arrSerieA], [$formSerieA], [$partSerieA]];
            //print_r($matrix);

            

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
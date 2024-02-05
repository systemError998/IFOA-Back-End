<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        $var = 'Mario Rossi';          // $var è una variabile di tipo stringa
        echo "<h1>Hello World!</h1>";
        echo $var;
    ?>

    <h2><?= 'CORSO PHP' ?></h2>

    <?php
        //VARIABILI

        //Boolean
        $bool = true;
        //Stampa contenuto e tipo della variabile 
        var_dump($bool);

        //Numero intero
        $numInt = 10;
        var_dump($numInt);

        //Numero flaot
        $numFlo = 3.5;
        var_dump($numFlo);

        //Stringa
        $str = 'Hello World';
        var_dump($str); //Var dump di una stringa stampa CONTENUTO, TIPO E LUNGHEZZA


        //COSTANTI

        //La costante è una funzione che accetta come param il nome della costante e il suo valore
        define('C' , 'Sono una costante define') ;
        echo C;
        //Da PHP 8.0 è stato introdotto const
        const CC = 'Sono una costante';
        echo CC;

        //Concatenazione di stringhe
        $name = "Anna";
        $surname = "Capanna";
        echo $name.' '.$surname;
        print($name); //Modo alternativo ad echo per stampare a video

        //Array vuoti
        $arr1 = array();  //Resituisce un array vuoto
        $arr2 = [];

        //Array pieni 
        $arr3 = array('uno', 'due', 'tre', 'quattro');
        $arr4 = ['uno','due','tre','quattro'];
        //Stampare array
        print($arr1); //NON FUNZIONA
        print_r($arr3); //STAMPA IL CONTENUTO E I SUOI INDICI
        print '<p>' . $arr[1] . '</p>';  //STAMPO UN ELEMENTO DELL ARRAY A INDICE 1



    ?>
</body>
</html>
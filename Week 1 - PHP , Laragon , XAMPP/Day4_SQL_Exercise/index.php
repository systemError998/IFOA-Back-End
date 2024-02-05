<?php 

    require_once 'config.php'; //Includo con il require, il file di config
    // var_dump($config); -> array associativo con all'interno le var di config

    # mysqli is an object that represents a connection between PHP and a MySQL database.
    $mysiculi = new mysqli(
                        $config['mysql_host'], 
                        $config['mysql_user'], 
                        $config['mysql_password']
                    );

    // var_dump($mysiculi->sqlstate); #Con la freccetta leggo le proprietà dell'oggetto mysqli

    #Gestione degli errori 
    if ($mysiculi->connect_error) {
        die('Errore di connessione: ' . $mysqli->connect_error);
    };

    //---------------------------------------------------------------------------------------------------------//
    #Creo il mio database
    $myDatabeis = 'CREATE DATABASE IF NOT EXISTS mydatabeis';  //Il codice tra apici è sql, ed ora sto creando un database
    //IF NOT EXIST è necessario, altrimenti lui prova a ricreare il database ad ogni running del code
    //var_dump($myDB);

    #Il metodo query serve per eseguire codice SQL (quindi, azioni sul db) e restituisce true o false se fallisce
    if(!$mysiculi->query($myDatabeis)) { 
        die($mysiculi->connect_error); 
    };
 
    //---------------------------------------------------------------------------------------------------------//
    #Seleziono il mio database
    $myDatabeis = 'USE mydatabeis';
    $mysiculi->query($myDatabeis);


    //---------------------------------------------------------------------------------------------------------//
    #Creo la tabella
    $myDatabeis = 
        'CREATE TABLE IF NOT EXISTS myteibol (
         id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
         name VARCHAR(255) NOT NULL,
         username VARCHAR(255) NOT NULL UNIQUE,
         email VARCHAR(255) NOT NULL UNIQUE )';

    if(!$mysiculi->query($myDatabeis)) {     // Il ! rende la condizione vera se la query non è stata eseguita
        die($mysiculi->connect_error);       //Query quindi, esegue l'azione indicata nella variabile $mydatabeis utilizzando mysiculi
    };                                       //Se la query non è stata eseguita, il metodo query restiuisce false


    //---------------------------------------------------------------------------------------------------------//
    #Inserisco dei dati nella tabella
    $myDatabeis =       //IGNORE SERVE SOLO PER FAR IGNORARE L'ERRORE
        'INSERT IGNORE INTO `myteibol` (`name`, `username`, `email`) 
            VALUES 
                ("Anna", "systemError998", "anna@example.com"),
                ("Gregorio" , "Vecho97", "l4vD8@example.com"),
                ("Gregorio" , "Vecho97", "l4vD8@example.com")';

    if(!$mysiculi->query($myDatabeis)) {
        die($mysiculi->connect_error);
    }

    
    //---------------------------------------------------------------------------------------------------------//
    #Leggo i dati della tabella
    $myDatabeis = 'SELECT * FROM `myteibol`';  //Con select recupero i dati dalla tabella myteibol
    $results = $mysiculi->query($myDatabeis);  //Result è un oggetto che rappresenta la riga
    $datiTabella = [];
    //var_dump($results->num_rows); 

    if(!empty($results)) {                       //Se la riga result non è empty
        while($row = $results->fetch_assoc()) {  //Trasformo ogni riga in un'array associativo, in modo che php possa leggerlo
            array_push($datiTabella, $row);      //Pusho la riga nell'array
        }
    }

    print_r($datiTabella);
    echo $datiTabella[1]['name'];
    print_r($datiTabella[1]);


    //---------------------------------------------------------------------------------------------------------//
    #Eseguo un update di uno user

    $myDatabeis = "UPDATE myTeibol SET name = 'Greg' WHERE id = '2' AND name = 'Gregorio'";
    
    if(!$mysiculi->query($myDatabeis)) {
        die($mysiculi->connect_error);  //se non è true devi morire
    } else echo "User modificato con succiessssssss";

    print_r($datiTabella);

    //---------------------------------------------------------------------------------------------------------//
    #Eseguo un delete di uno user

    $myDatabeis = "DELETE FROM myTeibol WHERE id = 64";
    if(!$mysiculi->query($myDatabeis)) {
        die($mysiculi->connect_error);  //se non è true devi morire
    } else echo "User eliminato con succiessssssss";

    print_r($datiTabella);
    
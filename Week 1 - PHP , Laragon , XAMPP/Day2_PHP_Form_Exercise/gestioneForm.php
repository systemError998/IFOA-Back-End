<?php

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  */


# $_POST


# METODO 1: Senza scrivere array
/* if (isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['username']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    var_dump($_REQUEST);
    foreach ($_REQUEST as $key => $value) {
        echo '<li class="list-group-item">' . $key . ' : ' . $value . '</li>';
    }
} */


#Avvio la sessione
session_start();

#Inserisco tutti i dati che mi manda il form in un array
$user = [
    'firstname' => $_REQUEST['firstname'], 
    'lastname' => $_REQUEST['lastname'], 
    'username' => $_REQUEST['username'], 
    'email' => $_REQUEST['email'], 
    'password' => $_REQUEST['password'] 
];

#Inserisco l'array dentro la sessione
$_SESSION['users'] = $user;


# $_FILES
var_dump($_FILES['miofile']);

$fileName = $_FILES['miofile']['name'];
$typeFile = $_FILES['miofile']['type'];
$sizeFile = $_FILES['miofile']['size'];

$target_dir = "uploads/";

if(!empty($_FILES['miofile'])) {
    echo '<h3>File Name: ' . $fileName . '</h3>';
    echo '<h3>File Type: ' . $typeFile . '</h3>';
    echo '<h3>File Size: ' . $sizeFile . '</h3>';
    if(is_uploaded_file($_FILES['miofile']["tmp_name"]) && $_FILES['miofile']["error"] === UPLOAD_ERR_OK) {
        if(move_uploaded_file($_FILES['miofile']["tmp_name"], $target_dir.$fileName)) {
            echo 'Caricamento avvenuto con successo';
        } else {
            echo 'Errore!!!';
        }
    }
}

session_write_close();
var_dump($_SESSION);

header('Location: http://localhost/Week%201%20-%20PHP%20%2C%20Laragon%20%2C%20XAMPP/Day2_PHP_Form_Exercise/index.php');


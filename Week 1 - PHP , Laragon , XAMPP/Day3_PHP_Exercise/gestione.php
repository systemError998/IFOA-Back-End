<?php

#Avvio la sessione
session_start();

$users = isset($_SESSION['users'])  ?  $_SESSION['users'] : [] ;

#Inserisco tutti i dati che mi manda il form in un array
$user = [
    'firstname' => $_REQUEST['firstname'], 
    'lastname' => $_REQUEST['lastname'], 
    'username' => $_REQUEST['username'], 
    'email' => $_REQUEST['email'], 
    'password' => $_REQUEST['password'] 
];

$firstnameSanitize = htmlspecialchars($_REQUEST['firstname']);
$lastnameSanitize = htmlspecialchars($_REQUEST['lastname']);
$usernameSanitize = htmlspecialchars($_REQUEST['username']);

//echo "$firstnameSanitize $lastnameSanitize $usernameSanitize";

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

if (isset($firstnameSanitize) && isset($lastnameSanitize) && isset($usernameSanitize)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "$email è un valore valido <br/>";
    } else {
        echo "$email  NON è una valore valido";
    }    
}

$uppercase = preg_match("@[A-Z]@", $password);
$lowercase = preg_match("@[a-z]@", $password);
$number    = preg_match("@[0-9]@", $password);
$specialChars = preg_match("@[^w]@", $password);

$pswCheck = preg_match("/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,16})\S$/", $password);


if (!$pswCheck) {
    echo "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    echo $passowrd;
} else {
    echo "Password OK";
    $_SESSION[''] = [...$users, $user];

    header('Location: http://localhost/IFOA-Back-End/Week%201%20-%20PHP%20,%20Laragon%20,%20XAMPP/Day3_PHP_Exercise/login.php');
}

#Inserisco l'array dentro la sessione
$_SESSION['users'] = $user;

session_write_close();
var_dump($_SESSION);

//header('Location: http://localhost/IFOA-Back-End/Week%201%20-%20PHP%20,%20Laragon%20,%20XAMPP/Day3_PHP_Exercise/gestione.php');


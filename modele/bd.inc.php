<?php

function connexionPDO() {
    $login = "FeelBackd";
    $mdp = "kercode23";
    $bd = "ss_td";
    $serveur = "localhost";

    /*  $login = "gretaxao_loiseauva";
    $mdp = "LoiseauVa2023!";
    $bd = "gretaxao_loiseauva";
    $serveur = "localhost"; */

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        throw $e;
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog de test
    header('Content-Type:text/plain');

    echo "connexionPDO() : \n";
    print_r(connexionPDO());
    

}
?>

<?php
// Inclure le fichier de connexion
require_once("bd.inc.php");

//Fonction récuperer toutes les mise a jours en base de donnée
function recupererNews()
{

    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Récupération de id_user en fonction de l'email fourni par la session
        
        //Définition de la requête SQL a éxécuter
        $sqlNews = "SELECT content, creation_date FROM _update";

        //Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtNews = $conn->prepare($sqlNews);

        //Execution de la requête SQL
        if ($stmtNews->execute()) {
            //Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtNews->fetchAll();
            //Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlNews . "<br>" . $stmtNews->errorInfo()[2];
        }
    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}
?>
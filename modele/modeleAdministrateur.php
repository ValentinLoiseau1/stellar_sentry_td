<?php
// Inclusion le fichier de connexion
require("bd.inc.php");

function afficherLesRoadpmapItem()
{
    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Préparation de la reqête SQL
        $sqlAffichageRoadmap =  $sql = "SELECT * FROM roadmap_item";
        $stmtAffichageRoadmap = $conn->prepare($sql);

        //Execution de la requête SQL
        if ($stmtAffichageRoadmap->execute()) {
            //Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtAffichageRoadmap->fetchAll();
            //Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlAffichageRoadmap . "<br>" . $stmtAffichageRoadmap->errorInfo()[2];
        }
    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}

function supprimerLesRoadpmapItem($idRoadmap)
{
    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Préparation de la rêquete SQL
        $sqlDeleteRoadmap =  $sql = "DELETE FROM roadmap_item WHERE id_roadmap_item = :id_roadmap_item";
        $stmtDeleteRoadmap = $conn->prepare($sql);

        // Liaison des paramètres
        $stmtDeleteRoadmap->bindParam('id_roadmap_item', $idRoadmap);


        //Execution de la requête SQL
        if ($stmtDeleteRoadmap->execute()) {
            //Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtDeleteRoadmap->fetchAll();
            //Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlDeleteRoadmap . "<br>" . $stmtDeleteRoadmap->errorInfo()[2];
        }
    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}

function ajouterLesRoadpmapItem($version, $content, $date, $idUser)
{
    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Préparation de la requête SQL
        $sqlAjoutRoadmapItem =  $sql = "INSERT INTO roadmap_item (version_, content, date_range, id_user) VALUES (:version_, :content, :date_range, :id_user)";
        $stmtAjoutRoadmapItem = $conn->prepare($sql);

        //Liaison des paramètres
        $stmtAjoutRoadmapItem->bindParam(':version_', $version);
        $stmtAjoutRoadmapItem->bindParam(':content', $content);
        $stmtAjoutRoadmapItem->bindParam(':date_range', $date);
        $stmtAjoutRoadmapItem->bindParam(':id_user', $idUser);

        //Exécution la requête SQL
        if ($stmtAjoutRoadmapItem->execute()) {
            return "Etape de la roadmap ajouté avec succès !";
        } else {
            return "Erreur : " . $sqlAjoutRoadmapItem . "<br>" . $stmtAjoutRoadmapItem->errorInfo()[2];
        }

    } catch (PDOException $e) {
        
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support." . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}


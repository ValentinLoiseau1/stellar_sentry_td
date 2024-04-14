<?php
// Inclure le fichier de connexion
require("bd.inc.php");

function connexionUtilisateur($email, $mot_de_passe)
{
    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Préparation de la requête SQL
        $sql = "SELECT password_, id_user, role FROM _user WHERE email = :email";
        $stmt = $conn->prepare($sql);

        //Liaison des paramètres
        $stmt->bindParam(':email', $email);

        // Exécutez la requête SQL
        $stmt->execute();

        // Vérifiez si l'utilisateur existe dans la base de données
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $mot_de_passe_hache = $row['password_'];


            // Utiliser crypt pour comparer le mot de passe fourni avec le mot de passe haché stocké
            if (crypt($mot_de_passe, $mot_de_passe_hache) === $mot_de_passe_hache) {
                return $row;
                
            } else {
                return "Mot de passe incorrect.";
            }
        } else {
            return "Identifiant incorrect.";
        }

        // Fermez la connexion à la base de données
        $conn = null;
    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}
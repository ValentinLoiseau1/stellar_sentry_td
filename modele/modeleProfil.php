<?php
// Inclure le fichier de connexion
require("bd.inc.php");

//Fonction récuperer tout les commentaires en base de donnée
function recupererProfil()
{

    try {
        // 1- Connexion à la base de données
        $conn = connexionPDO();

        // 2- Récupération de id_user en fonction de l'email fourni par la session
        $email_utilisateur = $_SESSION['email'];
        //2.1 Définition de la requête SQL a éxécute
        $sqlProfil = "SELECT login_, password_, email, name, surname FROM _user WHERE email = :email";
        //2.2 Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtProfil  = $conn->prepare($sqlProfil);

        $stmtProfil->bindParam(':email', $email_utilisateur);

        //2.3 Execution de la requête SQL
        if ($stmtProfil->execute()) {
            //2.3.1 Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtProfil->fetchAll();
            //2.3.2 Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //2.3.3 Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlProfil  . "<br>" . $stmtProfil->errorInfo()[2];
        }

    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

// Fonction pour mettre à jour les données de l'utilisateur
function modifierProfil($login, $mot_de_passe, $email, $name, $surname, $emailSession)
{
    try {
        // Connexion à la base de données
        $conn = connexionPDO();

        // 2- Récupération de id_user en fonction de l'email fourni par la session

        //2.1 Définition de la requête SQL a éxécuter
        $sqlUser = "SELECT id_user FROM _user WHERE email = :emailSession";

        //2.2 Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtUser = $conn->prepare($sqlUser);

        //2.3 Complete la requête SQL avec les données a injectés
        $stmtUser->bindParam(':emailSession', $emailSession);

        //2.4 Execution de la requête SQL
        if ($stmtUser->execute()) {
            //2.4.1 Récupération de la ligne de résultat de l'execution de la requête
            $row = $stmtUser->fetch();
            //2.4.2 Récupération de la colonne id_user de la ligne récupérer précedement
            $idUser = $row['id_user'];
        } else {
            //2.4.3 Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlUser . "<br>" . $stmtUser->errorInfo()[2];
        }

        // 2.5 Test si il y a bien un utilisateur
        if ($idUser == NULL) {
            //2.5.1 Dans le cas ou l'utilisateur n'existe pas on renvoie un message d'erreur
            return "Erreur : l'utilisateur n'a pas été trouvé en base de données";
        }

                // Vérifier la complexité du mot de passe
                if (strlen($mot_de_passe) < 8) {
                    return "Le mot de passe doit contenir au moins 8 caractères.";
                }
        
                if (!preg_match("#[A-Z]+#", $mot_de_passe)) {
                    return "Le mot de passe doit contenir au moins une lettre majuscule.";
                }
        
                if (!preg_match("#[a-z]+#", $mot_de_passe)) {
                    return "Le mot de passe doit contenir au moins une lettre minuscule.";
                }
        
                if (!preg_match("#[0-9]+#", $mot_de_passe)) {
                    return "Le mot de passe doit contenir au moins un chiffre.";
                }
        
                if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $mot_de_passe)) {
                    return "Le mot de passe doit contenir au moins un caractère spécial.";
                }
                // Utiliser trim pour supprimer les espaces avant et après le mot de passe
                $mot_de_passe = trim($mot_de_passe);
        
                // Utiliser crypt pour hacher le mot de passe
                $mot_de_passe_hache = crypt($mot_de_passe, $mot_de_passe);

        // Définition de la requête SQL pour mettre à jour les données de l'utilisateur
        $sqlModifierProfil = "UPDATE _user SET login_ = :login_, password_ = :password_, email = :email, name = :name, surname = :surname WHERE id_user = :id_user ";

        // Préparation de la requête SQL
        $stmtModifierProfil = $conn->prepare($sqlModifierProfil);

        $stmtModifierProfil->bindParam(':login_', $login);
        $stmtModifierProfil->bindParam(':password_', $mot_de_passe_hache);
        $stmtModifierProfil->bindParam(':email', $email);
        $stmtModifierProfil->bindParam(':name', $name);
        $stmtModifierProfil->bindParam(':surname', $surname);
        $stmtModifierProfil->bindParam(':id_user', $idUser);

        // Exécution de la requête SQL
        if ($stmtModifierProfil->execute()) {
            return "Les données de l'utilisateur ont été mises à jour avec succès.";
        } else {
            return "Erreur lors de la mise à jour des données de l'utilisateur : " . $stmtModifierProfil->errorInfo()[2]; // Gestion des erreurs SQL
        }

    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        }
    }
}

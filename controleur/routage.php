<?php
$fichier = null;
$action = "default";

function redirigeVers($action)
{
    switch ($action) {
        case "roadmap":
            $fichier = "roadmap.php";
            break;
        case "blog":
            $fichier = "blog.php";
            break;
        case "inscription":
            $fichier = "inscription.php";
            break;
        case "connexion":
            $fichier = "connexion.php";
            break;
        case "deconnexion":
            $fichier = "deconnexion.php";
            break;
        case "mentionsLegales":
            $fichier = "mentionsLegales.php";
            break;
        case "politiqueDeConfidentialite":
            $fichier = "politiqueDeConfidentialite.php";
            break;
        default:
            $fichier = "accueil.php";
            break;
    }
    return $fichier;
}

<?php
function afficherDonneesHugo($urlHugo)
{
    // URL de l'API externe
    $urlHugo = 'https://sstd-external-api.onrender.com/1f853e60-13fd-4edf-b1fe-dac728f081c6';

    // Effectuer une requête GET
    $responseHugo = file_get_contents($urlHugo);

    // Vérifier si la requête a réussi
    if ($responseHugo !== false) {
        // Décoder les données JSON
        $dataHugo = json_decode($responseHugo, true);

        // Vérifier si les données sont bien présentes
        if (isset($dataHugo['name']) && isset($dataHugo['professionalTitle']) && isset($dataHugo['projectRole']) && isset($dataHugo['linkedinUrl']) && isset($dataHugo['experiences'])) {
            // Afficher les informations sur l'équipe avec une classe pour contrôler la visibilité
            echo "<div class='team-member' id='data-hugo' style='display: none;'>";
            echo "<p>{$dataHugo['name']}</p>";
            echo "<p>{$dataHugo['professionalTitle']}</p>";
            echo "<p>{$dataHugo['projectRole']}</p>";
            echo "<p><a href='{$dataHugo['linkedinUrl']}'>Profil LinkedIn</a></p>";
            echo "<p>Expériences :</p>";
            echo "<ul>";
            foreach ($dataHugo['experiences'] as $experienceHugo) {
                echo "<li>{$experienceHugo['role']} chez {$experienceHugo['company']} ({$experienceHugo['duration']})</li>";
            }
            echo "</ul>";
            echo "</div>";
        } else {
            // Gérer les erreurs si les données ne sont pas complètes
            echo "Les données d'Hugo sont incomplètes.";
        }
    } else {
        // Gérer les erreurs si la requête a échoué
        echo "La requête a échoué.";
    }
}

function afficherDonneesKevin($urlKevin)
{
    // URL de l'API externe
    $urlKevin = 'https://sstd-external-api.onrender.com/ee198a4e-482a-4e25-bf81-91b58c97dd5d';

    // Effectuer une requête GET
    $responseKevin = file_get_contents($urlKevin);

    // Vérifier si la requête a réussi
    if ($responseKevin !== false) {
        // Décoder les données JSON
        $dataKevin = json_decode($responseKevin, true);

        // Vérifier si les données sont bien présentes
        if (isset($dataKevin['name']) && isset($dataKevin['professionalTitle']) && isset($dataKevin['projectRole']) && isset($dataKevin['linkedinUrl']) && isset($dataKevin['experiences'])) {
            // Afficher les informations sur l'équipe avec une classe pour contrôler la visibilité
            echo "<div class='team-member' id='data-kevin' style='display: none;'>";
            echo "<p>{$dataKevin['name']}</p>";
            echo "<p>{$dataKevin['professionalTitle']}</p>";
            echo "<p>{$dataKevin['projectRole']}</p>";
            echo "<p><a href='{$dataKevin['linkedinUrl']}'>Profil LinkedIn</a></p>";
            echo "<p>Expériences :</p>";
            echo "<ul>";
            foreach ($dataKevin['experiences'] as $experienceKevin) {
                echo "<li>{$experienceKevin['role']} chez {$experienceKevin['company']} ({$experienceKevin['duration']})</li>";
            }
                echo "</ul>";
                echo "</div>";
            
        } else {
            // Gérer les erreurs si les données ne sont pas complètes
            echo "Les données de kevin sont incomplètes.";
        }
    } else {
        // Gérer les erreurs si la requête a échoué
        echo "La requête a échoué.";
    }
}

function afficherDonneesValentin($urlValentin)
{
    // URL de l'API externe
    $urlValentin = 'https://sstd-external-api.onrender.com/292b9436-5462-4e2d-87eb-bc355ceab56f';

    // Effectuer une requête GET
    $responseValentin = file_get_contents($urlValentin);

    // Vérifier si la requête a réussi
    if ($responseValentin !== false) {
        // Décoder les données JSON
        $dataValentin = json_decode($responseValentin, true);

        // Vérifier si les données sont bien présentes
        if (isset($dataValentin['name']) && isset($dataValentin['professionalTitle']) && isset($dataValentin['projectRole']) && isset($dataValentin['linkedinUrl']) && isset($dataValentin['experiences'])) {
            // Afficher les informations sur l'équipe avec une classe pour contrôler la visibilité
            echo "<div class='team-member' id='data-valentin' style='display: none;'>";
            echo "<p>{$dataValentin['name']}</p>";
            echo "<p>{$dataValentin['professionalTitle']}</p>";
            echo "<p>{$dataValentin['projectRole']}</p>";
            echo "<p><a href='{$dataValentin['linkedinUrl']}'>Profil LinkedIn</a></p>";
            echo "<p>Expériences :</p>";
            echo "<ul>";
            foreach ($dataValentin['experiences'] as $experienceValentin) {
                echo "<li>{$experienceValentin['role']} chez {$experienceValentin['company']} ({$experienceValentin['duration']})</li>";
            }
                echo "</ul>";
                echo "</div>";
            
        } else {
            // Gérer les erreurs si les données ne sont pas complètes
            echo "Les données de Valentin sont incomplètes.";
        }
    } else {
        // Gérer les erreurs si la requête a échoué
        echo "La requête a échoué.";
    }
}

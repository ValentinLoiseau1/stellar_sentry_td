// Fonction pour basculer l'affichage des données du profil lorsqu'on clique sur son image
function toggleData($idProfil) {
    // Récupérer l'élément contenant les données du profil
    let teamData = document.getElementById('data-' + $idProfil);

    // Si l'élément n'existe pas, créer et afficher les données du profil
    if (!teamData) {
        afficherDonnees($idProfil);
    }
    // Basculer l'affichage de l'élément
    if (teamData.style.display === 'none') {
        teamData.style.display = 'block';
    } else {
        teamData.style.display = 'none';
    }
}

// Fonction pour afficher les données de l'API du profil
function afficherDonnees($idProfil) {
    // URL de l'API externe
    let url = "https://sstd-external-api.onrender.com/" + $idProfil;
    fetch(url, { mode: 'cors' })
        .then(response => {
            // Vérifier si la requête a réussi
            if (!response.ok) {
                throw new Error('La requête a échoué.');
            }
            // Récupérer et retourner les données JSON
            return response.json();
        })
        .then(data => {
            // Vérifier si les données sont bien présentes
            if (data.name && data.professionalTitle && data.projectRole && data.linkedinUrl && data.experiences) {
                // Afficher les informations sur l'équipe avec une classe pour contrôler la visibilité
                const teamMemberDiv = document.createElement('div');
                teamMemberDiv.classList.add('team-member');
                teamMemberDiv.id = 'data-' + $idProfil;
                teamMemberDiv.style.display = 'block';

                const infoParagraph = document.createElement('p');
                infoParagraph.textContent = data.professionalTitle;
                teamMemberDiv.appendChild(infoParagraph);

                const linkedInLink = document.createElement('a');
                linkedInLink.href = data.linkedinUrl;
                linkedInLink.textContent = 'Profil LinkedIn';
                teamMemberDiv.appendChild(linkedInLink);

                const experiencesList = document.createElement('ul');
                const experiencesTitle = document.createElement('p');
                experiencesTitle.textContent = 'Expériences professionnelles :';
                experiencesList.appendChild(experiencesTitle);

                data.experiences.forEach(experience => {
                    const experienceItem = document.createElement('li');
                    experienceItem.textContent = `${experience.role} chez ${experience.company} (${experience.duration})`;
                    experiencesList.appendChild(experienceItem);
                });

                teamMemberDiv.appendChild(experiencesList);

                let blockProfil = document.getElementById('block-' + $idProfil);
                // Ajouter le div au document
                blockProfil.appendChild(teamMemberDiv);
                
            } else {
                // Gérer les erreurs si les données ne sont pas complètes
                console.error('Les données du profil sont incomplètes.');
            }
        })
        .catch(error => {
            // Gérer les erreurs si la requête a échoué
            console.error('Erreur lors de la récupération des données :', error);
        });
}
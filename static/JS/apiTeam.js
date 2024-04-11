function toggleDataKevin() {
    let teamData = document.getElementById('data-kevin');
    if (teamData.style.display === 'none') {
        teamData.style.display = 'block';
    } else {
        teamData.style.display = 'none';
    }
}

function toggleDataValentin() {
    let teamData = document.getElementById('data-valentin');
    if (teamData.style.display === 'none') {
        teamData.style.display = 'block';
    } else {
        teamData.style.display = 'none';
    }
}

// Fonction pour basculer l'affichage des données de Hugo lorsqu'on clique sur son image
function toggleDataHugo() {
    // Récupérer l'élément contenant les données de Hugo
    let teamData = document.getElementById('data-hugo');

    // Si l'élément n'existe pas, créer et afficher les données de Hugo
    if (!teamData) {
        afficherDonneesHugo();
    } else {
        // Basculer l'affichage de l'élément
        if (teamData.style.display === 'none') {
            teamData.style.display = 'block';
        } else {
            teamData.style.display = 'none';
        }
    }
}

// Fonction pour afficher les données de l'API de Hugo
function afficherDonneesHugo() {
    // URL de l'API externe
    const urlHugo = 'https://sstd-external-api.onrender.com/1f853e60-13fd-4edf-b1fe-dac728f081c6';

    // Effectuer une requête fetch GET
    fetch(urlHugo)
    .then(response => {
        // Vérifier si la requête a réussi
        if (!response.ok) {
            throw new Error('La requête a échoué.');
        }
        // Récupérer et retourner les données JSON
        return response.json();
    })
    .then(dataHugo => {
        // Vérifier si les données sont bien présentes
        if (dataHugo.name && dataHugo.professionalTitle && dataHugo.projectRole && dataHugo.linkedinUrl && dataHugo.experiences) {
            // Afficher les informations sur l'équipe avec une classe pour contrôler la visibilité
            const teamMemberDiv = document.createElement('div');
            teamMemberDiv.classList.add('team-member');
            teamMemberDiv.id = 'data-hugo';
            teamMemberDiv.style.display = 'none';

            const infoParagraph = document.createElement('p');
            infoParagraph.textContent = dataHugo.professionalTitle;
            teamMemberDiv.appendChild(infoParagraph);

            const linkedInLink = document.createElement('a');
            linkedInLink.href = dataHugo.linkedinUrl;
            linkedInLink.textContent = 'Profil LinkedIn';
            teamMemberDiv.appendChild(linkedInLink);

            const experiencesList = document.createElement('ul');
            const experiencesTitle = document.createElement('p');
            experiencesTitle.textContent = 'Expériences professionnelles :';
            experiencesList.appendChild(experiencesTitle);

            dataHugo.experiences.forEach(experience => {
                const experienceItem = document.createElement('li');
                experienceItem.textContent = `${experience.role} chez ${experience.company} (${experience.duration})`;
                experiencesList.appendChild(experienceItem);
            });

            teamMemberDiv.appendChild(experiencesList);

            // Ajouter le div au document
            document.body.appendChild(teamMemberDiv);
        } else {
            // Gérer les erreurs si les données ne sont pas complètes
            console.error('Les données d\'Hugo sont incomplètes.');
        }
    })
    .catch(error => {
        // Gérer les erreurs si la requête a échoué
        console.error('Erreur lors de la récupération des données :', error);
    });
}
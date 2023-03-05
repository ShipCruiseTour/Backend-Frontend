
// Les jours antérieurs à aujourd'hui sont désactivés
const date_reservation = document.getElementById("date_reservation");
const today = new Date();

const year = today.getFullYear();
const month = (today.getMonth() + 1).toString().padStart(2, "0");
const day = today.getDate().toString().padStart(2, "0");
const dateForToday = `${year}-${month}-${day}`;

if (date_reservation != null) {
  date_reservation.addEventListener("input", function () {
    const selectedDate = new Date(this.value);
    if (selectedDate < today) {
      alert("Les jours antérieurs à aujourd'hui sont désactivés");
      this.value = today;
    }
  });
}

// pagination
const paginationBtn = document.getElementById("pagination");
// Récupérer les éléments HTML pertinents
const croisieresDiv = document.querySelector('.croisieres');
const cards = croisieresDiv.querySelectorAll('.card');
const tailleInput = croisieresDiv.querySelector('#taille');

if (cards != null) {
  // Configurer la pagination
  const pageSize = 8;
  let currentPage = 1;
  let maxPage = Math.ceil(cards.length / pageSize);
  
  // Masquer toutes les cartes
  cards.forEach(card => {
    card.style.display = 'none';
  });
  
  // Afficher les cartes pour la page actuelle
  function showPage(page) {
    // Calculer l'index de début et de fin de la page actuelle
    const startIndex = (page - 1) * pageSize;
    const endIndex = startIndex + pageSize;
  
    // Masquer toutes les cartes
    cards.forEach(card => {
      card.style.display = 'none';
    });
  
    // Afficher les cartes pour la page actuelle
    for (let i = startIndex; i < endIndex; i++) {
      if (cards[i]) {
        cards[i].style.display = 'block';
      }
    }
  
    // Mettre à jour le numéro de page actuel
    currentPage = page;
  }
  
  // Afficher la première page au chargement de la page
  showPage(currentPage);
  
  // Ajouter des gestionnaires d'événements pour les boutons "précédent" et "suivant"
  const prevButton = document.createElement('button');
  prevButton.textContent = 'Précédent';
  prevButton.classList.add('btnMe')
  prevButton.addEventListener('click', () => {
    if (currentPage > 1) {
      showPage(currentPage - 1);
    }
  });
  
  const nextButton = document.createElement('button');
  nextButton.textContent = 'Suivant';
  nextButton.classList.add('btnMe')
  nextButton.addEventListener('click', () => {
    if (currentPage < maxPage) {
      showPage(currentPage + 1);
    }
  });
  
  // Ajouter les boutons à la page
  paginationBtn.appendChild(prevButton);
  paginationBtn.appendChild(nextButton);
  
  // Mettre à jour le nombre maximum de pages
  maxPage = Math.ceil(cards.length / pageSize);
  tailleInput.value = maxPage;
}
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
// Les croisieres antérieurs à la date d'aujourd'hui ne s'affichent pas
const taille = document.getElementById("taille");
if (taille != null) {
  const tailleValue = taille.value;
  for (let i = 0; i < tailleValue; i++) {
    var cruiseHidden = document.getElementById("cruiseHidden" + i);
    var cruiseHiddenValue = cruiseHidden.value;
    var cardHidden = document.getElementById("cardHidden" + i);
    if (cruiseHiddenValue < dateForToday) {
      cardHidden.setAttribute("style", "display:none");
    }
  }
}
// pagination
const cards = document.querySelectorAll(".card");

if (cards != null) {
  const cards = document.querySelectorAll(".card");
  const cardsPerPage = 3;
  const pageCount = Math.ceil(cards.length / cardsPerPage);

  function showPage(page) {
    const startIndex = (page - 1) * cardsPerPage;
    const endIndex = startIndex + cardsPerPage;
    cards.forEach((card, index) => {
      if (index >= startIndex && index < endIndex) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  }

  function createPagination() {
    for (let i = 1; i <= pageCount; i++) {
      const button = document.createElement("button");
      button.classList.add('btnPagination')
      button.textContent = i;
      button.addEventListener("click", () => {
        showPage(i);
      });
      document.getElementById("pagination").appendChild(button);
    }
  }

  showPage(1);
  createPagination();
}

document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");
    const showMoreBtn = document.getElementById("showMoreBtn");
    const initialVisibleCards = 8; // Exibe 8 cards inicialmente (2 linhas de 4 cards)
  
    // Esconde os cards extras
    cards.forEach((card, index) => {
      if (index >= initialVisibleCards) {
        card.classList.add("hidden");
      }
    });
  
    // Evento para o botão "Mostrar mais"
    showMoreBtn.addEventListener("click", () => {
      const hiddenCards = document.querySelectorAll(".card.hidden");
      hiddenCards.forEach((card) => {
        card.classList.remove("hidden");
      });
  
      // Esconde o botão após mostrar tudo
      showMoreBtn.style.display = "none";
    });
  });
  
  
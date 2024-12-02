const openBtnms = document.querySelectorAll("#openm");
const dialogos = document.querySelectorAll("#dialogo");
const closeBtnms = document.querySelectorAll("#closem");

openBtnms.forEach((openBtnm, i) => {
  openBtnm.addEventListener("click", () => {
    dialogos[i].showModal()
    dialogos[i].scrollTop = 0
  });
});

closeBtnms.forEach((closeBtnm, i) => {
  closeBtnm.addEventListener("click", () => dialogos[i].close());
});

// close modal when clicking outside
dialogos.forEach((dialogo, i) => {
  dialogo.addEventListener("click", (event) => {
    const rect = dialogo.getBoundingClientRect();
    
    const isInDialog =
      event.clientX >= rect.left &&
      event.clientX <= rect.right &&
      event.clientY >= rect.top &&
      event.clientY <= rect.bottom;

    if (!isInDialog) {
      dialogo.close();
    }
  });
});

const checkBoxOne = document.getElementById("mais-infromacao-1");
const checkBoxTwo = document.getElementById("mais-infromacao-2");
const checkBoxThree = document.getElementById("mais-infromacao-3");
const checkBoxFour = document.getElementById("mais-infromacao-4");

checkBoxOne.addEventListener("change", () => {
  if (checkBoxOne.checked) {
    const value = prompt("qual a doença mental ?");
    checkBoxOne.value = value;
  } else {
    checkBoxOne.value = "";
  }
});

checkBoxTwo.addEventListener("change", () => {
  if (checkBoxTwo.checked) {
    const value = prompt("que tipo de dependente quimico ele é?");
    checkBoxTwo.value = value;
  } else {
    checkBoxTwo.value = "";
  }
});

checkBoxThree.addEventListener("change", () => {
  if (checkBoxThree.checked) {
    const value = prompt("link da rede social?");
    checkBoxThree.value = value;
  } else {
    checkBoxThree.value = "";
  }
});

checkBoxFour.addEventListener("change", () => {
  if (checkBoxFour.checked) {
    const value = prompt("placa do carro?");
    checkBoxFour.value = value;
  } else {
    checkBoxFour.value = "";
  }
});

const buttonNextStateForm = document.getElementById("next-state-form");
const buttonPreviousForm = document.getElementById("btn-previous-state-form");

const formStateOne = document.getElementById("form-state-one");

const formStateTwo = document.getElementById("form-state-two");
formStateTwo.classList = "close";
buttonPreviousForm.classList = "close";

buttonPreviousForm.addEventListener("click", () => {
  previousStateForm();
});

buttonNextStateForm.addEventListener("click", () => {
  const form = document.getElementById("form");
  if (form.checkValidity()) {
    nextStateForm();
  } else {
    form.reportValidity();
  }
});

function nextStateForm() {
  formStateTwo.classList.remove("close");
  formStateOne.classList = "close";
  buttonPreviousForm.classList = "btn-previous-state-form";
}

function previousStateForm() {
  formStateTwo.classList.add("close");
  formStateOne.classList.remove("close");
  buttonPreviousForm.classList = "close";
}

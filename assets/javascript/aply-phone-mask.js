function applyPhoneMask() {
  const input = document.getElementById("missing_person_contact");
  input.addEventListener("input", function (e) {
    let value = input.value.replace(/\D/g, ""); // Remove tudo que não for número
    if (value.length > 0) {
      value = value.replace(/^(\d{2})(\d)/g, "($1) $2"); // Adiciona os parênteses e espaço
    }
    if (value.length >= 10) {
      value = value.replace(/(\d{5})(\d{4})$/, "$1-$2"); // Adiciona o traço no número
    }
    input.value = value;
  });
}

applyPhoneMask();

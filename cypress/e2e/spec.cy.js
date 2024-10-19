Cypress.on("uncaught:exception", (err, runnable) => {
  return false;
});

class FormSingUp {
  inputs = {
    username: cy.get("#form-sing-up input[name='username']"),
    email: cy.get("#form-sing-up input[name='email']"),
    password: cy.get("#form-sing-up input[name='password']"),
  };
  buttonSubmit = cy.get("#form-sing-up button[name='submit-form-register']");

  submitForm() {
    this.buttonSubmit.click();
  }

  setUserName(name) {
    this.inputs.username.type(name);
  }

  setEmail(email) {
    this.inputs.email.type(email);
  }
  setPassword(password) {
    this.inputs.password.type(password);
  }
}

describe("sing up", () => {
  beforeEach(() => {
    cy.visit("");
  });

  afterEach(() => {
    cy.visit("/delete-data-in-application.php");
  });

  it("It should be possible to register a user", () => {
    let formSingUp = new FormSingUp();

    cy.get("#button-login").click();
    cy.get(".register-link").click();
    formSingUp.setUserName("jhon doe");
    formSingUp.setEmail("jhon@gmail.com");
    formSingUp.setPassword("123456");
    formSingUp.submitForm();
  });
});

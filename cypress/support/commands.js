// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//

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

Cypress.Commands.add("createUser", (username, email, password) => {
  let formSingUp = new FormSingUp();

  cy.get("#button-login").click();
  cy.get(".register-link").click();
  formSingUp.setUserName(username);
  formSingUp.setEmail(email);
  formSingUp.setPassword(password);
  formSingUp.submitForm();
});

Cypress.Commands.add("singOut", () => {
  cy.get("#sing-out-action").click();
  cy.contains("Login").should("be.visible");
});

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

class FormSingIn {
  inputs = {
    email: cy.get("#form-sing-in input[name='email']"),
    password: cy.get("#form-sing-in input[name='password']"),
  };
  buttonSubmit = cy.get("#form-sing-in button[name='btn-login']");

  submitForm() {
    this.buttonSubmit.click();
  }

  setEmail(email) {
    this.inputs.email.type(email);
  }
  setPassword(password) {
    this.inputs.password.type(password);
  }
}

const user = {
  username: "jhon doe",
  email: "jhodoe@gmail.com",
  password: "123456",
};

describe("sing up", () => {
  beforeEach(() => {
    cy.visit("");
  });

  afterEach(() => {
    cy.visit("/delete-data-in-application.php");
  });

  it(" should be possible to sing up a user", () => {
    let formSingUp = new FormSingUp();

    cy.get("#button-login").click();
    cy.get(".register-link").click();
    formSingUp.setUserName(user.username);
    formSingUp.setEmail(user.email);
    formSingUp.setPassword(user.password);
    formSingUp.submitForm();
  });

  it("should be possible to sing out a user", () => {
    cy.createUser(user.username, user.email, user.password);
    cy.get("#sing-out-action").click();
    cy.contains("Login").should("be.visible");
  });

  it("should be possible to sing in a user", () => {
    let formSingIn = new FormSingIn();

    cy.createUser(user.username, user.email, user.password);
    cy.singOut();
    cy.get("#button-login").click();
    formSingIn.setEmail(user.email);
    formSingIn.setPassword(user.password);
    formSingIn.submitForm();
  });
});

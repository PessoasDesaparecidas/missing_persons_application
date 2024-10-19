const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    setupNodeEvents(on, config) {},
    baseUrl: "http://localhost/missing_persons_application/",
    chromeWebSecurity: false,
  },
});

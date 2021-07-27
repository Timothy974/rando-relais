const angelRegistration = {
  // Proprietes availables in our object.
  angelSwitch: null,
  tentCheckBox: null,
  bedroomCheckBox: null,
  shelterCheckBox: null,
  deliveryCheckBox: null,
  showerCheckBox: null,
  waterCheckBox: null,
  breakfastCheckBox: null,
  sandwichCheckBox: null,
  dinnerCheckBox: null,
  powerCheckBox: null,
  init: function () {
    console.log("Hello ! I'm the angelResgistration component.");
    // We get the DOM elements that we need to interate with.
    // We add a listener & a handler on the click event on each of them.

    // Switch to Angel registration element.
    angelRegistration.angelSwitch = document.getElementById(
      "registration_form_status"
    );
    // If angelRegistration.angelSwitch === true.
    if (angelRegistration.angelSwitch) {
      // We add a listener on the click event and we callback the displayAngelData() method.
      angelRegistration.angelSwitch.addEventListener(
        "click",
        angelRegistration.displayAngelData
      );
      // We check if the angelSwitch is checked.
      if (angelRegistration.angelSwitch.checked === true) {
        // If angelSwitch is checked we simulate a click on the angelSwitch.
        angelRegistration.angelSwitch.click();
        // With this click we want the angelSwitch to stay check.
        angelRegistration.angelSwitch.checked = true;
      } 
    }

    // Service Emplacement de tente icon element.
    angelRegistration.tentCheckBox = document.getElementById(
      "emplacement-de-tente"
    );
    if (angelRegistration.tentCheckBox) {
      angelRegistration.tentCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Service Lit icon element.
    angelRegistration.bedroomCheckBox = document.getElementById("lit");
    if (angelRegistration.bedroomCheckBox) {
      angelRegistration.bedroomCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Service Abri icon element.
    angelRegistration.shelterCheckBox = document.getElementById("abri");
    if (angelRegistration.shelterCheckBox) {
      angelRegistration.shelterCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Serice Réception de colis icon element.
    angelRegistration.deliveryCheckBox =
      document.getElementById("reception-de-colis");
    if (angelRegistration.deliveryCheckBox) {
      angelRegistration.deliveryCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Service Douche inco element.
    angelRegistration.showerCheckBox = document.getElementById("douche");
    if (angelRegistration.showerCheckBox) {
      angelRegistration.showerCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Service Eau icon element.
    angelRegistration.waterCheckBox = document.getElementById("eau");
    if (angelRegistration.waterCheckBox) {
      angelRegistration.waterCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Service Petit déjeuner icon element.
    angelRegistration.breakfastCheckBox =
      document.getElementById("petit-dejeuner");
    if (angelRegistration.breakfastCheckBox) {
      angelRegistration.breakfastCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Servce Sandwich icon element.
    angelRegistration.sandwichCheckBox = document.getElementById("sandwich");
    if (angelRegistration.sandwichCheckBox) {
      angelRegistration.sandwichCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Service Dîner icon element.
    angelRegistration.dinnerCheckBox = document.getElementById("diner");
    if (angelRegistration.dinnerCheckBox) {
      angelRegistration.dinnerCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }

    // Serice Prise électrique icon element.
    angelRegistration.powerCheckBox =
      document.getElementById("prise-electrique");
    if (angelRegistration.powerCheckBox) {
      angelRegistration.powerCheckBox.addEventListener(
        "click",
        angelRegistration.validateService
      );
    }
  },
  // Method who diplay the angel data if angelSwitch is clicked.
  displayAngelData: function (evt) {
    // We get the DOM element from wich the event occured.
    clickedElement = evt.currentTarget;
    // We get the DOM element on wich the CSS classes will be toggle.
    // We toggle the CSS class with the JS API classList.
    if (clickedElement === angelRegistration.angelSwitch) {
      document
        .getElementById("angel_subscription_form")
        .classList.toggle("d-none");
    }
  },
  // Method who toggle CSS classes on a service after is checked.
  validateService: function (evt) {
    selectedService = evt.currentTarget;

    // We toggle a CSS class with the JS API classList.
    if (
      selectedService === angelRegistration.tentCheckBox ||
      selectedService === angelRegistration.bedroomCheckBox ||
      selectedService === angelRegistration.shelterCheckBox ||
      selectedService === angelRegistration.deliveryCheckBox ||
      selectedService === angelRegistration.showerCheckBox ||
      selectedService === angelRegistration.waterCheckBox ||
      selectedService === angelRegistration.breakfastCheckBox
    ) {
      selectedService.classList.toggle("opacity-50");
      // We get DOM element input of the service.
      let serviceInput = selectedService.querySelector("input[type=checkbox]");
      //
      serviceInput.checked = !serviceInput.checked;
      // We get the DOM element img validate.
      let serviceValidateIcon = document.getElementById(
        "validate-" + selectedService.id
      );
      // We toggle the CSS class with the JS API classList.
      serviceValidateIcon.classList.toggle(
        "d-none",
        serviceValidateIcon.classList.contains("d-none")
      );
    }
    // Verifier sur quel service on a cliquer. 

    // 
  },
};

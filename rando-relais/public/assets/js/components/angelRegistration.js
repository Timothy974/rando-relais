const angelRegistration = {
  // Proprietes availables in our object.
  selectedElement: null,
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
    // We get the DOM elements that we need to interate with.
    // We add a listener & a handler on the click evt on each of them.

    // Switch to angel element.
    angelRegistration.angelSwitch = document.getElementById("flexSwitchAngel");
    angelRegistration.angelSwitch.addEventListener(
      "click",
      angelRegistration.handleSelectElement
    );

    // Service Emplacement de tente icon element.
    switchToAngel.tentCheckBox = document.getElementById("emplacement-tente");
    switchToAngel.tentCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Service Lit icon element.
    switchToAngel.bedroomCheckBox = document.getElementById("lit");
    switchToAngel.bedroomCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Service Abri icon element.
    switchToAngel.shelterCheckBox = document.getElementById("abri");
    switchToAngel.shelterCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Serice Réception de colis icon element.
    switchToAngel.deliveryCheckBox =
      document.getElementById("livraison-de-colis");
    switchToAngel.deliveryCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Service Douche inco element.
    switchToAngel.showerCheckBox = document.getElementById("douche");
    switchToAngel.showerCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Service Eau icon element.
    switchToAngel.waterCheckBox = document.getElementById("eau");
    switchToAngel.waterCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Service Petit déjeuner icon element.
    switchToAngel.breakfastCheckBox = document.getElementById("petit-dejeuner");
    switchToAngel.breakfastCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Servce Sandwich icon element.
    switchToAngel.sandwichCheckBox = document.getElementById("sandwich");
    switchToAngel.sandwichCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Service Dîner icon element.
    switchToAngel.dinnerCheckBox = document.getElementById("diner");
    switchToAngel.dinnerCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );

    // Serice Prise électrique icon element.
    switchToAngel.powerCheckBox = document.getElementById("prise-electrique");
    switchToAngel.powerCheckBox.addEventListener(
      "click",
      switchToAngel.handleSelectElement
    );
  },
  // Method that handle the toggle of some CSS classes from a click event on selected DOM element.
  handleSelectElement: function (evt) {
    // We get the DOM element from wich the event occured.
    angelRegistration.selectedElement = evt.currentTarget;

    // After retrieval of the selectedElement (clicked element) we check wich DOM element has been selected and we toggle some CSS classes.

    // If the selectedElement is angelSwitch.
    if (angelRegistration.selectedElement == angelRegistration.angelSwitch) {
      // We get the DOM element on wich the CSS classes will be toggle.
      // We get the toggle the CSS class with the JS API classList.
      document
        .getElementById("angel_subscription_form")
        .classList.toggle("d-none");
    }

    // If the selectedElement is powerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.powerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("power_service").classList.toggle("opacity-50");
      document.getElementById("validate_power").classList.toggle("d-none");
    }

    // If the selectedElement is tentCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.tentCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("tent_service").classList.toggle("opacity-50");
      document.getElementById("validate_tent").classList.toggle("d-none");
    }

    // If the selectedElement is showerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.showerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("shower_service").classList.toggle("opacity-50");
      document.getElementById("validate_shower").classList.toggle("d-none");
    }

    // If the selectedElement is breakfastCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.breakfastCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document
        .getElementById("breakfast_service")
        .classList.toggle("opacity-50");
      document.getElementById("validate_breakfast").classList.toggle("d-none");
    }

    // If the selectedElement is bedroomCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.bedroomCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("bedroom_service").classList.toggle("opacity-50");
      document.getElementById("validate_bedroom").classList.toggle("d-none");
    }

    // If the selectedElement is deliveryCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.deliveryCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document
        .getElementById("delivery_service")
        .classList.toggle("opacity-50");
      document.getElementById("validate_delivery").classList.toggle("d-none");
    }

    // If the selectedElement is sandwichCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.sandwichCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document
        .getElementById("sandwich_service")
        .classList.toggle("opacity-50");
      document.getElementById("validate_sandwich").classList.toggle("d-none");
    }

    // If the selectedElement is dinnerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.dinnerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("dinner_service").classList.toggle("opacity-50");
      document.getElementById("validate_dinner").classList.toggle("d-none");
    }

    // If the selectedElement is shelterCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.shelterCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("shelter_service").classList.toggle("opacity-50");
      document.getElementById("validate_shelter").classList.toggle("d-none");
    }

    // If the selectedElement is waterCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.shelterCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("water_service").classList.toggle("opacity-50");
      document.getElementById("validate_water").classList.toggle("d-none");
    }

    // If the selectedElement is powerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.powerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      document.getElementById("power_service").classList.toggle("opacity-50");
      document.getElementById("validate_power").classList.toggle("d-none");
    }
  },
};

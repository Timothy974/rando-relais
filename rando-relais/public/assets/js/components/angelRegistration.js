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
    console.log("Hello ! I'm the angelResgistration component.")
    // We get the DOM elements that we need to interate with.
    // We add a listener & a handler on the click evt on each of them.

    // Switch to angel registration element.
    angelRegistration.angelSwitch = document.getElementById(
      "registration_form_status"
    );
    if (angelRegistration.angelSwitch) {
      angelRegistration.angelSwitch.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Emplacement de tente icon element.
    angelRegistration.tentCheckBox = document.getElementById(
      "emplacement-de-tente"
    );
    if (angelRegistration.tentCheckBox) {
      angelRegistration.tentCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Lit icon element.
    angelRegistration.bedroomCheckBox = document.getElementById("lit");
    if (angelRegistration.bedroomCheckBox) {
      angelRegistration.bedroomCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Abri icon element.
    angelRegistration.shelterCheckBox = document.getElementById("abri");
    if (angelRegistration.shelterCheckBox) {
      angelRegistration.shelterCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Serice Réception de colis icon element.
    angelRegistration.deliveryCheckBox =
      document.getElementById("reception-de-colis");
    if (angelRegistration.deliveryCheckBox) {
      angelRegistration.deliveryCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Douche inco element.
    angelRegistration.showerCheckBox = document.getElementById("douche");
    if (angelRegistration.showerCheckBox) {
      angelRegistration.showerCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Eau icon element.
    angelRegistration.waterCheckBox = document.getElementById("eau");
    if (angelRegistration.waterCheckBox) {
      angelRegistration.waterCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Petit déjeuner icon element.
    angelRegistration.breakfastCheckBox =
      document.getElementById("petit-dejeuner");
    if (angelRegistration.breakfastCheckBox) {
      angelRegistration.breakfastCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Servce Sandwich icon element.
    angelRegistration.sandwichCheckBox = document.getElementById("sandwich");
    if (angelRegistration.sandwichCheckBox) {
      angelRegistration.sandwichCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Service Dîner icon element.
    angelRegistration.dinnerCheckBox = document.getElementById("diner");
    if (angelRegistration.dinnerCheckBox) {
      angelRegistration.dinnerCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }

    // Serice Prise électrique icon element.
    angelRegistration.powerCheckBox =
      document.getElementById("prise-electrique");
    if (angelRegistration.powerCheckBox) {
      angelRegistration.powerCheckBox.addEventListener(
        "click",
        angelRegistration.handleSelectElement
      );
    }
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

    // If the selectedElement is tentCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.tentCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.tentCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-emplacement-de-tente")
        .classList.toggle("d-none");
    }

    // If the selectedElement is bedroomCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.bedroomCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.bedroomCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-lit").classList.toggle("d-none");
    }

    // If the selectedElement is shelterCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.shelterCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.shelterCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-abri").classList.toggle("d-none");
    }

    // If the selectedElement is deliveryCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.deliveryCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.deliveryCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-reception-de-colis")
        .classList.toggle("d-none");
    }

    // If the selectedElement is showerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.showerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.showerCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-douche").classList.toggle("d-none");
    }

    // If the selectedElement is waterCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.waterCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.waterCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-eau").classList.toggle("d-none");
    }

    // If the selectedElement is breakfastCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.breakfastCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.breakfastCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-petit-dejeuner")
        .classList.toggle("d-none");
    }

    // If the selectedElement is sandwichCheckBox.
    if (
      angelRegistration.selectedElement == angelRegistration.sandwichCheckBox
    ) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.sandwichCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-sandwich").classList.toggle("d-none");
    }

    // If the selectedElement is dinnerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.dinnerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.dinnerCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-diner").classList.toggle("d-none");
    }

    // If the selectedElement is powerCheckBox.
    if (angelRegistration.selectedElement == angelRegistration.powerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      angelRegistration.powerCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-prise-electrique")
        .classList.toggle("d-none");
    }
  },
};

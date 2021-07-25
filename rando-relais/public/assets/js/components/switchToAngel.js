const switchToAngel = {
  // Proprietes availables in our object.
  selectedElement: null,
  updateButton: null,
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

    // Update button element.
    switchToAngel.updateButton = document.getElementById("update-button");
    if (switchToAngel.updateButton) {
      switchToAngel.updateButton.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Emplacement de tente icon element.
    switchToAngel.tentCheckBox = document.getElementById(
      "emplacement-de-tente"
    );
    if (switchToAngel.tentCheckBox) {
      switchToAngel.tentCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Lit icon element.
    switchToAngel.bedroomCheckBox = document.getElementById("lit");
    if (switchToAngel.bedroomCheckBox) {
      switchToAngel.bedroomCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Abri icon element.
    switchToAngel.shelterCheckBox = document.getElementById("abri");
    if (switchToAngel.shelterCheckBox) {
      switchToAngel.shelterCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Serice Réception de colis icon element.
    switchToAngel.deliveryCheckBox =
      document.getElementById("reception-de-colis");
    if (switchToAngel.deliveryCheckBox) {
      switchToAngel.deliveryCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Douche inco element.
    switchToAngel.showerCheckBox = document.getElementById("douche");
    if (switchToAngel.showerCheckBox) {
      switchToAngel.showerCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Eau icon element.
    switchToAngel.waterCheckBox = document.getElementById("eau");
    if (switchToAngel.waterCheckBox) {
      switchToAngel.waterCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Petit déjeuner icon element.
    switchToAngel.breakfastCheckBox = document.getElementById("petit-dejeuner");
    if (switchToAngel.breakfastCheckBox) {
      switchToAngel.breakfastCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Servce Sandwich icon element.
    switchToAngel.sandwichCheckBox = document.getElementById("sandwich");
    if (switchToAngel.sandwichCheckBox) {
      switchToAngel.sandwichCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Service Dîner icon element.
    switchToAngel.dinnerCheckBox = document.getElementById("diner");
    if (switchToAngel.dinnerCheckBox) {
      switchToAngel.dinnerCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }

    // Serice Prise électrique icon element.
    switchToAngel.powerCheckBox = document.getElementById("prise-electrique");
    if (switchToAngel.powerCheckBox) {
      switchToAngel.powerCheckBox.addEventListener(
        "click",
        switchToAngel.handleSelectElement
      );
    }
  },
  // Method that handle the toggle of some CSS classes from a click event on selected DOM element.
  handleSelectElement: function (evt) {
    // We get the DOM element from wich the event occured.
    switchToAngel.selectedElement = evt.currentTarget;

    // After retrieval of the selectedElement (clicked element) we check wich DOM element has been selected and we toggle some CSS classes.

    // If the selectedElement is angelSwitch.
    if (switchToAngel.selectedElement == switchToAngel.angelSwitch) {
      // We get the DOM element on wich the CSS classes will be toggle.
      // We get the toggle the CSS class with the JS API classList.
      document
        .getElementById("angel_subscription_form")
        .classList.toggle("d-none");
    }

    // If the selectedElement is tentCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.tentCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.tentCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-emplacement-de-tente")
        .classList.toggle("d-none");
    }

    // If the selectedElement is bedroomCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.bedroomCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.bedroomCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-lit").classList.toggle("d-none");
    }

    // If the selectedElement is shelterCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.shelterCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.shelterCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-abri").classList.toggle("d-none");
    }

    // If the selectedElement is deliveryCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.deliveryCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.deliveryCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-reception-de-colis")
        .classList.toggle("d-none");
    }

    // If the selectedElement is showerCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.showerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.showerCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-douche").classList.toggle("d-none");
    }

    // If the selectedElement is waterCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.waterCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.waterCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-eau").classList.toggle("d-none");
    }

    // If the selectedElement is breakfastCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.breakfastCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.breakfastCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-petit-dejeuner")
        .classList.toggle("d-none");
    }

    // If the selectedElement is sandwichCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.sandwichCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.sandwichCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-sandwich").classList.toggle("d-none");
    }

    // If the selectedElement is dinnerCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.dinnerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.dinnerCheckBox.classList.toggle("opacity-50");
      document.getElementById("validate-diner").classList.toggle("d-none");
    }

    // If the selectedElement is powerCheckBox.
    if (switchToAngel.selectedElement == switchToAngel.powerCheckBox) {
      // We get the DOM elements on wich the CSS classes will be toggle.
      // We get the toggle the CSS classes with the JS API classList.
      switchToAngel.powerCheckBox.classList.toggle("opacity-50");
      document
        .getElementById("validate-prise-electrique")
        .classList.toggle("d-none");
    }

    // If selectedElement is updateButton.
    if (switchToAngel.selectedElement == switchToAngel.updateButton) {
      // We get the DOM element on wich the CSS classes will be toggle.
      // We get the toggle the CSS class with the JS API classList.
      document
        .getElementById("input-profil-picture")
        .classList.toggle("d-none");

      // We add the CSS class display none to updateButton.
      switchToAngel.updateButton.classList.add("d-none");
      // We remove the CSS class display none to save button.
      document.getElementById("save-button").classList.remove("d-none");

      // We remove the attribut "disabled" of the form field so the user can enter a input.
      document.getElementById("first-name").removeAttribute("disabled");
      document.getElementById("last-name").removeAttribute("disabled");
      document.getElementById("email").removeAttribute("disabled");
      document.getElementById("phone-number").removeAttribute("disabled");
      document.getElementById("zip_code").removeAttribute("disabled");
      document.getElementById("city").removeAttribute("disabled");
    }
  },
};

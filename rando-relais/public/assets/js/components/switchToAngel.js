const switchToAngel = {
  // Proprietes availables in our object.
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
    onsole.log("Hello ! I'm the switchToAngel component.");
    // We get the DOM elements that we need to interate with.
    // We add a listener & a handler on the click evt on each of them.

    // Switch to become Angel element.
    switchToAngel.angelSwitch = document.getElementById("switch-to-angel");
    // If switchToAngel.angelSwitch === true.
    if (switchToAngel.angelSwitch) {
      // We add a listener on the click event and we callback the displayAngelData() method.
      switchToAngel.angelSwitch.addEventListener(
        "click",
        switchToAngel.displayAngelData
      );

      // Update button element.
      switchToAngel.updateButton = document.getElementById("update-button");
      // If updateButton === true.
      if (switchToAngel.updateButton) {
        // We add a listener on the click event and we callback the handleProfilUpdate() method.
        switchToAngel.updateButton.addEventListener(
          "click",
          switchToAngel.handleProfilUpdate
        );
      }
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

    // Service Diner icon element.
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
  handleProfilUpdate: function (evt) {
    clickedElement = evt.currentTarget;
    // If selectedElement is updateButton.
    if (clickedElement == switchToAngel.updateButton) {
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
  displayAngelData: function () {
    // We get the DOM element from wich the event occured.
    clickedElement = evt.currentTarget;
    // We get the DOM element on wich the CSS classes will be toggle.
    // We toggle the CSS class with the JS API classList.
    if (clickedElement === switchToAngel.angelSwitch) {
      document
        .getElementById("angel_subscription_form")
        .classList.toggle("d-none");
    }
  },
};
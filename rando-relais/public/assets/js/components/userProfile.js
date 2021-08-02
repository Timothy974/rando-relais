const userProfile = {
  // Proprietes availables in our object.
  modifyButton: null,
  saveButton: null,
  deleteButton: null,
  angelSwitch: null,
  pictureField: null,
  firstNameField: null,
  lastNameField: null,
  emailField: null,
  passWordField: null,
  phoneNumberField: null,
  zipCodeField: null,
  cityField: null,
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
    console.log("Hello ! I'm the userProfile component.");
    // We get the DOM elements that we need to interate with.
    // We add a listener & a handler on the click evt on each of them.

    // Switch to become Angel element.
    userProfile.angelSwitch = document.getElementById("user_profil_status");
    // If userProfile.angelSwitch === true.
    if (userProfile.angelSwitch) {
      // We add a listener on the click event and we callback the displayAngelData() method.
      userProfile.angelSwitch.addEventListener(
        "click",
        userProfile.displayAngelData
      );
      // We check if the angelSwitch is checked.
      if (userProfile.angelSwitch.checked === true) {
        // If angelSwitch is checked we simulate a click on the angelSwitch.
        userProfile.angelSwitch.click();
        // With this click we want the angelSwitch to stay check.
        userProfile.angelSwitch.checked = true;
      }
    }

    // Modify button element.
    userProfile.modifyButton = document.getElementById("modify-button");
    // If modifyButton === true.
    if (userProfile.modifyButton) {
      // We add a listener on the click event and we callback the handleProfilUpdate() method.
      userProfile.modifyButton.addEventListener(
        "click",
        userProfile.handleProfileUpdate
      );
    }

    // Save button element.
    userProfile.saveButton = document.getElementById("save-button");
    // If modifyButton === true.
    if (userProfile.saveButton) {
      // We add a listener on the click event and we callback the handleProfilUpdate() method.
      userProfile.saveButton.addEventListener(
        "click",
        userProfile.handleProfileUpdate
      );
    }

    // Delete button element.
    userProfile.deleteButton = document.getElementById("delete-button");
    // If modifyButton === true.
    if (userProfile.deleteButton) {
      // We add a listener on the click event and we callback the handleProfilUpdate() method.
      userProfile.deleteButton.addEventListener(
        "click",
        userProfile.handleProfileUpdate
      );
    }

    // Form fields elements.
    userProfile.firstNameField = document.getElementById(
      "user_profil_firstName"
    );
    userProfile.pictureField = document.getElementById("user_profile_picture");
    userProfile.lastNameField = document.getElementById("user_profil_lastName");
    userProfile.emailField = document.getElementById("user_profil_email");
    userProfile.phoneNumberField = document.getElementById(
      "user_profil_phoneNumber"
    );
    userProfile.zipCodeField = document.getElementById("user_profil_zipCode");
    userProfile.cityField = document.getElementById("user_profil_city");

    // TODO START : use this code later for improve the services's display.
    // // Service Emplacement de tente icon element.
    // userProfile.tentCheckBox = document.getElementById(
    //   "emplacement-de-tente"
    // );
    // if (userProfile.tentCheckBox) {
    //   userProfile.tentCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Service Lit icon element.
    // userProfile.bedroomCheckBox = document.getElementById("lit");
    // if (userProfile.bedroomCheckBox) {
    //   userProfile.bedroomCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Service Abri icon element.
    // userProfile.shelterCheckBox = document.getElementById("abri");
    // if (userProfile.shelterCheckBox) {
    //   userProfile.shelterCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );;
    // }

    // // Serice Réception de colis icon element.
    // userProfile.deliveryCheckBox =
    //   document.getElementById("reception-de-colis");

    // if (userProfile.deliveryCheckBox) {
    //   userProfile.deliveryCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Service Douche inco element.
    // userProfile.showerCheckBox = document.getElementById("douche");
    // if (userProfile.showerCheckBox) {
    //   userProfile.showerCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Service Eau icon element.
    // userProfile.waterCheckBox = document.getElementById("eau");
    // if (userProfile.waterCheckBox) {
    //   userProfile.waterCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Service Petit déjeuner icon element.
    // userProfile.breakfastCheckBox = document.getElementById("petit-dejeuner");
    // if (userProfile.breakfastCheckBox) {
    //   userProfile.breakfastCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Servce Sandwich icon element.
    // userProfile.sandwichCheckBox = document.getElementById("sandwich");
    // if (userProfile.sandwichCheckBox) {
    //   userProfile.sandwichCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Service Diner icon element.
    // userProfile.dinnerCheckBox = document.getElementById("diner");
    // if (userProfile.dinnerCheckBox) {
    //   userProfile.dinnerCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }

    // // Serice Prise électrique icon element.
    // userProfile.powerCheckBox = document.getElementById("prise-electrique");
    // if (userProfile.powerCheckBox) {
    //   userProfile.powerCheckBox.addEventListener(
    //     "click",
    //     userProfile.handleProfileUpdate
    //   );
    // }
    // TODO END.
  },
  // Method who, after a click on the modifyButton, allow the uer to acces the form's fields to modify is data.
  handleProfileUpdate: function (evt) {
    // We get the DOM element from wich the event occured.
    clickedElement = evt.currentTarget;
    console.log(clickedElement);
    // If selectedElement is modifyButton.
    if (clickedElement == userProfile.modifyButton) {
      // We get the DOM element on wich the CSS classes will be toggle.
      // We get the toggle the CSS class with the JS API classList.

      // We add the CSS class display none to modifyButton.
      userProfile.modifyButton.classList.add("d-none");
      // We toggle the CSS class display none to saveButton.
      userProfile.saveButton.classList.toggle("d-none");
      // We toggle the CSS class display none to delete-button.
      userProfile.deleteButton.classList.toggle("d-none");
      if (userProfile.pictureField) {
        // We toggle the CSS class display none to pictureField.
        userProfile.pictureField.classList.remove("d-none");
      }


      // if (userProfile.angelSwitch) {
      //   // We remove the HTML's attributes disabled & placeholder.
      //   // We set a attribute placeholder with the label of the field.
      //   userProfile.angelSwitch.removeAttribute("disabled");
      // }
      // // If the form fields elements exits.
      // if (userProfile.firstNameField) {
      //   // We remove the HTML's attributes disabled & placeholder.
      //   // We set a attribute placeholder with the label of the field.
      //   userProfile.firstNameField.removeAttribute("disabled");
      // }

      if (
        userProfile.angelSwitch &&
        userProfile.firstNameField &&
        userProfile.lastNameField &&
        userProfile.emailField &&
        userProfile.phoneNumberField &&
        userProfile.zipCodeField &&
        userProfile.cityField
      ) {
      // We remove the HTML's attributes disabled & placeholder.
      // We set a attribute placeholder with the label of the field.
      userProfile.angelSwitch.removeAttribute("disabled");
      // We remove the HTML's attributes disabled & placeholder.
      // We set a attribute placeholder with the label of the field.
      userProfile.firstNameField.removeAttribute("disabled");
        // We remove the HTML's attributes disabled & placeholder.
        // We set a attribute placeholder with the label of the field.
        userProfile.firstNameField.removeAttribute("disabled");
        // userProfile.firstNameField.removeAttribute("placeholder");
        // userProfile.firstNameField.setAttribute("placeholder", "Prénom");
        userProfile.lastNameField.removeAttribute("disabled");
        // userProfile.lastNameField.removeAttribute("placeholder");
        // userProfile.lastNameField.setAttribute("placeholder", "Nom");
        userProfile.emailField.removeAttribute("disabled");
        // userProfile.emailField.removeAttribute("placeholder");
        // userProfile.emailField.setAttribute(
        //   "placeholder",
        //   "Adresse Email"
        // );
        userProfile.phoneNumberField.removeAttribute("disabled");
        // userProfile.phoneNumberField.removeAttribute("placeholder");
        // userProfile.phoneNumberField.setAttribute(
        //   "placeholder",
        //   "Numéro de téléphone"
        // );
        userProfile.zipCodeField.removeAttribute("disabled");
        // userProfile.zipCodeField.removeAttribute("placeholder");
        // userProfile.zipCodeField.setAttribute(
        //   "placeholder",
        //   "Code Postale"
        // );
        userProfile.cityField.removeAttribute("disabled");
        // userProfile.cityField.removeAttribute("placeholder");
        // userProfile.cityField.setAttribute("placeholder", "Commune");
      }
    }
  },
  // Method who display the form fields for the status Ange.
  displayAngelData: function (evt) {
    // We get the DOM element from wich the event occured.
    clickedElement = evt.currentTarget;
    // We get the DOM element on wich the CSS classes will be toggle.
    // We toggle the CSS class with the JS API classList.
    if (clickedElement === userProfile.angelSwitch) {
      document
        .getElementById("angel_subscription_form")
        .classList.toggle("d-none");
    }
  },
};
